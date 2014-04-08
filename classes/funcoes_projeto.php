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

?>
