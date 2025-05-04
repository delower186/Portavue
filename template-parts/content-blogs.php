<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Portavue
 */

?>
<div class="col-lg-4">
    <article>

        <div class="post-img">
            <img src="<?php echo get_the_post_thumbnail_url();?>" alt="" class="img-fluid">
        </div>

        <p class="post-category">
            <?php
                $categories = get_the_category();

                if ( ! empty( $categories ) ) {
                    foreach ( $categories as $cat ) {
                        echo $cat->name;
                    }
                } 
            ?>
        </p>

        <h2 class="title">
            <a href="<?php echo esc_url( get_permalink()); ?>"><?php echo the_title(); ?></a>
        </h2>

        <div class="d-flex align-items-center">
            <?php 
                $avatar_url = get_avatar_url( get_the_author_meta('ID'), ['size' => 96] );
                echo '<img src="' . esc_url($avatar_url) . '" alt="' . esc_attr(get_the_author()) . '" class="img-fluid post-author-img flex-shrink-0">';
            ?>
            <div class="post-meta">
                <p class="post-author"><?php echo esc_attr(get_the_author()); ?></p>
                <p class="post-date">
                    <time datetime="2022-01-01"><?php echo get_the_date('M j, Y'); ?></time>
                </p>
            </div>
        </div>

    </article>
</div><!-- End post list item -->