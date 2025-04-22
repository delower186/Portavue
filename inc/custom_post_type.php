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
        'taxonomies' => array( 'projects'),
        'supports' => array('title','editor','author','thumbnail', 'excerpt', 'custom-fields'),
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