<?php

namespace Admin\Controller;

/**
 * Description of PluginsController
 *
 * @author laoguo
 */
class PluginsController extends BaseController{
	
	
	
	public function uploader(){
		
		$this->ajaxReturn($this->fetch());
	}
	
	
}
