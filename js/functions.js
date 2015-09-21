$( document ).ready(function() {
   
   //MENU
   //ottengo l'altezza delle voci del menu in modo dinamico
    resizeItemMenu();    
    $(window).resize(resizeItemMenu);   
    
    $('#hamburger-menu').click(function(){
        $('#menu-comparsa').slideToggle();
        $(this).toggleClass('opened');
        $('body').toggleClass('show-menu');
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
    })        
    
   
   //end SWIPER
});


function resizeSwiperContainer(){   
    var h = $(window).height() - $('header').height();
    $('.swiper-container').css('height', h+'px');    
}

function resizeItemMenu(){
   var numVoci = $('#menu-comparsa li').size();
   var rows = Math.ceil(numVoci/2);
   var height = $(window).height() - $('header').height();
   $('#menu-comparsa li').css('height', (height/rows)+'px');
}
