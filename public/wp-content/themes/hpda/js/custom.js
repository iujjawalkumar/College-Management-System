$(document).ready(function(){
  
/*navigation 1*/  
	  $().jetmenu();
  
/*home page slider*/  
  
	$('.bxslider').bxSlider({
		pager: false,
		pause: 6000,
		auto:true,
	});
  
  
/*news ticker*/

  	$('.news').bxSlider({
		mode:'fade',
		pause: 4000,
		auto:true,
		pager:false,
		controls:false
	});
	

	/*campustour slider*/
	$('.campustour').bxSlider({
	minSlides: 1,
	maxSlides: 4,
	slideWidth: 221,
	slideMargin: 30,
	pause: 4000,
	auto:true,
	pager:false,
	controls:false
	});
	
	
	/*testimonials slider*/
	
	$('.testimonials').bxSlider({
	mode: 'vertical',
	pause: 5000,
	auto:true,
	controls:false,
	pager:true
	});

/*submenu*/	

$('.mob-icon').click(function() {
		$('.ver_nav').slideToggle(300);	
	});

/*end of document*/

  });
  
