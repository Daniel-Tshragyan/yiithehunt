<?php

namespace frontend\models;

use common\models\City;
use Yii;
use yii\base\Model;
use common\models\User;
use common\models\Company;
use yii\web\UploadedFile;

/**
 * Signup form
 */
class CompanySignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $city;
    public $location;
    public $image;
    public $companyname;
    public $tagline;
    public $rememberMe = true;
    public $user_company;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['email', 'unique', 'targetClass' => '\backend\models\Admin', 'message' => 'This email address has already been taken.'],

            ['city', 'required'],
            ['city', 'number'],
            ['city', 'exist', 'targetClass' => City::class, 'targetAttribute' => ['city' => 'id']],

            ['location', 'required'],
            ['location', 'string', 'max' => 255],

            ['image', 'image', 'skipOnEmpty' => true],

            ['companyname', 'required'],
            ['companyname', 'string', 'max' => 255],

            ['tagline', 'required'],
            ['tagline', 'string', 'max' => 255],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $company = new Company();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->role = User::ROLE_COMPANY;
        $user->save();

        $company->companyname = $this->companyname;
        $company->tagline = $this->tagline;
        $company->location = $this->location;
        $company->city_id = $this->city;
        $company->user_id = $user->id;
        $this->user_company = $company;

        return $company->save() && Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);
    }

    public function upload()
    {
        if (!is_null($this->image) && !empty($this->image)) {
            $random = Yii::$app->security->generateRandomString(12).'.'.$this->image->extension;
            $this->image->saveAs('@frontend/web/uploads/users/' .$random);
            $this->user_company->image = $random;
            $this->user_company->save();
        }
        return true;
    }
    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
