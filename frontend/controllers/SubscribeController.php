<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Subscribe;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SubscribeController extends Controller
{
    public function actionAdd()
    {
        $category = Category::findOne(['id' => Yii::$app->request->post()['category']]);
        if ($category->isUserSubscribed()) {
             throw new NotFoundHttpException('You are already subscribed!!!!');;
        } else {
            $subscribe = new Subscribe();
            $subscribe->user_id = Yii::$app->user->id;
            $subscribe->category_id = $category->id;
            $subscribe->save();
            return $this->redirect(['post/']);
        }
    }

    public function actionRemove(){
        $category = Category::findOne(['id' => Yii::$app->request->post()['category']]);
        if (!$category->isUserSubscribed()) {
            throw new NotFoundHttpException('You are not subscribed!!!!');
        } else {
            foreach ($category->subscribes as $item) {
                if ($item->user_id == Yii::$app->user->id){
                    $item->delete();
                }
            }
            return $this->redirect(['post/']);
        }
    }
}