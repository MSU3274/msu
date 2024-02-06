<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'msu_db' );

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
define( 'AUTH_KEY',         'SZ>V*JGw|#eWJ_Ft:V[L^~>~=N!nUrDudM5d6?kIS.4}!MT}SEV(2/=,^SfNc?mM' );
define( 'SECURE_AUTH_KEY',  'ElvN(r &RSuVzuF tZ.l!*Yuy_1QJ`+1e>^|-[/D#6=Jc5/Aj:+>7wxr[j!zK a[' );
define( 'LOGGED_IN_KEY',    '6@39WAX#2s1Z0eSb< **1^o>2-?Uu]$3t.SR(bn_y)^<D%wApy[|.%t-3kOj[VXy' );
define( 'NONCE_KEY',        '`FlQ~M8-1z3O<+P<v;F!B5*yA6FDrwfE&(p.:+34sM[@:j]AvPSZH/5AEhiHlf)R' );
define( 'AUTH_SALT',        'g.?%8E9Pue2Ok~!LX.n#J@uBizLh_jqa <O6PWT3$oDbF$}o(>%7}%YoUm4wOAY=' );
define( 'SECURE_AUTH_SALT', 'ggD!hWwv[UK1/i`)*UGU+z<;Ql|uxUO7kv)XXXJ 3C#<0#$2m/uz-8*2aK 1CY%B' );
define( 'LOGGED_IN_SALT',   'Z:7{!MeI]tijjbwju}Zs9H94/@k;_Vzqm0g]B]0#U2]D[_l^x:/1TFI*]<%`eR7;' );
define( 'NONCE_SALT',       'Eqhgm/<ApiOUhm@m#o2p(]*Mu84:F7!a,L%^#-Pv*6k<kX}G}*5Uo{=^F!2:_YA8' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
