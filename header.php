<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Portavue
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <title>
    <?php
    if (is_singular()) {
        the_title(); // Display the title of the current post or page
    } else {
        wp_title('', false); // Display page title or archive title without site name
    }
    ?>
    - <?php echo custom_bloginfo_description(); ?>
</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- =======================================================
  * Template Name: Portavue
  * Template URL: 
  * Updated: Feb 21 2025 with Bootstrap v5.3.3
  * Author: sandalia.com.bd
  * LicenseURL: 
  ======================================================== -->
  <?php wp_head(); ?>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="<?php echo get_home_url(); ?>" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
         <?php 
            if(function_exists('the_custom_logo')){
                //the_custom_logo();

                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id);

                echo '<img src="'.$logo[0].'" alt="logo">';
            }
         ?>
        <!-- <img src="assets/img/logo.webp" alt=""> -->
        <h1 class="sitename"><?php echo get_bloginfo('name'); ?></h1>
      </a>

      <nav id="navmenu" class="navmenu">

        <?php 
          if ( is_front_page() ) {
            wp_nav_menu( array( 
              'theme_location' => 'front-page-menu',
              'container'      => false, // removes <div class="menu-container">
              'menu_class'     => '', // removes class from <ul>
              'items_wrap'     => '<ul>%3$s</ul>', // removes id/class from <ul> 
            ) );
          } else {
            wp_nav_menu( array( 
              'theme_location' => 'other-page-menu',
              'container'      => false, // removes <div class="menu-container">
              'menu_class'     => '', // removes class from <ul>
              'items_wrap'     => '<ul>%3$s</ul>', // removes id/class from <ul>
            ) );
          }
        ?>


        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <div class="header-social-links">
        <?php 
          $linkedin = get_theme_mod( 'linkedin' );
          $whatsapp = get_theme_mod( 'whatsapp' );
          $msteams = get_theme_mod( 'msteams' );
          $upwork = get_theme_mod( 'upwork' );
          $facebook = get_theme_mod( 'facebook' );
          $twitter = get_theme_mod( 'twitter' );
          $instagram = get_theme_mod( 'instagram' );

          if ( $linkedin ) {
            echo '<a href="'.$linkedin.'" class="twitter"><i class="bi bi-linkedin"></i></a>';
          }
          if ( $whatsapp ) {
            echo '<a href="'.$whatsapp.'" class="facebook"><i class="bi bi-whatsapp fs-5"></i></a>';
          }
          if ( $msteams ) {
            echo '<a href="'.$msteams.'" class="instagram"><i class="bi bi-microsoft-teams fs-5"></i></a>';
          }
          if ( $upwork ) {
            echo '<a href="'.$upwork.'" class="linkedin"><i class="fa-brands fa-square-upwork fa-lg"></i></a>';
          }
          if ( $facebook ) {
            echo '<a href="'.$facebook.'" class="facebook"><i class="bi bi-facebook"></i></a>';
          }
          if ( $twitter ) {
            echo '<a href="'.$twitter.'" class="twitter"><i class="bi bi-twitter-x"></i></a>';
          }
          if ( $instagram ) {
            echo '<a href="'.$instagram.'" class="instagram"><i class="bi bi-instagram"></i></a>';
          }
        ?>
      </div>

    </div>
  </header>