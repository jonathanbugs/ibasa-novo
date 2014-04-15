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

function produtos($ProdutoUrl=NULL){
	if (!is_null($ProdutoUrl)) {
		$select = "
				pDescricao.Texto as Descricao,
				pIndicacoes.Texto as Indicacoes,
				pDicasuso.Texto as Dicasuso,
				pDisponivel.Texto as Disponivel,
				pPrecaucoes.Texto as Precaucoes,
				pComposicao.Texto as Composicao,
				pPosologia.Texto as Posologia,
		";
		$join = "
			LEFT JOIN _spr_traducoes pDescricao ON (pDescricao.TraducaoID = p.DescricaoID AND pDescricao.IdiomaID = '1')
			LEFT JOIN _spr_traducoes pIndicacoes ON (pIndicacoes.TraducaoID = p.IndicacoesID AND pIndicacoes.IdiomaID = '1')
			LEFT JOIN _spr_traducoes pDicasuso ON (pDicasuso.TraducaoID = p.DicasusoID AND pDicasuso.IdiomaID = '1')
			LEFT JOIN _spr_traducoes pDisponivel ON (pDisponivel.TraducaoID = p.DisponivelID AND pDisponivel.IdiomaID = '1')
			LEFT JOIN _spr_traducoes pPrecaucoes ON (pPrecaucoes.TraducaoID = p.PrecaucoesID AND pPrecaucoes.IdiomaID = '1')
			LEFT JOIN _spr_traducoes pComposicao ON (pComposicao.TraducaoID = p.ComposicaoID AND pComposicao.IdiomaID = '1')
			LEFT JOIN _spr_traducoes pPosologia ON (pPosologia.TraducaoID = p.PosologiaID AND pPosologia.IdiomaID = '1')
		";
		$where = "
				AND p.Url = '$ProdutoUrl'
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
	}

	// print('<pre>');print_r($query);print('</pre>');die();
	return $query;
}

function produtosSubcategorias(){
	$produtos = produtos();

	$subcategorias = array();
	for ($x=0; $x < count($produtos); $x++) {
		$sub = $produtos[$x]['SubCategoriaUrl'];
		if (!is_array($subcategorias[$sub])) $subcategorias[$sub] = array('Titulo' => $produtos[$x]['SubCategoria'], 'Url' => $produtos[$x]['SubCategoriaUrl'], 'Linha' => $produtos[$x]['Categoria'], 'LinhaUrl' => $produtos[$x]['CategoriaUrl']);
		$subcategorias[$sub]['Produtos'][$produtos[$x]['Url']] = $produtos[$x];
	}

	$subcategorias = OrderArray($subcategorias, 'Titulo');

	// print('<pre>');print_r($subcategorias);print('</pre>');die();
	return $subcategorias;
}

?>
