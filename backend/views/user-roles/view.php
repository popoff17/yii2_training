<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AuthItem */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Роли пользователей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-roles-view">
	<div class="col-md-10">
    <h1>Роль: <?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'type',
            'description:ntext',
            'rule_name',
            'data:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>
	</div>
	<div class="col-md-2">	
		<p><?= Html::a('Список ролей', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать роль', ['create'], ['class' => 'btn btn-success']) ?></p>
        <p><?= Html::a('Изменить роль', ['update', 'id' => $model->name], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Удалить', ['delete', 'id' => $model->name], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Действительно удалить роль?',
				'method' => 'post',
			],
		]) ?></p>
	</div>
	<div class="clearfix"></div>
</div>
