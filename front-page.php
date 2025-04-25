  <?php get_header(); ?>
  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center content">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <h3><?php echo get_theme_mod( 'hero_name' );?></h3>
            <h2>I'm <span class="typed" data-typed-items="<?php echo get_theme_mod( 'hero_text' );?>"></span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></h2>
            <div class="cta-buttons" data-aos="fade-up" data-aos-delay="300">
              <a href="#portfolio" class="btn btn-primary">View My Work</a>
              <a href="#contact" class="btn btn-outline">Let's Connect</a>
            </div>
            <div class="hero-stats" data-aos="fade-up" data-aos-delay="400">
              <div class="stat-item">
                <span data-purecounter-start="0" data-purecounter-end="<?php echo get_theme_mod( 'hero_experiences' );?>" data-purecounter-duration="1" class="stat-number purecounter"></span>
                <span class="stat-label">Years Experience</span>
              </div>
              <div class="stat-item">
                <span data-purecounter-start="0" data-purecounter-end="<?php echo get_theme_mod( 'hero_projects' );?>" data-purecounter-duration="1" class="stat-number purecounter"></span>
                <span class="stat-label">Projects Completed</span>
              </div>
              <div class="stat-item">
                <span data-purecounter-start="0" data-purecounter-end="<?php echo get_theme_mod( 'hero_clients' );?>" data-purecounter-duration="1" class="stat-number purecounter"></span>
                <span class="stat-label">Happy Clients</span>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="hero-image">
              <img src='<?php echo get_template_directory_uri()."/assets/img/profile/profile-1.webp"; ?>' alt="Portfolio Hero Image" class="img-fluid" data-aos="zoom-out" data-aos-delay="300">
              <div class="shape-1"></div>
              <div class="shape-2"></div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Hero Section -->
    <!-- Clients Section -->
    <section id="clients" class="clients section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
          <?php
            $args = ['post_type' => 'client'];
            $client_query = new WP_Query($args);

            if ($client_query->have_posts()):

              while ($client_query->have_posts()): $client_query->the_post();
                get_template_part( 'template-parts/content', 'client');
              endwhile;
              wp_reset_postdata();
          endif;
          ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Clients Section -->
    <!-- About Section -->
    <section id="about" class="about section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
        <div class="title-shape">
          <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
          </svg>
        </div>
        <p><?php echo get_theme_mod( 'about_section_msg' );?></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
          <?php $about = get_page_by_path('about'); ?>
        <div class="row align-items-center">
          <div class="col-lg-6 position-relative" data-aos="fade-right" data-aos-delay="200">
            <div class="about-image">
              <img src="<?php echo get_the_post_thumbnail_url($about->ID); ?>" alt="Profile Image" class="img-fluid rounded-4">
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="about-content">
              <span class="subtitle">About Me</span>

              <?php echo apply_filters('the_content', $about->post_content); ?>

              <div class="personal-info">
                <div class="row g-4">
                  <div class="col-6">
                    <div class="info-item">
                      <span class="label">Name</span>
                      <?php
                        $about_name = get_post_meta($about->ID, '_about_name', true);

                        if($about_name){
                          echo '<span class="value">'.$about_name.'</span>';
                        }
                      ?>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="info-item">
                      <span class="label">Phone</span>
                      <?php
                        $about_phone = get_post_meta($about->ID, '_about_phone', true);

                        if($about_phone){
                          echo '<span class="value">'.$about_phone.'</span>';
                        }
                      ?>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="info-item">
                      <span class="label">Age</span>
                      <?php
                        $about_age = get_post_meta($about->ID, '_about_age', true);

                        if($about_age){
                          echo '<span class="value">'.$about_age.'</span>';
                        }
                      ?>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="info-item">
                      <span class="label">Email</span>
                      <?php
                        $about_email = get_post_meta($about->ID, '_about_email', true);

                        if($about_email){
                          echo '<span class="value">'.$about_email.'</span>';
                        }
                      ?>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="info-item">
                      <span class="label">Occupation</span>
                      <?php
                        $about_occupation = get_post_meta($about->ID, '_about_occupation', true);

                        if($about_occupation){
                          echo '<span class="value">'.$about_occupation.'</span>';
                        }
                      ?>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="info-item">
                      <span class="label">Nationality</span>
                      <?php
                        $about_nationality = get_post_meta($about->ID, '_about_nationality', true);

                        if($about_nationality){
                          echo '<span class="value">'.$about_nationality.'</span>';
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="signature mt-4">
                <div class="signature-image">
                <?php
                    if($about_name){
                      $signature_url = portavue_generate_signature_image($about_name);
                      echo '<img src="'.$signature_url.'" alt="" class="img-fluid">';
                    }
                ?>
                </div>
                <div class="signature-info">
                <?php
                    if($about_name){
                      echo '<h4>'.$about_name.'</4>';
                    }

                    if($about_occupation){
                      echo '<p>'.$about_occupation.'</p>';
                    }
                ?>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Skills Section -->
    <section id="skills" class="skills section light-background">

      <!-- Section Title 
      <div class="container section-title" data-aos="fade-up">
        <h2>Skills</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div> End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row skills-content skills-animation">
            <?php
              $args = ['post_type' => 'skill'];
              $client_query = new WP_Query($args);

              $post_count = $client_query->found_posts; // Get total count

              if ($client_query->have_posts() ):
                  while ($client_query->have_posts()): $client_query->the_post();
                    if($client_query->found_posts <= 3){
                      echo '<div class="col-lg-12">';
                        get_template_part( 'template-parts/content', 'skill');
                      echo '</div>';
                    }else{
                      echo '<div class="col-lg-6">';
                        get_template_part( 'template-parts/content', 'skill');
                      echo '</div>';
                    }
                  endwhile;
                  wp_reset_postdata();
              endif;
            ?>
        </div>

      </div>

    </section><!-- /Skills Section -->

    <!-- Resume Section -->
    <section id="resume" class="resume section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Resume</h2>
        <div class="title-shape">
          <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
          </svg>
        </div>
        <p><?php echo get_theme_mod( 'resume_section_msg' );?></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-12">
            <div class="resume-wrapper">
              <div class="resume-block" data-aos="fade-up" data-aos-delay="100">
                <h2>Work Experience</h2>
                <p class="lead"><?php echo get_theme_mod( 'experience_section_msg' );?></p>

                <div class="timeline">
                  <?php 
                      $args = array(
                        'post_type' => 'experience',
                      );
                      $query = new WP_Query($args);

                      while ($query->have_posts()) {
                        $query->the_post();
                        get_template_part( 'template-parts/content', 'experience');
                      }
                      wp_reset_postdata();
                      // end loop
                    ?>
                </div>
              </div>

              <div class="resume-block" data-aos="fade-up" data-aos-delay="100">
                <h2>My Education</h2>
                <p class="lead"><?php echo get_theme_mod( 'education_section_msg' );?></p>

                <div class="timeline">
                   <?php 
                      $args = array(
                        'post_type' => 'education',
                      );
                      $query = new WP_Query($args);

                      while ($query->have_posts()) {
                        $query->the_post();
                        get_template_part( 'template-parts/content', 'education');
                      }
                      wp_reset_postdata();
                      // end loop
                    ?>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Resume Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <div class="title-shape">
          <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
          </svg>
        </div>
        <p><?php echo get_theme_mod( 'portfolio_section_msg' );?></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <div class="portfolio-filters-container" data-aos="fade-up" data-aos-delay="200">
            <ul class="portfolio-filters isotope-filters">
              <li data-filter="*" class="filter-active">All Work</li>
              <?php 
                $terms = get_terms(array(
                  'taxonomy'   => 'projects',
                  'hide_empty' => true, // Set to true to hide terms not assigned to any post
                ));
              
                if (!is_wp_error($terms)) {
                    foreach ($terms as $term) {
                      echo '<li data-filter=".filter-'.$term->slug.'">'. $term->name .'</li>';
                    }
                }
              ?>
            </ul>
          </div>

          <div class="row g-4 isotope-container" data-aos="fade-up" data-aos-delay="300">
            <?php 
                $terms = get_terms(array(
                  'taxonomy'   => 'projects',
                  'hide_empty' => true, // Set to true to hide terms not assigned to any post
                ));
              
                if (!is_wp_error($terms)) {
                    foreach ($terms as $term) {
                      // loop through portfolio and get all of them
                        $args = array(
                          'post_type' => 'portfolio',
                          'tax_query' => array(
                              array(
                                  'taxonomy' => 'projects',
                                  'field'    => 'slug',
                                  'terms'    => $term->slug,
                              ),
                          ),
                      );
                      $query = new WP_Query($args);
                      
                      while ($query->have_posts()) {
                        $query->the_post();
                        get_template_part( 'template-parts/content', 'portfolio', ['term' => $term]);
                      }
                      wp_reset_postdata();
                      // end loop
                    }
                }
            ?>

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <div class="title-shape">
          <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
          </svg>
        </div>
        <p><?php echo get_theme_mod( 'testimonial_section_msg' );?></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="testimonials-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "slidesPerView": 1,
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
              }
            }
          </script>

          <div class="swiper-wrapper">

          <?php 
              $args = array(
                'post_type' => 'testimonial',
              );
              $query = new WP_Query($args);

              while ($query->have_posts()) {
                $query->the_post();
                get_template_part( 'template-parts/content', 'testimonial');
              }
              wp_reset_postdata();
              // end loop
            ?>
          </div>

          <div class="swiper-navigation w-100 d-flex align-items-center justify-content-center">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>

        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Services Section -->
    <section id="services" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <div class="title-shape">
          <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
          </svg>
        </div>
        <p><?php echo get_theme_mod( 'service_section_msg' );?></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">
          <div class="col-lg-12">
            <div class="row g-4">
                <?php
                
                    $args = ['post_type' => 'service'];

                    $query = new WP_Query($args);
                    
                    while ($query->have_posts()) {
                      $query->the_post();
                      get_template_part( 'template-parts/content', 'service');
                    }
                    wp_reset_postdata();
                    // end loop
                ?>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Frequently Asked Questions</h2>
        <div class="title-shape">
          <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
          </svg>
        </div>
        <p><?php echo get_theme_mod( 'faq_section_msg' );?></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

            <div class="faq-container">
              <?php
                $args = ['post_type' => 'faq'];
                $client_query = new WP_Query($args);

                if ($client_query->have_posts()):

                  while ($client_query->have_posts()): $client_query->the_post();
                    get_template_part( 'template-parts/content', 'faq');
                  endwhile;
                  wp_reset_postdata();
                endif;
              ?>
            </div>

          </div><!-- End Faq Column-->

        </div>

      </div>

    </section><!-- /Faq Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5">
          <div class="col-lg-6">
            <div class="content" data-aos="fade-up" data-aos-delay="200">
              <div class="section-category mb-3">Contact</div>
              <h2 class="display-5 mb-4"><?php echo get_theme_mod( 'contact_title' );?></h2>
              <p class="lead mb-4"><?php echo get_theme_mod( 'contact_section_msg' );?></p>

              <div class="contact-info mt-5">
                <div class="info-item d-flex mb-3">
                  <i class="bi bi-envelope-at me-3"></i>
                  <span><?php echo get_theme_mod( 'email' );?></span>
                </div>

                <div class="info-item d-flex mb-3">
                  <i class="bi bi-telephone me-3"></i>
                  <span><?php echo get_theme_mod( 'phone' );?></span>
                </div>

                <div class="info-item d-flex mb-4">
                  <i class="bi bi-geo-alt me-3"></i>
                  <span><?php echo get_theme_mod( 'address' );?></span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="contact-form card" data-aos="fade-up" data-aos-delay="300">
              <div class="card-body p-4 p-lg-5">
                  <?php echo do_shortcode('[contact-form-7 title="Portavue_Contact_Form"]'); ?>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>
  <?php get_footer(); ?>