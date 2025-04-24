<?php
// Get current post ID and its feature terms
$current_post_id = get_the_ID();
$terms = wp_get_post_terms($current_post_id, 'feature');

if ( $terms && ! is_wp_error($terms) ) {
    $term_ids = wp_list_pluck($terms, 'term_id');

    // Query related services
    $related_services = new WP_Query(array(
        'post_type'      => 'service',
        'posts_per_page' => 3,
        'post__not_in'   => array($current_post_id),
        'tax_query'      => array(
            array(
                'taxonomy' => 'feature',
                'field'    => 'term_id',
                'terms'    => $term_ids,
            ),
        ),
    ));

    if ( $related_services->have_posts() ) {

        while ( $related_services->have_posts() ) {
            $related_services->the_post();
            $service_icon_class = get_post_meta(get_the_ID(), '_service_icon_class', true);

            echo '<div class="service-item">
                    <i class="bi '.$service_icon_class.'"></i>
                    <h5><a href="'.get_the_permalink().'">'.get_the_title().'</a></h5>
                    <p>'.portavue_excerpt_limit(100, get_the_excerpt()).'</p>
                </div>';
        }

        wp_reset_postdata();
    }
}
?>