<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Concerts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="concerts-index">
    <h1><?= Html::encode($this->title) ?></h1>
	<div class="concerts-list clearfix">
    <? if($concerts){?>
		<? foreach($concerts as $concert){?>
			<? if($concert->text){
				$tag = "a";
			}else{
				$tag = "div";
			}?>
			<<?= $tag?> href="/concerts/<?= $concert->alias?>" class="concert">
				<div class="title"><?= $concert->title?></div>
				<div class="short_text"><?= $concert->short_text?></div>
				<div class="date"><?= $concert->date?></div>
			</<?= $tag?>>
		<? }?>
	<? }?>
	</div>
</div>
