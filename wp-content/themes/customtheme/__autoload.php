<?php
    define( 'CORE_PATH', '/core' );
    define( 'WIDGET_PATH', '/widgets' );
    define( 'APP_PATH', '/app' );
    define('DISALLOW_FILE_EDIT', true);

    // Core
    require_once( get_template_directory() . CORE_PATH . '/classes/setup.class.php' );
    require_once( get_template_directory() . CORE_PATH . '/classes/core.class.php' );

    $Core = new CustomCore();
    $Core->load_core();