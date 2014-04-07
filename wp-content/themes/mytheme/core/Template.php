<?php

    /**
    * 
    */
    class Template {
        
        public function __construct() {
            
        }

        static public function loadLayout( $layout ) {
            $layoutPath = THEME_VIEWS_PATH . View::getLayout() . '/';
            if ( is_readable( $layoutPath . $layout . '.phtml' ) ) {
                return( eval( '?>'. file_get_contents( $layoutPath . $layout . '.phtml' ) ) );
            } else {
                return( '' );
            }
        }

        static public function loadStylesheets() {
            $cssFiles = array( 'metro-bootstrap', 'fonts', 'slideshow-component', 'style' );
            $toEcho = '';
            foreach ( $cssFiles as $value ) {
                $toEcho .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"". THEME_STYLESHEETS_URL . $value .".css\" />\n";
            }

            return( $toEcho );
        }

        static public function loadJavascripts() {
            $jsFiles = array( 'jquery.min', 'jquery.flipshow', 'jssor.slider.mini', 'application' );
            $toEcho = '';
            foreach ($jsFiles as $value) {
                $toEcho .= "<script type\"text/javascript\" src=\"". THEME_JAVASCRIPTS_URL . $value .".js\"></script>\n";
            }

            return( $toEcho );
        }

        static public function getHead() {
            $head = self::loadLayout( 'head' );
            print_r( $head );
        }

        static public function getPage( $layout ) {
            $page = self::loadLayout( $layout );
            return( $page );
        }

        static public function getFoot() {
            $foot = self::loadLayout( 'foot' );
            print_r( $foot );
        }
    }

?>