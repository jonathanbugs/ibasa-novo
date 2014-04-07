<!DOCTYPE HTML>
<html dir="ltr" lang="pt-br" class="no-js">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="{$description}" />
<meta name="keywords" content="{$keywords}" />
<link rel="shortcut icon" href="{$IMG_DIR}icons/favicon.png" />

<meta property="og:title" content="IBASA" />
<meta property="og:image" content="{$IMG_DIR}gerais/compartilhamento.jpg" />
<meta property="og:description" content="O Laboratório IBASA levou nove crianças para passar um dia especial em uma fazenda. Lá, elas puderam conhecer de perto vários bichinhos e aprenderam que “A vida exige o melhor”. Clique aqui e confira como tudo aconteceu." />


<title>{$tituloFinal}</title>

{if $analytics}
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', '{$analytics}']);
	_gaq.push(['_trackPageview']);
	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
{/if}

{foreach $css_files as $css_uri}
	<link href="{$css_uri}" rel="stylesheet" type="text/css" media="screen" />
{/foreach}
	<script type="text/javascript">var $BASE_DIR = '{$BASE_DIR}', $CLIENTE = '{$CLIENTE}', isiPad = '{$ipad}', isiPhone = '{$iphone}', isiAndroid = '{$android}';
	</script>
{$scriptPre}
{foreach $js_files as $js_uri}
	<script type="text/javascript" src="{$js_uri}"></script>
{/foreach}
{$scriptExtra}
</head>
<body>
	{include file="../erro-js.php"}

	{if $navegador}
		{include file="../erro-navegador.php"}
	{/if}


	<div id="wrapper" class="wrapper-{$sessao}">

		{include file='_topo.tpl'}

		 <div id="content">
