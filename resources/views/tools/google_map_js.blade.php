
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}&callback=initMap&libraries=places&v=weekly" defer></script>
{{-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key={{env('GOOGLE_MAP_KEY')}}"></script> --}}

<script>

/* $(document).on('focusout','#address',function(){

}); */



function initMap(paralat = 21.1702, paralng = 72.8311) { // defual surat lat long set

        $('#map').append('<input id="pac-input" class="controls address" type="text" placeholder="Search Box" />');
        var mapOptions, map, marker, searchBox,
            infoWindow = '',
            searchEl = document.getElementById( 'pac-input' ), // searchBar
            addressEl = document.getElementById( 'address' ), // searchBar
            latEl = document.getElementById( 'latitudes' ),
            longEl = document.getElementById( 'longitudes' ),
            zipcodeEl = document.getElementById( 'zipcode' ),
            element = document.getElementById( 'map' );
            //city = document.querySelector( '.reg-input-city' );

        mapOptions = {
            // How far the maps zooms in.
            zoom: 12,
            // Current Lat and Long position of the pin/
            center: new google.maps.LatLng( paralat,paralng ),
            // center : {
            // 	lat: -34.397,
            // 	lng: 150.644
            // },
            disableDefaultUI: false, // Disables the controls like zoom control on the map if set to true
            scrollWheel: true, // If set to false disables the scrolling on the map.
            draggable: true, // If set to false , you cannot move the map around.
            // mapTypeId: google.maps.MapTypeId.HYBRID, // If set to HYBRID its between sat and ROADMAP, Can be set to SATELLITE as well.
            // maxZoom: 11, // Wont allow you to zoom more than this
            // minZoom: 9  // Wont allow you to go more up.
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                position: google.maps.ControlPosition.BOTTOM_CENTER,
            },
            fullscreenControl: true,
            fullscreenControlOptions: {
                position: google.maps.ControlPosition.BOTTOM_LEFT,
            },

        };

        /**
         * Creates the map using google function google.maps.Map() by passing the id of canvas and
         * mapOptions object that we just created above as its parameters.
         *
         */
        // Create an object map with the constructor function Map()
        map = new google.maps.Map( element, mapOptions ); // Till this like of code it loads up the map.

        /**
         * Creates the marker on the map
         *
         */
        marker = new google.maps.Marker({
            position: mapOptions.center,
            map: map,
            // icon: 'http://pngimages.net/sites/default/files/google-maps-png-image-70164.png',
            draggable: true
        });

        /**
         * Creates a search box
         */
        searchBox = new google.maps.places.SearchBox( searchEl );
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(searchEl);


        /**
         * When the place is changed on search box, it takes the marker to the searched location.
         */
        google.maps.event.addListener( searchBox, 'places_changed', function () {
            emptyAddressFields();
            var places = searchBox.getPlaces(),
                bounds = new google.maps.LatLngBounds(),
                i, place, lat, long, resultArray,pincode,
                address = places[0].formatted_address;

            console.log('searchBox');
            console.log(places);
            for( i = 0; place = places[i]; i++ ) {
                bounds.extend( place.geometry.location );
                marker.setPosition( place.geometry.location );  // Set marker position new.
            }

            map.fitBounds( bounds );  // Fit to the bound
            map.setZoom( 15 ); // This function sets the zoom to 15, meaning zooms to level 15.
            // console.log( map.getZoom() );

            resultArray =  places[0].address_components;

            // make sure to initialize i
            for(i=0; i < places.length; i++){
                for(var j=0;j < places[i].address_components.length; j++){
                    for(var k=0; k < places[i].address_components[j].types.length; k++){
                        if(places[i].address_components[j].types[k] == "postal_code"){
                            pincode = places[i].address_components[j].short_name;
                        }
                    }
                }
            }

            lat = marker.getPosition().lat();
            long = marker.getPosition().lng();
            setAddressFields('places_changed',lat,long,address,pincode);

            // Get the city and set the city input value to the one selected
            /* for( var i = 0; i < resultArray.length; i++ ) {
                if ( resultArray[ i ].types[0] && 'administrative_area_level_2' === resultArray[ i ].types[0] ) {
                    citi = resultArray[ i ].long_name;
                    city.value = citi;
                }
            } */


            // Closes the previous info window if it already exists
            if ( infoWindow ) {
                infoWindow.close();
            }
            /**
             * Creates the info Window at the top of the marker
             */
            infoWindow = new google.maps.InfoWindow({
                content: address
            });

            infoWindow.open( map, marker );
        } );


        /**
         * Finds the new position of the marker when the marker is dragged.
         */
        google.maps.event.addListener(marker, "dragend", function ( event ) {
            emptyAddressFields();
            var lat, long, address, resultArray,pincode;
            console.log( 'dragged' );
            lat = marker.getPosition().lat();
            long = marker.getPosition().lng();

            var geocoder = new google.maps.Geocoder();
            geocoder.geocode( { latLng: marker.getPosition() }, function ( results, status ) {
                console.log(results);
                if ( 'OK' === status ) {  // This line can also be written like if ( status == google.maps.GeocoderStatus.OK ) {
                    address = results[0].formatted_address;
                    resultArray =  results[0].address_components;
                    /* console.log(results); */
                    // Get the city and set the city input value to the one selected
                    /*  for( var i = 0; i < resultArray.length; i++ ) {
                        if ( resultArray[ i ].types[0] && 'administrative_area_level_2' === resultArray[ i ].types[0] ) {
                            citi = resultArray[ i ].long_name;
                            console.log( citi );
                            city.value = citi;
                        }
                    } */

                    // make sure to initialize i
                    for(i=0; i < results.length; i++){
                        for(var j=0;j < results[i].address_components.length; j++){
                            for(var k=0; k < results[i].address_components[j].types.length; k++){
                                if(results[i].address_components[j].types[k] == "postal_code"){
                                    pincode = results[i].address_components[j].short_name;
                                }
                            }
                        }
                    }

                    setAddressFields('dragend',lat,long,address,pincode);

                } else {
                    error_msg( 'Geocode was not successful for the following reason: ' + status );
                    console.log( 'Geocode was not successful for the following reason: ' + status );
                }

                // Closes the previous info window if it already exists
                if ( infoWindow ) {
                    infoWindow.close();
                }

                /**
                 * Creates the info Window at the top of the marker
                 */
                infoWindow = new google.maps.InfoWindow({
                    content: address
                });

                infoWindow.open( map, marker );
            } );
        });

        //Zoom to 7 when clicked on marker
        google.maps.event.addListener(marker,'click',function() {
            map.setZoom(17);
            map.setCenter(marker.getPosition());
        });

        google.maps.event.addListener(map, 'click', function(event) {
            emptyAddressFields();
            var lat, long, address, resultArray,pincode;
            var location = event.latLng;
            if(marker){ //on vérifie si le marqueur existe
                marker.setPosition(location); //on change sa position
            }else{
                marker = new google.maps.Marker({ //on créé le marqueur
                    position: location,
                    map: map
                });
            }
            console.log( 'clicked' );


            lat = marker.getPosition().lat();
            long = marker.getPosition().lng();

            var geocoder = new google.maps.Geocoder();
            geocoder.geocode( { latLng: marker.getPosition()}, function(results, status) {
                console.log(results);
                if ( 'OK' === status ) {  // This line can also be written like if ( status == google.maps.GeocoderStatus.OK ) {
                    address = results[0].formatted_address;
                    resultArray =  results[0].address_components;
                    /* console.log(results); */
                    // Get the city and set the city input value to the one selected
                    /*  for( var i = 0; i < resultArray.length; i++ ) {
                        if ( resultArray[ i ].types[0] && 'administrative_area_level_2' === resultArray[ i ].types[0] ) {
                            citi = resultArray[ i ].long_name;
                            console.log( citi );
                            city.value = citi;
                        }
                    } */

                    // make sure to initialize i
                    for(i=0; i < results.length; i++){
                        for(var j=0;j < results[i].address_components.length; j++){
                            for(var k=0; k < results[i].address_components[j].types.length; k++){
                                if(results[i].address_components[j].types[k] == "postal_code"){
                                    pincode = results[i].address_components[j].short_name;
                                }
                            }
                        }
                    }

                    setAddressFields('click',lat,long,address,pincode);
                }
                else {
                    error_msg( 'Geocode was not successful for the following reason: ' + status );
                    console.log( 'Geocode was not successful for the following reason: ' + status );
                }

                // Closes the previous info window if it already exists
                if( infoWindow ) {
                    infoWindow.close();
                }

                /**
                 * Creates the info Window at the top of the marker
                 */
                infoWindow = new google.maps.InfoWindow({
                    content: address
                });

                infoWindow.open( map, marker );
            });
        });

        function truncateString(string, limit = 9) {
            if (string.length > limit) {
                return string.substring(0, limit);
            } else {
                return string;
            }
        }

        function emptyAddressFields(){
            (isset(latEl)) ? latEl.value = "" : '';
            (isset(longEl)) ? longEl.value = "" : '';
            (isset(addressEl)) ? addressEl.value = "" : '';
            (isset(zipcodeEl)) ? zipcodeEl.value = "" : '';
        }

        function setAddressFields(event,lat,long,address,pincode){
            if (event == "places_changed") {
                (isset(latEl)) ? latEl.value = truncateString(lat) : '';
                (isset(longEl)) ? longEl.value = truncateString(long) : '';
                (isset(addressEl)) ? addressEl.value = address : '';
                (isset(zipcodeEl)) ? zipcodeEl.value = pincode : '';
            }else{
                (isset(latEl)) ? latEl.value = truncateString(lat) : '';
                (isset(longEl)) ? longEl.value = truncateString(long) : '';
                (isset(searchEl)) ? searchEl.value = address : '';
                (isset(addressEl)) ? addressEl.value = address : '';
                (isset(zipcodeEl)) ? zipcodeEl.value = pincode : '';
            }
        }
}

window.initMap = initMap;


</script>
