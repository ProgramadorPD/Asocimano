<?php
    defined( 'THEME_APP_PATH' ) || define( 'THEME_APP_PATH', THEME_PATH . 'app' . PS );
    defined( 'THEME_ASSETS_PATH' ) || define( 'THEME_ASSETS_PATH', THEME_APP_PATH . 'assets' . PS );
    defined( 'THEME_STYLESHEETS_PATH' ) || define( 'THEME_STYLESHEETS_PATH', THEME_ASSETS_PATH . 'stylesheets' . PS );
    defined( 'THEME_JAVASCRIPTS_PATH' ) || define( 'THEME_JAVASCRIPTS_PATH', THEME_ASSETS_PATH . 'javascripts' . PS );
    defined( 'THEME_CONTROLLERS_PATH' ) || define( 'THEME_CONTROLLERS_PATH', THEME_APP_PATH . 'controllers' . PS );
    defined( 'THEME_MODELS_PATH' ) || define( 'THEME_MODELS_PATH', THEME_APP_PATH . 'models' . PS );
    defined( 'THEME_VIEWS_PATH' ) || define( 'THEME_VIEWS_PATH', THEME_APP_PATH . 'views' . PS );
    defined( 'THEME_HELPERS_PATH' ) || define( 'THEME_HELPERS_PATH', THEME_APP_PATH . 'helpers' . PS );

    defined( 'US' ) || define( 'US', '/' );
    defined( 'ROOT_URL' ) || define( 'ROOT_URL', 'http://' . Config::getServerHost() );
    defined( 'CONTENT_URL' ) || define( 'CONTENT_URL', ROOT_URL . 'wp-content' . US );
    defined( 'THEMES_URL' ) || define( 'THEMES_URL', CONTENT_URL . 'themes' . US );
    defined( 'THEME_HOME_URL' ) || define( 'THEME_HOME_URL', THEMES_URL . Config::getThemeName() . US );
    defined( 'THEME_APP_URL' ) || define( 'THEME_APP_URL', THEME_HOME_URL . 'app' . US );
    defined( 'THEME_ASSETS_URL' ) || define( 'THEME_ASSETS_URL', THEME_APP_URL . 'assets' . US );
    defined( 'THEME_STYLESHEETS_URL' ) || define( 'THEME_STYLESHEETS_URL', THEME_ASSETS_URL . 'stylesheets' . US );
    defined( 'THEME_JAVASCRIPTS_URL' ) || define( 'THEME_JAVASCRIPTS_URL', THEME_ASSETS_URL . 'javascripts' . US );
    defined( 'THEME_IMAGES_URL' ) || define( 'THEME_IMAGES_URL', THEME_ASSETS_URL . 'images' . US );
    defined( 'THEME_FONTS_URL' ) || define( 'THEME_FONTS_URL', THEME_ASSETS_URL . 'fonts' . US );

    defined( 'CHARSET' ) || define( 'CHARSET', 'utf-8' );
    // defined( 'LANG' ) || define( 'LANG', 'es_CO' );
    defined( 'LANG' ) || define( 'LANG', WPLANG );