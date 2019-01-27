<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Gallery */

$this->title = 'Создать фотоальбом';
$this->params['breadcrumbs'][] = ['label' => 'Фотоальбомы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-create">
    <h1><?= Html::encode($this->title) ?></h1>
	<div class="col-md-10">	
		<?= $this->render('_form', [
			'model' => $model,
		]) ?>
	</div>
	<div class="col-md-2">	
		<p><?= Html::a('Список фотоальбомов', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать фотоальбом', ['create'], ['class' => 'btn btn-success']) ?></p>
	</div>
</div>
