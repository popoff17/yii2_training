<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Роли пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-roles-index">
	<div class="col-md-10">	
		<h1><?= Html::encode($this->title) ?></h1>
		<?= ListView::widget([
			'dataProvider' => $dataProvider,
			'itemOptions' => ['class' => 'item list-group-item'],
			'itemView' => function ($model, $key, $index, $widget) {
				return Html::a(Html::encode($model->name), ['view', 'id' => $model->name]);
			},
		]) ?>
	</div>
	<div class="col-md-2">	
		<p><?= Html::a('Создать роль', ['create'], ['class' => 'btn btn-success']) ?></p>
	</div>
	<div class="clearfix"></div>
</div>
