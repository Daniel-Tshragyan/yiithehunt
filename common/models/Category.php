<?php

namespace common\models;

use Yii;
use common\models\CategoryPost;
/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string|null $title
 *
 * @property CategoryPost[] $categoriesPosts
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
            ['title', 'unique']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[CategoriesPosts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriesPosts()
    {
        return $this->hasMany(CategoryPost::class, ['category_id' => 'id']);
    }

    public function getPosts()
    {
        return $this->hasMany(Post::class, ['id' => 'post_id'])
            ->via('categoriesPosts');
    }
}
