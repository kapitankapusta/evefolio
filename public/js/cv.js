var map;
var MY_MAPTYPE_ID = 'custom_style';
var markers = [];
var featureOpts = [
    {
    	stylers: [
	        { hue: '#00D4AA' },
	        { visibility: 'simplified' },
	        { gamma: 0.5 },
	        { weight: 0.5 }
      	]
    },
    {
		elementType: 'labels',
		stylers: [
        	{ visibility: 'off' }
      	]
    },
    {
      	featureType: 'water',
      	stylers: [
        	{ color: '#2FAD94' }
      	]
    }
];

function initialize() {
	var mapOptions = {
		zoom: 8,
		center: new google.maps.LatLng(-34.397, 150.644),
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
		},
		mapTypeId: MY_MAPTYPE_ID
	};
	map = new google.maps.Map(document.getElementById('gmap'), mapOptions);
	var styledMapOptions = {
		name: 'Custom Style'
	};
	var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);
	map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
}
google.maps.event.addDomListener(window, 'load', initialize);

function clearMarkers() {
	setAllMap(null);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
	clearMarkers();
	markers = [];
}

// Add a marker to the map and push to the array.
function addMarker(location) {
	var marker = new google.maps.Marker({
		position: location,
		map: map
	});
	markers.push(marker);
}

// Sets the map on all markers in the array.
function setAllMap(map) {
	for (var i = 0; i < markers.length; i++) {
		markers[i].setMap(map);
	}
}


// Shows any markers currently in the array.
function showMarkers() {
	setAllMap(map);
}

$(document).ready(function(){
	// ugly viewport fix for vh height definition. Gonna rethink this
	if ($(window).width() < 768) {
		$('footer').css('margin-top', '120px');
	}

	$('.box').click(function() {
		deleteMarkers();
		$('#gmap').addClass('gmap-active');
		$('#cv_help').fadeOut();
		var figure = $(this).parent();
		var latLon = new google.maps.LatLng(figure.attr('data-latitude'), figure.attr('data-longitude'));

		map.setCenter(latLon);
		map.setZoom(14);
		addMarker(latLon);
		showMarkers();
		$('.description').fadeOut('fast', function() {
			$('.description p').html(figure.attr('data-description'));	
		});
		$('.description').fadeIn();
	})
});
