<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="post">
    <a href="<?= $model->getViewUrl()?>" style="width:100%">

        <h2><?= Html::encode($model->title) ?></h2>
        <?php
        if ($model->isUserRead()) {
            echo "<h6 style='color:red'>Readed</h6>";
        }
        ?>
        <?=Html::img( $model->getImgUrl(),['width' => '100%']) ?>
        <small><?= $model->getDate()?></small>
        <?= HtmlPurifier::process($model->shortContent()) ?>
    </a>

</div>