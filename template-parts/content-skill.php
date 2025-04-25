<div class="progress">
    <span class="skill"><span><?php echo get_the_title(); ?></span> <i class="val"><?php echo preg_replace('/\D/', '', get_the_content()); ?>%</i></span>
    <div class="progress-bar-wrap">
        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo preg_replace('/\D/', '', get_the_content()); ?>" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</div><!-- End Skills Item -->
