<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="description" content="">
  <meta name="keywords" content="">

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

      <a href="<?php echo get_bloginfo('home'); ?>" class="logo d-flex align-items-center me-auto me-xl-0">
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
            wp_nav_menu( 

                [
                    'menu' => 'primary',
                    'container' => '',
                    'theme_location' => 'primary'
                ]

            )
        ?>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>

    </div>
  </header>