<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?= Html::encode($this->title) ?></title>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="author" content="popoff17@yandex.ru" />   
	<meta name="description" content="<?= $this->context->settings_seo["site_description"] ?>" />
	<meta name="keywords" content="<?= $this->context->settings_seo["keywords"] ?>" />
	
	<!--<meta name="viewport" content="width=1200; user-scalable=false" />-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0,width = device-width, minimum-scale=1.0">

	
	<link rel="icon" type="image/png" href="favicon.png" />
	<link rel="apple-touch-icon-precomposed" href="apple-touch-favicon.png"/>
	
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
	<meta name="format-detection" content="telephone=no">
	<meta http-equiv="x-rim-auto-match" content="none">
    <?= Html::csrfMetaTags() ?>
    <meta charset="<?= Yii::$app->charset ?>">
	<?php $this->head() ?>
	<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
	<script src="/js/jquery.min.js"></script>
	<!--player-->
	<link rel="stylesheet" type="text/css" href="/js/player/css/style.css">
	<script type="text/javascript" src="/js/player/jquery-jplayer/jquery.jplayer.js"></script>
	<script type="text/javascript" src="/js/player/ttw-music-player-min.js"></script>
	<? if(stristr(Yii::$app->controller->route, 'music') === FALSE) { //фикс для страницы музыки?>
    <script type="text/javascript">
        $(document).ready(function(){
			var myPlaylist = [
				{
					mp3:'/uploads/mp3/1.mp3',
					title:'#1',
					artist:'The Maugleez',
				}
			];
            $('#player').ttwMusicPlayer(myPlaylist, {
                autoPlay:true, 
                jPlayer:{
                    swfPath:'../plugin/jquery-jplayer' //You need to override the default swf path any time the directory structure changes
                }
            });
        });
    </script>	
	<?}?>
	<!--fancybox-->
	<!-- Add fancyBox -->
	<link rel="stylesheet" href="/js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="/js/fancybox/jquery.fancybox.pack.js"></script>
	<!-- Optionally add helpers - button, thumbnail and/or media -->
	<link rel="stylesheet" href="/js/fancybox/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
	<script type="text/javascript" src="/js/fancybox/helpers/jquery.fancybox-buttons.js"></script>
	<script type="text/javascript" src="/js/fancybox/helpers/jquery.fancybox-media.js"></script>
	<link rel="stylesheet" href="/js/fancybox/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
	<script type="text/javascript" src="/js/fancybox/helpers/jquery.fancybox-thumbs.js"></script>	

		<script src="/js/main.js"></script>
		<link rel="stylesheet" href="/css/reset.css" />
		<link rel="stylesheet" href="/css/import.general.css" />
		<link rel="stylesheet" href="/css/import.fbox.css" />
		<link rel="stylesheet" href="/css/import.fbox.css" />
		<link rel="stylesheet" href="/css/fonts.css" />
		<link rel="stylesheet" href="/css/main.css" />
		<link media="all and (max-width: 1820px)" rel="stylesheet" type="text/css" href="/css/adaptive1820.css" />
		<link media="all and (max-width: 1440px)" rel="stylesheet" type="text/css" href="/css/adaptive1440.css" />
		<link media="all and (max-width: 1280px)" rel="stylesheet" type="text/css" href="/css/adaptive1280.css" />
		<link media="all and (max-width: 1024px)" rel="stylesheet" type="text/css" href="/css/adaptive1000.css" />
		<link media="all and (max-width: 800px)" rel="stylesheet" type="text/css" href="/css/adaptive800.css" />
		<link media="all and (max-width: 640px)" rel="stylesheet" type="text/css" href="/css/adaptive640.css" />
		<link media="all and (max-width: 480px)" rel="stylesheet" type="text/css" href="/css/adaptive480.css" />
