$('.main-slider-carousel').owlCarousel({
  animateOut: 'fadeOut',
  animateIn: 'fadeIn',
  loop: true,
  margin: 0,
  nav: false,
  autoplay: false,
  autoplayTimeout: 9000,
  //autoHeight: true,
  smartSpeed: 500,
  //autoplay: 6000,
  navText: ['<span class="flaticon-left-arrow"></span>', '<span class="flaticon-right-arrow"></span>'],
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 1
    },
    800: {
      items: 1
    },
    1024: {
      items: 1
    },
    1200: {
      items: 1
    }
  }
});


$('#industries-serve').owlCarousel({
  loop: true,
  margin: 10,
  /*stagePadding: 20,*/
  dots: true,
  navigation: false,
  autoplay: true,
  autoplaySpeed: 1000,
  /*slideTransition: 'linear',
  autoplayTimeout: 6000,
  autoplaySpeed: 6000,*/
  autoplayHoverPause: true,
  navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
  responsiveClass: true,
  responsive: {
    0: {
      items: 1
    },
    500: {
      items: 1
    },
    768: {
      items: 1
    },
    1000: {
      items: 3
    }
  }
});
$('#client').owlCarousel({
  loop: true,
  margin: 80,
  /*stagePadding: 20,*/
  dots: false,
  navigation: false,
  autoplay: true,
  autoplaySpeed: 5000,
  autoplayTimeout: 3000,
  /*slideTransition: 'linear',
  autoplayTimeout: 6000,
  autoplaySpeed: 6000,*/
  autoplayHoverPause: true,
  navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
  responsiveClass: true,
  responsive: {
    0: {
      items: 2
    },
    500: {
      items: 2
    },
    768: {
      items: 3
    },
    1000: {
      items: 5
    }
  }
});
$('#sustainability').owlCarousel({
  loop: true,
  margin: 80,
  /*stagePadding: 20,*/
  dots: false,
  navigation: false,
  autoplay: true,
  autoplaySpeed: 5000,
  autoplayTimeout: 3000,
  /*slideTransition: 'linear',
  autoplayTimeout: 6000,
  autoplaySpeed: 6000,*/
  autoplayHoverPause: true,
  navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
  responsiveClass: true,
  responsive: {
    0: {
      items: 1
    },
    500: {
      items: 1
    },
    768: {
      items: 1
    },
    1000: {
      items: 1
    }
  }
});
$('#testimonials').owlCarousel({
  loop: true,
  margin: 10,
  /*stagePadding: 20,*/
  dots: true,
  navigation: false,
  autoplay: true,
  autoplaySpeed: 1000,
  /*slideTransition: 'linear',
  autoplayTimeout: 6000,
  autoplaySpeed: 6000,*/
  autoplayHoverPause: true,
  navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
  responsiveClass: true,
  responsive: {
    0: {
      items: 1
    },
    500: {
      items: 1
    },
    768: {
      items: 1
    },
    1000: {
      items: 1
    }
  }
});

$('#contact_img').owlCarousel({
  loop: true,
  margin: 10,
  /*stagePadding: 20,*/
  dots: true,
  navigation: false,
  autoplay: true,
  autoplaySpeed: 1000,
  /*slideTransition: 'linear',
  autoplayTimeout: 6000,
  autoplaySpeed: 6000,*/
  autoplayHoverPause: true,
  navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
  responsiveClass: true,
  responsive: {
    0: {
      items: 1
    },
    500: {
      items: 1
    },
    768: {
      items: 1
    },
    1000: {
      items: 1
    }
  }
});
/*-----------------------------------
   Back to Top
   -----------------------------------*/
var btn = $('#button');

$(window).scroll(function () {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function (e) {
  e.preventDefault();
  $('html, body').animate({
    scrollTop: 0
  }, '300');
});


$(document).ready(function () {
  let scroll_link = $('.scroll');

  //smooth scrolling -----------------------
  scroll_link.click(function (e) {
    e.preventDefault();
    let url = $('body').find($(this).attr('href')).offset().top - 160;
    $('html, body').animate({
      scrollTop: url
    }, 700);
    $(this).parent().addClass('active');
    $(this).parent().siblings().removeClass('active');
    return false;
  });
});

//wow js
var wow = new WOW({
  animateClass: 'animated',
  offset: 100,
  mobile: false,
  duration: 1000,
});
wow.init();

//scorl animation js
var $single_portfolio_img = $('.overlay_effect');
var $window = $(window);

function scroll_addclass() {
  var window_height = $(window).height() - 200;
  var window_top_position = $window.scrollTop();
  var window_bottom_position = (window_top_position + window_height);

  $.each($single_portfolio_img, function () {
    var $element = $(this);
    var element_height = $element.outerHeight();
    var element_top_position = $element.offset().top;
    var element_bottom_position = (element_top_position + element_height);

    //check to see if this current container is within viewport
    if ((element_bottom_position >= window_top_position) &&
      (element_top_position <= window_bottom_position)) {
      $element.addClass('is_show');
    }
  });
}

$window.on('scroll resize', scroll_addclass);
$window.trigger('scroll');


$(window).on('load', function () {
  setTimeout(function () { // allowing 3 secs to fade out loader
    $('.page-loader').fadeOut('slow');
  }, 500);
});

// accordion
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}

