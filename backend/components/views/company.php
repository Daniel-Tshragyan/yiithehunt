<?php

use backend\components\CityWidget;
use yii\widgets\DetailView;

?>
<?= DetailView::widget([
    'model' => $company,
    'attributes' => [
        'companyname',
        'tagline',
        'location',
    ],
]) ?>

<h1>
    City
</h1>

<?php
echo CityWidget::widget(['user' => $company]);
?>
