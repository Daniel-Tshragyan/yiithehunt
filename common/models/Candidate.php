<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "candidates".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $city_id
 * @property int|null $age
 * @property string|null $location
 * @property string|null $profession
 * @property string|null $image
 *
 * @property City $city
 * @property User $user
 */
class Candidate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'candidates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'city_id', 'age'], 'integer'],
            ['city_id', 'required'],
            ['user_id', 'required'],
            ['profession', 'required'],
            ['location', 'required'],
            [['location', 'profession', 'image'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'targetClass' => City::class, 'targetAttribute' => ['city_id' => 'id']],
            [['user_id'], 'exist', 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'age' => 'Age',
            'location' => 'Location',
            'profession' => 'Profession',
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
