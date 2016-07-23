<?php

namespace Shop\Model;
/**
 * Created by PhpStorm.
 * User: 74064
 * Date: 2016/7/22
 * Time: 23:20
 */
use Admin\Model\BaseModel;
class CategoryModel extends BaseModel
{
    protected $tableName = 'shop_category';
    protected $_validate = array(
        array('name', 'require', '分类名称不能为空！'),
        array('status', 'require', '状态不能为空！'),
        array('form_token','require','非法提交！'),
    );
}