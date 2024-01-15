<?php
    function custom_regsiter_custom_post_types() {
        // Post type
        $posttype_course = [
            'labels' => [
                'name'          => 'Dịch vụ',
                'singular_name' => 'Dịch vụ',
                'all_items'     => __( 'Tất cả bài viết', 'custom-admin' ),
                'add_new'       => __( 'Viết bài mới', 'custom-admin' ),
                'add_new_item'  => __( 'Bài viết mới', 'custom-admin' ),
                'edit_item'     => __( 'Chỉnh sửa bài viết', 'custom-admin' ),
                'new_item'      => __( 'Thêm bài viết', 'custom-admin' ),
                'view_item'     => __( 'Xem bài viết', 'custom-admin' ),
                'view_items'    => __( 'Xem bài viết', 'custom-admin' ),
            ],
            'description' => 'Thêm bài viết',
            'supports'    => [
                'title',
                'editor',
                'author',
                'thumbnail',
                'comments',
                'revisions',
                'custom-fields',
                'excerpt',
            ],
            'taxonomies'   => array('loai-san-pham'),
            'hierarchical' => true,
            'show_in_rest' => true,
            'public'       => true,
            'has_archive'  => true,
            'rewrite'      => [
                'slug' => 'dich-vu-chi-tiet',
                'with_front' => true
            ],
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-book-alt',
            'can_export'          => true,
            // 'has_archive'         => true,
            'exclude_from_search' => true,
            'publicly_queryable'  => true,
            'capability_type'     => 'post'

        ];
    
        // register_post_type( 'custom_service', $posttype_course );

        /* Taxonomy */
        $args = array(
            'labels' => array(
                'name' => 'Các loại sản phẩm',
                'singular' => 'Loại sản phẩm',
                'menu_name' => 'Loại sản phẩm'
            ),
            'show_in_rest'          => true,
            'has_archive'  => true,
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
        );
        
        // register_taxonomy('loai-san-pham', 'custom_service', $args);
    }
    add_action( 'init', 'custom_regsiter_custom_post_types' );