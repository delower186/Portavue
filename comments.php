<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Portavue
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<section id="blog-comments" class="blog-comments section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="blog-comments-3">
      <div class="section-header">
        <h3>Discussion <span class="comment-count">(<?php echo get_comments_number(); ?>)</span></h3>
      </div>

      <div class="comments-wrapper">
        <?php
          if (have_comments()) :
            wp_list_comments([
              'style'      => 'div',
              'callback'   => 'portavue_custom_comments_callback',
              'avatar_size'=> 80,
              'max_depth'  => 3, // Allow up to 3 levels of replies
            ]);
          else :
            echo '<p>No comments yet. Be the first to share your thoughts!</p>';
          endif;
        ?>

        <?php
          if (get_comment_pages_count() > 1 && get_option('page_comments')) :
        ?>
          <nav class="comment-navigation" role="navigation">
            <div class="nav-previous"><?php previous_comments_link('← Older Comments'); ?></div>
            <div class="nav-next"><?php next_comments_link('Newer Comments →'); ?></div>
          </nav>
        <?php endif; ?>
      </div>
    </div>

  </div>

</section>
<!-- /Blog Comments Section -->

<!-- Blog Comment Form Section -->
<section id="blog-comment-form" class="blog-comment-form section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="section-header">
      <h3>Share Your Thoughts</h3>
      <p>Your email address will not be published. Required fields are marked *</p>
    </div>

    <div class="row gy-3">
      <div class="col-12">
        <?php
          $comment_form_args = [
            'class_form' => '',
            'class_submit' => 'btn-submit',
            'title_reply_before' => '<h3 class="comment-reply-title">',
            'title_reply_after' => '</h3>',
            'comment_notes_before' => '',
            'comment_field' => '
              <div class="form-group">
                <label for="comment">Your Comment *</label>
                <textarea id="comment" name="comment" class="form-control" rows="5" placeholder="Write your thoughts here..." required></textarea>
              </div>',
            'fields' => [
              'author' => '
                <div class="col-md-12 form-group">
                  <label for="author">Full Name *</label>
                  <input id="author" name="author" type="text" class="form-control" placeholder="Enter your full name" required>
                </div>',
              'email'  => '
                <div class="col-md-12 form-group">
                  <label for="email">Email Address *</label>
                  <input id="email" name="email" type="email" class="form-control" placeholder="Enter your email address" required>
                </div>',
              'url'    => '
                <div class="col-12 form-group">
                  <label for="url">Website</label>
                  <input id="url" name="url" type="url" class="form-control" placeholder="Your website (optional)">
                </div>',
            ],
            'submit_field' => '<div class="col-12 text-center">%1$s %2$s</div>',
          ];
          comment_form($comment_form_args);
        ?>
      </div>
    </div>

  </div>

</section>
<!-- /Blog Comment Form Section -->
