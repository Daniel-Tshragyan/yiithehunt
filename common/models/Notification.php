<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "notifications".
 *
 * @property int $id
 * @property string|null $content
 *
 * @property NotificationsPosts[] $notificationsPosts
 */
class Notification extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notifications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
        ];
    }

    /**
     * Gets query for [[NotificationsPosts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotificationsUsers()
    {
        return $this->hasMany(NotificationsUsers::class, ['notification_id' => 'id']);
    }

    public function getUsers()
    {

    }
}
