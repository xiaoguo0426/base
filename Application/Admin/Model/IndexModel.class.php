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

}
