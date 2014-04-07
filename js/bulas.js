$(document).ready(function(){
	init();
	filtroBulas();
});


function filtroBulas(){
	var btSelect = $('#btSelect'),
		textoSelect = btSelect.find('.txt');

	btSelect.on('click', function(){
		$(this).toggleClass('btSelectAberto').next().slideToggle(200);

		$('.filtroLink').on('click', function(){
			var textoSelecionado = $(this).html();
			textoSelect.html(textoSelecionado);

			btSelect.removeClass('btSelectAberto');
			$('#filtroUl').slideUp(200);
			$('#formFiltro').find('input[name^=linha]').attr('value', textoSelecionado);
		});
	});
}