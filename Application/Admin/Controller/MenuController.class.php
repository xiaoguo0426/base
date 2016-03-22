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
		$this->display();
	}

}
