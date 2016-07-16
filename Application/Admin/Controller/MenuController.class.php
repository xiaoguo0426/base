<?php

namespace Admin\Controller;

use Admin\Service\MenuService;

/**
 * 菜单控制器
 *
 * @author laoguo
 */
class MenuController extends BaseController
{

    protected $title = '菜单管理';

    public function index()
    {
        $menu_service = new MenuService();
        $menu = $menu_service->get_all_menu("*");
        $list = $menu_service->get_list_menu(array_values($menu_service->get_tree_menu($menu)), null);

        $this->assign('list', $list);
        $this->assign('title', $this->title);
        $this->display();
    }

    /**
     * 添加菜单
     */
    public function form()
    {
        if (IS_POST) {
            $user = D("Index");
            if (!$user->create()) {
                $this->error($user->getError());
            } else {
                $post = I('post.');
//                print_r($post);
                $form_token = $post['form_token'];
                if (!validate_form_token($form_token)) {
                    $this->error('非法提交！');
                } else {
                    //token验证通过后注销token
                    form_token(false);
                    unset($post['form_token']);
                }
                $menu_service = new MenuService();
                if (empty($post['id'])) {
                    //add
                    unset($post['id']);
                    $result = $menu_service->insert($post);
                } else {
                    //edit
                    $result = $menu_service->update($post);
                }

                $result === false ? $this->error('操作失败！') : $this->success('操作成功！');
            }
        } else {
            $this->assign('title', '菜单添加');
            $this->assign('form_token', form_token(true, C('FORM_TYPE.REGISTER')));
            $this->display();
        }
    }

    /**
     * 加载菜单
     */
    public function load_menu()
    {
        $menu_service = new MenuService();
        $active_menu = $menu_service->get_active_menu("id,name,parent_id,sort");
        $menu = $menu_service->get_tree_menu($active_menu);
        $this->ajaxReturn(array_values($menu), 'JSON');
    }

}
