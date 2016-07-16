<?php
use Vendor\FormToken\FormToken;
/**
 * 获得当前时间
 * @return type
 */
function get_now_date()
{
    return date('Y-m-d H:i:s');
}

function get_user_id(){
    return session('user.id');
}

/**
 * 获得当前域名   不带/
 * @staticvar type $domain
 * @return string
 */
function get_domain()
{
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
function is_login()
{
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
function p($data, $replace = false, $pathname = NULL)
{
    is_null($pathname) && $pathname = RUNTIME_PATH . date('Ymd') . '_print.txt';
    $str = (is_string($data) ? $data : (is_array($data) || is_object($data)) ? print_r($data, TRUE) : var_export($data, TRUE)) . "\n";
    $replace ? file_put_contents($pathname, $str) : file_put_contents($pathname, $str, FILE_APPEND);
}

/**
 * token
 * @param $name
 * @param $value
 */
function form_token($flag = true, $type = '', $user_id = 0)
{
    if ($flag) {
        //创建token
        return FormToken::create_token($type, $user_id);
    } else {
        //删除token
        return FormToken::unset_token();
    }
}

/**
 * 验证token
 * @param string $token
 * @return bool
 */
function validate_form_token($token = '')
{
    if (empty($token)) return false;

    return FormToken::validate_token($token);
}


function show_button_status($status){
    switch (intval($status)){
        case 0:
            return '<button type="button" class="btn btn-w-m btn-danger">禁&nbsp;用</button>';
        case 1:
            return '<button type="button" class="btn btn-w-m btn-primary">启&nbsp;用</button>';

        default:
            return "未知状态";
    }
}