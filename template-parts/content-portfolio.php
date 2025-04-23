<div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-<?php echo $args['term']->slug; ?>">
    <div class="portfolio-card">
        <div class="portfolio-image">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid" alt="" loading="lazy">
            <div class="portfolio-overlay">
                <div class="portfolio-actions">
                    <a href="<?php echo get_the_post_thumbnail_url(); ?>" class="glightbox preview-link" data-gallery="portfolio-gallery-web"><i class="bi bi-eye"></i></a>
                    <a href="<?php echo get_the_permalink(); ?>" class="details-link"><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="portfolio-content">
            <span class="category"><?php echo $args['term']->name; ?></span>
            <h3><?php echo get_the_title(); ?></h3>
            <p><?php echo portavue_excerpt_limit(200, get_the_excerpt()); ?></p>
        </div>
    </div>
</div><!-- End Portfolio Item -->