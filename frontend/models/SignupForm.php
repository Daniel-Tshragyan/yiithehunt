<?php

namespace frontend\models;

use common\models\Candidate;
use common\models\City;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $profession;
    public $username;
    public $email;
    public $password;
    public $age;
    public $location;
    public $image;
    public $city;
    public $rememberMe = true;


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

            ['profession', 'required'],
            ['profession', 'string', 'max' => 255],

            ['age', 'required'],
            ['age', 'number'],

            ['image', 'string', 'max' => 255],

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
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->role = User::ROLE_CANDIDATE;
        $user->save();


        $candidate= new Candidate();
        $candidate->age = $this->age;
        $candidate->profession = $this->profession;
        $candidate->location = $this->location;
        $candidate->city_id = $this->city;
        $candidate->user_id = $user->id;

        if (!is_null($this->image) && !empty($this->image)) {
            $random = Yii::$app->security->generateRandomString(12).$this->image->extension;
            $this->image->saveAs('@forntend/web/uploads/users' .$random);
            $candidate->image = $random;
        }

        return $candidate->save() && Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);
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
