<?php

	/**
	* 
	*/
	abstract class Globals {

		static private $globalsDefault = array();

		static public function register( $varName, $varValue = null ) {
			if ( empty( $varName ) ) { return( false ); }

			if ( is_array( $varName ) ) {
				foreach( $varName as $key => $value ) {
					$GLOBALS[ $key ] = $value;
				}
			} else {
				$GLOBALS[ (string)$varName ] = $varValue;
			}

			return( true );
		}

		static public function unregister( $varName ) {
			if ( empty( $varName ) ) { return( false ); }

			if ( is_array( $varName ) ) {
				foreach( $varName as $value ) {
					unset( $GLOBALS[ $key ] );
				}
			} else {
				unset( $GLOBALS[ $varName ] );
			}

			return( true );
		}

		static public function get( $key = '' ) {
			if ( !empty( $key ) ) { return( $GLOBALS[ $key ] ); }
			else { return( extract( $GLOBALS ) ); }
		}

		static public function prepareDefaults() {
			self::$globalsDefault = array(
				'varTestGlobal' => 'Hello World!',
				'params' => getParams()
			);
		}

		static public function init() {
			self::prepareDefaults();
			self::register( self::$globalsDefault );
		}

	}