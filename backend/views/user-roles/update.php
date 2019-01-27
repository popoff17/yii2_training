<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\AuthItem */

$this->title = 'Обновить роль: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Роли пользователей', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="user-roles-update">
	<div class="col-md-10">	
		<h1><?= Html::encode($this->title) ?></h1>

		<div class="user-roles-form">
			<?php $form = ActiveForm::begin(); ?>
			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'type')->textInput() ?>
			<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'rule_name')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'created_at')->textInput() ?>
			<?= $form->field($model, 'updated_at')->textInput() ?>
			<div class="form-group">
				<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
	<div class="col-md-2">	
	
		<p><?= Html::a('Список ролей', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать роль', ['create'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Просмотр роли', ['view', 'id' => $model->name], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Удалить', ['delete', 'id' => $model->name], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Действительно удалить роль?',
				'method' => 'post',
			],
		]) ?></p>
	</div>
	<div class="clearfix"></div>
</div>
