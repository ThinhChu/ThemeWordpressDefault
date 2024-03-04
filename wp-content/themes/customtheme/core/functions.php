<?php
    function add_custom_logo_class($html) {
        if (!wp_is_mobile()) { 
            $html = preg_replace('/<a(.*?)class=[\'"](.*?)[\'"](.*?)>/i', '<a$1class="$2 logo"$3>', $html);
        }
        return $html;
    }
    
    add_filter('get_custom_logo', 'add_custom_logo_class');