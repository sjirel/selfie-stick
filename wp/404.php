<?php
/*
	=================================================
	Selfiestick - Default 404 Template
	=================================================
*/
get_header(); ?>
    <div class="full-block">
			<div  class="error-page" style="text-align:center; margin-top:60px;">
                <h2 style="font-size: 3em;">404</h2>
                <p style="font-size: 18px; line-height: 40px; padding-bottom: 25px;">OOPS !!! PAGE NOT FOUND <br>  It looks like you may have taken a wrong turn. Click <a href="/">here</a> to return to our home page.</p>
            </div>
</div>
	
<?php get_footer(); ?>



<script>
    function initialize(containerID, lat, lng) {

        var styles =[
            {
                stylers: [
                    { hue: "#b5b5b5" },
                    { saturation: -100 }
                ]
            }
        ];
        var styledMap = new google.maps.StyledMapType(styles,
            {name: "Styled Map"});

        var mapOptions = {
            center: new google.maps.LatLng(lat,lng),
            zoom: 14,
            panControl: false,
            mapTypeControl: false,
            scaleControl: false
        };

        var map = new google.maps.Map(document.getElementById(containerID),
            mapOptions);

        var iconBase = 'http://sabalfin.com/wp-content/themes/sabal/assets/images/';
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat,lng),
            map:map,
            icon: iconBase + 'pointer.png'
        });
        //Associate the styled map with the MapTypeId and set it to display.
        map.mapTypes.set('map_style', styledMap);
        map.setMapTypeId('map_style');

    }
</script>


