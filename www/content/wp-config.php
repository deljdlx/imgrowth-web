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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'imgrowth');

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
define('AUTH_KEY',         ']&}TIco`Xxz^#t>JZs~RcAuw<$x7d5Yl@9n%[t)I?<cM/KP8P>Dueo+++}7}[|x1');
define('SECURE_AUTH_KEY',  'p7*RirXaUvavwkG|1/!$}#SAZcJf?VPP@7UPMvB^MQJ:|?;q|C/lY7;.Og!hF~n`');
define('LOGGED_IN_KEY',    'xx[fN vUPsRNM&!`gEfMd.$|AW12*{-Nq-.`!lw8{S_&Zm)bMo!f~Zkd4KUiq;o+');
define('NONCE_KEY',        '41^H@1$*(e| -{|erIRj.@?n8DHNPHH%y_KkPsH?7`]gEF5xQ*o327n9-BC-hzO8');
define('AUTH_SALT',        '(R:o#&{y0T(puzx-JIctmQAzS{Cp0gPXXTio)|stGEP7,Q2O)q|v5uSGg*`tiTAy');
define('SECURE_AUTH_SALT', 'd#Ra?e,_x|N^2HI`7LHt?3+66*.O]%)V:?1!aj93KZs0i_`RU;_{0sIq_yZL&)PS');
define('LOGGED_IN_SALT',   'F8J_(]5,RQ/4.yoA7VR#W$P_5:|K%rz| )5|.x*Xfh)[/eyVpQ]ww5Qw^WaMc[lD');
define('NONCE_SALT',       'XeQt *n[U(ql~qiT8|Z3QaO>MBX%~7AKtTf/h4c1/g*o:!}JLhlx93MB69Cw0JcY');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
