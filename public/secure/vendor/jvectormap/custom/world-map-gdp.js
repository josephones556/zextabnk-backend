// World Map GDP
$(function(){
	$('#world-map-gdp').vectorMap({
		map: 'world_mill_en',
		zoomOnScroll: false,
		series: {
			regions: [{
				values: gdpData,
				scale: ['#f58733', '#61c9f1'],
				normalizeFunction: 'polynomial'
			}]
		},
		backgroundColor: '#ffffff',
		onRegionTipShow: function(e, el, code){
			el.html(el.html()+' (GDP - '+gdpData[code]+')');
		}
	});
});