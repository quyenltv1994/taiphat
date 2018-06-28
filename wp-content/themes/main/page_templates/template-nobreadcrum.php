<?php
/*
Template Name: Contact US
*/
get_header(); 

	/*CUSTOM DEFAULT*/
	$layout 		= get_theme_mod('tvlgiao_wpdance_default_page_layout','0-1-0');
	$sidebar_left 	= get_theme_mod('tvlgiao_wpdance_default_page_sidebar_left','sidebar');
	$sidebar_right 	= get_theme_mod('tvlgiao_wpdance_default_page_sidebar_right','sidebar');
	if( ($layout == '1-0-0') || ($layout == '0-0-1') ){
		$content_class = "col-sm-18";
	}elseif($layout == '1-0-1'){
		$content_class = "col-sm-12";
	}else{
		$content_class = "col-sm-24";
	}

?>
<div id="main-content" class="main-content myp-template-contact-us">
	<?php 

		$googlemap = get_field('mypc_company_map');
		if( !empty($googlemap) ):
	?>
		<div class="acf-map">
			<div class="marker" data-lat="<?php echo $googlemap['lat']; ?>" data-lng="<?php echo $googlemap['lng']; ?>"></div>
		</div>
	<?php endif; ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 mypc-contact-left">
				<div class="mypc-img-logo-contact">
					<img src="<?=get_field('mypc_logo_image','option')?>" alt="Logo Việt Land VN">
				</div>
				<h2><?=get_field('mypc_company_name','option');?></h2>
				<ul class="contact-company">
					<li><i class="fa fa-map-marker" aria-hidden="true"></i><span><?=get_field('mypc_address','option');?></span></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i><span><?=get_field('mypc_telephone_number','option');?></span></li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><span><?=get_field('mypc_email','option');?></span></li>
				</ul>
				<h3>Cam Kết Từ Hưng Thịnh Land</h3>
				<div class="mypc-su-menh">
					<?=get_field('mypc_su_menh','option');?>
				</div>
			</div>
			<div class="col-sm-12">
				<h2>LIÊN HỆ CHÚNG TÔI</h2>
				<?php echo do_shortcode('[contact-form-7 id="'.get_field('mypc_form_contact').'" title="Liên Hệ"]'); ?>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	.acf-map {
		width: 100%;
		height: 350px;
	}
	.acf-map img {
	   max-width: inherit !important;
	}
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=<?=get_field('mypc_may_key','option')?>"></script>
<script type="text/javascript">
	(function($) {
		function new_map( $el ) {
			// var
			var $markers = $el.find('.marker');
			// vars
			var args = {
				zoom		: 0,
				center		: new google.maps.LatLng(0, 0),
				mapTypeId	: google.maps.MapTypeId.ROADMAP
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

		/*
		*  add_marker
		*
		*  This function will add a marker to the selected Google Map
		*
		*  @type	function
		*  @date	8/11/2013
		*  @since	4.3.0
		*
		*  @param	$marker (jQuery element)
		*  @param	map (Google Map object)
		*  @return	n/a
		*/

		function add_marker( $marker, map ) {

			// var
			var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

			// create marker
			var marker = new google.maps.Marker({
				position	: latlng,
				map			: map
			});

			// add to array
			map.markers.push( marker );

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
			    map.setZoom( 15 );
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
<?php get_footer(); ?>