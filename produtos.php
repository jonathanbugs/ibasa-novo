<?php
$paginaTit = 'Produtos';
$navegacao = 'Produtos';
$menu = 'produtos';

$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js');

$produtos = produtos();
$smarty->assign('produtos',$produtos);

$animais = animais();
$smarty->assign('animais',$animais);

$linhas = linhas();
$smarty->assign('linhas',$linhas);

?>
