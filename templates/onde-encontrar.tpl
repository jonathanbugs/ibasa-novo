<!-- HEADER SESSAO TITULO -->
<header id="sessaoTitulo">
	<span class="bg bg1"></span>
	<span class="bg bg2"></span>
	<div class="container">
		<div class="containerGeral">
			<div id="blocoTitulo">
				<h2 class="tituloSessao">
					<span class="icone icon_pin"></span>
					<span class="titulo">Onde Encontrar</span>
				</h2>

				<ul id="tipoUl">
					<li class="tipoLi">
						<a class="tipoLink tipoLinkAtivo geralTransition" href="javascript:;">Lojas</a>
					</li>
					<li class="tipoLi">
						<a class="tipoLink geralTransition" href="javascript:;">Representantes</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</header>

<!-- SESSAO ONDE ENCONTRAR-->
<section id="ondeEncontrar" class="sessao">
	<div class="container">
		<div class="containerGeral clearfix">

			<div id="blocoMapa" class="clearfix">
				<div id="blocoLista">
					<div id="conteudoLista">
						<form name="formEstadoCidades" id="formEstadoCidades">
							<input type="hidden" value="" name="estado" id="estado">
							<input type="hidden" value="" name="cidade" id="cidade">

							<ul id="filtrosUl" class="clearfix">
								<li class="filtrosLi filtrosLiEstado">
									<a class="btSelect" href="javascript:;">
										<span class="txt">UF</span>
										<span class="icone arrow_carrot-down_alt"></span>
									</a>
									<ul class="listaSelectUl clearfix">
										<li class="filtroLi">
											<a class="filtroLink geralTransition" href="javascript:;">Todos</a>
										</li>
										<li class="filtroLi">
											<a class="filtroLink geralTransition" href="javascript:;">RJ</a>
										</li>
										<li class="filtroLi">
											<a class="filtroLink geralTransition" href="javascript:;">RS</a>
										</li>
										<li class="filtroLi">
											<a class="filtroLink geralTransition" href="javascript:;">SP</a>
										</li>
									</ul>
								</li>

								<li class="filtrosLi filtrosLiCidade">
									<a class="btSelect" href="javascript:;">
										<span class="txt">Cidade</span>
										<span class="icone arrow_carrot-down_alt"></span>
									</a>
									<ul class="listaSelectUl clearfix">
										<li class="filtroLi">
											<a class="filtroLink geralTransition" href="javascript:;">Campo Bom</a>
										</li>
										<li class="filtroLi">
											<a class="filtroLink geralTransition" href="javascript:;">Novo Hamburgo</a>
										</li>
										<li class="filtroLi">
											<a class="filtroLink geralTransition" href="javascript:;">Ivoti</a>
										</li>
										<li class="filtroLi">
											<a class="filtroLink geralTransition" href="javascript:;">Porto Alegre</a>
										</li>
									</ul>
								</li>
							</ul>
						</form>

						<div class="lista">
							<span class="titulo">* clique na loja para visualizá-la no mapa</span>

							<ul id="listaUl" class="scroll">
								<li class="listaLi">
									<a class="listaLink geralTransition" href="javascript:;">
										<span class="listaTitulo">Benoit</span>
										<span>Canudos</span>
										<span>Canudos Avenida Victor Hugo Kunz, 2565</span>
										<span class="icone arrow_carrot-right"></span>
									</a>
								</li>
								<li class="listaLi">
									<a class="listaLink listaLinkAtivo geralTransition" href="javascript:;">
										<span class="listaTitulo">Benoit</span>
										<span>Canudos</span>
										<span>Canudos Avenida Victor Hugo Kunz, 2565</span>
										<span class="icone arrow_carrot-right"></span>
									</a>
								</li>
								<li class="listaLi">
									<a class="listaLink geralTransition" href="javascript:;">
										<span class="listaTitulo">Benoit</span>
										<span>Canudos</span>
										<span>Canudos Avenida Victor Hugo Kunz, 2565</span>
										<span class="icone arrow_carrot-right"></span>
									</a>
								</li>
								<li class="listaLi">
									<a class="listaLink geralTransition" href="javascript:;">
										<span class="listaTitulo">Benoit</span>
										<span>Canudos</span>
										<span>Canudos Avenida Victor Hugo Kunz, 2565</span>
										<span class="icone arrow_carrot-right"></span>
									</a>
								</li>
								<li class="listaLi">
									<a class="listaLink geralTransition" href="javascript:;">
										<span class="listaTitulo">Benoit</span>
										<span>Canudos</span>
										<span>Canudos Avenida Victor Hugo Kunz, 2565</span>
										<span class="icone arrow_carrot-right"></span>
									</a>
								</li>

							</ul>
						</div>
					</div>
				</div>
				<div id="mapa"></div>
			</div>

			{include file='includes/_linhas_produtos.tpl'}

		</div>
	</div>
</section>
