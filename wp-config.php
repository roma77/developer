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
define( 'DB_NAME', 'developer' );

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
define( 'AUTH_KEY',         'bt=f)Ui!0ZD>-|g_Som]=,.|[Us0Zamg>@M-&.|Vb@|El0I6d:Dy8!UkFM(r+[cb' );
define( 'SECURE_AUTH_KEY',  'wBY&uk>SC<t|uz|ltlP;BmlrVVw,*Xw@QX_b!rQk`e=eK]O7BVe#+Kr>``u.I!6X' );
define( 'LOGGED_IN_KEY',    'Ar~Tr3@}xql(7DexRAt9SWtK<;nuzjNth_|gw2-iG91b@yhMZ9WaF})(~zgoDF?a' );
define( 'NONCE_KEY',        '#Sw}qT*$HGhD2{}>QMc7f-?3MpC2epD:ktC6m_!rlR;jNoJInUI_PC2Vk$p{}X+p' );
define( 'AUTH_SALT',        '>SZ~`DoxoSemH`nmwq=H<sTk;(8Iz$o:KVW@oe9BrGpVsxY;;^cRAHmTaoXUyVEF' );
define( 'SECURE_AUTH_SALT', '<O{FLi;GPl&Y#{:&Wuu0Mjow:Ae7qzb/|KXDT%]itn:BHc[ci~d`uV<FaK@@yMz+' );
define( 'LOGGED_IN_SALT',   '#{I^?CwE0},+k8<v)VH~Ngzi}/@{.@;F*9xc-g:18od8/Zbmj274_o~K1QXPTA]E' );
define( 'NONCE_SALT',       'p-C8b!8%(b#T-13nA3W/uMeTU$hzkH`UBWl~OM6bz5x`$(JTExkO{jENnde ()<J' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
