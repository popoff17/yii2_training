<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Mailforms */

$this->title = 'Обновить форму: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Формы обратной связи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="mailforms-update">
	<div class="col-md-10">	
		<h1><?= Html::encode($this->title) ?></h1>

		<div class="mailforms-form">
			<?php $form = ActiveForm::begin(); ?>
			<?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'phones')->textInput(['maxlength' => true, 'class'=>'form-control phone']) ?>
			<?= $form->field($model, 'request_text_ok')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'request_text_error')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'template')->textarea(['rows' => 6]) ?>
			<?//= $form->field($model, 'form_fields')->textInput(['maxlength' => true]) ?>
			<div class="form-group">
				<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
			</div>
			<?php ActiveForm::end(); ?>
		</div>

	</div>
	<div class="col-md-2">	
	
		<p><?= Html::a('Список форм', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать форму', ['create'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Просмотр формы', ['view', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Удалить', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Действительно удалить форму?',
				'method' => 'post',
			],
		]) ?></p>
	</div>
	<div class="clearfix"></div>
</div>
