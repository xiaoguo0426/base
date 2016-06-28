<?php

namespace Admin\Model;

use Think\Model;

/**
 * Description of IndexModel
 *
 * @author laoguo
 */
class IndexModel extends Model {

    protected $tableName = 'system_user';
    protected $_validate = array(
        array('name', 'require', '账号不能为空！'),
        array('password', 'require', '密码不能为空！'),
    );

    /**
     * 检验用户是否为合法
     * @param array $params         参数
     * @param type $field           字段集
     * @return type
     */
    public function find_base(array $params, $field = "*") {

        return $this->field($field)->where($params)->find();
    }

}
