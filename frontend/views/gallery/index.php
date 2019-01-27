<?php
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = 'Gallery';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-index">
    <h1><?= Html::encode($this->title) ?></h1>
	<? if($galleryes){?>
		<div class="gallery-items">
			<? foreach ($galleryes as $index => $item) {?>
				<a href="/gallery/<?= $item->alias?>" class="gallery_album">
					<div class="title"><?= $item->title?></div>
					<div class="date"><?= $item->date?></div>
					<div class="image">
						<div class="wrapper"></div>
						<img src="<?= $item->image?>" />
					</div>
				</a>
			<? } ?>
		</div>
	<? } ?>
</div>
