<?php
require_once('../configs/config.php');
require_once('../classes/class.phpmailer.php');

$email = htmlentities(utf8_decode(trim($_POST['email'])));
$duvida = nl2br(htmlentities(utf8_decode(trim($_POST['duvida']))));
$produto = $_POST['produto'];

ExecutarSQL("INSERT INTO _spr_duvidas SET
				Email = '$email',
				Duvida = '$duvida',
				Produto = '$produto'
			");

$assuntoEmail = utf8_decode('IBASA - Duvida sobre um produto');
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

$email = trim($_POST['email']);
$duvida = nl2br(trim($_POST['duvida']));

$infoProduto = produtos($produto);
$infoProduto = $infoProduto[0];
$tituloProduto = $infoProduto['Titulo'];
$linkProduto = BASE_DIR.'produto/'.$infoProduto['CategoriaUrl'].'/'.$produto.'/';

$mensagemHTML = "
<strong>Email: </strong> $email<br />
<strong>Produto: </strong> $tituloProduto<br />
<strong>Link do Produto: </strong> $linkProduto<br />
<br />
____________________________________  <br />
<br />$duvida
";

if($email!==''&&$produto!==''){
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
