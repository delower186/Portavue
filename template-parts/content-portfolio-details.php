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
            <h2><?php echo get_the_title();?></h2>
            <?php echo the_content(); ?>
          </div>

          <div class="portfolio-info mt-5">
            <h3>Project information</h3>
            <ul>
                <?php 
                    // category
                    $terms = get_the_terms( get_the_ID(), 'projects' );

                    if($terms[0]->name){
                        echo '<li><strong>Category</strong>'.$terms[0]->name.'</li>';
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