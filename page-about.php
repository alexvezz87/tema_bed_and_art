<?php

//Autore: Alex Vezzelli - Alex Soluzioni Web
//url: http://www.alexsoluzioniweb.it/


/**
 *Template Name: Page About
 */

$path_img = esc_url( get_template_directory_uri() ).'/images/';

get_header(); ?>

 
<div class="fill nopadding">       
    <div clasS="col-xs-12 nopadding">
       
    
    <?php
    
        //Ottengo tutti i custom post type di Galleria About
        $args = array(
            'post_type' => 'baa_gallerie',
            'tax_query' => array(
		array(
			'taxonomy' => 'galleria_type',
			'field' => 'slug',
			'terms' => 'about'
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
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
            </div>         
        <a href="#project-inside" class="discover-more">Discover</a>



 <?php
    
        //Ottengo i valori relativi ai campi di descrizione
        $args = array(
            'post_type' => 'baa_abouts',
            'tax_query' => array(
		array(
			'taxonomy' => 'about_type',
			'field' => 'slug',
			'terms' => 'campi-about'
		)
            )        
        );
        $fields = get_posts($args);         
        
        $about_fields = array();
        
        foreach($fields as $field){
            $about_fields['title'] = $field->post_title;
            
            if(get_post_meta($field->ID, 'about', true != '')){
                $about_fields['about'] = get_post_meta($field->ID, 'about', true);
            }
            
            if(get_post_meta($field->ID, 'where', true != '')){
                $about_fields['where'] = get_post_meta($field->ID, 'where', true);
            }
        }
        
        
        //Ottengo i valori relativi alle persone
        $args = array(
            'post_type' => 'baa_abouts',
            'tax_query' => array(
		array(
			'taxonomy' => 'about_type',
			'field' => 'slug',
			'terms' => 'persone'
		)
            )        
        );
        
        $temps = get_posts($args);
        $persone = array();      
        foreach($temps as $temp){
            $persona = array();
            $persona['nome'] = $temp->post_title;
            $persona['ruolo'] = get_post_meta($temp->ID, 'ruolo', true);
            $persona['image'] = wp_get_attachment_url( get_post_thumbnail_id($temp->ID));                      
            array_push($persone, $persona);
        }
        
    ?>
        <div id="inside" class="about">        
            <div class="background-logo"></div>
            <div class="row">
                
                <div class="col-xs-12 col-md-6 col-md-push-6 col-dx">
                    <h2 class="red-1 title-page"><?php echo $about_fields['title'] ?></h2>
                </div>     
                
                <div class="col-xs-12 col-md-6 col-md-pull-6">
                    <h2 class="red-1">About</h2>
                    <p><?php echo $about_fields['about'] ?></p>                    
                </div>
                           
            </div>
            
            <ul class="persone nopadding">
            <?php foreach($persone as $persona){ ?>
                <li class="persona col-md-3 col-xs-6 nopadding">
                    <div class="cover-image-persona">
                        <p>
                            <?php echo $persona['nome'] ?><br><?php echo $persona['ruolo'] ?>
                        </p>
                    </div>
                    <img src="<?php echo $persona['image'] ?>"  alt="<?php echo $persona['nome'] ?>" style="width:100%" />
                    
                </li>                
            <?php } ?>
            </ul>
            
            
            <div class="half-row">
                <div class="col-xs-12 ">
                    <h2 class="red-2">Where</h2>
                    <p><?php echo $about_fields['where'] ?></p>
                </div>                
            </div>
            <div class="half-row black-container">                
                <div class="col-xs-12 contact col-dx">
                    <h2>Contact</h2>
                    <div class="form-container">
                        <?php echo do_shortcode('[contact-form-7 id="108" title="form-mail"]') ?>
                    </div>
                </div>                
            </div>            
            
            <div class="col-xs-12 last-image nopadding clear">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2799.664323627583!2d12.335698100000005!3d45.43626759999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477eb1da159153df%3A0x4a162b15fe2576a6!2sS.+Marco%2C+4700%2C+30100+Venezia!5e0!3m2!1sit!2sit!4v1443020408032" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>           
            </div>
        </div>
    
    </div>
</div>


    
<?php get_footer(); ?>
