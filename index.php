<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Portavue
 */
/**
 * Template Name: Portavue_Blog_template
 */

get_header();
?>

    <!-- Page Title -->
    <div class="page-title">
      <div class="title-wrapper">
        <h1>Search Results</h1>
        <p>We found <strong>44</strong> results for your search term <strong>search tern</strong></p>
      </div>
    </div><!-- End Page Title -->

    <!-- Search Results Posts Section -->
    <section id="search-results-posts" class="search-results-posts section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">

            <?php
                if ( have_posts() ) :

                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();

                        /*
                        * Include the Post-Type-specific template for the content.
                        * If you want to override this in a child theme, then include a file
                        * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                        */
                        get_template_part( 'template-parts/content', 'blogs' );

                    endwhile;

                    the_posts_navigation();

                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif;
            ?>

        </div>
      </div>

    </section><!-- /Search Results Posts Section -->

    <!-- Pagination 3 Section -->
    <section id="pagination-3" class="pagination-3 section">

      <div class="container">
        <div class="d-flex justify-content-center">
          <ul>
            <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
            <li><a href="#">1</a></li>
            <li><a href="#" class="active">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li>...</li>
            <li><a href="#">10</a></li>
            <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>

    </section><!-- /Pagination 3 Section -->

<?php
get_footer();