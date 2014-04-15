<!-- HEADER SESSAO TITULO -->
<header id="sessaoTitulo">
	<span class="bg bg1"></span>
	<span class="bg bg2"></span>
	<div class="container">
		<div class="containerGeral">
			<div id="blocoTitulo">
				<h2 class="tituloSessao">
					<span class="titulo">{$prod.Titulo}</span>
				</h2>
				{if $prod.SubTitulo}
				<p class="descricaoSessao">{$prod.SubTitulo}</p>
				{/if}
			</div>
		</div>
	</div>
</header>

<!-- SESSAO PRODUTO DETALHE -->
<section id="produto" class="sessao">
	<div class="container">
		<div class="containerGeral clearfix">

			<div class="conteudoProduto clearfix">
				<div class="produtoImagem">
					<div id="boxProduto">
						<div class="holderImagens">
							<img src="{$MIDIA_DIR}produtos/interna/{$prod.Capa}" id="produto1">
							<img src="{$MIDIA_DIR}produtos/interna/{$prod.Capa}" id="produto2">
							<img src="{$MIDIA_DIR}produtos/interna/{$prod.Capa}" id="produto3">
						</div>
					</div>

					<ul class="btsUl">
						{if $prod.Bula}
						<li class="btsLi">
							<a class="btsLink geralTransition" href="{$MIDIA_DIR}produtos/arquivos/{$prod.Bula}" data-rel="blank">Fazer download da bula em PDF</a>
						</li>
						{/if}
						<li class="btsLi">
							<a class="btsLink btsLinkEncontrar geralTransition" href="{$BASE_DIR}onde-encontrar/">onde encontrar este produto</a>
						</li>
					</ul>
				</div>
				<div class="produtoInformacoes">
					<div class="produtoTitulo table">
						<div class="tableCell">
							<h2 class="titulo">{$prod.Titulo}</h2>
							{if $prod.SubTitulo}
							<p class="descricao">{$prod.SubTitulo}</p>
							{/if}
						</div>
					</div>

					{if $prod.AnimaisUrl}
					<div class="informacoesBloco informacoesBlocoIndicacoes">
						<span class="informacoesTitulo">Indicações</span>

						<ul class="indicacoesUl">
							{foreach $prod.Animais as $animal}
							<li class="indicacoesLi">
								<span class="indicacoesIcone indicacoesIcone_{$animal.Url}"></span>
								<span class="indicacoestitulo">{$animal.Titulo}</span>
							</li>
							{/foreach}
						</ul>
					</div>
					{/if}

					{if $prod.Dicasuso}
					<div class="informacoesBloco">
						<span class="informacoesTitulo informacoesTituloUsar">Modo de Usar</span>
						<p class="informacoesDescricao">{$prod.Dicasuso}</p>
					</div>
					{/if}

					{if $prod.Disponivel}
					<div class="informacoesBloco">
						<span class="informacoesTitulo informacoesTituloDisponivel">Disponível em</span>
						<p class="informacoesDescricao">{$prod.Disponivel}</p>
					</div>
					{/if}

					{if $prod.Composicao}
					<div class="informacoesBloco">
						<span class="informacoesTitulo informacoesTituloComposicao">Composição</span>
						<p class="informacoesDescricao">{$prod.Composicao}</p>
					</div>
					{/if}

					{if $prod.Precaucoes}
					<div class="informacoesBloco">
						<span class="informacoesTitulo informacoesTituloCuidados">Cuidados</span>
						<p class="informacoesDescricao">{$prod.Precaucoes}</p>
					</div>
					{/if}

					<div class="informacoesBloco">
						<span class="informacoesTitulo informacoesTituloDuvidas">Dúvidas Frequentes</span>
						<div class="formDuvida">
							<form action="javascript:;" name="formDuvida" id="formDuvida">
								<p>Envie sua pergunta e receba a resposta.</p>

								<div class="formBloco clearfix">
									<div class="relative">
										<label class="label" for="email">Insira seu e-mail</label>
										<input class="input" type="text" id="email" name="email">
									</div>
								</div>

								<div class="formBloco formBlocoTextarea">
									<label class="label" for="duvida">Qual sua dúvida?</label>
									<textarea class="textarea" name="duvida" id="duvida"></textarea>
								</div>

								<div class="formBloco formBlocoBt clearfix">
									<button class="btForm geralTransition" type="submit">Enviar Dúvida</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- VER TODOS OS PRODUTOS DA LINHA -->
	<div class="todosProdutos">
		<div class="container">
			<div class="containerGeral">
				<div class="conteudoLinha clearfix">
					<div class="verTodos">
						<span>Linha</span>
						<span class="linhaTitulo">{$prod.Categoria}</span>
						<a class="btTodos geralTransition" href="{$BASE_DIR}produtos/{$prod.CategoriaUrl}/">Ver todos produtos desta linha</a>
					</div>

					<div class="imagemLinha">
						<img src="{$IMG_DIR}gerais/banner_linha_{$prod.CategoriaUrl}.png" alt="" />
					</div>
				</div>
			</div>
		</div>
	</div>

