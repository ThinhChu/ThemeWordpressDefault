<?php
    
    function custom_register_sidebars() {
        register_sidebar( 
            [
                'id'            => 'footer_column_1',
                'name'          => __( 'Footer Column 1', 'custom-admin' ),
                'description'   => __( 'Nội dung widget.', 'custom-admin' ),
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '<div class="footer-title">',
                'after_title'   => '</div>',
            ]
        );
    }
    add_action( 'widgets_init', 'custom_register_sidebars' );