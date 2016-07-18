<?php

namespace Admin\Model;

//use Think\Model;
//use Admin\Model\BaseModel;
/**
 * Description of IndexModel
 *
 * @author laoguo
 */
class MenuModel extends BaseModel
{

    protected $tableName = 'system_menu';
    protected $_validate = array(
        array('parent_menu', 'require', '上级菜单不能为空！'),
        array('name', 'require', '菜单名称不能为空！'),
        array('node', 'require', '节点不能为空！'),
        array('path', 'require', '路径不能为空！'),
        array('icon', 'require', '图标不能为空！'),
        array('sort', 'require', '排序不能为空！'),
        array('form_token', 'require', '非法提交！')
    );

    /**
     * 根据指定的条件获取菜单
     * @param string $where
     * @param string $fields
     * @param string $limit
     * @param string $order
     * @return mixed
     */
    public function get_menu($where = "", $fields = "*", $limit = "", $order = "")
    {
        return $this->select_base($where, $fields, $limit, $order);
    }
}
