<?php

//Autore: Alex Vezzelli - Alex Soluzioni Web
//url: http://www.alexsoluzioniweb.it/


/**
 *Template Name: Page Info
 */

$path_img = esc_url( get_template_directory_uri() ).'/images/';
$pageID = get_the_ID();

$post = get_post($pageID);

get_header(); ?>

 
<div class="fill nopadding">       
    <div clasS="col-xs-12 nopadding">
      
        
        <div id="inside" class="info"> 
            <div class="background-logo"></div>
            <div class="row">
                
                <div class="col-xs-12">
                    <h2 class="red-2"><?php the_title() ?></h2>
                    <p>
                        <?php echo $post->post_content ?>
                    </p>
            </div>
            
        </div>
    
   
    
    </div>
</div>


    
<?php get_footer(); ?>
