<?php
$paginaTit = 'Produto';
$navegacao = 'produtos';
$menu = 'produtos';

$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js');

$produtos = produtos($_GET['id']);
$smarty->assign('prod',$produtos[0]);

?>
