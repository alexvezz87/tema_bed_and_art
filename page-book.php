<?php

//Autore: Alex Vezzelli - Alex Soluzioni Web
//url: http://www.alexsoluzioniweb.it/


/**
 *Template Name: Page Book
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
			'terms' => 'book'
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
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

               
            </div>         
        <a href="#project-inside" class="discover-more">Discover</a>



 <?php
    
        //Ottengo i valori relativi ai campi di descrizione
        $args = array(
            'post_type' => 'baa_books',
            'tax_query' => array(
		array(
			'taxonomy' => 'book_type',
			'field' => 'slug',
			'terms' => 'book-detail'
		)
            )        
        );
        $fields = get_posts($args); 
        
        $books = array();
        foreach($fields as $field){
            $book = array();
            $book['titolo'] = $field->post_title;
            $book['descrizione'] = $field->post_content;
            $book['image'] = wp_get_attachment_url( get_post_thumbnail_id($field->ID));  
            $book['url'] = get_post_meta($field->ID, 'url', true);
            
            
            array_push($books, $book);
        }
        
        
    ?>
        <div id="inside" class="book"> 
            <?php if(count($books) > 0) {?>
            <div class="row">
                <ul class="books-container">
                    <?php foreach($books as $book) { ?>
                    <li class="col-xs-12 col-lg-6 nopadding">
                        <div class="book-image col-xs-12 col-md-6 nopadding">
                            <img src="<?php echo $book['image'] ?>" alt="<?php echo $book['titolo'] ?>" />
                        </div>
                        <div class="book-description col-xs-12 col-md-6 ">
                            <h3><?php echo $book['titolo'] ?></h3>
                            <p>
                                <?php echo $book['descrizione'] ?>
                            </p>
                        </div>
                        <div class="col-xs-12 nopadding-desktop">
                            <div class="col-xs-12 col-md-6 nopadding">
                                <div class="link-container">
                                    <a target="_blank" href="<?php echo $book['url'] ?>" class="book-url">Buy now</a>
                                </div>
                            </div>
                        </div>
                    </li>                   
                    <?php } ?> 
                </ul>      
            </div>
            <?php } ?>          
        </div>
    
    </div>
</div>


    
<?php get_footer(); ?>
