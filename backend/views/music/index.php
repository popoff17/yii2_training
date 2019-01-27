<?php

use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = 'Музыка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">
	<div class="col-md-10">	
		<h1><?= Html::encode($this->title) ?></h1>
		<h2>Вся музыка для сайта собирается с <?= Html::a('jamendo.com', 'https://www.jamendo.com/artist/492314/the-maugleez', ['label'=>'external', 'target' => '_blank']) ?></h2>
	</div>
	<div class="col-md-2">		
		<p><?= Html::a('Перейти на jamendo.com', 'https://www.jamendo.com/artist/492314/the-maugleez', ['label'=>'external', 'target' => '_blank', 'class' => 'btn btn-success']) ?></p>
	</div>	
</div>
