<?php
/**
 * Education meta box Information
 *
 */
function portavue_add_education_meta_box() {

    add_meta_box(
        'education_institution',                         // ID
        'Resume Information',               // Title
        'portavue_education_meta_box_callback',     // Callback function
        'education',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

    add_meta_box(
        'education_duration',                         // ID
        '',                             // Title
        'portavue_education_meta_box_callback',     // Callback function
        'education',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

}
add_action('add_meta_boxes', 'portavue_add_education_meta_box');

function portavue_education_meta_box_callback($post) {
    // Add nonce for security
    wp_nonce_field('portavue_education_meta_box_nonce', 'portavue_education_meta_box_nonce_field');

    // Retrieve existing value
    $education_institution = get_post_meta($post->ID, '_education_institution', true);
    $education_duration = get_post_meta($post->ID, '_education_duration', true);


    ?>
    <p>
        <label for="education_institution">Institution:</label><br>
        <input type="text" name="education_institution" id="education_institution" value="<?php echo esc_attr($education_institution); ?>" style="width:100%;">
    </p>
    <p>
        <label for="education_duration">Duration:</label><br>
        <input type="text" name="education_duration" id="education_duration" value="<?php echo esc_attr($education_duration); ?>" style="width:100%;">
    </p>
    <?php
}

function portavue_save_education_meta_box($post_id) {
    // Verify nonce
    if (!isset($_POST['portavue_education_meta_box_nonce_field']) ||
        !wp_verify_nonce($_POST['portavue_education_meta_box_nonce_field'], 'portavue_education_meta_box_nonce')) {
        return;
    }

    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Check permissions
    if (!current_user_can('edit_post', $post_id)) return;

    // Save field
    if (isset($_POST['education_institution'])) {
        update_post_meta($post_id, '_education_institution', sanitize_text_field($_POST['education_institution']));
    }
    if (isset($_POST['education_duration'])) {
        update_post_meta($post_id, '_education_duration', sanitize_text_field($_POST['education_duration']));
    }
}
add_action('save_post', 'portavue_save_education_meta_box');