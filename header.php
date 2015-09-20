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
$path_imges = esc_url( get_template_directory_uri() ).'/images/';
$path_js = esc_url( get_template_directory_uri() ).'/js/';

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
        <script src="<?php echo $path_js ?>bootstrap.min.js"></script>
        <script src="<?php echo $path_js ?>jquery-2.1.4.min.js"></script>
        <script src="<?php echo $path_js ?>functions.js"></script>
        
        <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css" type="text/css" >
        <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css" type="text/css" >
       
        
	<?php wp_head(); ?>
</head>

<header class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <img class="logo" src="<?php echo $path_imges ?>logo.jpg" alt="logo"/>
            <div id="hamburger-menu"></div>
        </div>        
    </div>    
</header>

<!-- menu a comparsa -->
<div id="menu-comparsa" class="container-fluid nopadding">
    <ul class="fill nopadding">
          
        
    <?php foreach($menu as $item){ ?>
        <li class="col-xs-12 col-sm-6 nopadding" style="background-image:  url('<?php echo getImageBackgroundItemMenu($item->title) ?>'); background-size:cover; background-repeat:no-repeat">
            <a href="<?php echo $item->url ?>"><?php echo $item->title ?> </a> 
            
        </li>        
    <?php } ?> 
    </ul>
    
</div>

<!-- end menu a comparsa -->