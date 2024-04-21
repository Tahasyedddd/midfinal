<?php
/**
 * Add custom settings and controls to the WordPress Customizer
 */


//---------------------Code to add the Upgrade to Pro button in the Customizer----------

function everafter_wedding_customize_register_btn( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    
    get_template_part('inc/customizer-button/sanitize');
    get_template_part('inc/customizer-button/upsell-section');

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'everafter_wedding_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'everafter_wedding_customize_partial_blogdescription',
        ) );
    }

    $wp_customize->register_section_type( 'everafter_wedding_Customize_Upsell_Section' );

    // Register section.
    $wp_customize->add_section(
        new everafter_wedding_Customize_Upsell_Section(
            $wp_customize,
            'theme_upsell',
            array(
                'title'    => esc_html__( 'Wedding Pro', 'everafter-wedding' ),
                'pro_text' => esc_html__( 'Upgrade To Pro', 'everafter-wedding' ),
                'pro_url'  => 'https://cawpthemes.com/everafter-wedding-premium-wordpress-theme/',
                'priority' => 1,
            )
        )
    );
}
add_action( 'customize_register', 'everafter_wedding_customize_register_btn' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function everafter_wedding_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function everafter_wedding_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function everafter_wedding_customize_preview_js() {
    wp_enqueue_script( 'everafter-wedding-customizer', get_template_directory_uri() . '/inc/customizer-button/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'everafter_wedding_customize_preview_js' );

/**
 * Customizer control scripts and styles.
 *
 * @since 1.0.0
 */
function everafter_wedding_customizer_control_scripts() {

    wp_enqueue_style( 'everafter-wedding-customize-controls', get_template_directory_uri() . '/inc/customizer-button/customize-controls.css', '', '1.0.0' );

    wp_enqueue_script( 'everafter-wedding-customize-controls', get_template_directory_uri() . '/inc/customizer-button/customize-controls.js', array( 'customize-controls' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'everafter_wedding_customizer_control_scripts', 0 );


//---------------------Code to add the Upgrade to Pro button in the Customizer End----------


//------------------Theme Information--------------------


function everafter_wedding_customize_register( $wp_customize ) {


      // Add a custom setting for the Site Identity color
  $wp_customize->add_setting( 'everafter_wedding_site_identity_color', array(
    'default' => '#8d9b7d',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  // Add a custom control for the primary color
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'everafter_wedding_site_identity_color', array(
    'label' => __( 'Site Identity Color', 'everafter-wedding' ),
    'section' => 'title_tagline',
    'settings' => 'everafter_wedding_site_identity_color',
  ) ) );


  // Add a custom setting for the Site Identity color
  $wp_customize->add_setting( 'everafter_wedding_site_identity_tagline_color', array(
    'default' => '#000',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  // Add a custom control for the primary color
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'everafter_wedding_site_identity_tagline_color', array(
    'label' => __( 'Tagline Color', 'everafter-wedding' ),
    'section' => 'title_tagline',
    'settings' => 'everafter_wedding_site_identity_tagline_color',
  ) ) );

//------------------Site Identity Ends---------------------

  
  // Add a custom setting for the primary color
  $wp_customize->add_setting( 'everafter_wedding_primary_color', array(
    'default' => '#0073aa',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  // Add a custom control for the primary color
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'everafter_wedding_primary_color', array(
    'label' => __( 'Primary Color', 'everafter-wedding' ),
    'section' => 'colors',
    'settings' => 'everafter_wedding_primary_color',
  ) ) );

  //-----------------------------------Home Front Page-------------------------------

  $wp_customize->add_panel( 'everafter_wedding_panel', array(
    'title'    => __( 'Front Page Settings', 'everafter-wedding' ),
    'priority' => 100,
  ) );


  //-------------------------------------Banner Image Section--------------

      $wp_customize->add_section( 'everafter_wedding_section_banner', array(
        'title'    => __( 'Home First Section', 'everafter-wedding' ),
        'priority' => 8,
        'panel'    => 'everafter_wedding_panel',
    ) );


  //-----------------Enable Option banner-------------

  $wp_customize->add_setting('everafter_wedding_section_banner',array(
      'default' => 'Enable',
      'sanitize_callback' => 'everafter_wedding_sanitize_choices'
  ));
  $wp_customize->add_control('everafter_wedding_section_banner',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'everafter-wedding'),
        'section' => 'everafter_wedding_section_banner',
        'choices' => array(
            'Enable' => __('Enable', 'everafter-wedding'),
            'Disable' => __('Disable', 'everafter-wedding')
  )));

  $wp_customize->add_setting('everafter_wedding_section_bannerimage_section',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'everafter_wedding_section_bannerimage_section',array(
    'label' => __('Section Background Image','everafter-wedding'),
    'description' => __('Dimention 1600 * 800','everafter-wedding'),
    'section' => 'everafter_wedding_section_banner',
    'settings' => 'everafter_wedding_section_bannerimage_section'
  )));

    $wp_customize->add_setting('everafter_wedding_section_bannerimage_section_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('everafter_wedding_section_bannerimage_section_title',array(
      'label' => __('Banner Title','everafter-wedding'),
      'section' => 'everafter_wedding_section_banner',
      'setting' => 'everafter_wedding_section_bannerimage_section_title',
      'type'    => 'text'
    )
  ); 

      $wp_customize->add_setting('everafter_wedding_section_bannerimage_section_text',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('everafter_wedding_section_bannerimage_section_text',array(
      'label' => __('Banner Text','everafter-wedding'),
      'section' => 'everafter_wedding_section_banner',
      'setting' => 'everafter_wedding_section_bannerimage_section_text',
      'type'    => 'text'
    )
  );

    $wp_customize->add_setting('everafter_wedding_banner_btn_text',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('everafter_wedding_banner_btn_text',array(
      'label' => __('Button Text','everafter-wedding'),
      'section' => 'everafter_wedding_section_banner',
      'setting' => 'everafter_wedding_banner_btn_text',
      'type'    => 'text'
    )
  );


    $wp_customize->add_setting('everafter_wedding_banner_btn_text_url',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('everafter_wedding_banner_btn_text_url',array(
      'label' => __('Button URL','everafter-wedding'),
      'section' => 'everafter_wedding_section_banner',
      'setting' => 'everafter_wedding_banner_btn_text_url',
      'type'    => 'text'
    )
  );


  //----------------------------------About Section----------------------------



    $wp_customize->add_section( 'everafter_wedding_about', array(
        'title'    => __( 'About Section', 'everafter-wedding' ),
        'priority' => 10,
        'panel'    => 'everafter_wedding_panel',
    ) );

  //-----------------Enable Option Section about-------------

  $wp_customize->add_setting('everafter_wedding_about_enable',array(
      'default' => 'Enable',
      'sanitize_callback' => 'everafter_wedding_sanitize_choices'
  ));
  $wp_customize->add_control('everafter_wedding_about_enable',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'everafter-wedding'),
        'section' => 'everafter_wedding_about',
        'choices' => array(
            'Enable' => __('Enable', 'everafter-wedding'),
            'Disable' => __('Disable', 'everafter-wedding')
  )));

    //--------------About Title-----------------------

    $wp_customize->add_setting('everafter_wedding_about_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('everafter_wedding_about_title',array(
      'label' => __('Section Title','everafter-wedding'),
      'section' => 'everafter_wedding_about',
      'setting' => 'everafter_wedding_about_title',
      'type'    => 'text'
    )
  ); 


  //-----------------------------About Image-----------

  $wp_customize->add_setting('everafter_wedding_aboutimage1_section',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'everafter_wedding_aboutimage1_section',array(
    'label' => __('About Side Image','everafter-wedding'),
    'description' => __('Dimention 500 * 750','everafter-wedding'),
    'section' => 'everafter_wedding_about',
    'settings' => 'everafter_wedding_aboutimage1_section'
  )));


    $wp_customize->add_setting('everafter_wedding_about_name',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('everafter_wedding_about_name',array(
      'label' => __('Main Heading','everafter-wedding'),
      'section' => 'everafter_wedding_about',
      'setting' => 'everafter_wedding_about_name',
      'type'    => 'text'
    )
  );


    $wp_customize->add_setting('everafter_wedding_about_title_second',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('everafter_wedding_about_title_second',array(
      'label' => __('Paragraph 1','everafter-wedding'),
      'section' => 'everafter_wedding_about',
      'setting' => 'everafter_wedding_about_title_second',
      'type'    => 'textarea'
    )
  );


    $wp_customize->add_setting('everafter_wedding_about_para',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('everafter_wedding_about_para',array(
      'label' => __('Paragraph 2','everafter-wedding'),
      'section' => 'everafter_wedding_about',
      'setting' => 'everafter_wedding_about_para',
      'type'    => 'textarea'
    )
  );

    $wp_customize->add_setting('everafter_wedding_about_btn_text',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('everafter_wedding_about_btn_text',array(
      'label' => __('Button Text','everafter-wedding'),
      'section' => 'everafter_wedding_about',
      'setting' => 'everafter_wedding_about_btn_text',
      'type'    => 'text'
    )
  );


    $wp_customize->add_setting('everafter_wedding_about_btn_text_url',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('everafter_wedding_about_btn_text_url',array(
      'label' => __('Button URL','everafter-wedding'),
      'section' => 'everafter_wedding_about',
      'setting' => 'everafter_wedding_about_btn_text_url',
      'type'    => 'text'
    )
  );

  //------------Features---------------------

  $wp_customize->add_section( 'everafter_wedding_features_amenities', array(
        'title'    => __( 'Wedding Details', 'everafter-wedding' ),
        'priority' => 10,
        'panel'    => 'everafter_wedding_panel',
    ) );


  //-----------------Enable Option Section One-------------

  $wp_customize->add_setting('everafter_wedding_features_enable',array(
      'default' => 'Enable',
      'sanitize_callback' => 'everafter_wedding_sanitize_choices'
  ));
  $wp_customize->add_control('everafter_wedding_features_enable',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'everafter-wedding'),
        'section' => 'everafter_wedding_features_amenities',
        'choices' => array(
            'Enable' => __('Enable', 'everafter-wedding'),
            'Disable' => __('Disable', 'everafter-wedding')
  )));

    //--------------Section One Title-----------------------

    $wp_customize->add_setting('everafter_wedding_features_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('everafter_wedding_features_title',array(
      'label' => __('Section Title','everafter-wedding'),
      'section' => 'everafter_wedding_features_amenities',
      'setting' => 'everafter_wedding_features_title',
      'type'    => 'text'
    )
  ); 

  //-----------------------------Wedding Details Image 1-----------

  $wp_customize->add_setting('everafter_wedding_featureimage1_section',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'everafter_wedding_featureimage1_section',array(
    'label' => __('Wedding Details 1 Image','everafter-wedding'),
    'description' => __('Dimention 600 * 450','everafter-wedding'),
    'section' => 'everafter_wedding_features_amenities',
    'settings' => 'everafter_wedding_featureimage1_section'
  )));


    $wp_customize->add_setting('everafter_wedding_feature1_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('everafter_wedding_feature1_title',array(
      'label' => __('Wedding Details 1 Title','everafter-wedding'),
      'section' => 'everafter_wedding_features_amenities',
      'setting' => 'everafter_wedding_feature1_title',
      'type'    => 'text'
    )
  ); 


    $wp_customize->add_setting('everafter_wedding_feature1_text',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('everafter_wedding_feature1_text',array(
      'label' => __('Wedding Details 1 Text','everafter-wedding'),
      'section' => 'everafter_wedding_features_amenities',
      'setting' => 'everafter_wedding_feature1_text',
      'type'    => 'textarea'
    )
  ); 



  //-----------------------------Wedding Details Image 2-----------

  $wp_customize->add_setting('everafter_wedding_featureimage2_section',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'everafter_wedding_featureimage2_section',array(
    'label' => __('Wedding Details 2 Image','everafter-wedding'),
    'description' => __('Dimention 600 * 450','everafter-wedding'),
    'section' => 'everafter_wedding_features_amenities',
    'settings' => 'everafter_wedding_featureimage2_section'
  )));


    $wp_customize->add_setting('everafter_wedding_feature2_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('everafter_wedding_feature2_title',array(
      'label' => __('Wedding Details 2 Title','everafter-wedding'),
      'section' => 'everafter_wedding_features_amenities',
      'setting' => 'everafter_wedding_feature2_title',
      'type'    => 'text'
    )
  ); 


    $wp_customize->add_setting('everafter_wedding_feature2_text',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('everafter_wedding_feature2_text',array(
      'label' => __('Wedding Details 2 Text','everafter-wedding'),
      'section' => 'everafter_wedding_features_amenities',
      'setting' => 'everafter_wedding_feature2_text',
      'type'    => 'textarea'
    )
  ); 


  //-----------------------------Wedding Details Image 3-----------

  $wp_customize->add_setting('everafter_wedding_featureimage3_section',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'everafter_wedding_featureimage3_section',array(
    'label' => __('Wedding Details 3 Image','everafter-wedding'),
    'description' => __('Dimention 600 * 450','everafter-wedding'),
    'section' => 'everafter_wedding_features_amenities',
    'settings' => 'everafter_wedding_featureimage3_section'
  )));


    $wp_customize->add_setting('everafter_wedding_feature3_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('everafter_wedding_feature3_title',array(
      'label' => __('Wedding Details 3 Title','everafter-wedding'),
      'section' => 'everafter_wedding_features_amenities',
      'setting' => 'everafter_wedding_feature3_title',
      'type'    => 'text'
    )
  ); 


    $wp_customize->add_setting('everafter_wedding_feature3_text',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('everafter_wedding_feature3_text',array(
      'label' => __('Wedding Details 3 Text','everafter-wedding'),
      'section' => 'everafter_wedding_features_amenities',
      'setting' => 'everafter_wedding_feature3_text',
      'type'    => 'textarea'
    )
  ); 







  //------------Section One (Featured Post)---------------------

  $wp_customize->add_section( 'everafter_wedding_section1', array(
        'title'    => __( 'Latest Post', 'everafter-wedding' ),
        'priority' => 10,
        'panel'    => 'everafter_wedding_panel',
    ) );


  //-----------------Enable Option Section One-------------

  $wp_customize->add_setting('everafter_wedding_section1_enable',array(
      'default' => 'Enable',
      'sanitize_callback' => 'everafter_wedding_sanitize_choices'
  ));
  $wp_customize->add_control('everafter_wedding_section1_enable',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'everafter-wedding'),
        'section' => 'everafter_wedding_section1',
        'choices' => array(
            'Enable' => __('Enable', 'everafter-wedding'),
            'Disable' => __('Disable', 'everafter-wedding')
  )));

    //--------------Section One Title-----------------------

    $wp_customize->add_setting('everafter_wedding_section1_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('everafter_wedding_section1_title',array(
      'label' => __('Section Title','everafter-wedding'),
      'section' => 'everafter_wedding_section1',
      'setting' => 'everafter_wedding_section1_title',
      'type'    => 'text'
    )
  ); 

  //-----------Category------------

  $categories = get_categories();
  $cats = array();
  $i = 0;
  foreach($categories as $category){
    if($i==0){
      $default = $category->name;
      $i++;
    }
    $cats[$category->name] = $category->name;
  }

  $wp_customize->add_setting('everafter_wedding_section1_category',array(
  'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('everafter_wedding_section1_category',array(
    'type'    => 'select',
    'choices' => $cats,
    'label' => __('Select Category to Display Post','everafter-wedding'),
    'section' => 'everafter_wedding_section1',
    'sanitize_callback' => 'sanitize_text_field',
  ));



    $wp_customize->add_setting('everafter_wedding_section1_category_number_of_posts_setting',array(
    'default' => '8',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('everafter_wedding_section1_category_number_of_posts_setting',array(
    'label' => __('Number of Posts','everafter-wedding'),
    'section' => 'everafter_wedding_section1',
    'setting' => 'everafter_wedding_section1_category_number_of_posts_setting',
    'type'    => 'number'
  )); 

  //-------------------------Footer Settings------------------------------


    $wp_customize->add_section( 'everafter_wedding_footer', array(
        'title'    => __( 'Footer Settings', 'everafter-wedding' ),
        'priority' => 10,
        'panel'    => 'everafter_wedding_panel',
    ) );


  // Add a custom setting for the footer text
  $wp_customize->add_setting( 'everafter_wedding_footer_text', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ) );

  // Add a custom control for the footer text
  $wp_customize->add_control( 'everafter_wedding_footer_text', array(
    'label' => __( 'Footer Text', 'everafter-wedding' ),
    'section' => 'everafter_wedding_footer',
    'type' => 'text',
  ) );


//--------------------------------------General Settings------------------------------------------

  $wp_customize->add_section( 'everafter_wedding_general', array(
        'title'    => __( 'General Settings', 'everafter-wedding' ),
        'panel'    => 'everafter_wedding_panel',
    ) );

    $wp_customize->add_setting( 'everafter_wedding_post_meta_toggle_switch_control', array(
        'default'   => true,
        'sanitize_callback' => 'sanitize_text_field', // Use a suitable sanitization function based on your needs
        'transport' => 'refresh', // or 'postMessage' for instant preview without page refresh
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'everafter_wedding_post_meta_toggle_switch_control', array(
        'label'    => __( 'Display Time/Author', 'everafter-wedding' ),
        'section'  => 'everafter_wedding_general',
        'settings' => 'everafter_wedding_post_meta_toggle_switch_control',
        'type'     => 'checkbox',
    ) ) );

    $wp_customize->add_setting( 'everafter_wedding_post_readdmore_toggle_switch_control', array(
        'default'   => true,
        'sanitize_callback' => 'sanitize_text_field', // Use a suitable sanitization function based on your needs
        'transport' => 'refresh', // or 'postMessage' for instant preview without page refresh
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'everafter_wedding_post_readdmore_toggle_switch_control', array(
        'label'    => __( 'Display Read More Link', 'everafter-wedding' ),
        'section'  => 'everafter_wedding_general',
        'settings' => 'everafter_wedding_post_readdmore_toggle_switch_control',
        'type'     => 'checkbox',
    ) ) );


}
add_action( 'customize_register', 'everafter_wedding_customize_register' );



