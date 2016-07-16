<?php
/**
 * Created by PhpStorm.
 * User: 74064
 * Date: 2016/7/15
 * Time: 20:49
 */

namespace Admin\Controller;

use Think\Controller;


class BaseController extends Controller
{

    public function __construct()
    {
        //重写了构造方法，一定要调用父类的构造方法
        parent::__construct();

        if (!is_login()) {
            redirect(U('Admin\Index\login'));
        }
    }

}