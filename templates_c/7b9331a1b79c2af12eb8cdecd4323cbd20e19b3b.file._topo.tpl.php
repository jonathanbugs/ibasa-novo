<?php /* Smarty version Smarty-3.1.12, created on 2014-04-08 18:03:33
         compiled from "templates/_topo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11288118953446425b4bfc1-92002277%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b9331a1b79c2af12eb8cdecd4323cbd20e19b3b' => 
    array (
      0 => 'templates/_topo.tpl',
      1 => 1396985437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11288118953446425b4bfc1-92002277',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_DIR' => 0,
    'IMG_DIR' => 0,
    'title' => 0,
    'redes_sociais' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53446425b8dbd7_71666966',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53446425b8dbd7_71666966')) {function content_53446425b8dbd7_71666966($_smarty_tpl) {?><header id="header" class="geralTransition">
	<div class="container">
		<div class="containerGeral clearfix">
			<h1 id="logo">
				<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_DIR']->value;?>
">
					<img src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
logos/logo.png" data-src2x="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
logos/logo_2x.png" alt="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
" width="118" height="82" />
				</a>
			</h1>

			<div id="headerLinks">
				<?php echo $_smarty_tpl->getSubTemplate ('includes/_menu-links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


				<div id="menuBusca">
					<form id="formBusca" class="form" action="javascript:;">
						<div class="relative">
							<label class="label" for="busca">Ex: ibatrim, pulga</label>
							<input class="input" type="text" id="busca" name="busca">
							<button class="bt btForm" type="submit">
								<span class="icone icon_search"></span>
							</button>
						</div>
					</form>
					<nav>
						<a id="btMenu" href="javascript:;">
							<span class="icon">Menu</span>
						</a>

						<div id="menu">
							<?php echo $_smarty_tpl->getSubTemplate ('includes/_menu-links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

							<?php echo $_smarty_tpl->getSubTemplate ('includes/_menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

							<a class="facebook bt" data-rel="blank" href="<?php echo $_smarty_tpl->tpl_vars['redes_sociais']->value['facebook'];?>
">
								<span class="icone social_facebook"></span>
							</a>
						</div>

						<?php echo $_smarty_tpl->getSubTemplate ('includes/_menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

					</nav>
					<a class="facebook bt" data-rel="blank" href="<?php echo $_smarty_tpl->tpl_vars['redes_sociais']->value['facebook'];?>
">
						<span class="icone social_facebook"></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</header>
<?php }} ?>