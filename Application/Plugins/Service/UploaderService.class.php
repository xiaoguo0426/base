<?php

/**
 * Created by PhpStorm.
 * User: 74064
 * Date: 2016/7/21
 * Time: 23:18
 */
namespace Plugins\Service;

use Plugins\Model\UploaderModel;

class UploaderService
{

    private $model = '';

    public function __construct()
    {
        $this->model = new UploaderModel();
    }

    /**
     * 校验哈希值
     * 如果存在则直接返回文件的路径，不需要上传
     */
    public function validate_hash_value($hash_value = '')
    {
        if (empty($hash_value)) {
            return null;
        }
        $where = array('hash_value' => $hash_value);

        $file_url = $this->model->find_base($where, 'file_url');
        if ($file_url === false || $file_url === null) {
            return false;
        } else {
            return $file_url['file_url'];
        }
    }

    /**
     * 添加数据
     * @param array $params
     * @return bool|mixed
     */
    public function insert(array $params)
    {
        if (empty($params)) {
            return false;
        }
        $params['create_date'] = get_now_date();
        $params['create_by'] = get_user_id();
        return $this->model->insert($params);
    }

}