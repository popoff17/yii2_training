<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\User */
$this->title = 'Обновление пароля пользователя: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить пароль';
?>
<div class="user-updatePass">
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
		
		<div class="user-form">
			<?php $form = ActiveForm::begin(); ?>
			<?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'password_confirm')->passwordInput(['maxlength' => true]) ?>
			<div style="display:none;">
				<?= $form->field($model, 'username')->hiddenInput() ?>
				<?= $form->field($model, 'name')->hiddenInput() ?>
				<?= $form->field($model, 'email')->hiddenInput() ?>
				<?= $form->field($model, 'role')->hiddenInput(); ?>
				<?= $form->field($model, 'active')->hiddenInput() ?>
				<?= $form->field($model, 'auth_key')->hiddenInput(['value'=>md5(time())]) ?>
				<?= $form->field($model, 'status')->hiddenInput(['value'=>10]) ?>
				<?= $form->field($model, 'created_at')->hiddenInput(['value'=>time()]) ?>
				<?= $form->field($model, 'updated_at')->hiddenInput(['value'=>time()]) ?>
				<?= $form->field($model, 'action')->hiddenInput(['value'=>'updatePass']) ?>
			</div>
			<div class="form-group">
				<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
		
		
	</div>
	<div class="col-md-2">	
		<p><?= Html::a('Просмотр пользователя', ['view', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Изменить пользователя', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Список пользователей', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success']) ?></p>
	</div>
	<div class="clearfix"></div>
</div>
