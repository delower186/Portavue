<div class="progress">
    <?php 
        $percentage = preg_replace('/\D/', '', get_the_content());
    ?>
    <span class="skill"><span><?php echo get_the_title(); ?></span> <i class="val"><?php echo $percentage; ?>%</i></span>
    <div class="progress-bar-wrap">
        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</div><!-- End Skills Item -->
