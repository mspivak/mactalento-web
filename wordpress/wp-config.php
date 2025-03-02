<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

define('WP_HOME', getenv('WP_HOME') ?: 'https://mactalento.com');
define('WP_SITEURL', getenv('WP_SITEURL') ?: 'https://mactalento.com');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('DB_DATABASE') ?: 'macwp');

/** MySQL database username */
define('DB_USER', getenv('DB_USERNAME') ?: 'macwp');

/** MySQL database password */
define('DB_PASSWORD', getenv('DB_PASSWORD') ?: '9lA6NubSnN');

/** MySQL hostname */
define('DB_HOST', getenv('DB_HOSTNAME') ?: 'localhost');

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
define('AUTH_KEY',         '8Rdn]pCRLw#-aH{Q9p$=Lf(%n0Qo|x*SBc.=Pvm|DsWg b3YBTW/diAFRmLT%8yn');
define('SECURE_AUTH_KEY',  '<FtW0~d!)#Npn+|(n;#~reWkQ& yAzoP:FT1]YYhL-06c6,tPR93/]v/_:|ID&b~');
define('LOGGED_IN_KEY',    '+)v)zROaXL*M;+=.2N:R99S,  _B*A`Z,Pp]*Q-BPCP=TuhqdoVh}?d0sr$xxqq7');
define('NONCE_KEY',        'fxbvH*=_Rj3:-jhm+2-[wtexu<$KRoWva+{c-V_F*{*G+N^Y$pv_Q{@_Bs5t4X}6');
define('AUTH_SALT',        'l|YpAcZ_Y+VMP%2f.?<3HiqC@xy{g(4}<yahG6@d,`m,HW/q=Q#P3CY+S!m9j+1T');
define('SECURE_AUTH_SALT', 'b &K$*<hnT0S|3#6M:Ei+4}CRC,@h2k:dFh<57Ivt.-XWx2( l;9!y|m8+7n*A^p');
define('LOGGED_IN_SALT',   'E%mxvf0o+3Rmg&c:Xc,|$KTU|MYeU25**gx!M$h@xeuDRGmGirjA|+Kia<q1|-i/');
define('NONCE_SALT',       '[uEE0~|?ak>W*d3.;=4n@s<GKRoH@MO[n6LkMM%H8NCO!yNIQe^V]H&$<]#%Kf#+');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'mc_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('FS_METHOD', 'direct');
