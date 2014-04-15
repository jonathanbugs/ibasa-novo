<!-- SESSAO BANNER -->
<section id="sessaoBannerLanding">
	<span class="bg bg1"></span>
	<span class="bg bg2"></span>
	<span class="bg bg3"></span>
	<div class="container">
		<div class="containerGeral">
			<form id="filtros" class="sidebar" action="javascript:;" method="post">
				<div id="filtroLinhas" class="blocoFiltro filtroLinha">
					<span class="titulo">Filtrar por linha</span>
					<ul class="filtroUl">
						{foreach $linhas as $linha}
						<li class="filtroLi">
							<label class="filtroLink geralTransition" data-linha="{$linha.Url}">
								<input type="checkbox" name="linhas" value="{$linha.Url}" title="{$linha.Titulo}" {if $linha.Url eq $smarty.get.id}checked="checked"{/if} style="display:none;" />
								{$linha.Titulo|lower}
							</label>
						</li>
						{/foreach}
					</ul>
				</div>

				<div id="filtroCategorias" class="blocoFiltro filtroCategoria" {if !$smarty.get.id}style="display:none;"{/if}>
					<span class="titulo">Filtrar por categoria</span>
					{foreach $linhas as $linha}
					<ul class="filtroUl filtroUlCheckbox" data-linha="{$linha.Url}" {if $linha.Url neq $smarty.get.id}style="display:none;"{/if}>
						{foreach $linha.SubCategorias as $sub}
						<li class="filtroLi">
							<label class="labelCheckbox">
								<input type="checkbox" name="categorias-{$linha.Url}" value="{$sub.Url}" />
								{$sub.Titulo}
							</label>
						</li>
						{/foreach}
					</ul>
					{/foreach}
				</div>

				<div id="filtroAnimais" class="blocoFiltro filtroAnimais blocoFiltroLast">
					<span class="titulo">Filtrar por espécie</span>
					<ul class="filtroUl filtroUlCheckbox">
						{foreach $animais as $animal}
						<li class="filtroLi">
							<label class="labelCheckbox">
								<input type="checkbox" name="animais" value="{$animal.Url}" />
								{$animal.Titulo}
							</label>
						</li>
						{/foreach}
					</ul>
				</div>
			</form>

			<div id="bannerLinha">
				<div class="bannerLinha bannerLinha-produtos" data-linha="">
					<div class="linhaTitulo">
						<span>Nossos</span>
						<span class="tituloLinha">produtos</span>
					</div>

					<div class="linhaImagem linhaImagem-produtos">
						<img src="{$IMG_DIR}gerais/banner_produtos.png" alt="" />
					</div>
				</div>
				<div class="bannerLinha bannerLinha-medicamentos" data-linha="medicamentos">
					<div class="linhaTitulo">
						<span>Linha</span>
						<span class="tituloLinha">medicamentos</span>
					</div>

					<div class="linhaImagem linhaImagem-medicamentos">
						<img src="{$IMG_DIR}gerais/banner_linha_medicamentos.png" alt="" />
					</div>
				</div>
				<div class="bannerLinha bannerLinha-tratamento" data-linha="tratamento">
					<div class="linhaTitulo">
						<span>Linha</span>
						<span class="tituloLinha">tratamento</span>
					</div>

					<div class="linhaImagem linhaImagem-tratamento">
						<img src="{$IMG_DIR}gerais/banner_linha_tratamento.png" alt="" />
					</div>
				</div>
				<div class="bannerLinha bannerLinha-estetica-pet" data-linha="estetica-pet">
					<div class="linhaTitulo">
						<span>Linha</span>
						<span class="tituloLinha">estética pet</span>
					</div>

					<div class="linhaImagem linhaImagem-estetica-pet">
						<img src="{$IMG_DIR}gerais/banner_linha_estetica-pet.png" alt="" />
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="listagemProdutos" class="listagemProdutos">
	<div class="container">
		<div class="containerGeral">
			<div class="produtos">
				{foreach $produtosSubcategorias as $sub}
				<section class="produtoCategorias" data-subcategoria="{$sub.Url}" data-linha="{$sub.LinhaUrl}">
					<h2 class="titulo">{$sub.Titulo}</h2>
					<ul class="produtosUl {*if $sub@last}produtosUlLast{/if*}">
						{foreach $sub.Produtos as $prod}
						<li class="produtosLi geralTransition" data-linha="{$prod.CategoriaUrl}" data-animais="{$prod.AnimaisUrl}">
							<a href="{$BASE_DIR}produto/{$prod.CategoriaUrl}/{$prod.Url}/" class="produtosLink">
								<h3 class="produtoTitulo">{$prod.Titulo}</h3>
								<p class="produtoDescricao">{$prod.SubTitulo}</p>
								<span class="blocoimagem table">
									<span class="tableCell">
										<img src="{$MIDIA_DIR}produtos/listagem/{$prod.Capa}" alt="{$prod.Titulo} {$prod.SubTitulo}" />
									</span>
								</span>
								<ul class="indicacoesUl">
									<li><span class="indicacoes">Indicações</span></li>
									{foreach $prod.Animais as $animal}
									<li class="indicacoesLi">
										<span class="iconeAplicacao iconAplicacao_{$animal.Url}" title="{$animal.Titulo}" data-animal="{$animal.Url}"></span>
									</li>
									{/foreach}
								</ul>
							</a>
						</li>
						{/foreach}
					</ul>
				</section>
				{/foreach}
				<section id="semProdutos" class="semProdutos">
					nenhum produto foi encontrado utilizando estes critérios de pesquisa. <br>
					<a href="{$BASE_DIR}produtos/" id="todosProdutos">clique aqui para ver todos os produtos.</a>
				</section>
				{*}<section class="produtoCategorias">
					<h2 class="titulo">Deocolônias</h2>
					<ul class="produtosUl produtosUl_3produtos clearfix">
						<li class="produtosLi geralTransition">
							<a href="javascript:;" class="produtosLink">
								<h3 class="produtoTitulo">Deocolônia Ange</h3>
								<p class="produtoDescricao">2 EM 1: HIGIENIZADOR E NEUTRALIZADOR DE ODORES</p>
								<span class="blocoimagem table">
									<span class="tableCell">
										<img src="{$IMG_DIR}gerais/produtos/1.png" alt="" />
									</span>
								</span>
								<ul class="indicacoesUl">
									<li><span class="indicacoes">Indicações</span></li>
									<li class="indicacoesLi">
										<span class="iconeAplicacao iconAplicacao_caes"></span>
									</li>
									<li class="indicacoesLi">
										<span class="iconeAplicacao iconAplicacao_gatos"></span>
									</li>
								</ul>
							</a>
						</li>

						<li class="limiter limiter_1"><span></span></li>

						<li class="produtosLi geralTransition">
							<a href="javascript:;" class="produtosLink">
								<h3 class="produtoTitulo">Fluído Desembaraçador Plus</h3>
								<p class="produtoDescricao">+ Remoção de Nós + Secagem Rápida + Proteção Térmica + Brilho</p>
								<span class="blocoimagem table">
									<span class="tableCell">
										<img src="{$IMG_DIR}gerais/produtos/2.png" alt="" />
									</span>
								</span>
								<ul class="indicacoesUl">
									<li><span class="indicacoes">Indicações</span></li>
									<li class="indicacoesLi">
										<span class="iconeAplicacao iconAplicacao_caes"></span>
									</li>
									<li class="indicacoesLi">
										<span class="iconeAplicacao iconAplicacao_gatos"></span>
									</li>
								</ul>
							</a>
						</li>

						<li class="limiter limiter_2"><span></span></li>

						<li class="produtosLi geralTransition">
							<a href="javascript:;" class="produtosLink">
								<h3 class="produtoTitulo">SABONETE ANTIPULGAS E CARRAPATOS</h3>
								<p class="produtoDescricao">PIOLHICIDA E ANTISSÉPTICO</p>
								<span class="blocoimagem table">
									<span class="tableCell">
										<img src="{$IMG_DIR}gerais/produtos/5.png" alt="" />
									</span>
								</span>
								<ul class="indicacoesUl">
									<li><span class="indicacoes">Indicações</span></li>
									<li class="indicacoesLi">
										<span class="iconeAplicacao iconAplicacao_caes"></span>
									</li>
									<li class="indicacoesLi">
										<span class="iconeAplicacao iconAplicacao_gatos"></span>
									</li>
								</ul>
							</a>
						</li>
					</ul>
				</section>{*}
			</div>
		</div>
	</div>
</section>


