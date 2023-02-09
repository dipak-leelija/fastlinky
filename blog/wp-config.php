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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'fastlinky_db' );

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
define( 'AUTH_KEY',         ':D|}D-9b{-s=+r>!u=otIM8`?HORvhia9fVA19Bwo0u2jbrh8Ucv-PS4w0+^LO@3' );
define( 'SECURE_AUTH_KEY',  '<c&?HAElGL2BD%MiUT3vQK1c/An1hsjw*S8u_<.X`D]LJvc`/_HO[~XCI#9V --.' );
define( 'LOGGED_IN_KEY',    ';%zmL0,yxJM>#y)fV5C0.bNC;n8}[?nSfc51W?ukVmX1>Wufj.Yh$u7PL$U n)Tb' );
define( 'NONCE_KEY',        'u&UjL.j4L0dt_Zb-r`NCao$:{z}DD_7tHiHwj{S;no,s-`[d~5|yaJ.kP4,G:lVv' );
define( 'AUTH_SALT',        'yHO%K$n_q.8zJlg,sT&O]ROp;1|vBqL;>Q5xL{{z9]{G9puSH@j?j{ Y?7EJdLJK' );
define( 'SECURE_AUTH_SALT', '#p71(t*|,ng#04[O.ir<._ws%ot63cl#wCE!Oa4iSmJ%329YpV{{$fDsbEZ8j)/&' );
define( 'LOGGED_IN_SALT',   'IP~)>z+QWRxj]^Rj.^eq:#.1J0W3=}po]xd_@uYh`{VE- qPqq$*yUJ:PQ:9k264' );
define( 'NONCE_SALT',       'mMu/rI6f(/_2Q*l_.!1r|l @f-5D+ sakjg])<6wyolmnh*)BExM)`wg{EasJ8L>' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
