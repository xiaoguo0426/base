<?php

namespace Admin\Controller;

use Think\Controller;

/**
 * 系统管理
 *
 * @author laoguo
 */
class SystemController extends Controller {
	
	public function index(){
		if(IS_POST){
			
		}else{
			$this->display();
		}
	}
	
}
