<?php

//Autore: Alex Vezzelli - Alex Soluzioni Web
//url: http://www.alexsoluzioniweb.it/


/**
 *Template Name: Page 2
 */

get_header(); ?>

<div id="main-container" class="row">   
    <div class="col-xs-12">
       Ricciolo
    
    <?php if ( have_posts() ) : ?>
            

            <?php
            // Start the loop.
            while ( have_posts() ) : the_post();
                 the_content();

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    // Include the page content template.
			get_template_part( 'content', 'page' );
                        
                        if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

            // End the loop.
            endwhile;



    // If no content, include the "No posts found" template.
    else :
            get_template_part( 'content', 'none' );

    endif;
    ?>
</div>
</div>

    
<?php get_footer(); ?>
