<?php

namespace Shop\Model;
/**
 * Created by PhpStorm.
 * User: 74064
 * Date: 2016/7/22
 * Time: 23:20
 */
use Admin\Model\BaseModel;
class SpecificationsModel extends BaseModel
{
    protected $tableName = 'shop_specifications';
    protected $_validate = array(
        array('category_id', 'require', '分类不能为空！'),
        array('name', 'require', '规格名称不能为空！'),
        array('status', 'require', '状态不能为空！'),
        array('form_token','require','非法提交！'),
    );
}