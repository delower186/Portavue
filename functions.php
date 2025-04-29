<?PHP
/**
 * Portavue functions and definitions
 *
 * @package Portavue
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

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
require_once(get_template_directory() . "/inc/add_custom_field_for_user_profile.php");


function portavue_theme_support(){
    // adds dynamic title tag support
    add_theme_support('title-tag');

    // custom logo
    add_theme_support('custom-logo');

    // featured image support to portfolio post type
    add_theme_support( 'post-thumbnails' );
}

add_action( "after_setup_theme", "portavue_theme_support");

function portavue_register_menus() {
  register_nav_menus([
    'front-page-menu' => __("Front Page Menu","portavue"),
    'other-page-menu' => __( 'Other Page Menu', 'portavue' ),
  ]);
}
add_action( 'after_setup_theme', 'portavue_register_menus' );

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
    if (is_home() || is_single() || is_archive() || is_search()) {
        wp_enqueue_style('blog-style', get_template_directory_uri() . '/assets/css/blog.css', [], '1.0');
    }
}
add_action('wp_enqueue_scripts', 'portavue_register_blog_stylesheet');

/***
 * Register widget area
 */
function portavue_widgets_init() {
	
    $widgets = ['blog-sidebar'];

    foreach($widgets as $widget){
        register_sidebar(
            array(
                'name'          => esc_html__( strtoupper($widget), 'portavue' ),
                'id'            => $widget,
                'description'   => esc_html__( 'Add Widgets here.', 'portavue' ),
                'before_widget' => '<div id="%1$s" class="widget-item">',
                'after_widget'  => '</div>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
    }
}
add_action( 'widgets_init', 'portavue_widgets_init' );

/***
 * Custom comment callback
 */
// Enable threaded comments
function enable_threaded_comments() {
    if (!is_admin()) {
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
}
add_action('wp_enqueue_scripts', 'enable_threaded_comments');

// Custom comment callback function
function portavue_custom_comments_callback($comment, $args, $depth) {
    $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
    ?>
    <<?php echo $tag; ?> <?php comment_class('comment-card' . ( $depth > 1 ? ' reply' : '' )); ?> id="comment-<?php comment_ID(); ?>">

      <div class="comment-header">
        <div class="user-info">
          <?php echo get_avatar($comment, $args['avatar_size'], '', '', ['class' => 'author-img rounded-circle', 'loading' => 'lazy']); ?>
          <div class="meta">
            <h4 class="name"><?php echo get_comment_author(); ?></h4>
            <span class="date"><i class="bi bi-calendar3"></i> <?php echo get_comment_date(); ?></span>
          </div>
        </div>
      </div>

      <div class="comment-content">
        <?php if ( '0' == $comment->comment_approved ) : ?>
          <p><em>Your comment is awaiting moderation.</em></p>
        <?php endif; ?>
        <?php comment_text(); ?>
      </div>

      <div class="comment-actions">
        <button class="action-btn like-btn">
          <i class="bi bi-hand-thumbs-up"></i>
          <span>0</span> <!-- You can replace "0" with dynamic likes if you implement it later -->
        </button>
        <?php
          comment_reply_link(array_merge($args, [
            'reply_text' => '<i class="bi bi-reply"></i> Reply',
            'depth' => $depth,
            'max_depth' => $args['max_depth']
          ]));
        ?>
      </div>

      <?php
}
