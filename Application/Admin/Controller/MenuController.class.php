<?php

namespace Admin\Controller;

use Admin\Service\MenuService;
use Think\Controller;

/**
 * 菜单控制器
 *
 * @author laoguo
 */
class MenuController extends Controller
{

    protected $title = '菜单管理';

    public function index()
    {

        $this->assign('title', $this->title);
        $this->display();
    }

    public function form()
    {
        if (IS_POST) {
            $user = D("Index");
            if (!$user->create()) {
                $this->error($user->getError());
            } else {
                $post = I('post.');

                $form_token = $post['form_token'];
                if (!validate_form_token($form_token)) {
                    $this->error('非法提交！');
                } else {
                    //token验证通过后注销token
                    form_token(false);
                }

                $menu_service = new MenuService();
                if (empty($post['id'])) {
                    //add
                    $result = $menu_service->add($post);
                } else {
                    //edit
                    $result = $menu_service->update($post);
                }
//                if ($result === false){
//                    $this->error('操作失败！');
//                }else{
//                    $this->success('操作成功！');
//                }
                $result === false ? $this->error('操作失败！') : $this->success('操作成功！');
            }
        } else {
            $this->assign('title', '菜单添加');
            $this->assign('form_token', form_token(true, C('FORM_TYPE.REGISTER')));
            $this->display();
        }
    }
}
