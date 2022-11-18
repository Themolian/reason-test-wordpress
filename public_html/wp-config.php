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
switch ($_SERVER['HTTP_HOST'])
{

	case 'reason-digital-wp.test':
		define('DB_HOST', 'localhost');
		define('DB_NAME', 'wp_reason');
		define('DB_USER', 'root');
		define('DB_PASSWORD', '');
		define('WP_HOME', 'http://'.$_SERVER['HTTP_HOST']);
		define('WP_SITEURL', 'http://'.$_SERVER['HTTP_HOST']);
		break;

	case 'reasontest.jamiecurran.tech':
		define('DB_HOST', 'sdb-54.hosting.stackcp.net');
		define('DB_NAME', 'wp_reasontest-35303036d6c8');
		define('DB_USER', 'wp_reasontest-35303036d6c8');
		define('DB_PASSWORD', '5h8azb857l');
		define('WP_HOME', 'http://'.$_SERVER['HTTP_HOST']);
		define('WP_SITEURL', 'http://'.$_SERVER['HTTP_HOST']);
		break;
	default:
		define('DB_HOST', 'localhost');
		define('DB_NAME', '');
		define('DB_USER', '');
		define('DB_PASSWORD', '');
		define('WP_HOME', 'https://'.$_SERVER['HTTP_HOST']);
		define('WP_SITEURL', 'https://'.$_SERVER['HTTP_HOST']);
		break;
}

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
define('AUTH_KEY',         '2hp;[@JT#}M/!eXbBMTvDT5;jFMp b|(#5+PJ>5=^5D~jaG$kv?*BzVr|CKt ,yu');
define('SECURE_AUTH_KEY',  'BL(dxG7Sk+Ikc1+soxD+Ycn2ZYZ ZTpKi+Se2HFf?$zx5f~<I%++J^Z|]lYk]w}@');
define('LOGGED_IN_KEY',    'd0W]-H.&pNJ1,Ihd&&Z5A/d(^]E)EPAf~3_3}bS=ihP:W+7|3|sw)DoPsTCBMd3/');
define('NONCE_KEY',        'Wu7ygRSh~nr)%<c9MB2|15`+bxV.V^LV$eBrm&9`Y8mIb<nCNdDc#q+CLPvb><OJ');
define('AUTH_SALT',        'p[z`X+wH5Dp7D_t4hl q~$m5D lj@6*9}-gG)XJ6l{*BEF^yim!6%UI+f/kO-L8y');
define('SECURE_AUTH_SALT', 'p&SMFLcx-})S0O?T7E9aJ4ZK?m`< Int:o5r=|fl2CDdtnS~6htlaZi-{[X06O2Q');
define('LOGGED_IN_SALT',   '-#(%IH^LQ_=5BLU/K9|33>F&,Ivc~xT*rj-:F-Kn-wV+kV`lwnfC&5R>=?Oh!jyT');
define('NONCE_SALT',       'nl}=x`/({y9_8gu=+jdY;,KGpAIA*Xi>4I}Pn+H:!GDD/, +g^iIk9>iRXF{%#S<');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'rd_';

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

/*
 * Allow upgrades without FTP
 */
define('FS_METHOD','direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
