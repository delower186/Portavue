<?php

/***
 * Add custom field to user profile page
 */

function portavue_add_custom_user_field($user) {
    ?>
    <h3>Extra Info</h3>
    <table class="form-table">
        <tr>
            <th><label for="job_title">Job Title</label></th>
            <td>
                <input type="text" name="job_title" id="job_title"
                       value="<?php echo esc_attr(get_the_author_meta('job_title', $user->ID)); ?>"
                       class="regular-text" />
                <p class="description">Enter the your job title.</p>
            </td>
        </tr>
    </table>
    <table class="form-table">
        <tr>
            <th><label for="facebook_profile_url">Facebook Profile URL</label></th>
            <td>
                <input type="text" name="facebook_profile_url" id="facebook_profile_url"
                       value="<?php echo esc_attr(get_the_author_meta('facebook_profile_url', $user->ID)); ?>"
                       class="regular-text" />
                <p class="description">Enter the your Facebook Profile URL.</p>
            </td>
        </tr>
    </table>
    <table class="form-table">
        <tr>
            <th><label for="instagram_profile_url">Instagram Profile URL</label></th>
            <td>
                <input type="text" name="instagram_profile_url" id="instagram_profile_url"
                       value="<?php echo esc_attr(get_the_author_meta('instagram_profile_url', $user->ID)); ?>"
                       class="regular-text" />
                <p class="description">Enter the your Instagram Profile URL.</p>
            </td>
        </tr>
    </table>
    <table class="form-table">
        <tr>
            <th><label for="linkedin_profile_url">Linkedin Profile URL</label></th>
            <td>
                <input type="text" name="linkedin_profile_url" id="linkedin_profile_url"
                       value="<?php echo esc_attr(get_the_author_meta('linkedin_profile_url', $user->ID)); ?>"
                       class="regular-text" />
                <p class="description">Enter the your Linkedin Profile URL.</p>
            </td>
        </tr>
    </table>
    <table class="form-table">
        <tr>
            <th><label for="x_profile_url">X Profile URL</label></th>
            <td>
                <input type="text" name="x_profile_url" id="x_profile_url"
                       value="<?php echo esc_attr(get_the_author_meta('x_profile_url', $user->ID)); ?>"
                       class="regular-text" />
                <p class="description">Enter the your X Profile URL.</p>
            </td>
        </tr>
    </table>
    <table class="form-table">
        <tr>
            <th><label for="github_profile_url">Github Profile URL</label></th>
            <td>
                <input type="text" name="github_profile_url" id="github_profile_url"
                       value="<?php echo esc_attr(get_the_author_meta('github_profile_url', $user->ID)); ?>"
                       class="regular-text" />
                <p class="description">Enter the your Github Profile URL.</p>
            </td>
        </tr>
    </table>
    <?php
}

add_action('show_user_profile', 'portavue_add_custom_user_field');
add_action('edit_user_profile', 'portavue_add_custom_user_field');

/***
 * Save custom field when profile is updated
 */
add_action('personal_options_update', 'portavue_save_custom_user_field');
add_action('edit_user_profile_update', 'portavue_save_custom_user_field');

function portavue_save_custom_user_field($user_id) {
    if (!current_user_can('edit_user', $user_id)) return false;

    update_user_meta($user_id, 'job_title', sanitize_text_field($_POST['job_title']));
    update_user_meta($user_id, 'facebook_profile_url', sanitize_text_field($_POST['facebook_profile_url']));
    update_user_meta($user_id, 'instagram_profile_url', sanitize_text_field($_POST['instagram_profile_url']));
    update_user_meta($user_id, 'linkedin_profile_url', sanitize_text_field($_POST['linkedin_profile_url']));
    update_user_meta($user_id, 'x_profile_url', sanitize_text_field($_POST['x_profile_url']));
    update_user_meta($user_id, 'github_profile_url', sanitize_text_field($_POST['github_profile_url']));
}

?>
