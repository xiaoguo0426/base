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
            redirect(get_domain() . U('Admin/Index/login'));
        }
    }

    /**
     * 启用操作
     */
    public function resume()
    {
        if (!IS_POST) {
            $this->error('访问错误！');
        }
        $id = I('post.id');
        if (empty($id)) {
            $this->error('参数错误！');
        }
        //控制器名一定要和模型名一致
        $class = "\\" . MODULE_NAME . "\\Model\\" . CONTROLLER_NAME . "Model";
        $model = new $class();
        $result = $model->resume(array('id' => $id));
        if ($result === false) {
            $this->error('操作失败！');
        } else {
            $this->success('操作成功！');
        }
    }

    /**
     * 禁用操作
     */
    public function forbid()
    {
        if (!IS_POST) {
            $this->error('访问错误！');
        }
        $id = I('post.id');
        if (empty($id)) {
            $this->error('参数错误！');
        }
        //控制器名一定要和模型名一致
        $class = "\\" . MODULE_NAME . "\\Model\\" . CONTROLLER_NAME . "Model";
        $model = new $class();
        $result = $model->forbid(array('id' => $id));
        if ($result === false) {
            $this->error('操作失败！');
        } else {
            $this->success('操作成功！');
        }
    }

}