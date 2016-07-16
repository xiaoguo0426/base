<?php

namespace Admin\Controller;

use Think\Controller;
use Admin\Service\IndexService;

class IndexController extends Controller
{

    /**
     * 后台首页
     */
    public function index()
    {
        if (is_login()) {
            $this->display();
        } else {
            redirect(U('login'));
        }

    }

    /**
     * 登录页
     */
    public function login()
    {
        if (IS_POST) {
            $user = D("Index");
            if (!$user->create()) {
                $this->error($user->getError());
            } else {
                $name = I('post.name');
                $password = I('post.password', '0', 'md5');
                $form_token = I('post.form_token', '');

                if (!validate_form_token($form_token)) {
                    $this->error('非法提交！');
                } else {
                    //token验证通过后注销token
                    form_token(false);
                }

                $index_service = new IndexService();
                $result = $index_service->validate_system_user($name, $password);

                if ($result === NULL) {
                    $this->error('账号或密码有误，请确认后再试');
                }

                switch ($result['status']) {
                    case 0:
                        //禁用
                        $this->error('当前用户已被禁用，请联系管理员');
                        break;
                    //启用
                    case 1:
                        session('user', $result);
                        $this->success('登录成功，正在跳转...', U('Admin/Index/index'));
                        break;
                    case 2:
                        $this->error('当前用户正在审核中');
                        break;
                    default:
                        $this->error('当前用户状态有误');
                        break;
                }
            }
        } else {
            if (is_login()) {
                redirect(U('index'));
            } else {
                $this->assign('form_token', form_token(true, C('FORM_TYPE.REGISTER')));
                $this->display();
            }
        }
    }

    /*
      注销登陆
     */

    public function logout()
    {
        if (IS_AJAX) {
            session('user', NULL);
            $this->success('退出成功！正在跳转...', U('Admin/Index/login'), 1);
        }
    }

    public function get_tree_menu()
    {
        $menu_service = new \Admin\Service\MenuService();
        $active_menu = $menu_service->get_active_menu("id,name,parent_id,path,sort,icon");
        $menu = array_values($menu_service->get_tree_menu($active_menu));

        $body = "";
        $html = "";
        foreach ($menu as $key => $value) {
            $header = "<li><a href='#'><i class='".$value[0]['icon']."'></i><span class='nav-label'>" . $value[0]['name'] . "</span><span class='fa arrow'></span></a><ul class='nav nav-second-level collapse'>";
            $footer = "</ul></li>";
            unset($value[0]);
            foreach ($value as $k => $v) {
                $body .= "<li><a href='" . U($v['path']) . "'>" . $v['name'] . "</a></li>";
            }
            $html .= $header . $body . $footer;
            $body = "";
        }
        $this->ajaxReturn($html);
    }

}
