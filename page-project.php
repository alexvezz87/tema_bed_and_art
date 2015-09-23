<?php

//Autore: Alex Vezzelli - Alex Soluzioni Web
//url: http://www.alexsoluzioniweb.it/


/**
 *Template Name: Page Project
 */

$path_img = esc_url( get_template_directory_uri() ).'/images/';

get_header(); ?>

 
<div class="fill nopadding">       
    <div clasS="col-xs-12 nopadding">
       
    
    <?php
    
        //Ottengo tutti i custom post type di Galleria Project
        $args = array(
            'post_type' => 'baa_gallerie',
            'tax_query' => array(
		array(
			'taxonomy' => 'galleria_type',
			'field' => 'slug',
			'terms' => 'project'
		)
                )
            );
        $projects = get_posts($args);
        
        
    ?>
        <!-- Slider main container -->
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->  
    <?php
        foreach($projects as $project){            
            printElement($project);
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
    
        //Ottengo tutti i custom post type di project
        $args = array('post_type' => 'baa_projects');
        $posts = get_posts($args);  
        
        $post_project = array();
        
        foreach ($posts as $post){
            
            if(get_post_meta($post->ID, 'place', true != '')){
             $post_project['place'] = get_post_meta($post->ID, 'place', true != '');
            }
            
           if(get_post_meta($post->ID, 'project', true) != ''){
               $post_project['project'] = get_post_meta($post->ID, 'project', true);
            }
            
            if(get_post_meta($post->ID, 'residence', true) != ''){
                $post_project['residence'] = get_post_meta($post->ID, 'residence', true);
            }
            
            if(get_post_meta($post->ID, 'tourism', true) != ''){
                $post_project['tourism'] = get_post_meta($post->ID, 'tourism', true);
            }            
            
        }
    ?>
        <div id="inside">        
            <div class="background-logo"></div>
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <h2 class="red-1">Project</h2>
                    <p><?php echo $post_project['project'] ?></p>                    
                </div>
                <div class="col-xs-12 col-md-6 col-dx">
                    <h2 class="red-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
                </div>                
            </div>
            
            <div class="col-xs-12 col-md-6 nopadding">
                    <img src="<?php echo $path_img ?>project-inside-01.jpg" alt="Project" style="width:100%; height: auto; max-width: 960px" />
            </div>
            <div class="row">
                
                <div class="col-xs-12 col-md-6 col-dx">
                    <h2 class="red-2">Place</h2>
                    <p><?php echo $post_project['place'] ?></p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <h2 class="red-2">Residence</h2>
                    <p><?php echo $post_project['residence'] ?></p>
                </div>
                <div class="col-xs-12 col-md-6 col-dx">
                    <h2 class="red-2">Tourism</h2>
                    <p><?php echo $post_project['tourism'] ?></p>
                </div>
            </div>
            
            <div class="col-xs-12 last-image nopadding">
                 <img src="<?php echo $path_img ?>project-inside-02.jpg" alt="Project" style="width:100%; height: auto;" />                
            </div>
        </div>
    
    </div>
</div>


    
<?php get_footer(); ?>
