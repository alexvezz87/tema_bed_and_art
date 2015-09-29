<?php

//Autore: Alex Vezzelli - Alex Soluzioni Web
//url: http://www.alexsoluzioniweb.it/


/**
 *Template Name: Page Artist
 */

$path_img = esc_url( get_template_directory_uri() ).'/images/';

get_header(); ?>

 
<div class="fill nopadding">       
    <div clasS="col-xs-12 nopadding">
       
    


 <?php    
 
        $gallery = array();
        $attachments = new Attachments( 'attachments', get_the_ID() );
        if($attachments->exist()){
            while($attachments->get()){                
                array_push($gallery, $attachments->src('full'));
            }
        }
        
        //ottengo il contenuto
        $content = "";
        if ( have_posts() ) :
            // Start the loop.
            while ( have_posts() ) : the_post();
                $content = get_the_content();
            // End the loop.
            endwhile;
         endif;
        
    ?>
        <div id="inside" class="visit">        
            <div class="background-logo"></div>
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <h2 class="red-1">B&AMP;A Gallery</h2>
                    <p><?php echo $content ?></p>                    
                </div>                
                           
            </div>
            <!-- Slider main container -->
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->  
    <?php
        for($i=0; $i < count($gallery); $i++){            
            printDirectElement($gallery[$i]);
        }
    
    ?>   
                  
                </div>                
                <!-- If we need navigation buttons -->
            <?php if(count($gallery) > 1){ ?>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            <?php } ?>
               
            </div>     
            
            <div class="half-row">
                <div class="col-xs-12 ">
                    <h2 class="red-2">Artist</h2>
                    <p><?php echo get_post_meta(get_the_ID(), 'artist', true); ?></p>
                </div>                
            </div>
            <div class="half-row black-container">                
                <div class="col-xs-12 contact col-dx">
                    <h2>Call for artist residence or present your portfolio </h2>
                    <div class="form-container">
                        <?php echo do_shortcode('[contact-form-7 id="142" title="support-form"]') ?>
                    </div>
                </div>                
            </div>  
            
        </div>
    
    </div>
</div>


    
<?php get_footer(); ?>
