$(document).ready(function(){
	init();
	filtroLinha();
});


/* ============
   CHECKBOX
   ============ */
function filtroLinha(){
	$('.labelCheckbox input:checkbox').styleRadioCheckbox({ classChecked: 'inputCheckboxChecked', classFocus: 'inputFocus' });
	$('.filtroLink input:checkbox').styleRadioCheckbox({ classChecked: 'filtroLinkAtivo', classFocus: 'filtroLinkFocus' });

	var $linhas = $('#filtroLinhas'),
		$categorias = $('#filtroCategorias'),
		$animais = $('#filtroAnimais');

	$linhas.on('change.filtro', 'input', function(event) {
		$linhas.find('input').not($(this)).prop('checked', false).parents('label').removeClass('filtroLinkAtivo');
		var val = $(this).val();
		$categorias.show().find('.filtroUl').hide().filter('[data-linha$="'+val+'"]').show();
	});

	$categorias.on('change.filtro', 'input', function(event) {
		$linhas.find('input').not($(this)).prop('checked', false).parents('label').removeClass('filtroLinkAtivo');
		var val = $(this).val();
		$categorias.show().find('.filtroUl').hide().filter('[data-linha$="'+val+'"]').show();
	});
}
