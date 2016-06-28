/**
 * 添加验证pattern
 * @param {type} 验证的字段
 * @param {type} 回掉函数       value  用户输入的值     element 当前对象
 * @param {type} 提示语
 */
$.validator.addMethod('pattern', function (value, element) {

	var pattern = $(element).attr('pattern'), reg;
	if (pattern.length !== 0) {
		reg = new RegExp(eval(pattern));
		if (!reg.test(value)) {
			return false;
		} else {
			return true;
		}
	}
	return false;

}, '请输入正确的值');

