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

<!-- Booking form -->
<div id="booking-form" class="black-container">
    <div class="col-xs-12 col-md-6">
        <h2>Contact for bookings</h2><span class="close-form">X</span>
        <div class="form-container">
            <?php echo do_shortcode('[contact-form-7 id="109" title="booking-form"]') ?>
        </div>
    </div>
</div>
<!-- end Booking form -->

<!-- Newsletter -->
<div id="newsletter-form" class="black-container">
    <div class="col-xs-12 col-md-6">
        <h2>Subscribe to the Newsletter</h2><span class="close-form">X</span>
        <div class="form-container">
        <?php 
            $widgetNL = new WYSIJA_NL_Widget(true);
            echo $widgetNL->widget(array('form' => 2, 'form_type' => 'php'));
        ?>
        </div>
    </div>
</div>
<!-- end Newsletter -->

<footer class="site-footer container-fluid" role="contentinfo">
    <div class="row">
        <div class="copyright col-xs-12 col-md-3">
            <p>
                Copyright &copy; 2015 All right reserved B&amp;A - <a href="mailto:info@bedandart.it">info@bedandart.it</a><br>
                p.i. xxxxxxxx
            </p>
        </div>
        <div class="field col-xs-12 col-md-3">
            <h3 class="booking-link">BOOKING NOW</h3>
        </div>
        <div class="field col-xs-12 col-md-3">
            <h3 class="newsletter-link">NEWSLETTER</h3>
        </div>
        <div class="field col-xs-12 col-md-3">
            <div class="social-links-container">
                <ul class="social-link">
                    <li>
                        <a target="_blank" href="https://www.youtube.com/channel/UCNOwuPM7QAtmUxSdNOro8dA"><img src="<?php echo $path_img ?>social_youtube.png" alt="youtube" /></a>
                    </li>
                    <li>
                        <a target="_blank" href="https://www.facebook.com/bedandartvenice"><img src="<?php echo $path_img ?>social_facebook.png" alt="facebook" /></a>
                    </li>               
                    <li>
                        <a target="_blank" href="#"><img src="<?php echo $path_img ?>social_linkedin.png" alt="linkedin"/></a>
                    </li>               
                </ul>
                <a href="#header-top" class="arrow-up"></a>
            </div>
        </div>
    </div>
    
		
</footer><!-- .site-footer -->


<?php wp_footer(); ?>

</body>
</html>