$(document).ready(function(){
	init();
	// selectFiltros();
	abas();
	selectPersonalizado();
	selectRegiao();
	filtroEstado();
	filtroCidade();
	filtroLoja();
	// $('.scroll').jScrollPane({ autoReinitialise: true });
});

$(window).on('load', initialize);

function abas() {
	$('.tipoLink').on('click', function(event) {
		event.preventDefault();
		var aba = $(this).attr('data-aba');
		$('.tipoLinkAtivo').removeClass('tipoLinkAtivo');
		$(this).addClass('tipoLinkAtivo');
		$('.aba').hide().filter('[data-aba="'+aba+'"]').show();
	});
}

function selectFiltros(){
	$('.btSelect').on('click', function(){
		$(this).toggleClass('btSelectAberto').next().slideToggle(200);
	});

	$('.filtroLink').on('click', function(){
		var textoSelecionado = $(this).html();
		$(this).parents('ul').prev().find('.txt').html(textoSelecionado);

		$(this).parents('.listaSelectUl').prev().removeClass('btSelectAberto');
		$('.listaSelectUl').slideUp(200);
	});
}

var cloneCidade;
function filtroEstado(){
	var $estado = $('#selectEstado'),
		$cidade = $('#selectCidade'),
		$lojas = $('#lojasHolder');
	cloneCidade = $cidade.clone();
	$cidade.empty();
	$estado.on('change', function(event) {
		var _uf = $estado.val();
		centralizarEstado(_uf);
		$cidade.val('').prev().text('Cidade');
		if (_uf===''){
			$estado.prev().text('Estado');
			$cidade.html(cloneCidade.html());
			$lojas.parent().hide();
		} else {
			$cidade.html(cloneCidade.children('option:eq(0)')).append(cloneCidade.children('#cidade-'+_uf));
			// $lojas.find('.listaLi').hide().filter('[data-estado="'+_uf+'"]').show();
		}
	});
}

function filtroCidade(){
	var $estado = $('#selectEstado'),
		$cidade = $('#selectCidade'),
		$lojas = $('#lojasHolder');
	$cidade.on('change', function(event) {
		var _uf = $(this).find('option:selected').parent('optgroup').attr('label'),
			_cidade = $(this).val();
		// $lojas.parent().show();
		if (_cidade===''){
			centralizarEstado(_uf);
			$cidade.prev().text('Cidade');
			$lojas.find('.listaLi').show();
		} else {
			centralizarCidade(_cidade, _uf);
			$estado.val(_uf).prev().text(_uf);
			$lojas.find('.listaLi').hide().filter('[data-cidade="'+_cidade+'"]').show();
			var _loja = $lojas.find('.listaLi[data-cidade="'+_cidade+'"]');
			if (_loja.length===1)
				_loja.trigger('click');
			$('#lojasHolder').jScrollPane({ autoReinitialise: true });
		}
	}).on('click', function(event) {
		var $selectVazio = $(this).parents('.filtrosLi').find('.selectVazio');
		if ($(this).children().length===0){
			$(this).parents('.filtrosLi').find('.selectVazio').show();
			setTimeout(function(){ $selectVazio.hide(); }, 1500);
		}
	});
}

function filtroLoja(){
	var $estado = $('#selectEstado'),
		$cidade = $('#selectCidade'),
		$lojas = $('#lojasHolder');
	$lojas.on('click', '.lojasLink', function(event) {
		event.preventDefault();
		var _id = $(this).attr('id').replace('loja-','');
		clickLoja(_id);
	});
}

function selectRegiao(){
	$('#Estados').on('click', 'g', function(event) {
		var regiao = $(this).attr('id');
		$(this).attr('class', 'RegiaoAtiva').siblings().attr('class', '');
		$('#selectRegiao').val(regiao).trigger('change');
	});

	$('#selectRegiao').on('change', function(event) {
		$('#listaRegiaoUl').jScrollPane({ autoReinitialise: true });
		var regiao = $(this).val();
		if (!regiao){
			$('#Estados g').attr('class', '');
			$('#listaRegiaoUl .listaLi').show();
		} else {
			$('#Estados g#'+regiao).attr('class', 'RegiaoAtiva').siblings().attr('class', '');
			$('#listaRegiaoUl .listaLi').hide().filter('[data-regiao="'+regiao+'"]').show();
		}
	});
}

var styles = [
	{
		"featureType": "landscape.natural",
		"stylers": [
			{ "color": "#717171" }
		]
	},{
		"featureType": "landscape.man_made",
		"stylers": [
			{ "color": "#717171" }
		]
	},{
		"featureType": "road",
		"elementType": "geometry",
		"stylers": [
			{ "color": "#717171" },
			{ "lightness": -25 }
		]
	},{
		"elementType": "labels.text.fill",
		"stylers": [
			{ "color": "#FFFFFF" }
		]
	},{
		"elementType": "labels.text.stroke",
		"stylers": [
			{ "weight": 0.5 },
			{ "visibility": "off" },
			{ "lightness": -50 },
			{ "color": "#717171" }
		]
	},{
		"featureType": "landscape.natural.terrain",
		"stylers": [
			{ "color": "#717171" },
			{ "lightness": -15 }
		]
	},{
		"featureType": "water",
		"stylers": [
			{ "color": "#09B5FF" },
			{ "lightness": +85 },
			{ "visibility": "simplified" }
		]
	},{
		"featureType": "transit",
		"stylers": [
			{ "visibility": "off" }
		]
	},{
		"featureType": "poi",
		"elementType": "geometry",
		"stylers": [
			{ "visibility": "on" },
			{ "color": "#717171" }
		]
	},{
		"featureType": "poi",
		"elementType": "labels",
		"stylers": [
			{ "visibility": "off" }
		]
	},{
		"featureType": "administrative",
		"elementType": "geometry",
		"stylers": [
			{ "color": "#717171" },
			{ "lightness": -50 }
		]
	},{
		"featureType": "administrative.country",
		"stylers": [
			{ "weight": 2.5 }
		]
	}
];

