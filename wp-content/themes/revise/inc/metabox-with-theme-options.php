<?php if ( ! defined( 'ABSPATH' ) ) { die; } 

function revise_metabox_options( $options ) {

  $options      = array(); 

 // -----------------------------------------
// Page Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => 'revise_page_option',
  'title'     => esc_html__( 'Page Breadcum Options', 'revise' ),
  'post_type' => 'page',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'  => 'revise_page_content',     

      'fields' => array(
         array(
          'id'    => 'enable_breadcum',
          'type'  => 'switcher',
          'title' => esc_html__('Enable Breadcum', 'revise'),
          'default' => false,
          'desc' => esc_html__('Enable Custom Breadcum Area', 'revise'),
        ),      
        array(
          'id'    => 'custom_page_title',
          'type'  => 'text',
          'title' => esc_html__('Custom Title','revise'),        
          'desc' =>  esc_html__('Type your Custom Title : Exam: Service Content','revise'),
          'dependency'   => array( 'enable_breadcum', '==', 'true' ),
        ),      

        array(
          'id'    => 'bradcum_overlay_color',
          'type'  => 'color_picker',
          'title' => esc_html__('Breadcum baackground color','revise'),
             'default' => '#0E3E68',          
          'desc' =>  esc_html__('Select Breadcum baackground color','revise'),
           'dependency'   => array( 'enable_breadcum', '==', 'true' ),
        )

      ), 
    ), 
  ),

);

 // -----------------------------------------
// Page Metabox Options                    -
// -----------------------------------------


  return $options;

}
add_filter( 'cs_metabox_options', 'revise_metabox_options' );



// Framework Options

function revise_framework_options( $options ) {

  $options      = array(); 
    
   

    $options[]   = array(
      'name'     => 'revise_logo_options',
      'title'    => esc_html__( 'Logo Setting', 'revise' ),
      'icon'     => 'fa fa-camera',
      'fields'      => array(

          // begin: a field
          array(
            'id'      => 'enable_logo',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Enable Site Logo', 'revise' ),
            'desc'   => esc_html__( 'Do you want Enable Site Logo? If you want yes ? Just Enable the Switcher', 'revise' ),
            'default'    => false,
          ),

          array(
            'id'      => 'upload_logo',
            'type'    => 'image',
            'title'   => esc_html__( 'Uplaod Logo', 'revise' ),
            'desc'   => esc_html__( 'Do you want to Uplaod Logo? If you want Just Enable the Switcher', 'revise' ),
            'help'   => esc_html__( 'Make sure your image size is : 120 By 62 px', 'revise' ),
            'dependency'   => array( 'enable_logo', '==', 'true' ),
          ),

          array(
            'id'      => 'text_logo',
            'type'    => 'text',
            'title'   => esc_html__( 'Text Logo', 'revise' ),
            'desc'   => esc_html__( 'Type Text Logo', 'revise' ),
            'default'    => esc_html__( 'revise', 'revise' ),
            'dependency'   => array( 'enable_logo', '==', 'false' ),
          ),
          

        ), // end: fields
    );

 

    $options[]   = array(
      'name'     => 'revise_social_link_options',
      'title'    => esc_html__( 'Social Link Setting', 'revise' ),
      'icon'     => 'fa fa-signal',
      'fields'      => array(

          // begin: a field
          array(
            'id'              => 'social_link',
            'type'            => 'group',
            'title'           => esc_html__( 'Social link', 'revise' ),
            'button_title'    => 'Add New',
            'accordion_title' => esc_html__( 'Add New Social link', 'revise'),
            'fields'          => array(

              array(
                'id'      => 'social_link_icon',
                'type'    => 'icon',
                'title'   => esc_html__( 'Social link Icon', 'revise' ),
                'desc'   => esc_html__( 'Select Social link Icon', 'revise' ),
                'default'    => esc_attr__( 'fa fa-facebook', 'revise' ),
              ),
              array(
                'id'      => 'social_link',
                'type'    => 'text',
                'title'   => esc_html__( 'Social link', 'revise' ),
                'desc'   => esc_html__( 'Type Social link', 'revise' ),
                'default'    => esc_html__( 'http://facebook.com/', 'revise' ),
              ),              
                           
             
            )
          ),
          

        ), // end: fields
    );

  
    

    $options[]   = array(
      'name'     => 'revise_footer_options',
      'title'    => esc_html__( 'Footer setting', 'revise' ),
      'icon'     => 'fa fa-flag',
      'fields'      => array(

          // begin: a field
          
         
          array(
            'id'      => 'footer_copyright_text',
            'type'    => 'textarea',
            'sanitize'    => false,
            'title'   => esc_html__( 'Footer Copyright text', 'revise' ),
            'desc'   => esc_html__( 'Type Footer Copyright text', 'revise' ),
            'default'    => esc_html__( '© Copyright 2020 REVISE Company - All Rights Reserved', 'revise' ),
          ),


          // begin: a field
          array(
            'id'              => 'footer_contact_info',
            'type'            => 'group',
            'title'           => esc_html__( 'Footer contact info', 'revise' ),
            'button_title'    => 'Add New',
            'accordion_title' => esc_html__( 'Add New Footer contact info', 'revise'),
            'fields'          => array(

              array(
                'id'      => 'info_icon',
                'type'    => 'icon',
                'title'   => esc_html__( 'Select icon', 'revise' ),
                'desc'   => esc_html__( 'Type linkType link', 'revise' ),
                'default'    => esc_attr__( 'fas fa-phone', 'revise' ),
              ),
              array(
                'id'      => 'info_link',
                'type'    => 'text',
                'title'   => esc_html__( 'Type link', 'revise' ),
                'desc'   => esc_html__( 'Type linkType link', 'revise' ),
                'default'    => esc_attr__( 'tel:1-888-286-8122', 'revise' ),
              ),
              array(
                'id'      => 'link_text',
                'type'    => 'text',
                'title'   => esc_html__( 'Info text', 'revise' ),
                'desc'   => esc_html__( 'Type Info text', 'revise' ),
                'default'    => esc_html__( '1-888-286-8122', 'revise' ),
              ),              
                           
             
            )
          ),

        ), // end: fields
    );
  

  

  return $options;

}
add_filter( 'cs_framework_options', 'revise_framework_options' );


// Framework Setting

function revise_framework_settings( $settings ) {

  $settings      = array(); 

  $settings           = array(
    'menu_title'      => esc_html__( 'Theme Options', 'revise'),
    'menu_type'       => 'theme', // menu, submenu, options, theme, etc.
    'menu_slug'       => 'revise-theme-option',
    'ajax_save'       => true,
    'show_reset_all'  => true,
    'framework_title' => esc_html__( 'Revise Theme Options by templateacademy', 'revise'),
  );
  return $settings;

}
add_filter( 'cs_framework_settings', 'revise_framework_settings' );




// Shortcode Setting
function revise_shortcode_options( $options ) {

  $options      = array(); 

  return $options;

}
add_filter( 'cs_shortcode_options', 'revise_shortcode_options' );

// Customize Setting
function revise_customize_options( $options ) {

  $options      = array(); 

  return $options;

}
add_filter( 'cs_customize_options', 'revise_customize_options' );


