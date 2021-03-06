<?php
use Vendor\FormToken\FormToken;

/**
 * 获得当前时间
 * @return type
 */
function get_now_date($format = 'Y-m-d H:i:s')
{
    return date($format);
}

function get_user_id()
{
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
    if (!empty(session('user'))) {
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

//状态
function show_button_status($status)
{
    switch (intval($status)) {
        case 0:
            return '<button type="button" class="btn btn-w-m btn-white text-danger"><i class="fa fa-times text-danger"></i></button>';
        case 1:
            return '<button type="button" class="btn btn-w-m btn-white text-info"><i class="fa fa-check text-info"></i></button>';

        default:
            return "未知状态";
    }
}

//启用/禁用开关按钮
function show_toggle_button($status, $vo)
{
    switch (intval($status)) {
        case 0:
            return '<button type="button" class="btn btn-w-m btn-primary" data-resume="' . U('resume') . '" data-id="' . $vo['id'] . '" data-form_token = ""><i class="fa fa-check"></i>启&nbsp;用</button>';
        case 1:

            return '<button type="button" class="btn btn-w-m btn-danger" data-forbid="' . U('forbid') . '" data-id="' . $vo['id'] . '" data-form_token = ""><i class="fa fa-times"></i>禁&nbsp;用</button>';
        default:
            return "未知状态";
    }
}

//编辑按钮
function show_edit_button($id)
{
    return '<button type="button" class="btn btn-w-m btn-info" data-modal="' . U('form') . '" data-id="' . $id . '"><i class="fa fa-paste"></i>编&nbsp;辑</button>';
}