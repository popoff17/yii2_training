<?php
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = 'Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1><?= Html::encode($this->title) ?></h1>
	<? if($videos){?>
		<div id="video_block" class="clearfix">
			<div class="video_dates clearfix">
				<div data-year="" class="active">all</div>
				<? foreach($years as $year){ ?>
					<div data-year="_<?= $year?>"><?= $year?></div>
				<? } ?>
			</div>
			<div class="video_list" class="clearfix">
				<? foreach($videos as $video){ ?>
					<? $video_id = str_replace("https://youtu.be/","",$video['link']);?>
					<? $video_year = substr($video["date"], -4);?>
					<a href="https://www.youtube.com/embed/<?= $video_id?>/" class="video_item video_item_<?= $video_year?> fancybox fancybox.iframe" style="background-image:url(//img.youtube.com/vi/<?= $video_id?>/hqdefault.jpg);" title="<?=$video['title']?>">
						<div class="title">Get up!</div>
					</a>
				<?}?>
			</div>
		</div>
	<? } ?>
