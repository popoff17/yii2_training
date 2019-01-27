<?php
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = 'Music';
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1><?= Html::encode($this->title) ?></h1>
	
    <script type="text/javascript">
        $(document).ready(function(){
			var musicPlaylist = [
				<? if($tracks){ ?>
					<? foreach ($tracks as $track){ ?>
						{
							mp3:'<?= $track->audio?>',
							title:'<?= $track->name?>',
							artist:'The Maugleez',
							cover:'<?= $track->image?>'
						},
					<?}?>
				<?}?>
			];
            $('#music_player').ttwMusicPlayer(musicPlaylist, {
                autoPlay:true, 
                jPlayer:{
                    swfPath:'../plugin/jquery-jplayer' 
                }
            });
        });
    </script>	
	<? if($tracks){ ?>
		<div id="music_player" class=""></div>
	<?}?>
	
	<? if($albums){?>
		<div id="albums_block" class="clearfix">
			<div class="albums_list" class="clearfix">
				<? foreach($albums as $album){ ?>
					<a href="/music/<?= $album->id ?>" class="album" data-album_id="<?= $album->id ?>" >
						<div class="album-image" style="background-image:url(<?= $album->image?>);"></div>
						<div class="album-name" ><?= $album->name?></div>
						<div class="album-releasedate" ><?= $album->releasedate?></div>
					</a>
				<?}?>
				<div class="clear"></div>
			</div>
		</div>
	<? } ?>
