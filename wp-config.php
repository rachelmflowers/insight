<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// Define Environments - may be a string or array of options for an environment
$environments = array(
	'local'       => '.loc',
	'staging'     => '.pixelplaycreative.com',
);

// Get Server name
$server_name = $_SERVER['SERVER_NAME'];
foreach($environments AS $key => $env){
	if(is_array($env)){
		foreach ($env as $option){
			if(stristr($server_name, $option)){
				define('ENVIRONMENT', $key);
				
				break 2;
			}
		}
	} else {
		if(stristr($server_name, $env)){
			define('ENVIRONMENT', $key);
			break;
		}
		
	}
}
// If no environment is set default to production
if(!defined('ENVIRONMENT')) {
    define('ENVIRONMENT', 'production');    
    /**
      * GoDaddy specific config
      */

    require_once( dirname( __FILE__ ) . '/gd-config.php' );

    if(!defined('FORCE_SSL_LOGIN')) {
        define( 'FORCE_SSL_LOGIN', 1 );
    }
    if(!defined('FORCE_SSL_ADMIN')) {
        define( 'FORCE_SSL_ADMIN', 1 );
    }
    if(!defined('FS_METHOD')) {
        define( 'FS_METHOD', 'direct');
    }
    if(!defined('FS_CHMOD_DIR')) {
        define('FS_CHMOD_DIR', (0705 & ~ umask()));
    }
    if(!defined('FS_CHMOD_FILE')) {    
        define('FS_CHMOD_FILE', (0604 & ~ umask()));
    }
} 

// Define different DB connection details depending on environment
switch(ENVIRONMENT){
	case 'local':
		define('DB_NAME', 'insightba');
		define('DB_USER', 'root');
		define('DB_PASSWORD', 'root');
		define('DB_HOST', '127.0.0.1');
		define('WP_DEBUG', true);
		define('WP_SITEURL', 'http://insight.loc/');
		define('WP_HOME', 'http://insight.loc/');
		break;
	case 'staging':
		define('DB_NAME', 'insightba_wp');
		define('DB_USER', 'rachelmflowers');
		define('DB_PASSWORD', '1039Vernon');
		define('DB_HOST', 'mysql.insight.pixelplaycreative.com');
		define('WP_SITEURL', 'http://insight.pixelplaycreative.com/');
		define('WP_HOME', 'http://insight.pixelplaycreative.com/');
		break;
}

// If batabase isn't defined then it will be defined here.
// Put the details for your production environment in here.

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
if(!defined('DB_NAME')) {
    define('DB_NAME', 'insi3259339413');
}

/** MySQL database username */
if(!defined('DB_USER')) {
    define('DB_USER', 'insi3259339413');
}

/** MySQL database password */
if(!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', 'OfVHSNr(8M0');
}

/** MySQL hostname */
if(!defined('DB_HOST')) {
    define('DB_HOST', 'insi3259339413.db.3259339.hostedresource.com:3309');
}

/** Database Charset to use in creating database tables. */
if(!defined('DB_CHARSET')) {
    define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if(!defined('DB_COLLATE')) {
    define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
if(!defined('AUTH_KEY')) {
    define('AUTH_KEY',         'Zmw_K*bOmS4(_5-=QHMn');
}
if(!defined('SECURE_AUTH_KEY')) {
    define('SECURE_AUTH_KEY',  '/MN4C_-@bp1kqcEyf59S');
}
if(!defined('LOGGED_IN_KEY')) {
    define('LOGGED_IN_KEY',    '*mr@nZ%nnIfjHEbwT-J7');
}
if(!defined('NONCE_KEY')) {
    define('NONCE_KEY',        'AqzESn1LPyJCPb Z+9w ');
}
if(!defined('AUTH_SALT')) {
    define('AUTH_SALT',        'UX+vY8H=AE3#M9=@0S-E');
}
if(!defined('SECURE_AUTH_SALT')) {
    define('SECURE_AUTH_SALT', 'JZ$A1ZMVBk v1Stt0rBX');
}
if(!defined('LOGGED_IN_SALT')) {
    define('LOGGED_IN_SALT',   'QBzYFB$KqAyXr@KO@!ct');
}
if(!defined('NONCE_SALT')) {
    define('NONCE_SALT',       'x)34SMjED$PIy$+@$& W');
}

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
if(!isset($table_prefix)) $table_prefix  = 'wp_w5v7qwrc8j_';


/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
if(!defined('WPLANG')) {
	define('WPLANG', '');
}

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
if(!defined('WP_DEBUG')) {
    define('WP_DEBUG', false);
}    



/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') ) {
	define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');