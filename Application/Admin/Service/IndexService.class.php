<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Service;

use Admin\Model\IndexModel;

/**
 * Description of IndexService
 *
 * @author laoguo
 */
class IndexService {

    private $model = '';

    public function __construct() {

        $this->model = new IndexModel();
    }

    /**
     * 校验是否系统用户
     * @param type $name
     * @param type $password
     * @return type
     */
    public function validate_system_user($name, $password) {

        $map = array(
            "name" => $name,
            "password" => $password
        );
        $fields = "*";
        return $this->model->find_base($map, $fields);
    }

}
