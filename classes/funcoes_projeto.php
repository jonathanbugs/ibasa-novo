<?php

function bulas(){
	$sql = "SELECT
				p.ID as ID,
				p.Url as Url,
				pTit.Texto as Titulo,
				pSubTit.Texto as SubTitulo,
				catpTit.Texto as Categoria,
				f.Src as Capa,
				p.Bula as Bula,
				GROUP_CONCAT(pcomp.Item ORDER BY pcomp.Item SEPARATOR '; ') as Composicao
			FROM _spr_produtos p
			LEFT JOIN _spr_traducoes pTit ON (pTit.TraducaoID = p.TituloID AND pTit.IdiomaID = '1')
			LEFT JOIN _spr_traducoes pSubTit ON (pSubTit.TraducaoID = p.SubTituloID AND pSubTit.IdiomaID = '1')
			LEFT JOIN _spr_produtos_categorias pcat ON (pcat.RegistroID = p.ID)
			LEFT JOIN _spr_categorias_produtos catp ON (catp.ID = pcat.VinculoID)
			LEFT JOIN _spr_traducoes catpTit ON (catpTit.TraducaoID = catp.TituloID AND catpTit.IdiomaID = '1')
			LEFT JOIN _spr_produtos_composicao pcomp ON (pcomp.RegistroID = p.ID)
			LEFT JOIN _spr_produtos_fotos pf ON (pf.RegistroID = p.ID AND pf.Capa = '1')
			LEFT JOIN _spr_fotos f ON (f.ID = pf.FotoID)
			WHERE p.Ativo = '1'
				AND p.Bula <> ''
			GROUP BY p.ID
			ORDER BY Titulo
			";
	$query = ConsultarSQL($sql);

	// print('<pre>');print_r($query);print('</pre>');die();
	return $query;
}

function linhas(){
	$sql = "SELECT
				cp.ID,
				cp.Url,
				cpTit.Texto as Titulo,
				GROUP_CONCAT(_cpTit.Texto ORDER BY _cp.Url SEPARATOR ',') as SubCategorias,
				GROUP_CONCAT(_cp.Url ORDER BY _cp.Url SEPARATOR ',') as SubCategoriasUrl
			FROM _spr_categorias_produtos cp
			LEFT JOIN _spr_traducoes cpTit ON (cpTit.TraducaoID = cp.TituloID)
			RIGHT JOIN _spr_categorias_produtos_subcategorias cps ON (cps.RegistroID = cp.ID)
			LEFT JOIN _spr_categorias_produtos _cp ON (_cp.ID = cps.VinculoID)
			LEFT JOIN _spr_traducoes _cpTit ON (_cpTit.TraducaoID = _cp.TituloID)
			WHERE cp.Ativo = '1'
			GROUP BY cp.ID
			ORDER BY cp.Ordem
			";
	$query = ConsultarSQL($sql);

	$linhas = array();
	for ($x=0; $x < count($query); $x++) {
		$url = $query[$x]['Url'];
		$_sub_tit = explode(',', $query[$x]['SubCategorias']);
		$_sub_url = explode(',', $query[$x]['SubCategoriasUrl']);
		$linhas[$url] = $query[$x];
		$linhas[$url]['SubCategorias'] = array();
		for ($y=0; $y < count($_sub_tit); $y++) {
			$linhas[$url]['SubCategorias'][$_sub_url[$y]] = array(
				'Titulo' => $_sub_tit[$y],
				'Url' =>  $_sub_url[$y]
			);
		}
	}

	/*$produtos = produtos();
	for ($x=0; $x < count($produtos); $x++) {
		$prodLinha = $produtos[$x]['CategoriaUrl'];
		if (!is_array($linhas[$prodLinha]['Produtos']))
			$linhas[$prodLinha]['Produtos'] = array();
		$linhas[$prodLinha]['Produtos'][$produtos[$x]['Url']] = $produtos[$x];
	}
	// print('<pre>');print_r($produtos);print('</pre>');die();*/

	// print('<pre>');print_r($linhas);print('</pre>');die();
	return $linhas;
}

function animais(){
	$sql = "SELECT * FROM _spr_animais ORDER BY Ordem";
	$query = ConsultarSQL($sql);

	// print('<pre>');print_r($query);print('</pre>');die();
	return $query;
}

