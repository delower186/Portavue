    <div class="timeline-item" data-aos="fade-up" data-aos-delay="200">
        <div class="timeline-left">
            <?php
                $education_institution = get_post_meta(get_the_ID(), '_education_institution', true);

                if($education_institution){
                    echo '<h4 class="company">'.$education_institution.'</h4>';
                }

                $education_duration = get_post_meta(get_the_ID(), '_education_duration', true);

                if($education_duration){
                    echo '<span class="period">'.$education_duration.'</span>';
                }
            ?>
        </div>
        <div class="timeline-dot"></div>
        <div class="timeline-right">
            <h3 class="position"><?php echo get_the_title(); ?></h3>
            <p class="description"><?php echo get_the_content(); ?></p>
        </div>
    </div>