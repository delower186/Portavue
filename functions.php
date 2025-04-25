<?PHP
require_once(get_template_directory() . "/inc/custom_post_type.php");
require_once(get_template_directory() . "/inc/portfolio_custom_meta_box.php");
require_once(get_template_directory() . "/inc/testimonial_custom_meta_box.php");
require_once(get_template_directory() . "/inc/service_custom_meta_box.php");
require_once(get_template_directory() . "/inc/custom_functions.php");
require_once(get_template_directory() . "/inc/theme_customization.php");
require_once(get_template_directory() . "/inc/tgm-plugin-activation.php");
require_once(get_template_directory() . "/inc/contact-form.php");
require_once(get_template_directory() . "/inc/about_custom_meta_box.php");
require_once(get_template_directory() . "/inc/convert_name_to_signature_img.php");
require_once(get_template_directory() . "/inc/experience_custom_meta_box.php");
require_once(get_template_directory() . "/inc/education_custom_meta_box.php");


function portavue_theme_support(){
    // adds dynamic title tag support
    add_theme_support('title-tag');

    // custom logo
    add_theme_support('custom-logo');

    // featured image support to portfolio post type
    add_theme_support( 'post-thumbnails' );
}

add_action( "after_setup_theme", "portavue_theme_support");

function portavue_menus(){

    $locations = [
        'primary'       => "Header Menu",
    ];

    register_nav_menus($locations);

}

add_action( "init", "portavue_menus");

function portavue_register_styles(){

    $version = wp_get_theme()->get('Version');
    
    // Fonts
    wp_enqueue_style( "portavue-fonts", "https://fonts.googleapis.com", array(), "1.0", "all" );
    wp_enqueue_style( "portavue-gstatic", "https://fonts.gstatic.com", array(), "1.0", "all" );
    wp_enqueue_style( "portavue-roboto", "https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Questrial:wght@400&display=swap", array(), "1.0", "all" );
    
    // Vendor CSS Files 
    wp_enqueue_style( "portavue-bootstrap", get_template_directory_uri()."/assets/vendor/bootstrap/css/bootstrap.min.css", array(), "5.3.3", "all" );
    wp_enqueue_style( "portavue-bootstrap-icons", get_template_directory_uri()."/assets/vendor/bootstrap-icons/bootstrap-icons.css", array(), "1.11.3", "all" );
    wp_enqueue_style( "portavue-aos", get_template_directory_uri()."/assets/vendor/aos/aos.css", array(), "1.0", "all" );
    wp_enqueue_style( "portavue-glightbox", get_template_directory_uri()."/assets/vendor/glightbox/css/glightbox.min.css", array(), "1.0", "all" );
    wp_enqueue_style( "portavue-swiper", get_template_directory_uri()."/assets/vendor/swiper/swiper-bundle.min.css", array(), "11.2.6", "all" );

    // Main CSS File
    wp_enqueue_style( "portavue-main", get_template_directory_uri()."/assets/css/main.css", array(), "1.0", "all" );

    // Style
    wp_enqueue_style( "portavue-style", get_template_directory_uri()."/style.css", array(), $version, "all" );
}

add_action( "wp_enqueue_scripts", "portavue_register_styles");


function portavue_register_scripts(){
    // Vendor JS Files
    wp_enqueue_script( "portavue-bootstrap-bundle", get_template_directory_uri()."/assets/vendor/bootstrap/js/bootstrap.bundle.min.js", array(), "5.3.3", "all",true);
    wp_enqueue_script( "portavue-validate", get_template_directory_uri()."/assets/vendor/php-email-form/validate.js", array(), "3.10", "all",true);
    wp_enqueue_script( "portavue-aos", get_template_directory_uri()."/assets/vendor/aos/aos.js", array(), "1.0", "all",true);
    wp_enqueue_script( "portavue-typed", get_template_directory_uri()."/assets/vendor/typed.js/typed.umd.js", array(), "1.0", "all",true);
    wp_enqueue_script( "portavue-waypoints", get_template_directory_uri()."/assets/vendor/waypoints/noframework.waypoints.js", array(), "4.0.1", "all",true);
    wp_enqueue_script( "portavue-glightbox", get_template_directory_uri()."/assets/vendor/glightbox/js/glightbox.min.js", array(), "1.0", "all",true);
    wp_enqueue_script( "portavue-imagesloaded", get_template_directory_uri()."/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js", array(), "5.0.0", "all",true);
    wp_enqueue_script( "portavue-isotope", get_template_directory_uri()."/assets/vendor/isotope-layout/isotope.pkgd.min.js", array(), "3.0.6", "all",true);
    wp_enqueue_script( "portavue-swiper-bundle", get_template_directory_uri()."/assets/vendor/swiper/swiper-bundle.min.js", array(), "11.2.6", "all",true);
    wp_enqueue_script( "portavue-purecounter_vanilla", get_template_directory_uri()."/assets/vendor/purecounter/purecounter_vanilla.js", array(), "1.5.0", "all",true);

    // Main JS File
    wp_enqueue_script( "portavue-main", get_template_directory_uri()."/assets/js/main.js", array(), "1.0", "all",true);
}

add_action( "wp_enqueue_scripts", "portavue_register_scripts");

/**
 * enqueue blog css
 */
function portavue_register_blog_stylesheet() {
    if (is_home() || is_single() || is_archive()) {
        wp_enqueue_style('blog-style', get_template_directory_uri() . '/assets/css/blog.css', [], '1.0');
    }
}
add_action('wp_enqueue_scripts', 'portavue_register_blog_stylesheet');


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
                <p class="description">Enter the user's job title.</p>
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
                <p class="description">Enter the user's Facebook Profile URL.</p>
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
}
