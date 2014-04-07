<?php

    interface iDBAdapter {
        public static function connection();
        public static function findOne( $SQL );
        public static function findMany( $SQL );
        public static function createNew( $SQL );
        public static function delete( $SQL );
        public static function updates( $SQL );
    }

    /**
     * 
     */
    abstract class DBAdapter {

        private static $host = DB_HOST;
        private static $user = DB_USER;
        private static $pass = DB_USER;
        private static $name = DB_NAME;
        private static $connection = NULL;


        public static function getCurrentConnection() {
            return( self::$connection );
        }

        public static function setConnection( $type = 'wordpress' ) {
                // self::$connection = new mysqli( self::$host, self::$user, self::$pass, self::$name );
            if ( $type == 'wordpress' ) {
                if ( !( self::$connection instanceof wpdb ) ) {
                    global $wpdb;
                    self::$connection = $wpdb;
                }

                return( self::$connection );
            } else if ( $type == 'mysqli' ) {
                if ( !( self::$connection instanceof mysqli ) ) {
                    self::$connection = new mysqli( self::$host, self::$user, self::$pass, self::$name );
                }

                return( self::$connection );
            } else { return( false ); }
        }

        public static function getTableName() {
            return( static::$tableName );
        }

        public static function setTableName( $tableName ) {
            static::$tableName = $tableName;
        }

        public static function findOne( $obj_id , $output = ARRAY_A ) {
            if ( self::getCurrentConnection() instanceof wpdb ) {
                self::getCurrentConnection()->get_row( $sql, $output );
            }
            if ( !is_null( $SQL ) ) {

                if ( $result = self::connection()->query( $SQL ) ) {
                    if ( $result->num_rows != 0 )
                        return( $result->fetch_assoc() );
                    else
                        return( NULL );
                } else
                    return( false );

            } else 
                return( false );
        }

        public static function findMany( $SQL ) {
            if ( !is_null( $SQL ) ) {

                if ( $result = self::connection()->query( $SQL ) ) {
                    if ( $result->num_rows != 0 )
                        return( $result );
                    else
                        return( NULL );
                } else
                    return( false );

            } else 
                return( false );
        }

        public static function createNew( $SQL ) {
            if ( !is_null( $SQL ) ) {

                if ( self::connection()->query( $SQL ) )
                    return( true );
                else
                    return( false );

            } else 
                return( false );
        }

        public static function delete( $SQL ) {
            if ( !is_null( $SQL ) ) {

                if ( self::connection()->query( $SQL ) )
                    return( true );
                else
                    return( false );

            } else 
                return( false );
        }

        public static function updates( $SQL ) {
            if ( !is_null( $SQL ) ) {

                if ( self::connection()->query( $SQL ) )
                    return( true );
                else
                    return( false );

            } else 
                return( false );
        }

        public static function buildSQL( $args = array() ) {

            $sql = '';
            $type = ( ( isset( $args[ 'type' ] ) ) ? $args[ 'type' ] : 'select' );
            $selectFields = ( ( isset( $args[ 'selectFields' ] ) ) ? $args[ 'selectFields' ] : '*' );
            $from = ( ( isset( $args[ 'from' ] ) ) ? $args[ 'from' ] : self::getTableName() );
            $where = ( ( isset( $args[ 'where' ] ) ) ? $args[ 'where' ] : '' );

            switch ( $type ) {
                case 'select':
                    $sql .= "SELECT " . $selectFields . "FROM `" . $from . "`";
                break;
                default:
                    # code...
                break;
            }
        }
    }