<?php
/**
 * Add meta box Testimonial Information
 *
 */

 function portavue_testimonial_add_meta_box() {
    add_meta_box(
        'testimonial_person_name',                         // ID
        'Testimonial Information',               // Title
        'portavue_testimonial_meta_box_callback',     // Callback function
        'testimonial',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

    add_meta_box(
        'testimonial_position',                         // ID
        '',                             // Title
        'portavue_testimonial_meta_box_callback',     // Callback function
        'testimonial',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

    add_meta_box(
        'testimonial_rating',                         // ID
        '',                             // Title
        'portavue_testimonial_meta_box_callback',     // Callback function
        'testimonial',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );
}
add_action('add_meta_boxes', 'portavue_testimonial_add_meta_box');

function portavue_testimonial_meta_box_callback($post) {
    // Add nonce for security
    wp_nonce_field('portfolio_meta_box_nonce', 'portfolio_meta_box_nonce_field');

    // Retrieve existing value
    $testimonial_person_name = get_post_meta($post->ID, '_testimonial_person_name', true);
    $testimonial_position = get_post_meta($post->ID, '_testimonial_position', true);
    $testimonial_rating = get_post_meta($post->ID, '_testimonial_rating', true);

    ?>
    <p>
        <label for="testimonial_person_name">Person Name:</label><br>
        <input type="text" name="testimonial_person_name" id="testimonial_person_name" value="<?php echo esc_attr($testimonial_person_name); ?>" style="width:100%;">
    </p>
    <p>
        <label for="testimonial_position">Position:</label><br>
        <input type="text" name="testimonial_position" id="testimonial_position" value="<?php echo esc_attr($testimonial_position); ?>" style="width:100%;">
    </p>
    <p>
        <label for="testimonial_rating">Rating:</label><br>
        <input type="number" name="testimonial_rating" id="testimonial_rating" value="<?php echo esc_attr($testimonial_rating); ?>" style="width:100%;">
    </p>
    <?php
}

function portavue_save_testimonial_meta_box($post_id) {
    // Verify nonce
    if (!isset($_POST['portfolio_meta_box_nonce_field']) ||
        !wp_verify_nonce($_POST['portfolio_meta_box_nonce_field'], 'portfolio_meta_box_nonce')) {
        return;
    }

    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Check permissions
    if (!current_user_can('edit_post', $post_id)) return;

    // Save field
    if (isset($_POST['testimonial_person_name'])) {
        update_post_meta($post_id, '_testimonial_person_name', sanitize_text_field($_POST['testimonial_person_name']));
    }
    if (isset($_POST['testimonial_position'])) {
        update_post_meta($post_id, '_testimonial_position', sanitize_text_field($_POST['testimonial_position']));
    }

    if (isset($_POST['testimonial_rating'])) {
        update_post_meta($post_id, '_testimonial_rating', sanitize_text_field($_POST['testimonial_rating']));
    }

}
add_action('save_post', 'portavue_save_testimonial_meta_box');