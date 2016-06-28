<?php

namespace Vendor\upload;

require 'autoload.php';

// 引入鉴权类
use Qiniu\Auth;
// 引入上传类
use Qiniu\Storage\UploadManager;

class Qiniu {

	private $accessKey = '';
	private $secretKey = '';
	private $bucket = '';
	private $auth = '';
	private $token = '';
	private $uploadManager = '';
	private $policy = [];

	public function __construct() {
		require 'config.php';

		$this->accessKey = $config['accessKey'];
		$this->secretKey = $config['secretKey'];
		$this->bucket = $config['bucket'];
		$this->policy = $config['policy'];

		$this->_init();
	}

	private function _init() {
		$this->auth = new Auth($this->accessKey, $this->secretKey);
		$this->token = $this->auth->uploadToken($this->bucket);
		$this->uploadManager = new UploadManager();
	}

	public function uploadFile($filename = '') {
		echo $filename;
		echo "</br>";
		echo $this->token;
		return list($ret, $err) = $this->uploadManager->putFile($this->token, null, $filename);
	}

}

?>