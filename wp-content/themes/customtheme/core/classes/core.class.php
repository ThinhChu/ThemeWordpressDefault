<?php
/**
 * Undocumented class
 */
class CustomCore extends Setup_Theme {

    public function load_core() 
    {
        parent::__construct();
        $this->include_files();
    }

    public function include_files() 
    {
        $regsiter_load_files = [
            // 'app/controllers' => [
            //     'method'   => '',
            //     'autoload' => array(
            //         // 'class-notice.php',
            //         // 'class-posts.php',
            //         // 'class-singlePost.php'
            //     ),
            // ],
            // 'app/ajax' => [
            //     'method'   => '',
            //     'autoload' => array(
            //         // 'default-ajax.php'
            //     ),
            // ],
            // 'app/modules/comments' => [
            //     'method'   => '',
            //     'autoload' => '',
            // ],
            // 'app/modules/login' => [
            //     'method'   => '',
            //     'autoload' => '',
            // ],
            'widgets' => [
                'method'   => '',
                'autoload' => array(
                    'callback.class.php',
                    'widget.class.php'
                ),
            ],
            
            'widgets/widget' => [
                'method'   => '',
                'autoload' => array(
                    'repeater.php',
                ),
            ],
            
            'core' => [
                'method'   => '',
                'autoload' => [
                    'walker-menu.php',
                    'post-type.php',
                    'kirki.php',
                    'menu.php',
                    'functions.php',
                    'style.php',
                    'sidebar.php',
                ],
            ],
        ];
        
        if ( is_array ( $regsiter_load_files ) ) {
            foreach ( $regsiter_load_files as $path => $file ) {
                $filePath = $path;
                $autoladFiles = $file['autoload'];
                if ( ! empty ( $autoladFiles ) ) {
                    foreach ( $autoladFiles as $loadFile ) {
                        $file_path = get_template_directory() .'/'. $filePath .'/'. $loadFile;
                        if ( file_exists( $file_path ) ) {
                            require_once( $file_path );
                        }
                    }
                }
            }
        }
    }

}