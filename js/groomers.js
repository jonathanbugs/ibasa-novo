$(document).ready(function(){
	init();
	links();
	perfilGroomer();
	modais();
	dicas();
});

function links(){
	window.scrollTo(0,0);
	if(window.location.hash) {
		var id = window.location.hash;
		var top = $(id).offset().top;
		$('html, body').animate({
			scrollTop: top
		}, 750, 'easeInOutCubic');
	}

	$(".menuGroomers").localScroll({
		duration: 900,
		easing: 'easeInOutExpo',offset: {
			top: 0
		},
		hash: true,
	});
}

function perfilGroomer(){
	$('.listaGroomers .linkLista').on('click', function(){
		var ele = $(this),
			conteudoPerfil = $('.blocoSobreGroomer');

		$('.listaGroomers .linkLista').removeClass('perfilSelecionado');
		ele.toggleClass("perfilSelecionado");

		conteudoPerfil.fadeIn(250);

		var posicao = conteudoPerfil.offset().top - 170;
		
		$("html,body").animate({ 
			scrollTop: posicao
		}, 800);
	});
}

function modais(){
	$(".fancybox").fancybox({
		padding: 5,
		//minWidth: 569,
		tpl : {
		 closeBtn : '<a title="Fechar" class="fancybox-item fancybox-close" href="javascript:;"></a>'
		}
	});
}


function dicas(){
	$(".dicas").fancybox({
		padding: 0,
		//minWidth: 500,
		tpl : {
		 closeBtn : '<a title="Fechar" class="fancybox-item fancybox-close" href="javascript:;"></a>'
		}
	});
}