<?php
/**
 * The template for displaying taxonomy.
 *
 * @package Custom
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>
    <div class="wrapper">
        <div id="notfound">
            <div class="notfound">
                <div class="notfound-404">
                    <h3><?php echo __( 'Oops! Page not found', 'katen-theme' ) ?></h3>
                    <h1><span>4</span><span>0</span><span>4</span></h1>
                </div>
                <h2><?php echo __( 'we are sorry, but the page you requested was not found', 'katen-theme' ) ?></h2>
                <a href="<?php echo get_site_url() ?>">
                    <?php echo __( 'Back to the home page', 'katen-theme' ) ?>
                </a>
            </div>
        </div>
    </div>
<?php get_footer();
