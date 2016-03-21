<?php

/**
 * 获得当前时间
 * @return type
 */
function get_now_date() {
	return date('Y-m-d H:i:s');
}

/**
 * 获得当前域名   不带/
 * @staticvar type $domain
 * @return string
 */
function get_domain() {
	static $domain = null;
	if (is_null($domain)) {
		$port = is_ssl() ? 'https://' : 'http://';
		$domain = $port . trim(I('server.HTTP_HOST'), ' /');
	}
	return $domain;
}

/**
 * 后台用户是否登录
 * @return boolean
 */
function is_login() {
	if (!is_null(session('user'))) {
		return TRUE;
	} else {
		return FALSE;
	}
}

/**
 * 打印输出数据到文件
 * @param type $data 需要打印的数据
 * @param type $replace 是否要替换打印
 * @param string $pathname 打印输出文件位置
 * @author zoujingli <zoujingli@qq.com>
 */
function p($data, $replace = false, $pathname = NULL) {
	is_null($pathname) && $pathname = RUNTIME_PATH . date('Ymd') . '_print.txt';
	$str = (is_string($data) ? $data : (is_array($data) || is_object($data)) ? print_r($data, TRUE) : var_export($data, TRUE)) . "\n";
	$replace ? file_put_contents($pathname, $str) : file_put_contents($pathname, $str, FILE_APPEND);
}
