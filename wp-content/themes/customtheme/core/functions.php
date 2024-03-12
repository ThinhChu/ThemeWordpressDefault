<?php
    function add_custom_logo_class($html) {
        if (!wp_is_mobile()) { 
            $html = preg_replace('/<a(.*?)class=[\'"](.*?)[\'"](.*?)>/i', '<a$1class="$2 logo"$3>', $html);
        }
        return $html;
    }

    add_filter('get_custom_logo', 'add_custom_logo_class');

    /**
     * Undocumented function
     * kiếm trang xem string/array đó có rỗng hay không
     * @param array $content_args
     * @return boolean
     */
    function content_exists( $content_args = [] ) {
        if ( ! empty ( $content_args ) ) {
            $done  = 0;
            $total = count( $content_args );
            foreach ( $content_args as $key => $value ) {
                if ( ! is_array( $value ) && $value != '' || is_array( $value ) && content_exists( $value ) ) {
                    $done++;
                }
            }
            if ( isset ( $done ) && $done > 0 ) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Undocumented function
     * Trả về format phone
     * @param [type] $hotline
     * @return void
     */
    function replace_tel( $hotline = '' ) {
        if ( empty ( $hotline ) ) {
            return;
        }
        $string   = preg_replace( '/\s+/','',$hotline );
        $stringaz = preg_replace( '/[^a-zA-Z0-9_ -]/s', '', $string );
        $tel = 'tel:'.$stringaz;
        return $tel;

    }

    /**
     * Undocumented function
     * Trả về format href theo type được nhận
     * @param [type] phone, email, normal
     * @param [content] $content
     * @return void
     */
    function get_href_by_type_social($type, $content) {
        if ($type == 'phone') {
            $href = replace_tel($content);
        }elseif ($type == 'email') {
            $href = 'mailto:'.$content;
        }else{
            $href = 'javascript:;';
        }
        return $href;
    }

    /**
     * Undocumented function
     * Trả về format author name
     * @param [postID] $postID
     * @return void
     */
    // the_author_meta('user_nicename', $post->post_author)