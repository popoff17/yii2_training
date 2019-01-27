<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MailformsFields */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Поля почтовых форм', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailforms-fields-view">
	<div class="col-md-10">	
    <h1>Поле: <?= Html::encode($this->title) ?></h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'type',
            'name',
            'placeholder',
            'value',
        ],
    ]) ?>

	</div>
	<div class="col-md-2">	
		<p><?= Html::a('Список полей', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать поле', ['create'], ['class' => 'btn btn-success']) ?></p>
        <p><?= Html::a('Изменить поле', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Удалить', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Действительно удалить поле?',
				'method' => 'post',
			],
		]) ?></p>
	</div>
	<div class="clearfix"></div>
</div>
