<?php

use backend\components\CityWidget;
use yii\widgets\DetailView;

?>
<?= DetailView::widget([
    'model' => $candidate,
    'attributes' => [
        'age',
        'profession',
        'location',
        'image',
    ],
]) ?>

<h1>
    City
</h1>

<?php
    echo CityWidget::widget(['user' => $candidate]);
?>