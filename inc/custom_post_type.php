<?php 

// generate Portfolio post type
function portavue_create_portfolio_post_type(){   
        
    $args = array(

        'labels' => array(
            'name'               => 'Portfolios',
            'singular_name'      => 'Portfolio',
            'menu_name'          => 'Portfolios',
            'add_new'            => "Add New Portfolio",
            'add_new_item'       => "Add New Portfolio",
            'new_item'           => "New Portfolio",
            'edit_item'          => "Edit Portfolio",
            'view_item'          => "View Portfolio",
            'all_items'          => "All Portfolios",

        ),

        'public' => true,
        'has_archive' => true, 
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'portfolio'),
        // 'taxonomies' => array( 'projects'),
        'supports' => array('title','editor','author','thumbnail'),
        'menu_icon' => 'dashicons-welcome-view-site',
    );

    register_post_type( 'portfolio', $args );
    
}

add_action( 'init', 'portavue_create_portfolio_post_type');

// Generate custom Category (taxonomies)
function portavue_create_projects_taxonomies(){
    $labels = array(
        'name'              => _x( 'Projects', 'taxonomy general name' ),
        'singular_name'     => _x( 'Project', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Projects' ),
        'all_items'         => __( 'All Projects' ),
        'parent_item'       => __( 'Parent Project' ),
        'parent_item_colon' => __( 'Parent Project:' ),
        'edit_item'         => __( 'Edit Project' ),
        'update_item'       => __( 'Update Project' ),
        'add_new_item'      => __( 'Add New Project' ),
        'new_item_name'     => __( 'New Project Name' ),
        'menu_name'         => __( 'Projects' ),
    );
    $args   = array(
        'hierarchical'      => true, // make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => 'projects' ],
    );
    register_taxonomy( 'projects', [ 'portfolio' ], $args );
}

add_action( 'init', 'portavue_create_projects_taxonomies' );


// generate Testimonial post type
function portavue_create_testimonial_post_type(){   
        
    $args = array(

        'labels' => array(
            'name'               => 'Testimonials',
            'singular_name'      => 'Testimonial',
            'menu_name'          => 'Testimonials',
            'add_new'            => "Add New Testimonial",
            'add_new_item'       => "Add New Testimonial",
            'new_item'           => "New Testimonial",
            'edit_item'          => "Edit Testimonial",
            'view_item'          => "View Testimonial",
            'all_items'          => "All Testimonials",

        ),

        'public' => true,
        'has_archive' => true, 
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'testimonial'),
        // 'taxonomies' => array( 'projects'),
        'supports' => array('title','editor','thumbnail'),
        'menu_icon' => 'dashicons-feedback',
    );

    register_post_type( 'testimonial', $args );
    
}

add_action( 'init', 'portavue_create_testimonial_post_type');
/**
 * Client Post Type
 * @return void
 */
function portavue_create_client_post_type() {
    register_post_type('client',
        array(
            'labels' => array(
                'name' => __('Clients'),
                'singular_name' => __('Client'),
                'add_new' => __('Add Client'),
                'add_new_item' =>  __('Add Client'),
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'rewrite' => array('slug' => 'client'),
            'supports' => array('title','editor'), // No title or editor support
            'menu_icon' => 'dashicons-format-gallery',
        )
    );
}
add_action('init', 'portavue_create_client_post_type');

/****
 * FAQ Post Type
 */
function portavue_create_faq_post_type() {
    register_post_type('faq',
        array(
            'labels' => array(
                'name' => __('FAQs'),
                'singular_name' => __('FAQ'),
                'add_new' => __('Add FAQ'),
                'add_new_item' =>  __('Add FAQ'),
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'rewrite' => array('slug' => 'faq'),
            'supports' => array('title','editor'), // No title, editor support
            'menu_icon' => 'dashicons-editor-help',
        )
    );
}
add_action('init', 'portavue_create_faq_post_type');

/****
 * Service Post Type
 */
function portavue_create_service_post_type() {
    register_post_type('service',
        array(
            'labels' => array(
                'name' => __('Services'),
                'singular_name' => __('Service'),
                'add_new' => __('Add Service'),
                'add_new_item' =>  __('Add Service'),
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'rewrite' => array('slug' => 'service'),
            'supports' => array('title','editor'), // title, editor support
            'menu_icon' => 'dashicons-products',
        )
    );
}
add_action('init', 'portavue_create_service_post_type');

/**
 * Custom taxonomy Features  like tag
 */

 function portavue_create_custom_taxonomy_feature() {
    register_taxonomy(
        'feature', // Taxonomy slug
        'service',  // Post type this taxonomy is assigned to
        array(
            'labels' => array(
                'name'              => 'Features',
                'singular_name'     => 'Feature',
                'search_items'      => 'Search Features',
                'all_items'         => 'All Features',
                'edit_item'         => 'Edit Feature',
                'update_item'       => 'Update Feature',
                'add_new_item'      => 'Add New Feature',
                'new_item_name'     => 'New Feature Name',
                'menu_name'         => 'Features',
            ),
            'hierarchical' => false, // false makes it like tags; true makes it like categories
            'show_ui'      => true,
            'show_in_rest' => true, // For Gutenberg support
            'rewrite'      => array('slug' => 'feature'),
        )
    );
}
add_action('init', 'portavue_create_custom_taxonomy_feature');

/****
 * Skill Post Type
 */
function portavue_create_skill_post_type() {
    register_post_type('skill',
        array(
            'labels' => array(
                'name' => __('Skills'),
                'singular_name' => __('Skill'),
                'add_new' => __('Add Skill'),
                'add_new_item' =>  __('Add Skill'),
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'rewrite' => array('slug' => 'skill'),
            'supports' => array('title','editor'), // No title, editor support
            'menu_icon' => 'dashicons-awards',
        )
    );
}
add_action('init', 'portavue_create_skill_post_type');

/****
 * Experience Post Type
 */
function portavue_create_experience_post_type() {
    register_post_type('experience',
        array(
            'labels' => array(
                'name' => __('Experiences'),
                'singular_name' => __('Experience'),
                'add_new' => __('Add Experience'),
                'add_new_item' =>  __('Add Experience'),
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'rewrite' => array('slug' => 'experience'),
            'supports' => array('title','editor'), // No title, editor support
            'menu_icon' => 'dashicons-flag',
        )
    );
}
add_action('init', 'portavue_create_experience_post_type');

/****
 * Education Post Type
 */
function portavue_create_education_post_type() {
    register_post_type('education',
        array(
            'labels' => array(
                'name' => __('Educations'),
                'singular_name' => __('Education'),
                'add_new' => __('Add Education'),
                'add_new_item' =>  __('Add Education'),
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'rewrite' => array('slug' => 'education'),
            'supports' => array('title','editor'), // No title, editor support
            'menu_icon' => 'dashicons-welcome-learn-more',
        )
    );
}
add_action('init', 'portavue_create_education_post_type');