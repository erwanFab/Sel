<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author dew
 */


/* 	Design Theme's Header
	Copyright: 2012-2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Design 1.0
*/

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title(); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php 

wp_head(); ?>
</head>
<body <?php body_class(); ?> >
  	  <div id="top-menu-container">
      <?php get_search_form(); ?>    
      </div>
      <div id ="header">
      <div id ="header-content">
		<!-- Site Titele and Description Goes Here -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if ( get_header_image() !='' ): ?><img class="site-logo" src="<?php header_image(); ?>"/><?php else: ?><h1 class="site-title"><?php echo bloginfo( 'name' ); ?></h1><?php endif; ?></a>
		<h2 class="site-title-hidden"><?php echo bloginfo( 'description' ); ?></h2>
        <!-- Site Main Menu Goes Here -->
        <nav id="design-main-menu">
		<?php if ( has_nav_menu( 'main-menu' ) ) :  wp_nav_menu( array( 'theme_location' => 'main-menu' )); else: wp_page_menu(); endif; ?>
        </nav>
      </div><!-- header-content -->
<center>	
<?php  
// installation d'un slider sr la page d'acceuil
 if(is_home()) { if (function_exists("easing_slider")){ easing_slider(984); } } ?>



</center>
      </div><!-- header -->
       
	         
       
       
      
	  
	 
	  