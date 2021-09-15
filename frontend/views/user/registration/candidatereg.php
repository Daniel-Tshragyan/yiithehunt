<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use common\models\City;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use  common\models\User;

$this->title = 'Candidate Registration';
$this->params['breadcrumbs'][] = $this->title;
$data = \yii\helpers\ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name');

?>
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3><?=$this->title?></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="content" class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-xs-12">
                <div class="page-login-form box">
                    <h3>
                        Create Your account
                    </h3>
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'profession')->textInput() ?>

                    <?= $form->field($model, 'age')->textInput(['type' => 'number']) ?>

                    <?= $form->field($model, 'location')->textInput() ?>

                    <?= $form->field($model, 'city')->dropdownList($data,
                        ['prompt'=>'Select City']
                    );?>

                    <?= $form->field($model, 'image')->fileInput();?>

                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Registration</button>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>