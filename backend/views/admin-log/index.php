<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchAdminLog */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Логи админ-панели';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-log-index">
	<div class="col-md-12">	
	<? if($count > 2000){ ?>
		<div class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Внимание!</strong> В таблице логов содержится более 2 000 записей! Рекомендуется очистить таблицу.
		</div>
	<? } ?>
	</div>
	<div class="col-md-10">	
		<h1><?= Html::encode($this->title) ?></h1>
		<?php echo $this->render('_search', ['model' => $searchModel]); ?>
		<?= ListView::widget([
			'dataProvider' => $dataProvider,
			'itemOptions' => ['class' => 'item list-group-item'],
			'itemView' => function ($model, $key, $index, $widget) {
				return Html::a(Html::encode($model->id.' '.$model->user.' '.$model->action), ['view', 'id' => $model->id]);
			},
		]) ?>
	</div>
	<div class="col-md-2">
        <?= Html::a('Очистить все', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Удалить все записи?',
                'method' => 'post',
            ],
        ]) ?>
	</div>
	<div class="clearfix"></div>
</div>