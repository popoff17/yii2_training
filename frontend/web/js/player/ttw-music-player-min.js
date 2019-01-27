/**
 * Created by 23rd and Walnut for Codebasehero.com
 * www.23andwalnut.com
 * www.codebasehero.com
 * User: Saleem El-Amin
 * Date: 6/11/11
 * Time: 6:41 AM
 *
 * License: You are free to use this file in personal and commercial products, however re-distribution 'as-is' without prior consent is prohibited.
 */
(function(a){a.fn.ttwMusicPlayer=function(q,f){var p=this,v,e,g,s,b,h,t,q,u,m,j,l;g={jPlayer:"#jquery_jplayer",jPlayerInterface:".jp-interface",playerPrevious:".jp-interface .jp-previous",playerNext:".jp-interface .jp-next",trackList:".tracklist",tracks:".tracks",track:".track",trackRating:".rating-bar",trackInfo:".track-info",rating:".rating",ratingLevel:".rating-level",ratingLevelOn:".on",title:".title",duration:".duration",buy:".buy",buyNotActive:".not-active",playing:".playing",moreButton:".more",player:".player",artist:".artist",artistOuter:".artist-outer",albumCover:".img",description:".description",descriptionShowing:".showing"};v={ratingCallback:null,currencySymbol:"$",buyText:"BUY",tracksToShow:5,autoPlay:false,jPlayer:{}};e=a.extend(true,{},v,f);j=q;l=0;s=function(){q=new b();u=new h();u.buildInterface();q.init(e.jPlayer);p.bind("mbPlaylistLoaded",function(){p.bind("mbInterfaceBuilt",function(){m=new t()});u.init()})};b=function(){var C=false,O,I={},Q,E=0,G=0,A,H;O={listItem:'<li class="track"><span class="title"></span><span class="duration"></span><span class="rating"></span><a href="#" class="buy not-active" target="_blank"></a></li>',ratingBar:'<span class="rating-level rating-bar"></span>'};function L(T){I=a(".ttw-music-player .jPlayer-container");var S,R;S={swfPath:"jquery-jplayer",supplied:"mp3, oga",solution:"html, flash",cssSelectorAncestor:g.jPlayerInterface,errorAlerts:false,warningAlerts:false};R=a.extend(true,{},S,T);I.bind(a.jPlayer.event.ready,function(){I.bind(a.jPlayer.event.ended,function(U){z()});I.bind(a.jPlayer.event.play,function(U){I.jPlayer("pauseOthers");Q.eq(l).addClass(n(g.playing)).siblings().removeClass(n(g.playing))});I.bind(a.jPlayer.event.playing,function(U){C=true});I.bind(a.jPlayer.event.pause,function(U){C=false});a(g.playerPrevious).click(function(){y();a(this).blur();return false});a(g.playerNext).click(function(){z();a(this).blur();return false});p.bind("mbInitPlaylistAdvance",function(U){var V=this.getData("mbInitPlaylistAdvance");if(V!=l){l=V;N(l)}else{if(!I.data("jPlayer").status.srcSet){N(0)}else{D()}}});K();p.trigger("mbPlaylistLoaded");B(e.autoplay)});I.jPlayer(R)}function B(R){l=0;if(R){N(l)}else{J(l);p.trigger("mbPlaylistInit")}}function J(R){l=R;I.jPlayer("setMedia",j[l])}function N(R){J(R);if(R>=e.tracksToShow){M()}p.trigger("mbPlaylistAdvance");I.jPlayer("play")}function z(){var R=(l+1<j.length)?l+1:0;N(R)}function y(){var R=(l-1>=0)?l-1:j.length-1;N(R)}function D(){if(!C){I.jPlayer("play")}else{I.jPlayer("pause")}}function K(){var R=a();A=p.find(g.tracks);for(var T=0;T<10;T++){R=R.add(O.ratingBar)}for(var S=0;S<j.length;S++){var V=a(O.listItem);V.find(g.rating).html(R.clone());V.find(g.title).html(i(S));V.find(g.duration).html(x(S));d("track",V,S);F(V,S);V.data("index",S);A.append(V)}Q=a(g.track);Q.slice(0,e.tracksToShow).each(function(){E+=a(this).outerHeight()});Q.slice(e.tracksToShow,j.length).each(function(){G+=a(this).outerHeight()});if(G>0){var U=a(g.trackList);A.height(E);U.addClass("show-more-button");U.find(g.moreButton).click(function(){H=a(this);M()})}Q.find(".title").click(function(){N(a(this).parents("li").data("index"))})}function M(){if(c(H)){H=p.find(g.moreButton)}A.animate({height:E+G},function(){H.animate({opacity:0},function(){H.slideUp(function(){H.parents(g.trackList).removeClass("show-more-button");H.remove()})})})}function x(R){return !c(j[R].duration)?j[R].duration:"-"}function F(S,R){if(!c(j[R].buy)){S.find(g.buy).removeClass(n(g.buyNotActive)).attr("href",j[R].buy).html(P(R))}}function P(R){return(!c(j[R].price)?e.currencySymbol+j[R].price:"")+" "+e.buyText}return{init:L,playlistInit:B,playlistAdvance:N,playlistNext:z,playlistPrev:y,togglePlay:D,$myJplayer:I}};t=function(){var x=p.find(g.track);function z(){a(g.rating).find(g.ratingLevel).hover(function(){a(this).addClass("hover").prevAll().addClass("hover").end().nextAll().removeClass("hover")});a(g.rating).mouseleave(function(){a(this).find(g.ratingLevel).removeClass("hover")});a(g.ratingLevel).click(function(){var C=a(this),B=C.parent().children().index(C)+1,A;if(C.hasClass(n(g.trackRating))){B=B/2;A=C.parents("li").data("index");if(A==l){k(B)}}else{A=l;o(x.eq(A),B)}C.prevAll().add(C).addClass(n(g.ratingLevelOn)).end().end().nextAll().removeClass(n(g.ratingLevelOn));y(A,B)})}function y(A,B){j[A].rating=B;r(e.ratingCallback,A,j[A],B)}z()};h=function(){var A,E,G,y;function F(){A=a(g.player),E=A.find(g.title),G=A.find(g.artist),y=A.find(g.albumCover);C();p.bind("mbPlaylistAdvance mbPlaylistInit",function(){z();x();d("current",null,l);B()})}function D(){var H,I;H='<div class="ttw-music-player"><div class="player jp-interface"><div class="album-cover"><span class="img"></span>            <span class="highlight"></span>        </div>        <div class="track-info"><p class="artist-outer"><span class="artist"></span></p><p class="title"></p><div class="rating">                <span class="rating-level rating-star on"></span>                <span class="rating-level rating-star on"></span>                <span class="rating-level rating-star on"></span>                <span class="rating-level rating-star on"></span>                <span class="rating-level rating-star"></span>            </div>        </div>        <div class="player-controls">            <div class="main">                <div class="previous jp-previous"></div>                <div class="play jp-play"></div>                <div class="pause jp-pause"></div>                <div class="next jp-next"></div><!-- These controls aren\'t used by this plugin, but jPlayer seems to require that they exist -->                <span class="unused-controls">                    <span class="jp-video-play"></span>                    <span class="jp-stop"></span>                    <span class="jp-mute"></span>                    <span class="jp-unmute"></span>                    <span class="jp-volume-bar"></span>                    <span class="jp-volume-bar-value"></span>                    <span class="jp-volume-max"></span>                    <span class="jp-current-time"></span>                    <span class="jp-duration"></span>                    <span class="jp-full-screen"></span>                    <span class="jp-restore-screen"></span>                    <span class="jp-repeat"></span>                    <span class="jp-repeat-off"></span>                    <span class="jp-gui"></span>                </span>            </div>            <div class="progress-wrapper">                <div class="progress jp-seek-bar">                    <div class="elapsed jp-play-bar"></div>                </div>            </div>        </div>    </div>    <p class="description"></p>    <div class="tracklist">        <ol class="tracks"> </ol>        <div class="more">View More...</div>    </div>    <div class="jPlayer-container"></div></div>';I=a(H).css({display:"none",opacity:0}).appendTo(p).slideDown("slow",function(){I.animate({opacity:1});p.trigger("mbInterfaceBuilt")})}function z(){E.html(i(l))}function x(){if(c(j[l].artist)){G.parent(g.artistOuter).animate({opacity:0},"fast")}else{G.html(j[l].artist).parent(g.artistOuter).animate({opacity:1},"fast")}}function B(){y.animate({opacity:0},"fast",function(){if(!c(j[l].cover)){var H=l;a('<img src="'+j[l].cover+'" alt="album cover" />',this).imagesLoaded(function(){if(H==l){y.html(a(this)).animate({opacity:1})}})}})}function C(){if(!c(e.description)){p.find(g.description).html(e.description).addClass(n(g.descriptionShowing)).slideDown()}}return{buildInterface:D,init:F}};function i(x){if(!c(j[x].title)){return j[x].title}else{if(!c(j[x].mp3)){return w(j[x].mp3)}else{if(!c(j[x].oga)){return w(j[x].oga)}else{return""}}}}function w(x){x=x.split("/");return x[x.length-1]}function d(z,A,x){if(z=="track"){if(!c(j[x].rating)){o(A,j[x].rating)}}else{var y=!c(j[x].rating)?Math.ceil(j[x].rating):0;k(y)}}function k(x){p.find(g.trackInfo).find(g.ratingLevel).removeClass(n(g.ratingLevelOn)).slice(0,x).addClass(n(g.ratingLevelOn))}function o(y,x){y.find(g.ratingLevel).removeClass(n(g.ratingLevelOn)).slice(0,x*2).addClass(n(g.ratingLevelOn))}function n(x){return x.substr(1)}function r(y){var x=Array.prototype.slice.call(arguments,1);if(a.isFunction(y)){y.apply(this,x)}}function c(x){return typeof x=="undefined"}s()}})(jQuery);(function(a){a.fn.imagesLoaded=function(d){var c=this.filter("img"),b=c.length;c.bind("load",function(){if(--b<=0){d.call(c,this)}}).each(function(){if(this.complete||this.complete===undefined){var e=this.src;this.src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";this.src=e}});return this}})(jQuery);