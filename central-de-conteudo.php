<?php
$paginaTit = 'Central de Conteúdo';
$navegacao = 'central-de-conteudo';
$menu = 'central-de-conteudo';

$smarty->append('css_files', CSS_DIR.$sessao.'.css');
$smarty->append('js_files', JS_DIR.$sessao.'.js');

require_once('central-de-conteudo/wp-config.php');

$args = array(
	'type' => 'post',
	'child_of' => 0,
	'parent' => '',
	'orderby' => 'name',
	'order' => 'ASC',
	'hide_empty' => 1,
	'hierarchical' => 1,
	'exclude' => '',
	'include' => '',
	'number' => '',
	'taxonomy' => 'category',
	'pad_counts' => false
);
$categories = get_categories( $args );
$smarty->assign('categories',$categories);
// print('<pre>');print_r($categories);print('</pre>');die();

if (isset($_GET['post'])) {
	$posts_array = array(get_post( $_GET['post'] ));
	$paginaTit = $posts_array[0]->post_title.' | '.$paginaTit;

	$metashare = '
<meta property="og:title" content="'.$paginaTit.' | '.$title.'" />
<meta property="og:description" content="'.strip_tags($posts_array[0]->post_content).'" />
<meta property="og:url" content="http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'" />
<meta property="og:image" content="'.post_imagem($posts_array[0]->ID).'" />
	';
	$smarty->assign('metashare',$metashare);

	$description = strip_tags($descPost);
	$smarty->assign('description',$description);

} else {
	$categoria = (isset($_GET['categoria'])) ? $_GET['categoria'] : '' ;
	$tag = (isset($_GET['tag'])) ? $_GET['tag'] : '' ;
	$paginacao = (isset($_GET['paginacao']) && $_GET['paginacao']>0) ? $_GET['paginacao']-1 : 0 ;
	if ($categoria!=='') {
		$_categoria = get_category($categoria);
		$paginaTit = $_categoria->name.' | '.$paginaTit;
	}
	if ($tag!=='') {
		$_tag = get_tag($tag);
		$paginaTit = $_tag->name.' | '.$paginaTit;
	}
	$args = array(
		'posts_per_page' => 5,
		'offset' => $paginacao,
		'category' => $categoria,
		'orderby' => 'post_date',
		'order' => 'DESC',
		'include' => '',
		'exclude' => '',
		'meta_key' => '',
		'meta_value' => '',
		'post_type' => 'post',
		'post_mime_type' => '',
		'post_parent' => '',
		'post_status' => 'publish',
		'suppress_filters' => true
	);
	$posts_array = get_posts( $args );

	$args = array(
		'posts_per_page' => 5,
		'offset' => $paginacao,
		'term' => $cat||$tag
	);
	$paginacao = paginacao( $args );
	$smarty->assign('paginacao',$paginacao);
}
$smarty->assign('posts_array',$posts_array);
// print('<pre>');print_r($posts_array);print('</pre>');die();

?>
