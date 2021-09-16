<?php

namespace frontend\components;

use common\models\Category;
use common\models\Post;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

class RelatedPostsWidget extends Widget
{
    public $post;
    public function init()
    {
        parent::init();

    }

    public function run()
    {
        
        $newData = [];
            
        foreach ($this->post->categories as $item) {
            $newData[] = $item->id;

        }

        $posts = Post::find()->innerJoinWith([
            'categories' => function ($query) use ($newData) {
                $query->andWhere(['in', 'categories.id', $newData]);
            },
        ])->where(['<>', 'posts.id', $this->post->id])->orderBy('RAND()')->limit(3)->all();
        

        return $this->render('relatedPosts', ['posts' => $posts]);
    }
}