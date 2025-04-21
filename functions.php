<?PHP 

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