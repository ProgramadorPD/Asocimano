<?php
	
	/**
	 * 
	 */
	abstract class Helper {

		private static $format;

		static public function getParams() {
        	return( $_REQUEST );
        }

        static public function getParam( $param, $default = null ) {
            return( ( isset( $_REQUEST[ $param ] ) ) ? $_REQUEST[ $param ] : $default );
        }

        static public function setFormat( $format ) {
            self::$format = $format;
        }

        static public function getFormat() {
            $params = self::getParams();
            $format = ( isset( $params[ 'format' ] ) ) ? $params[ 'format' ] : self::$format;
            return( $format );
        }

        static public function getCSSUrlForWP( $CSS ) {
        	$url = US .'wp-content'. US .'themes'. US .Config::getThemeName(). US .'app'. US .'assets'. US .'stylesheets'. US .$CSS. '.css' ;
        	return( $url );
        }

        static public function getJSUrlForWP( $JS ) {
        	$url = US .'wp-content'. US .'themes'. US .Config::getThemeName(). US .'app'. US .'assets'. US .'javascripts'. US .$JS. '.js' ;
        	return( $url );
        }

        static public function getUrlImage( $image ) {
            return( ( THEME_IMAGES_URL . $image ) );
        }

        static public function getUrl( $controller = 'home', $action = 'index', $params = array() ) {
            $url = ROOT_URL;
            if ( !empty( $controller ) && $controller != 'home' ) {
                $url .= '?'. Controller::getDefaultNameVarController() .'='. $controller;
            }

            if ( !empty( $action ) && $action != 'index' ) {
                if ( !preg_match( '/[?]/' , $url ) ) { $url .= '?'. Controller::getDefaultNameVarAction() .'='. $action; }
                else { $url .= '&'. Controller::getDefaultNameVarAction() .'='. $action; }
            }

            if ( !empty( $params ) && is_array( $params ) ) {
                if ( !preg_match( '/[?]/', $url ) ) { $url .= '?'; }
                else { $url .= '&'; }
                $countParams = count( $params );
                $i = 1;
                foreach ( $params as $key => $value ) {
                    $url .= $key .'='. $value;
                    if ( $i < $countParams ) { $url .= '&'; }
                    $i++;
                }
            }

            return( $url );
        }

        static public function getViewPath( $controller = 'home', $view = 'index', $params = array() ) {
        	if ( empty( $controller ) ) { $controller = 'home'; }
        	if ( empty( $view ) ) { $view = 'index'; }

        	$path = THEME_VIEWS_PATH . $controller . PS . $view . '.phtml' ;

            if ( !empty( $params ) && is_array( $params ) ) {
                if ( !preg_match( '/[?]/', $path ) ) { $path .= '?'; }
                else { $path .= '&'; }
                $countParams = count( $params );
                $i = 1;
                foreach ( $params as $key => $value ) {
                    $path .= $key .'='. $value;
                    if ( $i < $countParams ) { $path .= '&'; }
                    $i++;
                }
            }

            return( $path );
        }

	}