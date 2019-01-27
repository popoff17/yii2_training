<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MailformsResults */

$this->title = 'Create Mailforms Results';
$this->params['breadcrumbs'][] = ['label' => 'Mailforms Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailforms-results-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
