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
						<a class="tipoLink tipoLinkAtivo geralTransition" href="javascript:;" data-aba="lojas">Lojas</a>
					</li>
					<li class="tipoLi">
						<a class="tipoLink geralTransition" href="javascript:;" data-aba="representantes">Representantes</a>
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

			<div id="tabLojas" class="aba" data-aba="lojas">
				<div id="blocoMapa" class="clearfix">
					<div id="blocoLista">
						<div id="conteudoLista">
							<form name="formEstadoCidades" id="formEstadoCidades">
								<ul id="filtrosUl" class="filtrosUl clearfix">
									<li class="filtrosLi filtrosLiEstado">
										<div class="btSelect">
											<label class="txt">UF</label>
											<select id="selectEstado" name="selectEstado" class="selectEstado selectPrs">
												<option value="" selected="selected" disabled="disabled"></option>
												{foreach $lojas.Estados as $e}
												<option value="{$e.Estado}">{$e.Estado}</option>
												{/foreach}
											</select>
											<span class="icone arrow_carrot-down_alt"></span>
										</div>
										{*}
										<ul id="listaSelectUlEstado" class="listaSelectUl clearfix">
											{foreach $lojas.Estados as $e}
											<li class="filtroLi">
												<a class="filtroLink geralTransition" href="javascript:;">{$e.Estado}</a>
											</li>
											{/foreach}
										</ul>
										{*}
									</li>

									<li class="filtrosLi filtrosLiCidade">
										<div class="btSelect">
											<label class="txt">Cidade</label>
											<select id="selectCidade" name="selectCidade" class="selectCidade selectPrs">
												<option value="" selected="selected" disabled="disabled"></option>
												{foreach $lojas.Estados as $e}
												<optgroup id="cidade-{$e.Estado}" label="{$e.Estado}">
													{foreach $e.Cidades as $cidade}
													<option value="{$cidade}">{$cidade}</option>
													{/foreach}
												</optgroup>
												{/foreach}
											</select>
											<span class="icone arrow_carrot-down_alt"></span>
										</div>
										<div class="selectVazio">selecione um estado</div>
										{*}
										<ul id="listaSelectUlCidade" class="listaSelectUl clearfix">
											{foreach $lojas.Estados as $e}
											{foreach $e.Cidades as $cidade}
											<li class="filtroLi" data-estado="{$e.Estado}">
												<a class="filtroLink geralTransition" href="javascript:;">{$cidade}</a>
											</li>
											{/foreach}
											{/foreach}
										</ul>
										{*}
									</li>
								</ul>
							</form>

							<div class="lista">
								<span class="titulo">* clique na loja para visualizá-la no mapa</span>

								<div id="lojasHolder" class="listaUl">
									<ul id="listaUl">
										{foreach $lojas.Lojas as $loja}
										<li class="listaLi" data-estado="{$loja.Estado}" data-cidade="{$loja.Cidade}">
											<a id="loja-{$loja.CodRazaoSocial}" class="listaLink lojasLink geralTransition" href="javascript:;">
												<span class="listaTitulo">{if $loja.NomeFantasia}{$loja.NomeFantasia|from_charset}{else}{$loja.RazaoSocial|from_charset}{/if}</span>
												<span>{$loja.Bairro|from_charset}</span>
												<span>{$loja.Rua|from_charset} {$loja.Numero|from_charset}</span>
												<span class="icone arrow_carrot-right"></span>
											</a>
										</li>
										{/foreach}
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div id="mapa">
						<span class="carregando icone icon_loading"></span>
					</div>
				</div>
			</div>

			<div id="tabRepresentantes" class="aba" data-aba="representantes">
				<div id="blocoMapa" class="clearfix">
					<div id="blocoLista">
						<div id="conteudoLista">
							<form name="formRegioes" id="formRegioes">
								<ul id="filtrosRegiaoUl" class="filtrosUl clearfix">
									<li class="filtrosLi filtrosLiRegiao">
										<div class="btSelect">
											<label class="txt">Região</label>
											<select id="selectRegiao" name="selectRegiao" class="selectRegiao selectPrs">
												<option value="" selected="selected" disabled="disabled"></option>
												{foreach $regioes as $r}
												<option value="{$r.Regiao|from_charset}">{$r.Regiao|from_charset}</option>
												{/foreach}
											</select>
											<span class="icone arrow_carrot-down_alt"></span>
										</div>
										{*}<a class="btSelect" href="javascript:;">
											<span class="txt">Região</span>
											<span class="icone arrow_carrot-down_alt"></span>
										</a>
										<ul class="listaSelectUl clearfix">
											{foreach $regioes as $r}
											<li class="filtroLi">
												<a class="filtroLink geralTransition" href="javascript:;" data-regiao="{$r.Regiao|from_charset}">{$r.Regiao|from_charset}</a>
											</li>
											{/foreach}
										</ul>{*}
									</li>
								</ul>
							</form>

							<div class="lista">
								<ul id="listaRegiaoUl" class="listaUl">
									{foreach $representantes as $r}
									<li class="listaLi" data-regiao="{$r.Regiao|from_charset}">
										<a class="listaLink geralTransition" href="javascript:;">
											<span class="listaTitulo">{$r.Nome|from_charset}</span>
											<span>{$r.Regiao|from_charset}</span>
											<span>{$r.Fone|from_charset}</span>
											<span>{$r.Email|from_charset}</span>
										</a>
									</li>
									{/foreach}
								</ul>
							</div>
						</div>
					</div>
					<div id="mapaRegioes">
						<div class="mapaSVG">{include file='img/regioes.svg'}</div>
					</div>
				</div>
			</div>

			{include file='includes/_linhas_produtos.tpl'}
		</div>
	</div>
</section>
