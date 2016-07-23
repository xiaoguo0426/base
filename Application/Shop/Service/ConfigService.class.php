<?php
namespace Shop\Service;

/**
 * Created by PhpStorm.
 * User: 74064
 * Date: 2016/7/23
 * Time: 20:07
 */
use Shop\Model\ConfigModel;

class ConfigService
{
    private $model = '';

    public function __construct()
    {
        $this->model = new ConfigModel();
    }

    public function get_detail_list($id = 1)
    {
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

        return $this->model->update($where, $params);
    }

}