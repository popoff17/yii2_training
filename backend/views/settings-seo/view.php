<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SettingsSeo */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Настройки SEO', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="settings-seo-view">
	<div class="col-md-10">	
    <h1><?= Html::encode($this->title) ?></h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'value',
        ],
    ]) ?>
	</div>
	<div class="col-md-2">	
		<p><?= Html::a('Список настроек', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать настройку', ['create'], ['class' => 'btn btn-success']) ?></p>
        <p><?= Html::a('Изменить настройку', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Удалить', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Действительно удалить настройку?',
				'method' => 'post',
			],
		]) ?></p>
	</div>
	<div class="clearfix"></div>
</div>
