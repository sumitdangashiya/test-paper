jQuery(document).ready( function( $ ) {
     var templateUrl = object_name.templateUrl;

	 $(".owl-carousel").owlCarousel({
		loop: true,
		autoplay: false,
		items: 1,
		nav: true,
		autoplayHoverPause: true,
		animateOut: 'slideOutUp',
		animateIn: 'slideInUp',
		//navText : ["<i class='fa fa-chevron-up'></i>","<i class='fa fa-chevron-down'></i>"],
		navText : ["<img src='"+templateUrl+"/images/slider-top-pagination.png'>","<img src='"+templateUrl+"/images/slider-bottom-pagination.png'>"],
	    dots: true,
		dotsEach: true,
	});
    
	$( ".tabs li" ).first().addClass('current');
	$( ".tab-content" ).first().addClass('current');
	
	$('ul.tabs li').hover(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
       
        console.log(tab_id);
        
		$("#"+tab_id).addClass('current');
	})
    

    $('.menu-toggle').on('click',function() {
        $('.main-navigation ul').slideToggle();
    });
  
});



