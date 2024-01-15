<?php

/**
 * The template for displaying single.
 *
 * @package Custom
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();
while (have_posts()) :
    the_post();
?>

<?php
endwhile;
get_footer();