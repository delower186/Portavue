    <!-- Page Title -->
    <div class="page-title">
      <div class="title-wrapper">
        <h1><?php echo the_title(); ?></h1>
        <p><?php echo portavue_excerpt_limit(200, get_the_excerpt());?></p>
      </div>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="row">

        <div class="col-lg-8">

          <!-- Blog Details Section -->
          <section id="blog-details" class="blog-details section">
            <div class="container" data-aos="fade-up">

              <article class="article">

                <div class="hero-img" data-aos="zoom-in">
                  <img src="<?php echo get_the_post_thumbnail_url();?>" alt="Featured blog image" class="img-fluid" loading="lazy">
                  <div class="meta-overlay">
                    <div class="meta-categories">
                        <?php 
                            $categories = get_the_category();

                            if ( ! empty( $categories ) ) {
                                foreach ( $categories as $cat ) {
                                    echo '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '" class="category">'
                                        . esc_html( $cat->name ) .
                                        '</a> ';
                                }
                            }
                            $content = get_post_field('post_content', get_the_ID());
                            $word_count = str_word_count(strip_tags($content));
                            $reading_time = ceil($word_count / 200); // 200 words per minute
                        ?>
                      <span class="divider">•</span>
                      <span class="reading-time"><i class="bi bi-clock"></i> <?php echo $reading_time; ?> min read</span>
                    </div>
                  </div>
                </div>

                <div class="article-content" data-aos="fade-up" data-aos-delay="100">
                  <div class="content-header">
                    <h1 class="title"><?php echo the_title(); ?></h1>

                    <div class="author-info">
                      <div class="author-details">
                        <?php 
                            $avatar_url = get_avatar_url( get_the_author_meta('ID'), ['size' => 96] );
                            echo '<img src="' . esc_url($avatar_url) . '" alt="' . esc_attr(get_the_author()) . '" class="author-img">';
                        ?>
                        <div class="info">
                          <h4><a target="_blank" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta('ID') ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></h4>
                          <span class="role"><?php echo get_the_author_meta('job_title', get_current_user_id()); ?></span>
                        </div>
                      </div>
                      <div class="post-meta">
                        <span class="date"><i class="bi bi-calendar3"></i> <?php echo get_the_date('M j, Y'); ?></span>
                        <span class="divider">•</span>
                        <span class="comments"><i class="bi bi-chat-text"></i> <?php echo get_comments_number(); ?> Comments</span>
                      </div>
                    </div>
                  </div>

                  <div class="content">
                    <?php 
                        // Remove first <img> from content
                        $clean_content = preg_replace('/<img.+?src=["\']([^"\']+)["\'].*?>/', '', $content, 1);

                        // Then display
                        echo apply_filters('the_content', $clean_content);
                    ?>

                    <div class="content-image">
                        <?php 
                            $content = get_the_content();
                            $first_img_url = '';

                            if (preg_match('/<img.+src=["\']([^"\']+)["\']/', $content, $matches)) {
                                $first_img_url = $matches[1]; // this is the first image's src
                            }

                            if ($first_img_url) {
                                echo '<img src="' . esc_url($first_img_url) . '" alt="'.get_the_title().'" class="img-fluid" loading="lazy">';
                            }
                        ?>
                    </div>

                  </div>

                  <div class="meta-bottom">
                    <div class="tags-section">
                      <h4>Related Topics</h4>
                      <div class="tags">
                        <?php 
                            $tags = get_the_tags();

                            if ( $tags ) {
                                foreach ( $tags as $tag ) {
                                    echo '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '" class="tag">' .
                                        esc_html( $tag->name ) . '</a> ';
                                }
                            }
                        ?>
                      </div>
                    </div>

                    <div class="share-section">
                      <h4>Share Article</h4>
                      <div class="social-links">
                        <?php echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
                      </div>
                    </div>
                  </div>
                </div>

              </article>

            </div>
          </section><!-- /Blog Details Section -->

          <!-- Blog Author Section -->
          <section id="blog-author" class="blog-author section">

            <div class="container" data-aos="fade-up">
              <div class="author-box">
                <div class="row align-items-center">
                  <div class="col-lg-3 col-md-4 text-center">
                  <?php 
                    $avatar_url = get_avatar_url( get_the_author_meta('ID'), ['size' => 96] );
                    echo '<img src="' . esc_url($avatar_url) . '" alt="' . esc_attr(get_the_author()) . '" class="author-img rounded-circle" loading="lazy">';
                  ?>
                    <div class="author-social-links mt-3">
                      <a target="_blank" href="<?php echo get_the_author_meta('x_profile_url', get_current_user_id()) ? get_the_author_meta('x_profile_url', get_current_user_id()): '#'; ?>" class="twitter"><i class="bi bi-twitter-x"></i></a>
                      <a target="_blank" href="<?php echo get_the_author_meta('linkedin_profile_url', get_current_user_id()) ? get_the_author_meta('linkedin_profile_url', get_current_user_id()): '#'; ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
                      <a target="_blank" href="<?php echo get_the_author_meta('github_profile_url', get_current_user_id()) ? get_the_author_meta('github_profile_url', get_current_user_id()): '#'; ?>" class="github"><i class="bi bi-github"></i></a>
                      <a target="_blank" href="<?php echo get_the_author_meta('facebook_profile_url', get_current_user_id()) ? get_the_author_meta('facebook_profile_url', get_current_user_id()): '#'; ?>" class="facebook"><i class="bi bi-facebook"></i></a>
                      <a target="_blank" href="<?php echo get_the_author_meta('instagram_profile_url', get_current_user_id()) ? get_the_author_meta('instagram_profile_url', get_current_user_id()): '#'; ?>" class="instagram"><i class="bi bi-instagram"></i></a>
                    </div>
                  </div>

                  <div class="col-lg-9 col-md-8">
                    <div class="author-content">
                      <h3 class="author-name"><?php echo esc_html( get_the_author() ); ?></h3>
                      <?php 
                        if(get_the_author_meta('job_title', get_current_user_id())){
                            echo '<span class="author-title">'.get_the_author_meta('job_title', get_current_user_id()).'</span>';
                        }else{
                            echo '<span class="author-title">Job Title Not Provided</span>';
                        }

                        if(get_the_author_meta('description')){
                            echo '<div class="author-bio mt-3">'.get_the_author_meta('description').'</div>';
                        }else{
                            echo '<div class="author-bio mt-3">Bio Is not Provided</div>';
                        }
                      ?>
                      <div class="author-website mt-3">
                        <?php 
                            if(get_the_author_meta('user_url')){
                                echo '<a href="'.get_the_author_meta('user_url').'" class="website-link">
                                    <i class="bi bi-globe"></i>
                                    <span>'.preg_replace('#^https?://#', '', get_the_author_meta('user_url')).'</span>
                                    </a>';
                            }else{
                                echo '<a href="#" class="website-link">
                                        <i class="bi bi-globe"></i>
                                        <span>example.com</span>
                                    </a>';
                            }
                        ?>
                        <a target="_blank" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta('ID') ) ); ?>" class="more-posts">
                          Read More from <?php echo esc_html( get_the_author() ); ?> <i class="bi bi-arrow-right"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </section><!-- /Blog Author Section -->

        <?php
          // Insert this after the post content
          if ( comments_open() || get_comments_number() ) {
              comments_template();
          }
        ?>

        </div>

      <?php get_sidebar(); ?>

      </div>
    </div>