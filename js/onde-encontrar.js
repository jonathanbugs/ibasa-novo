$(document).ready(function(){
	init();
	selectFiltros();
	$('.scroll').jScrollPane({autoReinitialise: true});
});


function selectFiltros(){
	var btSelect = $('.btSelect'),
		textoSelect;

	btSelect.on('click', function(){
		textoSelect = $(this).find('.txt');
		
		$(this).toggleClass('btSelectAberto').next().slideToggle(200);

		$('.filtroLink').on('click', function(){
			var textoSelecionado = $(this).html();
			textoSelect.html(textoSelecionado);

			if($(this).parents().hasClass('filtrosLiEstado')){
				$('#formEstadoCidades').find('input[name^=estado]').attr('value', textoSelecionado);
			} else {
				$('#formEstadoCidades').find('input[name^=cidade]').attr('value', textoSelecionado);
			}

			$(this).parents('.listaSelectUl').prev().removeClass('btSelectAberto');
			$('.listaSelectUl').slideUp(200);
		});
	});
}
