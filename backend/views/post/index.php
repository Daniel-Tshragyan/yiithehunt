<?php

use common\models\Post;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PostSearch */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
$dataProvider = new ActiveDataProvider([
    'query' => Post::find(),
    'pagination' =>[
        'pageSize' => 3
    ]
]);

?>


<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'image',
            'title',
            'content',
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
