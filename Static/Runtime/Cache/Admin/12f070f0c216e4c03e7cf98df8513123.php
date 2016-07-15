<?php if (!defined('THINK_PATH')) exit();?><div class="modal" data-keyboard='false' data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            
                <form method="POST" action="/base/index.php/Admin/Menu/form" class="form-horizontal" data-ajax="true"
                      onSubmit="return false;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title"><?php echo ($title); ?></h3>
                    </div>
                    <div class="modal-body" style="padding: 15px;">
                        
    <div class="form-group"><label class="col-lg-2 control-label">上级菜单</label>
        <div class="col-lg-10">
            <select class="form-control m-b" name="parent">
                <option value="0">主菜单</option>
                <option value="1">option 2</option>
                <option value="2">option 3</option>
                <option value="3">option 4</option>
            </select>
        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">菜单名称</label>
        <div class="col-lg-10">
            <input type="text" name="name" placeholder="菜单名称" class="form-control" autofocus="true" required="">
        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">节点选择</label>
        <div class="col-lg-10">

        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">链接地址</label>
        <div class="col-lg-10">
            <input type="text" name="path" placeholder="链接地址" class="form-control" required="">
        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">图标样式</label>
        <div class="col-lg-10">
            <input type="hidden" name="icon" value=""/>
            <button class="btn btn-success  dim" type="button" data-icon><i class="fa fa-upload"></i></button>
            <button type="button" class="btn btn-w-m btn-info" data-modal="<?php echo U('Admin/Menu/icons');?>">
                选择图标
            </button>
        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">排序</label>
        <div class="col-lg-10">
            <input type="text" name="sort" value="0" class="form-control" required="">
        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">状态</label>
        <div class="col-lg-10">
            <div class="radio radio-info radio-inline">
                <input type="radio" value="1" name="status" checked="">
                启用
            </div>
            <div class="radio radio-info radio-inline">
                <input type="radio" value="0" name="status">
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
        $("button[data-modal]").on('click', function () {
            var param = {};
            param.url = $(this).data('modal');
            $.form.load(param);
        });
    </script>

</div>