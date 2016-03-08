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
define('DB_NAME', 'k2svc_shop');

/** MySQL database username */
define('DB_USER', 'k2svc_k2shop');

/** MySQL database password */
define('DB_PASSWORD', 'k2_shop');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET',”);

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
define('AUTH_KEY',         'MH:=9_~$<G-K[R8xV;qL!OnSxTLF|(3P#8gp)|gBo$^T>FO/n+Vn/{J6J&acx6%g');
define('SECURE_AUTH_KEY',  '4HV*lYSSv(TwoG|VuO,4W{E|}hr-fp_)_L(n|EYt(1ehz{cIx&yY>*^AwseVSEof');
define('LOGGED_IN_KEY',    '`rff5G#v1b2]+`C_;U[M/p1|!%IhLvBh^`?pBgJ.?V^+oC;r.thQW{*;4|vg<;|S');
define('NONCE_KEY',        'Gzik-N ,^K3#*Z2f/-B`+:pTBts3)y<3kkf%fETiVPI`k1VmS8a-#|- s,z1ER`=');
define('AUTH_SALT',        '26r%):Nmte;yVDzWlyx{(j;D.=n|CR@lLz^w++E{k&I8B$UP.L09DC%d-*.kg2PE');
define('SECURE_AUTH_SALT', '#JKb_:8g|$G y?f0MC$tc$c-nE%t>%^&{S{NT FF]1XlN1g`(XRJw[8s8,qPinEi');
define('LOGGED_IN_SALT',   'fi!gSK-dTd[bh)d%o_ee]`iq7+6V{ZXOGDH&+.+~=PhI1Z{+%5X+8xr--$eN.RD?');
define('NONCE_SALT',       'WJFE_%nmd 1Q|qY+{Qe|1|k&p9gk.lb+@iwGJPL{4I>$_}(Gw:I0T5lkL!Hfp=Rr');

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