{*}
	<!-- MAIS PRODUTOS DA LINHA -->
	<div class="maisProdutos">
		<div class="container">
			<div class="containerGeral">
				<div class="conteudoMaisProdutos">
					<div class="tituloMais clearfix">
						<div class="tituloMaisLinha">
							<span>Confira mais</span>
							<span class="linha">Deocolônias</span>
						</div>
						<a class="btLinhaTodos geralTransition" href="javascript:;">Ver todos produtos de “Deocoloônias”</a>
					</div>

					<div>
						<ul class="maisProdutosUl produtosUl_4produtos clearfix">
							<li class="maisProdutosLi geralTransition">
								<a class="maisProdutosLink" href="javascript:;">
									<h3 class="maisProdutoTitulo">Deocolônia Ange</h3>
									<p class="maisProdutoDescricao">2 EM 1: HIGIENIZADOR E NEUTRALIZADOR DE ODORES</p>
									<span class="maisProduoBlocoimagem table">
										<span class="tableCell">
											<img alt="" src="http://localhost/ibasa/img/gerais/produtos/1.png">
										</span>
									</span>
									<ul class="maisProdutoIndicacoesUl">
										<li><span class="indicacoes">Indicações</span></li>
										<li class="maisIndicacoesLi">
											<span class="iconeAplicacao iconAplicacao_caes"></span>
										</li>
										<li class="maisIndicacoesLi">
											<span class="iconeAplicacao iconAplicacao_gatos"></span>
										</li>
									</ul>
								</a>
							</li>

							<li class="limiter limiter_2"><span></span></li>

							<li class="maisProdutosLi geralTransition">
								<a class="maisProdutosLink" href="javascript:;">
									<h3 class="maisProdutoTitulo">Deocolônia Ange</h3>
									<p class="maisProdutoDescricao">2 EM 1: HIGIENIZADOR E NEUTRALIZADOR DE ODORES</p>
									<span class="maisProduoBlocoimagem table">
										<span class="tableCell">
											<img alt="" src="http://localhost/ibasa/img/gerais/produtos/2.png">
										</span>
									</span>
									<ul class="maisProdutoIndicacoesUl">
										<li><span class="indicacoes">Indicações</span></li>
										<li class="maisIndicacoesLi">
											<span class="iconeAplicacao iconAplicacao_caes"></span>
										</li>
										<li class="maisIndicacoesLi">
											<span class="iconeAplicacao iconAplicacao_gatos"></span>
										</li>
									</ul>
								</a>
							</li>

							<li class="limiter limiter_3"><span></span></li>

							<li class="maisProdutosLi geralTransition">
								<a class="maisProdutosLink" href="javascript:;">
									<h3 class="maisProdutoTitulo">Deocolônia Ange</h3>
									<p class="maisProdutoDescricao">2 EM 1: HIGIENIZADOR E NEUTRALIZADOR DE ODORES</p>
									<span class="maisProduoBlocoimagem table">
										<span class="tableCell">
											<img alt="" src="http://localhost/ibasa/img/gerais/produtos/3.png">
										</span>
									</span>
									<ul class="maisProdutoIndicacoesUl">
										<li><span class="indicacoes">Indicações</span></li>
										<li class="maisIndicacoesLi">
											<span class="iconeAplicacao iconAplicacao_caes"></span>
										</li>
										<li class="maisIndicacoesLi">
											<span class="iconeAplicacao iconAplicacao_gatos"></span>
										</li>
									</ul>
								</a>
							</li>

							<li class="limiter limiter_4"><span></span></li>

							<li class="maisProdutosLi geralTransition">
								<a class="maisProdutosLink" href="javascript:;">
									<h3 class="maisProdutoTitulo">Deocolônia Ange</h3>
									<p class="maisProdutoDescricao">2 EM 1: HIGIENIZADOR E NEUTRALIZADOR DE ODORES</p>
									<span class="maisProduoBlocoimagem table">
										<span class="tableCell">
											<img alt="" src="http://localhost/ibasa/img/gerais/produtos/4.png">
										</span>
									</span>
									<ul class="maisProdutoIndicacoesUl">
										<li><span class="indicacoes">Indicações</span></li>
										<li class="maisIndicacoesLi">
											<span class="iconeAplicacao iconAplicacao_caes"></span>
										</li>
										<li class="maisIndicacoesLi">
											<span class="iconeAplicacao iconAplicacao_gatos"></span>
										</li>
									</ul>
								</a>
							</li>
						</ul>
					</div>

					<a class="btVoltar geralTransition" href="javascript:;">Voltar para a listagem de produtos</a>
				</div>
			</div>
		</div>
	</div>
{*}
</section>
