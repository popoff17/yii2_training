<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Video */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Видеозаписи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-log-view">
	<div class="col-md-10">	
    <h1><?= Html::encode($this->title) ?></h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'link',
            'date',
        ],
    ]) ?>
	</div>
	<div class="col-md-2">	
		<p><?= Html::a('Список видеозаписей', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать видеозапись', ['create'], ['class' => 'btn btn-success']) ?></p>
        <p><?= Html::a('Изменить видеозапись', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Удалить', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Действительно удалить видеозапись?',
				'method' => 'post',
			],
		]) ?></p>
	</div>
	<div class="clearfix"></div>
</div>
