<?php
/**
 * Add meta box Service Information
 *
 */

 function portavue_service_add_meta_box() {
    add_meta_box(
        'project_duration',                         // ID
        'Service Information',               // Title
        'portavue_service_meta_box_callback',     // Callback function
        'service',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

    add_meta_box(
        'project_manager',                         // ID
        '',                             // Title
        'portavue_service_meta_box_callback',     // Callback function
        'service',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

    add_meta_box(
        'contact_support',                         // ID
        '',                             // Title
        'portavue_service_meta_box_callback',     // Callback function
        'service',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

    add_meta_box(
        'service_icon_class',                         // ID
        '',                             // Title
        'portavue_service_meta_box_callback',     // Callback function
        'service',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );
}
add_action('add_meta_boxes', 'portavue_service_add_meta_box');

function portavue_service_meta_box_callback($post) {
    // Add nonce for security
    wp_nonce_field('service_meta_box_nonce', 'service_meta_box_nonce_field');

    // Retrieve existing value
    $project_duration = get_post_meta($post->ID, '_project_duration', true);
    $project_manager = get_post_meta($post->ID, '_project_manager', true);
    $contact_support = get_post_meta($post->ID, '_contact_support', true);
    $service_icon_class = get_post_meta($post->ID, '_service_icon_class', true);

    ?>
    <p>
        <label for="project_duration">Project Duration:</label><br>
        <input type="text" name="project_duration" id="project_duration" value="<?php echo esc_attr($project_duration); ?>" style="width:100%;">
    </p>
    <p>
        <label for="project_manager">Project Manager:</label><br>
        <input type="text" name="project_manager" id="project_manager" value="<?php echo esc_attr($project_manager); ?>" style="width:100%;">
    </p>
    <p>
        <label for="contact_support">Contact Support:</label><br>
        <input type="text" name="contact_support" id="contact_support" value="<?php echo esc_attr($contact_support); ?>" style="width:100%;">
    </p>
    <p>
        <label for="service_icon_class">Service Icon Class:</label><br>
        <input type="text" name="service_icon_class" id="service_icon_class" value="<?php echo esc_attr($service_icon_class); ?>" style="width:100%;">
    </p>
    <?php
}

function portavue_save_service_meta_box($post_id) {
    // Verify nonce
    if (!isset($_POST['service_meta_box_nonce_field']) ||
        !wp_verify_nonce($_POST['service_meta_box_nonce_field'], 'service_meta_box_nonce')) {
        return;
    }

    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Check permissions
    if (!current_user_can('edit_post', $post_id)) return;

    // Save field
    if (isset($_POST['project_duration'])) {
        update_post_meta($post_id, '_project_duration', sanitize_text_field($_POST['project_duration']));
    }
    if (isset($_POST['project_manager'])) {
        update_post_meta($post_id, '_project_manager', sanitize_text_field($_POST['project_manager']));
    }

    if (isset($_POST['contact_support'])) {
        update_post_meta($post_id, '_contact_support', sanitize_text_field($_POST['contact_support']));
    }

    if (isset($_POST['service_icon_class'])) {
        update_post_meta($post_id, '_service_icon_class', sanitize_text_field($_POST['service_icon_class']));
    }

}
add_action('save_post', 'portavue_save_service_meta_box');