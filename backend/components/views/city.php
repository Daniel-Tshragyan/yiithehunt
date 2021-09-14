<?php

use yii\widgets\DetailView;

?>
<?= DetailView::widget([
    'model' => $city,
    'attributes' => [
        'name'
    ],
]) ?>