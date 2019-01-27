<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchAdminLog */
/* @var $form yii\widgets\ActiveForm */
?>

<button data-toggle="collapse" data-target="#admin-log-search-panel">Поиск пользователя</button>
<div class="clearfix"></div>
<div class="admin-log-search collapse col-md-6" id="admin-log-search-panel">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?= $form->field($model, 'user') ?>
    <?= $form->field($model, 'time') ?>
    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сброс', ['class' => 'btn btn-default']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<div class="clearfix"></div>