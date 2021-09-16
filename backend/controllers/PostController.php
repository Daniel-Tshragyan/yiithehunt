<?php

namespace backend\controllers;

use common\models\CategoryPost;
use common\models\Post;
use backend\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\controllers\AdminController;
use yii\web\UploadedFile;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends AdminController
{
    /**
     * @inheritDoc
     */


    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->image = UploadedFile::getInstance($model, 'image');
                if ($model->upload() && $model->save()) {
                    foreach ($model->categoryIds as $item) {
                        $categoryPost = new CategoryPost();
                        $categoryPost->category_id = $item;
                        $categoryPost->post_id = $model->id;
                        $categoryPost->save();
                    }
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->touch('updated_at');
            $model->image = UploadedFile::getInstance($model, 'image');
            if ($model->upload() && $model->save()) {
                foreach ($model->categoriesPosts as $item) {
                    $item->delete();
                }
                foreach ($model->categoryIds as $item) {
                    $categoryPost = new CategoryPost();
                    $categoryPost->category_id = $item;
                    $categoryPost->post_id = $model->id;
                    $categoryPost->save();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actions()
    {

        return [
            'browse-images' => [
                'class' => 'bajadev\ckeditor\actions\BrowseAction',
                'quality' => 80,
                'maxWidth' => 800,
                'maxHeight' => 800,
                'useHash' => true,
                'url' => '@web/images/editor/',
                'path' => '@frontend/web/images/editor/',
            ],
            'upload-images' => [
                'class' => 'bajadev\ckeditor\actions\UploadAction',
                'quality' => 80,
                'maxWidth' => 800,
                'maxHeight' => 800,
                'useHash' => true,
                'url' => '@web/images/editor/',
                'path' => '@frontend/web/images/editor/',
            ],
        ];
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
