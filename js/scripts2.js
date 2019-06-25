jQuery( document ).ready(function($) {

// Mobile Nav Menu
var hamburgerButton = $('.hamburger-button');
var body = $('body');
var navMobile = $('nav#mobile-site-navigation');
$(hamburgerButton).on('click', function(event){
		event.preventDefault();		
		$(this).toggleClass('active');
		$(body).toggleClass('active');
		$(navMobile).fadeToggle(200);
});
$(window).on('resize', function () {
    if ($(this).width() >= 768) {
        //do code for less than 480px wide 
		$(hamburgerButton).removeClass('active');
		$(body).removeClass('active');
		$(navMobile).fadeOut(200);
    }
}).trigger('resize');


if ($("body").hasClass("home")) {
// 		Featured Properties Slider
	$('#featured-properties-loop-wrap').slick({
		nextArrow: '<button class="slick-next"><span class="blue-circle"><span class="line line-1"></span><span class="line line-2"></span></span></button>',
		prevArrow: '<button class="slick-prev"><span class="blue-circle"><span class="line line-1"></span><span class="line line-2"></span></button>',
		adaptiveHeight: true,
		autoplay: false,
		infinite: true,
		slidesToShow: 3,
	    slidesToScroll: 3,
		dots: false,
		centerMode: true,
		responsive: [
		    {
		      breakpoint: 1200,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2,
		        adaptiveHeight: true,
		        infinite: true,
		        centerMode: false
		      }
		    },
		    {
		      breakpoint: 768,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
		        adaptiveHeight: true,
		        infinite: true,
		        centerMode: false
		      }
		    }
		    // You can unslick at a given breakpoint now by adding:
		    // settings: "unslick"
		    // instead of a settings object
		  ]
	});
		
}	

if ($("body").hasClass("page-template-page-template-about")) {
// 		Testimonial Slider
		$('#testimonial-cards-wrap').slick({
			nextArrow: '<button class="slick-next"><span class="blue-circle"><span class="line line-1"></span><span class="line line-2"></span></span></button>',
			prevArrow: '<button class="slick-prev"><span class="blue-circle"><span class="line line-1"></span><span class="line line-2"></span></button>',
			adaptiveHeight: true,
			autoplay: false,
			infinite: true,
			slidesToShow: 3,
		    slidesToScroll: 3,
			dots: false,
			responsive: [
			    {
			      breakpoint: 1200,
			      settings: {
			        slidesToShow: 2,
			        slidesToScroll: 2,
			        infinite: true,
			        centerMode: false
			      }
			    },
			    {
			      breakpoint: 768,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1,
			        infinite: true,
			        centerMode: false
			      }
			    }
			    // You can unslick at a given breakpoint now by adding:
			    // settings: "unslick"
			    // instead of a settings object
			  ]
		});	
}

if ($("body").hasClass("single-listings")) {
// 		Single Listing Gallery Slider
	if ( $('#listing-slider').length ) {
        var $slider = $('#listing-slider')
            .on('init', function(slick) {
            })
            .slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                autoplay:false,
                lazyLoad: 'ondemand',
                prevArrow:"<button type='button' id='lsc-l' class='listing-slider-control'><img src='/wp-content/themes/karmar/icons/listingHeaderSliderLeft.png'/></button>",
                nextArrow:"<button type='button' id='lsc-r' class='listing-slider-control'><img src='/wp-content/themes/karmar/icons/listingHeaderSliderRight.png'/></button>"
            });
		var $slider2 = $('#listing-slider-thumb')
            .on('init', function(slick) {
                $('#listing-slider-thumb').fadeIn(1000);
            })
            .slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                lazyLoad: 'ondemand',
                asNavFor: '#listing-slider',
                dots: false,
                centerMode: false,
                focusOnSelect: true,
                prevArrow:"<button type='button' id='lsc-l' class='listing-slider-control'><img src='/wp-content/themes/karmar/icons/listingHeaderSliderLeft.png'/></button>",
                nextArrow:"<button type='button' id='lsc-r' class='listing-slider-control'><img src='/wp-content/themes/karmar/icons/listingHeaderSliderRight.png'/></button>"
            });
		 //remove active class from all thumbnail slides
		 $('#listing-slider-thumb .slick-slide').removeClass('slick-active');
		 //set active class to first thumbnail slides
		 $('#listing-slider-thumb .slick-slide').eq(0).addClass('slick-active');
		 // On before slide change match active thumbnail to current slide
		 $('#listing-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
		 	var mySlideNumber = nextSlide;
		 	$('#listing-slider-thumb .slick-slide').removeClass('slick-active');
		 	$('#listing-slider-thumb .slick-slide').eq(mySlideNumber).addClass('slick-active');
		});
		    // slick slider options
		    // see: https://kenwheeler.github.io/slick/
		var sliderOptions = {
		    slidesToShow   : 1,
		    slidesToScroll : 1,
		    arrows         : false,
		    fade           : true,
		    autoplay       : true
		}
		    // slick slider options
		    // see: https://kenwheeler.github.io/slick/
		var previewSliderOptions = {
		    slidesToShow   : 3,
		    slidesToScroll : 1,
		    dots           : false,
		    focusOnSelect  : false,
		    centerMode     : true
		}
	}
		
