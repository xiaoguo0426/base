<?php

namespace Vendor\FormToken;
/**
 * Class FormToken
 *
 * 表单token生成类
 *
 *
 */
class FormToken
{

    private function _crete_token($type = '', $user_id = 0)
    {
        $_salt = C('FORM_TOKEN_SALT');
        return md5($_salt . time() . $user_id . $type);
    }

    /**
     * 创建/更新form_token
     * @param $type         表单类型    注册REGISTER    信息INFO     订单ORDER
     * @param $user_id      用户id
     * @return string
     */
    public static function create_token($type = '', $user_id = 0)
    {
        session('form_token', self::_crete_token($type = '', $user_id = 0), 1800);
        return session('form_token');
    }

    /**
     * 清除form_token
     */
    public static function unset_token()
    {
        session('form_token', null);
        return true;
    }

//    /**
//     * 更新token
//     * @param string $type
//     * @param int $user_id
//     */
//    public static function update_token($type = '', $user_id = 0)
//    {
//        session('form_token', self::_crete_token($type = '', $user_id = 0), 1800);
//        return session('form_token');
//    }


    /**
     *
     * 验证token
     * @param string $token
     */
    public static function validate_token($token = '')
    {
        if (empty($token) ||
            !session('?form_token') ||
            empty(session('form_token')) ||
            !session('form_token') ||
            session('form_token') !== $token
        ) {
            return false;
        } else {
            self::unset_token();
            return true;
        }
    }
}

?>