<?php 
/**
 * The template for static fields in the front-page
 * @package Portavue
*/
function portavue_add_customizer_field( $wp_customize ) {

    // Add a section
    $wp_customize->add_section( 'portavue_customization_section', array(
        'title'    => __( 'HomePage Customizer', 'portavue' ),
        'priority' => 30,
    ) );

    /**
     * Section msg field generator
     */
    $sections = ['about','resume','experience','education', 'portfolio', 'testimonial', 'service', 'faq', 'contact'];

    foreach($sections as $section){
        $wp_customize->add_setting( $section.'_section_msg', array(
            'default' => 'Default Section Msg',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        
        $wp_customize->add_control( $section.'_section_msg_control', array(
        'label' => $section.' Section Message',
        'section' => 'portavue_customization_section', // Or create a new section
        'settings' => $section.'_section_msg',
        'type' => 'text',
        ) );
    }

    /**
     * single field generator
     */

     $fields = ['hero_name','hero_text','hero_experiences','hero_projects','hero_clients','contact_title', 'email', 'phone', 'address'];

     foreach($fields as $field){
        $wp_customize->add_setting( $field, array(
            'default' => 'Default '.$field,
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        
        $wp_customize->add_control( $field.'_control', array(
        'label' => $field,
        'section' => 'portavue_customization_section', // Or create a new section
        'settings' => $field,
        'type' => 'text',
        ) );
    }

    /**
     * Upload Hero Image
     */

    // Add setting
    $wp_customize->add_setting( 'portavue_hero_image_setting', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    // Add control
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'portavue_image_control', array(
        'label'    => __( 'Upload Hero Image', 'portavue' ),
        'section'  => 'portavue_customization_section',
        'settings' => 'portavue_hero_image_setting',
    ) ) );

  }
add_action( 'customize_register', 'portavue_add_customizer_field' );