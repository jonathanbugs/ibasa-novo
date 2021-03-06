$(document).ready(function(){
	init();
	filtroLinha();
	sidebar();
});

function filtroLinha(){
	$('.labelCheckbox input:checkbox').styleRadioCheckbox({ classChecked: 'inputCheckboxChecked', classFocus: 'inputFocus' });
	$('.filtroLink input:checkbox').styleRadioCheckbox({ classChecked: 'filtroLinkAtivo', classFocus: 'filtroLinkFocus' });

	$('#todosProdutos').on('click', function(event) {
		event.preventDefault();
		$('input').prop('checked',false).parents('label').removeClass('inputCheckboxChecked').removeClass('filtroLinkAtivo');
		filtrar();
	});

	var $linhas = $('#filtroLinhas'),
		$categorias = $('#filtroCategorias'),
		$animais = $('#filtroAnimais');

	$linhas.on('change.filtro', 'input', function(event) {
		$linhas.find('input').not($(this)).prop('checked', false).parents('label').removeClass('filtroLinkAtivo');
		$categorias.find('input').prop('checked', false).parents('label').removeClass('inputCheckboxChecked');
		var val = $(this).val();
		if ($(this).is(':checked')&&val!==''){
			$categorias.show().find('.filtroUl').hide().filter('[data-linha="'+val+'"]').show();
		} else if (val==='' && $('#urlBusca').val()!==''){
			window.location.replace($BASE_DIR+'produtos/');
		} else {
			$categorias.hide();
		}
		filtrar();
	});
	$categorias.on('change.filtro', 'input', function(event) { filtrar(); });
	$animais.on('change.filtro', 'input', function(event) { filtrar(); });

	if ($('input:checked').length) filtrar();
	function filtrar(){
		var linhas = $linhas.find('input:checked').map(function(){ return this.value; }).get().join(),
			categorias = $categorias.find('input:checked').map(function(){ return this.value; }).get(),
			animais = $animais.find('input:checked').map(function(){ return this.value; }).get();
		var $listagem = $('#listagemProdutos'),
			$sub = $listagem.find('.produtoCategorias'),
			$produtos = $listagem.find('.produtosLi'),
			$banners = $('#bannerLinha').find('.bannerLinha');

		if (linhas && !categorias.length && !animais.length){
			// LINHAS
			$banners.hide().filter('[data-linha="'+linhas+'"]').show();
			$produtos.show();
			$sub.hide().filter('[data-linha="'+linhas+'"]').show();
		} else if(linhas && categorias.length && !animais.length) {
			// LINHAS E CATEGORIAS
			$produtos.show();
			$banners.hide().filter('[data-linha="'+linhas+'"]').show();
			$sub.hide().each(function(index, el) {
				if ($.inArray($(this).attr('data-subcategoria'), categorias)>=0)
					$(this).show();
			});
		} else if(linhas && !categorias.length && animais.length) {
			// LINHAS E ANIMAIS
			$banners.hide().filter('[data-linha="'+linhas+'"]').show();
			$sub.hide();
			$produtos.hide().each(function(index, el) {
				var prod_animais = $(this).attr('data-animais').split(',');
				var prod_categoria = $(this).parents('.produtoCategorias');
				if (prod_animais.length != $(prod_animais).not(animais).length){
					$(this).show();
					if (prod_categoria.attr('data-linha') == linhas)
						prod_categoria.show();
				}
			});
		} else if(linhas && categorias.length && animais.length) {
			// LINHAS E CATEGORIAS E ANIMAIS
			$banners.hide().filter('[data-linha="'+linhas+'"]').show();
			$sub.hide();
			$produtos.hide().each(function(index, el) {
				var prod_animais = $(this).attr('data-animais').split(',');
				var prod_categoria = $(this).parents('.produtoCategorias');
				if (prod_animais.length != $(prod_animais).not(animais).length){
					$(this).show();
					if ($.inArray(prod_categoria.attr('data-subcategoria'), categorias)>=0 && prod_categoria.attr('data-linha') == linhas)
						prod_categoria.show();
				}
			});
		} else if(!linhas && !categorias.length && animais.length) {
			// ANIMAIS
			$sub.hide();
			$produtos.hide().each(function(index, el) {
				var prod_animais = $(this).attr('data-animais').split(',');
				if (prod_animais.length != $(prod_animais).not(animais).length){
					$(this).show().parents('.produtoCategorias').show();
				}
			});
		} else {
			// TODOS OS PRODUTOS
			$banners.hide().filter('.bannerLinha-produtos').show();
			$sub.show();
			$produtos.show();
		}

		if ($produtos.is(':visible')){
			$('#semProdutos').hide();
		} else {
			$sub.hide();
			$('#semProdutos').show();
		}

		/*if (linhas || categorias.length || animais.length)
			$('body,html').animate({ scrollTop: $listagem.offset().top }, 750);*/

		var link2 = link,
			titulo2 = titulo;
		if (linhas){
			link2 = $BASE_DIR+'produtos/'+$linhas.find('input:checked').val()+'/';
			titulo2 = $linhas.find('input:checked').attr('title')+' | '+navegacao+' | '+title;
		} else {
			link2 = link;
			titulo2 = titulo;
		}

		/* ANALYTICS */
		path = link2.split('/');
		path = link2.replace(path[0]+'//'+path[2], '');
		if(typeof _gaq !== 'undefined')
			_gaq.push(['_trackPageview', path]);
		/* URL */
		if(history.pushState){
			document.title = titulo2;
			history.pushState(link2, titulo2, link2);
		}
	}
}

function sidebar(){
	$('.sidebarAbrir').on('click', function(event) {
		event.preventDefault();
		$('.sidebar').toggleClass('sidebarAberta');
		$('body,html').toggleClass('bodySidebarAberta');
	});
	$('.sidebarOverlay').on('click', function(event) {
		$('.sidebar').removeClass('sidebarAberta');
		$('body,html').removeClass('bodySidebarAberta');
	});
}
