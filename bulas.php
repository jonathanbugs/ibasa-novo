<?php
$paginaTit = 'Bulas';
$navegacao = 'bulas';
$menu = 'bulas';

$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js');

$bulas = bulas();
$smarty->assign('bulas',$bulas);

?>
