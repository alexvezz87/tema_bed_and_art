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
        //Ottengo tutti i custom post type di Galleria Home
        $args = array(
            'post_type' => 'baa_gallerie',
            'posts_per_page' => -1,
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
            printElement($post);           
        } 
    ?>
        
                </div>               

                <!-- If we need navigation buttons -->
            <?php if(count($posts) > 1){ ?>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            <?php } ?>

            </div> 
        
        </div>
        
    
</div>  
<?php get_footer(); ?>
