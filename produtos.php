<?php
$paginaTit = 'Nossos Produtos';
$navegacao = 'Produtos';
$menu = 'produtos';

$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js');

/*$produtos = produtos();
$smarty->assign('produtos',$produtos);*/

$produtosSubcategorias = produtosSubcategorias();
$smarty->assign('produtosSubcategorias',$produtosSubcategorias);

$animais = animais();
$smarty->assign('animais',$animais);

$linhas = linhas();
$smarty->assign('linhas',$linhas);

$metashare = '
<meta property="og:title" content="'.$paginaTit.' | '.$title.'" />
<meta property="og:description" content="" />
<meta property="og:url" content="'.BASE_DIR.'produtos/" />
<meta property="og:image" content="'.IMG_DIR.'gerais/banner_produtos.png" />
';
if (isset($_GET['id'])) {
	switch ($_GET['id']) {
		case 'estetica-pet': $tituloLinha = 'Estética Pet'; break;
		case 'tratamento': $tituloLinha = 'Tratamento'; break;
		case 'medicamentos': $tituloLinha = 'Medicamentos'; break;
		default: header('location: '.BASE_DIR.'produtos/'); break;
	}

	$metashare = '
	<meta property="og:title" content="'.$tituloLinha.' | '.$navegacao.' | '.$title.'" />
	<meta property="og:description" content="" />
	<meta property="og:url" content="'.BASE_DIR.'produtos/'.$_GET['id'].'/" />
	<meta property="og:image" content="'.IMG_DIR.'gerais/banner_linha_'.$_GET['id'].'.png" />
	';
}
$smarty->assign('metashare',$metashare);

$scriptPre = "<script type=\"text/javascript\">var title = '$title', paginaTit = '$paginaTit', navegacao = '$navegacao', titulo = '$paginaTit | $title', link = '".BASE_DIR."produtos/';</script>";
$smarty->assign('scriptPre',$scriptPre);
?>
