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
define( 'DB_NAME', 'registracijos_forma' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '/!mY[L0IPU(Wk{U7uAs2IUG/Mf<1.bduIa Qov[u!9tc>L_Ru:_$m6gqB@o1!?Zd' );
define( 'SECURE_AUTH_KEY',  'B[(i|[?i_~1l20W$L&&=vP?{3P9EpeDDh=n3MeW+Hz&~R6OC|OPod+?9-!~We&18' );
define( 'LOGGED_IN_KEY',    'd9I2)=cr9;~,c|6Vr`KSX.dxj{,zjb~l4?9XCnDl*Rucc,7<_1f9~VAxP)K<pd07' );
define( 'NONCE_KEY',        'WM?URk$=%>Y}v*R%L5fsE<dw-&hBa[1)$F5PQ>a|9e0Hig)_U{5<E70WpPYmI|+r' );
define( 'AUTH_SALT',        ',szRo<pV-lRnIQ,qqoiJ;>I/|C}cbK=;hJcLIB2`d{_d0)L>$CM{nc`a^D<L/Dli' );
define( 'SECURE_AUTH_SALT', '<Kud0)W{M`!<9_l/vpN,NCD],  Du%TE>~(%!pKLClFN[es>K`rNCN<qJ-oE~qg~' );
define( 'LOGGED_IN_SALT',   '8vu=1^L#fUnk[_:+ 4fB@42;k/qfTf<i&1ZJkl-{wPezlx$iE,x`2t,GTDV#vAte' );
define( 'NONCE_SALT',       'Bo*[OK]wvXiGk+1mE-*BPT=kI2jln~4a8f<yV%Mxk/PB}z.):#Tg8B3A,l{#5g4f' );

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
