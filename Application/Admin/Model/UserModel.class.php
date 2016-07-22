<?php
/**
 * Created by PhpStorm.
 * User: 74064
 * Date: 2016/7/21
 * Time: 11:00
 */

namespace Admin\Model;


class UserModel extends BaseModel
{
    protected $tableName = 'system_user';
    protected $_validate = array(
        array('name', 'require', '账号不能为空！'),
        array('password', 'require', '密码不能为空！'),
        array('status', 'require', '状态不能为空！'),
        array('role_id', 'require', '角色不能为空！'),
        array('form_token', 'require', '非法提交！')
    );
}