function produtos($ProdutoUrl=NULL,$busca=NULL){
	if (!is_null($ProdutoUrl)) {
		mysql_query("SET SESSION group_concat_max_len = 20480");
		$select = "
				pDescricao.Texto as Descricao,
				pIndicacoes.Texto as Indicacoes,
				pDicasuso.Texto as Dicasuso,
				pDisponivel.Texto as Disponivel,
				pPrecaucoes.Texto as Precaucoes,
				pComposicao.Texto as Composicao,
				pPosologia.Texto as Posologia,
				GROUP_CONCAT(pc.ID ORDER BY pc.ID SEPARATOR ';;') as ComposicaoID,
				GROUP_CONCAT(pc.Item ORDER BY pc.ID SEPARATOR ';;') as ComposicaoItem,
				GROUP_CONCAT(pc.Valor ORDER BY pc.ID SEPARATOR ';;') as ComposicaoValor,
				GROUP_CONCAT(pp.ID ORDER BY pp.ID SEPARATOR ';;') as PosologiaID,
				GROUP_CONCAT(pp.Item ORDER BY pp.ID SEPARATOR ';;') as PosologiaItem,
				GROUP_CONCAT(pp.Valor ORDER BY pp.ID SEPARATOR ';;') as PosologiaValor,
		";
		$join = "
			LEFT JOIN _spr_traducoes pDescricao ON (pDescricao.TraducaoID = p.DescricaoID AND pDescricao.IdiomaID = '1')
			LEFT JOIN _spr_traducoes pIndicacoes ON (pIndicacoes.TraducaoID = p.IndicacoesID AND pIndicacoes.IdiomaID = '1')
			LEFT JOIN _spr_traducoes pDicasuso ON (pDicasuso.TraducaoID = p.DicasusoID AND pDicasuso.IdiomaID = '1')
			LEFT JOIN _spr_traducoes pDisponivel ON (pDisponivel.TraducaoID = p.DisponivelID AND pDisponivel.IdiomaID = '1')
			LEFT JOIN _spr_traducoes pPrecaucoes ON (pPrecaucoes.TraducaoID = p.PrecaucoesID AND pPrecaucoes.IdiomaID = '1')
			LEFT JOIN _spr_traducoes pComposicao ON (pComposicao.TraducaoID = p.ComposicaoID AND pComposicao.IdiomaID = '1')
			LEFT JOIN _spr_traducoes pPosologia ON (pPosologia.TraducaoID = p.PosologiaID AND pPosologia.IdiomaID = '1')
			LEFT JOIN _spr_produtos_composicao pc ON (pc.RegistroID = p.ID)
			LEFT JOIN _spr_produtos_posologia pp ON (pp.RegistroID = p.ID)
		";
		$where = "
				AND p.Url = '$ProdutoUrl'
		";
	}
	if (!is_null($busca)) {
		$join = "
			LEFT JOIN _spr_produtos_tags pt ON (pt.RegistroID = p.ID)
		";
		$where = "
				AND (
					p.Url LIKE '%%$busca%%'
					OR pTitulo.Texto LIKE '%%$busca%%'
					OR pSubTitulo.Texto LIKE '%%$busca%%'
					OR catp.Url LIKE '%%$busca%%'
					OR catpTit.Texto LIKE '%%$busca%%'
					OR scatp.Url LIKE '%%$busca%%'
					OR scatpTit.Texto LIKE '%%$busca%%'
					OR a.Url LIKE '%%$busca%%'
					OR a.Titulo LIKE '%%$busca%%'
					OR pt.Tag LIKE '%%$busca%%'
				)
		";
	}

	$sql = "SELECT
				p.ID as ID,
				p.Url as Url,
				pTitulo.Texto as Titulo,
				pSubTitulo.Texto as SubTitulo,
				catpTit.Texto as Categoria,
				catp.Url as CategoriaUrl,
				scatpTit.Texto as SubCategoria,
				scatp.Url as SubCategoriaUrl,
				f.Src as Capa,
				p.Bula as Bula,
				$select
				GROUP_CONCAT(DISTINCT a.Titulo ORDER BY a.Ordem SEPARATOR ',') as Animais,
				GROUP_CONCAT(DISTINCT a.Url ORDER BY a.Ordem SEPARATOR ',') as AnimaisUrl
			FROM _spr_produtos p
			LEFT JOIN _spr_traducoes pTitulo ON (pTitulo.TraducaoID = p.TituloID AND pTitulo.IdiomaID = '1')
			LEFT JOIN _spr_traducoes pSubTitulo ON (pSubTitulo.TraducaoID = p.SubTituloID AND pSubTitulo.IdiomaID = '1')
			LEFT JOIN _spr_produtos_categorias pscat ON (pscat.RegistroID = p.ID)
			LEFT JOIN _spr_categorias_produtos scatp ON (scatp.ID = pscat.VinculoID AND scatp.Ativo = '1')
			LEFT JOIN _spr_traducoes scatpTit ON (scatpTit.TraducaoID = scatp.TituloID AND scatpTit.IdiomaID = '1')
			LEFT JOIN _spr_categorias_produtos_subcategorias cps ON (cps.VinculoID = pscat.VinculoID)
			LEFT JOIN _spr_categorias_produtos catp ON (catp.ID = cps.RegistroID AND catp.Ativo = '1')
			LEFT JOIN _spr_traducoes catpTit ON (catpTit.TraducaoID = catp.TituloID AND catpTit.IdiomaID = '1')
			LEFT JOIN _spr_produtos_fotos pf ON (pf.RegistroID = p.ID AND pf.Capa = '1')
			LEFT JOIN _spr_fotos f ON (f.ID = pf.FotoID)
			LEFT JOIN _spr_produtos_animais pa ON (pa.RegistroID = p.ID)
			LEFT JOIN _spr_animais a ON (a.ID = pa.VinculoID)
			$join
			WHERE p.Ativo = '1'
				$where
			GROUP BY p.ID
			ORDER BY Titulo
			";
	$query = ConsultarSQL($sql);
	// print('<pre>');print_r($query);print('</pre>');die();

	for ($x=0; $x < count($query); $x++) {
		if ($query[$x]['Animais']!=='') {
			$_animais_tit = explode(',', $query[$x]['Animais']);
			$_animais_url = explode(',', $query[$x]['AnimaisUrl']);
			$query[$x]['Animais'] = array();
			for ($y=0; $y < count($_animais_tit); $y++) {
				$query[$x]['Animais'][] = array(
					'Titulo' => $_animais_tit[$y],
					'Url' =>  $_animais_url[$y]
				);
			}
		}
		if ($query[$x]['ComposicaoItem']!=='') {
			$_id = explode(';;', $query[$x]['ComposicaoID']);
			$_item = explode(';;', $query[$x]['ComposicaoItem']);
			$_valor = explode(';;', $query[$x]['ComposicaoValor']);
			$query[$x]['ComposicaoItens'] = array();
			for ($y=0; $y < count($_id); $y++) {
				if ( !is_array($query[$x]['ComposicaoItens'][$_id[$y]]) )
					$query[$x]['ComposicaoItens'][$_id[$y]] = array(
						'Item' => $_item[$y],
						'Valor' =>  $_valor[$y]
					);
			}
		}
		if ($query[$x]['PosologiaItem']!=='') {
			$_id = explode(';;', $query[$x]['PosologiaID']);
			$_item = explode(';;', $query[$x]['PosologiaItem']);
			$_valor = explode(';;', $query[$x]['PosologiaValor']);
			$query[$x]['PosologiaItens'] = array();
			for ($y=0; $y < count($_id); $y++) {
				if ( !is_array($query[$x]['PosologiaItens'][$_id[$y]]) )
					$query[$x]['PosologiaItens'][$_id[$y]] = array(
						'Item' => $_item[$y],
						'Valor' =>  $_valor[$y]
					);
			}
		}
	}

	// print('<pre>');print_r($query);print('</pre>');die();
	return $query;
}

