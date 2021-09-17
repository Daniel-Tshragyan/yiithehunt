<?php
/* @var $this yii\web\View */

use frontend\components\CategoryPosts;

$this->title = $category->id

?>

<h1>
    <?=$category->title?>
</h1>

<?= CategoryPosts::widget(['category' => $category])?>
