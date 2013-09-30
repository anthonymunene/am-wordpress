<?php
/**
 * The base configurations of the WordPress.
 *
 * This file is a custom version of the wp-config file to help
 * with setting it up for multiple environments. Inspired by
 * Leevi Grahams ExpressionEngine Config Bootstrap
 * (http://ee-garage.com/nsm-config-bootstrap)
 *
 * @package WordPress
 * @author Abban Dunne @abbandunne
 * @link http://abandon.ie/wordpress-configuration-for-multiple-environments
 */


// Define Environments - may be a string or array of options for an environment
$environments = array(
	'local'       => array('.local', 'local.'),
	'development' => 'dev.',
	'staging'     => 'stage.',
	'preview'     => 'preview.',
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

		if(strstr($server_name, $env)){

			define('ENVIRONMENT', $key);

			break;

		}

	}

}

// If no environment is set default to production
if(!defined('ENVIRONMENT')) define('ENVIRONMENT', 'production');

// Define different DB connection details depending on environment
switch(ENVIRONMENT){

	case 'local':

		define('DB_NAME', 'am-wordpress');
		define('DB_USER', 'root');
		define('DB_PASSWORD', 'makeshift82');
		define('DB_HOST', 'localhost:3306');
		define('WP_DEBUG', true);

		break;

	case 'development':

		define('DB_NAME', 'am-wordpress');
		define('DB_USER', 'root');
		define('DB_PASSWORD', 'makeshift82');
		define('DB_HOST', 'localhost:3306');
		define('WP_DEBUG', true);

		break;

	case 'staging':

		define('DB_NAME', 'database_name_here');
		define('DB_USER', 'username_here');
		define('DB_PASSWORD', 'password_here');
		define('DB_HOST', 'localhost');

		break;

	case 'preview':

		define('DB_NAME', 'database_name_here');
		define('DB_USER', 'username_here');
		define('DB_PASSWORD', 'password_here');
		define('DB_HOST', 'localhost');

		break;

	case 'mobile':

		define('DB_NAME', 'database_name_here');
		define('DB_USER', 'username_here');
		define('DB_PASSWORD', 'password_here');
		define('DB_HOST', 'localhost');

		break;

}

// If batabase isn't defined then it will be defined here.
// Put the details for your production environment in here.
if(!defined('DB_NAME'))
	define('DB_NAME', 'database_name_here');

if(!defined('DB_USER'))
	define('DB_USER', 'username_here');

if(!defined('DB_PASSWORD'))
	define('DB_PASSWORD', 'password_here');

if(!defined('DB_HOST'))
	define('DB_HOST', 'localhost');

if(!defined('DB_CHARSET'))
	define('DB_CHARSET', 'utf8');

if(!defined('DB_COLLATE'))
	define('DB_COLLATE', '');

// The address where your WordPrss core files live
// and the publicly accessible URL for the front-end
if(!defined('WP_SITEURL'))
	define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME']. '/cms');

if(!defined('WP_HOME'))
	define('WP_HOME',    "http://${_SERVER['SERVER_NAME']}");

/**
 * OPTIONAL: Move wp-content directory
 *
 * You can choose to move and rename the wp-content directory out of
 * the main Wordpress install directory. The benefits of this are:
 * 	- Improved security
 *  - Clean separation of core files and custom files
 *
 * Uncomment the following to move your wp-content directory.
 * If you also want to rename the directory, change the $content_dir
 * variable to what you want it to be instead.
 * NB:
 */
if(!defined('WP_CONTENT_DIR'))
	define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/content');

if(!defined('WP_CONTENT_URL'))
	define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/content');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

if(!defined('AUTH_KEY'))
	define('AUTH_KEY', 'G@7f6(ku{9t97o7-^bL7+#O2MJ3yq8] 1skn?07h)~L!ns*,~[x]iW{5iN/@<HE2');

if(!defined('SECURE_AUTH_KEY'))
	define('SECURE_AUTH_KEY', '1,9@%gTKn,b:?Y^H:V|wM[buoB Y+?N!,<]*#k#Qyi?_|b^N}|~1k+fJ-80,:H!~');

if(!defined('LOGGED_IN_KEY'))
	define('LOGGED_IN_KEY', '(LG4a.g lX>28M!X=nB|}^79v>s7VRv9~#7r*#PlT9FDk@*jZ|R >a9+I1wTlV$+');

if(!defined('NONCE_KEY'))
	define('NONCE_KEY', ' sIG@BM35$j{Hm7|PXW]I)Ef6)1jdDX/V(pUn$a*Q/#vy2V+:^ur+k.]lGoLkJ28' );

if(!defined('AUTH_SALT'))
	define('AUTH_SALT', '_+P!f|;a>R;|pAfK^Xwtrob <DGZN!Ct^y>0&tSl~1U&}S1]H<v!Z}bEJWNURrgN');

if(!defined('SECURE_AUTH_SALT'))
	define('SECURE_AUTH_SALT', '%mS%Y#pfz@ti@9B1N]-YN)K##VOC{^?mW5&C2|=}BW%MW9v_Evc)a{|iqaGO7x3>');

if(!defined('LOGGED_IN_SALT'))
	define('LOGGED_IN_SALT', '?gu+D&k=-Ee<&U|4Kjfzdq%XFX@I6ynM.P(=sAMtz1zX*e:VyTPogPy~h8?-IG[)');

if(!defined('NONCE_SALT'))
	define('NONCE_SALT', '?l?)pES-=s`bCuWE{Yvbq&r(<B|-]>8 )`6_+p~$!U.F5BbZBFk~zXJnKokPWdTs');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
if(!isset($table_prefix)) $table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
if(!defined('WPLANG'))
	define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if(!defined('WP_DEBUG'))
	define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
