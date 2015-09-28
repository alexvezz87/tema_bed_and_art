$( document ).ready(function() {
   
   //MENU
   //ottengo l'altezza delle voci del menu in modo dinamico
    resizeItemMenu();    
    $(window).resize(resizeItemMenu);   
    
    $('#hamburger-menu').click(function(){
        $('#menu-comparsa').stop().slideToggle();
        $(this).toggleClass('opened');
        $('body').toggleClass('show-menu');
        $('#main-container, footer').toggleClass('open-menu');
    });
   //END MENU
   
   //SWIPER
    resizeSwiperContainer();
    $(window).resize(resizeItemMenu);
    //initialize swiper when document ready  
    var mySwiper = new Swiper ('.swiper-container', {
      // Optional parameters
      direction: 'horizontal',
      loop: true,
      nextButton : '.swiper-button-next',
      prevButton : '.swiper-button-prev',
      keyboardControl : true     
    }) ;       
    
    $('.video-player').click(function(ev){        
        $('.discover-more').hide();
        $(this).find('.cover-video').hide();        
        $(this).find('.video-player').attr('src', $(this).find('.video-player').attr('src')+'?autoplay=1');
        ev.preventDefault();
    });
    
    $('.swiper-button-next, .swiper-button-prev').click(function(){
        $('.discover-more').show();
    });
    
    $('iframe').click(function(){
        $('.discover-more').hide();
    });
   
   
   //end SWIPER
   
   //scroll to
    $('.discover-more').click(function() {
        var aTag = $("#inside");
        $('html,body').animate({scrollTop: aTag.offset().top},'slow');
    });
    
    $('.arrow-up').click(function() {
        var aTag = $("#header-top");
        $('html,body').animate({scrollTop: aTag.offset().top},'slow');
    });
    
    //hover in about
    $('li.persona').hover(
        function(event){           
            $(this).find('.cover-image-persona').stop().slideDown(); 
        },
        function(event){            
            $(this).find('.cover-image-persona').stop().slideUp(); 
    });
    
    
    //booking
    $('.booking-link').click(function(){
        $('#booking-form').show();
    });
    $('#booking-form .close-form').click(function(){
        $('#booking-form').hide();
    });
    
    //newsletter
    $('.newsletter-link').click(function(){
        $('#newsletter-form').show();
    });
    $('#newsletter-form .close-form').click(function(){
        $('#newsletter-form').hide();
    });
    
    $('input[name="wysija[user][email]"]').attr('placeholder', 'Email *');
    
    
});


function resizeSwiperContainer(){   
    var h = $(window).height() - $('header').height();
    $('.swiper-container').css('height', h+'px');
    $('.swiper-slide-image').css('height', h+'px');
}

function resizeItemMenu(){
   var numVoci = $('#menu-comparsa li').size();
   var rows = 0;  
   
   if($(window).width() > 767){       
       rows = Math.ceil(numVoci/2);
   }
   else{
       rows = numVoci;
   }
   var height = $(window).height() - $('header').height(); 
   $('#menu-comparsa li').css('height', (height/rows)+'px');
}
