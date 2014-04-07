<?php /* Smarty version Smarty-3.1.12, created on 2014-04-07 11:48:28
         compiled from "templates/_rodape.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1574247175342babc241f17-73164903%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42c39aa80c66911ff710ce549df5ddc9ec237d43' => 
    array (
      0 => 'templates/_rodape.tpl',
      1 => 1396882041,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1574247175342babc241f17-73164903',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contato' => 0,
    'endereco' => 0,
    'IMG_DIR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5342babc290416_04517706',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5342babc290416_04517706')) {function content_5342babc290416_04517706($_smarty_tpl) {?><footer id="footer">
	<div id="blocoInformacoes" class="clearfix">
		<div id="blocoTelefone" class="bloco">
			<div class="conteudoInformacoes">
				<div class="table">
					<div class="tableCell">
						<div class="circulo">
							<span class="icone icon_phone"></span>
						</div>
						<div class="conteudo">
							<p class="txt">
								<span>Para dúvidas, críticas e sugestões, utilize o </span>
								<span>Serviço de Atendimento ao Cliente.</span>
							</p>
							<p><span class="fone"><?php echo $_smarty_tpl->tpl_vars['contato']->value['FoneSac'];?>
</span></p>
							<p class="txt">
								<span>De segunda à sexta-feira</span>
								<span>Das 8h30min às 12h - 13h30min às 18h</span>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="blocoEndereco" class="bloco">
			<div class="conteudoInformacoes">
				<div class="table">
					<div class="tableCell">
						<div class="circulo">
							<span class="icone icon_pin"></span>
						</div>
						<div class="conteudo">
							<p><span class="titulo">LABORATÓRIO IBASA LTDA.</span></p>
							<p>
								<span><?php echo $_smarty_tpl->tpl_vars['endereco']->value['Rua'];?>
, <?php echo $_smarty_tpl->tpl_vars['endereco']->value['Numero'];?>
 </span>
								<span>CEP <?php echo $_smarty_tpl->tpl_vars['endereco']->value['CEP'];?>
 - <?php echo $_smarty_tpl->tpl_vars['endereco']->value['Cidade'];?>
 - <?php echo $_smarty_tpl->tpl_vars['endereco']->value['Estado'];?>
 - <?php echo $_smarty_tpl->tpl_vars['endereco']->value['Pais'];?>
</span>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="blocosRodape">
		<div id="conteudoBlocos" class="clearfix">
			<div class="blocoRodape">
				<div class="conteudoBloco">
					<span class="circulo">
						<span class="icone icon_mail"></span>
					</span>
					<span class="txtCadastro">Cadastre-se para receber nossas novidades e conteúdos exclusivos da IBASA em seu e-mail.</span>
					<form id="formNews" class="form" action="javascript:;">
						<div class="relative">
							<label class="label" for="news">Digite seu e-mail</label>
							<input class="input" type="text" id="news" name="news">
							<button class="bt btForm" type="submit">
								<span class="icone arrow_carrot-right_alt"></span>
							</button>
						</div>
					</form>
				</div>
			</div>
			<div class="blocoRodape blocoRodapeFacebook">
				<div class="conteudoBloco">
					<div class="fb-like-box" data-href="https://www.facebook.com/Ibasa.Oficial" data-width="100%" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
				</div>
			</div>
			<div class="blocoRodape blocoRodapeAplicativo">
				<div class="conteudoBloco">
					<div class="txtBaixe">Baixe o nosso Aplicativo</div>
					<img src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
gerais/app.png" data-src2x="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
gerais/app_2x.png" alt="Aplicativo Ibasa" />
					<ul id="linksAppUl" class="clearfix">
						<li class="linksAppLi">
							<a class="linksAppLink geralTransition ir" href="" data-rel="blank">Disponível na App Store</a>
						</li>
						<li class="linksAppLi">
							<a class="linksAppLink geralTransition linksAppLinkAndroid ir" href="" data-rel="blank">Android app on Google Play</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div id="direitos">
		<div id="blocoLogo">
			<a id="spr" class="ir" href="http://www.spr.com.br" data-rel="blank">SPR</a>
		</div>
	</div>
</footer>

<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<?php }} ?>