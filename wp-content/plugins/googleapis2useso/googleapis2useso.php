<?php
/*
	Plugin Name: googleapis to useso
	Plugin URI: http://www.iztwp.com/googleapis2useso.html
	Description: 将谷歌字体等链接替换成360 CDN链接
	Version: 1.0
	Author: 爱主题
	Author URI: http://www.iztwp.com/
*/
/*  Copyright 2014  爱主题  ( Homepage:http://www.iztwp.com/  E-Mail:whyun@vip.qq.com)  */

// callback function
function izt_cdn_callback($buffer) {
	return str_replace('googleapis.com', 'useso.com', $buffer);
}
// ob_start
function izt_buffer_start() {
	ob_start("izt_cdn_callback");
}
// ob_end_flush
function izt_buffer_end() {
	ob_end_flush();
}
add_action('init', 'izt_buffer_start');
add_action('shutdown', 'izt_buffer_end');

?>