<?php

define( 'MODULE_WIDGET_FOLDER', '/widgets' );

class custom_widget extends custom_callback {

    /**
     * Undocumented function
     *
     * Khởi tạo funtion
     * funtion tạo các field html từ dữ liệu truyền vào
     * @param array $field_args
     * @return void
     */
    public static function create_field( $field_args = [] ) {
        $output = '';
        $field_type = isset( $field_args['type'] ) ? esc_attr( $field_args['type'] ) : '';

        if ( ! static::is_field( esc_attr( $field_args['type'] ) ) ) {

            $field_type = 'not_found';

        }

        switch ( $field_type ) :
            case 'text':
                static::widget_field('text.field',
                    [
                        'func_class' => 'widget_field_text',
                        'field_args' => $field_args,
                    ]
                );
                break;
            case 'textarea':

                static::widget_field( 'textarea.field',
                    [
                        'func_class' => 'widget_field_textarea',
                        'field_args' => $field_args,
                    ]
                );
                break;

            case 'image':

                static::widget_field( 'image.field',
                    [
                        'func_class' => 'widget_field_image',
                        'field_args' => $field_args,
                    ]
                );
                break;

            case 'select':

                static::widget_field( 'select.field',
                    [
                        'func_class' => 'widget_field_select',
                        'field_args' => $field_args,
                    ]
                );
                break;

            case 'checkbox':

                static::widget_field( 'checkbox.field',
                    [
                        'func_class' => 'widget_field_checkbox',
                        'field_args' => $field_args,
                    ]
                );
                break;

            case 'gallery':

                static::widget_field( 'gallery.field',
                    [
                        'func_class' => 'widget_field_gallery',
                        'field_args' => $field_args,
                    ]
                );
                break;

            // case 'group':

            //     static::widget_field( 'class.field_Group',
            //         [
            //             'func_class' => 'Render_Field_Group',
            //             'field_args' => $field_args,
            //         ]
            //     );
            //     break;

            case 'repeater':

                static::widget_field( 'repeater.field',
                    [
                        'func_class' => 'widget_field_repeater',
                        'field_args' => $field_args,
                    ]
                );
                break;

            default:

                static::field_not_found( $field_args['type'] );
                break;

        endswitch;

    }

    /**
     * Undocumented function
     *
     * @param string $fied_value
     * @return void
     */
    public static function update_field( $fied_value = '' ) {

        if ( ! empty ( $fied_value ) && is_array( $fied_value ) ) {

            $instance = (array)$fied_value;

        } elseif ( ! empty ( $fied_value ) && ! is_array( $fied_value ) ) {

            $instance = $fied_value;

        } else {
            $instance = '';
        }

        return $instance;
    }
}


if ( class_exists ( 'custom_widget' ) ) {
    new custom_widget();
}