// 		Similar Properties Slider
	$('#similar-properties-slider').slick({
		nextArrow: '<button class="slick-next"><span></span></button>',
		prevArrow: '<button class="slick-prev"><span></span></button>',
		adaptiveHeight: true,
		centerMode: true,
		autoplay: false,
		infinite: true,
		slidesToShow: 3,
		dots: false,
        prevArrow:"<button type='button' id='ssc-l' class='listing-slider-control'><img src='/wp-content/themes/karmar/icons/similarSliderLeft.png'/></button>",
        nextArrow:"<button type='button' id='ssc-r' class='listing-slider-control'><img src='/wp-content/themes/karmar/icons/similarSliderRight.png'/></button>"
	});	
		
// 		Google Map
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
			zoom		: 14,
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
		    map.setZoom( 14 );
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


}

if ($("body").hasClass("page-template-page-template-contact")) {
// 		Google Map

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
			zoom		: 14,
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
		    map.setZoom( 14 );
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
	
		$('.contact-map').each(function(){
	
			// create map
			map = new_map( $(this) );
	
		});
	
	});

})(jQuery);	
}

if ($("body").hasClass("search")) {
// 	Filter Button Search Queries
	$('#pre-archive-filter-wrap').on('click', '#sale-filter', function() {
		var url=window.location.href,
	    separator = (url.indexOf("?")===-1)?"?":"&",
	    newParam=separator + "availability=for-sale,for-sale-or-lease";
	    oldParam=separator + "availability=for-lease,for-sale-or-lease";
	    oldParam2=separator + "availability=sold-leased";
	    newUrl=url.replace(oldParam,"").replace(oldParam2,"").replace(newParam,"");
	    newUrl+=newParam;
	    window.location.href =newUrl;
	});	
	$('#pre-archive-filter-wrap').on('click', '#lease-filter', function() {
		var url=window.location.href,
	    separator = (url.indexOf("?")===-1)?"?":"&",
	    newParam=separator + "availability=for-lease,for-sale-or-lease";
	    oldParam=separator + "availability=for-sale,for-sale-or-lease";
	    oldParam2=separator + "availability=sold-leased";
	    newUrl=url.replace(oldParam,"").replace(oldParam2,"").replace(newParam,"");
	    newUrl+=newParam;
	    window.location.href =newUrl;
	});	
/*
	$('#pre-archive-filter-wrap').on('click', '#sold-leased-filter', function() {
		var url=window.location.href,
	    separator = (url.indexOf("?")===-1)?"?":"&",
	    newParam=separator + "availability=sold-leased";
	    oldParam=separator + "availability=for-sale,for-sale-or-lease";
	    oldParam2=separator + "availability=for-lease,for-sale-or-lease";
	    newUrl=url.replace(oldParam,"").replace(oldParam2,"").replace(newParam,"");
	    newUrl+=newParam;
	    window.location.href =newUrl;
	});
*/

	$(function() {	
		if(window.location.href.indexOf("for-sale") > 0) {
			var url = window.location.href;  
			$('#pre-archive-filter-wrap').on('click', '#sold-leased-filter', function() {
// 				window.history.pushState("", "", "listings/?s=all&availability=sold-leased");
				window.location  = url.replace(url, '/listings/?s=all&availability=sold-leased');
			});
		}
	});
	
	$('#listing-filter-wrap').on('click', 'li.filter-all', function() {
	    window.location.href ="listings";
	});							
	$('#listing-filter-wrap').on('click', 'li.filter-retail', function() {
		var url=window.location.href,
	    separator = (url.indexOf("?s")===-1)?"?":"&",
	    newParam=separator + "property_type=retail";
	    newUrl=url.replace(newParam,"");
	    newUrl+=newParam;
	    window.location.href =newUrl;
	});
	$('#listing-filter-wrap').on('click', 'li.filter-investment', function() {
		var url=window.location.href,
	    separator = (url.indexOf("?s")===-1)?"?":"&",
	    newParam=separator + "property_type=investment";
	    newUrl=url.replace(newParam,"");
	    newUrl+=newParam;
	    window.location.href =newUrl;
	});	
	$('#listing-filter-wrap').on('click', 'li.filter-office', function() {
		var url=window.location.href,
	    separator = (url.indexOf("?s")===-1)?"?":"&",
	    newParam=separator + "property_type=office";
	    newUrl=url.replace(newParam,"");
	    newUrl+=newParam;
	    window.location.href =newUrl;
	});	
	$('#listing-filter-wrap').on('click', 'li.filter-industrial', function() {
		var url=window.location.href,
	    separator = (url.indexOf("?s")===-1)?"?":"&",
	    newParam=separator + "property_type=industrial";
	    newUrl=url.replace(newParam,"");
	    newUrl+=newParam;
	    window.location.href =newUrl;
	});
	$('#listing-filter-wrap').on('click', 'li.filter-land', function() {
		var url=window.location.href,
	    separator = (url.indexOf("?s")===-1)?"?":"&",
	    newParam=separator + "property_type=land";
	    newUrl=url.replace(newParam,"");
	    newUrl+=newParam;
	    window.location.href =newUrl;
	});			
	$('#listing-filter-wrap').on('click', 'li.filter-mixed-use', function() {
		var url=window.location.href,
	    separator = (url.indexOf("?s")===-1)?"?":"&",
	    newParam=separator + "property_type=mixed-use";
	    newUrl=url.replace(newParam,"");
	    newUrl+=newParam;
	    window.location.href =newUrl;
	});
	$('#listing-filter-wrap').on('click', 'li.filter-multi-family', function() {
		var url=window.location.href,
	    separator = (url.indexOf("?s")===-1)?"?":"&",
	    newParam=separator + "property_type=multi-family";
	    newUrl=url.replace(newParam,"");
	    newUrl+=newParam;
	    window.location.href =newUrl;
	});	

	// Light Background for active filter buttons
	$(function() {
		if(window.location.href.indexOf("for-sale,") > 0) {
			$('button#sale-filter').addClass('sale-lease-clicked');
		}		
	});
	
	$(function() {
		if(window.location.href.indexOf("for-sale%") > 0) {
			$('button#sale-filter').addClass('sale-lease-clicked');
		}		
	});
	
	$(function() {
		if(window.location.href.indexOf("for-lease,") > 0) {
			$('button#lease-filter').addClass('sale-lease-clicked');
		}
	});
	
	$(function() {
		if(window.location.href.indexOf("for-lease%") > 0) {
			$('button#lease-filter').addClass('sale-lease-clicked');
		}
	});
	
	$(function() {
		if(window.location.href.indexOf("sold-leased") > 0) {
			$('button#sold-leased-filter').addClass('sale-lease-clicked');
		}
	});
	
	$(function() {
		if(window.location.href.indexOf("retail") > 0) {
			$('li.filter-retail').addClass('blue-button-clicked');
		}
	});
	
	$(function() {
		if(window.location.href.indexOf("investment") > 0) {
			$('li.filter-investment').addClass('blue-button-clicked');
		}
	});
	
	$(function() {
		if(window.location.href.indexOf("office") > 0) {
			$('li.filter-office').addClass('blue-button-clicked');
		}
	});
	
	$(function() {
		if(window.location.href.indexOf("industrial") > 0) {
			$('li.filter-industrial').addClass('blue-button-clicked');
		}
	});
	
	$(function() {
		if(window.location.href.indexOf("land") > 0) {
			$('li.filter-land').addClass('blue-button-clicked');
		}
	});
	
	$(function() {
		if(window.location.href.indexOf("mixed-use") > 0) {
			$('li.filter-mixed-use').addClass('blue-button-clicked');
		}
	});
	
	$(function() {
		if(window.location.href.indexOf("multi-family") > 0) {
			$('li.filter-multi-family').addClass('blue-button-clicked');
		}
	});	
}
	
