;
(function () {

    function _app() {
        this.version = '0.1';
        this.author = 'eggyDog';
        this.create_date = '2016-03-14';
        this.init();
    }

    /**
     * 初始化
     * @returns {undefined}
     */
    _app.prototype.init = function () {
        $.getScript(_RES_ + "/plugins/layer/layer.js");
        $.getScript(_RES_ + "/plugins/validate/jquery.validate.js");
        $.getScript(_RES_ + "/plugins/validate/dist/messages_zh.min.js");
        $.getScript(_RES_ + "/plugins/validate/validate.extend.js");
    };

    function _form() {
        this.version = '0.1';
        this.author = 'eggyDoy';
    }

    /**
     * 异步加载数据
     * @returns {undefined}
     */
    _form.prototype.load = function (url, data, type, tips) {
        var index = layer.load({icon: 16});
        $.ajax({
            type: type || 'GET',
            url: url || _SELF_,
            data: data || {},
            dataType: 'json',
            beforeSend: function () {
            },
            complete: function (XMLHttpRequest, textStatus) {
                layer.close(index);
            },
            success: function (res) {
                return false;
                if (typeof res === 'object') {
                    if (res.status === 1) {
                        layer.msg(res.info || '操作成功！', {icon: 1});
                        window.setTimeout(function () {
                            if (res.url) {
                                window.location.href = res.url;
                            } else {
                                window.location.reload();
                            }
                        }, 3000);

                    } else {
                        layer.msg(res.info || '操作失败！', {icon: 2});
                    }
                }

                console.log(res);
                jQuery(res).appendTo('body');
            },
            error: function () {

            }
        });
    };


    /**
     * 表单挂载
     */
    _app.prototype.form = new _form();

    /**
     * 应用挂载
     */
    $.extend(new _app());
})(jQuery);


$(function () {
    $("body > *")
        .on('click', '[data-ajax]', function () {
            var $_form = $(this);
            $_form.validate({
                //验证通过后回掉函数
                submitHandler: function () {
                    $.form.load($_form.attr('action'), $_form.serializeArray(), $_form.attr('method'), $_form.data('tips'));
                }
            });
        })
        .on('click', '[data-logout]', function () {
            confirm('确定要退出系统？') && $.form.load(_APP_ + "/Admin/Index/logout", {}, 'post');
        }).on('click', '[data-modal]', function () {
        $.form.load($(this).data('modal'));
    });
});

