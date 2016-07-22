<?php
/**
 * 角色管理控制器
 * User: 74064
 * Date: 2016/7/20
 * Time: 23:01
 */

namespace Admin\Controller;


class RoleController extends BaseController
{
    protected $_bind_model = 'Role';
    protected $title = '权限管理';

    /**
     * 首页
     */
    public function index()
    {

        $this->assign('title', $this->title);
        $this->display();
    }

    public function form()
    {

        if (IS_POST) {

        } else {
            $id = I('get.id');
            if (empty($id)) {
                $title = '权限添加';
            } else {
                $title = '权限编辑';
            }
            $this->assign('title', $title);
            $this->assign('form_token', form_token(true, C('FORM_TYPE.INFO')));
            $this->display();
        }

    }

}