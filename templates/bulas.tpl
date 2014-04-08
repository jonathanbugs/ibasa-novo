<!-- HEADER SESSAO TITULO -->
<header id="sessaoTitulo">
	<span class="bg bg1"></span>
	<span class="bg bg2"></span>
	<div class="container">
		<div class="containerGeral">
			<div id="blocoTitulo">
				<h2 class="tituloSessao">
					<span class="icone icon_document"></span>
					<span class="titulo">Download de bulas</span>
				</h2>

				<h3 class="descricaoSessao">
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also
				</h3>
			</div>
		</div>
	</div>
</header>

<!-- SESSAO BULAS -->
<section id="bulas" class="sessao">
	<div class="container">
		<div class="containerGeral clearfix">

			<div id="filtro">
				<ul id="filtrosUl" class="clearfix">
					<li class="filtrosLi">
						<form action="javascript:;" name="formFiltro" id="formFiltro">
							<input type="hidden" value="" name="linha" id="linha">
							<a id="btSelect" href="javascript:;">
								<span class="txt">Selecione uma linha</span>
								<span class="icone arrow_carrot-down_alt"></span>
							</a>
							<ul id="filtroUl" class="clearfix">
								<li class="filtroLi">
									<a class="filtroLink geralTransition" href="javascript:;">Todos</a>
								</li>
								<li class="filtroLi">
									<a class="filtroLink geralTransition" href="javascript:;">Linha Medicamentos</a>
								</li>
								<li class="filtroLi">
									<a class="filtroLink geralTransition" href="javascript:;">Linha Tratamento</a>
								</li>
								<li class="filtroLi">
									<a class="filtroLink geralTransition" href="javascript:;">Linha Estética</a>
								</li>
							</ul>
						</form>
					</li>
					<li class="filtrosLi filtrosLiBusca">
						<form action="javascript:;" name="formFiltroBusca" id="formFiltroBusca" class="form">
							<div class="relative">
								<label for="filtroBusca" class="label">Buscar por referência, nome produto</label>
								<input type="text" name="filtroBusca" id="filtroBusca" class="input">
								<button type="submit" class="bt btForm">
									<span class="icone icon_search"></span>
								</button>
							</div>
						</form>
					</li>
				</ul>
			</div>


			<ul id="bulasUl">
				<li class="bulasLi">
					<div class="table">
						<div class="tableCell clearfix">
							<div class="bulasInformacoes clearfix">
								<div class="bulaImagem">
									<img src="{$IMG_DIR}gerais/bula.jpg" alt="" />
								</div>
								<div class="informacoes tableCell">
									<h3 class="produtoTitulo">Ibatrim</h3>
									<span class="produtoTipo">Injetável</span>
									<span class="produtoDescricao">Sulfadiazina + Trimetoprim com potente ação antimicrobiana.</span>
								</div>
							</div>
							<div class="bulasDownload">
								<div class="tableCell">
									<a class="linkDownload geralTransition" href="javascript:;" data-rel="blank">Download da Bula</a>
								</div>
							</div>
						</div>
					</div>
				</li>
				<li class="bulasLi">
					<div class="table">
						<div class="tableCell clearfix">
							<div class="bulasInformacoes clearfix">
								<div class="bulaImagem">
									<img src="{$IMG_DIR}gerais/bula.jpg" alt="" />
								</div>
								<div class="informacoes tableCell">
									<h3 class="produtoTitulo">Ibatrim</h3>
									<span class="produtoTipo">Injetável</span>
									<span class="produtoDescricao">Sulfadiazina + Trimetoprim com potente ação antimicrobiana.</span>
								</div>
							</div>
							<div class="bulasDownload">
								<div class="tableCell">
									<a class="linkDownload geralTransition" href="javascript:;" data-rel="blank">Download da Bula</a>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>

			<div class="blocoDuvidas">
				<a class="btDuvidas geralTransition" href="{$BASE_DIR}fale-conosco/">
					<span class="icone"></span>
					<span class="txtDuvidas">Ficou com dúvidas ou não encontrou a bula que procurava?</span>
					<span>Clique aqui para entrar em contato</span>
				</a>
			</div>

			{include file='includes/_linhas_produtos.tpl'}

		</div>
	</div>
</section>
