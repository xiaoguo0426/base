<?php

namespace Plugins\Controller;

use Think\Controller;

use Vendor\upload\Qiniu;

use Plugins\Service\UploaderService;

/**
 * Description of UploaderController
 *
 * @author laoguo
 */
class UploaderController extends Controller
{

    private $qiniu = "";

    public function __construct()
    {
        parent::__construct();
        //import('upload.Qiniu','','.php');
        $this->qiniu = new Qiniu();
    }

    /**
     *上传图片
     * 伪秒传实现：
     * 1.文件hash值
     * 2.匹配系统中是否存在该哈希值对应的文件。存在，则直接返回文件地址
     * 3.上传到七牛云，生成文件哈希记录
     * 4.返回文件的完整路径
     *
     * //还有一种实现：
     * 客户端生成文件hash值，提交到服务器。
     * hash值存在，则返回文件完整路径；不存在，则把文件上传到服务器
     *
     */
    public function form()
    {
        if (IS_POST) {
            if ($_FILES["file"]["error"] > 0) {
                unlink($_FILES['file']['tmp_name']);
                echo "Error: " . $_FILES["file"]["error"] . "<br />";
            } else {
                $file_name = APP_ROOT . 'Static/Resource/upload/' . $_FILES['file']['name'];
                if (!move_uploaded_file($_FILES['file']['tmp_name'], $file_name)) {
                    $this->error('本地保存错误！');
                }

                $hash_value = md5_file($file_name);

                $uploader_service = new UploaderService();
                $file_url = $uploader_service->validate_hash_value($hash_value);

                $info = [];
                if ($file_url !== false) {
                    unlink($file_name);

                    $info['status'] = 1;
                    $info['info'] = $file_url;
                    $this->ajaxReturn($info, 'JSON');
                } else {
                    $file_url = $this->qiniu->uploadFile($file_name);
                    $params = array(
                        'hash_value' => $hash_value,
                        'file_url' => $file_url
                    );
                    $upload_result = $uploader_service->insert($params);

                    unlink($file_name);

                    if ($upload_result !== false) {
                        //success
                        $info['status'] = 1;
                        $info['info'] = $file_url;
                        $this->ajaxReturn($info, 'JSON');
                    } else {
                        //fail
                        $info['status'] = 0;
                        $info['info'] = '';
                        $this->ajaxReturn($info, 'JSON');
                    }
                }

            }
        } else {
            $this->assign('title', '上传图片');
            $this->display();
        }
    }
}
