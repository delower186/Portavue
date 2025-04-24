    <!-- Page Title -->
    <div class="page-title">
      <div class="title-wrapper">
        <h1><?php echo get_the_title();?></h1>
        <p><?php echo portavue_excerpt_limit(200, get_the_excerpt());?></p>
      </div>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="service-details-slider swiper init-swiper">
              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": 1,
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>
              <div class="swiper-wrapper align-items-center">
                <?php 
                    $gallery = get_post_gallery( get_the_ID(), false );

                    if ( $gallery ) {
                        $image_ids = explode( ',', $gallery['ids'] );

                        foreach ( $image_ids as $image_id ) {
                            $image_url = wp_get_attachment_image_url( $image_id, 'full' );
                            echo '<div class="swiper-slide"><img src="' . esc_url( $image_url ) . '" alt="" class="img-fluid" loading="lazy"></div>';
                        }
                    }
                ?>
              </div>
              <div class="swiper-pagination"></div>
            </div>

            <div class="content mt-5">
              <h3><?php echo get_the_title();?></h3>
              <?php 
                // Get raw post content
                $content = get_the_content();
                // Remove Gutenberg gallery blocks
                $content_without_gallery = preg_replace('/<!-- wp:gallery .*?-->(.*?)<!-- \/wp:gallery -->/is', '', $content);
                // Apply the_content filters for formatting
                echo apply_filters('the_content', $content_without_gallery);
              ?>
              <div class="features mt-4">
                <div class="row gy-4">
                  <?php 
                    $terms = get_the_term_list( get_the_ID(), 'feature', '', ', ' );
                    $features = explode(',',$terms);
                    if ( is_array($features) && !empty($features) ) {
                        foreach($features as $feature){
                          echo '<div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                                  <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h4>'.$feature.'</h4>
                                  </div>
                              </div>';
                        }
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="service-info">
              <h4>Service Information</h4>
              <div class="info-item">
                <i class="bi bi-clock"></i>
                <h5>Project Duration</h5>
                <?php 
                  $project_duration = get_post_meta(get_the_ID(), '_project_duration', true);

                  if($project_duration){
                    echo '<p>'.$project_duration.'</p>';
                  }
                ?>
              </div>
              <div class="info-item">
                <i class="bi bi-person-check"></i>
                <h5>Project Manager</h5>
                <?php 
                  $project_manager = get_post_meta(get_the_ID(), '_project_manager', true);

                  if($project_manager){
                    echo '<p>'.$project_manager.'</p>';
                  }
                ?>
              </div>
              <div class="info-item">
                <i class="bi bi-telephone"></i>
                <h5>Contact Support</h5>
                <?php 
                  $contact_support = get_post_meta(get_the_ID(), '_contact_support', true);

                  if($contact_support){
                    echo '<p>'.$contact_support.'</p>';
                  }
                ?>
              </div>
            </div>

            <div class="related-services mt-5">
              <h4>Related Services</h4>
              <?php get_template_part( 'template-parts/content', 'service-related'); ?>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Service Details Section -->