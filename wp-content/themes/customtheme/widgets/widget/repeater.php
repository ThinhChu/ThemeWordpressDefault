<?php

    class Repeater_Widget extends WP_Widget {
        function __construct() {
            parent::__construct(
                'repeater_widget',
                __('Repeater Widget', 'text_domain'),
                array('description' => __('A widget with repeater fields', 'text_domain'))
            );
        }

        public function widget($args, $instance) {
            // Widget output
        }

        public function update($new_instance, $old_instance) {
            // Save widget options
            $instance = $old_instance;
            $instance['title'] = $new_instance['title'];
            $instance['content'] = $new_instance['content'];
            $instance['thumbnail'] = $new_instance['thumbnail'];
            $instance['select'] = $new_instance['select'];
            $instance['checkbox'] = $new_instance['checkbox'];
            return $instance;
        }

        public function form($instance) {
            // Output admin widget options form
            $instance = wp_parse_args((array) $instance, array(
                'title' => '',
                'content' => '',
                'thumbnail' => '',
                'select' => '',
                'checkbox' => '',
            ));
            $title = $instance['title'];
            $content = $instance['content'];
            $thumbnail = $instance['thumbnail'];
            $select = $instance['select'];
            $checkbox = $instance['checkbox'];

            if (class_exists('custom_widget')) { 
                custom_widget::create_field([
                    'type'        => 'text',
                    'name'        => $this->get_field_name( 'title' ),
                    'id'          => $this->get_field_id( 'title' ),
                    'value'       => $title,
                    'title'       => __( 'Tiêu đề :', 'custom' ),
                    'placeholder' => __( 'Nhập nội dung văn bản', 'custom' ),
                    'docs'        => false,
                ]);

                custom_widget::create_field([
                    'type'        => 'textarea',
                    'name'        => $this->get_field_name( 'content' ),
                    'id'          => $this->get_field_id( 'content' ),
                    'value'       => $content,
                    'title'       => __( 'Nội dung :', 'custom' ),
                    'placeholder' => __( 'Nhập nội dung văn bản', 'custom' ),
                    'docs'        => false,
                ]);

                custom_widget::create_field([
                    'type'        => 'image',
                    'name'        => $this->get_field_name( 'thumbnail' ),
                    'id'          => $this->get_field_id( 'thumbnail' ),
                    'value'       => $thumbnail,
                    'title'       => __( 'Hình ảnh :', 'custom' ),
                    'placeholder' => __( 'Nhập nội dung văn bản', 'custom' ),
                    'width' => '300',
                    'docs'        => false,
                ]);

                custom_widget::create_field([
                    'type'         => 'select',
                    'name'         => $this->get_field_name( 'select' ),
                    'id'           => $this->get_field_id( 'select' ),
                    'value'        => $select,
                    'title'        => __( 'Select :', 'custom' ),
                    'placeholder'  => __( 'Chọn giá trị', 'custom' ),
                    'select' => [
                        'normal' => __( 'Normal', 'custom'),
                        'mail' => __( 'Mail', 'custom'),
                        'phone' => __( 'Phone', 'custom'),
                    ],
                    'docs'         => false,
                ]);

                custom_widget::create_field([
                    'type'         => 'checkbox',
                    'name'         => $this->get_field_name( 'checkbox' ),
                    'id'           => $this->get_field_id( 'checkbox' ),
                    'value'        => $checkbox,
                    'title'        => __( 'Checkbox', 'custom' ),
                    'placeholder'  => __( 'Chọn giá trị', 'custom' ),
                    'checkbox' => [
                        'checkbox_1'  => __( 'Giá trị 1', 'custom' ),
                        'checkbox_2'  => __( 'Giá trị 2', 'custom' ),
                        'checkbox_3'  => __( 'Giá trị 3', 'custom' ),
                    ],
                    'column'       => 4, // max 5
                    'docs'         => false,
                ]);
            }
        }
    }

    function register_repeater_widget() {
        register_widget('Repeater_Widget');
    }
    add_action('widgets_init', 'register_repeater_widget');