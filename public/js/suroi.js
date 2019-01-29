var Mobile = 1;
var SearchFilterFollows = 1;


/* Nav Bar Dropdown Fix */

$('.dropdown .nav-link').on('click', function (event) {

	event.preventDefault();
	var hide = $(this).parent().children(".dropdown-menu").hasClass('show');
	$('.dropdown-menu').removeClass('show');

	if (hide == false){
		$(this).parent().children(".dropdown-menu").addClass('show');
	}
	else{
		$(this).parent().children(".dropdown-menu").removeClass('show');
	}

});



$('body').on('click', function (e) {
    if (!$('.sidenav').is(e.target)
        && $('.sidenav').has(e.target).length === 0
        && $('.show').has(e.target).length === 0
    ) {
        $('.dropdown-menu').removeClass('show');
    }
});

/* Home Page Arrow Scroll */
$(".suroi-landing-arrow").click(function(event){
		event.preventDefault();
		var height = $(".suroi-landing").height();
		$('html, body').animate({ scrollTop: height }, 1000);
});

/*Seach Page Settings */

$( ".date-input" ).datepicker({
  	changeMonth: true,
  	changeYear: true,
  	dateFormat: "dd M yy"
});


/* Search Page Arrow Scroll */
$(".suroi-search-recommend i").click(function(event){
	event.preventDefault();
	var height = $(".suroi-location").height()+$(".suroi-card-slideshow").height()-50;
	$('html, body').animate({ scrollTop: height }, 1000);
});


/* Font Weight */
$(".suroi-cards-4 .card .favorite").click(function(event){
	event.preventDefault();
	if ($(this).hasClass("active")){
		$(this).removeClass("active");
	}
	else{
		$(this).addClass("active");
	}

});

/* Search Tags Modal */

$(".suroi-tag-search input").click(function(event){
	event.preventDefault();
	if ($(".suroi-tag-area-indicator").hasClass("active")){

	}
	else{
		$(".suroi-tag-area-indicator").addClass("active");
		$(".suroi-tag-area-indicator input").attr("placeholder", "Type in a tag, or click from below");
	}

});

$(".suroi-tag-area .suroi-tag-area-close").click(function(event){
	event.preventDefault();
	if ($(".suroi-tag-area-indicator").hasClass("active")){
		$(".suroi-tag-area-indicator").removeClass("active");
		$(".suroi-tag-area-indicator input").attr("placeholder", "Click here to add or select your tags");
	}
});



/* Search Slideshow */
// Done By Bootstrap Carousel
/*
var ActiveSlide = 1;
var SlideLimit = 9;
$(".suroi-card-slideshow .circles .fa-circle").click(function(event){
		event.preventDefault();
		$(".suroi-card-slideshow .circles .fa-circle").removeClass("active");
		$(this).addClass("active")
		ActiveSlide = (parseInt((this.className).slice(21, 22)));
});

$(".suroi-card-slideshow .next-arrow").click(function(event){
	event.preventDefault();
	$(".suroi-card-slideshow .circles .fa-circle").removeClass("active");
	ActiveSlide = ((ActiveSlide)%SlideLimit)+1;
	$(".suroi-card-slideshow .circles .circle-"+ActiveSlide).addClass("active");
});

*/

/* Filter Following */

$( document ).scroll(function() {

	try {
    	if (SearchFilterFollows == 1)
		SearchFilterFollow();

		if($(".suroi-tag-area-indicator").hasClass("active")){
			TagBarToggle(".suroi-tag-area .suroi-tag-selection");
		}
	}
	catch(err){

	}

});

/* Slider */

	// On Slide
	$( ".slidecontainer" ).slider({
      range: true,
      min: 0,
      max: 1500,
      values: [ 180, 1357 ],
      slide: function( event, ui ) {
        $( "#min-price" ).html( "P" + ui.values[ 0 ]*100);
        $( "#max-price" ).html( "P" + ui.values[ 1 ]*100);
      }
    });

	// On Load
    $( "#min-price" ).html( "P" + $( ".slidecontainer" ).slider( "values", 0 )*100);
    $( "#max-price" ).html( "P" + $( ".slidecontainer" ).slider( "values", 1 )*100);



