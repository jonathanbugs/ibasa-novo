$(document).ready(function(){
	init();
	selectEstados();
	validaForm();
});


function selectEstados(){
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

/* =========
   VALIDACAO DO FORMULARIO DE CONTATO
   ========= */
function validaForm(){
	var $form = $('#formContato');
	$form.validate({
		ignore: '',
		errorLabelContainer: '#errorContainer',
		errorElement: 'div',
		rules: {
			nome:     { required: true },
			empresa:  { required: false },
			telefone: { required: true },
			email:    { required: true, email: true },
			cidade:   { required: true },
			estado:   { required: true },
			mensagem: { required: true },
		},
		messages: { nome: '', empresa: '', telefone: '', email: '', cidade: '', estado: '', mensagem: '' },
		submitHandler:function() {
			$.post($BASE_DIR+'ajax/post.contato.php', $form.serialize(), function(data){
				$("#nome").val('').prev().show();
				$("#empresa").val('').prev().show();
				$("#telefone").val('').prev().show();
				$("#email").val('').prev().show();
				$("#cidade").val('').prev().show();
				$("#estado").val('').prev().show();
				$("#mensagem").val('').prev().show();

				$('#contatoResposta #sucessoContato').fadeTo(1000, 1);
				setTimeout(function() {
					$('#contatoResposta #sucessoContato').fadeTo(500, 0);
				}, 4000);
			}, "html");
		},

		errorContainer: $('#contatoResposta #erroContato')
	});
}
