<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $city_id
 * @property string|null $companyname
 * @property string|null $tagline
 * @property string|null $location
 * @property string|null $image
 *
 * @property City $city
 * @property User $user
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'city_id'], 'integer'],
            ['city_id', 'required'],
            ['user_id', 'required'],
            ['companyname', 'required'],
            ['tagline', 'required'],
            ['location', 'required'],
            [['companyname', 'tagline', 'location', 'image'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['city_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'city_id' => 'City ID',
            'companyname' => 'Companyname',
            'tagline' => 'Tagline',
            'location' => 'Location',
            'image' => 'Image',
        ];
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'city_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
