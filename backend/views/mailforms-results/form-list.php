<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Входящие сообщения';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = $form['title'];
?>
<div class="mailforms-results-index">
	<div class="col-md-10">	
		<h1><?= Html::encode($this->title) ?></h1>
		<br>
		<h2>Форма: <b><?= $form['title']?></b>.Выберите сообщение</h2>
		<br>
		<?= ListView::widget([
			'dataProvider' => $dataProvider,
			'itemOptions' => ['class' => 'item list-group-item'],
			'itemView' => function ($model, $key, $index, $widget) {
				return Html::a(Html::encode($model->id).". ".date("d-m-Y H:m:i", $model->time), ['view', 'id' => $model->id]);
			},
		]) ?>
	</div>
	<div class="col-md-2"></div>
</div>
