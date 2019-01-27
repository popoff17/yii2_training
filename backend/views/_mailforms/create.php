<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mailforms */

$this->title = 'Create Mailforms';
$this->params['breadcrumbs'][] = ['label' => 'Mailforms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailforms-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
