<?php

    /**
    * Config
    */
    class Config {

        private static $projectName = 'asocimano';
        private static $titleDocument = 'Asocimano';
        private static $themeName = 'mytheme';
        

        static public function getThemeName() {
            return( self::$themeName );
        }

        static public function isSessionActive() {
            if ( php_sapi_name() !== 'cli' ) {
                if ( version_compare(phpversion(), '5.4.0', '>=') ) {
                    return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
                } else {
                    return session_id() === '' ? FALSE : TRUE;
                }
            }
            return FALSE;
        }

        static public function startSession() {
            session_start();
        }

        static public function loadCore( $corePath = THEME_CORE_PATH ) {
            $coreFiles = scandir( $corePath );
            foreach ( $coreFiles as $file ) {
                if ( $file == '.' || $file == '..' || $file == 'Config.php' || $file == 'Functions.php' ) {
                    continue;
                } else if ( is_dir( $corePath . $file ) ) {
                    self::loadCore( $corePath . $file . '/' );
                } else if ( is_readable( $corePath . $file ) ) {
                    include_once( $corePath . $file );
                } else die( 'Fail to load file: ' . $corePath . $file );
            }
            include_once( $corePath . 'Functions.php' );
        }

        static public function isAjax() {
            if ( isset( $_SERVER[ 'HTTP_X_REQUESTED_WITH' ] ) && strtolower( $_SERVER[ 'HTTP_X_REQUESTED_WITH' ] ) == 'xmlhttprequest' ) {
                return( true );
            } else {
                return( false );
            }
        }

        static public function getTitleDocument() {
            return( self::$titleDocument );
        }

        static public function setTitleDocument( $title ) {
            self::$titleDocument = $title;
        }

        static public function getProjectName() {
            return( self::$projectName );
        }

        static public function setProjectName( $projectName ) {
            self::$projectName = $projectName;
        }

        static public function getServerProtocol() {
            return( $_SERVER[ 'SERVER_PROTOCOL' ] );
        }

        static public function getServerHost() {
            $host = $_SERVER[ 'HTTP_HOST' ];
            if ( ( $host == '127.0.0.1' ) || ( $host == 'localhost' ) ) {
                $host .= '/' . self::getProjectName() . '/';
                return( $host ); 
            }
            return( $host . '/' );
        }

    }