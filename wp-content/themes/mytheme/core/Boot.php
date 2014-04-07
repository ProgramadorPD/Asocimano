<?php

    /**
    *
    */
    abstract class Boot {

        static public function init() {
            Globals::init();

            add_theme_support( 'nav-menus' );
            add_theme_support( 'post-thumbnails' );
            set_post_thumbnail_size( 150, 150, true );

            add_action( 'init', array( 'Boot', 'registerNavMenus' ) );
            add_action( 'admin_enqueue_scripts', array( 'Boot', 'stylesheetsAdmin' ) );
            add_action( 'admin_enqueue_scripts', array( 'Boot', 'javascriptsAdmin' ) );
            add_action( 'wp_enqueue_scripts', array( 'Boot', 'stylesheetsTheme' ) );
            add_action( 'wp_enqueue_scripts', array( 'Boot', 'javascriptsTheme' ) );

            load_theme_textdomain( 'mytheme', ( THEME_APP_PATH . 'locales' ) );
            // add_action( 'init', 'initTheme' );
            // add_action( 'widgets_init', 'load_my_widgets' );



            // DBAdapter::setConnection() );
            self::loadModels();
            self::loadController();

        }

        static public function loadModels( $modelsPath = THEME_MODELS_PATH ) {
            $modelsFiles = scandir( $modelsPath );

            foreach ( $modelsFiles as $model ) {
                if ( $model == '.' || $model == '..' ) {
                    continue;
                } if ( is_dir( $modelsPath . $model ) ) {
                    self::loadModels( $modelsPath . $model . PS );
                } else if ( is_readable( $modelsPath . $model ) ) {
                    include_once( $modelsPath . $model );
                }
            }
        }

        static public function loadController() {
            if ( !class_exists( 'Controller' ) ) include_once( THEME_CORE_PATH . 'Controller.php' );
            $controller = Controller::getController();
            $action = Controller::getAction();

            if ( is_readable( THEME_CONTROLLERS_PATH . $controller . '.php' ) ) {
                include_once( THEME_CONTROLLERS_PATH . $controller . '.php' );
                $objController = ( class_exists( $controller ) ) ? new $controller : NULL;

                Controller::prepareItems( $objController, $action );
                // View::render( $objController, $action );
            } else {
                die( 'The "' . $controller . '" Controller is missing' );
            }
        }

        static public function stylesheetsAdmin() {
            // wp_register_style( 'admin-bootstrap', Helper::getCSSUrlForWp( 'metro-bootstrap' ) );
            // wp_enqueue_style( 'admin-bootstrap' );
        }

        static public function javascriptsAdmin() {
            wp_enqueue_media();
            /*wp_register_script( 'mytheme-admin-js', '/wp-content/themes/mytheme/js/admin.js' );
            wp_enqueue_script( 'mytheme-admin-js' );*/
        }

        static public function stylesheetsTheme() {
            wp_register_style( 'theme-bootstrap', Helper::getCSSUrlForWp( 'metro-bootstrap' ) );
            wp_register_style( 'theme-fonts', Helper::getCSSUrlForWp( 'fonts' ) );
            wp_register_style( 'theme-slideshow-component', Helper::getCSSUrlForWp( 'slideshow-component' ) );
            wp_register_style( 'theme-style', Helper::getCSSUrlForWp( 'style' ) );

            wp_enqueue_style( 'theme-bootstrap' );
            wp_enqueue_style( 'theme-fonts' );
            wp_enqueue_style( 'theme-slideshow-component' );
            wp_enqueue_style( 'theme-style' );
        }

        static public function javascriptsTheme() {
            wp_register_script( 'theme-modernizr', Helper::getJSUrlForWp( 'modernizr.custom' ) );
            wp_register_script( 'theme-jquery-flipshow', Helper::getJSUrlForWp( 'jquery.flipshow' ), array( 'jquery' ), '', true );
            wp_register_script( 'theme-jssor-slider', Helper::getJSUrlForWp( 'jssor.slider.mini' ), array( 'jquery' ), '', true );
            wp_register_script( 'theme-application', Helper::getJSUrlForWp( 'application' ), array( 'jquery' ), '', true );

            wp_enqueue_script( 'theme-modernizr' );
            wp_enqueue_script( 'theme-jquery-flipshow' );
            wp_enqueue_script( 'theme-jssor-slider' );
            wp_enqueue_script( 'theme-application' );
        }

        static public function registerNavMenus() {
            register_nav_menus(
                array(
                  'index-menu-1' => __( 'Index Menu Top' ),
                  'index-menu-2' => __( 'Index Menu Main' )
                )
            );
        }
    }