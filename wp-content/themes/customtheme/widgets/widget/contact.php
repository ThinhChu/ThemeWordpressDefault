<?php

    class contact_Widget extends WP_Widget {
        function __construct() {
            parent::__construct(
                'contact_widget',
                __('Thông tin liên hệ', 'custom'),
                array('description' => __('Footer', 'custom'))
            );
        }

        public function widget($args, $instance) {
            // Widget output
            $content = $instance['content'];
            $social = $instance['repeater'];
            
            echo $args['before_widget'];
            echo $args['before_title']. $args['widget_name'] . $args['after_title']; 
            ?>
            <?php if ($content) { ?>
                <p class="stext-107 cl7 size-201">
                    <?php echo $instance['content']; ?>
                </p>
            <?php } ?>

            <?php if ($social) {?>
                <div class="p-t-27">
                    <?php foreach ($social as $item) { ?>
                        <a href="<?php echo $item['item_url']; ?>" class="fs-18 cl7 hov-cl1 trans-04 m-r-16 c-icon" target="_blank">
                            <?php echo wp_get_attachment_image($item['item_icon'], 'thumbnail'); ?>
                        </a>
                    <?php } ?>
                </div>
            <?php }?>
            <?php
            echo $args['after_widget'];
        }

        public function update($new_instance, $old_instance) {
            // Save widget options
            $instance = $old_instance;
            $instance['content'] = $new_instance['content'];
            $instance['repeater'] = $new_instance['repeater'];
            return $instance;
        }

        public function form($instance) {
            // Output admin widget options form
            $instance = wp_parse_args((array) $instance, array(
                'content' => '',
                'repeater' => '',
            ));
            $content = $instance['content'];
            $repeater = $instance['repeater'];

            if (class_exists('custom_widget')) { 
                custom_widget::create_field([
                    'type'        => 'textarea',
                    'name'        => $this->get_field_name( 'content' ),
                    'id'          => $this->get_field_id( 'content' ),
                    'value'       => $content,
                    'title'       => __( 'Nội dung:', 'custom' ),
                    'placeholder' => __( 'Nhập nội dung văn bản', 'custom' ),
                    'docs'        => false,
                ]);

                custom_widget::create_field(
                    [
                        'type'   => 'repeater',
                        'name'   => $this->get_field_name( 'repeater' ),
                        'id'     => $this->get_field_id( 'repeater' ),
                        'value'  => $repeater,
                        'title'  => __( 'Repeater', 'custom'),
                        'fields' => [
                            'item_url' => [
                                'type'        => 'text',
                                'title'       => __( 'Đường dẫn', 'custom' ),
                                'placeholder' => __( 'Nhập nội dung đường dẫn', 'custom'),
                            ],
                            'item_icon' => [
                                'type'        => 'image',
                                'title'       => __( 'Biểu tượng', 'custom' ),
                                'placeholder' => __( 'Chọn nội dung biểu tượng', 'custom'),
                            ],
                        ],
                        'docs'   => false,
                    ]
                );
            }
        }
    }

    function register_contact_widget() {
        register_widget('contact_Widget');
    }
    add_action('widgets_init', 'register_contact_widget');