<?php

namespace backend\models;

use common\models\User;



class Admin extends User
{

    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    public static function tableName()
    {
        return '{{%admins}}';
    }

    public function rules()
    {
        return [
            [['username', 'email', 'password_hash'], 'required'],
            [['username', 'email', 'password_hash'], 'string', 'max' => 255],
        ];
    }

}