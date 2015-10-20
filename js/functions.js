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
      initialSlide : 1,
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
    
    //faccio partire il video al click
    $('.video-player-interno').click(function(){
        $(this).find('.cover-video').show();
        $(this).find('.slide-description').hide();
        $(this).find('video').get(0).play();
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
    
    //BLOG
    //sistemo il div che sovrappone l'immagine sull'hover   
    resizeCoverLinkBlogPost();
    $(window).resize(function(){
        resizeCoverLinkBlogPost();
    });
    
    
});

function resizeCoverLinkBlogPost(){
    $('#inside.blog-list .blog-post').each(function(){
        var w = $(this).find('.image-post').width();
        var h = w * 1.5;
        $(this).find('.image-post').css('#height', h+'px');
        $(this).find('.image').css('width', w+'px');
        $(this).find('.image').css('height', h+'px');            
        $(this).find('.link').css('width', w+'px');
        $(this).find('.link').css('height', h+'px');
    });    
   
    $('#inside.blog-list .blog-post').hover(function(){
         $('#inside.blog-list .blog-post').each(function(){
            var w = $(this).find('.image-post').width();
            var h = w * 1.5;       
            $(this).find('.image').css('width', w+'px');
            $(this).find('.image').css('height', h+'px');            
            $(this).find('.link').css('width', w+'px');
            $(this).find('.link').css('height', h+'px');
        });
        $(this).find('.link').stop().fadeIn('slow');
        $(this).find('.link').css('display', 'table');
    },
    function(){
        $(this).find('.link').stop().fadeOut();
    });
}


function resizeSwiperContainer(){   
    var h = $(window).height() - $('header').height();
    $('.swiper-container').css('height', h+'px');
    $('.swiper-slide-image').css('height', h+'px');
    $('.swiper-slide.video-player-interno video').css('height', h+'px');
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
