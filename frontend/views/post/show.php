<?php
/* @var $this yii\web\View */

use frontend\components\RelatedPostsWidget;
use yii\helpers\Html;

$this->title = $post->id

?>

    <?=Html::img(Yii::getAlias('@web').'/images/editor/'.$post->image ,['width' => '100%']) ?>
    <small><?= $post->getDate() ?></small>
    <h6><?= $post->title ?></h6>
    <div>
        <?= $post->content ?>
    </div>


<?= RelatedPostsWidget::widget(['post' => $post]);?>
