<?php

add_action('customize_register','noshor_customizer');
function noshor_customizer( $wp_customize ) {

//Settings
 $wp_customize->add_setting( 'lang_dir', array(
   'type' => 'theme_mod', // or 'option'
   'capability' => 'edit_theme_options',
   'theme_supports' => '', // Rarely needed.
   'default' => 'rtl',
   'transport' => 'refresh', // or postMessage
   'sanitize_callback' => '',
   'sanitize_js_callback' => '', // Basically to_json.
 ) );

//Controls
 $wp_customize->add_control( 'lang_dir', array(
  'type' => 'radio',
  'priority' => 10, // Within the section.
  'section' => 'noshor_settings', // Required, core or custom.
  'label' => __( 'Language Direction' ),
  'description' => __( 'Define website language direction and theme will follow.' ),
  'choices' => array(
                  'ltr'   => __( 'Left to Right' ),
                  'rtl'  => __( 'Right to Left' )
              )
  )
  //'active_callback' => 'is_front_page',
 );


//Sections
$wp_customize->add_section( 'noshor_settings', array(
  'title' => __( 'Configuration' ),
  'description' => __( 'Configure theme settings here.' ),
  'panel' => '', // Not typically needed.
  'priority' => 20,
  'capability' => 'edit_theme_options',
  'theme_supports' => '', // Rarely needed.
) );

}

?>
