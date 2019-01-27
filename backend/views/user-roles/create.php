<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\AuthItem */
$this->title = 'Создать роль';
$this->params['breadcrumbs'][] = ['label' => 'Роли пользователей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-roles-create">
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
		<div class="user-roles-form">
			<?php $form = ActiveForm::begin(); ?>
			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
			<div style="display:none;">
				<?= $form->field($model, 'type')->hiddenInput() ?>
				<?= $form->field($model, 'rule_name')->hiddenInput(['maxlength' => true]) ?>
				<?= $form->field($model, 'data')->hiddenInput() ?>
				<?= $form->field($model, 'created_at')->hiddenInput() ?>
				<?= $form->field($model, 'updated_at')->hiddenInput() ?>
			</div>
			<div class="form-group">
				<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
	<div class="col-md-2">	
		<p><?= Html::a('Список ролей', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать роль', ['create'], ['class' => 'btn btn-success']) ?></p>
	</div>
	<div class="clearfix"></div>
</div>
