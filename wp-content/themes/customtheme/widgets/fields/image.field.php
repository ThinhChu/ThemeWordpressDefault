<?php
/**
 * Class Custom Widget
 */
class widget_field_image {

    /**
     * Undocumented function
     *
     * @param array $field_args
     * @return void
     */
    public function render( $field_args = [] ) {

        $output = '';

        if ( isset( $field_args['title'] ) ) {
            $widget_title = $field_args['title'];
        } else {
            $widget_title = __( 'Văn bản ngắn', 'custom' );
        }

        if ( isset( $field_args['id'] ) ) {
            $for = 'for="'.$field_args['id'].'"';
        } else {
            $for = 'for="'.$field_args['name'].'"';
        }

        if ( isset( $field_args['id'] ) ) {
            $id = 'id="'.$field_args['id'].'"';
        } else {
            $id = 'id="'.$field_args['name'].'"';
        }

        if ( isset( $field_args['class'] ) ) {
            $class = 'class="custom-widget ref-field-text '.esc_attr( $field_args['class'] ).'"';
        } else {
            $class = 'class="custom-widget ref-field-text"';
        }

        if ( isset( $field_args['name'] ) ) {
            $name = 'name="'.$field_args['name'].'"';
        } else {
            $name = '';
        }

        if ( isset( $field_args['value'] ) ) {
            $value = 'value="'.esc_attr( $field_args['value'] ).'"';
        } else {
            $value = 'value=""';
        }

        if ( isset( $field_args['width'] ) ) {
            $width = esc_attr( $field_args['width'] );
        } else {
            $width = '390';
        }

        if ( isset( $field_args['value'] ) && ! empty ( $field_args['value'] ) ) {
            $image_src = wp_get_attachment_image($field_args['value'], 'full');
        } else {
            $image_src = '';
        }

        if ( isset( $field_args['placeholder'] ) ) {
            $placeholder = 'placeholder="'.esc_attr( $field_args['placeholder'] ).'"';
        } else {
            $placeholder = '';
        }

        $output .= '<div class="widget-items render-field box-field-image">';
        $output .= '<div class="box-field-title">';
        $output .= '<label '.$for.' class="txt-label field-text-label">';
        $output .=  $widget_title;
        $output .= '</label>';
        $output .= '</div>';
        $output .= '<div class="box-field-content">';
        $output .= '<input type="hidden" class="img-val" '.$class.' '.$id.' '.$name.' '.$value.' '.$placeholder.' />';
        $output .= '<div class="w-image-review">';
        $output .= $image_src;
        $output .= '</div>';
        $output .= '<div class="box-image-button">';
        $output .= '<button class="upload_image_button button button-primary">'.__( 'Chọn ảnh', 'custom' ).'</button>';
        if ( ! empty ( $field_args['value'] ) ) {
            $output .= '<button class="remove_image_button button button-danger">'.__( 'Xóa ảnh', 'custom' ).'</button>';
        }
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';

        echo $output;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function get_docs() {
        ?>
        <pre>
            <code>
            // Kiểm tra
            if ( isset( $instance[ 'text' ] ) ) {
                $text = $instance[ 'text' ];
            } else {
                $text = '';
            }

            // Gọi hàm
            custom_widget::create_field(
                [
                    'type'        => 'text',
                    'name'        => $this->get_field_name( 'text' ),
                    'id'          => $this->get_field_id( 'text' ),
                    'value'       => $text,
                    'title'       => __( 'Text', 'custom' ),
                    'placeholder'  => __( 'Chọn hình ảnh', 'custom' ),
                    'width'        => 390,
                    'docs'        => false,
                ]
            );
            </code>
            </pre>
        <?php
    }

}
