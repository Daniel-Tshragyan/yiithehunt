<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="category" style="width:100%">
    <a href="<?=$model->getViewUrl()?>">
        <h2><?= Html::encode($model->title) ?>-<?=$model->getPostsCount()?></h2>
    </a>
</div>