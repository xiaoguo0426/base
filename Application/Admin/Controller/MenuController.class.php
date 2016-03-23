<?php

namespace Admin\Controller;

use Think\Controller;

/**
 * 菜单控制器
 *
 * @author laoguo
 */
class MenuController extends Controller {

	protected $title = '菜单管理';

	public function index() {

		$this->assign('title', $this->title);
		$this->display();
	}

	public function form() {

		$this->assign('title', '菜单添加');
		//获得模板内容，异步返回
		$this->ajaxReturn($this->fetch());
	}

}