var clusterStyles = [{
	url: $BASE_DIR+'img/icons/pin_cluster.png?7',
	height: 47,
	width: 40,
	textColor: '#CD1C38',
	textSize: 14,
	anchorIcon: [47, 20],
	anchorText: [-3, 0]
}];

var map, geocoder, infowindow, arrayMarkers = [];

function initialize() {
	var lat = -14.235004,
		lng = -51.92528;
	var LatLngCenter = new google.maps.LatLng(lat, lng);

	var mapOptions = {
		zoom: 4,
		center: LatLngCenter,
		scrollwheel: false,
		mapTypeControl: false,
		navigationControl: false,
		scaleControl: false,
		zoomControl: true,
		zoomControlOptions: { style: google.maps.ZoomControlStyle.SMALL },
		panControl: false,
		streetViewControl: false,
		draggable: true,
		disableDefaultUI: true,
		mapTypeControlOptions: { mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'mapEstilos'] }
	};
	map = new google.maps.Map(document.getElementById('mapa'), mapOptions);
	infowindow = new google.maps.InfoWindow({ content: 'carregando...' });
	geocoder = new google.maps.Geocoder();

	$.getJSON($BASE_DIR+'ajax/json.lojas.json', function(json, textStatus) {
		setMarkers(map,json);
	});

	var styledMap = new google.maps.StyledMapType(styles, { name: 'Estilos Mapa' });
	map.mapTypes.set('mapEstilos', styledMap);
	map.setMapTypeId('mapEstilos');

	var sw = new google.maps.LatLng(-33.7517484, -73.98281700000001),
		ne = new google.maps.LatLng(5.271602, -29.34498789999998);
	var brasil = new google.maps.LatLngBounds(sw, ne);
	map.fitBounds(brasil);
}

function setMarkers(map, locations) {
	for (var i = 0; i < locations.length; i++) {
		var loja = locations[i];
			loja.Nome = loja.NomeFantasia || loja.RazaoSocial;
			loja.enderecoCompleto = loja.Rua+' '+loja.Numero+' - '+loja.Bairro+' - '+loja.Cidade+'/'+loja.Estado;
			loja.enderecoGeocode = loja.Rua+' '+loja.Numero+' '+loja.Cep+' - '+loja.Bairro+' - '+loja.Cidade+' - '+loja.Estado+', Brasil';
			loja.Fone = (loja.Telefone) ? '('+loja.DDD+') '+loja.Telefone : '' ;
			loja.FoneLink = (loja.Telefone) ? loja.Fone.replace(/([^0-9])/g, '') : '' ;
			loja.FoneHTML = (loja.Telefone) ? '<li class="contatoLi"><a class="contatoLink" href="tel:'+loja.FoneLink+'">'+loja.Fone+'</a></li>' : '';

		var html =	'<div class="infoLoja">'+
						'<span class="titulo">'+loja.Nome+'</span>'+
						'<span class="endereco">'+loja.enderecoCompleto+'</span>'+
						'<ul class="contatoUl">'+
							loja.FoneHTML +
						'</ul>'+
					'</div>';

		var image = new google.maps.MarkerImage($BASE_DIR+'img/icons/pin.png?7', null, null, null, new google.maps.Size(40,47));
		var myLatLng = new google.maps.LatLng(loja.Lat, loja.Lng);
		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			icon: image,
			title: loja.Nome,
			estado: loja.Estado,
			cidade: loja.Cidade,
			zIndex: i,
			html: html,
			id: loja.CodRazaoSocial
		});
		arrayMarkers[loja.CodRazaoSocial] = marker;
		google.maps.event.addListener(marker, 'click', function (event) {
			clickLoja(this.id);
		});
	}
	var markerCluster = new MarkerClusterer(map, arrayMarkers, { styles: clusterStyles, gridSize: 30, maxZoom: 13 });
}

function centralizarEstado(estado){
	geocoder.geocode({ 'address': estado+' - Brasil' }, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			if (typeof results[0].geometry.bounds !== 'undefined'){
				map.fitBounds(results[0].geometry.bounds);
			} else {
				map.setCenter(results[0].geometry.location);
				map.setZoom(5);
			}
		}
	});
}

function centralizarCidade(cidade,estado){
	geocoder.geocode({ 'address': cidade+'/'+estado+' - Brasil' }, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			if (typeof results[0].geometry.bounds !== 'undefined'){
				map.fitBounds(results[0].geometry.bounds);
			} else {
				map.setCenter(results[0].geometry.location);
				map.setZoom(12);
			}
		}
	});
}

function clickLoja(id){
	var marker = arrayMarkers[id];
	if(typeof marker === 'object'){
		// $('#selectEstado').val(marker.estado).prev().text(marker.estado);
		// $('#selectCidade').val(marker.cidade).prev().text(marker.cidade);
		$('.listaLinkAtivo').removeClass('listaLinkAtivo');
		$('#loja-'+id).addClass('listaLinkAtivo');
		infowindow.setContent(marker.html);
		infowindow.open(map, marker);
		map.panTo(marker.position);
		map.setZoom(15);
	}
}
