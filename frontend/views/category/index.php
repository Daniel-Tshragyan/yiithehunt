<?php
/* @var $this yii\web\View */

use frontend\components\RelatedPostsWidget;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\StringHelper;
use yii\widgets\ListView;
use \common\models\Category;

$this->title = 'Categoies';

$dataProvider = new ActiveDataProvider([
    'query' => Category::find(),
    'pagination' => [
        'pageSize' => 4,
    ],
]);
?>

<div class="container">

    <div class="row">
        <div class="col col-lg-9 d-flex justify-content-between flex-wrap">
            <?php
            echo ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_category',
            ]);
            ?>
        </div>
    </div>
</div>




