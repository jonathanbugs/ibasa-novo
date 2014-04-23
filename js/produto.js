$(document).ready(function(){
	init();
	validaForm();
	imagemProduto();
});

$window.on('load resize orientationchange', imagemProduto);

var imagemProdutoInt;
function imagemProduto(reinit){
	clearInterval(imagemProdutoInt);
	imagemProdutoInt = setInterval(function(){
		clearInterval(imagemProdutoInt);
		var $img = $('#produto1'),
			$holder = $('#boxProduto .holderImagens'),
			w = $img.width(),
			h = $img.height(),
			mw = 80*(w/h),
			mh = (windowHeight>windowWidth) ? windowHeight*0.7 : windowHeight*0.8 ;

		if (windowWidth<=767 && mw>28) $holder.css('max-width', mw+'%');

		w = $img.width();
		h = $img.height();
		if (h>mh) $holder.css('max-height', mh+'px');

		w = $img.width();
		h = $img.height();
		$holder.css({
			'padding-left': Math.floor(w/3)+'px',
			'padding-right': Math.floor(w/3)+'px'
		});
		if (reinit!==false) imagemProduto(false);
	}, 150);
}

/* =========
   VALIDACAO DO FORMULARIO DUVIDAS
   ========= */
function validaForm(){
	var $form = $('#formDuvida'),
		$enviar = $('#btFormEnviar'),
		$enviando = $('#btFormEnviando');
	$form.validate({
		ignore: "",
		errorLabelContainer: "#errorContainer",
		errorElement: "div",
		rules: {
			email: { required: true, email: true },
			duvida: { required: true }
		},
		messages: { email: "", duvida: "" },
		submitHandler: function() {
			$enviar.hide();
			$enviando.show();
			if (typeof postDuvida === 'object' && typeof postDuvida.abort === 'function'){ postDuvida.abort(); }
			var postDuvida = $.post($BASE_DIR+'ajax/post.duvida.php', $form.serialize(), function(data){
				$('#email').val('').prev().show();
				$('#duvida').val('').prev().show();

				$enviando.hide();
				$('#contatoResposta #sucessoContato').fadeTo(1000, 1);
				setTimeout(function() {
					$('#contatoResposta #sucessoContato').fadeTo(500, 0);
					$enviar.fadeTo(1000, 1);
				}, 4000);
			}, 'html');
		},
		errorContainer: $('#contatoResposta #erroContato')
	});
}
