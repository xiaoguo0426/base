<?php

// 应用入口文件

// 检测PHP环境
if (version_compare(PHP_VERSION, '5.3.0', '<')) die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG', TRUE);

/* 定义应该根目录 */
define('APP_ROOT', str_replace('\\', '/', getcwd()) . '/');

// 定义应用目录
define('APP_PATH', APP_ROOT . 'Application/');

//定义类库目录
define('COMMON_PATH', APP_ROOT . 'Library/');

//定义运行目录
define('RUNTIME_PATH', APP_ROOT . 'Static/Runtime/');

//第三方类库目录
define('VENDOR_PATH', COMMON_PATH . 'Vendor/');

//项目名
defined('PROJECT_NAME') or define('PROJECT_NAME', basename(getcwd()));


// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单