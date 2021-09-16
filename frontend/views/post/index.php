<?php
/* @var $this yii\web\View */

use frontend\components\RelatedPostsWidget;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\StringHelper;
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
                    'itemView' => '_post',
                ]);
            ?>
        </div>
        <div class="col col-lg-3">
            <ul>
                <h6 align="center">Categories</h6>
                <li class="nav-item" align="right">
                    <a href="<?=Url::to([''])?>">
                        All
                    </a>
                </li>
                <?php foreach($categories as $category): ?>
                    <li class="nav-item" align="right">
                        <a href="<?=Url::to(['post/', 'category' => $category->title])?>">
                            <?= $category->title ?>
                        </a>
                    </li>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>
</div>




