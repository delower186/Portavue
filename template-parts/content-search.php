          <div class="col-lg-4">
            <article>

              <div class="post-img">
                <img src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php the_title(); ?>" class="img-fluid">
              </div>
                <?php
                    $categories = get_the_category();

                    if ( ! empty( $categories ) ) {
                        foreach ( $categories as $cat ) {
                            echo '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '" class="category"><p class="post-category">'. esc_html( $cat->name ) .'</p></a>';
                        }
                    }
                ?>

              <h2 class="title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="<?php echo esc_url(get_avatar_url( get_the_author_meta('ID'), ['size' => 96] )); ?>" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author"><?php echo esc_attr(get_the_author()); ?></p>
                  <p class="post-date">
                    <time datetime="2022-01-01"><?php echo get_the_date('M j, Y'); ?></time>
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->