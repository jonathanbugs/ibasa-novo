<footer id="footer">
	<div id="blocoInformacoes" class="clearfix">
		<div id="blocoTelefone" class="bloco">
			<div class="conteudoInformacoes">
				<div class="table">
					<div class="tableCell">
						<div class="circulo">
							<span class="icone icon_phone"></span>
						</div>
						<a href="tel:{$contato.FoneSacLink}" class="conteudo">
							<span class="txt">
								<span>Para dúvidas, críticas e sugestões, utilize o </span>
								<span>Serviço de Atendimento ao Cliente.</span>
							</span>
							<span class="fone">{$contato.FoneSac}</span>
							<span class="txt">
								<span>De segunda à sexta-feira</span>
								<span>Das 8h30min às 12h - 13h30min às 18h</span>
							</span>
						</a>
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
						<a href="{$contato.Mapa}" class="conteudo" target="_blank">
							<span class="titulo">LABORATÓRIO IBASA LTDA.</span>
							<span>
								<span>{$endereco.Rua}, {$endereco.Numero}</span>
								<span>CEP {$endereco.CEP} - {$endereco.Cidade} - {$endereco.Estado} - {$endereco.Pais}</span>
							</span>
						</a>
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
					<img src="{$IMG_DIR}gerais/app.png" data-src2x="{$IMG_DIR}gerais/app_2x.png" alt="Aplicativo Ibasa" />
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

<div id="modal">
	<div id="modalOverlay"></div>
	<a href="javascript:;" id="modalFechar" class="bt circulo">
		<span class="icone icon_close"></span>
	</a>
	<div id="modalContent"></div>
</div>

{*}
<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
{*}