</head>
<body>
<?php $this->beginBody() ?>
			<div id="preloader">
				<div id="preloader_content">
					<img src="/images/loading.gif" />
					<div class="loading_text">Loading<span></span></div>
				</div>
			</div>
			<div id="site_wrapper">
				<div id="site_content">
					<div id="header">
						<div class="left_block">
							<? if(stristr(Yii::$app->controller->route, 'music') === FALSE) { //фикс для страницы музыки?>
								<div id="player" class="clearfix"></div>
							<?}?>
						</div>
						<div class="center_block clearfix">
							<div id="mobile_menu_button"></div>
							<a href="/" id="logo">
								<img src="/images/logo.png"/>
							</a>
						</div>
						<div class="right_block"></div>
						<div class="clear"></div>
					</div>
					<div id="middle_block">
						<div id="content_left_block" class="left_block">
							<ul id="main_menu" class="menu clearfix">
								<li id="menu_logo">
									<a href="/">
										<img src="/images/logo.png"/>
									</a>
								</li>
								<li id="menu_close">
									<img src="/images/close.png"/>
								</li>
								<li><a class="a_site" href="/">Home</a></li>
								<li><a class="a_site" href="/pages/biografiya">Bio</a></li>
								<li><a class="a_site" href="/video">Videos</a></li>
								<li><a class="a_site" href="/music">Music</a></li>
								<li><a class="a_site" href="/gallery">Gallery</a></li>
								<li><a class="a_site" href="/events">Events</a></li>
								<li><a class="a_site" href="/concerts">Concerts</a></li>
								<li><a class="a_site" href="/pages/rajder">Rider</a></li>
								<li><a class="a_site" href="/pages/kontakty">Contacts</a></li>
							</ul>
						</div>
						<div id="content_center_block" class="center_block">
							<div id="content_block">
								<?= $content ?>
							</div>
						</div>
						<div id="content_right_block" class="right_block"></div>
						<div class="clear"></div>
					</div>
				</div>
				<footer>
					<div id="social_block" class="left_block">
						<? if(count($this->context->social)){ ?>
							<? foreach($this->context->social as $title=>$link){ ?>
								<a href="<?= $link?>" class="social" target="_blank"><img src="/images/<?= $title?>.png" /></a>
							<? } ?>
						<? } ?>
						<!--<a href="/" class="social"><img src="/images/mail.png" /></a>-->
					</div>
					<div class="center_block">
						<div id="afisha" class="clearfix">
							<? if(count($this->context->concerts)){ ?>
								<? foreach($this->context->concerts as $concert){ ?>
									<div class="afisha_item">
										<div class="afisha_item-date"><?= $concert['date']?></div>
										<a href="/concerts/<?= $concert['alias']?>" class="afisha_item-title"><?= $concert['title']?></a>
									</div>
								<? } ?>
							<? } ?>
						</div>
					</div>
					<div class="right_block clearfix sponsor_block">
						<a href="http://www.amediacymbals.com.tr/" target="_blank" id="amedia" class="endorser">
							<img src="/images/amedia-logo.png" />
						</a>
						<a href="http://amtelectronics.com/" target="_blank" id="amt" class="endorser">
							<img src="/images/amt-logo.png" />
						</a>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</footer>
			</div>
<?php $this->endBody() ?>
<div style="display:none;">
	<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');ga('create', 'UA-87062982-1', 'auto');ga('send', 'pageview');</script>
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">(function (d, w, c) {(w[c] = w[c] || []).push(function() {try {w.yaCounter40790049 = new Ya.Metrika({id:40790049,clickmap:true,trackLinks:true,accurateTrackBounce:true,webvisor:true,trackHash:true});} catch(e) { }});var n = d.getElementsByTagName("script")[0],s = d.createElement("script"),f = function () { n.parentNode.insertBefore(s, n); };s.type = "text/javascript";s.async = true;s.src = "https://mc.yandex.ru/metrika/watch.js";if (w.opera == "[object Opera]") {d.addEventListener("DOMContentLoaded", f, false);} else { f(); }})(document, window, "yandex_metrika_callbacks");	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/40790049" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
</div>
</body>
</html>
<?php $this->endPage() ?>
