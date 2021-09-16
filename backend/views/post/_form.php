<?php

use bajadev\ckeditor\CKEditor;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);  ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'content')->widget(CKEditor::class, [
        'editorOptions' => [
            'preset' => 'full',
                'inline' => false,
                'filebrowserBrowseUrl' => 'browse-images',
                'filebrowserUploadUrl' => 'upload-images',
                'extraPlugins' => 'imageuploader',
            ],
    ]); ?>


    <?php

    echo $form->field($model, 'categoryIds')->widget(Select2::class, [
        'data' => $model->getdropCategory(),
        'options' => ['placeholder' => 'Select a categories', 'multiple' => true],
        'pluginOptions' => [
            'tags' => true,
            'tokenSeparators' => [',', ' '],
            'maximumInputLength' => 10
        ],
    ])->label('Categories');

    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