function produtosSubcategorias($filtro=NULL,$busca=NULL){
	$produtos = produtos(NULL,$busca);

	$subcategorias = array();
	for ($x=0; $x < count($produtos); $x++) {
		$sub = $produtos[$x]['SubCategoriaUrl'];
		if (!is_array($subcategorias[$sub])) $subcategorias[$sub] = array('Titulo' => $produtos[$x]['SubCategoria'], 'Url' => $produtos[$x]['SubCategoriaUrl'], 'Linha' => $produtos[$x]['Categoria'], 'LinhaUrl' => $produtos[$x]['CategoriaUrl']);
		$subcategorias[$sub]['Produtos'][$produtos[$x]['Url']] = $produtos[$x];
	}

	$subcategorias = OrderArray($subcategorias, 'Titulo');
	if (!is_null($filtro))
		$subcategorias = $subcategorias[$filtro];

	// print('<pre>');print_r($subcategorias);print('</pre>');die();
	return $subcategorias;
}

function lojas(){
	$sql = "SELECT
				*
			FROM _spr_lojas l
			WHERE l.CodRazaoSocial > 0
			GROUP BY l.CodRazaoSocial
			ORDER BY l.Estado ASC, l.Cidade ASC, l.NomeFantasia ASC, l.RazaoSocial ASC
			";
	$_query = mysql_query($sql);

	$estados = array();
	$lojas = array();
	while ($query = mysql_fetch_array($_query)) {
		array_push($lojas, $query);
		if (!is_array($estados[$query['Estado']]))
			$estados[$query['Estado']] = array(
				'Estado' => $query['Estado'],
				'Cidades' => array()
			);
		array_push($estados[$query['Estado']]['Cidades'], $query['Cidade']);
	}

	foreach ($estados as $k=>$v) {
		$estados[$k]['Cidades'] = array_unique($v['Cidades']);
	}

	// print('<pre>');print_r($estados);print('</pre>');die();
	// print('<pre>');print_r($lojas);print('</pre>');die();
	return array('Estados'=>$estados, 'Lojas'=>$lojas);
}

