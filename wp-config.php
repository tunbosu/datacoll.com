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
define( 'DB_NAME', 'data_coll_db' );

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
define( 'AUTH_KEY',         ':4cH1F#fv^kejhudtf2vS!.!y`FZS%D{?G)0.Og6={X+3|F @]WS3{.;=_:p0D%,' );
define( 'SECURE_AUTH_KEY',  '0gT^-4_upA3)mQkhx[fxQ0!;t1IOgzuXW2?pSs91v[ft_5;1S2V>C!=RY[d%>pE|' );
define( 'LOGGED_IN_KEY',    '`-Bqq+v{t){Xf|(s06.&WfI7Qwz=5*X1Rnqe{?IRJ+kcGzEP?2qk,iaW_&* 96Fx' );
define( 'NONCE_KEY',        'f1zkzvD1KR3&U>#].gahqop^glLDVZPFz|E&l<unj&C|u%Wo@f`p=$z_)9vr9tu~' );
define( 'AUTH_SALT',        'Q3 P.Kkg%p6rr*j<j@d|W3Uy{w6sR9U:1Fwlpn&k5J*0^IXR@vC5mMmgx3N<p/}{' );
define( 'SECURE_AUTH_SALT', 'Ly=rfwNM;:r$^Mrr_EJ@uFpY9=)N,r] vW()kv90-zL$BL(BbR1S|=WLgDpEw,G>' );
define( 'LOGGED_IN_SALT',   '$<7*xQ?asOS7piC/U^:/8A*jJ`)*?GxK!mJz;=/DE]WfY(ZDw{bLFA!@_DxuZwh(' );
define( 'NONCE_SALT',       'Ry#4yFrL}{e7!A.iFFAK`15iC74awhykBg08([9q8gZZvw=Agn!RG*u!kk[ewXb~' );

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
