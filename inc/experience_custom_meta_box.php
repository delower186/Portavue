<?php
/**
 * Experience meta box Information
 *
 */
function portavue_add_experience_meta_box() {

    add_meta_box(
        'experience_company',                         // ID
        'Resume Information',               // Title
        'portavue_experience_meta_box_callback',     // Callback function
        'experience',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

    add_meta_box(
        'experience_duration',                         // ID
        '',                             // Title
        'portavue_experience_meta_box_callback',     // Callback function
        'experience',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

}
add_action('add_meta_boxes', 'portavue_add_experience_meta_box');

function portavue_experience_meta_box_callback($post) {
    // Add nonce for security
    wp_nonce_field('portavue_experience_meta_box_nonce', 'portavue_experience_meta_box_nonce_field');

    // Retrieve existing value
    $experience_company = get_post_meta($post->ID, '_experience_company', true);
    $experience_duration = get_post_meta($post->ID, '_experience_duration', true);


    ?>
    <p>
        <label for="experience_company">Company:</label><br>
        <input type="text" name="experience_company" id="experience_company" value="<?php echo esc_attr($experience_company); ?>" style="width:100%;">
    </p>
    <p>
        <label for="experience_duration">Duration:</label><br>
        <input type="text" name="experience_duration" id="experience_duration" value="<?php echo esc_attr($experience_duration); ?>" style="width:100%;">
    </p>
    <?php
}

function portavue_save_experience_meta_box($post_id) {
    // Verify nonce
    if (!isset($_POST['portavue_experience_meta_box_nonce_field']) ||
        !wp_verify_nonce($_POST['portavue_experience_meta_box_nonce_field'], 'portavue_experience_meta_box_nonce')) {
        return;
    }

    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Check permissions
    if (!current_user_can('edit_post', $post_id)) return;

    // Save field
    if (isset($_POST['experience_company'])) {
        update_post_meta($post_id, '_experience_company', sanitize_text_field($_POST['experience_company']));
    }
    if (isset($_POST['experience_duration'])) {
        update_post_meta($post_id, '_experience_duration', sanitize_text_field($_POST['experience_duration']));
    }
}
add_action('save_post', 'portavue_save_experience_meta_box');