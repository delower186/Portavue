            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row">
                  <div class="col-lg-8">
                    <h2><?php echo get_the_title(); ?></h2>
                    <quote><?php echo get_the_content(); ?></quote>
                    <div class="profile d-flex align-items-center">
                      <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="profile-img" alt="">
                      <div class="profile-info">
                        <?php 
                            $testimonial_person_name = get_post_meta(get_the_ID(), '_testimonial_person_name', true);

                            if($testimonial_person_name){
                                echo '<h3>'.$testimonial_person_name.'</h3>';
                            }

                            $testimonial_position = get_post_meta(get_the_ID(), '_testimonial_position', true);

                            if($testimonial_position){
                                echo '<span>'.$testimonial_position.'</span>';
                            }
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 d-none d-lg-block">
                    <div class="featured-img-wrapper">
                      <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="featured-img" alt="">
                    </div>
                  </div>
                  <?php 
                        $testimonial_rating = get_post_meta(get_the_ID(), '_testimonial_rating', true);

                        if($testimonial_rating){
                            // Star Rating
                            portavue_star_rating($testimonial_rating);
                        }
                    ?>
                </div>
              </div>
            </div><!-- End Testimonial Item -->