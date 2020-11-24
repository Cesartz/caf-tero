;(function () {
	
	'use strict';

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
			BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
			iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
			Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
			Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
			any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};

	var fullHeight = function() {
		if ( !isMobile.any() ) {
			$('.js-fullheight').css('height', $(window).height()-160);
			$(window).resize(function(){
				$('.js-fullheight').css('height', $(window).height()-160);
			});
		}
	};

	var mobileMenuOutsideClick = function() {										
		
	};

	
	var header = function() {
		$('.header-fixed').css('padding-top', $('.tero-nav').height());
	};

	var navigation = function() {
		$('body').on('click', '#tero-offcanvas ul a:not([class="external"]), .main-nav a:not([class="external"])', function(event){
			var section = $(this).data('nav-section');
				if ( $('[data-section="' + section + '"]').length ) {
			    	if($("body").hasClass("active")){
						$('html, body').animate({
							scrollTop: $('[data-section="' + section + '"]').offset().top - 85
						}, 800, 'easeInOutExpo');
					}
					else{
												$('html, body').animate({
							scrollTop: $('[data-section="' + section + '"]').offset().top - 85
						}, 800, 'easeInOutExpo');
					}
			   }
			   if ($('body').hasClass('offcanvas')) {
			   	$('body').removeClass('offcanvas');
			   	$('.js-tero-nav-toggle').removeClass('active');
			   }
		   event.preventDefault();
		   return false;
		});
		
		
		$("#tero-logo a").on('click',function(event){
			$('html, body').animate({scrollTop: $('[data-section="home"]').offset().top-85}, 800, 'easeInOutExpo');
			event.preventDefault();
		   return false;
		});
		
		
		

	};


	var offcanvasMenu = function() {
		$('body').prepend('<div id="tero-offcanvas" />');
		$('body').prepend('<a href="#" class="js-tero-nav-toggle tero-nav-toggle"><i></i></a>');
		var clone1 = $('.menu-1 > ul').clone();
		$('#tero-offcanvas').append(clone1);
		var clone2 = $('.menu-2 > ul').clone();
		$('#tero-offcanvas').append(clone2);

		$('#tero-offcanvas .has-dropdown').addClass('offcanvas-has-dropdown');
		$('#tero-offcanvas')
			.find('li')
			.removeClass('has-dropdown');

		// Hover dropdown menu on mobile
		$('.offcanvas-has-dropdown').mouseenter(function(){
			var $this = $(this);
			$this
				.addClass('active')
				.find('ul')
				.slideDown(500, 'easeOutExpo');				
		}).mouseleave(function(){
			var $this = $(this);
			$this
				.removeClass('active')
				.find('ul')
				.slideUp(500, 'easeOutExpo');				
		});

		$(window).resize(function(){
			if ( $('body').hasClass('offcanvas') ) {
    			$('body').removeClass('offcanvas');
    			$('.js-tero-nav-toggle').removeClass('active');
	    	}
		});
	};


	// Reflect scrolling in navigation
	var navActive = function(section) {
		var $el = $('.main-nav > ul');
		$el.find('li').removeClass('active');
		$el.each(function(){
			$(this).find('a[data-nav-section="'+section+'"]').closest('li').addClass('active');
		});
	};

	var navigationSection = function() {
		var $section = $('div[data-section]');
		$section.waypoint(function(direction) {
		  	
		  	if (direction === 'down') {
		    	navActive($(this.element).data('section'));
		  	}
		}, {
	  		offset: '150px'
		});
		$section.waypoint(function(direction) {
		  	if (direction === 'up') {
		    	navActive($(this.element).data('section'));
		  	}
		}, {
		  	offset: function() { return -$(this.element).height() ; }
		});
	};

	var burgerMenu = function() {
		$('body').on('click', '.js-tero-nav-toggle', function(event){
			var $this = $(this);
			if ( $('body').hasClass('offcanvas') ) {
				$('body').removeClass('offcanvas');
			} else {
				$('body').addClass('offcanvas');
			}
			$this.toggleClass('active');
			event.preventDefault();
		});
	};



	var contentWayPoint = function() {
		var i = 0;
		$('.animate-box').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('animated-fast') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .animate-box.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn animated-fast');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft animated-fast');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight animated-fast');
							} else if ( effect === 'flipInY') {
								el.addClass('flipInY animated-fast');
							} else if ( effect === 'fadeInDown') {
								el.addClass('fadeInDown animated-fast');
							} else {
								el.addClass('fadeInUp animated-fast');
							}

							el.removeClass('item-animate');
						},  k * 100, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '85%' } );
	};


	var dropdown = function() {

		$('.has-dropdown').mouseenter(function(){

			var $this = $(this);
			$this
				.find('.dropdown')
				.css('display', 'block')
				.addClass('animated-fast fadeInUpMenu');

		}).mouseleave(function(){
			var $this = $(this);

			$this
				.find('.dropdown')
				.css('display', 'none')
				.removeClass('animated-fast fadeInUpMenu');
		});

	};


	var goToTop = function() {

		$('.js-gotop').on('click', function(event){
			event.preventDefault();

			$('html, body').animate({
				scrollTop: $('html').offset().top
			}, 500, 'easeInOutExpo');
			
			return false;
		});

		$(window).scroll(function(){

			var $win = $(window);
			if ($win.scrollTop() > 1) {
				$('.js-top').addClass('active');
				$('.tero-nav,.w100,body').addClass('active');
				//$('.js-fullheight').css('height', $(window).height()-70);
				
			} else {
				$('.js-top').removeClass('active');
				$('.tero-nav,.w100,body').removeClass('active');
				//$('.js-fullheight').css('height', $(window).height()-150);
			}

		});
		
	
	};


	// Loading page
	var loaderPage = function() {
		$(".tero-loader").fadeOut("slow");
	};

	var counter = function() {
		$('.js-counter').countTo({
			 formatter: function (value, options) {
	      		return value.toFixed(options.decimals);
	    	}
		});
	};

	var counterWayPoint = function() {
		if ($('.counters').length > 0 ) {
			$('.counters').waypoint( function( direction ) {										
				if( direction === 'down' && !$(this.element).hasClass('animated') ) {
					setTimeout( counter , 400);									
					$(this.element).addClass('animated');
				}
			} , { offset: '90%' } );
		}
	};


	var sliderMain = function() {
		
	  	$('#tero-hero .flexslider').flexslider({
			animation: "fade",
			animationSpeed: 1000,
			slideshowSpeed: 4000,
			directionNav: true,
			controlNav: false,
			start: function(){
				setTimeout(function(){
					//$('.slider-text').removeClass('animated fadeInUp');
					$('.slider-text').addClass('animated fadeInUp');
				}, 500);
			},
			before: function(){
				
			}
	  	});
						
		
	  	//$('#tero-hero .flexslider .slides > li').css('height', $(window).height()-160);	
	  	$(window).resize(function(){
	  		//$('#tero-hero .flexslider .slides > li').css('height', $(window).height()-160);	
	  	});

	};

	
	$(function(){
		fullHeight();
		mobileMenuOutsideClick();
		header();
		navigation();
		offcanvasMenu();
		burgerMenu();
		navigationSection();
		contentWayPoint();
		dropdown();		
		goToTop();
		loaderPage();
		counterWayPoint();
		sliderMain();
	});


}());








