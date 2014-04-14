<!-- SESSAO BANNER -->
<section id="sessaoBannerLanding">
	<span class="bg bg1"></span>
	<span class="bg bg2"></span>
	<span class="bg bg3"></span>
	<div class="container">
		<div class="containerGeral">
			<div class="sidebar">
				<div id="filtroLinhas" class="blocoFiltro filtroLinha">
					<span class="titulo">Filtrar por linha</span>
					<ul class="filtroUl">
						{foreach $linhas as $linha}
						<li class="filtroLi">
							<label class="filtroLink geralTransition" data-linha="{$linha.Url}">
								<input type="checkbox" name="linhas" value="{$linha.Url}" style="display:none;" />
								{$linha.Titulo|lower}
							</label>
						</li>
						{/foreach}
					</ul>
				</div>

				<div id="filtroCategorias" class="blocoFiltro filtroCategoria" style="display:none;">
					<span class="titulo">Filtrar categorias</span>
					{foreach $linhas as $linha}
					<ul class="filtroUl filtroUlCheckbox" data-linha="{$linha.Url}" style="display:none;">
						{foreach $linha.SubCategorias as $sub}
						<li class="filtroLi">
							<label class="labelCheckbox">
								<input type="checkbox" name="categorias_{$linha.Url}[]" value="{$sub.Url}" />
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
								<input type="checkbox" name="animais[]" value="{$animal.Url}" />
								{$animal.Titulo}
							</label>
						</li>
						{/foreach}
					</ul>
				</div>
			</div>

			<div class="bannerLinha">
				<div class="linhaTitulo">
					<span>Linha</span>
					<span class="tituloLinha">estética</span>
				</div>

				<div class="linhaImagem linhaImagem-estetica">
					<img src="{$IMG_DIR}gerais/banner_linha_estetica.png" alt="" />
				</div>
			</div>
		</div>
	</div>
</section>

<section id="listagemProdutos">
	<div class="container">
		<div class="containerGeral">
			<div class="produtos">
				<section class="produtoCategorias">
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
				</section>
				<section class="produtoCategorias">
					<h2 class="titulo">Especialidades</h2>
					<ul class="produtosUl produtosUlLast produtosUl_3produtos clearfix">
						{foreach $produtos as $prod}
						<li class="produtosLi geralTransition">
							<a href="javascript:;" class="produtosLink">
								<h3 class="produtoTitulo">{$prod.Titulo} {$prod.SubTitulo}</h3>
								<p class="produtoDescricao">{$prod.Composicao}</p>
								<span class="blocoimagem table">
									<span class="tableCell">
										<img src="{$MIDIA_DIR}produtos/listagem/{$prod.Capa}" alt="{$prod.Titulo} {$prod.SubTitulo}" />
									</span>
								</span>
								<ul class="indicacoesUl">
									<li><span class="indicacoes">Indicações</span></li>
									{foreach $prod.Animais as $animal}
									<li class="indicacoesLi">
										<span class="iconeAplicacao iconAplicacao_{$animal.Url}" title="{$animal.Titulo}"></span>
									</li>
									{/foreach}
								</ul>
							</a>
						</li>
						{/foreach}
					</ul>
				</section>
			</div>
		</div>
	</div>
</section>


