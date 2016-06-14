<?php

//Autore: Alex Vezzelli - Alex Soluzioni Web
//url: http://www.alexsoluzioniweb.it/


/**
 *Template Name: Page Support
 */

$path_img = esc_url( get_template_directory_uri() ).'/images/';
$path_mediakit = esc_url( get_template_directory_uri() ).'/mediakit/';
$pageID = get_the_ID();

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
        if(count($partners) > 0){
            $partners = sortArray($partners, 'ordine', SORT_ASC);
        }
        //ottengo il contenuto
        $support = get_post($pageID);
       
        $args = array(
            'post_type' => 'baa_supports',
            'posts_per_page' => -1,
            'tax_query' => array(
		array(
			'taxonomy' => 'support_type',
			'field' => 'slug',
			'terms' => 'collab-detail'
		)
            )        
        );
        $fields = get_posts($args); 
        $collabs = array();
        
        foreach($fields as $field){
            $collab = array();
            $collab['image'] = wp_get_attachment_url( get_post_thumbnail_id($field->ID));  
            $collab['url'] = get_post_meta($field->ID, 'url', true);   
           
            array_push($collabs, $collab);
        }
      
        
    ?>
        <div id="inside" class="support">             
                      
            <div class="row partners"> 
                <div class="half-row">
                    <div class="col-xs-12">
                        <h2 class="red-1">Become Partner</h2>
                    </div>
                </div>
                <div class="half-row"></div>
                <?php if(count($partners)>0) { ?>
                <ul class="clear">
                    <?php foreach($partners as $partner) { ?>
                    <li class="col-xs-12 col-sm-6 col-md-4">
                        <div style="background:url('<?php echo $partner['image'] ?>') no-repeat center center"></div>
                    </li>
                    <?php } ?>                    
                </ul>
                <?php } ?>
            </div>
        

            <div class="half-row" style="padding-top:0px">
                <div class="col-xs-12 " >
                    <h2 class="red-2"></h2>
                    <p style="font-size:25px; line-height: 27px;"><?php echo $support->post_content ?></p>
                    
                    <div class="area-download">
                        <a href="<?php echo $path_mediakit ?>mediakit.pdf" class="obj-download">
                            <span>Download Mediakit (PDF)</span>
                        </a>
                        <a href="<?php echo $path_mediakit ?>mediakit.epub" class="obj-download">
                            <span>Download Mediakit (EPUB)</span>
                        </a>
                        <div class="clear"></div>
                    </div>
                    
                </div>                
            </div>
            <div class="half-row black-container">                
                <div class="col-xs-12 contact col-dx">
                    <h2>Call for support the Bed & Art</h2>
                    <div class="form-container">
                        <?php echo do_shortcode('[contact-form-7 id="68" title="support-form"]') ?>
                    </div>
                </div>                
            </div>     
        </div>
        <div class="support clear">
            <div class="row partners title-collab clear"> 
                <div class="half-row">
                    <div class="col-xs-12">
                        <h2 class="red-1">Talking about us</h2>
                    </div>
                </div>
                <div class="half-row"></div>
             </div>
            <?php if(count($collabs)>0) { ?>
            <div class="clear partners">
                <ul class="clear">
                    <?php foreach($collabs as $collab) { ?>
                    <li class="col-xs-12 col-sm-6 col-md-4 collab">
                        <a target="_blank" href="<?php echo $collab['url'] ?>" style="background:url('<?php echo $collab['image'] ?>') no-repeat center center"></a>
                    </li>
                    <?php } ?>                    
                </ul>
                <?php } ?>
            </div>  
            
            <div class="col-xs-12 last-image nopadding clear">
               <img src="<?php echo $path_img ?>support_2.jpg" alt="Project" style="width:100%; height: auto;" />                
           </div>
            
        </div>
    
    </div>
</div>


    
<?php get_footer(); ?>