$(document).ready(function () {

	
	$('.eleccion').on('click', function(event) {
		$this=$(this);
		$('.eleccion').removeClass("selected");
		$this.addClass("selected");
		$(".contenido").hide();
		$($this.attr("href")).show();
		return false;
	});
	
	
	$('.marquee').marquee({
		 duration: 50000,
		 duplicated: true,
		 gap: 0, 
		 direction: 'left',
		 pauseOnHover: false,
		 delayBeforeStart: -1000,
		 startVisible:true
	});
					
					
	var imgrotate1 = ["images/icon-smiley.png", "images/icon-cactus.png", "images/icon-car.png", "images/icon-caras.png",
					"images/icon-carro.png", "images/icon-cigarro.png", "images/icon-manos.png", "images/icon-mundo.png",
					"images/icon-paloma.png", "images/icon-panuelo.png", "images/icon-sax.png", "images/icon-semaforo.png"];
	var counter1 = 0;
	var $elem1 = $('.img-rotate1');
	var inst1 = setInterval(change1, 2000);				
	function change1() {
	  $elem1.css({"background-image":"url('"+imgrotate1[counter1]+"')"}).fadeOut(0).delay(50).fadeIn(0);
	  counter1++;
	  if (counter1 >= imgrotate1.length) {
		counter1 = 0;
	  }
	}
	change1();	
		
});

  
  