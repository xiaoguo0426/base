<?php

return array(
    /* 默认模块 */
    'DEFAULT_MODULE' => 'Admin',
    /* 设定URL模式 */
    'URL_MODEL' => 2, // URL访问模式
    'URL_HTML_SUFFIX' => '.shtml', // URL静态化后缀

    /* 模板设置 */
    'TMPL_FILE_DEPR' => '_', //模块链接符

    /* 模板替换 */
    'TMPL_PARSE_STRING' => array(
        '__RES__'       => get_domain() . __ROOT__ . '/Static/Resource'
    ),
    //数据库配置信息
    'DB_TYPE'           => 'mysqli', //数据库类型
    'DB_HOST'           => '127.0.0.1', //数据库服务器地址
    'DB_NAME'           => 'base', //数据库名
    'DB_USER'           => 'root', //用户名
    'DB_PWD'            => '123123', //密码
    'DB_PORT'           => '3306', //端口号
    'DB_PREFIX'         => 'tp_', //表前缀
    //session设置
    'SESSION_OPTIONS'   => array(
        'type'          => 'db', //session采用数据库保存
        'expire'        => 7200//过期时间
    ),
    'SESSION_TABLE'     => 'think_session', //必须设置成这样，如果不加前缀就找不到数据表，这个需要注意


    //form_token盐值
    'FORM_TOKEN_SALT'   => 'base',
    //form表单类型
    'FORM_TYPE'         => array(
        'REGISTER'      => 'register',
        'INFO'          => 'info',
        'ORDER'         => 'order',
        'TOGGLE'        => 'toggle'
    ),


);
