$(document).ready(function(){
	init();
	auturaVideo();
	videoComercial();
});


/* ============
   VIDEO COMERCIAL
   ============ */
$(window).on('resize', function(){
	auturaVideo();
});

function auturaVideo(){
	var alturaVideo,
		alturaImagem = $('.boxVideoDestaque').find('#imagem').height();
	$('#vimeoiframeId').height(alturaImagem);
}

function videoComercial(){
	clickMoreVideos();
	var boxVideoDestaque  = $('.boxVideoDestaque'),
		showVideo         = $('.showVideo'),
		maisVideos        = $('.moreVideos'),
		f                 = $('#vimeoiframeId iframe'),
		url               = f.attr('src').split('?')[0],
		status            = $('.status'),
		action;

	if (window.addEventListener){
		window.addEventListener('message', onMessageReceived, false);
	}
	else {
		window.attachEvent('onmessage', onMessageReceived, false);
	}

	function onMessageReceived(e) {
		var data = JSON.parse(e.data);

		switch (data.event) {
			case 'ready':
			onReady();
			break;

			case 'finish':
			onFinish();
			break;
		}
	}

	$('.playVideo').on('click', function() {
		boxVideoDestaque.fadeTo(100,0);
		maisVideos.fadeTo(100,0);
		showVideo.fadeTo(400,1);

		var currentIframeId = $(this).attr('data-video'),
			currentSrc = $(this).attr('data-link'),
			currentvideoId = currentSrc.substring(currentSrc.lastIndexOf('/') + 1);

		f.attr('id', currentIframeId);
		f.attr('src', 'http://player.vimeo.com/video/' + currentvideoId + '?api=1&autoplay=1&color=d71925&player_id='+ currentIframeId);

		if (!isiPad && !isiPhone && !isiAndroid){
			action = 'play';
			post('play');
		}
	});

	function post(action, value) {
		var data = { method: action };
		if (value) { data.value = value; }
		f[0].contentWindow.postMessage(JSON.stringify(data), url);
	}

	function onReady() {
		status.text('ready');
		post('addEventListener', 'finish');
		if(action){ post(action); }
	}

	function onFinish() {
		callbackVideo();
	}

	function callbackVideo(){
		showVideo.hide();
		maisVideos.fadeTo(400,1);
	}
}

function clickMoreVideos(){
	var $videos = $('.boxVideoMenor');
	$videos.on('click', function () {
		var $ele = $(this);
		$videos.show().removeClass('boxVideoMargem');
		$ele.hide();
		$videos.not(':hidden').filter(':eq(0)').addClass('boxVideoMargem');
	});
}