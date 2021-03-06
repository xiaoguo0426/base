<?php if (!defined('THINK_PATH')) exit();?><div class="modal" data-keyboard='false' data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            
                <form method="POST" action="/base/Shop/Specifications/form" class="form-horizontal" data-ajax="true"
                      onSubmit="return false;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title"><?php echo ($title); ?></h3>
                    </div>
                    <div class="modal-body" style="">
                        

    <div class="form-group"><label class="col-lg-2 control-label">分类名称</label>
        <div class="col-lg-10">
            <select class="form-control m-b" name="category_id">
                <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item["id"]); ?>"
                    <?php if(($item["id"]) == $vo['category_id']): ?>selected<?php endif; ?>
                    ><?php echo ($item["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label">规格名称</label>
        <div class="col-lg-10">
            <input type="text" name="name" value="<?php echo ($vo["name"]); ?>" placeholder="规格名称" class="form-control" autofocus="true"
                   required=""/>
        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label">规格</label>
        <div class="col-lg-2 col-lg-offset-8">
            <button type="button" class="btn btn-sm btn-primary" id="add-model">添加规格</button>
        </div>
        <span class="help-block m-b-none text-info col-lg-offset-2">参数名，如：尺码，颜色，版本等；参数值以英文逗号分割</span>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label">状态</label>
        <div class="col-lg-10">
            <div class="radio radio-info radio-inline">
                <input type="radio" value="1" name="status"
                <?php if(($vo["status"]) != "0"): ?>checked=""<?php endif; ?>
                />
                启用
            </div>
            <div class="radio radio-info radio-inline">
                <input type="radio" value="0" name="status"
                <?php if(($vo["status"]) == "0"): ?>checked=""<?php endif; ?>
                />
                禁用
            </div>
        </div>
    </div>

    <input type="hidden" name="id" value="<?php echo ((isset($vo["id"]) && ($vo["id"] !== ""))?($vo["id"]):0); ?>"/>
    <input name="form_token" type="hidden" value="<?php echo ($form_token); ?>"/>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">关&nbsp;闭</button>
                        <button type="submit" class="btn btn-primary">保&nbsp;存</button>
                    </div>
                </form>
            
        </div>
    </div>
    <!-- 这两个block一定要放到这里，不然模态框显示的时候，背景会有多重重影 -->
    
    
    <script>
        var count = 0;
        var $_last_form_group = $('div.form-group:last');
        var $_button_add_model = $('button#add-model');
        $(function () {
            _init();

            $_button_add_model.on('click', function (e, key, value) {
                add_param(key || '', value || '');
            });

        });

        function _init() {
            var params = jQuery.parseJSON('<?php echo ($vo["params"]); ?>' || '{}');
            if (params.length !== 0) {
                var item;
                for (item in params) {
                    $_button_add_model.trigger("click", [item, params[item]]);
                }
            }
        }

        function del(obj) {
            var _self = $(obj);
            _self.parents('div.form-group').remove();
            count--;
        }
        function add_param(key, value) {
            if (count > 10) {
                layer.msg('规格个数不能大于10个！', {icon: 2});
                return false;
            }
            $_last_form_group.before('<div class="form-group"><div class="row"><div class="col-md-2 col-md-offset-1" style="padding-right: 0px;"><input type="text" name="params_name[]" placeholder="参数名" class="form-control" value="' + key + '" required=""></div><div class="col-md-7" style="padding-left: 0px;padding-right: 0px;"><input type="text" name="params_value[]" placeholder="参数值" class="form-control" value="' + value + '" required=""></div><div class="col-md-1" style="padding-left: 0px;"><button type="button" class="btn btn-danger" onclick="del(this);">删除</button></div></div></div>');
            count++;
        }
    </script>

</div>