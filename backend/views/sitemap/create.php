<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sitemap */

$this->title = 'Create Sitemap';
$this->params['breadcrumbs'][] = ['label' => 'Sitemaps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sitemap-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
