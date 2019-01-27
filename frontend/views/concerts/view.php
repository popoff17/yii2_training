<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Concerts */

?>
<div class="concerts-view">
    <h1><?= Html::encode($this->title) ?></h1>
	<?= $concert['text']; ?>
	<br/>
	<p><?= $concert['date']; ?></p>
</div>
