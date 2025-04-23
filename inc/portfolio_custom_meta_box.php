<?php
/**
 * Add meta box Project Information
 *
 */
function portavue_project_add_portfolio_meta_box() {
    add_meta_box(
        'client',                         // ID
        'Project Information',               // Title
        'portavue_project_portfolio_meta_box_callback',     // Callback function
        'portfolio',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

    add_meta_box(
        'date',                         // ID
        '',                             // Title
        'portavue_project_portfolio_meta_box_callback',     // Callback function
        'portfolio',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

    add_meta_box(
        'url',                         // ID
        '',                             // Title
        'portavue_project_portfolio_meta_box_callback',     // Callback function
        'portfolio',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

}
add_action('add_meta_boxes', 'portavue_project_add_portfolio_meta_box');

function portavue_project_portfolio_meta_box_callback($post) {
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

function portavue_save_project_portfolio_meta_box($post_id) {
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
add_action('save_post', 'portavue_save_project_portfolio_meta_box');

/**
 * Add meta box Testimonial Information
 *
 */

 function portavue_testimonial_add_portfolio_meta_box() {
    add_meta_box(
        'person_name',                         // ID
        'Testimonial Information',               // Title
        'portavue_testimonial_portfolio_meta_box_callback',     // Callback function
        'portfolio',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

    add_meta_box(
        'position',                         // ID
        '',                             // Title
        'portavue_testimonial_portfolio_meta_box_callback',     // Callback function
        'portfolio',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

    add_meta_box(
        'message',                         // ID
        '',                             // Title
        'portavue_testimonial_portfolio_meta_box_callback',     // Callback function
        'portfolio',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );

    add_meta_box(
        'person_image',                         // ID
        '',                             // Title
        'portavue_testimonial_portfolio_meta_box_callback',     // Callback function
        'portfolio',                       // Post type
        'normal',                          // Context
        'default'                          // Priority
    );
}
add_action('add_meta_boxes', 'portavue_testimonial_add_portfolio_meta_box');

function portavue_testimonial_portfolio_meta_box_callback($post) {
    // Add nonce for security
    wp_nonce_field('portfolio_meta_box_nonce', 'portfolio_meta_box_nonce_field');

    // Retrieve existing value
    $person_name = get_post_meta($post->ID, '_person_name', true);
    $position = get_post_meta($post->ID, '_position', true);
    $message = get_post_meta($post->ID, '_message', true);

    $client_image_id = get_post_meta($post->ID, '_client_image_id', true);
    $client_image_url = $client_image_id ? wp_get_attachment_image_url($client_image_id, 'thumbnail') : '';

    ?>
    <p>
        <label for="person_name">Person Name:</label><br>
        <input type="text" name="person_name" id="person_name" value="<?php echo esc_attr($person_name); ?>" style="width:100%;">
    </p>
    <p>
        <label for="position">Position:</label><br>
        <input type="text" name="position" id="position" value="<?php echo esc_attr($position); ?>" style="width:100%;">
    </p>
    <p>
        <label for="message">Message:</label><br>
        <input type="text" name="message" id="message" value="<?php echo esc_attr($message); ?>" style="width:100%;">
    </p>
    <div>
        <img id="client-image-preview" src="<?php echo esc_url($client_image_url); ?>" style="max-width: 100%; display: <?php echo $client_image_url ? 'block' : 'none'; ?>;">
        <input type="hidden" name="client_image_id" id="client-image-id" value="<?php echo esc_attr($client_image_id); ?>">
        <button type="button" class="button" id="upload-client-image-button"><?php echo $client_image_url ? 'Change Image' : 'Upload Image'; ?></button>
        <button type="button" class="button-link" id="remove-client-image-button" style="color:red;<?php echo $client_image_url ? '' : ' display:none;'; ?>">Remove</button>
    </div>

    <script>
        jQuery(document).ready(function($){
            var frame;
            $('#upload-client-image-button').on('click', function(e){
                e.preventDefault();
                if (frame) {
                    frame.open();
                    return;
                }
                frame = wp.media({
                    title: 'Select or Upload Client Image',
                    button: { text: 'Use this image' },
                    multiple: false
                });
                frame.on('select', function(){
                    var attachment = frame.state().get('selection').first().toJSON();
                    $('#client-image-id').val(attachment.id);
                    $('#client-image-preview').attr('src', attachment.sizes.thumbnail.url).show();
                    $('#remove-client-image-button').show();
                    $('#upload-client-image-button').text('Change Image');
                });
                frame.open();
            });

            $('#remove-client-image-button').on('click', function(e){
                e.preventDefault();
                $('#client-image-id').val('');
                $('#client-image-preview').hide();
                $(this).hide();
                $('#upload-client-image-button').text('Upload Image');
            });
        });
    </script>

    <?php
}

function portavue_save_testimonial_portfolio_meta_box($post_id) {
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
    if (isset($_POST['person_name'])) {
        update_post_meta($post_id, '_person_name', sanitize_text_field($_POST['person_name']));
    }
    if (isset($_POST['position'])) {
        update_post_meta($post_id, '_position', sanitize_text_field($_POST['position']));
    }
    if (isset($_POST['message'])) {
        update_post_meta($post_id, '_message', sanitize_text_field($_POST['message']));
    }

    if (isset($_POST['client_image_id'])) {
        update_post_meta($post_id, '_client_image_id', intval($_POST['client_image_id']));
    }
}
add_action('save_post', 'portavue_save_testimonial_portfolio_meta_box');