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
        // $.getScript(_RES_ + "/plugins/layer/layer.js");
        // $.getScript(_RES_ + "/plugins/validate/jquery.validate.js");
        // $.getScript(_RES_ + "/plugins/validate/dist/messages_zh.min.js");
        // $.getScript(_RES_ + "/plugins/validate/validate.extend.js");
    };

    function _form() {
        this.version = '0.1';
        this.author = 'eggyDoy';
    }

    /**
     * 异步加载数据
     * @returns {undefined}
     * update 2016-03-27  方法参数对象化
     * url  url地址
     * data  参数
     * method  请求类型
     * tips  提示
     * selector  选择器
     * async   是否异步请求
     */
    _form.prototype.load = function (param) {
        var index = layer.load({icon: 16});
        $.ajax({
            type: param.method || 'GET',
            url: param.url || _SELF_,
            data: param.data || {},
            // dataType: 'json',
            async: typeof param.async === 'undefined' ? true : false,
            beforeSend: function () {
            },
            complete: function (XMLHttpRequest, textStatus) {
                layer.close(index);
            },
            success: function (res, textStatus) {

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
                        layer.close(index);
                    }
                }
                // var _modal = $(res);
                // _modal.appendTo('body');
                // // $('body').append(res);
                // $('.modal').modal('show').on('hidden.bs.modal',function(){
                //     _modal.remove();
                // });

                //动态添加的html一定要在common.js之前，不然动态添加的html是没有办法事件绑定的
                window._modal = $(res).appendTo('#wrapper').modal('show').on('hidden.bs.modal', function () {
                    $(this).remove();
                });
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log('error');
                console.log(XMLHttpRequest);
                console.log(textStatus);
                console.log(errorThrown);
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
    var param = {};
    window._modal = "";
    $("body > *")
        .on('click', '[data-ajax]', function () {
            var _self = $(this);
            _self.validate({
                //验证通过后回掉函数
                submitHandler: function () {
                    param.url = _self.attr('action');
                    param.data = _self.serializeArray();
                    param.method = _self.attr('method');
                    param.tips = _self.data('tips');
                    $.form.load(param);
                }
            });
        }).on('click', '[data-logout]', function () {
        //退出登陆
        param.url = _APP_ + "/Admin/Index/logout";
        param.method = "POST";

        confirm('确定要退出系统？') && $.form.load(param);
    }).on('click', '[data-modal]', function () {
        var _self = $(this);
        //同步加载模态框
        param.url = _self.data('modal');
        $.form.load(param);
    }).on('click', '[data-resume]', function () {
        var _self = $(this);
        param.url = _self.data('path');
        param.data = _self.data('id');

    }).on('click', '[data-forbid]', function () {
        var _self = $(this);
        param.url = _self.data('forbid');
        param.data = {"id": _self.data('id') || ""};
        param.method = "POST";
        $.form.load(param);
    }).on('click', '[data-resume]', function () {
        var _self = $(this);
        param.url = _self.data('resume');
        param.data = {"id": _self.data('id') || ""};
        param.method = "POST";
        $.form.load(param);
    });

});



