<?php

//Autore: Alex Vezzelli - Alex Soluzioni Web
//url: http://www.alexsoluzioniweb.it/


/**
 *Template Name: Home Page
 */

get_header(); ?>


    <div class="fill nopadding">       
        <div clasS="col-xs-12 nopadding">
    <?php
        //Ottengo tutti i custom post type di Galleria
        $args = array(
            'post_type' => 'baa_gallerie',
            'tax_query' => array(
		array(
			'taxonomy' => 'galleria_type',
			'field' => 'slug',
			'terms' => 'home'
		)
                )
            );
        $posts = get_posts($args);
        
        ?>
        <!-- Slider main container -->
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->                   
                   
        <?php
        
        foreach($posts as $post){
            
            if( wp_get_attachment_url( get_post_thumbnail_id($post->ID))!= false){
                //è un'immagine
                echo '<div class="swiper-slide">';
                echo '<div class="swiper-slide-image" style="background:url(\''.wp_get_attachment_url( get_post_thumbnail_id($post->ID)).'\')" /></div>';
                echo '</div>';
            }
            else{
                //è un video               
                $embed_video = str_replace('watch?v=', 'embed/', get_post_meta($post->ID, 'video', true));  
                echo '<div class="swiper-slide">';
                echo '<iframe width="100%" height="100%" src="'.$embed_video.'" frameborder="0" allowfullscreen></iframe>';
                echo '</div>';
            }
            
            
        }
        
       
    ?>
        
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
            </div> 
        
        </div>
       
    
</div>   
<?php get_footer(); ?>
