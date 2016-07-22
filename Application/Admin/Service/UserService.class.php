<?php
/**
 * Created by PhpStorm.
 * User: 74064
 * Date: 2016/7/21
 * Time: 10:58
 */

namespace Admin\Service;


use Admin\Model\UserModel;

class UserService
{
    private $model = '';

    public function __construct()
    {
        $this->model = new UserModel();
    }

    /**
     * 获取所有的系统用户
     * @param string $fields
     * @return mixed
     */
    public function get_all_user($fields = "*")
    {
        $order = "status DESC,id DESC";
        return $this->model->select_base(array(), $fields, "", $order);
    }

    /*
     *根据id获取详情
     */
    public function get_detail_user($id)
    {
        if (empty($id)) {
            return array();
        }
        $where = array("id" => $id);
        return $this->model->find_base($where);
    }

    /**
     * 校验用户是否存在
     * @param $name
     * @return mixed
     */
    public function validate_user_by_name($name)
    {
        $where = array('name' => $name);
        $result = $this->model->find_base($where, 'id');
        if ($result === false || $result === null) {
            //用户不存在
            return false;
        } else {
            //用户存在
            return true;
        }
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