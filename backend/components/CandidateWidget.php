<?php

namespace backend\components;


use common\models\User;
use yii\base\Widget;

class CandidateWidget extends Widget
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
        return $this->render('candidate', ['candidate'=>$this->user->candidate]);
    }
}