<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Social */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Ссылки на соцсети', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-view">
	<div class="col-md-10">	
		<h1><?= Html::encode($this->title) ?></h1>
		<?= DetailView::widget([
			'model' => $model,
			'attributes' => [
				'id',
				'title',
				'link',
			],
		]) ?>
	</div>
	<div class="col-md-2">	
		<p><?= Html::a('Список ссылок', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать ссылку', ['create'], ['class' => 'btn btn-success']) ?></p>
        <p><?= Html::a('Изменить ссылку', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Удалить ссылку', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Действительно удалить ссылку?',
				'method' => 'post',
			],
		]) ?></p>
	</div>
	<div class="clearfix"></div>
</div>
