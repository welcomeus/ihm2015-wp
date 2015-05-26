<?php
# Database Configuration
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'KR||P,~Z,}ZZ`s3M+ofySX.}^J`bCK@&YKPiex*3+(~-bR>qI.NhCw_*+t47JtFS');
define('SECURE_AUTH_KEY',  'ito`%dX0R[z1 {#nFV94ZzV;RYn0hnPP<rvLUW>Gv_uoX_nRmXm%s/jf;,G@rWNX');
define('LOGGED_IN_KEY',    '3cViVaQyiD*FMWfK1)HQTt8,-ur[+J):Ll+cmy!|u,-~ShG_,0WYV|ZzDDkkXhe~');
define('NONCE_KEY',        'cQCX8KLv|0t6`M:~@^:L|%B-amwvq:zX?U]R{s-[ij^KmKFz)2BwW}|zIUW-9mIL');
define('AUTH_SALT',        'O[KyEvGthj1N-zuU?A|c#A-Lbi]B*RH&a`sdxI+<|j-r[[S0W-(BN]D( Bd@7)J/');
define('SECURE_AUTH_SALT', 'jd+fs++a:G9(Y`CX&Uc-QcU&6H?m3Ifv/uuz~!>HgNp[/9=+X$+aw)XfS/dW7VxA');
define('LOGGED_IN_SALT',   'r<|M a374+<u4!#FHn|tEYsKz&S~qzlc1,@i5L^giy|2C7U bwrxSxA52LJk<JXz');
define('NONCE_SALT',       'l]~.&{En5~PsYM*jE}x;~rQXxRd%Psa/Ieu:PY8J+o9o$LO9 t+9#Lu.SjSGTOg_');

if (file_exists(dirname(__FILE__) . '/wp-config-local.php')):
    # IMPORTANT: ensure your local config does not include wp-settings.php
    define('WP_LOCAL_DEV', true);
    require_once(dirname(__FILE__) . '/wp-config-local.php');
		
else:
    # Production configs
		define('WP_DEBUG', false);

		# Localized Language Stuff

		define( 'WP_CACHE', TRUE );

		define( 'WP_AUTO_UPDATE_CORE', false );

		define( 'PWP_NAME', 'welcomeus' );

		define( 'FS_METHOD', 'direct' );

		define( 'FS_CHMOD_DIR', 0775 );

		define( 'FS_CHMOD_FILE', 0664 );

		define( 'PWP_ROOT_DIR', '/nas/wp' );

		define( 'WPE_APIKEY', 'b27eeff3b0fb96e43053e3e232955d75c27ac591' );

		define( 'WPE_FOOTER_HTML', "" );

		define( 'WPE_CLUSTER_ID', '40579' );

		define( 'WPE_CLUSTER_TYPE', 'pod' );

		define( 'WPE_ISP', true );

		define( 'WPE_BPOD', false );

		define( 'WPE_RO_FILESYSTEM', false );

		define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

		define( 'WPE_SFTP_PORT', 2222 );

		define( 'WPE_LBMASTER_IP', '45.33.79.204' );

		define( 'WPE_CDN_DISABLE_ALLOWED', true );

		define( 'DISALLOW_FILE_EDIT', FALSE );

		define( 'DISALLOW_FILE_MODS', FALSE );

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

		$wpe_all_domains=array ( 0 => 'ihm2015.org', 1 => 'welcome.us', 2 => 'welcomeus.wpengine.com', 3 => 'www.ihm2015.org', 4 => 'www.welcome.us', );

		$wpe_varnish_servers=array ( 0 => 'pod-40579', );

		$wpe_special_ips=array ( 0 => '45.33.79.204', );

		$wpe_ec_servers=array ( );

		$wpe_largefs=array ( );

		$wpe_netdna_domains=array ( 0 =>  array ( 'match' => 'welcomeus.wpengine.com', 'zone' => 'nnz9z3rf9423fro45zin99w6', 'enabled' => true, ), 1 =>  array ( 'match' => 'welcome.us', 'zone' => 'qqdgn3dz8ez47wnio23o1iwp', 'enabled' => true, ), 2 =>  array ( 'match' => 'ihm2015.org', 'zone' => '5hw8140qro83nawjc2wvouxf', 'enabled' => true, ), );

		$wpe_netdna_domains_secure=array ( );

		$wpe_netdna_push_domains=array ( );

		$wpe_domain_mappings=array ( );

		$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );
		define('WPLANG','');

		# WP Engine ID


		# WP Engine Settings


endif;

# That's It. Pencils down
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
