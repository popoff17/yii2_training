<?php

use yii\helpers\Html;


$this->title = 'Обновить настройку: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Настройки SEO', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="settings-seo-update">
    <h1><?= Html::encode($this->title) ?></h1>
	<div class="col-md-10">	
		<?= $this->render('_form', [
			'model' => $model,
		]) ?>
	</div>
	<div class="col-md-2">	
		<p><?= Html::a('Список настроек', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать настройку', ['create'], ['class' => 'btn btn-success']) ?></p>
	</div>
</div>
