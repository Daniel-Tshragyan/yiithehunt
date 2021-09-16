<?php

namespace frontend\components;

use yii\base\Widget;

class CategoryPosts extends Widget
{
    public $category;
    public function init()
    {
        parent::init();

    }

    public function run()
    {

        $posts = $this->category->getPosts();

        return $this->render('categoryPosts', ['posts' => $posts]);
    }
}