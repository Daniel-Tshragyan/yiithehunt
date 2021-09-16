<?php

namespace common\models;

use Yii;
use common\models\CategoryPost;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $image
 * @property string|null $content
 * @property string|null $created_at
 *
 * @property CategoryPost[] $categoriesPosts
 */
class Post extends \yii\db\ActiveRecord
{

    public $categoryIds = [];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'required'],
            [['title'], 'required'],
            [['content'], 'required'],
            [['image'], 'required'],
            [['title', 'content', 'image'], 'string', 'max' => 255],
            [['content'], 'string'],
            ['categoryIds', 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'title' => 'Title',
            'content' => 'Content',
            'created_at' => 'Created At',
            'categoryIds' => 'Categories'
        ];
    }

    /**
     * Gets query for [[CategoriesPosts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriesPosts()
    {
        return $this->hasMany(CategoryPost::class, ['post_id' => 'id']);
    }

    public function getCategories()
    {
        return $this->hasMany(Category::class, ['id' => 'category_id'])
            ->via('categoriesPosts');
    }

    public function getdropCategory()
    {
        $data = Category::find()->asArray()->all();
        return ArrayHelper::map($data, 'id', 'title');
    }

    public function upload()
    {
        
        if (!is_null($this->image) && !empty($this->image)) {
            $random = Yii::$app->security->generateRandomString(12).'.'.$this->image->extension;
            $path = Yii::getAlias('@frontend') . "/web/images/editor";
            if (\yii\helpers\FileHelper::createDirectory($path, 0775, true)) {
                $this->image->saveAs($path .$random);
            }
            $this->image = $random;
        }
        return true;
    }
}
