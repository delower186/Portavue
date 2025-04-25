<?php
/**
 * About meta box Information
 *
 */
function portavue_add_about_meta_box() {

    // Get About page ID by slug
    $about_page = get_page_by_path('about');
    if (!$about_page) return;

    add_meta_box(
        'about_name',                         // ID
        'About Information',               // Title
        'portavue_about_meta_box_callback',     // Callback function
        'page',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

    add_meta_box(
        'about_phone',                         // ID
        '',                             // Title
        'portavue_about_meta_box_callback',     // Callback function
        'page',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

    add_meta_box(
        'about_age',                         // ID
        '',                             // Title
        'portavue_about_meta_box_callback',     // Callback function
        'page',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

    add_meta_box(
        'about_email',                         // ID
        '',                             // Title
        'portavue_about_meta_box_callback',     // Callback function
        'page',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

    add_meta_box(
        'about_occupation',                         // ID
        '',                             // Title
        'portavue_about_meta_box_callback',     // Callback function
        'page',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

    add_meta_box(
        'about_nationality',                         // ID
        '',                             // Title
        'portavue_about_meta_box_callback',     // Callback function
        'page',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

}
add_action('add_meta_boxes', 'portavue_add_about_meta_box');

function portavue_about_meta_box_callback($post) {
    // Add nonce for security
    wp_nonce_field('portavue_about_meta_box_nonce', 'portavue_about_meta_box_nonce_field');

    // Retrieve existing value
    $about_name = get_post_meta($post->ID, '_about_name', true);
    $about_phone = get_post_meta($post->ID, '_about_phone', true);
    $about_age = get_post_meta($post->ID, '_about_age', true);
    $about_email = get_post_meta($post->ID, '_about_email', true);
    $about_occupation = get_post_meta($post->ID, '_about_occupation', true);
    $about_nationality = get_post_meta($post->ID, '_about_nationality', true);


    ?>
    <p>
        <label for="about_name">Name:</label><br>
        <input type="text" name="about_name" id="about_name" value="<?php echo esc_attr($about_name); ?>" style="width:100%;">
    </p>
    <p>
        <label for="about_phone">Phone:</label><br>
        <input type="text" name="about_phone" id="about_phone" value="<?php echo esc_attr($about_phone); ?>" style="width:100%;">
    </p>
    <p>
        <label for="about_age">Age:</label><br>
        <input type="text" name="about_age" id="about_age" value="<?php echo esc_attr($about_age); ?>" style="width:100%;">
    </p>
    <p>
        <label for="about_email">Email:</label><br>
        <input type="text" name="about_email" id="about_email" value="<?php echo esc_attr($about_email); ?>" style="width:100%;">
    </p>
    <p>
        <label for="about_occupation">Occupation:</label><br>
        <input type="text" name="about_occupation" id="about_occupation" value="<?php echo esc_attr($about_occupation); ?>" style="width:100%;">
    </p>
    <p>
        <label for="about_nationality">Nationality:</label><br>
        <input type="text" name="about_nationality" id="about_nationality" value="<?php echo esc_attr($about_nationality); ?>" style="width:100%;">
    </p>
    <?php
}

function portavue_save_about_meta_box($post_id) {
    // Verify nonce
    if (!isset($_POST['portavue_about_meta_box_nonce_field']) ||
        !wp_verify_nonce($_POST['portavue_about_meta_box_nonce_field'], 'portavue_about_meta_box_nonce')) {
        return;
    }

    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Check permissions
    if (!current_user_can('edit_post', $post_id)) return;

    // Save field
    if (isset($_POST['about_name'])) {
        update_post_meta($post_id, '_about_name', sanitize_text_field($_POST['about_name']));
    }
    if (isset($_POST['about_phone'])) {
        update_post_meta($post_id, '_about_phone', sanitize_text_field($_POST['about_phone']));
    }
    if (isset($_POST['about_age'])) {
        update_post_meta($post_id, '_about_age', sanitize_text_field($_POST['about_age']));
    }
    if (isset($_POST['about_email'])) {
        update_post_meta($post_id, '_about_email', sanitize_text_field($_POST['about_email']));
    }
    if (isset($_POST['about_occupation'])) {
        update_post_meta($post_id, '_about_occupation', sanitize_text_field($_POST['about_occupation']));
    }
    if (isset($_POST['about_nationality'])) {
        update_post_meta($post_id, '_about_nationality', sanitize_text_field($_POST['about_nationality']));
    }
}
add_action('save_post', 'portavue_save_about_meta_box');