/*Page Down Animations */
 $(document).keydown(function(e) {

	try {
		var scroll = $(window).scrollTop();
	 	var height = $(".suroi-landing").height();


	    if((e.which == 34) ) {
	    	if ((String(height) != "undefined") && (scroll < height-5)){
	    		event.preventDefault();
	    		$('html, body').animate({ scrollTop: height }, 120);
	    	}
	 		else{
	 			height = $(".suroi-location").height()-50;

	 			if ((String(height) != "undefined") && (scroll < height-5)){
	    			event.preventDefault();
	    			$('html, body').animate({ scrollTop: height }, 120);
	    		}
	    		else{

	    			height = $(".suroi-location").height()+$(".suroi-card-slideshow").height()-50;

	    			if ((String(height) != "undefined") && (scroll < height-5)){
		    			event.preventDefault();
		    			$('html, body').animate({ scrollTop: height }, 120);
		    		}
	    		}
	 		}
	    }
	}
	catch(err){

	}


    height = 0;



});


 /* Responsiveness*/
    if( $(window).width() < 991 ){
        MobileExclusive();
    }
    else{
        DesktopExclusive();
    }

    $(window).resize(function() {
        if( $(window).width() < 991 ){
            MobileExclusive();
        }
        else{
             DesktopExclusive();
        }
    });

	function MobileExclusive(){
	 	$(".suroi-nav-join").removeClass("border-left");
	  	$(".suroi-nav-join").addClass("border-top");

	  	$("form").removeClass("w-75");
	  	$("form").addClass("w-100");

	  	$(".cover-heading").removeClass("display-4");

	  	$(".navbar-nav .mr-auto").each(function(){
	  		$("li").addClass("suroi-mobile");
	  	});

	  	$(".suroi-location-text h2").removeClass("display-4");
	  	$(".column-sort .review-star").addClass("mx-auto");

	  	Mobile = 1;
	  	$('.suroi-tag-sidebar').css("top", "0");

	  	$('.suroi-tag-area .container-fluid').removeClass("w-75");
	  	$('.suroi-tag-area .container-fluid').addClass("w-100");

	 }

	function DesktopExclusive(){
	  	$(".suroi-nav-join").addClass("border-left");
	  	$(".suroi-nav-join").removeClass("border-top");


	  	$("form").removeClass("w-100");
	  	$("form").addClass("w-75");
	  	$(".cover-heading").addClass("display-4");
	  	$(".suroi-location-text h2").addClass("display-4");

	  	$(".navbar-nav .mr-auto").each(function(){
	  		$("li").removeClass("suroi-mobile");
	  	});
	  	$(".column-sort .review-star").removeClass("mx-auto");

	  	Mobile = 0;
	  	$('.suroi-tag-sidebar').css("top", "0");
	  	$('.suroi-tag-area .container-fluid').removeClass("w-100");
	  	$('.suroi-tag-area .container-fluid').addClass("w-75");
	}

	function SearchFilterFollow(){
		if (Mobile == 0 && SearchFilterFollows == 1){
			var threshold = 250;
			var time = 0.15;
			var scrollheight = $(".suroi-location").height()+$(".suroi-card-slideshow").height()+$(".suroi-tag-search").height()-50;
			var scroll = $(window).scrollTop();
			var containerht = 0;
			var sidebarht = 0;
			var scrollto = 0;
			$('.suroi-tag-sidebar').css("transition",time+"s ease-in-out");
		 	if(String(scrollheight) != "undefined"){
		 		if (scroll < scrollheight+threshold)
		 			$('.suroi-tag-sidebar').css("top", "0");
		 		else{
		 			containerht = $(".suroi-tag-results").height();
		 			sidebarht = $(".suroi-tag-sidebar").height();
		 			scrollto = scroll-scrollheight-15;
		 			if (scroll < scrollheight+containerht-sidebarht)
		 				$('.suroi-tag-sidebar').css("top", scrollto+"px", 400);
		 			else if(scroll > scrollheight+containerht+sidebarht){
		 				scrollto = 0;
		 				$('.suroi-tag-sidebar').css("transition","0");
		 				$('.suroi-tag-sidebar').css("top", scrollto+"px");

		 			}
		 		}
	 		}
		}
		else{

		}
	}

	function TagBarToggle(elem)
	{
	    var docViewTop = $(window).scrollTop();
	    //var docViewBottom = docViewTop + $(window).height();

	    var elemTop = $(elem).offset().top;
	    var elemBottom = elemTop + $(elem).height();

	    if(docViewTop > elemBottom){
	    	$(".suroi-tag-bar .suroi-tag-bar-indicator").addClass("active d-none d-lg-block");
	    }
	    else{
	    	$(".suroi-tag-bar .suroi-tag-bar-indicator").removeClass("active d-none d-lg-block");
	    }
	}
