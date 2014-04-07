<?php

    /**
    * 
    */
    class View {

        private static $layout = 'layouts';
        
        function __construct() {
            # code...
        }

        static public function render( $viewPath ) {
            if ( isLayout() === false ) {
                self::load( $viewPath );
            } else {
                get_header();
                self::load( $viewPath );
                get_footer();
            }

        }

        static public function load( $viewPath ) {
            $params = getParams();
            if ( is_readable( $viewPath ) ) {
                include_once( $viewPath );
            } else {
                if ( !isset( $params[ 'format' ] ) ) {
                    die( 'View not found for this action "' . $viewPath . '"' );
                }
            }
        }

        static public function setLayout( $layout ) {
            self::$layout = $layout;
        }

        static public function getLayout() {
            return( self::$layout );
        }

        static public function isLayout() {
            return( self::$layout );
        }
    }

?>