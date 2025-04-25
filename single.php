<?php get_header(); ?>

<main class="main">

<?php 
    // loop through blogs and get all of them
    if (have_posts()) :
        while (have_posts()) : the_post();
            get_template_part( 'template-parts/content', 'blog');
        endwhile;
    endif;
    wp_reset_postdata();
    // end loop
?>
</main>
<?php get_footer(); ?>