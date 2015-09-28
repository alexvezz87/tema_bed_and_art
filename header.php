<?php

//Autore: Alex Vezzelli - Alex Soluzioni Web
//url: http://www.alexsoluzioniweb.it/

/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage bed_and_art
 * @since Bed and Art 1.0
 */

//imposto alcuni path
$path_img = esc_url( get_template_directory_uri() ).'/images/';
$path_js = esc_url( get_template_directory_uri() ).'/js/';
$path_css = esc_url( get_template_directory_uri() ).'/css/';

//ottengo il menu
$menu = wp_get_nav_menu_items( 'primary');


?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
        <title>Bed and Art</title>
	
	<!--[if lt IE 9]>
	<script src="<?php echo $path_js ?>html5.js"></script>
	<![endif]-->
        
       <script src="<?php echo $path_js ?>jquery-2.1.4.min.js"></script>
        <!-- swiper -->
        <link rel="stylesheet" href="<?php echo $path_css ?>swiper.min.css">   
            
        <script src="<?php echo $path_js ?>swiper.min.js"></script>
        <script src="<?php echo $path_js ?>swiper.jquery.min.js"></script>
        <script src="<?php echo $path_js ?>swiper.jquery.umd.min.js"></script>        
        <!-- end swiper -->  
        
        <script src="<?php echo $path_js ?>jquery-2.1.4.min.js"></script>
        <script src="<?php echo $path_js ?>bootstrap.min.js"></script>    
        <script src="<?php echo $path_js ?>functions.js"></script>
       
        
        <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css" type="text/css" >
        <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css" type="text/css" >
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
        
        <link rel="icon" href="<?php echo $path_img ?>favicon.png" type="image/png" />
        
	<?php wp_head(); ?>
</head>

<header class="container-fluid" id="header-top">
    <div class="row">
        <div class="col-xs-12 logo-container">
            <a href="<?php echo get_home_url() ?>">
                <img class="logo" src="<?php echo $path_img ?>bedandart-logo.png" alt="logo"/>
            </a>
            <div id="hamburger-menu"></div>
        </div>        
    </div>    
</header>

<!-- menu a comparsa -->
<div id="menu-comparsa" class="container-fluid nopadding">
    <ul class="fill nopadding">
          
    <?php if(count($menu)>0){ ?>    
        <?php foreach($menu as $item){ ?>
            <li class="col-xs-12 col-sm-6 nopadding" style="background: url('<?php echo getImageBackgroundItemMenu($item->title) ?>') center center; background-size:cover; background-repeat:no-repeat">
                <a href="<?php echo $item->url ?>"><?php echo $item->title ?> </a>             
            </li>        
        <?php } ?> 
    <?php } ?>
    </ul>
    
</div>

<!-- end menu a comparsa -->

<!-- start main content -->
<div id="main-container" class="container-fluid nopadding">   