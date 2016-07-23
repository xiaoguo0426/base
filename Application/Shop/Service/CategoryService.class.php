<?php
namespace Shop\Service;

/**
 * Created by PhpStorm.
 * User: 74064
 * Date: 2016/7/23
 * Time: 20:07
 */
use Shop\Model\CategoryModel;

class CategoryService
{
    private $model = '';

    public function __construct()
    {
        $this->model = new CategoryModel();
    }

    /**
     * 获得所有的list
     * @param string $fields
     * @return mixed
     */
    public function get_all_list($fields = "*")
    {
        $order = "status DESC,id DESC";//启用的排在前面
        return $this->model->select_base(array(), $fields, "", $order);
    }

    /**
     * 获得启用状态的list
     * @param string $fields
     * @return mixed
     */
    public function get_active_list($fields = "*")
    {
        $where = array('status' => 1);
        return $this->model->select_base($where, $fields, "", "");
    }

    /**
     * 根据id获得list的详情
     * @param string $id
     * @return bool|mixed
     */
    public function get_detail_list($id = '')
    {
        if (empty($id)) {
            return false;
        }
        $where = array('id' => $id);
        return $this->model->find_base($where);
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

}