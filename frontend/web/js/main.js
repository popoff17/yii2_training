$(document).ready(function() {
	//  Переход по ссылке
	//  Загрузка контента в контент блок через ajax
	//  
	$('a.a_site').click(function() {
		var this_url = location.href;
		var url = $(this).attr('href');
		$("body").removeClass("open_menu");
		// чтобы работал плеер на сайте страницу с музыкой необходимо именно перезагружать для переинициализации
		// поэтому такой небольшой "фикс"
		if(this_url.indexOf('music') == -1 && url.indexOf('music') == -1) {
				$("#preloader").fadeIn();
				$.ajax({
					url: url + '?ajax=1',
					success: function(data){
						setTimeout(function(){
							$("#preloader").fadeOut();
							$('#content_block').html(data);
						}, 500);
					}
				});
				if(url != window.location){
					window.history.pushState(null, null, url);
				}
				return false;
		}
	});
	//	Переход назад по навигации
	$(window).bind('popstate', function() {
		var this_url = location.href;
		var url = location.pathname;
		$("body").removeClass("open_menu");
		if(this_url.indexOf('music') == -1 && url.indexOf('music') == -1) {
			$("#preloader").fadeIn();
			$.ajax({
				url:     url + '?ajax=1',
				success: function(data) {
					$("#preloader").fadeOut();
					$('#content_block').html(data);
				}
			});
		}
	});
	//Анимация загрузки
	var t = 1;
	var text = "";
	setInterval(function(){
		for (i = 0; i < t; i++) {
			text = text + ".";
		}
		$("#preloader .loading_text span").text(text);
		text = "";
		t++;
		if(t > 3){
			t = 0;
		}
	}, 400);
	/* video */
	$(".video_dates div").click(function(){
		$(".video_dates div").removeClass("active");
		$(this).addClass("active");
		var year = $(this).data("year");
		$(".video_item").css({"display":"none"});
		//$(".video_item"+year).css({"display":"block"});
		$(".video_item"+year).fadeIn();
	});
	/* fancybox */
	$(".fancybox").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: true,
		width		: '90%',
		height		: '90%',
		helpers: {
                overlay: {
                    locked: true,
                }
            },    
	});
	
	
	/* делаем так, чтобы при открытии страницы всегда был скрывающийся прелоадер */
	setTimeout(function(){
		$("#preloader").fadeOut()
	},500);
	
	/* mobile menu */
	$("#mobile_menu_button").click(function(){
		$("body").addClass("open_menu");
	})
	$("#menu_close").click(function(){
		$("body").removeClass("open_menu");
	})
	
});