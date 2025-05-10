<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Portavue
 */

get_header();
?>
    <!-- Page Title -->
    <div class="page-title">
      <div class="title-wrapper">
        <h1>
            <?php
                // Display archive title
                $custom_taxonomies = ['feature', 'projects']; // Add your custom taxonomies here

                if (is_category()) {
                    single_cat_title();
                } elseif (is_tag()) {
                    single_tag_title();
                } elseif (is_author() || is_date()) {
                    the_archive_title();
                } else {
                    // Loop through custom taxonomies
                    foreach ($custom_taxonomies as $taxonomy) {
                        if (is_tax($taxonomy)) {
                            single_term_title();
                            break; // Stop the loop once a matching taxonomy is found
                        }
                    }
                
                    // Default title if no conditions match
                    if (!isset($taxonomy)) {
                        _e('Archives', 'textdomain');
                    }
                }
            ?>
        </h1>
      </div>
    </div><!-- End Page Title -->

    <!-- Search Results Posts Section -->
    <section id="search-results-posts" class="search-results-posts section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">

        <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $custom_post_types = get_post_types(array(
                    'public' => true,
                    '_builtin' => false,
                ), 'names');
                
                $all_post_types = array_merge(['post'], $custom_post_types);

                $blog_posts = new WP_Query(array(
                    'post_type'      => $all_post_types,
                    'paged'          => $paged,
                    'tax_query'      => array(
                        array(
                            'taxonomy' => get_queried_object()->taxonomy,
                            'field'    => 'slug',
                            'terms'    => get_queried_object()->slug,
                        ),
                    ),
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