// sticky
$(window).on('scroll', function () {
  var scroll = $(window).scrollTop();
  if (scroll < 200) {
    $("#header-sticky").removeClass("sticky-menu");
  } else {
    $("#header-sticky").addClass("sticky-menu");
  }
});

AOS.init({
  duration: 1000,
  once: true,
  disable: 'mobile'
});

/*Counter*/
// number count for stats, using jQuery animate

function visible(partial) {
    var $t = partial,
        $w = jQuery(window),
        viewTop = $w.scrollTop(),
        viewBottom = viewTop + $w.height(),
        _top = $t.offset().top,
        _bottom = _top + $t.height(),
        compareTop = partial === true ? _bottom : _top,
        compareBottom = partial === true ? _top : _bottom;

    return ((compareBottom <= viewBottom) && (compareTop >= viewTop) && $t.is(':visible'));

}

$(window).scroll(function(){

  if(visible($('.count-digit')))
    {
      if($('.count-digit').hasClass('counter-loaded')) return;
      $('.count-digit').addClass('counter-loaded');
      
$('.count-digit').each(function () {
  var $this = $(this);
  jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
    duration: 2000,
    easing: 'swing',
    step: function () {
      $this.text(Math.ceil(this.Counter));
    }
  });
});
    }
})

    

/*Dropdown*/
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

/*Search popup*/

$(document).ready(function () {
  $('a[href="#search"]').on('click', function (event) {
    $('#search').addClass('open');
    $('#search > form > input[type="search"]').focus();
  });
  $('#search, #search button.close').on('click keyup', function (event) {
    if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
      $(this).removeClass('open');
    }
  });
});

/*Language Translator*/
/*function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
    includedLanguages: "hi,mr,gu,ta,ml,ar",
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
  }, 'google_translate_element');
}

$(document).ready(function () {
  $('#google_translate_element').bind('DOMNodeInserted', function (event) {
    $('.goog-te-menu-value span:first').html('LANGUAGE');
    $('.goog-te-menu-frame.skiptranslate').load(function () {
      setTimeout(function () {
        $('.goog-te-menu-frame.skiptranslate').contents().find('.goog-te-menu2-item-selected .text').html('LANGUAGE');
      }, 100);
    });
  });
});*/
var flags = document.getElementsByClassName('flag_link'); 
  
Array.prototype.forEach.call(flags, function(e){
  e.addEventListener('click', function(){
    var lang = e.getAttribute('data-lang'); 
    var languageSelect = document.querySelector("select.goog-te-combo");
    languageSelect.value = lang; 
    languageSelect.dispatchEvent(new Event("change"));
  }); 
});

/*table value change*/
$(document).ready(function(){

  //hides dropdown content
  $(".size_chart").hide();
  
  //unhides first option content
  $("#all").show();
  
  //listen to dropdown for change
  $("#size_select").change(function(){
    //rehide content on change
    $('.size_chart').hide();
    //unhides current item
    $('#'+$(this).val()).show();
  });
  
});

/*let icon = document.querySelector('ion-icon');
icon.onclick = function(){
  icon.classList.toggle('active');
}*/
//faq toggle stuff 
/*$('.togglefaq').click(function(e) {
e.preventDefault();
var notthis = $('.active').not(this);
notthis.find('.fa-arrow-circle-up').addClass('fa-arrow-circle-down').removeClass('fa-arrow-circle-up');
notthis.toggleClass('active').next('.faqanswer').slideToggle(300);
 $(this).toggleClass('active').next().slideToggle("fast");
$(this).children('i').toggleClass('fa-arrow-circle-up fa-arrow-circle-down');
});
*/
  //this is the button
  var acc = document.getElementsByClassName("course-accordion");
  var i;

  for (i = 0; i < acc.length; i++) {
    //when one of the buttons are clicked run this function
    acc[i].onclick = function() {
    //variables
    var panel = this.nextElementSibling;
    var coursePanel = document.getElementsByClassName("course-panel");
    var courseAccordion = document.getElementsByClassName("course-accordion");
    var courseAccordionActive = document.getElementsByClassName("course-accordion active");

    /*if pannel is already open - minimize*/
    if (panel.style.maxHeight){
      //minifies current pannel if already open
      panel.style.maxHeight = null;
      //removes the 'active' class as toggle didnt work on browsers minus chrome
      this.classList.remove("active");
    } else { //pannel isnt open...
      //goes through the buttons and removes the 'active' css (+ and -)
      for (var ii = 0; ii < courseAccordionActive.length; ii++) {
        courseAccordionActive[ii].classList.remove("active");
      }
      //Goes through and removes 'activ' from the css, also minifies any 'panels' that might be open
      for (var iii = 0; iii < coursePanel.length; iii++) {
        this.classList.remove("active");
        coursePanel[iii].style.maxHeight = null;
      }
      //opens the specified pannel
      panel.style.maxHeight = panel.scrollHeight + "px";
      //adds the 'active' addition to the css.
      this.classList.add("active");
    } 
    }//closing to the acc onclick function
  }//closing to the for loop.


function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();