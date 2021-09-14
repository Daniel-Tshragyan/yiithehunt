<?php

namespace backend\components;

use common\models\User;
use yii\base\Widget;

class CityWidget extends Widget
{
    public $user;
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('city', ['city'=>$this->user->city]);
    }
}