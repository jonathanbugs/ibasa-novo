<?php
$paginaTit = 'Nossos Produtos';
$navegacao = 'Produtos';
$menu = 'produtos';

$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js');

$produtos = produtos($_GET['id']);
$prod = $produtos[0];
$smarty->assign('prod',$prod);


$produtosSubcategorias = produtosSubcategorias($prod['SubCategoriaUrl']);
$smarty->assign('produtosSubcategorias',$produtosSubcategorias);

$paginaTit = $prod['Titulo'].' | '.$prod['Categoria'];
$description = strip_tags($prod['Descricao']);
$smarty->assign('description',$description);

$metashare = '
<meta property="og:title" content="'.$paginaTit.' | '.$title.'" />
<meta property="og:description" content="'.strip_tags($prod['Descricao']).'" />
<meta property="og:url" content="'.BASE_DIR.'produto/'.$prod['CategoriaUrl'].'/'.$prod['Url'].'/" />
<meta property="og:image" content="'.MIDIA_DIR.'produtos/interna/'.$prod['Capa'].'" />
';
$smarty->assign('metashare',$metashare);

?>
