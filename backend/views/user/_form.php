<?php

use common\models\City;
use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$data = \yii\helpers\ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name');
/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'password')->textInput(['value' => '']) ?>

    <?php

    if ($model->role == User::ROLE_CANDIDATE) {
        echo $form->field($model->candidate, 'profession')->textInput();
        echo $form->field($model->candidate, 'age')->textInput(['type' => 'number']);
        echo $form->field($model->candidate, 'city')->dropdownList($data, ['prompt'=>'Select City']);
        echo $form->field($model->candidate, 'location')->textInput();
        echo $form->field($model->candidate, 'image')->fileInput();
    }

    if ($model->role == User::ROLE_COMPANY) {
        echo $form->field($model->company, 'tagline')->textInput();
        echo $form->field($model->company, 'companyname')->textInput();
        echo $form->field($model->company, 'city')->dropdownList($data, ['prompt'=>'Select City']);
        echo $form->field($model->company, 'location')->textInput();
        echo $form->field($model->company, 'image')->fileInput();
    }

    ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
