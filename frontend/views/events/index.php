<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-index">
    <h1><?= Html::encode($this->title) ?></h1>
	<div class="events-list clearfix">
    <? if($events){?>
		<? foreach($events as $event){?>
			<? if($concert->text){
				$tag = "a";
			}else{
				$tag = "div";
			}?>
			<<?= $tag?> href="/events/<?= $event->alias?>" class="event">
				<div class="title"><?= $event->title?></div>
				<div class="short_text"><?= $event->short_text?></div>
				<div class="date"><?= $event->date?></div>
			</<?= $tag?>>
		<? }?>
	<? }?>
	</div>
</div>
