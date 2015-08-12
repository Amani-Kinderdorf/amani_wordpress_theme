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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'amani_wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123');

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
define('AUTH_KEY',         'r#&}(sG?^VxPMykkw(e2z&_@yBG:8+kOJ.j1iS#7PrT#&RQuz->p>+t L^)w3Qr&');
define('SECURE_AUTH_KEY',  'Z+I=4C&kKViBsDDp%9>&]UV&Nj>_5d+*f$Ms@VS8yUn{)kCZK(qeW^V9PW&Ez@Eo');
define('LOGGED_IN_KEY',    'myK`T!CLm=7P0{0O^s1E}[K( },NI^I&i2nGQwv,iQK6Kdb)jYG*IF?OpaU^G/~I');
define('NONCE_KEY',        'j[0I!se{uknnuautB+KO%+b%y$p~id+# bV^Av3bLU][Vc{~~3x)Z4xD9M%nRjsb');
define('AUTH_SALT',        ';0,X./;FFq8$`3f+2lj.2|a~?C{Jl?564oCyP(re_D#}K:5IS$VSj(D<3@I1EkD{');
define('SECURE_AUTH_SALT', 'oyz:9aU8ac^Y ^D4[QDK[ocWAyg/hZc0(F%R&z29?0A*m{n|(s#+%=U]!J8<*hA;');
define('LOGGED_IN_SALT',   '!a#{HXgM+%/<Az,+h9CoE:Dk(&N4=`m1op=,rG0r-^02hd{FF+|WjCEt]|r!+^T.');
define('NONCE_SALT',       'hS^l_!ZTA3.P4J:Mdj}+#Z*NW|9*Y382}=J#0eA>Z|^V`@ykq!7-yhfPRdjc(qo*');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
