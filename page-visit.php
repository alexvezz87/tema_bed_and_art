<?php

//Autore: Alex Vezzelli - Alex Soluzioni Web
//url: http://www.alexsoluzioniweb.it/


/**
 *Template Name: Page Visit
 */

$path_img = esc_url( get_template_directory_uri() ).'/images/';

get_header(); ?>

 
<div class="fill nopadding">       
    <div clasS="col-xs-12 nopadding">
       
    
    <?php
    
        //Ottengo tutti i custom post type di Galleria Project
        $args = array(
            'post_type' => 'baa_gallerie',
            'posts_per_page' => -1,
            'tax_query' => array(
		array(
			'taxonomy' => 'galleria_type',
			'field' => 'slug',
			'terms' => 'visit'
		)
            )
        );
        $fields = get_posts($args);
        
        
    ?>
        <!-- Slider main container -->
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->  
    <?php
        foreach($fields as $field){            
            printElement($field);
        }
    
    ?>   
                  
                </div>                
                <!-- If we need navigation buttons -->
            <?php if(count($fields) > 1){ ?>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            <?php } ?>
               
            </div>         
        <a href="#project-inside" class="discover-more">Discover</a>



 <?php
    
//        //Ottengo tutti i custom post type di project
//        $args = array(
//            'post_type' => 'baa_projects',
//            'posts_per_page' => -1,
//            'tax_query' => array(
//		array(
//			'taxonomy' => 'project_type',
//			'field' => 'slug',
//			'terms' => 'campi-progetto'
//		)
//            )        
//        );
//        $posts = get_posts($args);  
//        
//        $post_project = array();
//        
//        foreach ($posts as $post){
//            
//            if(get_post_meta($post->ID, 'place', true != '')){
//             $post_project['place'] = get_post_meta($post->ID, 'place', true != '');
//            }
//            
//           if(get_post_meta($post->ID, 'project', true) != ''){
//               $post_project['project'] = get_post_meta($post->ID, 'project', true);
//            }
//            
//            if(get_post_meta($post->ID, 'residence', true) != ''){
//                $post_project['residence'] = get_post_meta($post->ID, 'residence', true);
//            }
//            
//            if(get_post_meta($post->ID, 'tourism', true) != ''){
//                $post_project['tourism'] = get_post_meta($post->ID, 'tourism', true);
//            }            
//            
//        }
//        
//        //prendo il titolo
//        if ( have_posts() ) : 
//             while ( have_posts() ) : the_post();
//                $post_project['title-page'] = get_the_title();
//            endwhile;        
//        endif;
 
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
         
         //ottengo gli artisti
         $pages = get_posts(array(
                'post_type' => 'page',
                'meta_key' => '_wp_page_template',
                'meta_value' => 'page-artist.php'
        ));
         
        $artists = array();
        foreach($pages as $page){
            $artist = array();
            $artist['image'] = wp_get_attachment_url( get_post_thumbnail_id($page->ID));
            $artist['page'] = $page->guid;
            $artist['name'] = $page->post_title;
            $artist['ruolo'] = get_post_meta($page->ID, 'ruolo', true);
            
            array_push($artists, $artist);
        }
        
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
            
            <ul class="persone nopadding">
            <?php foreach($artists as $artist){ ?>
                <li class="persona col-md-3 col-xs-6 nopadding">
                    <a href="<?php echo $artist['page'] ?>">
                    <div class="cover-image-persona">
                        <p>
                            <?php echo $artist['name'] ?><br><?php echo $artist['ruolo'] ?>
                        </p>
                    </div>
                    </a>
                    <img src="<?php echo $artist['image'] ?>"  alt="<?php echo $artist['name'] ?>" style="width:100%" />
                    
                </li>                
            <?php } ?>
            </ul>
            
        </div>
    
    </div>
</div>


    
<?php get_footer(); ?>
