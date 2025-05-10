<!-- Page Title -->
<div class="page-title">
  <div class="title-wrapper">
    <h1><?php echo get_the_title();?></h1>
    <p><?php echo portavue_excerpt_limit(200, get_the_excerpt());?></p>
  </div>
</div><!-- End Page Title -->

<!-- Portfolio Details Section -->
<section id="portfolio-details" class="portfolio-details section">

  <div class="container" data-aos="fade-up">

    <div class="row gy-4 g-lg-5">
      <div class="col-lg-6">
        <?php 
            $gallery = get_post_gallery( get_the_ID(), false );

            if ( $gallery ) {
                $image_ids = explode( ',', $gallery['ids'] );

                foreach ( $image_ids as $image_id ) {
                    $image_url = wp_get_attachment_image_url( $image_id, 'full' );
                    echo '<img src="' . esc_url( $image_url ) . '" class="img-fluid mb-4" alt="">';
                }
            }
        ?>
      </div>

      <div class="col-lg-6">

        <div class="position-sticky" style="top: 40px">
          <div class="portfolio-description">
            <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <?php 
                    $message = get_post_meta(get_the_ID(), '_message', true);

                    if($message){
                      echo '<span>'.$message.'</span>';
                    }
                  ?>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <div>
                <?php 
                  $client_image_id = get_post_meta(get_the_ID(), '_client_image_id', true);
                  if ($client_image_id) {
                      echo '<img src="'.wp_get_attachment_url($client_image_id).'" class="testimonial-img" alt="client">';
                  }

                  $person_name = get_post_meta(get_the_ID(), '_person_name', true);

                  if($person_name){
                    echo '<h3>'.$person_name.'</h3>';
                  }

                  $position = get_post_meta(get_the_ID(), '_position', true);

                  if($position){
                    echo '<h4>'.$position.'</h4>';
                  }
                ?>
                </div>
              </div>
            <h2><?php echo get_the_title();?></h2>
            <?php 
                // Get raw post content
                $content = get_the_content();
                // Remove Gutenberg gallery blocks
                $content_without_gallery = preg_replace('/<!-- wp:gallery .*?-->(.*?)<!-- \/wp:gallery -->/is', '', $content);
                // Apply the_content filters for formatting
                echo apply_filters('the_content', $content_without_gallery);
              ?>
          </div>

          <div class="portfolio-info mt-5">
            <h3>Project information</h3>
            <ul>
                <?php 
                    // category
                    $terms = get_the_terms( get_the_ID(), 'projects' );

                    if ($terms && !is_wp_error($terms)) {
                        foreach ($terms as $term) {
                            // Get the term link
                            $term_link = get_term_link($term);

                            if (!is_wp_error($term_link)) {
                                echo '<li><strong>Category</strong><a target="_blank" href="' . esc_url($term_link) . '">' . esc_html($term->name) . '</a></li>';
                            }
                        }
                    } else {
                        echo '<li><strong>Category</strong></li>';
                    }

                    // client
                    $client_name = get_post_meta(get_the_ID(), '_client_name', true); 

                    if($client_name){
                        echo '<li><strong>Client</strong>'.$client_name.'</li>';
                    }

                    // project date
                    $project_date = get_post_meta(get_the_ID(), '_project_date', true);

                    if($project_date){
                        echo '<li><strong>Project date</strong>'.date('d F, Y', strtotime($project_date)).'</li>';
                    }

                    // project URL
                    $project_url = get_post_meta(get_the_ID(), '_project_url', true);

                    if($project_url){
                        echo '<li><strong>Project URL</strong> <a href="'.$project_url.'">'.$project_url.'</a></li>
                        <li><a href="'.$project_url.'" class="btn-visit align-self-start">Visit Website</a></li>';
                    }

                ?>
            </ul>
          </div>
        </div>

      </div>
    </div>

  </div>

</section><!-- /Portfolio Details Section -->