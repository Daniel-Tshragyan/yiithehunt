<?php

namespace frontend\controllers;
use common\models\Post;
use common\models\Category;
use yii\data\Pagination;

class PostController extends \yii\web\Controller
{
    public function actionIndex()
    {

        if (isset($this->request->get()['category'])) {
            $category = Category::findOne(['title' => $this->request->get()['category']]);
            $posts = $category->getPosts();
        } else {
            $posts = Post::find();
        }


        $categories = Category::find()->all();
        $pages = new Pagination(['totalCount' => $posts->count(), 'defaultPageSize' => 5]);
        $models = $posts->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'models' => $models,
            'pages' => $pages,
            'categories' => $categories,
        ]);
    }
    
    public function actionShow($id)
    {
        $post = Post::findOne(['id' => $id]);
        return $this->render('show',[
            'post' => $post,
        ]);
        
    }

}
