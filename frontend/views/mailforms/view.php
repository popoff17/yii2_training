<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mailforms */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Формы обратной связи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailforms-view">
	<div class="col-md-10">	
    <h1>Форма: <?= Html::encode($this->title) ?></h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'key',
            'title',
            'email:email',
            'phones',
            'request_text_ok',
            'request_text_error',
        ],
    ]) ?>
	</div>
	<div class="col-md-2">	
		<p><?= Html::a('Список форм', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать форму', ['create'], ['class' => 'btn btn-success']) ?></p>
        <p><?= Html::a('Изменить форму', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Удалить', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Действительно удалить форму?',
				'method' => 'post',
			],
		]) ?></p>
	</div>
	<div class="clearfix"></div>
</div>
