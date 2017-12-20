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

define('WP_HOME', getenv('WP_HOME') ?: 'http://mactalento.com');
define('WP_SITEURL', getenv('WP_SITEURL') ?: 'http://mactalento.com');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('DB_DATABASE') ?: 'macwp');

/** MySQL database username */
define('DB_USER', getenv('DB_USERNAME') ?: 'macwp');

/** MySQL database password */
define('DB_PASSWORD', getenv('DB_PASSWORD') ?: '');

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
define('AUTH_KEY', 'rA}NPd?@fC0)d)Sg_ Z|?IE+{Cj4)~6)&3C=ziCxhsz.V60O@x29RG3dTfnqV>6T');
define('SECURE_AUTH_KEY', '/mEa}J1f/h#l140fHs2mZjwuna}Y$0BG+!skjF ?+P]4eRubM1Ap-E/#2SJji^p^');
define('LOGGED_IN_KEY', 'P%9u44<|IeGPfTMbW>^/:(]Z`78K]2U64U#Ehs3;z<uxf/=i+Up)h7I@J=;?]-#m');
define('NONCE_KEY', 'by/;3Bg>x,TN|r[mG1hQK]?Y4T@ZF^;q1bEzxF8M7?qDB_)YAP~0[W|q))7O]~DZ');
define('AUTH_SALT', 'seTNA(P)0^c3kp[Tld*)]~L@.H}T4!!$!`}~K~l*ZD9}6hbzp%?ST+qzsI>6z2JD');
define('SECURE_AUTH_SALT', 'i]+?~$UCnUUgC|Gt(A;+Sdo3:0*gC|!VXKj)P^]s=]J4K9HW,&!(4}D2x=>(cdjB');
define('LOGGED_IN_SALT', ']vsk})CCJN0 ,-HVAVT^%IA?2RJKkcnIza3=M_YLv:UcW7+)uwJ/TM+z6;i4{WRy');
define('NONCE_SALT', 'ZZkb2>ECm|<Tb5*nR7$2i(&hJvBhBuG:r5!ZNS`0#YcmgA[tS!o %bJ]JLUMZY<v');

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
