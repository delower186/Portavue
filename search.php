<?php get_header(); ?>

<main class="main">
    <!-- Page Title -->
    <div class="page-title">
      <div class="title-wrapper">
        <h1>Search Results</h1>
        <p>We found results for your search term <strong><?php echo get_search_query(); ?></strong></p>
      </div>
    </div><!-- End Page Title -->
    <!-- Search Results Posts Section -->
    <section id="search-results-posts" class="search-results-posts section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            
            <?php 
                // loop through blogs and get all of them
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        get_template_part( 'template-parts/content', 'search');
                    endwhile;
                endif;
                wp_reset_postdata();
                // end loop
            ?>

        </div>
      </div>

    </section><!-- /Search Results Posts Section -->

<?php
    // Only show pagination if there's more than one page
    if ( get_the_posts_pagination() ) :
    ?>

    <!-- Pagination 3 Section -->
    <section id="pagination-3" class="pagination-3 section">
        <div class="container">
            <div class="d-flex justify-content-center">
            <ul class="pagination">
                <?php
                $pagination_args = [
                    'mid_size'           => 2,
                    'prev_text'          => '<i class="bi bi-chevron-left"></i>',
                    'next_text'          => '<i class="bi bi-chevron-right"></i>',
                    'screen_reader_text' => ' ',
                    'type'               => 'array', // We need array to manually loop
                ];

                $pages = paginate_links( $pagination_args );

                if ( is_array( $pages ) ) {
                    foreach ( $pages as $page ) {
                        echo '<li>' . $page . '</li>';
                    }
                }
                ?>
            </ul>
            </div>
        </div>
    </section>
    <!-- /Pagination 3 Section -->

<?php endif; ?>
</main>
<?php get_footer(); ?>