<?php

namespace Admin\Service;

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

    /**
     * 更新数据
     * @param array $params
     * @return bool
     */
    public function update(array $where, array $params)
    {
        if (empty($params) || empty($where)) {
            return false;
        }

        $params['update_date'] = get_now_date();
        $params['update_by'] = get_user_id();

        return $this->model->update($where, $params);
    }

    /**
     * 获取所有的菜单
     * @param string $fields
     * @return mixed
     */
    public function get_all_menu($fields = "*")
    {
        $order = "parent_id ASC,sort ASC";
        return $this->model->get_menu(array(), $fields, "", $order);
    }

    /**
     * 获取启用状态的主菜单
     * @param string $fields
     * @return mixed
     */
    public function get_active_parent_menu($fields = "*")
    {
//        $where = array('parent_id' => 0, 'status' => 1);
//        $order = "sort ASC";
//        return $this->model->get_menu($where, $fields, "", $order);

        $where = array('status' => 1);
        $order_by = "parent_id ASC,sort ASC";
        return $this->model->get_menu($where, $fields, "", $order_by);
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
     * 生成数组树
     * @param $items
     * @param string $id
     * @param string $pid
     * @param string $son
     * @return array
     */
    public function getArrayTree($items, $id = 'id', $pid = 'parent_id', $son = 'sub')
    {
        $tree = array(); //格式化的树
        $tmpMap = array();  //临时扁平数据

        foreach ($items as $item) {
            $tmpMap[$item[$id]] = $item;
        }

        foreach ($items as $item) {
            if (isset($tmpMap[$item[$pid]])) {
                $tmpMap[$item[$pid]][$son][] = &$tmpMap[$item[$id]];
            } else {
                $tree[] = &$tmpMap[$item[$id]];
            }
        }
        return $tree;
    }

    /**
     * 一维数据数组生成数据树
     * @param type $list 数据列表
     * @param type $id ID Key
     * @param type $pid 父ID Key
     * @param type $path
     * @return type
     */
    static public function getSelectTree($list, $id = 'id', $pid = 'parent_id', $path = 'level', $ppath = '') {
        $_array_tree = self::getArrayTree($list);
        $tree = array(); //格式化的树
        foreach ($_array_tree as $_tree) {
            $_tree[$path] = $ppath . '-' . $_tree['id'];
            $count = substr_count($ppath, '-');
            $_tree['spl'] = str_repeat("&nbsp;&nbsp;&nbsp;├ ", $count);
            if (!isset($_tree['sub'])) {
                $_tree['sub'] = array();
            }
            $sub = $_tree['sub'];
            unset($_tree['sub']);
            $tree[] = $_tree;
            if (!empty($sub)) :
                $sub_array = self::getSelectTree($sub, $id, $pid, $path, $_tree[$path]);
                $tree = array_merge($tree, (Array) $sub_array);
            endif;
        }
        return $tree;
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

    /**
     * 根据指定的id获取菜单信息
     * @param $id
     * @return mixed
     */
    public function get_detail_menu($id)
    {
        $where = array("id" => $id);
        $result = $this->model->get_menu($where, "*", "0,1", "");
        return $result[0];
    }

}