function regioes(){
	$sql = "SELECT
				DISTINCT(Regiao)
			FROM _spr_onde_encontrar
			WHERE Nome <> 'NOME'
			ORDER BY Regiao ASC
			";
	$query = ConsultarSQL($sql);

	// print('<pre>');print_r($query);print('</pre>');die();
	return $query;
}

function representantes(){
	$sql = "SELECT
				*
			FROM _spr_onde_encontrar
			WHERE Nome <> 'NOME'
			ORDER BY Nome ASC
			";
	$query = ConsultarSQL($sql);

	// print('<pre>');print_r($query);print('</pre>');die();
	return $query;
}

function gerarLojas(){
	$file = PHP_ROOT."/ajax/json.lojas.json";
	$sql = "SELECT
				l.*, lc.Lat, lc.Lng
			FROM _spr_lojas l
			LEFT JOIN _spr_lojas_coordenadas lc ON (lc.CodRazaoSocial = l.CodRazaoSocial)
			WHERE l.CodRazaoSocial > 0
			GROUP BY l.CodRazaoSocial
			ORDER BY l.Estado ASC, l.Cidade ASC, l.NomeFantasia ASC, l.RazaoSocial ASC
			";
	$_query = mysql_query($sql);

	$lojas = array();
	while ($query = mysql_fetch_array($_query)) {
		if (!$query['Lat']||!$query['Lat']) {
			$address = urlencode($query['Rua'].' '.$query['Numero'].' - '.$query['Bairro'].' - '.$query['Cep'].' - '.$query['Cidade'].' - '.$query['Estado']);
			$region = 'Brazil';

			$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region");
			$json = json_decode($json);

			$query['Lat'] = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
			$query['Lng'] = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};

			if ($query['Lat'] && $query['Lng']) {
				mysql_query("INSERT INTO _spr_lojas_coordenadas SET CodRazaoSocial = '$query[CodRazaoSocial]', Lat = '$query[Lat]', Lng = '$query[Lng]'");
			}
		}

		array_push($lojas, array(
			'ID' => $query['ID'],
			'Marca' => $query['Marca'],
			'CodProduto' => $query['CodProduto'],
			'Produto' => $query['Produto'],
			'CodRazaoSocial' => $query['CodRazaoSocial'],
			'NomeFantasia' => $query['NomeFantasia'],
			'RazaoSocial' => $query['RazaoSocial'],
			'Rua' => $query['Rua'],
			'Numero' => $query['Numero'],
			'Bairro' => $query['Bairro'],
			'Complemento' => $query['Complemento'],
			'Cidade' => $query['Cidade'],
			'Estado' => $query['Estado'],
			'Cep' => $query['Cep'],
			'Regiao' => $query['Regiao'],
			'DDD' => $query['DDD'],
			'Telefone' => $query['Telefone'],
			'Site' => $query['Site'],
			'Lat' => $query['Lat'],
			'Lng' => $query['Lng']
		));
	}

	// print('<pre>');print_r($lojas);print('</pre>');die();
	file_put_contents($file,json_encode($lojas));
}

// FUNCOES DO BLOG
function post_imagem($id){
	$sql = "SELECT
				guid
			FROM wp_posts
			WHERE post_type = 'attachment'
				AND post_parent = '$id'
			LIMIT 1
			";
	$query = ConsultarSQL($sql);

	return $query[0][0];
}

function paginacao($args=array()){
	if ($args['term']) {
		$term = "
			LEFT JOIN wp_term_relationships ON (wp_term_relationships.object_id = wp_posts.ID)
			LEFT JOIN wp_term_taxonomy ON (wp_term_taxonomy.term_taxonomy_id = wp_term_relationships.term_taxonomy_id)
		";
		$termWhere = "AND term_id = '$args[term]'";
	}

	$sql = "SELECT
				COUNT(*)
			FROM wp_posts
			$term
			WHERE post_type = 'post'
				AND post_status = 'publish'
				AND post_parent = '0'
				$termWhere
			";
	$query = ConsultarSQL($sql);

	$posts = $query[0][0];
	$porpagina = $args['posts_per_page'];
	$total = ceil($posts/$porpagina);
	$atual = $args['offset']+1;
	$anterior = ($atual>1) ? $atual-1 : 0 ;
	$proximo = ($atual<$total) ? $atual+1 : 0 ;

	$return = new stdClass();
	$return->posts = $posts;
	$return->porpagina = $porpagina;
	$return->total = $total;
	$return->atual = $atual;
	$return->anterior = $anterior;
	$return->proximo = $proximo;

	// print('<pre>');print_r($return);print('</pre>');die();
	return $return;
}

?>
