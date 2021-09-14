<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use backend\models\Admin;

class AdminController extends Controller
{

    public $name;
    public $email;
    public $password;

    public function options($actionID)
    {
        return ['name', 'email', 'password'];
    }

    public function optionAliases()
    {
        return [
            'name' => 'name',
            'email' => 'email',
            'password' => 'password',
        ];
    }

    public function actionSeed(){
        $adminExists = Admin::find()->where(["email" => $this->email])->exists();

        if (!$adminExists) {
            $model = new Admin();
            $data = [
                'Admin' => [
                    'username' => $this->name,
                    'email' => $this->email,
                    'password_hash' => Yii::$app->security->generatePasswordHash($this->password),
                ]
            ];


            echo $model->load($data) && $model->save() ? "Admin Created" : "Admin Not Created";
            return 0;
        }

        echo "Select Another Email This Is Zanit";
        return 0;
    }

}