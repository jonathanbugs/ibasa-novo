<?php /* Smarty version Smarty-3.1.12, created on 2014-04-07 12:11:52
         compiled from "templates/fale-conosco.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12385335575342c0386f6935-26760604%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81d2ea940585d8e9b74eca1418c4ab58d11ac960' => 
    array (
      0 => 'templates/fale-conosco.tpl',
      1 => 1396883417,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12385335575342c0386f6935-26760604',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contato' => 0,
    'endereco' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5342c03872d8a7_04405451',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5342c03872d8a7_04405451')) {function content_5342c03872d8a7_04405451($_smarty_tpl) {?><!-- HEADER SESSAO TITULO -->
<header id="sessaoTitulo">
	<span class="bg bg1"></span>
	<span class="bg bg2"></span>
	<div class="container">
		<div class="containerGeral">
			<div id="blocoTitulo">
				<h2 class="tituloSessao">
					<span class="icone icon_comment"></span>
					<span class="titulo">Fale Conosco</span>
				</h2>

				<div id="contatos">
					<ul id="contatosul">
						<li class="contatosLi contatosLiDuvidas">
							<div class="table">
								<div class="tableCell">
									<div class="circulo">
										<span class="icone icon_phone"></span>
									</div>
									<p>
										<span>Para dúvidas, críticas e sugestões, utilize</span>
										<span>o Serviço de Atendimento ao Cliente.</span>
									</p>
								</div>
							</div>
						</li>
						<li class="contatosLi contatosLiFone">
							<div class="table">
								<div class="tableCell">
									<span class="fone"><?php echo $_smarty_tpl->tpl_vars['contato']->value['FoneSac'];?>
</span>
									<p class="horarios">
										<span>De segunda à sexta-feira</span>
										<span>Das 8h30min às 12h - 13h30min às 18h</span>
									</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- SESSAO FALE CONOSCO -->
<section id="faleConosco" class="sessao">
	<div class="container">
		<div class="containerGeral clearfix">
			<div id="conteudoFaleConosco">
				<form action="javascript:;" name="formContato" id="formContato">
					<div class="formBloco clearfix">
						<div class="relative">
							<label class="label" for="nome">Nome</label>
							<input class="input" type="text" id="nome" name="nome">
						</div>
						<div class="relative relativeRight">
							<label class="label" for="empresa">Empresa</label>
							<input class="input" type="text" id="empresa" name="empresa">
						</div>
					</div>
					<div class="formBloco clearfix">
						<div class="relative">
							<label class="label" for="telefone">Telefone</label>
							<input class="input" type="text" id="telefone" name="telefone">
						</div>
						<div class="relative relativeRight">
							<label class="label" for="email">E-mail</label>
							<input class="input" type="text" id="email" name="email">
						</div>
					</div>
					<div class="formBloco clearfix">
						<div class="relative">
							<label class="label" for="cidade">Cidade</label>
							<input class="input" type="text" id="cidade" name="cidade">
						</div>
						<div class="relative relativeRight">
							<label class="label" for="estado">Estado</label>
							<input class="input" type="text" id="estado" name="estado">
						</div>
					</div>
					<div class="formBloco formBlocoTextarea clearfix">
						<label class="label" for="mensagem">Mensagem</label>
						<textarea class="textarea" name="mensagem" id="mensagem"></textarea>
					</div>
					<div class="formBloco formBlocoBt clearfix">
						<button class="btForm geralTransition" type="submit">Enviar Mensagem</button>
					</div>
					<div id="contatoResposta">
						<span id="erroContato" class="message">Aconteceu um erro. Tente novamente</span>
						<span id="sucessoContato" class="message">Sua mensagem foi enviada com sucesso!</span>
					</div>
				</form>


				<div id="endereco">
					<span class="titulo">Laboratório IBASA Ltda.</span>
					<span class="endereco"><?php echo $_smarty_tpl->tpl_vars['endereco']->value['Rua'];?>
, <?php echo $_smarty_tpl->tpl_vars['endereco']->value['Numero'];?>
 - CEP <?php echo $_smarty_tpl->tpl_vars['endereco']->value['CEP'];?>
</span>
					<span class="endereco"><?php echo $_smarty_tpl->tpl_vars['endereco']->value['Cidade'];?>
, <?php echo $_smarty_tpl->tpl_vars['endereco']->value['Estado'];?>
 - <?php echo $_smarty_tpl->tpl_vars['endereco']->value['Pais'];?>
</span>
					<a class="btMapa geralTransition" href="javascript:;" data-rel="blank">Ver no google maps</a>
					
					<div class="fone">
						<a href="tel:<?php echo $_smarty_tpl->tpl_vars['contato']->value['Link'];?>
">
							<span class="icone icon_phone"></span>
							<span><span><?php echo $_smarty_tpl->tpl_vars['contato']->value['DDD'];?>
</span> <?php echo $_smarty_tpl->tpl_vars['contato']->value['Fone'];?>
</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php }} ?>