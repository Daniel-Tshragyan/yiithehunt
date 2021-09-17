<?php
/* @var $this yii\web\View */

use frontend\components\RelatedPostsWidget;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\StringHelper;
use yii\widgets\ListView;

$this->title = 'Notifications';

$dataProvider = new ActiveDataProvider([
    'query' => $model,
    'pagination' => [
        'pageSize' => 4,
    ],
]);
?>


<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3><?= $this->title?></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="job-alerts-item notification">
                    <h3 class="alerts-title">Your Notifications</h3>
                    <?php
                        echo ListView::widget([
                            'dataProvider' => $dataProvider,
                            'itemView' => '_notification',
                        ]);
                    ?>



                </div>
            </div>
        </div>
    </div>