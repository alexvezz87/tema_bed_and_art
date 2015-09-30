<?php

//Autore: Alex Vezzelli - Alex Soluzioni Web
//url: http://www.alexsoluzioniweb.it/


/**
 *Template Name: Page Artist
 */

$path_img = esc_url( get_template_directory_uri() ).'/images/';
$pageID = get_the_ID();

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
        
        $post = get_page($pageID);
        $content = getTextBetweenTags('p', apply_filters('the_content', $post->post_content));    
        
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
            $artist['url'] = get_post_meta($page->ID, 'url', true);
            $artist['ID'] = $page->ID;
            $artist['linkTo'] = "";
            //imposto il link del redirect
            if($pageID == $artist['ID']){
                $artist['linkTo'] = $artist['url'];
                $artist['ruolo'] = 'See Works';
            }
            else{
                $artist['linkTo'] = $artist['page'];
            }
            
            array_push($artists, $artist);
        }
        
    ?>
        <div id="inside" class="visit">
            <div class="background-logo"></div>
            <div class="row">               
                <h2 class="red-1 col-xs-12"><?php echo get_the_title($pageID) ?></h2>
                
                <?php if(count($content) > 0) { ?>
                    <?php for($i=0; $i < count($content); $i++){ ?>
                        <div class="col-xs-12 col-md-6">                    
                            <p><?php echo $content[$i] ?></p>                    
                        </div>
                    <?php } ?> 
                <?php } ?>
                           
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
                    <a <?php if($pageID == $artist['ID']){echo 'target="_blank"';} ?> href="<?php echo $artist['linkTo'] ?>">
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
