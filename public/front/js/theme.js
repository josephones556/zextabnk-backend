// js Document

   //  Created on   : 03/01/2018.
   //  Theme Name   : Aproach.
   //  Description  : Aproach - Banking & Business Loan HTML Template
   //  Version      : 1.0.
   //  Author       : @CreativeGigs.
   //  Developed by : Jubayer al hasan. (jubayer.hasan1991@gmail.com)


(function($) {
    "use strict";
    
    
    $(document).ready(function(){
        
        // -------------------- Navigation Scroll
        $(window).scroll(function() {    
          var sticky = $('.theme-menu-wrapper'),
          scroll = $(window).scrollTop();
          if (scroll >= 190) sticky.addClass('fixed');
          else sticky.removeClass('fixed');

        });


        // ------------------------------- WOW Animation 
        var wow = new WOW({
            boxClass:     'wow',      // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset:       80,          // distance to the element when triggering the animation (default is 0)
            mobile:       true,       // trigger animations on mobile devices (default is true)
            live:         true,       // act on asynchronously loaded content (default is true)
          });
          wow.init();


        
        // -------------------- Remove Placeholder When Focus Or Click
        $("input,textarea").each( function(){
            $(this).data('holder',$(this).attr('placeholder'));
            $(this).on('focusin', function() {
                $(this).attr('placeholder','');
            });
            $(this).on('focusout', function() {
                $(this).attr('placeholder',$(this).data('holder'));
            });     
        });
        
        // -------------------- From Bottom to Top Button
            //Check to see if the window is top if not then display button
        $(window).on('scroll', function (){
          if ($(this).scrollTop() > 200) {
            $('.scroll-top').fadeIn();
          } else {
            $('.scroll-top').fadeOut();
          }
        });
            //Click event to scroll to top
        $('.scroll-top').on('click', function() {
          $('html, body').animate({scrollTop : 0},1500);
          return false;
        });


        // ---------------------------- Greeting Message
        var thehours = new Date().getHours();
        var themessage;
        var morning = ('Good morning');
        var afternoon = ('Good afternoon');
        var evening = ('Good evening');

        if (thehours >= 0 && thehours < 12) {
          themessage = morning; 

        } else if (thehours >= 12 && thehours < 17) {
          themessage = afternoon;

        } else if (thehours >= 17 && thehours < 24) {
          themessage = evening;
        }
        $('.greeting').append(themessage);


        // --------------------------- Theme Main Banner Slider One
        var banner = $(".banner-one");
        if (banner.length) {
          banner.camera({ //here I declared some settings, the height and the presence of the thumbnails 
            height: '950px',
            pagination: false,
            navigation: true,
            thumbnails: false,
            playPause: false,
            pauseOnClick: false,
            autoPlay:true,
            hover: false,
            overlayer: true,
            loader: 'none',
            minHeight: '650px',
            time: 400000,
          });
        };

        
        // --------------------------- Theme Main Banner Slider Two
        var bannertwo = $(".banner-two");
        if (bannertwo.length) {
          bannertwo.camera({ //here I declared some settings, the height and the presence of the thumbnails 
            height: '900px',
            pagination: false,
            navigation: true,
            thumbnails: false,
            playPause: false,
            pauseOnClick: false,
            autoPlay:true,
            hover: false,
            overlayer: true,
            loader: 'none',
            minHeight: '650px',
            time: 400000,
          });
        };



        // --------------------------------- Search Box
        var search = $("#search-button"),
        mainSearch = $("#searchWrapper"),
        close = $("#close-button");
        if(search.length) {
          search.on('click', function(){
            mainSearch.addClass('show-box');
            $(".main-page-wrapper").addClass('blury-bg')
          });
          close.on('click', function() {
            mainSearch.removeClass('show-box');
            $(".main-page-wrapper").removeClass('blury-bg')
          });
        }


        // ----------------------------- Counter Function
        var timer = $('.timer');
        if(timer.length) {
            timer.appear(function () {
              timer.countTo();
          })
        }


        // ------------------------------- Testimonial Slider
        var tSlider = $ (".testimonial-slider");
        if(tSlider.length) {
            tSlider.owlCarousel({
              loop:true,
              nav:false,
              dots:true,
              autoplay:true,
              autoplayTimeout:4000,
              autoplaySpeed:1000,
              lazyLoad:true,
              items:1
          })
        }


        // ------------------------------- Testimonial Slider Two
        var tSlider = $ (".client-slider-two");
        if(tSlider.length) {
            tSlider.owlCarousel({
              loop:true,
              nav:false,
              dots:true,
              autoplay:true,
              autoplayTimeout:4000,
              autoplaySpeed:1000,
              lazyLoad:true,
              responsive:{
                    0:{
                        items:1
                    },
                    551:{
                        items:1
                    },
                    992:{
                        items:2
                    }
                },
          })
        }


        // -------------------------------  Related Project Slider
        var rpSlider = $ (".related-project-slider");
        if(rpSlider.length) {
            rpSlider.owlCarousel({
              loop:true,
              nav:true,
              navText: ["",""],
              dots:false,
              autoplay:true,
              autoplayTimeout:4000,
              smartSpeed:1000,
              navSpeed:1200,
              lazyLoad:true,
              responsive:{
                    0:{
                        items:1
                    },
                    551:{
                        items:2
                    },
                    992:{
                        items:3
                    }
                },
          })
        }


        // ------------------------------------- Loan Selection ranger
        if ($('.price-ranger').length) {
          $( '.price-ranger #slider-range' ).slider({
            range: true,
            min: 0,
            max: 35600,
            values: [ 10000, 25000 ],
            slide: function( event, ui ) {
              $( '.price-ranger .ranger-min-max-block .min' ).val( '$' + ui.values[ 0 ] );
              $( '.price-ranger .ranger-min-max-block .max' ).val( '$' + ui.values[ 1 ] );
            }
          });
            $( '.price-ranger .ranger-min-max-block .min' ).val( '$' + $( '.price-ranger #slider-range' ).slider( 'values', 0 ) );
          $( '.price-ranger .ranger-min-max-block .max' ).val( '$' + $( '.price-ranger #slider-range' ).slider( 'values', 1 ) );        
        };


        // ---------------------------- Select Picker
        $('.theme-selectpicker').select2();


        // ------------------------------ MixitUp 
         if ($("#mixitUp-item").length) {
            $("#mixitUp-item").mixItUp()
          };



          // --------------------------------- Contact Form Validation
          if($('.form-validation').length){
            $('.form-validation').validate({ // initialize the plugin
              rules: {
                name: {
                  required: true
                },
                email: {
                  required: true,
                  email: true
                },
                sub: {
                  required: true
                },
                message: {
                  required: true
                }
              },
            submitHandler: function(form) {
              $(form).ajaxSubmit({
                success: function() {
                  $('.form-validation :input').attr('disabled', 'disabled');
                  $('.form-validation').fadeTo( "slow", 1, function() {
                      $(this).find(':input').attr('disabled', 'disabled');
                      $(this).find('label').css('cursor','default');
                      $('#alert-success').fadeIn();
                    });
                  },
                  error: function() {
                    $('.form-validation').fadeTo( "slow", 1, function() {
                      $('#alert-error').fadeIn();
                    });
                  }
                });
              }
            });
          }


          // ---------------------------------- Validation Alert
          var closeButton = $ (".closeAlert");
            if(closeButton.length) {
                closeButton.on('click', function(){
                  $(".alert-wrapper").fadeOut();
                });
                closeButton.on('click', function(){
                  $(".alert-wrapper").fadeOut();
                })
            }


          // -------------------------------- Accordion Panel
          if ($('.theme-accordion > .panel').length) {
            $('.theme-accordion > .panel').on('show.bs.collapse', function (e) {
                  var heading = $(this).find('.panel-heading');
                  heading.addClass("active-panel");
                  
            });
            $('.theme-accordion > .panel').on('hidden.bs.collapse', function (e) {
                var heading = $(this).find('.panel-heading');
                  heading.removeClass("active-panel");
                  //setProgressBar(heading.get(0).id);
            });
            $('.panel-heading a').on('click',function(e){
                if($(this).parents('.panel').children('.panel-collapse').hasClass('in')){
                    e.stopPropagation();
                }
            });
          };
        

        
    });
    
    $(window).load(function() { // makes sure the whole site is loaded

        // -------------------- Site Preloader
        $('#loader').fadeOut(); // will first fade out the loading animation
        $('#loader-wrapper').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
        $('body').delay(350).css({'overflow':'visible'});
    })
    
})(jQuery)