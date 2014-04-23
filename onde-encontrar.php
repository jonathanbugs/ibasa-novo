<?php
$paginaTit = 'Onde Encontrar';
$navegacao = 'onde-encontrar';
$menu = 'onde-encontrar';

$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('css_files', CSS_DIR.'jquery.jscrollpane.css');
$smarty->append('js_files', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDXmIPt9DWoFMEj8ToHZI7F9r8BPerf9jo&sensor=false');
$smarty->append('js_files', JS_DIR.'markerclusterer_packed.js');
$smarty->append('js_files', JS_DIR.$sessao.'.js');

// gerarLojas();
$lojas = lojas();
$smarty->assign('lojas',$lojas);

$representantes = representantes();
$smarty->assign('representantes',$representantes);

$regioes = regioes();
$smarty->assign('regioes',$regioes);

?>
