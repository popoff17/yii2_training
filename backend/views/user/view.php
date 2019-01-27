<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
	<div class="col-md-10">	
    <h1>Пользователь: <?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'name',
            'email:email',
            'status',
            'active',
            'created_at',
            'updated_at',
        ],
    ]) ?>

	</div>
	<div class="col-md-2">	
		<p><?= Html::a('Список пользователей', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success']) ?></p>
        <p><?= Html::a('Изменить пользователя', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>
        <p><?= Html::a('Изменить пароль пользователя', ['update-pass', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>
		<? if(Yii::$app->user->id != $model->id){?>
			<p><?= Html::a('Удалить', ['delete', 'id' => $model->id], [
				'class' => 'btn btn-danger',
				'data' => [
					'confirm' => 'Действительно удалить пользователя?',
					'method' => 'post',
				],
			]) ?></p>
		<?}?>
	</div>
	<div class="clearfix"></div>
</div>
