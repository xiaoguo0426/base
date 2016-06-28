<?php

namespace Admin\Controller;

use Think\Controller;
/**
 * Description of PluginsController
 *
 * @author laoguo
 */
class PluginsController extends Controller{
	
	
	
	public function uploader(){
		
		$this->ajaxReturn($this->fetch());
	}
	
	
}
