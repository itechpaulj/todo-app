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
define( 'DB_NAME', 'todo-app' );

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
define( 'AUTH_KEY',         'R(]q>XjD9&_:}!F5>0]V{h*/Z5+OY6nheL[C8HpMA<Z8);BLhBV2M,RKg8t&~O#/' );
define( 'SECURE_AUTH_KEY',  '-*S7W<gVv<+5g1+hFktC JgQR$VN1`{rG#O%i<#i6-GKh=u9j;{hOJ@zU;5NA>)(' );
define( 'LOGGED_IN_KEY',    '9i,<3uw_+ISl)jG.yZ5QdKsNOCwGL@sT6#|_DF1P6L5~;oT%w7DO;bf|>l8Jxp+Z' );
define( 'NONCE_KEY',        '3(me3yzzv0 ]w_qvn9jzZ2/zEL.ei*oom|;-M^@+Zah#>.|RB<42a.6N)o&8!P5S' );
define( 'AUTH_SALT',        ';ju}/pJ;Ce4ZXUc<y^a4PwX@GUrP<6Kq*(90wAhs+C&8Wd475#1YX3fiaG-,;b#_' );
define( 'SECURE_AUTH_SALT', '$t+.Ed6pn?>Ia/m/_ezzbo~#&&8S`M4Tb=w7_,&;3W3{z#:He2tkr6zK4P7Lr.9b' );
define( 'LOGGED_IN_SALT',   'V#W*%8A=s9ohbU}GenOFF c[[0a&9yUKOYg5xh1c9L3L&1VdF]e6-$88,Wq.-^6f' );
define( 'NONCE_SALT',       '`2K=Vf@(E/}euL2cWoIB8LKjE6~sRKyrNT~b-]D^Ov6yR2v.jO-E}cfEuSo6Dh[J' );

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
