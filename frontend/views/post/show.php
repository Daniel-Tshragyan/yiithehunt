<?php
/* @var $this yii\web\View */

use frontend\components\PostWidget;
use yii\helpers\Html;

$this->title = $post->id

?>

    <?=Html::img(Yii::getAlias('@web').'/images/editor/'.$post->image ,['width' => '100%']) ?>
    <small><?= $post->created_at ?></small>
    <h6><?= $post->title ?></h6>
    <div>
        <?= $post->content ?>
    </div>


<?= PostWidget::widget(['post' => $post]);?>
