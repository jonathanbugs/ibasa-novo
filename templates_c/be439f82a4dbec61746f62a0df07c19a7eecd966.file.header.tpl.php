<?php /* Smarty version Smarty-3.1.12, created on 2014-04-23 14:31:08
         compiled from "templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19465068635357ceace91218-66071898%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be439f82a4dbec61746f62a0df07c19a7eecd966' => 
    array (
      0 => 'templates/header.tpl',
      1 => 1397565721,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19465068635357ceace91218-66071898',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'description' => 0,
    'keywords' => 0,
    'IMG_DIR' => 0,
    'metashare' => 0,
    'tituloFinal' => 1,
    'analytics' => 0,
    'css_files' => 1,
    'css_uri' => 1,
    'BASE_DIR' => 0,
    'CLIENTE' => 0,
    'ipad' => 0,
    'iphone' => 0,
    'android' => 0,
    'scriptPre' => 1,
    'js_files' => 1,
    'js_uri' => 1,
    'scriptExtra' => 1,
    'navegador' => 0,
    'sessao' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5357cead0178f8_80095954',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5357cead0178f8_80095954')) {function content_5357cead0178f8_80095954($_smarty_tpl) {?><!DOCTYPE HTML>
<html dir="ltr" lang="pt-br" class="no-js">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
" />
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
" />
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
icons/favicon.png" />

<?php echo $_smarty_tpl->tpl_vars['metashare']->value;?>


<title><?php echo $_smarty_tpl->tpl_vars['tituloFinal']->value;?>
</title>

<?php if ($_smarty_tpl->tpl_vars['analytics']->value){?>
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', '<?php echo $_smarty_tpl->tpl_vars['analytics']->value;?>
']);
	_gaq.push(['_trackPageview']);
	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
<?php }?>

<?php  $_smarty_tpl->tpl_vars['css_uri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['css_uri']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['css_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['css_uri']->key => $_smarty_tpl->tpl_vars['css_uri']->value){
$_smarty_tpl->tpl_vars['css_uri']->_loop = true;
?>
	<link href="<?php echo $_smarty_tpl->tpl_vars['css_uri']->value;?>
" rel="stylesheet" type="text/css" media="screen" />
<?php } ?>
	<script type="text/javascript">var $BASE_DIR = '<?php echo $_smarty_tpl->tpl_vars['BASE_DIR']->value;?>
', $CLIENTE = '<?php echo $_smarty_tpl->tpl_vars['CLIENTE']->value;?>
', isiPad = '<?php echo $_smarty_tpl->tpl_vars['ipad']->value;?>
', isiPhone = '<?php echo $_smarty_tpl->tpl_vars['iphone']->value;?>
', isiAndroid = '<?php echo $_smarty_tpl->tpl_vars['android']->value;?>
';
	</script>
<?php echo $_smarty_tpl->tpl_vars['scriptPre']->value;?>

<?php  $_smarty_tpl->tpl_vars['js_uri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js_uri']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js_uri']->key => $_smarty_tpl->tpl_vars['js_uri']->value){
$_smarty_tpl->tpl_vars['js_uri']->_loop = true;
?>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_uri']->value;?>
"></script>
<?php } ?>
<?php echo $_smarty_tpl->tpl_vars['scriptExtra']->value;?>

</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("../erro-js.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<?php if ($_smarty_tpl->tpl_vars['navegador']->value){?>
		<?php echo $_smarty_tpl->getSubTemplate ("../erro-navegador.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php }?>


	<div id="wrapper" class="wrapper-<?php echo $_smarty_tpl->tpl_vars['sessao']->value;?>
">

		<?php echo $_smarty_tpl->getSubTemplate ('_topo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		 <div id="content">
<?php }} ?>