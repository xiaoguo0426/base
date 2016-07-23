<?php

namespace Shop\Model;
/**
 * Created by PhpStorm.
 * User: 74064
 * Date: 2016/7/22
 * Time: 23:20
 */
use Admin\Model\BaseModel;
class DeliveryModel extends BaseModel
{
    protected $tableName = 'shop_delivery';
    protected $_validate = array(
        array('name', 'require', '快递名称不能为空！'),
        array('price', 'require', '价格不能为空！'),
        array('status', 'require', '状态不能为空！'),
        array('form_token','require','非法提交！'),
    );
}