$(document).ready(function(){
	init();
	validaFormInteresse();
});

function validaFormInteresse(){
	$('#formInteresse').validate({
		ignore: "",
		errorLabelContainer: "#errorContainer", 
		errorElement: "div",
		rules: {
			nome:     { required: true },
			email:    { required: true, email: true },
			telefone: { required: true },
			mensagem: { required: true }
		},

		messages: {
			nome: "",
			email: "",
			telefone: "",
			mensagem: ""
		},

		submitHandler:function() {
			//cadastraInteresse();
		},
		errorContainer: $('#formInteresse .errorBox')
	});

	$('.btEnviarContato').on('click', function(){
		setTimeout(function(){
			$('label.error').siblings('label, span').css({'color':'#FF0000'});
		}, 100);
	});
}