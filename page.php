<?php

//Autore: Alex Vezzelli - Alex Soluzioni Web
//url: http://www.alexsoluzioniweb.it/


/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage bed_and_art
 * @since Bed and Art 1.0
 */

get_header(); ?>

<div id="main-container" class="container-fluid">   
    <div class="row">
        <div class="col-xs-12">
            ss
    
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
</div>

    
<?php get_footer(); ?>
