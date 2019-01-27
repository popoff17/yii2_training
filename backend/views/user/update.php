<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\User */
$this->title = 'Обновление пользователя: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="user-update">
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
			<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'role')->dropDownList($authItemArr); ?>
			<?= $form->field($model, 'active')->dropDownList(['1'=>'Да', '0'=>'Нет']) ?>
			
			<div style="display:none;">
				<?= $form->field($model, 'auth_key')->hiddenInput(['value'=>md5(time())]) ?>
				<?= $form->field($model, 'status')->hiddenInput(['value'=>10]) ?>
				<?= $form->field($model, 'created_at')->hiddenInput(['value'=>time()]) ?>
				<?= $form->field($model, 'updated_at')->hiddenInput(['value'=>time()]) ?>
				<?= $form->field($model, 'action')->hiddenInput(['value'=>'update']) ?>
			</div>
			<div class="form-group">
				<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
		
		
	</div>
	<div class="col-md-2">	
	
		<p><?= Html::a('Список пользователей', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Просмотр пользователя', ['view', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Изменить пароль пользователя', ['update-pass', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>
		<? if(Yii::$app->user->id != $model->id){?>
			<p><?= Html::a('Удалить', ['delete', 'id' => $model->id], [
				'class' => 'btn btn-danger',
				'data' => [
					'confirm' => 'Действительно удалить пользователя?',
					'method' => 'post',
				],
			]) ?></p>
		<? } ?>
	</div>
	<div class="clearfix"></div>
</div>
