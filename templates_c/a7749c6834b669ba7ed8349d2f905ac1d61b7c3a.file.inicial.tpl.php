<?php /* Smarty version Smarty-3.1.12, created on 2014-04-07 11:48:28
         compiled from "templates/inicial.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17602571325342babc1d5621-10197226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7749c6834b669ba7ed8349d2f905ac1d61b7c3a' => 
    array (
      0 => 'templates/inicial.tpl',
      1 => 1395089853,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17602571325342babc1d5621-10197226',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'IMG_DIR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5342babc211635_56792171',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5342babc211635_56792171')) {function content_5342babc211635_56792171($_smarty_tpl) {?><!-- SESSAO BANNER -->
<section id="sessaoBanner">
	<span class="bg bg1"></span>
	<span class="bg bg2"></span>
	<span class="bg bg3"></span>
	<div class="container">
		<div class="containerGeral">
			<ul id="banner" data-cycle-fx='scrollHorz' data-cycle-slides="li" data-cycle-swipe='true' data-cycle-log='false' data-cycle-timeout='6000' data-cycle-pager="#pagerBanner">
				<li>
					<a href="javascript:;">
						<img class="bannerImg" src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
banners/1.jpg" alt="" />
					</a>
				</li>
				<li>
					<a href="javascript:;">
						<img class="bannerImg" src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
banners/1.jpg" alt="" />
					</a>
				</li>
			</ul>
			<div id="pagerBanner"></div>
		</div>
	</div>
</section>


<!-- SESSAO BLOCOS -->
<section id="blocos" class="sessao">
	<div class="container">
		<div class="containerGeral clearfix">
			<ul id="blocosUl" class="clearfix">
				<li class="blocosLi">
					<img class="blocosImg" src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
gerais/produtos.png" data-src2x="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
gerais/produtos_2x.png" alt="Sobre a IBASA" />
					<h2 class="blocoTitulo">Sobre a IBASA</h2>
					<p class="blocoDescricao">
						24 anos. Esse é o tempo que trabalhamos 
						pela vida. E assim, sentimos a necessidade
						de crescer, evoluir e fazer cada vez mais. 
						Mais ainda que simples novidades. Uma 
						mudança que marca o nosso novo 
						momento e de todos os nossos parceiros.
					</p>
				</li>
				<li class="blocosLi blocosLiCampanha">
					<img class="blocosImg" src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
gerais/placa.png" data-src2x="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
gerais/placa_2x.png" alt="Campanha" />
					<h2 class="blocoTitulo">Campanha</h2>
					<p class="blocoDescricao">
						Lorem Ipsum is simply dummy text of the 
						printing and typesetting industry. Lorem 
						Ipsum has been the industry's standard 
						dummy text ever since the 1500s
					</p>
				</li>
				<li class="blocosLi blocosLiEncontrar">
					<img class="blocosImg" src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
gerais/mapa.png" data-src2x="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
gerais/mapa_2x.png" alt="Onde Encontrar" />
					<h2 class="blocoTitulo">Onde Encontrar</h2>
					<p class="blocoDescricao">
						This is Photoshop's version  of Lorem Ipsum.
						Proin gravida nibh vel velit auctor aliquet.
						Aenean sollicitudin, lorem quis bibendum auctor,
						nisi elit consequat ipsum, nec sagittis sem nibh
						id elit. Duis sed odio sit amet nibh 
						vulputate cursus a sit.
					</p>
				</li>
			</ul>
		</div>
	</div>
</section>
<?php }} ?>