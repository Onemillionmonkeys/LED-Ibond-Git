<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxDYWTGylq_CZyIMXpcTqzvc7AzwV1c3A"></script>
	<script type="text/javascript">
                        (function($) {
                        
                        /*
                        *  new_map
                        *
                        *  This function will render a Google Map onto the selected jQuery element
                        *
                        *  @type	function
                        *  @date	8/11/2013
                        *  @since	4.3.0
                        *
                        *  @param	$el (jQuery element)
                        *  @return	n/a
                        */
                        
                        function new_map( $el ) {
                            
                            // var
                            var $markers = $el.find('.marker');
                            
                            
                            // vars
                            var args = {
                                zoom		: 2,
                                center		: new google.maps.LatLng(0, 0),
                                mapTypeId	: google.maps.MapTypeId.ROADMAP,
								disableDefaultUI: true

                            };
                            
                            
                            // create map	        	
                            var map = new google.maps.Map( $el[0], args);
                            
                            
                            // add a markers reference
                            map.markers = [];
                            
                            
                            // add markers
                            $markers.each(function(){
                                
                                add_marker( $(this), map );
                                
                            });
                            
                            
                            // center map
                            center_map( map );
                            
                            
                            // return
                            return map;
                            
                        }
                        
                      	function add_marker( $marker, map ) {
                        
                            // var
                            var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
                        
                            // create marker
                            var marker = new google.maps.Marker({
                                position	: latlng,
                                map			: map,
								icon		: "http://ekranoplan.dk/LEDiBond/map.png"
                            });
                        
                            // add to array
                            map.markers.push( marker );
							
							map.set('styles',
								   	[
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#333333"
      }
    ]
  },
  {
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.country",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#FFFFFF"
      }
    ]
  },
  {
    "featureType": "administrative.country",
    "elementType": "labels",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.country",
    "elementType": "labels.text",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.locality",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.locality",
    "elementType": "labels",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.neighborhood",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.province",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.province",
    "elementType": "labels",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "landscape",
    "elementType": "labels",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "road",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  { 
	  "featureType": "transit", 
	  "stylers": [ 
		  { 
			  "visibility": "off" 
		  } 
	  ] 
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#aaaaaa"
      }
    ]
  }
]
								   
								   
								   
								   );
                        
// if marker contains HTML, add it to an infoWindow
if( $marker.html() )
{
	// create info window
	var infowindow = new google.maps.InfoWindow({
		content		: $marker.html()
	});

	// show info window when marker is clicked
	google.maps.event.addListener(marker, 'click', function() {

		infowindow.open( map, marker );

	});
}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

// vars
var bounds = new google.maps.LatLngBounds();

// loop through all markers and create bounds
$.each( map.markers, function( i, marker ){

	var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

	bounds.extend( latlng );

});

// only 1 marker?
if( map.markers.length == 1 )
{
	// set center of map
	map.setCenter( bounds.getCenter() );
	map.setZoom( 4 );
}
else
{
	// fit to bounds
	map.fitBounds( bounds );
}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;

$(document).ready(function(){

$('.acf-map').each(function(){

	// create map
	map = new_map( $(this) );

});

});

})(jQuery);
</script>   