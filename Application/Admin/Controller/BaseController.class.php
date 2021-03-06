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
        if (!is_login() && 'login' !== ACTION_NAME) {
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
//        $class = "\\" . MODULE_NAME . "\\Model\\" . CONTROLLER_NAME . "Model";
//        $model = new $class();

        //子类需要指定绑定的模型
        $model = D($this->_bind_model);
        $result = $model->resume(array('id' => $id));
        if ($result === false) {
            $this->error('操作失败！');
        } else {
            (false !== $this->_callback_function(__FUNCTION__, $id)) && $this->success('操作成功！');
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
//        $class = "\\" . MODULE_NAME . "\\Model\\" . CONTROLLER_NAME . "Model";
//        $model = new $class();

        //子类需要指定绑定的模型
        $model = D($this->_bind_model);
        $result = $model->forbid(array('id' => $id));
        if ($result === false) {
            $this->error('操作失败！');
        } else {
            (false !== $this->_callback_function(__FUNCTION__, $id)) && $this->success('操作成功！');
        }
    }


    private function _callback_function($controller, $params)
    {
        $method = '_' . $controller . '_filter';
        if (method_exists($this, $method)) {
            return $this->$method($params);
        }
        return null;
    }
}