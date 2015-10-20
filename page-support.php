<?php

//Autore: Alex Vezzelli - Alex Soluzioni Web
//url: http://www.alexsoluzioniweb.it/


/**
 *Template Name: Page Support
 */

$path_img = esc_url( get_template_directory_uri() ).'/images/';

get_header(); ?>

 
<div class="fill nopadding">       
    <div class="col-xs-12 nopadding">
       
    
    <?php
    
        //Ottengo tutti i custom post type di Galleria About
        $args = array(
            'post_type' => 'baa_gallerie',
            'posts_per_page' => -1,
            'tax_query' => array(
		array(
			'taxonomy' => 'galleria_type',
			'field' => 'slug',
			'terms' => 'support'
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
             <?php if(count($posts) > 1){ ?>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            <?php } ?>

               
            </div>         
        <a href="#project-inside" class="discover-more">Discover</a>



 <?php
    
        //Ottengo i valori relativi ai campi di descrizione
        $args = array(
            'post_type' => 'baa_supports',
            'posts_per_page' => -1,
            'tax_query' => array(
		array(
			'taxonomy' => 'support_type',
			'field' => 'slug',
			'terms' => 'support-partner'
		)
            )        
        );
        $fields = get_posts($args); 
        
        $partners = array();
        foreach($fields as $field){
            $partner = array();
            $partner['image'] = wp_get_attachment_url( get_post_thumbnail_id($field->ID));  
            $partner['ordine'] = get_post_meta($field->ID, 'ordine', true);            
            
            array_push($partners, $partner);
        }
        
        //ordino l'array
        $partners = sortArray($partners, 'ordine', SORT_ASC);
                
        //ottengo il contenuto
        $support = "";
        if ( have_posts() ) :
            // Start the loop.
            while ( have_posts() ) : the_post();
                $support = get_the_content();
            // End the loop.
            endwhile;
         endif;
        
      
        
    ?>
        <div id="inside" class="support">             
            <?php 
    ?>
           
            <div class="row partners">                
                <h2 class="col-xs-12 red-1">Partners</h2>
                <?php if(count($partners)>0) { ?>
                <ul>
                    <?php foreach($partners as $partner) { ?>
                    <li class="col-xs-12 col-sm-6 col-md-4">
                        <div style="background:url('<?php echo $partner['image'] ?>') no-repeat center center"></div>
                    </li>
                    <?php } ?>                    
                </ul>
                <?php } ?>
            </div>
        

            <div class="half-row">
                <div class="col-xs-12 ">
                    <h2 class="red-2">Sponsor</h2>
                    <p><?php echo $support ?></p>
                </div>                
            </div>
            <div class="half-row black-container">                
                <div class="col-xs-12 contact col-dx">
                    <h2>Call for support the Bed&AMP;Art</h2>
                    <div class="form-container">
                        <?php echo do_shortcode('[contact-form-7 id="142" title="support-form"]') ?>
                    </div>
                </div>                
            </div>            
            
            <div class="col-xs-12 last-image nopadding">
               <img src="<?php echo $path_img ?>project-inside-02.jpg" alt="Project" style="width:100%; height: auto;" />                
           </div>
            
            
        </div>
    
    </div>
</div>


    
<?php get_footer(); ?>
