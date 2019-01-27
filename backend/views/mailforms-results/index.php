<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Входящие сообщения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailforms-results-index">
	<div class="col-md-10">	
		<h1><?= Html::encode($this->title) ?></h1>
		<br/>
		<h2>Выберите почтовую форму</h2>
		<br/>
		<?= ListView::widget([
			'dataProvider' => $dataProvider,
			'itemOptions' => ['class' => 'item list-group-item'],
			'itemView' => function ($model, $key, $index, $widget) {
				return Html::a(Html::encode($model->title), ['form-list', 'id' => $model->id]);
			},
		]) ?>
	</div>
	<div class="col-md-2"></div>
</div>
