<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\MailformsFields */

$this->title = 'Обновить поле: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Поля почтовых форм', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="mailforms-fields-update">
	<div class="col-md-10">	
		<h1><?= Html::encode($this->title) ?></h1>
		<? if($errors){?>
			<? foreach($errors as $key=>$err){ ?>
				<? foreach($err as $value){ ?>
					<div class="alert alert-danger fade in">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<?= $value ?>
					</div>
				<?}?>
			<?}?>
		<? } ?>
		<div class="mailforms-fields-form">
			<?php $form = ActiveForm::begin(); ?>
			<?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'placeholder')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>
			<div class="form-group">
				<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
			</div>
			<?php ActiveForm::end(); ?>
		</div>

	</div>
	<div class="col-md-2">	
	
		<p><?= Html::a('Список полей', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать поле', ['create'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Просмотр поля', ['view', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Удалить', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Действительно удалить поле?',
				'method' => 'post',
			],
		]) ?></p>
	</div>
	<div class="clearfix"></div>
</div>
