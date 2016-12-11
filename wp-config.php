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
define('DB_NAME', 'tmdt_n01');

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
define('AUTH_KEY',         '*]Zyg]f/&#=Na:qUHj3jGAC^=H-Wu5{~:ZCfS_o (>n)bd9h$/erpBj#Z&Xnodlk');
define('SECURE_AUTH_KEY',  '7H$HZ@wL`Q5)&M<Zx{!BdElMO%=kOVD7l:a_K]bSeq8@KY@2}U19:GT;4t2Aen W');
define('LOGGED_IN_KEY',    '0Z+@CDJcDV/E+n!n`>[.ql}u{3NkUR~2M$:B`{~r8yH6ZM3F`s%H4svC& yej,U4');
define('NONCE_KEY',        'Ga]F#amG?F:Xf^6s$|kaL-~#;7,~2:sznE8qeySU3N0h5FW>vd-wY:YL`|M$Y:%.');
define('AUTH_SALT',        'e@5Hw$BPQp ze^XTL=`=qaamA/&._08O3>Q Tgos;`,CP]MUm5xAgh4UE)>Hr`/:');
define('SECURE_AUTH_SALT', '99;;D!rmcMEJ YZWInzA2W^r&]h?I[,t9&~YQR[Bs0&Twp~~0VdkS ,#z,1f9h:T');
define('LOGGED_IN_SALT',   'g+BUU.Zk>D=Ozg.#sXSkL7M5>ldE)(- )UIaFWFEU7~TgQvR?G{k>I>b+iGbj1mO');
define('NONCE_SALT',       ';qLxf@7{lazz5r!Gl,nU:kc7rW;?t7]Z5h(Qsx`X; C]i7AHF#>I>Dk0tl0o;;9s');

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
