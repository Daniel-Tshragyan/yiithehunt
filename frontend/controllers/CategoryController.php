<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Category;
use yii\web\NotFoundHttpException;

class CategoryController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionShow($id)
    {
        if (($model = Category::findOne(['id' => $id])) !== null) {
            return $this->render('show',[
                'category' => $model,
            ]);
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}