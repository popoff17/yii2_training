<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<div class="gallery-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <? if($items){?>
		<div class="gallery_items clearfix">
			<? foreach($items as $item){?>
				<a href="<?= $item['image']?>" rel="gallery_item" class="gallery_item fancybox">
					<img src="<?= $item['thumb_image']?>" />
				</a>
			<? } ?>
		</div>
	<? } ?>
</div>
