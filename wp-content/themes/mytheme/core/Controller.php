<?php
    interface iController {
        public function getVarstoRender();
        public function setVarstoRender( $varstoRender );
    }

    /**
    * 
    */
    abstract class Controller implements iController {
        private static $defaultController = 'home';
        private static $defaultAction = 'index';
        private static $defaultNameVarController = 'section';
        private static $defaultNameVarAction = 'page';
        private static $varstoRender = array();
        private static $actionAlternative = array(
            'new' => 'create',
            'modificar' => 'edit',
            'edit-password' => 'editPassword'
        );
        private $view;

        static public function getDefaultController() {
            return( self::$defaultController );
        }

        static public function getDefaultAction() {
            return( self::$defaultAction );
        }

        static public function getDefaultNameVarController() {
            return( self::$defaultNameVarController );
        }

        static public function getDefaultNameVarAction() {
            return( self::$defaultNameVarAction );
        }

        static public function setDefaultNameVarController( $nameVarController ) {
            self::$defaultNameVarController = $nameVarController;
        }

        static public function setDefaultNameVarAction( $nameVarAction ) {
            self::$defaultNameVarAction = $nameVarAction;
        }

        static public function getController() {
            if ( !isset( $_GET[ self::getDefaultNameVarController() ] ) || empty( $_GET[ self::getDefaultNameVarController() ] ) || is_null( $_GET[ self::getDefaultNameVarController() ] ) ) return( self::getDefaultController() );
            return( $_GET[ self::getDefaultNameVarController() ] );
        }

        static public function getAction() {
            if ( !isset( $_GET[ self::getDefaultNameVarAction() ] ) || empty( $_GET[ self::getDefaultNameVarAction() ] ) || is_null( $_GET[ self::getDefaultNameVarAction() ] ) ) return( self::getDefaultAction() );
            return( $_GET[ self::getDefaultNameVarAction() ] );
        }

        public function getActionAlternative( $action ) {
            foreach ( self::$actionAlternative as $key => $value ) {
                if ( $action == $key ) {
                    $action = $value;
                    break;
                }
            }
            
            return( $action );
        }

        public function setView( $view ) {
          $this->view = $view;
        }

        public function getView( $action ) {
            if ( empty( $this->view ) ) {
              return( $this->getAction( $action ) );
            }

            return( $this->view );
        }
        
        public function getVarstoRender() {
            return( self::$varstoRender );
        }

        public function setVarstoRender( $varstoRender ) {
            $this->varstoRender = $varstoRender;
        }

        public static function prepareItems( $objController, $action ) {
            if ( !empty( $objController ) ) {
                if ( !empty( $action ) && method_exists( $objController, $action ) ) {
                  $action = $objController->getActionAlternative( $action );
                  $objController->$action();
                } else {
                    die( '<h1>The "' . $action . '" Action is invalid</h1>' );
                }
            } else {
                die( 'Unable to load the "' . $controller . '" Controller' );
            }
        }
    }