<?php

namespace Admin\Model;

use Think\Model;

/**
 * 基础Model层
 * 该层不作任何逻辑判断！！！！！！请在业务层和控制层做判断
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

    /**
     * 更新操作
     * @param array $where
     * @param array $params
     * @return bool
     */
    public function update(array $where, array $params)
    {
        return $this->where($where)->save($params);
    }

    /**
     * 禁用数据
     * @param $where
     * @return bool
     */
    public function forbid($where)
    {
        return $this->where($where)->save(array("status" => 0));
    }

    /**
     * 啓用數據
     * @param $where
     * @return bool
     */
    public function resume($where)
    {
        return $this->where($where)->save(array('status' => 1));
    }

}