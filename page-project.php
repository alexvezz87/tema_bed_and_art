<?php

//Autore: Alex Vezzelli - Alex Soluzioni Web
//url: http://www.alexsoluzioniweb.it/


/**
 *Template Name: Page Project
 */

get_header(); ?>

<div id="main-container" class="row">   
    <div class="col-xs-12">
       
    
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
                $post_project['toursim'] = get_post_meta($post->ID, 'tourism', true);
            }            
            
        }
    ?>
        <pre style="width:50%">
            <?php print_r($post_project) ?>
        </pre>
       
    
</div>
</div>

    
<?php get_footer(); ?>
