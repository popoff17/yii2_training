<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchUser */
/* @var $form yii\widgets\ActiveForm */
?>

<button data-toggle="collapse" data-target="#user-search-panel">Поиск пользователя</button>
<div class="clearfix"></div>
<div class="user-search collapse col-md-6" id="user-search-panel">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'name') ?>
    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сброс', ['class' => 'btn btn-default']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<div class="clearfix"></div>