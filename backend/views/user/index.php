<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchUser */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
	<div class="col-md-10">	
		<h1><?= Html::encode($this->title) ?></h1>
		<?php echo $this->render('_search', ['model' => $searchModel]); ?>
		<?= ListView::widget([
			'dataProvider' => $dataProvider,
			'itemOptions' => ['class' => 'item list-group-item'],
			'itemView' => function ($model, $key, $index, $widget) {
				return Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
			},
		]) ?>
	</div>	
	<div class="col-md-2">	
		<p><?= Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success']) ?></p>
	</div>
	<div class="clearfix"></div>
</div>
