<?php

    /**
    * 
    */
    class Home extends Controller {

        public function __construct() {
            $defaultSettings = array(
                'viewUrlForRender' => getViewPath( getController(), getAction() )
            );
            registerGlobals( $defaultSettings );
        }

        public function index() {
            // $viewUrlForRender = getGlobals( 'viewUrlForRender' );
            // $varsToRender = array(
                // 'Users' => User::all(),
                // 'other' => 'my other var'
            // );
            // $this->setVarstoRender( $varsToRender );
            // $this->setView( 'create' );
            // View::setLayout( 'test-layout' );
            // setView( 'congreso' );
        }

        public function congreso() {
            // View::setLayout( 'test-layout' );
        }

        public function noticias() {
            // View::setLayout( 'test-layout' );
        }
    }