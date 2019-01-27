<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Events */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'События', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-view">
	<div class="col-md-10">	
		<h1><?= Html::encode($this->title) ?></h1>
		<?= DetailView::widget([
			'model' => $model,
			'attributes' => [
				'id',
				'alias',
				'title',
				'short_text',
				'text:ntext',
				'date',
			],
		]) ?>
	</div>
	<div class="col-md-2">	
		<p><?= Html::a('Список событий', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать событие', ['create'], ['class' => 'btn btn-success']) ?></p>
        <p><?= Html::a('Изменить событие', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Удалить', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Действительно удалить событие?',
				'method' => 'post',
			],
		]) ?></p>
	</div>
	<div class="clearfix"></div>
</div>