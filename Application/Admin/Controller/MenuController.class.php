<?php

namespace Admin\Controller;

use Admin\Service\MenuService;

/**
 * 菜单控制器
 *
 * 如果启用或者禁用的是主菜单，需要把属于该菜单下的所有子菜单全部禁用。有以下两种解决方法
 * 1.客户端提交菜单id集合，服务器端不作判断，直接修改提交菜单id集合的状态【客户端计算菜单id集合比较麻烦】
 * 2.客户端提交菜单id【一个】，服务器端判断是否为主菜单，如果是，再把旗下的所有子菜单全部禁用【服务器端需要查一次数据库，判断当前菜单是否数据主菜单】
 *
 *  个人选择第二种解决方案
 * @author laoguo
 */
class MenuController extends BaseController
{
    protected $_bind_model = 'Menu';
    protected $title = '菜单管理';

    /**
     * 菜单管理首页
     */
    public function index()
    {


        if (S('system_menu') !== false) {
            $list = S('system_menu');
        } else {
            $menu_service = new MenuService();
            $menu = $menu_service->get_all_menu("*");
            $list = $menu_service->getSelectTree($menu);
            S('system_menu', $list);
        }
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
            $menu = D("Menu");
            if (!$menu->create()) {
                $this->error($menu->getError());
            } else {
                $post = I('post.');
                $form_token = $post['form_token'];
                if (!validate_form_token($form_token)) {
                    $this->error('当前提交已过期，请刷新后再试！');
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
                    $map = [];
                    $map['id'] = $post['id'];
                    $result = $menu_service->update($map, $post);
                }
//                $result === false ? $this->error('操作失败！') : $this->success('操作成功！');
                if ($result === false){
                    $this->error('操作失败！');
                }else{
                    //添加或者修改菜单成功后，注销缓存
                    S('system_menu',null);
                    $this->success('操作成功！');
                }
            }
        } else {
            $id = I('get.id');
            if (empty($id)) {
                $title = '菜单添加';
            } else {
                $title = '菜单编辑';
                $menu_service = new MenuService();
                $vo = $menu_service->get_detail_menu($id);
                $this->assign('vo', $vo);
            }
            $this->assign('title', $title);
            $this->assign('form_token', form_token(true, C('FORM_TYPE.INFO')));
            $this->display();
        }
    }

    /**
     * 加载菜单
     */
    public function load_menu()
    {
        $menu_service = new MenuService();
        $active_menu = $menu_service->get_active_parent_menu("id,name,parent_id");
//        print_r($active_menu);
        $select_tree = $menu_service->getSelectTree($active_menu);
        $this->ajaxReturn($select_tree, 'JSON');
    }

    /**
     * 启用操作回掉方法
     * 如果启用的是主菜单，则把该菜单下的所有二级菜单全部启用
     * @param $id       菜单id
     */
    protected function _resume_filter($id = 0)
    {
        //获取菜单信息
        $menu_service = new MenuService();
        $menu_detail = $menu_service->get_detail_menu($id);
        //如果该菜单是属于主菜单，则把该菜单下的所有子菜单禁用
        if (intval($menu_detail['parent_id']) === 0) {
            $map = $params = [];
            $map['parent_id'] = $id;
            $params['status'] = 1;
            $update_result = $menu_service->update($map, $params);

            if ($update_result !== false) {
                $this->success('操作成功！');
            } else {
                $this->error('操作失败！');
            }
        }
    }

    /**
     * 禁用操作回掉方法
     * 如果禁用的是主菜单，则把该菜单下的所有二级菜单全部禁用
     * @param $id       菜单id
     */
    protected function _forbid_filter($id = 0)
    {
        //获取菜单信息
        $menu_service = new MenuService();
        $menu_detail = $menu_service->get_detail_menu($id);
        //如果该菜单是属于主菜单，则把该菜单下的所有子菜单禁用
        if (intval($menu_detail['parent_id']) === 0) {
            $map = $params = [];
            $map['parent_id'] = $id;
            $params['status'] = 0;
            $update_result = $menu_service->update($map, $params);

            if ($update_result !== false) {
                $this->success('操作成功！');
            } else {
                $this->error('操作失败！');
            }
        }
    }
}
