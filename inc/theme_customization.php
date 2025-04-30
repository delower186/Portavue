<?php 
/**
 * The template for static fields in the front-page
 * @package Portavue
*/
function portavue_homepage_customizer_register( $wp_customize ) {

    // Add a section
    $wp_customize->add_section( 'portavue_homepage_customization_section', array(
        'title'    => __( 'HomePage', 'portavue' ),
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
        'section' => 'portavue_homepage_customization_section', // Or create a new section
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
        'section' => 'portavue_homepage_customization_section', // Or create a new section
        'settings' => $field,
        'type' => 'text',
        ) );
    }

    /**
     * Upload Hero Image
     */

    // Add setting
    $wp_customize->add_setting( 'portavue_hero_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    // Add control
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'portavue_image_control', array(
        'label'    => __( 'Upload Hero Image', 'portavue' ),
        'section'  => 'portavue_homepage_customization_section',
        'settings' => 'portavue_hero_image',
    ) ) );

  }
add_action( 'customize_register', 'portavue_homepage_customizer_register' );

/**
 * Summary of portavue_social_media_register
 * @param mixed $wp_customize
 * @return void
 */

function portavue_social_media_register( $wp_customize ) {
    // Add a section
    $wp_customize->add_section( 'portavue_social_section', array(
        'title'    => __( 'Footer Social Links', 'portavue' ),
        'priority' => 31,
    ) );

    /**
     * Social link field generator
     */

     $links = ['facebook','linkedin','github','instagram','x'];

     foreach($links as $link){
        $wp_customize->add_setting( $link, array(
            'default' => '#',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        
        $wp_customize->add_control( $link.'_control', array(
        'label' => $link,
        'section' => 'portavue_social_section', // Or create a new section
        'settings' => $link,
        'type' => 'text',
        ) );
    }

}
add_action( 'customize_register', 'portavue_social_media_register' );

/**
 * Summary of portavue_payment_method_register
 * @param mixed $wp_customize
 * @return void
 */
function portavue_payment_method_register( $wp_customize ) {
    // Add a section
    $wp_customize->add_section( 'portavue_payment_method_section', array(
        'title'    => __( 'Payment Methods Image', 'portavue' ),
        'priority' => 30,
    ) );

    // Add setting
    $wp_customize->add_setting( 'portavue_payment_method', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    // Add control
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'portavue_image_control', array(
        'label'    => __( 'Upload Image', 'portavue' ),
        'section'  => 'portavue_payment_method_section',
        'settings' => 'portavue_payment_method',
    ) ) );
}
add_action( 'customize_register', 'portavue_payment_method_register' );

