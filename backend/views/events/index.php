<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'События';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailforms-index">
	<div class="col-md-10">	
		<h1><?= Html::encode($this->title) ?></h1>
		<?= ListView::widget([
			'dataProvider' => $dataProvider,
			'itemOptions' => ['class' => 'item list-group-item'],
			'itemView' => function ($model, $key, $index, $widget) {
				return Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);
			},
		]) ?>
	</div>
	<div class="col-md-2">		
		<p><?= Html::a('Создать событие', ['create'], ['class' => 'btn btn-success']) ?></p>
	</div>
</div>
