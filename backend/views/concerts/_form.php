<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model app\models\Concerts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="concerts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_text')->textarea(['rows' => 6]) ?>

	<?= $form->field($model, 'text')->widget(TinyMce::className(), [
		'options' => ['rows' => 6],
		'language' => 'es',
		'clientOptions' => [
			'plugins' => [
				"advlist autolink lists link charmap print preview anchor",
				"searchreplace visualblocks code fullscreen",
				"insertdatetime media table contextmenu paste"
			],
			'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
		]
	]);?>

	<?= $form->field($model, 'date')->textInput(['maxlength' => true, 'placeholder' => "Формат: ггг-мм-дд",]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
