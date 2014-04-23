<!-- SESSAO BANNER -->
<section id="sessaoBanner">
	<span class="bg bg1"></span>
	<span class="bg bg2"></span>
	<span class="bg bg3"></span>
	<div class="container">
		<div class="containerGeral">
			<ul id="banner" data-cycle-fx='scrollHorz' data-cycle-slides="li" data-cycle-swipe='true' data-cycle-log='false' data-cycle-timeout='6000' data-cycle-pager="#pagerBanner">
				<li><a href="{$BASE_DIR}produtos/estetica-pet/ojon-e-monoi/"><img class="bannerImg" src="{$IMG_DIR}banners/1.jpg" alt="" /></a></li>
			</ul>
			<div id="pagerBanner"></div>
		</div>
	</div>
</section>


<!-- SESSAO BLOCOS -->
<section id="blocos" class="sessao">
	<div class="container">
		<div class="containerGeral clearfix">
			<ul id="blocosUl" class="clearfix">
				<li class="blocosLi blocosLi_medicamentos">
					<a href="{$BASE_DIR}produtos/medicamentos/" class="blocosLink">
						<span class="blocosImgHolder">
							<img class="blocosImg" src="{$IMG_DIR}gerais/linha_medicamentos.png" data-src2x="{$IMG_DIR}gerais/linha_medicamentos_2x.png" alt="medicamentos" />
						</span>
						<span class="blocoTitulo">medicamentos</span>
						<!-- <span class="blocoDescricao">
							24 anos. Esse é o tempo que trabalhamos
							pela vida. E assim, sentimos a necessidade
							de crescer, evoluir e fazer cada vez mais.
							Mais ainda que simples novidades. Uma
							mudança que marca o nosso novo
							momento e de todos os nossos parceiros.
						</span> -->
						<span class="blocosLinkBt geralTransition">Ver todos produtos desta linha</span>
					</a>
				</li>
				<li class="blocosLi blocosLi_tratamento">
					<a href="{$BASE_DIR}produtos/tratamento/" class="blocosLink">
						<span class="blocosImgHolder">
							<img class="blocosImg" src="{$IMG_DIR}gerais/linha_tratamento.png" data-src2x="{$IMG_DIR}gerais/linha_tratamento_2x.png" alt="tratamento" />
						</span>
						<span class="blocoTitulo">tratamento</span>
						<!-- <span class="blocoDescricao">
							24 anos. Esse é o tempo que trabalhamos
							pela vida. E assim, sentimos a necessidade
							de crescer, evoluir e fazer cada vez mais.
							Mais ainda que simples novidades. Uma
							mudança que marca o nosso novo
							momento e de todos os nossos parceiros.
						</span> -->
						<span class="blocosLinkBt geralTransition">Ver todos produtos desta linha</span>
					</a>
				</li>
				<li class="blocosLi blocosLi_estetica-pet">
					<a href="{$BASE_DIR}produtos/estetica-pet/" class="blocosLink">
						<span class="blocosImgHolder">
							<img class="blocosImg" src="{$IMG_DIR}gerais/linha_estetica.png" data-src2x="{$IMG_DIR}gerais/linha_estetica_2x.png" alt="estética pet" />
						</span>
						<span class="blocoTitulo">estética pet</span>
						<!-- <span class="blocoDescricao">
							24 anos. Esse é o tempo que trabalhamos
							pela vida. E assim, sentimos a necessidade
							de crescer, evoluir e fazer cada vez mais.
							Mais ainda que simples novidades. Uma
							mudança que marca o nosso novo
							momento e de todos os nossos parceiros.
						</span> -->
						<span class="blocosLinkBt geralTransition">Ver todos produtos desta linha</span>
					</a>
				</li>
				{*}<li class="blocosLi blocosLiCampanha">
					<a href="{$BASE_DIR}produtos/">
						<img class="blocosImg" src="{$IMG_DIR}gerais/placa.png" data-src2x="{$IMG_DIR}gerais/placa_2x.png" alt="Campanha" />
						<span class="blocoTitulo">Campanha</span>
						<span class="blocoDescricao">
							Lorem Ipsum is simply dummy text of the
							printing and typesetting industry. Lorem
							Ipsum has been the industry's standard
							dummy text ever since the 1500s
						</span>
					</a>
				</li>{*}
			</ul>
		</div>
	</div>
</section>
