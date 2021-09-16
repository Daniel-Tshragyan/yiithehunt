<?php
/* @var $this yii\web\View */

use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

$this->title = 'Posts';

$dataProvider = new ActiveDataProvider([
    'query' => $posts,
    'pagination' => [
        'pageSize' => 4,
    ],
]);



?>

<div class="container">

    <div class="row">
        <div class="col col-lg-9 d-flex justify-content-between flex-wrap mainPosts">
            <?php
            echo ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '../../views/post/_post',
            ]);
            ?>
        </div>
    </div>
</div>