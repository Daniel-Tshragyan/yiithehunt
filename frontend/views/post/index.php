<?php
/* @var $this yii\web\View */

use frontend\components\PostWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\StringHelper;

$this->title = 'Posts';


?>

<div class="container">

    <div class="row">
        <div class="col col-lg-9 d-flex justify-content-between flex-wrap">
            <?php foreach($models as $model):?>
                <div class="col col-lg-4">
                    <a href="<?=Url::toRoute(['post/'.$model->id])?>" style="width:100%">
                        <?=Html::img(Yii::getAlias('@web').'/images/editor/'.$model->image ,['width' => '100%']) ?>
                        <small><?= $model->created_at ?></small>
                        <h6><?= $model->title ?></h6>
                        <div>
                            <?= StringHelper::truncate($model->content,15) ?>
                        </div>
                    </a>

                </div>
            <?php endforeach;?>

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


<?= LinkPager::widget(['pagination' => $pages])?>


