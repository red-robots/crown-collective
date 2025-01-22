/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Lisa DeBona
 */

jQuery(document).ready(function ($) {

var params = {}; location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (s, k, v) { params[k] = v });

$('.inline').colorbox({
  inline:true, 
  width:"50%",
  // href:".instr",
  // innerWidth: 300
});


$('.loop').owlCarousel({
    center: true,
    items:2,
    nav: true,
    loop:true,
    margin:15,
    autoplay:true,
    smartSpeed: 1000,
    autoplayTimeout:10000,
    autoplayHoverPause:true,
    responsive:{
      600:{
        items:1
      },
      400:{
        items:1
      }
    }
});


$('.carousel-center-loop').owlCarousel({
    center: true,
    items:2,
    nav: true,
    loop:true,
    margin:15,
    autoplay:true,
    smartSpeed: 1000,
    autoplayTimeout:10000,
    autoplayHoverPause:true,
    responsive:{
      400:{
        items:1
      },
      768: {
        items:2
      }
    }
});

/*
*
*     Subnaviagation Animation
*
*
*/
$('li.menu-item').hover(function() {
    $(this).toggleClass('active');
    $(this).find('.mega-menu .mega-menu-content .menu-col').toggleClass('is-hovered');
 
});

var subMenus = $(".mega-menu");

$.each($(".menu-item"), function(index, element) {
  let subMenu = $(element).children('.mega-menu'), tl;
  let subMenuItems = $(subMenu).children('li');
  
  if(subMenu.length != 0) {
    tl = new gsap.timeline({paused:true});
    
    tl.from(subMenu, .05, {height:0});
    // tl.staggerTo(subMenuItems, 0.6, {
    //   top: "0px",
    //   ease: Expo.easeInOut,
    // }, 0.1, "-=0.8");
    
    element.subMenuAnimation = tl;
    
    $(element).hover(menuItemOver, menuItemOut);
  } 
});

function menuItemOver(e) {
  this.subMenuAnimation.play();
}

function menuItemOut() {
  this.subMenuAnimation.reverse();
}
/*
*
*     Fixed Navigation on Scroll up
*
*
*/
// Get the navigation bar element
const navbar = document.getElementById("masthead");

// Initialize the previous scroll position
let prevScrollPosition = window.pageYOffset;

window.addEventListener("scroll", () => {
  // Get the current scroll position
  const currentScrollPosition = window.pageYOffset;

  // Check if the user has scrolled up
  if (currentScrollPosition < prevScrollPosition) {
    // Set the navbar's position to fixed
    navbar.classList.add("fixed");
    navbar.classList.remove("scrolling");
  } else {
    // Optionally, you can unfix the navbar if the user scrolls down
    // Uncomment the following line if you want this behavior
    navbar.classList.remove("fixed");
    navbar.classList.add("scrolling");
    // navbar.classList.remove("start-position");
  }

   // Check if the user is at the top of the page
  if (currentScrollPosition === 0) {
    navbar.classList.add("start-position");
    navbar.classList.remove("fixed");
  } else {
    navbar.classList.remove("start-position");
  }

  // Update the previous scroll position
  prevScrollPosition = currentScrollPosition;
});

/*** Mobile Navigation ***/
$(document).on('click','#mobile-menu-toggle',function(e){
  e.preventDefault();
  $('body').toggleClass('mobile-menu-open');
  $('#site-navigation').toggleClass('active');
  $('#masthead').toggleClass('active');
  $(this).toggleClass('active');
  $('.mobile-navigation').toggleClass('active');
});

$(document).on('click','#overlay',function(e){
  e.preventDefault(); 
  $(this).removeClass('active');
  $('body').removeClass('mobile-menu-open');
  $('#mobile-menu-toggle').removeClass('active');
  $('#site-navigation').removeClass('active');
  $('#masthead').removeClass('active');
});

$(document).on("click", "a.mobile-parent-link", function(e) {
  e.preventDefault();
    $(this).parent().toggleClass('show-submenu');
    $(this).parent().find('.mega-menu-mobile').slideToggle();
    // if ($(this).hasClass('toggled')) {
    //     window.location.href = $(this).attr('href');
    // } else {
    //     e.preventDefault();
    //     $(this).next().slideToggle();
    //     $(this).addClass('toggled');
    // }
});

// init Isotope
var $container = $('#rest-isotope').isotope({
  itemSelector: '.item'
});

// var $output = $('#output');

// filter with selects and checkboxes
var $checkboxes = $('#form-ui input');

$checkboxes.change( function() {
  // map input values to an array
  var inclusives = [];
  // inclusive filters from checkboxes
  $checkboxes.each( function( i, elem ) {
    // if checkbox, use value if checked
    if ( elem.checked ) {
      inclusives.push( elem.value );
    }
  });

  // combine inclusive filters
  var filterValue = inclusives.length ? inclusives.join(', ') : '*';

  // $output.text( filterValue );
  $container.isotope({ filter: filterValue })
});

$('[data-fancybox]').fancybox({
	touch : true,
	hash : false,
youtube : {
	controls : 0,
	showinfo : 0,
	rel: 0
},
vimeo : {
	color : 'ffffff'
}
});

$('.zoom-image').fancybox({
	buttons : ['fullScreen','close'],
	hash : false
});

var windowHeight = $(window).scrollTop();
if(windowHeight  > 200) {
	$("body").addClass('scrolled');
}

$(window).scroll(function() {    
	var wHeight = $(window).scrollTop();
	if(wHeight  > 200) {
		$("body").addClass('scrolled');
	} else{
		$("body").removeClass('scrolled');
		//$('body').removeClass('subnav-clicked');
	}
});


/*** Banner Sldier ***/
var swiper = new Swiper('.swiper', {
	autoplay: {
		delay: 15000
	},
	speed: 500,
	loop: true,
	preventClicks: false,
	fadeEffect: {
		crossFade: true
	},
	effect: "fade"
});



	if( $("#banner").length > 0 && $("#pageTabs").length>0 ) {
		
		$(window).scroll(function() { 
			var tabsHeight = $("#pageTabs").height();
			if( $(".main-description").length>0 ) {
				var main = $(".main-description").height();
				tabsHeight = main;
			}
			var bannerHeight = $("#banner").height();
			var screenOffset = bannerHeight + tabsHeight;
			var wHeight = $(window).scrollTop();
			if(wHeight  > screenOffset) {
				$("#pageTabs").addClass('fixed-top');
			} else {
				$("#pageTabs").removeClass('fixed-top');
			}
		});
	}


    $('.subpageSlides').flexslider({
      animation: "fade",
      smoothHeight: true
    });
  
  
// tiny helper function to add breakpoints
var getGridSize = function() {
  return (window.innerWidth < 600) ? 1 :
         (window.innerWidth < 900) ? 2 : 3;
}
// Instructions Schedule
  $('.flexslider-instr').flexslider({
    animation: "slide",
    animationLoop: false,
    slideshow: false,
    itemWidth: 210,
    itemMargin: 5,
    minItems: getGridSize(),
    maxItems: getGridSize(),
    startAt: 0,
  });


	if( $(".video__vimeo").length > 0 ) {
		$(".video__vimeo").each(function(){
			var target = $(this);
			var vimeoURL = $(this).attr("data-url");
			var apiURL = 'https://vimeo.com/api/oembed.json?url='+vimeoURL;
			$.get(apiURL,function(data){
				var thumbnail = data.thumbnail_url;
				target.css("background-image","url('"+thumbnail+"')");
			});
		});
	}


	var is_video_playing = false;

	var $slides = $('.flexslider .slides li');
    if ($slides.length > 0) {
        $slides.eq(1).add($slides.eq(-1)).find('img.lazy')
            .each(function () {
                var src = $(this).attr('data-src');
                $(this).removeClass('lazy');
                $(this).attr('src', src).removeAttr('data-src');
            });
    }

    var slideShow = $('.flexslider').flexslider({
		animation: "fade",
		smoothHeight: true,
		before: function (slider) { 
			var $slides = $(slider.slides),
                index = slider.animatingTo,
                current = index,
                nxt_slide = current + 1,
                prev_slide = current - 1;
            if ($slides.length > 0) {
                $slides.eq(current).add($slides.eq(nxt_slide)).add($slides.eq(prev_slide))
                    .find('img.lazy').each(function () {
                        var src = $(this).attr('data-src');
                        $(this).removeClass('lazy');
                        $(this).attr('src', src).removeAttr('data-src');
                    });
                if($slides.eq(current).find('.videoIframe').length > 0){

	    			$(".videoIframeDiv").removeClass("playing");
	    			$(".videoIframe").hide();

                    $("body").addClass("current-slide-is-video");
                } else {
                	$("body").removeClass("current-slide-is-video");
                }
            }
		},
		start: function(slider){
			var $slides = $(slider.slides);
            if ($slides.length > 0) {
                play_flexslider_video(slider);
            }
            
		}
	});

    $(document).on("click",".flex-next, .flex-prev",function(e){
    	e.preventDefault();
    	if( $("iframe.videoIframe").length > 0 ) {
    		$("iframe.videoIframe").each(function(){
    			var type = $(this).attr("data-vid");
    			if(type=='youtube') {
    				var parent = $(this).parents(".videoIframeDiv");
    				var embedURL = parent.find(".playVidBtn").attr("data-embed");
    				if(e.target.outerText=='Next') {
    					$(this).attr("src",embedURL);
    				}
    			} 
    			else if(type=='vimeo') {
 					var iframe = $(this)[0];
					var player = new Vimeo.Player(iframe);
					player.pause();
    			}
    		});
    	}
    });

    function play_flexslider_video(slider) {
		$(document).on("click",".playVidBtn",function(e){
			e.preventDefault();
			var type = $(this).attr("data-type");
			var parent = $(this).parents(".videoIframeDiv");
			if(type=='youtube') {
				var iframeSRC = $(this).attr("data-embed");
				parent.find("iframe.videoIframe")[0].src += "&autoplay=1";
				//parent.find("iframe.videoIframe").attr("src",iframeSRC+"&autoplay=1");
				parent.addClass("playing");
				parent.find("iframe.videoIframe").fadeIn();
				is_video_playing = true;
				slider.stop();
			}
			else if(type=='vimeo') {
				var iframe = parent.find("iframe.videoIframe")[0];
				var player = new Vimeo.Player(iframe);
				parent.addClass("playing");
				parent.find("iframe.videoIframe").fadeIn();
				player.play();
				slider.stop();
			}
		});


    }
	
 	


 // When was this added?
 	// $(document).on('click', function (e) {
 	// 	var tag = $(this);
 	// 	var exceptions = ['todayToggle','todayLink','todayTxt','today-options', 'arrow'];
 	// 	var elementId = e.target.id;
  //   //console.log(e);
 	// 	var is_open = false;
 	// 	if( elementId=='today-options' ) {
 	// 		$(".topinfo .today").addClass("open");
 	// 	} else {
 	// 		if($.inArray(elementId, exceptions) != -1) {
	// 			if( $(".topinfo .today").hasClass("open") ) {
	// 				$(".topinfo .today").removeClass("open");
	// 			} else {
	// 				$(".topinfo .today").addClass("open");
	// 			}
	//  		} else {
	//  			$(".topinfo .today").removeClass("open");
	//  		}
 	// 	}
	// });
	

	$('a[href*="#"]:not([href="#"])').click(function() {
    var headHeight = $("#masthead").height();
		var offset = headHeight + 80;

    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html, body').animate({
              scrollTop: target.offset().top - offset
          }, 1000);
          return false;
        }
    }
	});


	/* Load More */
	$(document).on("click","#loadMoreBtn",function(event){
		event.preventDefault();
		var loadButton = $(this);
		var pageURL = ( typeof $("a.page-numbers").eq(0)!=undefined ) ? $("a.page-numbers").attr("href") : '';
		var current_page = $(this).attr("data-current");
		var next_page = parseInt(current_page) + 1;
		var last_page = $(this).attr("data-end");
		if(pageURL) {
			var parts = pageURL.split("pg=");
			var num = parts[1];
			var url = pageURL.replace('pg='+num,'pg='+next_page);
			loadButton.attr("data-current",next_page);

			$(".next-posts").load(url + " .posts-inner .flex-inner",function(){
				var htmlContent = $(".next-posts .flex-inner").html();
				$("#data-container .flex-inner").append(htmlContent);
				$(".next-posts").html("");
				if(next_page==last_page) {
					$(".loadmorediv").html('').hide();
				} 
			});
		}
		
	});

	$('#playYoutube').on('click', function(ev) {
		$(this).hide();
		$(".videoIframeDiv").addClass('play_video');
    $(".videoIframe")[0].src += "&autoplay=1";
    $("#banner").addClass("video-playing");
    ev.preventDefault();
  });

  $('.select-single').select2();

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();

	$('.js-blocks').matchHeight();
	$('.js-title').matchHeight();

	/* Search Form (Header) */
	$(document).on("click","#topsearchBtn",function(e){
		e.preventDefault();
		$("#topSearchBar form").submit();
	});

	$(document).on("click","#searchHereBtn",function(e){
		e.preventDefault();
		$(this).toggleClass('search-open');
		$('#topSearchBar').toggleClass('show');
		$('body').toggleClass('search-form-open');
		$("input.search-field").focus();
	});

	$(document).on("click","#closeTopSearch",function(e){
		e.preventDefault();
		$('#searchHereBtn').removeClass('search-open');
		$('#topSearchBar').removeClass('show');
		$('body').removeClass('search-form-open');
		//$("input.search-field").val("");
	});

	
	/* Footer Subscribe Form */
	$('#footSubscribeForm input[type="email"]').on("focus",function(){
		$("#footSubscribeForm").addClass('input-focus');
	});
	$('#footSubscribeForm input[type="email"]').on("focusout blur",function(){
		$("#footSubscribeForm").removeClass('input-focus');
	});

	/* Ajax Load More */
	$(document).on("click","#loadMoreBtn2",function(e){
		e.preventDefault();
		var moreButton = $(this);
		var target = $(this);
		var perpage = target.attr("data-perpage");
		var posttype = target.attr("data-posttype");
		var paged = target.attr("data-page");
		var base_url = target.attr("data-baseurl");
		var next_page = parseInt(paged) + 1;
		var total_pages = target.attr("data-totalpages");
		var total = parseInt(total_pages);
		target.attr("data-page",next_page);
		var pageURL = currentURL + '?pg=' + paged;
		$("#tempContainer").load(pageURL+" #postLists",function(){
			
			if( $("#tempContainer #postLists").length>0 ) {
				var entries = $("#tempContainer #postLists").html();
				$(".wait").show();
				setTimeout(function(){
					$(entries).appendTo(".archive-posts-wrap #postLists");
					$(".wait").hide();
				},600);
				
				if(next_page>total) {
					moreButton.hide();
				}
			} else {
				moreButton.hide();
			}
			
		});



	});

	/* Ajax Load More */
	$(document).on("click","#loadMoreBtn3",function(e){
		e.preventDefault();
		var moreButton = $(this);
		var target = $(this);
		var perpage = target.attr("data-perpage");
		var posttype = target.attr("data-posttype");
		var paged = target.attr("data-page");
		var base_url = target.attr("data-baseurl");
		var next_page = parseInt(paged) + 1;
		var total_pages = target.attr("data-totalpages");
		var total = parseInt(total_pages);
		target.attr("data-page",next_page);
		var url = window.location.href;
		var countparams = url.split("=");
		var newURL = currentURL + '?pg=' + paged;
		var nextURL = currentURL + '?pg=' + next_page;
		if(countparams.length>1) {
			var str = url.replace(currentURL,'');
			newURL += str.replace('?','&');
			nextURL += str.replace('?','&');
		}
		$("#tempContainer").load(newURL+" #postLists",function(){
			
			if( $("#tempContainer #postLists").length>0 ) {
				var entries = $("#tempContainer #postLists").html();
				$(".wait").show();
				setTimeout(function(){
					$(entries).appendTo(".archive-posts-wrap #postLists");
					$(".wait").hide();
				},500);
				
				if(paged>=total) {
					moreButton.hide();
				}
			} 
			
		});

		/* Hide More Button if end of records */
		$("#tempNext").load(nextURL+" #postLists",function(){
			if( $("#tempNext #postLists").length==0 ) {
				moreButton.hide();
			}
		});

	});

	$(document).on("change","select.facetwp-dropdown",function(){
		var opt = $(this).val();
		if( $(".morebuttondiv").length>0 ) {
			$(".morebuttondiv").load(currentURL+" .moreBtnSpan",function(){

			});
		}
	});

	if( $("#filter-form").length>0 ) {
		$(document).on("change",".select-filter",function(e){
			e.preventDefault();
			var opt = $(this).val();
			var name_sel_att = $(this).attr("name");
			var url = $("input#baseurl_input").val();
			var params = '';

			var n=1; $(".select-filter").each(function(){
				var nameAtt = $(this).attr("name");
				var delimiter = (n==1) ? '?':'&';
				var val = $(this).find("option:selected").val();
				params += delimiter + nameAtt +"="+val;
				n++;
			});

			var base_url = url + params;
			$("#loaderDiv").addClass("show");
			
			$("#load-post-div").load(base_url+" #load-data-div",function(){
				$('.select-single').select2();
				setTimeout(function(){
					$("#loaderDiv").removeClass("show");
				},600);
			});

		});
	}

	/* Align Bottom Page Vertically Center */
	if( $(".explore-other-stuff").length>0 ) {
		var totalEntries = $(".explore-other-stuff .entry").length;
		$(".explore-other-stuff .post-type-entries").addClass('column-list-'+totalEntries);
	}

	/* Ajax Load More */
	$('a[href*="#"]:not([href="#"])').click(function() {
	    var headHeight = $("#masthead").height();
		var offset = headHeight + 80;

	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	        var target = $(this.hash);
	        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	        if (target.length) {
	          $('html, body').animate({
	              scrollTop: target.offset().top - offset
	          }, 1000);
	          return false;
	        }
	    }
		});

	if( typeof params.pid!='undefined' && params.pid!=null ) {
		if( $(".faqpid-"+params.pid).length>0 ) {
			view_faqs_info(params.pid);
		}
	}

	$(document).on("click",".faqGroup",function(e){
		e.preventDefault();
		$(".faqGroup").removeClass('active');
		var postid = $(this).attr("data-id");
		$(this).addClass('active');
		view_faqs_info(postid);
	});

	function view_faqs_info(postid) {
		var headHeight = $("#masthead").height();
		var offset = headHeight + 80
		var target = $("#faqItems");
		target.show();

		$('html, body').animate({
		scrollTop: target.offset().top - offset
		}, 1000);
		$.ajax({
			url : frontajax.ajaxurl,
			type : 'post',
			dataType : "json",
			data : {
				action 	: 'get_faq_group',
				post_id : postid
			},
			beforeSend:function(){
				$("#loaderDiv").appendTo(".main-faq-items");
				$("#loaderDiv").show();
			},
			success:function( obj ) {
				if(obj.result) {
					$("#faqsContainer").html(obj.result);
					setTimeout(function(){
						$("#loaderDiv").hide();
					},500);
					var newURL = currentURL + '?pid=' + postid;
					history.replaceState('',document.title,newURL);
				}
			},
			error:function() {
				$("#loaderDiv").hide();
			}
		});
	}

	/* More FAQs */
	$(document).on("click",".morefaqsBtn",function(e){
		e.preventDefault();
		var morefaqs = $(".morefaqs");
		morefaqs.hide();
		$(".faq-item").each(function(){
			if( $(this).hasClass('hide-faq') ) {
				$(this).removeClass('hide-faq').addClass("animated fadeIn");
			}
		});
	});

	/* Load More Entries:
		 - Race Series 
	*/

	$(document).on("click","#loadMoreEntries",function(e){
		e.preventDefault();
		var d = new Date();
		var current = $(this).attr('data-current');
		var next = parseInt(current) + 1;
		var totalPages = $(this).attr('data-total-pages');
		$(this).attr('data-current',next);
		if( $("#pagination a.page-numbers").length>0 ) {
			var baseURL = $("#pagination a.page-numbers").eq(0).attr("href");
			var parts = baseURL.split("pg=");
			var newURL = parts[0] + 'pg=' + next;
			var nxt = next+1;
			$("#loaderDiv").show();
			$(".next-posts").load(newURL+" .result",function(){
				var content = $(".next-posts").html();
				$('.next-posts .postbox').addClass("animated fadeIn").appendTo("#data-container .result");
				setTimeout(function(){
					$("#loaderDiv").hide();
				},500);
			});

			if(next==totalPages) {
				$(".loadmorediv").hide();
			}
		}
		
	});

	$(document).on("click",".select2-selection--multiple",function (e) { 
		var selectdiv = $(".customselectdiv").innerWidth();
		var w = selectdiv+2;
		$(".select2-container--default").css("width",w+"px");
	});

	/* Smooth Scrolling */
	$('a[href*="#"]')
	  // Remove links that don't actually link to anything
	  .not('[href="#"]')
	  .not('[href="#0"]')
	  .click(function(event) {
	    // On-page links
	    if (
	      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
	      && 
	      location.hostname == this.hostname
	    ) {
	      // Figure out element to scroll to
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	      // Does a scroll target exist?
	      if (target.length) {
	        // Only prevent default if animation is actually gonna happen
	        event.preventDefault();
	        $('html, body').animate({
	          scrollTop: target.offset().top
	        }, 500, function() {
	          // Callback after animation
	          // Must change focus!
	          var $target = $(target);
	          //$target.focus();
	          if ($target.is(":focus")) { // Checking if the target was focused
	            return false;
	          } else {
	            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
	            //$target.focus(); // Set focus again
	          };
	        });
	      }
	    }
  });

  //Homepage Calendar Tabs
  $(document).on("click",".tabs-calendar-wrapper .tab-item",function (e) { 
    var tab = $(this);
    var tabPanel = $(this).attr('aria-controls');
    var currentPanel = '.tab-calendar-panel#' + tabPanel;
    $('.tabs-calendar-wrapper .tab-item').not(tab).removeClass('active');
    tab.toggleClass('active');
    if( $(this).attr('aria-selected')=='true' ) {
      $(this).attr('aria-selected','false');
    } else {
      $(this).attr('aria-selected','true');
    }
    if( $(currentPanel).length ) {
      $(currentPanel).addClass('active');
      $('.tab-calendar-panel').not(currentPanel).removeClass('active');
    }
    if( $('.custom-dropdown').length ) {
      var baseUrl = $('.custom-dropdown').attr('data-baseUrl');
      history.replaceState('','',baseUrl);
    }
  });


  //Created: 08.24.2024 [lisa]
  if( $('.custom-dropdown').length ) {
    $('.select-event-type').on('click', function(e){
      e.preventDefault();
      $(this).toggleClass('open');
      $(this).parents('.custom-dropdown').find('.dropdownlist').slideToggle();
      $(this).parents('.custom-dropdown').addClass('open');
    });
    $(document).on('click','.select-posttype', function(e){
      e.preventDefault();
      var d = new Date();
      var parent = $(this).parents('.custom-dropdown');
      var opt = $(this).text();
      var type = $(this).attr('data-val');
      var baseUrl = parent.attr('data-baseUrl');
      parent.find('.select-event-type span').text(opt);
      parent.attr('data-selected', type);
      parent.find('.dropdownlist li.default').removeClass('hidden');
      parent.find('.dropdownlist').slideUp();
      parent.removeClass('open');
      var newUrl = baseUrl + '?type=' + type;
      window.location.href = newUrl;
      
      //history.replaceState('','', newUrl);
      // $('#eventsGrid').load(newUrl+'&d='+d.getTime()+ ' .calendar-tab-events-posts',function(){
      // });
    });
  }

  if( typeof params.type!=undefined || params.type!=null ) {
    if( $('#eventsGrid').length ) {
      var target = $('#eventsGrid');
      setTimeout(function(){
        scrollToSection(target,100);
      },200);
    } 
  }

  function scrollToSection(target,offsetVal) {
    var adjustment = (offsetVal) ? offsetVal : 0;
    $('html, body').animate({
      scrollTop: target.offset().top - adjustment
    }, 1000, function() {
      target.focus();
      if (target.is(":focus")) { 
        return false;
      } else {
        target.attr('tabindex','-1'); 
        target.focus(); 
      };
    });
  }

  $(document).on('click', function(e){
    var target = $(e.target);
    
    if( target.hasClass('select-event-type') || target.parents('.select-event-type').length || target.parents('.dropdown-inner').length ) {
      //Do nothing...
    } else {
      if( $('.custom-dropdown.open').length ) {
        $('.select-event-type').trigger('click');
      }
    }
  });


  if( $('.teasers .child-card').length ) {
    var j=1;
    $('.teasers .child-card').each(function(){
      if( j % 2 == 0 ) {
        $(this).addClass('even');
      } else {
        $(this).addClass('odd');
      }
      j++;
    });
  }

  if( $('.single-activity-options .option').length ) {
    var activitiesCount = $('.single-activity-options .option').length;
    var countOptions = activitiesCount / 2;
        countOptions = Math.round(countOptions);
        $('.single-activity-options .option').each(function(k){
          if(k<countOptions) {
            $(this).appendTo('.single-activity-options .firstCol');
          } else {
            $(this).appendTo('.single-activity-options .secondCol');
          }
        });
  }

  //Today's Snapshot (Hours > Activity Schedule) pop-up
  $(document).on('click', '.popupSchedule', function(e){
    e.preventDefault();
    $('#customModalContainer').addClass('open');
  });

  $(document).on('click', '#customModalClose', function(e){
    e.preventDefault();
    $('#customModalContainer').removeClass('open');
  });

  if( $('.activity-schedule-modal').length && $('#customModalContainer').length ) {
    if( $('#customModalContent .activity-schedule-modal').length==0 ) {
      $('.activity-schedule-modal').appendTo('#customModalContent');
    }
  }

  //Popup Film Series
  $(document).on('click', '.button-popup-details', function(){
    var postid = $(this).attr('data-postid');
    $('body').addClass('modal-open');
    $.ajax({
      url : frontajax.ajaxurl,
      type : 'post',
      dataType : "json",
      data : {
        action  : 'film_series_details_popup',
        post_id : postid
      },
      beforeSend:function(){
        $("#loaderDiv").show();
      },
      success:function( obj ) {
        $("#loaderDiv").hide();
        if(obj.result) {
          $('#customModalContainer #customModalContent').html(obj.result);
          $('#customModalContainer').addClass('filmSeriesInfo show');
        }
      },
      error:function() {
        $("#loaderDiv").hide();
      }
    });
  });

  $(document).on('click', '.filmSeriesInfo #customModalClose', function(e){
    e.preventDefault();
    $('body').removeClass('modal-open');
    $('#customModalContainer').removeClass("filmSeriesInfo show");
    setTimeout(function(){
      $('#customModalContent').html("");
    },80);
  });


  if( $('.locationPanels').length ) {
    $(document).on('click', '.locationTabsWrapper .tab button', function(e){
      e.preventDefault();
      var tabId = $(this).attr('id');
      var tabSelected = $('.info-panel.' + tabId);
      tabSelected.addClass('active');
      $('.locationPanels .info-panel').not( tabSelected ).removeClass('active');
    });

    $(document).on('click', '.mobileTabHandle', function(e){
      e.preventDefault();
      var tabId = $(this).attr('aria-controls');
      var tabSelected = $('#' + tabId);
      //$(this).toggleClass('active');
      //$('.locationTabsWrapper .mobileTabHandle').not(this).removeClass('active');
      //tabSelected.slideToggle();
      if( $(this).attr('aria-expanded')=='false' ) {
        $(this).attr('aria-expanded','true');
      } else {
        $(this).attr('aria-expanded','false');
      }

      $('.locationPanels .info-panel').each(function(){
        if( $(this).attr('id')==tabId ) {
          $(this).slideToggle();
        } else {
          $(this).slideUp();
        }
      });
    });
  }


  $(document).on('click', '.accordion-handle', function(e){
    e.preventDefault();
    var target = $(this);
    var parent = $(this).parent();
    if( $(this).attr('aria-expanded')=='false' ) {
      $(this).attr('aria-expanded', 'true');
    } else {
      $(this).attr('aria-expanded', 'false');
    }
    $(this).toggleClass('active');
    $(this).next().slideToggle();
    //$('.accordion .accordion-item').not(parent).removeClass('active');
    $('.accordion .accordion-item').not(parent).each(function(){
      $(this).removeClass('active');
      $(this).find('.accordion-handle').removeClass('active');
      $(this).find('.accordion-details').slideUp();
    });
    parent.toggleClass('active');
  });

	// Mindy
	// Show icon to scroll up
	if( $('.vendors-page').length ){
		$(window).scroll( function(){
			var top = $('.scroll-top');
			/* Check the location of each desired element */
			var initial_position = $('.vendors-anchor').offset().top + $(window).height() + 300;
			var hide_icon = initial_position - 200;
			var bottom_of_window = $(window).scrollTop() + $(window).height();

			/* If the object is completely visible in the window, fade it in */
			if( bottom_of_window > initial_position ){
				top.stop(true, true).animate({'opacity':'1'},100);
			}

			/* Hide Icon */
			if( bottom_of_window < hide_icon ){
				top.stop(true, true).animate({'opacity':'0'},100);
			}
		});

		if($('.vendors-anchor').length && window.location.hash.length) {
			var target = window.location.hash.replace('#', '');
			$('input[data-target="'+ target +'"]').prop('checked', true);
			apply_filter(target);
		}

		// Vendors Category
		$('.category-filter').on('change', function(){
			var target = $(this).data('target');

			apply_filter(target);
		});

		function apply_filter(target) {
			if(target == "all"){
				$('.vendors-item').show();
				$('.vendors-lists').show();
			} else {
				$('.vendors-item').hide();
				$('.vendors-item.'+ target).show();
				$('.vendors-item.'+ target).parent().parent().show();
			}

			$('.vendors-lists').each(function(){
				if( $(this).find('.vendors-item:visible').length  == 0){
					$(this).hide();
				} else {
					$(this).show();
				}
			});
		}

	}

	// Launch fancyBox on first element
	window.onload = function(){
		setTimeout(function(){
			$(".btn-popup").trigger('click')
		}, 500);
	 };

});// END #####################################    END