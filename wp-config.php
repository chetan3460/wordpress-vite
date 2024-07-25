<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_vite_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '|9nHV|7;jpnNlTEX+Css4o|R%y^;0-O$^O^hs>j]~Uo JfY_i6I`j_zR<yMBb)C`' );
define( 'SECURE_AUTH_KEY',  'Xs%l25XJj3ld]Rvpdk)`~kjjxLD_mf|NmUh&;E~%]*eh%P,:IUK3k58bBpj_$YL5' );
define( 'LOGGED_IN_KEY',    'N=S;]:B|a]Kl}jsVM4d8]Bzv_[>j(&MjB]2OV &k9&Fun>KxKV8%JZMUAcYt,1SA' );
define( 'NONCE_KEY',        '~6d6?qw))jyUUXbkkgCz`k>jY!lhqv^4L^ep+5wKDaJ>3MAV[Sfi;nMn7<|K4_T3' );
define( 'AUTH_SALT',        'Gqj6No-CwT5#s+ovmlL[Uo-X6ycn4`cFknoRWH!(ufmuP<b>hw%5<j-y{D^iDTWt' );
define( 'SECURE_AUTH_SALT', 'P5D(YQKNr4CowxUN ~ge%?:EIs{8;FVP,8]H,K^keEZ0vUl_e]eC.sb`UcM]l/;o' );
define( 'LOGGED_IN_SALT',   '8g0*w &z%]2laCpc[~oSIAxtZx+*tL,3D}VX kD91M|6rhh6gHw!ffqen>uW5z>T' );
define( 'NONCE_SALT',       '3JDS3fraNP:X:pqxP(,Zs4APg*%)l6q?[[fwC<9/VUy(_=hQfgO]g&I)o#@iqUMk' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';


define('IS_VITE_DEVELOPMENT', true);