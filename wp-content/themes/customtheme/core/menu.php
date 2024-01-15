<?php
    function add_after_setup_theme() {
        // regsiter menu
        register_nav_menus(
            [
                'primary-menu' => __( 'Theme Main Menu', 'custom' ),
            ]
        );
        
    }
    add_action( 'after_setup_theme', 'add_after_setup_theme' );