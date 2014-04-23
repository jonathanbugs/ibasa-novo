$(document).ready(function(){
	init();
	modal();
	playVideo();
});

function playVideo(){
	$('#playVideo').on('click', function(event) {
		event.preventDefault();
		var $modal = $('#modal');
		$modal.find('#modalContent').html('<iframe id="videoApp" src="http://player.vimeo.com/video/65589814?title=0&amp;byline=0&amp;portrait=0&amp;color=d71925&amp;autoplay=1&amp;api=1&amp;player_id=videoCampanha"></iframe>');
		$modal.show();
	});
}
