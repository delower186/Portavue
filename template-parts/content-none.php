<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Portavue
 */

?>

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?php esc_html_e( 'Nothing Found', 'portavue' ); ?></h2>
        <div class="title-shape">
          <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
          </svg>
        </div>
        <p class="lead mb-4">
            <?php
                if ( is_home() && current_user_can( 'publish_posts' ) ) :

                    printf(
                        '<p>' . wp_kses(
                            /* translators: 1: link to WP admin new post page. */
                            __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'portavue' ),
                            array(
                                'a' => array(
                                    'href' => array(),
                                ),
                            )
                        ) . '</p>',
                        esc_url( admin_url( 'post-new.php' ) )
                    );

                elseif ( is_search() ) :
                    ?>

                    <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'portavue' ); ?></p>
                    <?php
                    get_search_form();

                else :
                    ?>

                    <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'portavue' ); ?></p>
                    <?php
                    get_search_form();

                endif;
            ?>
        </p>
      </div><!-- End Section Title -->

    </section><!-- /Starter Section Section -->