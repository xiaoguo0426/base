<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Service;

use Admin\Model\IndexModel;
use Admin\Model\MenuModel;

/**
 * Description of IndexService
 *
 * @author laoguo
 */
class MenuService
{

    private $model = '';

    public function __construct()
    {

        $this->model = new MenuModel();
    }

    /**
     * 添加数据
     * @param array $params
     * @return bool|mixed
     */
    public function insert(array $params)
    {
        if (empty($params)) {
            return false;
        }
        $params['create_date'] = $params['update_date'] = get_now_date();
        $params['create_by'] = $params['update_by'] = get_user_id();
        return $this->model->insert($params);
    }

    public function update(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $params['update_date'] = get_now_date();
        $params['update_by'] = get_user_id();

        return $this->model->update($params['id'], $params);
    }

    public function get_all_menu($fields = "*")
    {
        $order = "parent_id ASC,sort ASC";
        return $this->model->get_menu(array(), $fields, "", $order);
    }

    /**
     * 获取启用状态的菜单
     * @return mixed
     */
    public function get_active_menu($fields = "*")
    {
        $where = array("status" => 1);
        $order = "parent_id ASC,sort ASC";
        return $this->model->get_menu($where, $fields, "", $order);
    }

    /**
     * 将菜单生成一棵树状结构
     */
    public function get_tree_menu($menu)
    {
        if (empty($menu)) {
            return array();
        }
        $temp = [];
        foreach ($menu as $key => $value) {
            if ($value['parent_id'] == 0) {
                //一级菜单
                $temp[$value['id']][] = $value;
            } else {
                //二级菜单
                $temp[$value['parent_id']][] = $value;
            }
        }
        return $temp;
    }

    /**
     * 将三维菜单转为一维菜单
     * @param $menu
     */
    public function get_list_menu($menu)
    {
        if (empty($menu)) {
            return array();
        }
        $temp = [];
        foreach ($menu as $key => $value) {
            foreach ($value as $k => $v) {
                $temp[] = $v;
            }
        }
        return $temp;
    }

    public function get_detail_menu($id)
    {
        $where = array("id" => $id);
        $result = $this->model->get_menu($where, "*", "0,1", "");
        return $result[0];
    }

}
