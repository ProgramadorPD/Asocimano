<?php

	function getParams() {
		return( Helper::getParams() );
	}

	function getUrlImage( $img ) {
		return( Helper::getUrlImage( $img ) );
	}

	function getUrl( $controller = 'home', $action = 'index', $params = array() ) {
		return( Helper::getUrl( $controller, $action, $params ) );
	}

	function getTitleDocument() {
		return( Config::getTitleDocument() );
	}

	function getViewPath( $controller = 'home', $view = 'index', $params = array() ) {
		return( Helper::getViewPath( $controller, $view, $params ) );
	}

	function registerGlobals( $varName, $varValue = null ) {
		return( Globals::register( $varName, $varValue ) );
	}

	function getGlobals( $key = '' ) {
		return( Globals::get( $key ) );
	}

	function getController() {
		return( Controller::getController() );
	}

	function getAction() {
		return( Controller::getAction() );
	}

	function setView( $view = 'index', $controller = 'home', $index = 'viewUrlForRender' ) {
		$index = ( ( empty( $index ) ) ? 'viewUrlForRender' : $index );
		$controller = ( ( empty( $controller ) ) ? 'home' : $controller );
		$view = ( ( empty( $view ) ) ? 'index' : $view );
		return( registerGlobals( $index, getViewPath( $controller, $view ) ) );
	}

	function render( $viewPath ) {
		return( View::render( $viewPath ) );
	}

	function isLayout() {
		return( View::isLayout() );
	}

	function getPageLayout( $file ) {
		return( Template::getPage( $file ) );
	}