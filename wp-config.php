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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'revise' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'GVW=[tz[l=1Z>hVW5aCcr[cA5]D~_~-I3+[UXNLN]zoq$[#yG Km,}z!*2FMVT5w' );
define( 'SECURE_AUTH_KEY',  'NZH@]d&8{AU!r<HWJU;ViS>`f|TN^,!4s1e=b0M@q{/_F/*?Y4<b;%.$U{:%7?=$' );
define( 'LOGGED_IN_KEY',    '`&3..^(u%*IosEEMUy8Uxe,umnBRSWA/y2;/ tj6bOTM1Su~&6Hx.s1G_xQcltU?' );
define( 'NONCE_KEY',        'X/ q|V?Yx=<l?]TZ9eF6z.O`Y*EI;%6o8s)]idHX`):Sozo6!c%N^y4v$L,Fh8y;' );
define( 'AUTH_SALT',        'I@}JW!`aVd&?eOop;Qdy9p$U_WU$Xuff@QorQov~0Y dwc._J4W`LU:B9UEfpCy#' );
define( 'SECURE_AUTH_SALT', 'y(D}JQ%A20q]M+@!uHbXM+/rso4J-l@=D8c:hoC)Q~g/U|mrqki  2qekrRT$_In' );
define( 'LOGGED_IN_SALT',   'ra[Y-dK,gH(mGvv ._2P[m-6URxV/B6Au8[oHG.7ffMEXdBPW0k_>pR]QWZ&p}e=' );
define( 'NONCE_SALT',       ':o$fJYc2kWf+9%=,,c HvSmw;1.}22Iz{;qYH-Iofec|)B|!a+Z,%ZkxeBo}(`]&' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
