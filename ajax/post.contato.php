<?php
require_once('../configs/config.php');
require_once('../classes/class.phpmailer.php');

$assuntoEmail = utf8_decode('IBASA - Contato pelo site');
$TO = array(
	// 'sac@ibasa.com.br'
	'guilherme@sprdigital.com.br'
);
$CC = array(
);
$BCC = array(
	// 'jonathan@sprdigital.com.br',
	// 'guilherme@sprdigital.com.br'
);

$nome     = trim($_POST['nome']);
$empresa  = trim($_POST['empresa']);
$telefone = trim($_POST['telefone']);
$email    = trim($_POST['email']);
$cidade   = trim($_POST['cidade']);
$estado   = trim($_POST['estado']);
$mensagem = nl2br(trim($_POST['mensagem']));

//die(print_r($_POST));

$mensagemHTML = "
<strong>Nome:     </strong> $nome  <br />
<strong>Empresa:  </strong> $empresa  <br />
<strong>Telefone: </strong> $telefone <br />
<strong>Email:    </strong> $email    <br />
<strong>Cidade:   </strong> $cidade   <br />
<strong>Estado:   </strong> $estado   <br />
<br/>
____________________________________  <br />
<br />$mensagem
";

$sqlNome     = htmlentities(utf8_decode($nome));
$sqlEmpresa  = htmlentities(utf8_decode($empresa));
$sqlCidade   = htmlentities(utf8_decode($cidade));
$sqlEstado   = htmlentities(utf8_decode($estado));
$sqlMensagem = htmlentities(utf8_decode($mensagem));

ExecutarSQL("INSERT INTO _spr_contatos SET
				Nome     = '$sqlNome',
				Empresa  = '$sqlEmpresa',
				Telefone = '$telefone',
				Email    = '$email',
				Cidade   = '$sqlCidade',
				Estado   = '$sqlEstado',
				Mensagem = '$sqlMensagem'
			");

if($nome!==''&&$email!==''){
	$mailer = new PHPMailer();
	$mailer->IsSMTP();
	$mailer->SMTPDebug = 0;
	$mailer->Port = 587;
	$mailer->Host = 'pod51028.outlook.com';
	$mailer->SMTPSecure = 'tls';
	$mailer->SMTPAuth = true;
	// $mailer->Username = 'site@ibasa.com.br';
	// $mailer->Password = 'SITEibasa123';
	// $mailer->SetFrom('site@ibasa.com.br');
	$mailer->Username = 'app@ibasa.com.br';
	$mailer->Password = '@ibasa2014';
	$mailer->SetFrom('app@ibasa.com.br');
	$mailer->AddReplyTo($email);
	if(count($TO)>0){ foreach ($TO as $mail) {
		$mailer->AddAddress($mail);
	} }
	if(count($CC)>0){ foreach ($CC as $mail) {
		$mailer->AddCC($mail);
	} }
	if(count($BCC)>0){ foreach ($BCC as $mail) {
		$mailer->AddBCC($mail);
	} }
	$mailer->Subject = $assuntoEmail;
	$mailer->MsgHTML(utf8_decode($mensagemHTML));

	if($mailer->Send()){
		print(1);
	} else {
		echo $mailer->ErrorInfo;
	}
} else {
	print(0);
}
?>
