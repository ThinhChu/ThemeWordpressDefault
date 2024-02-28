<?php
    function custome_add_styles_scripts_admin() {
        wp_enqueue_style( 'custom-admin-css', get_template_directory_uri() . '/assets/private/css/custom.css', array(), rand());
        wp_enqueue_script( 'custom-admin-js', get_template_directory_uri() . '/assets/private/js/custom.js', array(), false, true );
        // wp_enqueue_script( 'jquery-admin', get_template_directory_uri() . '/assets/lib/jquery.min.js', array(), false, true );
    }
    add_action( 'admin_enqueue_scripts', 'custome_add_styles_scripts_admin' );

    function custome_add_styles_scripts() {
        wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/assets/public/css/custom.css', array(), rand());
        wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/public/js/custom.js', array(), false, true);
        // wp_enqueue_script( 'jquery-custom', get_template_directory_uri() . '/assets/lib/jquery.min.js', array(), false, true );
    }
    add_action( 'wp_enqueue_scripts', 'custome_add_styles_scripts' );

    function add_module_to_my_script( $tag, $handle, $src ) {

        if ( 'custom-admin-js' === $handle or 'custom-js' === $handle) {
    
            $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
    
        }
    
        return $tag;
    }
    add_filter( 'script_loader_tag', 'add_module_to_my_script', 10, 3 );