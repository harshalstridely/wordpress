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
define( 'DB_NAME', 'wordpresslatest' );

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
define( 'AUTH_KEY',         'rrVt5Zc1Nf*KT3+KEgejfHf6k0&Nqz#|p^J?>L_u]]MW}o,@Rhh5rE$L4E(o=M7z' );
define( 'SECURE_AUTH_KEY',  'S]eDF%IL^CPyr~qR>-H8)6mD1^o*7i}^8hu/1}`JURvW1_AB[NxI-){r|PE=cg%g' );
define( 'LOGGED_IN_KEY',    'mp=`;]^vfCo/T`@997wRr6zj1$-k$)zty[tuB`X4`RYQ=o;CDKi%WpKgNkj5<zK:' );
define( 'NONCE_KEY',        '=2Mq:k:,sO31kH.iW9 RNSY`5QYYw9txF={Wb(5);]fxYcIW7+L]SG&h&`oq[@^?' );
define( 'AUTH_SALT',        'S;[<)Lj,oAk1dI:4wSCtk1a.arCt)]33tg--BMmI[A8c2Lm~;qb^[yGBa&, GE[a' );
define( 'SECURE_AUTH_SALT', ')`MF$  dci?N-C0;CD2!M[Pc|)OdY=i;0iKUNyw6wFowh; ,OjEmu=0+3EbLf??Y' );
define( 'LOGGED_IN_SALT',   '~dj|LHan;~~tK2=Jz?C@K47@gV5Ey#T|eyfn94U%|5RLt3i^_bi8kcRy]f=80(Y|' );
define( 'NONCE_SALT',       'Za9HGiqS<z<0~g=7@:[~?7[&CV:8&ncezxJy4g%[>Aa@KYQhWOJwZ]zbV^NP^H}y' );

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
