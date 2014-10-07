<?php
/**
 * WordPress基础配置文件。
 *
 * 本文件包含以下配置选项：MySQL设置、数据库表名前缀、密钥、
 * WordPress语言设定以及ABSPATH。如需更多信息，请访问
 * {@link http://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 * 编辑wp-config.php}Codex页面。MySQL设置具体信息请咨询您的空间提供商。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以手动复制这个文件，并重命名为“wp-config.php”，然后填入相关信息。
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', getenv('OPENSHIFT_APP_NAME'));

/** MySQL数据库用户名 */
define('DB_USER', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));

/** MySQL数据库密码 */
define('DB_PASSWORD', getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));

/** MySQL主机 */
define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST') . ':' . getenv('OPENSHIFT_MYSQL_DB_PORT'));

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */

// 定义OpenShift的安全变量函数
require_once(getenv('OPENSHIFT_REPO_DIR') . '.openshift/openshift.inc');

// 设置默认密钥
$_default_keys = array(
  'AUTH_KEY'          => ' w*lE&r=t-;!|rhdx5}vlF+b=+D>a)R:nTY1Kdrw[~1,xDQS]L&PA%uyZ2:w6#ec',
  'SECURE_AUTH_KEY'   => '}Sd%ePgS5R[KwDxdBt56(DM:0m1^4)-k6_p8}|C:[-ei:&qA)j!X`:7d-krLZM*5',
  'LOGGED_IN_KEY'     => '$l^J?o)!zhp6s[-x^ckF}|BjU4d+(g1as)n/Q^s+k|,ZZc@E^h%Rx@VTm|0|?]6R',
  'NONCE_KEY'         => '#f^JM8d^!sVsq]~|4flCZHdaTy.-I.f+1tc[!h?%-+]U}|_8qc K=k;]mXePl-4v',
  'AUTH_SALT'         => 'I_wL2t!|mSw_z_ zyIY:q6{IHw:R1yTPAO^%!5,*bF5^VX`5aO4]D=mtu~6]d}K?',
  'SECURE_AUTH_SALT'  => '&%j?6!d<3IR%L[@iz=^OH!oHRXs4W|D,VCD7w%TC.uUa`NpOH_XXpGtL$A]{+pv9',
  'LOGGED_IN_SALT'    => 'N<mft[~OZp0&Sn#t(IK2px0{KloRcjvIJ1+]:,Ye]>tb*_aM8P&2-bU~_Z>L/n(k',
  'NONCE_SALT'        => 'u E-DQw%[k7l8SX=fsAVT@|_U/~_CUZesq{v(=y2}#X&lTRL{uOVzw6b!]`frTQ|'
);

// 此函数被openshift_secure函数调用并传递一个数组
function make_secure_key($args) {
  $hash = $args['hash'];
  $key  = $args['variable'];
  $original = $args['original'];

	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  $chars .= '!@#$%^&*()';
  $chars .= '-_ []{}<>~`+=,.;:/?|';

  // 将Hash转为Int作为伪随机数Seed
  srand(hexdec(substr($hash,0,8)));
  // 创建一个与默认密钥长度相同的字符串
  $val = '';
  for($i = 1; $i <= strlen($original); $i++){
    $val .= substr( $chars, rand(0,strlen($chars))-1, 1);
  }
  // 重置伪随机数生成器
  srand();
  // 返回值
  return $val;
}

// 创建OpenShift密钥（如果不是在OpenShift上则返回默认密钥）
$array = openshift_secure($_default_keys,'make_secure_key');

// 循环定义返回值
foreach ($array as $key => $value) {
  define($key,$value);
}

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
