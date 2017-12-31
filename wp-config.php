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
define('DB_NAME', 'wp_lapizzeria');

/** MySQL database username */
define('DB_USER', 'vicente');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '/7wh{S)k^To9O6DYH_rSGDO1LhE%f{b71o`%pPGt[G7!M1vD_~Hqw>Vd%FZ5=+t]');
define('SECURE_AUTH_KEY',  'o%kbHmt_??Ev|7]5.VG!Sq5KTeXXS#N=I^#]6Z3~JLN3,y2KapiC</F~+Sa$QXTi');
define('LOGGED_IN_KEY',    'T/HD(@tD]|}u(j]P$ifea$]zBBGa)DjhdH4TE@l]<Nqo{`|Z9B83R` m26tL7a68');
define('NONCE_KEY',        '#7`] a5hXNQmAS]Yf.BD~yuj!5g&~%B 4QG+ILydT#ul}9:$CPQQ>-~4V/Q) $6|');
define('AUTH_SALT',        '|wq!$oWnvefG(~,-)T#_e)YVUwW{.]GsB)<&;UV vV7?E# lEC[/5P}oC_R5:$2?');
define('SECURE_AUTH_SALT', 'bWti[6CN}h`yB:Dw00.tP}19F1mHgPz,8q|*[?;To)|Az+FyFdExb`x]@;(Wq`_h');
define('LOGGED_IN_SALT',   'y!I8]*f/ AbV{rt?B~/u^aFe]{w*K<*61EX`Sgz2IpFvdFzJ/9>05PS|U{8083s]');
define('NONCE_SALT',       '^C%i RFWMxtST]tTlB?^m;*u>fw{gqb2#=fAUlE#8@roZNI7NwK}np&>fURa#DWg');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
