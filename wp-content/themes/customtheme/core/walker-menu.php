<?php
class Pidget_Walker_Nav_Menu extends Walker_Nav_Menu {

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class='nav__list-down  js-dropdown'>\n";
    }

    function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    function start_el( &$output, $item, $depth=0, $args=array(), $id = 0 ) {
        $object = $item->object;
        $type = $item->type;
        $title = $item->title;
        $description = $item->description;
        $permalink = $item->url;
        // Tạo field hình bằng ACF
        // $icon = get_field('icon_menu_item', $item);
        // Kiểm tra xem menu này có menu con hay không ?
        // $has_children = in_array('menu-item-has-children', $item->classes);
        // $depth > 0 thì là menu con
        // $args->theme_location == 'primary-menu' kiểm tra định danh menu
        $class_menu_pri = ($depth == 0) ? 'nav__list' : 'nav__list-item';
        $class_menu = ($args->theme_location == 'primary-menu') ? $class_menu_pri : '';
        $output .= "<li class='".$class_menu." ".implode(" ", $item->classes)."'>";

        //Add SPAN if no Permalink
        if ( $permalink && $permalink != '#' ) {
            $output .= '<a class="nav__list-link" href="' . $permalink . '">';
        } else {
            $output .= '<a class="nav__list-link" href="javascript:;">';
        }

        // $output .= wp_get_attachment_image($icon, 'thumbnail');
        $output .= '<span>'. $title . '</span>';
        if ( $permalink && $permalink != '#' ) {
            $output .= '</a>';
        } else {
            $output .= '</a>';
        }

    }

}

