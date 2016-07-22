<?php

namespace Admin\Controller;

use Admin\Service\UserService;

/**
 * 系统用户管理
 *
 * @author laoguo
 */
class UserController extends BaseController {

    protected $_bind_model = 'User';
    protected $title = '系统用户管理';

	public function index(){
        $user_service = new UserService();
        $list = $user_service->get_all_user();
        $this->assign('list',$list);
		$this->assign('title', $this->title);
		$this->display();
	}

    public function form()
    {

        if (IS_POST) {
            $user = D("User");
            if (!$user->create()) {
                $this->error($user->getError());
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
                $user_service = new UserService();
                if (empty($post['id'])) {
                    $validate_result = $user_service->validate_user_by_name($post['name']);
                    if($validate_result){
                        $this->error('该账号已经存在，请确认后再试！');
                    }else{
                        //add
                        unset($post['id']);
                        $post['password'] = md5($post['password']);
                        $result = $user_service->insert($post);
                    }
                } else {
                    //edit
                    $map = [];
                    $map['id'] = $post['id'];
                    $result = $user_service->update($map, $post);
                }

                $result === false ? $this->error('操作失败！') : $this->success('操作成功！');
            }

        } else {
            $id = I('get.id');
            if (empty($id)) {
                $title = '用户添加';
            } else {
                $title = '用户编辑';
                $user_service = new UserService();
                $vo = $user_service->get_detail_user($id);
                $this->assign('vo', $vo);
            }
            $this->assign('title', $title);
            $this->assign('form_token', form_token(true, C('FORM_TYPE.REGISTER')));
            $this->display();
        }

    }
	
}
