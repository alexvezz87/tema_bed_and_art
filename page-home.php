<?php

//Autore: Alex Vezzelli - Alex Soluzioni Web
//url: http://www.alexsoluzioniweb.it/


/**
 *Template Name: Home Page
 */

get_header(); 

$path_img = esc_url( get_template_directory_uri() ).'/images/';
?>


    
<div style="overflow: hidden; width:100%">
<div id="video"></div>
</div>



    <script>

         $('#video').YTPlayer({

            fitToBackground: true,

            videoId: '8Q99ypFlqWU',            
            pauseOnScroll: false,
            pauseVideo: false,
            width: '100%',
            
            playerVars: {
                modestbranding: 0,
                autoplay: 1,
                controls: 0,
                showinfo: 0,
                wmode: 'transparent',
                rel: 0,
                autohide: 0                
              }
             
           

        });

    </script>

    

  <?php get_footer(); ?>




</body>

</html>
