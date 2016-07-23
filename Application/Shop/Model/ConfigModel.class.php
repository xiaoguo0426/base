<?php

namespace Shop\Model;
/**
 * Created by PhpStorm.
 * User: 74064
 * Date: 2016/7/22
 * Time: 23:20
 */
use Admin\Model\BaseModel;
class ConfigModel extends BaseModel
{
    protected $tableName = 'shop';
    protected $_validate = array(
        array('mall_name', 'require', '商城名称不能为空！'),
        array('company', 'require', '公司名称不能为空！'),
        array('company_address', 'require', '公司地址不能为空！'),
        array('phone', 'require', '联系方式不能为空！'),
        array('address', 'require', '联系地址不能为空！'),
        array('wechat_pay', 'require', '微信支付配置不能为空！'),
        array('ali_pay', 'require', '支付宝支付配置不能为空！'),
        array('form_token','require','非法提交！'),
    );
}