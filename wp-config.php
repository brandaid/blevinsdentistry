<?php
# Database Configuration
define( 'DB_NAME', 'wp_blevins' );
define( 'DB_USER', 'blevins' );
define( 'DB_PASSWORD', 'WInI9hm9XIWCH5EzfbLV' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         '{LFY`8tM(Oj-Uza$1-J{LZgo6sjGl_SA,J7zy-!{1y5%k/dNvN]f<# ]^66xaZr&');
define('SECURE_AUTH_KEY',  ':/?J+f+q>Y-KtvS G(?>A6)vh7dB(-_N99Pi}9N<K[/R2N>`3/Ar|*ah`~9aKy{J');
define('LOGGED_IN_KEY',    'Lk^P[wHOO9X66E.ry--KPPn]/-_VqfI>D~oLf^v+BN_7h%Ik1JN`i^w-S$_:_buf');
define('NONCE_KEY',        '35+h`ybGDlvK|/:w~^mWh+<(R{RG2p@Xmhr>} |CHCb*Mbsn/R6]c$+v(%olu],!');
define('AUTH_SALT',        '-p$Jv&_3II5X+:!Ic[Wq/`^b>;&T6@s`:nu.<.sE.^UL^*Ba$o7Zx5q~|a)z]}3 ');
define('SECURE_AUTH_SALT', 'hVyA7rA*p$4cQ|7oI-u@WoQC@-xRLs]VzSaR{] xNIl{[n{nqQM>ORByF]VI}o}*');
define('LOGGED_IN_SALT',   'JK>AIxS9T-%a,;>6@qU2`)bhzUh-BrNN .|o?e;6b/#>3tPj@].FF(7bnzc,FdRP');
define('NONCE_SALT',       'xI7f6>zbe%}&v&`w=>>@ePw<f}&X1rFu3&_lNFfJ#w=iz+#pUaAuwa%8VwKaNOH=');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'blevins' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', 'b884038dba5c41119b3a99ab837d4f3e2fd502a6' );

define( 'WPE_FOOTER_HTML', "" );

define( 'WPE_CLUSTER_ID', '111699' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'www.blevinsdentistry.com', 1 => 'blevins.wpengine.com', 2 => 'blevinsdentistry.com', );

$wpe_varnish_servers=array ( 0 => 'pod-111699', );

$wpe_special_ips=array ( 0 => '162.222.176.213', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );

define( 'WP_SITEURL', 'http://www.blevinsdentistry.com' );

define( 'WP_HOME', 'http://www.blevinsdentistry.com' );
define('WPLANG', 'en_US');

# WP Engine ID


# WP Engine Settings






define('WP_DEBUG', false);
define('AUTOMATIC_UPDATER_DISABLED', true);

# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
