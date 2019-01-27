<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Events */
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-view">
    <h1><?= Html::encode($this->title) ?></h1>
	<?= $event['text']; ?>
	<br/>
	<p><?= $event['date']; ?></p>
</div>
