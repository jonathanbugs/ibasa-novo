<!-- HEADER SESSAO TITULO -->
<header id="sessaoTitulo">
	<span class="bg bg1"></span>
	<span class="bg bg2"></span>
	<div class="container">
		<div class="containerGeral">
			<div id="blocoTitulo">
				<h2 class="tituloSessao">
					<span class="icone icon_pencil_alt"></span>
					<span class="titulo">Central de Conteúdo</span>
				</h2>

				<div id="categorias">
					<ul id="categoriasUl" class="categoriasUl">
						{foreach get_categories() as $cat}
						<li class="categoriasLi">
							<a class="categoriasLink" href="{$BASE_DIR}central-de-conteudo/categoria/{$cat->term_id}/{$cat->slug}/">{$cat->name}</a>
						</li>
						{/foreach}
					</ul>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- SESSAO CENTRAL DE CONTEUDOS -->
<section id="sessaoCentralConteudos" class="sessao">
	<div class="container">
		<div class="containerGeral clearfix">
			<div class="centralConteudos">
				{foreach $posts_array as $p}
				<div class="post">
					{*}<span class="postData">18 de maio de 2014</span>{*}

					<h3><a href="{$BASE_DIR}blog/post/{$p->ID}/{RemoveAcentos($p->post_title,'UTF-8')}/">{$p->post_title}</a></h3>

					{$p->post_content|nl2br}

					{if wp_get_post_categories($p->ID)}
					<ul class="tagsUl clearfix">
						<li>
							{foreach wp_get_post_categories($p->ID) as $catID}
							{$cat = get_category($catID)}
							<a href="{$BASE_DIR}blog/categoria/{$cat->term_id}/{$cat->slug}/">{$cat->name}</a>
							{/foreach}
						</li>
					</ul>
					{/if}

					{if wp_get_post_tags($p->ID)}
					<ul class="tagsUl clearfix">
						<li>
							{foreach wp_get_post_tags($p->ID) as $tag}
							<a href="{$BASE_DIR}blog/tag/{$tag->term_id}/{$tag->slug}/">{$tag->name}</a>
							{/foreach}
						</li>
					</ul>
					{/if}
				</div>
				{/foreach}

				<div id="paginacao">
					<ul id="paginacaoUl" class="clearfix">
						<li class="paginacaoLi">
							<a class="paginacaoLink geralTransition circulo" href="javascript:;">
								<span class="icone arrow_carrot-left"></span>
							</a>
						</li>
						<li class="paginacaoLi">
							<a class="paginacaoLink paginacaoLinkAtivo geralTransition circulo" href="javascript:;">1</a>
						</li>
						<li class="paginacaoLi">
							<a class="paginacaoLink geralTransition circulo" href="javascript:;">2</a>
						</li>
						<li class="paginacaoLi">
							<a class="paginacaoLink geralTransition circulo" href="javascript:;">3</a>
						</li>
						<li class="paginacaoLi">
							<a class="paginacaoLink geralTransition circulo" href="javascript:;">
								<span class="icone arrow_carrot-right"></span>
							</a>
						</li>
					</ul>
				</div>

			</div>
		</div>
	</div>
</section>
