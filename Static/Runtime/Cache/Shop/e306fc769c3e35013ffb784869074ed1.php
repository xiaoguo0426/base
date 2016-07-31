<?php if (!defined('THINK_PATH')) exit();?><div class="modal" data-keyboard='false' data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            
                <form method="POST" action="/base/Shop/Products/form" class="form-horizontal" data-ajax="true"
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
                <option value="">请选择分类</option>
                <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item["id"]); ?>"
                    <?php if(($item["id"]) == $vo['category_id']): ?>selected<?php endif; ?>
                    ><?php echo ($item["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label">商品名称</label>
        <div class="col-lg-10">
            <input type="text" name="name" value="<?php echo ($vo["name"]); ?>" placeholder="商品名称" class="form-control" autofocus="true"
                   required=""/>
        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label">logo</label>
        <div class="col-lg-10">
            <input type="hidden" name="logo" class="form-control" data-callback value="<?php echo ($vo["logo"]); ?>" placeholder="头像"
                   autofocus="true" autocomplete="off" readonly/>
            <img src="<?php echo ((isset($vo["logo"]) && ($vo["logo"] !== ""))?($vo["logo"]):'http://localhost/base/Static/Resource/img/add.png'); ?>" class="thumbnail" style="width: 96px;height: 96px;"
                 data-files="one"
                 data-modal="<?php echo U('Plugins/Uploader/form');?>"/>
        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label">缩略图</label>
        <div class="col-lg-10">
            <input type="hidden" name="images" class="form-control" data-callback value="<?php echo ($vo["images"]); ?>" placeholder="缩略图"
                   autofocus="true" autocomplete="off" readonly/>
            <img src="<?php echo ((isset($vo["logo"]) && ($vo["logo"] !== ""))?($vo["logo"]):'http://localhost/base/Static/Resource/img/add.png'); ?>" class="thumbnail" style="width: 64px;height: 64px;"
                 data-files="one"
                 data-modal="<?php echo U('Plugins/Uploader/form');?>"/>
        </div>
    </div>


    <div class="form-group"><label class="col-lg-2 control-label">规格</label>
        <div class="col-lg-10">
            <select class="form-control m-b" name="params_id">
                <option value="">请选择规格</option>
            </select>
        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label">规格参数</label>

    </div>

    <div class="form-group"><label class="col-lg-2 control-label">标签</label>
        <div class="col-lg-10">
            <input type="text" name="tags" value="<?php echo ($vo["tags"]); ?>" placeholder="标签" class="form-control" autofocus="true"
                   required=""/>
        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label">详情</label>
        <div class="col-lg-10">
            <input type="text" name="content" value="<?php echo ($vo["content"]); ?>" placeholder="详情" class="form-control"
                   autofocus="true"
                   required=""/>
        </div>
    </div>


    <div class="form-group"><label class="col-lg-2 control-label">备注</label>
        <div class="col-lg-10">
            <input type="text" name="back_up" value="<?php echo ($vo["back_up"]); ?>" placeholder="备注" class="form-control"
                   autofocus="true" required=""/>
        </div>
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
        $(function () {
            var $_category_id = $("select[name=category_id]"), $_params_id = $("select[name=params_id]"), category_id, specifications_id, options = '', params = '';
            //监听分类下拉菜单
            $_category_id.change(function () {
                category_id = this.value;
                if (category_id.length === 0) {
                    return false;
                }
                options = get_specifications_by_category_id(category_id);

                $_params_id.empty().append(options);
                //分类改变时，同时改变规格【查找该分类下的规格】
            }).trigger('change');

            $_params_id.change(function () {
                specifications_id = this.value;
                if (category_id.length === 0) {
                    return false;
                }
                params = get_params_by_specifications_id(specifications_id);
            });
        });

        /**
         * 获得分类
         */
        function get_specifications_by_category_id(category_id) {
            var result, options = '', params = {
                method: "POST",
                url: "<?php echo U('getSpecifications');?>",
                data: {"category_id": category_id},
                async: false
            };
            //同步加载数据
            result = $.form.load(params);
            if (result.length !== 0) {
                result.forEach(function (item) {
                    options += "<option value = '" + item.id + "'>" + item.name + "</option>";
                });
            }
            return options;
        }

    </script>

</div>