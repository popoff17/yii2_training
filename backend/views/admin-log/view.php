<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AdminLog */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Логи админ-панели', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-log-view">
	<div class="col-md-10">	
    <h1>Запись: <?= Html::encode($this->title) ?></h1>
		<?= DetailView::widget([
			'model' => $model,
			'attributes' => [
				'id',
				'action',
				'user',
				'time:datetime',
			],
		]) ?>
	</div>
	<div class="col-md-2">	
		<p><?= Html::a('Логи', ['index'], ['class' => 'btn btn-success']) ?></p>
	</div>
	<div class="clearfix"></div>
</div>
