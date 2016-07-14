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
    public function add(array $params)
    {
        if (empty($params)) {
            return false;
        }
        $params['create_date'] = $params['update_date'] = get_now_date();
        $params['create_by'] = $params['update_by'] = get_user_id();
        return $this->model->add($params);
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

}
