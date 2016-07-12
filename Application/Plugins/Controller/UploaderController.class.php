<?php

namespace Plugins\Controller;

use Think\Controller;

use Vendor\upload\Qiniu;


/**
 * Description of UploaderController
 *
 * @author laoguo
 */
class UploaderController extends Controller {

	private $qiniu = "";

	public function __construct() {
		parent::__construct();
		//import('upload.Qiniu','','.php');
		$this->qiniu = new Qiniu();
	}

	/**
	 * 
	 */
	public function form() {
//		$this->ajaxReturn($this->fetch());

		$this->display();
	}

	/**
	 * 上传文件
	 */
	public function upload() {
		if ($_FILES["file"]["error"] > 0) {
			unlink($_FILES['file']['tmp_name']);
			echo "Error: " . $_FILES["file"]["error"] . "<br />";
		} else {
			//require 'Qiniu.php';
			//do upload 
			$result = $this->qiniu->uploadFile($_FILES['file']['tmp_name']);

			echo json_encode($result);
			//print_r($result);
		}
	}

}
