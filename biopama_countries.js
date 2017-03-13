

var geoserver = 'http://h05-prod-vm11.jrc.it/geoserver/ows';

var GeoserverParameters = {
    service: 'WFS',
    version: '1.0.0',
    request: 'GetFeature',
    typeName: 'conservationmapping:v121_o_country_atts_acp',
    maxFeatures: 200,
    outputFormat: 'text/javascript'
   , format_options: 'callback: getJsonc',
    srsName:'EPSG:4326'

};

function getColor(d) {
    return d > 500000000 ? '#126597' :
           d > 100000000  ? '#2E7AA7' :
           d > 50000000 ? '#4A8FB8' :
           d > 25000000  ? '#67A4C9' :
           d > 10000000  ? '#83B9D9' :
           d > 1000000  ? '#9FCEEA' :
           d > 500000   ? '#BCE3FB' :
                      '#fff';
}

function Polystyle(feature) {
    return {
        fillColor: getColor(feature.properties.sum_budget),
        weight: 1,
        opacity: 1,
        color: 'white',
        dashArray: '3',
        fillOpacity: 0.7,
		zIndex: 1 // Use zIndex to order the tileLayers within the tilePane. The higher number, the upper vertically.
    };
}

var Countryparameters = L.Util.extend(GeoserverParameters);
//console.log(geoserver + L.Util.getParamString(Countryparameters));
$.ajax({
    jsonp : false,
    url: geoserver + L.Util.getParamString(Countryparameters),
    dataType: 'jsonp',
   jsonpCallback: 'getJsonc',
    success: handleJsonc
}).done(function() {
  lMap.spin(false);
})
.error(function () {
  lMap.spin(false);
});

	function highlightFeature(e) {
		var layer = e.target;

		layer.setStyle({
			weight: 2,
			color: '#ffffff',
			dashArray: '',
			fillOpacity: 0.8
		});



		info.update(layer.feature.properties);
	}



function resetHighlight(e) {
    Country_layers.resetStyle(e.target);
}
	function zoomToFeature(e) {
		lMap.fitBounds(e.target.getBounds());
	}


var Country_j = new L.featureGroup().addTo(lMap);
var Country_layesr;
function handleJsonc(data) {
//    console.log(data);
    Country_layers=L.geoJson(data, {

        style:Polystyle,
        onEachFeature: function (feature, layer) {
		layer.bindPopup('<center><i class="fa fa-globe fa-4x" aria-hidden="true"></i><p>COUNTRY </p><hr><a href="/country/'+feature.properties.iso2_mod+'">'+feature.properties.adm0_name+'</a></center><br><i class="fa fa-usd" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; FUNDING (USD) <b>&nbsp;&nbsp;&nbsp;'+((feature.properties.sum_budget)/1000000)+' M</b><hr><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;PROJECTS <b>&nbsp;&nbsp;&nbsp;'+feature.properties.project_numb);
		layer.on({
			mouseover: highlightFeature,
			mouseout: resetHighlight,
			click: zoomToFeature
		});
	},
        pointToLayer: function (feature, latlng) {

			return L.polygon(latlng);

        }
    }).addTo(Country_j);
	//m.fitBounds(Country_j.getBounds());
}
