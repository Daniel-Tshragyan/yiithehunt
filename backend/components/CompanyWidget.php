<?php

namespace backend\components;


use common\models\User;
use yii\base\Widget;

class CompanyWidget extends Widget
{
    public $user;
    public function init()
    {
        parent::init();
        if (is_numeric($this->user)) {
            $this->user = User::findOne($this->user);
        }
    }

    public function run()
    {
        return $this->render('company', ['company'=>$this->user->company]);
    }
}