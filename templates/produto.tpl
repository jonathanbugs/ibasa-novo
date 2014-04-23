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

					{if $prod.Descricao}
					<div class="informacoesBloco">
						<p class="informacoesDescricao">{$prod.Descricao}</p>
					</div>
					{/if}

					{if $prod.Indicacoes or $prod.AnimaisUrl}
					<div class="informacoesBloco informacoesBlocoIndicacoes">
						<span class="informacoesTitulo">Indicações</span>
						{if $prod.Indicacoes}
						<p class="informacoesDescricao">{$prod.Indicacoes}</p>
						{/if}
						{if $prod.AnimaisUrl}
						<ul class="indicacoesUl">
							{foreach $prod.Animais as $animal}
							<li class="indicacoesLi">
								<span class="indicacoesIcone indicacoesIcone_{$animal.Url}"></span>
								<span class="indicacoestitulo">{$animal.Titulo}</span>
							</li>
							{/foreach}
						</ul>
						{/if}
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

					{if $prod.Composicao || $prod.ComposicaoItem}
					<div class="informacoesBloco">
						<span class="informacoesTitulo informacoesTituloComposicao">Composição</span>
						{if $prod.Composicao}
						<p class="informacoesDescricao">{$prod.Composicao}</p>
						{/if}
						{if $prod.ComposicaoItem}
						<table class="informacoesTabela">
							<thead>
								<tr>
									<th class="informacoesTabelaTh informacoesTabelaLeft">Substância</th>
									<th class="informacoesTabelaTh informacoesTabelaCenter">Qtde.</th>
								</tr>
							</thead>
							<tbody>
								{foreach $prod.ComposicaoItens as $comp}
								<tr class="informacoesTabelaTr informacoesTabelaTr{cycle values="1,2" name="composicao"}">
									<td class="informacoesTabelaTd informacoesTabelaLeft">{$comp.Item|from_charset}</td>
									<td class="informacoesTabelaTd informacoesTabelaCenter">{$comp.Valor|from_charset}</td>
								</tr>
								{/foreach}
							</tbody>
						</table>
						{/if}
					</div>
					{/if}

					{if $prod.Precaucoes}
					<div class="informacoesBloco">
						<span class="informacoesTitulo informacoesTituloCuidados">{if $prod.CategoriaUrl eq 'estetica-pet'}Cuidados{else}Precauções{/if}</span>
						<p class="informacoesDescricao">{$prod.Precaucoes}</p>
					</div>
					{/if}

					{if $prod.Posologia || $prod.PosologiaItem}
					<div class="informacoesBloco">
						<span class="informacoesTitulo informacoesTituloPosologia">Posologia | Modo de Usar</span>
						{if $prod.Posologia}
						<p class="informacoesDescricao">{$prod.Posologia}</p>
						{/if}
						{if $prod.ComposicaoItem}
						<table class="informacoesTabela">
							<thead>
								<tr>
									<th class="informacoesTabelaTh informacoesTabelaLeft">Espécie</th>
									<th class="informacoesTabelaTh informacoesTabelaCenter">Dose</th>
								</tr>
							</thead>
							<tbody>
								{foreach $prod.PosologiaItens as $pos}
								<tr class="informacoesTabelaTr informacoesTabelaTr{cycle values="1,2" name="posologia"}">
									<td class="informacoesTabelaTd informacoesTabelaLeft">{$pos.Item|from_charset}</td>
									<td class="informacoesTabelaTd informacoesTabelaCenter">{$pos.Valor|from_charset}</td>
								</tr>
								{/foreach}
							</tbody>
						</table>
						{/if}
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

								<input type="hidden" name="produto" value="{$prod.Url}">
								<div class="formBloco formBlocoBt clearfix">
									<button id="btFormEnviar" class="btForm btFormEnviar geralTransition" type="submit">Enviar Dúvida</button>
									<button id="btFormEnviando" class="btForm btFormEnviando geralTransition" type="button">
										<span class="iconeHolder">
											<span class="icone icon_loading"></span>
										</span>
										Enviando
									</button>
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


	<!-- MAIS PRODUTOS DA LINHA -->
	<div class="maisProdutos">
		<div class="container">
			<div class="containerGeral">
				<div class="conteudoMaisProdutos">
					<div class="tituloMais clearfix">
						<div class="tituloMaisLinha">
							<!-- <span>Confira mais</span> -->
							<span>Confira todos de</span>
							<span class="linha">{$prod.SubCategoria}</span>
						</div>
						<a class="btLinhaTodos geralTransition" href="{$BASE_DIR}produtos/{$prod.CategoriaUrl}/{$prod.SubCategoriaUrl}/">Ver todos produtos de {$prod.SubCategoria}</a>
					</div>

					<div>
						<ul class="maisProdutosUl clearfix">
							{foreach $produtosSubcategorias.Produtos as $prod}
							<li class="maisProdutosLi geralTransition">
								<a class="maisProdutosLink" href="{$BASE_DIR}produto/{$prod.CategoriaUrl}/{$prod.Url}/">
									<h3 class="maisProdutoTitulo">{$prod.Titulo}</h3>
									<p class="maisProdutoDescricao">{$prod.SubTitulo}</p>
									<span class="maisProduoBlocoimagem table">
										<span class="tableCell">
											<img src="{$MIDIA_DIR}produtos/listagem/{$prod.Capa}" alt="{$prod.Titulo} {$prod.SubTitulo}" />
										</span>
									</span>
									<ul class="maisProdutoIndicacoesUl">
										<li><span class="indicacoes">Indicações</span></li>
										{foreach $prod.Animais as $animal}
										<li class="maisIndicacoesLi">
											<span class="iconeAplicacao iconAplicacao_{$animal.Url}" title="{$animal.Titulo}" data-animal="{$animal.Url}"></span>
										</li>
										{/foreach}
									</ul>
								</a>
							</li>
							{/foreach}
						</ul>
					</div>

					<a class="btVoltar geralTransition" href="{$BASE_DIR}produtos/">Voltar para a listagem de produtos</a>
				</div>
			</div>
		</div>
	</div>

</section>
