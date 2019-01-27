<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-form">
	
	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'date')->textInput(['maxlength' => true, 'placeholder' => "Формат: ггг-мм-дд",]) ?>
	<div class="form-group field-gallery-album">
		<label class="control-label" for="gallery-album">Обложка альбома</label>
		<?= Html::fileInput ( "new_image", "", ["id"=>"gallery-album"] ) ?>
		<p>Размер обложки 800х400 px</p>
	</div>
	
	<div style="display:none;">
		<?= $form->field($model, 'image')->hiddenInput(['maxlength' => true]) ?>
	</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
