<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mailforms */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Mailforms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailforms-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'key',
            'title',
            'email:email',
            'phones',
            'request_text_ok',
            'request_text_error',
            'template:ntext',
            'form_fields',
        ],
    ]) ?>

</div>
