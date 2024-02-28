<?php

if (class_exists('Kirki')) {
    /**
     * Add sections
     */
    function kirki_demo_scripts() {
        wp_enqueue_style('kirki-demo', get_stylesheet_uri(), array(), time());
    }

    add_action('wp_enqueue_scripts', 'kirki_demo_scripts');

    $priority = 1;

    // Panel
    // Kirki::add_panel('panel_id',
    //     [
    //         'priority'    => $priority++,
    //         'title'       => esc_html__( 'Panel', 'custom' ),
    //         'description' => esc_html__( 'My Panel Description.', 'custom' ),
    //     ]
    // );

    // Section
    // Kirki::add_section('header', array(
    //     'title' => esc_attr__('Header', 'custom'),
    //     'priority' => $priority++,
    //     'capability' => 'edit_theme_options',
    //     'panel'       => 'panel_id',
    // ));

    // Kirki::add_section('footer', array(
    //     'title' => esc_attr__('Footer', 'custom'),
    //     'priority' => $priority++,
    //     'capability' => 'edit_theme_options',
    //     // 'panel'       => 'panel_id',
    // ));

    // Kirki::add_section('social', array(
    //     'title' => esc_attr__('Social', 'custom'),
    //     'priority' => $priority++,
    //     'capability' => 'edit_theme_options',
    //     'panel'       => 'panel_id',
    // ));

    // Fields
    /**
     * Header
     */
    // Kirki::add_field('custom_setting', array(
    //     'type' => 'text',
    //     'settings' => 'custom_header_title_hotline',
    //     'label' => esc_attr__('Tiêu đề hotline', 'custom'),
    //     'description' => esc_attr__('', 'custom'),
    //     'help' => esc_attr__('Nhập tiêu đề hotline', 'custom'),
    //     'section' => 'header',
    //     'default' => '',
    //     'priority' => $priority++,
    // ));

    // Footer
    // Kirki::add_field('custom_setting', array(
    //     'type' => 'image',
    //     'settings' => 'custom_footer_logo',
    //     'label' => esc_attr__('Footer Logo', 'custom'),
    //     'description' => esc_attr__('', 'custom'),
    //     'help' => esc_attr__('Nhập logo footer', 'custom'),
    //     'section' => 'footer',
    //     'default' => '',
    //     'priority' => $priority++,
    // ));

    // Social
    // Kirki::add_field('custom_setting', array(
    //     'type' => 'repeater',
    //     'settings' => 'repeater_setting_css',
	// 	'label'    => esc_html__( 'Repeater Control', 'custom'),
	// 	'section'  => 'social',
	// 	'priority' => $priority++,
	// 	'default'  => '',
	// 	'fields'   => [
    //         'link_icon'   => [
	// 			'type'        => 'image',
	// 			'label'       => esc_html__( 'Icon', 'custom' ),
	// 			'description' => esc_html__( 'Description', 'custom' ),
	// 			'default'     => '',
	// 		],
	// 		'link_text'   => [
	// 			'type'        => 'text',
	// 			'label'       => esc_html__( 'Link Text', 'custom' ),
	// 			'description' => esc_html__( 'Description', 'custom' ),
	// 			'default'     => '',
	// 		],
	// 		'link_url'    => [
	// 			'type'        => 'text',
	// 			'label'       => esc_html__( 'Link URL', 'custom' ),
	// 			'description' => esc_html__( 'Description', 'custom' ),
	// 			'default'     => '',
	// 		],
	// 		// 'link_target' => [
	// 		// 	'type'        => 'select',
	// 		// 	'label'       => esc_html__( 'Link Target', 'kirki' ),
	// 		// 	'description' => esc_html__( 'Description', 'kirki' ),
	// 		// 	'default'     => '_self',
	// 		// 	'choices'     => [
	// 		// 		'_blank' => esc_html__( 'New Window', 'kirki' ),
	// 		// 		'_self'  => esc_html__( 'Same Frame', 'kirki' ),
	// 		// 	],
	// 		// ],
	// 		// 'checkbox'    => [
	// 		// 	'type'    => 'checkbox',
	// 		// 	'label'   => esc_html__( 'Checkbox', 'kirki' ),
	// 		// 	'default' => false,
	// 		// ],
	// 	],
    // ));
}

if ( ! function_exists ( 'custom_option' ) ) {

    /**
     * Undocumented function
     *
     * @param [type] $setting
     * @param string $default
     * @return void
     */
    function custom_option($setting, $default = '') {
        echo custom_get_option( $setting, $default );
    }

    /**
     * Undocumented function
     *
     * @param [type] $setting
     * @param string $default
     * @return void
     */
    function custom_get_option( $setting, $default = '' ) {

        if ( class_exists ( 'Kirki' ) ) {

            $value = $default;

            $options = get_option( 'option_name', array() );
            $options = get_theme_mod( $setting, $default );

            if ( isset ( $options ) ) {
                $value = $options;
            }

            return $value;
        }

        return $default;
    }

}
