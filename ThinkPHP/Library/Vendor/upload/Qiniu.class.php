<?php

namespace Vendor\upload;

require 'autoload.php';

// 引入鉴权类
use Qiniu\Auth;
// 引入上传类
use Qiniu\Storage\UploadManager;

class Qiniu
{

    private $accessKey = '';
    private $secretKey = '';
    private $bucket = '';
    private $auth = '';
    private $token = '';
    private $uploadManager = '';
    private $policy = [];
    private $config = [];

    public function __construct()
    {
        
        $this->config = load_config(__DIR__ . '/config.php');

        $this->accessKey = $this->config['accessKey'];
        $this->secretKey = $this->config['secretKey'];
        $this->bucket = $this->config['bucket'];
        $this->policy = $this->config['policy'];
        $this->auth = new Auth($this->accessKey, $this->secretKey);
        $this->token = $this->auth->uploadToken($this->bucket);
        $this->uploadManager = new UploadManager();
    }

    public function uploadFile($filename = '')
    {
        list($ret, $err) = $this->uploadManager->putFile($this->token, get_now_date('YmdHis') . '.' . pathinfo($filename, PATHINFO_EXTENSION), $filename);
        if ($err !== null) {
            var_dump($err);
        } else {
            return $this->config['domain'] . '/' . $ret['key'];
        }
    }

}

?>