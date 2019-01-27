<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Video */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Страницы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-log-view">
	<div class="col-md-10">	
    <h1><?= Html::encode($this->title) ?></h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'alias',
            'title',
            'text',
        ],
    ]) ?>
	</div>
	<div class="col-md-2">	
		<p><?= Html::a('Список страниц', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать страницу', ['create'], ['class' => 'btn btn-success']) ?></p>
        <p><?= Html::a('Изменить страницу', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Удалить', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Действительно удалить страницу?',
				'method' => 'post',
			],
		]) ?></p>
	</div>
	<div class="clearfix"></div>
</div>
