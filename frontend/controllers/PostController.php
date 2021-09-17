<?php

namespace frontend\controllers;
use common\models\Post;
use common\models\Category;
use common\models\UsersPosts;
use Yii;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class PostController extends \yii\web\Controller
{
    public function actionIndex($category = null)
    {

        if (!is_null($category)) {
            $category = Category::findOne(['title' => $category]);
            $posts = $category->getPosts();
        } else {
            $posts = Post::find();
        }


        $categories = Category::find()->all();

        return $this->render('index', [
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }


    public function actionShow($id)
    {
        if (($model = Post::findOne(['id' => $id])) !== null) {
            if (!Yii::$app->user->isGuest) {
                if (!$model->isUserRead()) {
                    $userPost = new UsersPosts();
                    $userPost->user_id = Yii::$app->user->id;
                    $userPost->post_id = $model->id;
                    $userPost->save();
                }
            }
            return $this->render('show',[
                'post' => $model,
            ]);
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
