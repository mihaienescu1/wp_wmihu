<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'whymihu');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'W#F|h$#PU-fHY:yx4oXkdp|+h*YOs-(xOw@=*d.KOZ/-B#{0oucL(b#7:P@l^}TG');
define('SECURE_AUTH_KEY',  ',-[r0SQ|*pK%?$9z3W@KQAJhb)QJ|sh;%:X;q`^d:6}/(?UU/c3G#uI@KF Soz.v');
define('LOGGED_IN_KEY',    'Lf+_L~{yPLU<90gG:DelP{^^K;mjQ?=@LlVugI0LRk:Nyx&8kOsS4r*lX(+|P&>a');
define('NONCE_KEY',        'atEsl;Z:cL<#*V6g_B/z3@WlUHl)8E&<Ns2EE<%*aLD@.NH=++;^bG/ plHc;5[I');
define('AUTH_SALT',        'Ht)k>G<sObr)A 9QTgLsB+zre/k)I(-MLjBmkKTT5E8]E5mgtHS5IG+5vL7NNoNd');
define('SECURE_AUTH_SALT', '?69B#!C,>tkBvji}bmkPHJP1MFUYXa@&:JLyMB?^c*x6oCN0 Z$gqJhu)+?B<8S6');
define('LOGGED_IN_SALT',   'j%9:H%qe^GnI90l2>X).qsAdB~Vvl2J2<T1K|-g<1SM+_HZbB|M5b0h+wKa>Qi1r');
define('NONCE_SALT',       'YL$+i4$K`>UC#4*?B)HhVsV#FO9]Bv55g#+:ezV`sND>r4C*Lx8;D_j0S%Siq+JM');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
