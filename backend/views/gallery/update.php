<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gallery */

$this->title = 'Обновить галерею: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Фотогалерея', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="gallery-update">
    <h1><?= Html::encode($this->title) ?></h1>
	<div class="col-md-10">	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
	</div>
	<div class="col-md-2">	
	
		<p><?= Html::a('Список фотоальбомов', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать фотоальбом', ['create'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Просмотр фотоальбома', ['view', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Удалить', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Действительно удалить фотоальбом?',
				'method' => 'post',
			],
		]) ?></p>
	</div>
	<div class="clearfix"></div>
</div>
