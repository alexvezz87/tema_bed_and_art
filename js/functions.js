$( document ).ready(function() {
   
   //MENU
   //ottengo l'altezza delle voci del menu in modo dinamico
    resizeItemMenu();    
    $(window).resize(resizeItemMenu);   
    
    $('#hamburger-menu').click(function(){
        $('#menu-comparsa').slideToggle();
        $(this).toggleClass('opened');
    })
   //END MENU
   
});


function resizeItemMenu(){
   var numVoci = $('#menu-comparsa li').size();
   var rows = Math.ceil(numVoci/2);
   var height = $(window).height() - 100;
   $('#menu-comparsa li').css('height', (height/rows)+'px');
}
