<?php

    defined( 'PS' ) or define( 'PS', DIRECTORY_SEPARATOR ); // PATH SEPARATOR
    defined( 'THEME_PATH' ) or define( 'THEME_PATH', dirname( __FILE__ ) . PS );
    defined( 'THEME_CORE_PATH' ) or define( 'THEME_CORE_PATH', THEME_PATH . 'core' . PS );
  
    if ( !class_exists( 'Config' ) ) { include_once( THEME_CORE_PATH . 'Config.php' ); }
    if ( !Config::isSessionActive() ) { Config::startSession(); }
    Config::loadCore();
  
    Boot::init();

    // include_once( TEMPLATEPATH . '/includes/widgets/MY_HomeWidget.php' );
    // include_once( TEMPLATEPATH . '/includes/widgets/MY_SlideShowWidget.php' );

    /*if ( function_exists( 'register_sidebar' ) ) {

        register_sidebar( array(
            'name' => 'mywidget name',
            'id' => 'mywidget-id',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => ''
        ) );

        register_sidebar( array(
            'name' => 'mywidget slideshow',
            'id' => 'mywidget-slideshow',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => ''
        ) );
    }

    function load_my_widgets() {
        register_widget( 'MY_HomeWidget' );
        register_widget( 'MY_SlideShowWidget' );
    }*/

    //Loading theme textdomain
    
