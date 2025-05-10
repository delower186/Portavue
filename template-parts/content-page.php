    <!-- Page Title -->
    <div class="page-title">
      <div class="title-wrapper">
        <h1><?php echo the_title(); ?></h1>
        <p><?php echo portavue_excerpt_limit(200, get_the_excerpt());?></p>
      </div>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="row">

        <div class="col-lg-12">

          <!-- Blog Details Section -->
          <section id="blog-details" class="blog-details section">
            <div class="container" data-aos="fade-up">

              <article class="article">

                <?php 

                    if(get_the_post_thumbnail_url()):
                        echo '<div class="hero-img" data-aos="zoom-in">
                                <img src="'.get_the_post_thumbnail_url().'" alt="Featured blog image" class="img-fluid" loading="lazy">
                            </div>';
                    endif;

                ?>

                <div class="article-content" data-aos="fade-up" data-aos-delay="100">
                  <div class="content-header">
                    <h1 class="title"><?php echo the_title(); ?></h1>
                  </div>

                  <div class="content"><?php echo the_content(); ?></div>
                </div>

              </article>

            </div>
          </section><!-- /Blog Details Section -->

        <!-- Pagination for Multipage Content -->
        <?php
        $pagination_links = wp_link_pages(array(
            'before'           => '<div class="page-links"><span>' . __('Pages:', 'textdomain') . '</span>',
            'after'            => '</div>',
            'link_before'      => '<span>',
            'link_after'       => '</span>',
            'echo'             => 0,
        ));

        if ($pagination_links) : ?>
            <!-- Custom Pagination -->
            <section id="pagination-3" class="pagination-3 section mt-4">
                <div class="container">
                    <div class="d-flex justify-content-center">
                        <ul>
                            <?php echo str_replace('page-numbers', '', $pagination_links); ?>
                        </ul>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php
          // Insert this after the post content
          if ( comments_open() || get_comments_number() ) {
              comments_template();
          }
        ?>

        </div>
      </div>
    </div>