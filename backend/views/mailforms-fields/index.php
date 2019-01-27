<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Поля почтовых форм';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailforms-fields-index">
	<div class="col-md-10">	
		<h1><?= Html::encode($this->title) ?></h1>
		<?= ListView::widget([
			'dataProvider' => $dataProvider,
			'itemOptions' => ['class' => 'item list-group-item'],
			'itemView' => function ($model, $key, $index, $widget) {
				return Html::a(Html::encode($model->type.": ".$model->name.", ".$model->placeholder), ['view', 'id' => $model->id]);
			},
		]) ?>
</div>
	<div class="col-md-2">		
		<p><?= Html::a('Создать поле', ['create'], ['class' => 'btn btn-success']) ?></p>
	</div>
</div>

