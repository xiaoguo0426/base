<?php

namespace Admin\Model;

use Think\Model;

/**
 * Created by PhpStorm.
 * User: 74064
 * Date: 2016/7/14
 * Time: 20:46
 */
class BaseModel extends Model
{

    /**
     * 根据指定的条件查询一条数据
     * @param array $where
     * @param string $field
     * @return mixed
     */
    public function find_base(array $where, $field = "*")
    {
        return $this->field($field)->where($where)->find();
    }

    /**
     * 根据指定的条件查询多条数据
     * @param array $where
     * @param string $field
     */
    public function select_base(array $where, $field = "*", $limit = "0,20", $order = "id DESC")
    {
        $command = $this->field($field)->where($where);
        if (!empty($limit)) {
            $command = $command->limit($limit);
        }
        if (!empty($order)) {
            $command = $command->order($order);
        }
        return $command->select();
    }

    /**
     * 添加数据
     * @param array $params
     * @return mixed
     */
    public function insert(array $params)
    {
        return $this->add($params);
    }


    public function update($where, $params)
    {
        return $this->where("id = " . $where)->save($params);
    }


}