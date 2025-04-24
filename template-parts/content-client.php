<?php 
/***
 * Client Template part
 */
$gallery = get_post_gallery( get_the_ID(), false );
if ( $gallery ) {
    $image_ids = explode( ',', $gallery['ids'] );

    foreach ( $image_ids as $image_id ) {
        $image_url = wp_get_attachment_image_url( $image_id, 'full' );
        echo '<div class="swiper-slide"><img src="' . esc_url( $image_url ) . '" class="img-fluid" alt=""></div>';
    }
}