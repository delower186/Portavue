<?php
/***
*
* Excertp Limit
*/
function portavue_excerpt_limit($limit, $contents){
    $excerpt = strip_tags($contents);
    if (strlen($excerpt) > $limit) {
        $excerpt = substr($excerpt, 0, $limit) . '...';
    }
    return $excerpt;
}

/***
 * Star Rating Generator
 */
function portavue_star_rating($rating){
    // $rating = 4.5;

    $full_stars  = floor($rating);
    $half_star   = ($rating - $full_stars) >= 0.5 ? 1 : 0;
    $empty_stars = 5 - $full_stars - $half_star;
    
    echo '<div class="text-warning fs-2 text-center">';
    
    for ($i = 0; $i < $full_stars; $i++) {
        echo '<i class="bi bi-star-fill"></i>';
    }
    
    if ($half_star) {
        echo '<i class="bi bi-star-half"></i>';
    }
    
    for ($i = 0; $i < $empty_stars; $i++) {
        echo '<i class="bi bi-star"></i>';
    }
    
    echo '</div>';
}