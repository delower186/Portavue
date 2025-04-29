<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Portavue
 */

if ( ! is_active_sidebar( 'blog-sidebar' ) ) {
	return;
}
?>
<div class="col-lg-4 sidebar">

    <div class="widgets-container" data-aos="fade-up" data-aos-delay="200">

        <?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
            <?php dynamic_sidebar( 'blog-sidebar' ); ?>
        <?php endif; ?>


    </div>

</div>