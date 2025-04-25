    <div class="timeline-item" data-aos="fade-up" data-aos-delay="200">
        <div class="timeline-left">
            <?php
                $experience_company = get_post_meta(get_the_ID(), '_experience_company', true);

                if($experience_company){
                    echo '<h4 class="company">'.$experience_company.'</h4>';
                }

                $experience_duration = get_post_meta(get_the_ID(), '_experience_duration', true);

                if($experience_duration){
                    echo '<span class="period">'.$experience_duration.'</span>';
                }
            ?>
        </div>
        <div class="timeline-dot"></div>
        <div class="timeline-right">
            <h3 class="position"><?php echo get_the_title(); ?></h3>
            <p class="description"><?php echo get_the_content(); ?></p>
        </div>
    </div>