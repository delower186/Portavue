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

get_header();
?>

    <!-- Search Results Posts Section -->
    <section id="search-results-posts" class="search-results-posts section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">

        <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $blog_posts = new WP_Query(array(
                    'post_type'      => 'post',
                    'posts_per_page' => 1,
                    'paged'          => $paged,
                ));
                if ( $blog_posts->have_posts() ) :

                    /* Start the Loop */
                    while ( $blog_posts->have_posts() ) :
                        $blog_posts->the_post();

                        /*
                        * Include the Post-Type-specific template for the content.
                        * If you want to override this in a child theme, then include a file
                        * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                        */
                        get_template_part( 'template-parts/content', 'blogs' );

                    endwhile;

                    // Custom Pagination
                    $big = 999999999; // need an unlikely integer
                    $pagination_links = paginate_links(array(
                        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format'    => '?paged=%#%',
                        'current'   => max(1, get_query_var('paged')),
                        'total'     => $blog_posts->max_num_pages,
                        'type'      => 'array',
                        'prev_text' => '<i class="bi bi-chevron-left"></i>',
                        'next_text' => '<i class="bi bi-chevron-right"></i>',
                    ));

                    if (!empty($pagination_links)) : ?>
                        <!-- Pagination 3 Section -->
                        <section id="pagination-3" class="pagination-3 section">
                            <div class="container">
                                <div class="d-flex justify-content-center">
                                    <ul>
                                        <?php foreach ($pagination_links as $link) : ?>
                                            <li><?php echo str_replace('page-numbers', '', $link); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </section>
                    <?php endif;

                wp_reset_postdata();

                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif;
            ?>

        </div>
      </div>

    </section><!-- /Search Results Posts Section -->

<?php
get_footer();