<?php
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
define('FS_METHOD','direct');
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'vesinhdaiphat');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|ESvUw.+dgMR}LK&FVF_cQCz1%>RwDN52$*R&Vuu#@id$75ylW`X~$hPUi |u[vv');
define('SECURE_AUTH_KEY',  'pt9LY8XQ#G`9]*F_rD8Z*4(|8{fm==q|Jmit|[Q]5lo1^*v/S@W(Z)r$x[OB`DNL');
define('LOGGED_IN_KEY',    '?wF!s/@(^~p~(:@C@RtwGzqKl8pn!KWX#<^6/qK|QH=->//e9xt7`SAehG}U3iuM');
define('NONCE_KEY',        'd|WM ,B) {TJFv[bgg/%a:H>3;$!Y#Kv&<vhgj}eMJ8$N3ac;J%-8x vPs?p#`Iw');
define('AUTH_SALT',        'hmG-(=,iS00D&-*vv~7TrxoiIy.5][L>:fX+lXPW{(eLFaZQ%  =|g1WjRO!j*w4');
define('SECURE_AUTH_SALT', 'Lonn`PVSw>O{7CDyoI8Pafe?/>kN!heeB`BIV^oe:w_@Q1Tz[I/[C@Zva<-R6^dX');
define('LOGGED_IN_SALT',   'G,Oca._Gepz:qab^5 jr>qkwQ8gu#pYEHm=6A3/bbb9>{Q$F6k3#KPAXU9CG!,ip');
define('NONCE_SALT',       '$b8-DH8JC@*U>#FJ1q>&w7.TvDRO}F&Qw~E[z=)8XGoU:.w35ibr:J#@JUo3o+Yy');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'tp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
