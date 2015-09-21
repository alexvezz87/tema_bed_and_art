<?php

//Autore: Alex Vezzelli - Alex Soluzioni Web
//url: http://www.alexsoluzioniweb.it/

/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage bed_and_art
 * @since Bed and Art 1.0
 */

$path_img = esc_url( get_template_directory_uri() ).'/images/';

?>

</div>
<!-- end main content -->

<footer class="site-footer container-fluid" role="contentinfo">
    <div class="row">
        <div class="copyright col-xs-12 col-md-3">
            <p>
                Copyright &copy; 2015 All right reserved B&amp;A - <a href="mailto:info@bedandart.it">info@bedandart.it</a><br>
                p.i. xxxxxxxx
            </p>
        </div>
        <div class="field col-xs-12 col-md-3">
            <h3>BOOKING NOW</h3>
        </div>
        <div class="field col-xs-12 col-md-3">
            <h3>NEWSLETTER</h3>
        </div>
        <div class="field col-xs-12 col-md-3">
            <ul class="social-link">
                <li>
                    <a href="#"><img src="<?php echo $path_img ?>social_youtube.png" alt="youtube" /></a>
                </li>
                <li>
                    <a href="#"><img src="<?php echo $path_img ?>social_vimeo.png" alt="vimeo" /></a>
                </li>
                <li>
                    <a href="#"><img src="<?php echo $path_img ?>social_twitter.png" alt="twitter" /></a>
                </li>
                <li>
                    <a href="#"><img src="<?php echo $path_img ?>social_linkedin.png" alt="linkedin"/></a>
                </li>
                <li>
                    <a href="#"><img src="<?php echo $path_img ?>social_instagram.png" alt="instagram"/></a>
                </li>
            </ul>
        </div>
    </div>
    
		
</footer><!-- .site-footer -->


<?php wp_footer(); ?>

</body>
</html>