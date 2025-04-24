<?php 
/***
 * 
*/
function portavue_add_customizer_field( $wp_customize ) {
    /***
     * Section msg field generator
     */
    $sections = ['about','resume', 'portfolio', 'testimonial', 'service', 'faq', 'contact'];

    foreach($sections as $section){
        $wp_customize->add_setting( $section.'_section_msg', array(
            'default' => 'Default Section Msg',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        
        $wp_customize->add_control( $section.'_section_msg_control', array(
        'label' => $section.' Section Message',
        'section' => 'title_tagline', // Or create a new section
        'settings' => $section.'_section_msg',
        'type' => 'text',
        ) );
    }

    /***
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
        'section' => 'title_tagline', // Or create a new section
        'settings' => $field,
        'type' => 'text',
        ) );
    }

  }
add_action( 'customize_register', 'portavue_add_customizer_field' );