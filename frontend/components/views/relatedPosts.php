<?php
    use yii\helpers\Html;
    use yii\helpers\StringHelper;
    use yii\helpers\Url;
?>

<div class="row justify-content-center">
    <h1>You may also like</h1>
    <div class="col col-lg-9 d-flex justify-content-between flex-wrap">
        <?php foreach($posts as $post):?>
            <div class="col col-lg-4">
                <a href="<?=Url::toRoute(['post/'.$post->id])?>" style="width:100%">
                    <?=Html::img(Yii::getAlias('@web').'/images/editor/'.$post->image ,['width' => '100%']) ?>
                    <small><?= $post->created_at ?></small>
                    <h6><?= $post->title ?></h6>
                    <div>
                        <?= StringHelper::truncate($post->content,15) ?>
                    </div>
                </a>

            </div>
        <?php endforeach;?>

    </div>