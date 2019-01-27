<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Video */

$this->title = 'Создать концерт';
$this->params['breadcrumbs'][] = ['label' => 'Концерты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-create">
    <h1><?= Html::encode($this->title) ?></h1>
	<div class="col-md-10">	
		<?= $this->render('_form', [
			'model' => $model,
		]) ?>
	</div>
	<div class="col-md-2">	
		<p><?= Html::a('Список концертов', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать концерт', ['create'], ['class' => 'btn btn-success']) ?></p>
	</div>
</div>
