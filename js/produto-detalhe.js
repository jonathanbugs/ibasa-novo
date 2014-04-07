$(document).ready(function(){
	init();
	validaForm();
});



/* =========
   VALIDACAO DO FORMULARIO DUVIDAS
   ========= */
function validaForm(){
	$('#formDuvida').validate({
		ignore: "",
		errorLabelContainer: "#errorContainer", 
		errorElement: "div",
		rules: {
			email:  { required: true, email: true },
			duvida: { required: true },
		},

		messages: {
			email: "",
			duvida: ""
		},

		submitHandler:function() {
			//enviaDuvida();
			
			// $('#contatoResposta #sucessoContato').fadeTo(1000, 1);
			// setTimeout(function() {
			// 	$('#contatoResposta #sucessoContato').fadeTo(500, 0);
			// }, 4000);
		},

		errorContainer: $('#contatoResposta #erroContato')
	});
}

function enviaDuvida(){
	var email   = $("#email").val();
	var duvida  = $("#duvida").val();

	$.post("./ajax/_post.duvida.php", {
		'email'  : email,
		'duvida' : duvida
	},
	function(data){
		$("#email").val('').prev().show();
		$("#duvida").val('').prev().show();
	}, "html");
}


$(window).on('resize', function(){
	//windowHeight = $window.height();
	//windowWidth = $window.width();
	//widthContentProdutos();
	//widthImageProduto();
});

$(window).on('load', function(){
	//widthImageProduto();
});


function widthContentProdutos(){
	var marginProdutos;
	if (!isiPad && !isiPhone && !isiAndroid){
		marginProdutos = 250;
		widthProduto = windowWidth - marginProdutos -17;
	} else {
		marginProdutos = 290;
		widthProduto = windowWidth - marginProdutos -40;
	}

	$('.conteudoProduto').css({
		width: widthProduto,
		left: marginProdutos
	});

	$('#boxProdutoDetalhe').css({
		width: widthProduto
	});
}

function widthImageProduto(){
	var boxProduto = $('#boxProduto'),
		imgProduto = $('#produto1'),
		boxInfo = $('.boxCenterInformacoesProduto'),
		imageProduto = $('.imageProduto');
	var boxProdutoW = boxProduto.width(),
		imgProdutoW = imgProduto.width(),
		imgProdutoH = imgProduto.height(),
		boxInfoW = boxInfo.width(),
		imageProdutoW = imageProduto.width(),
		imageProdutoH = imageProduto.height();
	var logo = 233,
		icones = 110;
	var larguraLimite = Math.floor(windowWidth - logo - icones),
		alturaLimite = Math.floor(windowHeight - 150),
		boxMaxWidth = Math.floor(windowWidth/2-logo);

	boxInfo.css({ 'right': Math.floor((windowWidth/2-boxInfoW)/2) + 30 });

	imgProduto.css({ 'max-width': (boxMaxWidth*0.8), 'max-height': alturaLimite });
	imgProdutoW = imgProduto.width();
	imgProdutoH = imgProduto.height();

	boxProduto.css({
		'width': (imgProdutoW*1.8),
		'max-width': boxMaxWidth,
		'top': Math.floor((windowHeight-imgProdutoH)/2)
	});
	boxProdutoW = boxProduto.width();

	if(boxProdutoW<boxMaxWidth){
		boxProduto.css({ 'left': Math.floor(((boxMaxWidth-boxProdutoW)/2)+logo) });
	} else {
		boxProduto.css({ 'left': logo });
	}

	imageProduto.css({ 'height': windowHeight*1.1 });
	imageProdutoW = imageProduto.width();
	imageProdutoH = imageProduto.height();

	var imageProdutoLeft = boxProduto.offset().left + boxProdutoW/2 - imageProdutoW;
	imageProduto.css({ 'left': (imageProdutoLeft) });
}
