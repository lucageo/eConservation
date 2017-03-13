var rootUrl = 'http://h05-prod-vm11.jrc.it/geoserver/ows';

var defaultParameters = {
    service: 'WFS',
    version: '1.0.0',
    request: 'GetFeature',
    typeName: 'conservationmapping:v_191_o_sites_acp',
    maxFeatures: 3200,
    outputFormat: 'text/javascript',
	format_options: 'callback: getJson',
    srsName:'EPSG:4326'

};

var parameters = L.Util.extend(defaultParameters);

$.ajax({
    jsonp : false,
    url: rootUrl + L.Util.getParamString(parameters),
    dataType: 'jsonp',
    jsonpCallback: 'getJson',
    success: handleJson
});

var sites_group = new L.MarkerClusterGroup().addTo(lMap);
var sites;
function handleJson(data) {
    sites=L.geoJson(data, {
        onEachFeature: function (feature, my_Layer) {
						my_Layer.bindPopup('<center><i class="fa fa-map-marker fa-4x" aria-hidden="true"></i><center><p>'+feature.properties.site_name+'</p></center><hr><a href="/country/'+feature.properties.site_country_iso2_mod+'">Explore the Country Statistics</a></center>');
					  },
        pointToLayer: function (feature, latlng) {

			return L.marker(latlng
			);
        }
    }).addTo(sites_group);
}


function getJson(data) {
console.log("callback function fired");
}
