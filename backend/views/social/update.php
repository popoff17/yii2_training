<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Social */

$this->title = 'Обновить ссылку: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Ссылки на соцсети', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="social-update">
    <h1><?= Html::encode($this->title) ?></h1>
	<div class="col-md-10">	
		<?= $this->render('_form', [
			'model' => $model,
		]) ?>
	</div>
	<div class="col-md-2">	
		<p><?= Html::a('Список ссылок', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать ссылку', ['create'], ['class' => 'btn btn-success']) ?></p>
	</div>
</div>
