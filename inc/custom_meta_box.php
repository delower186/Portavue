<?php
/**
 * Add meta box
 *
 * @param post $post The post object
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
 */
function portavue_add_portfolio_meta_box() {
    add_meta_box(
        'client',                         // ID
        'Project Information',               // Title
        'portavue_portfolio_meta_box_callback',     // Callback function
        'portfolio',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

    add_meta_box(
        'date',                         // ID
        '',                             // Title
        'portavue_portfolio_meta_box_callback',     // Callback function
        'portfolio',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

    add_meta_box(
        'url',                         // ID
        '',                             // Title
        'portavue_portfolio_meta_box_callback',     // Callback function
        'portfolio',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );
}
add_action('add_meta_boxes', 'portavue_add_portfolio_meta_box');

function portavue_portfolio_meta_box_callback($post) {
    // Add nonce for security
    wp_nonce_field('portfolio_meta_box_nonce', 'portfolio_meta_box_nonce_field');

    // Retrieve existing value
    $client_name = get_post_meta($post->ID, '_client_name', true);
    $project_date = get_post_meta($post->ID, '_project_date', true);
    $project_url = get_post_meta($post->ID, '_project_url', true);

    ?>
    <p>
        <label for="client_name">Client Name:</label><br>
        <input type="text" name="client_name" id="client_name" value="<?php echo esc_attr($client_name); ?>" style="width:100%;">
    </p>
    <p>
        <label for="project_date">Project Date:</label><br>
        <input type="date" name="project_date" id="project_date" value="<?php echo esc_attr($project_date); ?>" style="width:100%;">
    </p>
    <p>
        <label for="project_url">Project URL:</label><br>
        <input type="text" name="project_url" id="project_url" value="<?php echo esc_attr($project_url); ?>" style="width:100%;">
    </p>
    <?php
}

function portavue_save_portfolio_meta_box($post_id) {
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
    if (isset($_POST['client_name'])) {
        update_post_meta($post_id, '_client_name', sanitize_text_field($_POST['client_name']));
    }
    if (isset($_POST['project_date'])) {
        update_post_meta($post_id, '_project_date', sanitize_text_field($_POST['project_date']));
    }
    if (isset($_POST['project_url'])) {
        update_post_meta($post_id, '_project_url', sanitize_text_field($_POST['project_url']));
    }
}
add_action('save_post', 'portavue_save_portfolio_meta_box');