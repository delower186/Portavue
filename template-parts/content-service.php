            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item">
                  <?php
                    $service_icon_class = get_post_meta(get_the_ID(), '_service_icon_class', true);

                    if($service_icon_class){
                      echo '<i class="bi '.$service_icon_class.' icon"></i>';
                    }
                  ?>
                  <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                  <p><?php echo portavue_excerpt_limit(200, get_the_excerpt()); ?></p>
                </div>
              </div><!-- End Service Item -->