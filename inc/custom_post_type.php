<?php 

// generate Portfolio post type
function portavue_portfolio_post_type(){   
        
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
        'supports' => array('title','editor','author','thumbnail', 'excerpt'),
    );

    register_post_type( 'portfolio', $args );
    
}

add_action( 'init', 'portavue_portfolio_post_type');

// Generate custom Category (taxonomies)
function portavue_projects_taxonomies(){
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

add_action( 'init', 'portavue_projects_taxonomies' );


// generate Testimonial post type
function portavue_testimonial_post_type(){   
        
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
    );

    register_post_type( 'testimonial', $args );
    
}

add_action( 'init', 'portavue_testimonial_post_type');

function create_client_post_type() {
    register_post_type('client',
        array(
            'labels' => array(
                'name' => __('Client'),
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
add_action('init', 'create_client_post_type');