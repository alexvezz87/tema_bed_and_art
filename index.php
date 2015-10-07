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

$idPage = get_the_ID();
$post = get_post($idPage);

get_header(); ?>

<div class="fill nopadding">       
    <div class="col-xs-12 nopadding">
        
         <div id="inside" class="blog-list"> 
            <div class="background-logo"></div>
           
                
    
    <?php if ( have_posts() ) : ?>
           <?php $author = get_the_author_meta('ID'); ?>
             
            <div class="row">
                <div class="col-xs-12 blog-post">
                    <div class="header-post">
                        <div class="titles-post">
                            <h2 class="red-1"><?php single_post_title(); ?></h2>
                            <h4><?php echo get_the_author_meta('display_name', $post->post_author ); ?> - <?php echo get_the_date('', $idPage) ?></h4>
                        </div>
                    <?php echo do_shortcode("[huge_it_share]"); ?>
                        
                        <div style="clear:both"></div>
                    </div>
                    <div class="image">
                        <a href="<?php echo $post->guid ?>">
                            <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID))  ?>"  alt="<?php echo $post->post_title ?>" />
                        </a>
                    </div>
            <?php
            // Start the loop.
            while ( have_posts() ) : the_post();
            ?>    
                <div class="content">
            <?php
                the_content();
            ?>
                </div>   
            <?php
                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'content', get_post_format() );

            // End the loop.
            endwhile;
            ?>
            
                </div>
            </div>
            <?php

    // If no content, include the "No posts found" template.
    else :
            get_template_part( 'content', 'none' );

    endif;
    ?>      
        
    </div>
            
    </div>

</div>

    
<?php get_footer(); ?>
