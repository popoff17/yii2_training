<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Video */

$this->title = 'Обновить видео: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Видеозаписи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="video-update">
    <h1><?= Html::encode($this->title) ?></h1>
	<div class="col-md-10">	
		<?= $this->render('_form', [
			'model' => $model,
		]) ?>
	</div>
	<div class="col-md-2">	
		<p><?= Html::a('Список видеозаписей', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать видео', ['create'], ['class' => 'btn btn-success']) ?></p>
	</div>
</div>
