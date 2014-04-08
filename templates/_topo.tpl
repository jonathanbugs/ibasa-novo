<header id="header" class="geralTransition">
	<div class="container">
		<div class="containerGeral clearfix">
			<h1 id="logo">
				<a href="{$BASE_DIR}">
					<img src="{$IMG_DIR}logos/logo.png" data-src2x="{$IMG_DIR}logos/logo_2x.png" alt="{$title}" width="118" height="82" />
				</a>
			</h1>

			<div id="headerLinks">
				{include file='includes/_menu-links.tpl'}

				<div id="menuBusca">
					<form id="formBusca" class="form" action="javascript:;">
						<div class="relative">
							<label class="label" for="busca">Ex: ibatrim, pulga</label>
							<input class="input" type="text" id="busca" name="busca">
							<button class="bt btForm" type="submit">
								<span class="icone icon_search"></span>
							</button>
						</div>
					</form>
					<nav>
						<a id="btMenu" href="javascript:;">
							<span class="icon">Menu</span>
						</a>

						<div id="menu">
							{include file='includes/_menu-links.tpl'}
							{include file='includes/_menu.tpl'}
							<a class="facebook bt" data-rel="blank" href="{$redes_sociais.facebook}">
								<span class="icone social_facebook"></span>
							</a>
						</div>

						{include file='includes/_menu.tpl'}
					</nav>
					<a class="facebook bt" data-rel="blank" href="{$redes_sociais.facebook}">
						<span class="icone social_facebook"></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</header>