/*
	var availabilitySaleButton = document.getElementById('sale-filter');
	var availabilityLeaseButton = document.getElementById('lease-filter');

	var portfolioPostsContainer = document.getElementById('archive-loop-wrap');
						
	
	if (availabilitySaleButton) {
		availabilitySaleButton.addEventListener( 'click', function(){
			    
			var ourRequest = new XMLHttpRequest();
			ourRequest.open('GET', 'http://karmar.local/wp-json/wp/v2/property_listings?per_page=4&filter[meta_key]=availability&filter[meta_compare]=&filter[meta_value]=sale');
			ourRequest.onload = function() {
			  if (ourRequest.status >= 200 && ourRequest.status < 400) {
		    var Data = JSON.parse(ourRequest.responseText);
		    createHTML(Data);
		    console.log(Data);
		  	} else {
		    console.log("We connected to the server, but it returned an error.");
			  }
			};
			
			ourRequest.onerror = function() {
			  console.log("Connection error");
			};
			
			ourRequest.send();
			});
	}

	if (availabilityLeaseButton) {
		availabilityLeaseButton.addEventListener( 'click', function(){
			    
			var ourRequest = new XMLHttpRequest();
			ourRequest.open('GET', 'http://karmar.local/wp-json/wp/v2/property_listings?per_page=4&filter[meta_key]=availability&filter[meta_compare]=&filter[meta_value]=lease');
			ourRequest.onload = function() {
			  if (ourRequest.status >= 200 && ourRequest.status < 400) {
		    var Data = JSON.parse(ourRequest.responseText);
		    createHTML(Data);
		    console.log(Data);
		  	} else {
		    console.log("We connected to the server, but it returned an error.");
			  }
			};
			
			ourRequest.onerror = function() {
			  console.log("Connection error");
			};
			
			ourRequest.send();
			});
	}
	
	function createHTML(postsData) {
		var ourHTMLString = '';
		for (i = 0; i < postsData.length; i++) {
			ourHTMLString +=
				'<div class="property_listings">' +
					'<div class="listing-thumb-wrap archive-preview-third">' +
						'<img src="' +
						postsData[i].better_featured_image.media_details.sizes.propertyarchivethumb.source_url +
						'"/>' +
					'</div>' +

					'<div class="white-copy-wrap archive-preview-third">' +
						'<p class="white-box-cat archive-white-title">' + postsData[i].categories_names + '</p>' +
						'<p class="archive-description">' + postsData[i].acf.description + '</p>' +
						'<p class="archive-address-title archive-white-title">Address</p>' +
						'<p class="archive-address">' + postsData[i].acf.address + '</p>' +
						'<a class="work-permalink yellow-button" href="/property_listings/' +
							postsData[i].slug +
						'">SHOW MORE</a>' +
					'</div>' +
					
					'<div class="blue-copy-wrap archive-preview-third">' +
						'<p class="archive-blue-title">' + postsData[i].acf.area.unit_label + '</p>' +
						'<p>' + postsData[i].acf.area.unit_number + '</p>' +
						'<p>Availability</p>' +
						'<p>' + postsData[i].acf.availability.label + '</p>' +

					'</div>' +
					
				'</div>';

		}
		portfolioPostsContainer.innerHTML = ourHTMLString;
	}
*/

	
	
	
    console.log( "scripts loaded!" );
});