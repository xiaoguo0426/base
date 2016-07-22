<?php

namespace Shop\Controller;

/**
 * 商城配置控制器
 * User: 74064
 * Date: 2016/7/22
 * Time: 23:18
 */

use Admin\Controller\BaseController;

class ConfigController extends BaseController
{


    public function index()
    {

        if (IS_POST) {

        } else {
            $this->assign('title', '商城设置');
            $this->display();
        }

    }

}