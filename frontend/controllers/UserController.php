<?php

namespace frontend\controllers;

use common\models\LoginForm;
use frontend\models\CompanySignupForm;
use frontend\models\SignupForm;
use Yii;
use yii\web\UploadedFile;

class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCompanyReg()
    {
        $model = new CompanySignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if ($model->upload()) {
                Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
                return $this->goHome();
            }
        }

        return $this->render('registration/companyreg',['model' => $model]
        );
    }

    public function actionCandidateReg()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if ($model->upload()) {
                Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
                return $this->goHome();
            }
        }

        return $this->render('registration/candidatereg',['model' => $model]
        );
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    public function actionNotification()
    {
        return $this->render('notification/index',['model' => Yii::$app->user->identity->getNotifications()]);
    }
}
