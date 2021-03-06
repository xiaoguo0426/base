<?php if (!defined('THINK_PATH')) exit();?><div class="modal" data-keyboard='false' data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            
                <form method="POST" action="/base/Admin/Menu/form" class="form-horizontal" data-ajax="true"
                      onSubmit="return false;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title"><?php echo ($title); ?></h3>
                    </div>
                    <div class="modal-body" style="">
                        
    <div class="form-group"><label class="col-lg-2 control-label">上级菜单</label>
        <div class="col-lg-10">
            <select class="form-control m-b" name="parent_id">
                <option value="0">主菜单</option>
            </select>
        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">菜单名称</label>
        <div class="col-lg-10">
            <input type="text" name="name" value="<?php echo ($vo["name"]); ?>" placeholder="菜单名称" class="form-control" autofocus="true"
                   required="">
        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">节点选择</label>
        <div class="col-lg-10">

        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">链接地址</label>
        <div class="col-lg-10">
            <input type="text" name="path" value="<?php echo ($vo["path"]); ?>" placeholder="链接地址" class="form-control" required="">
        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">图标样式</label>
        <div class="col-lg-10">
            <input type="hidden" name="icon" value=""/>
            <button class="btn btn-success  dim" type="button" data-icon><i class="<?php echo ($vo["icon"]); ?>"></i></button>
            <button type="button" class="btn btn-w-m btn-info" data-modal="<?php echo U('Admin/Menu/icons');?>">
                选择图标
            </button>
        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label">排序</label>
        <div class="col-lg-10">
            <input type="text" name="sort" value="<?php echo ($vo["sort"]); ?>" class="form-control" required="">
        </div>
    </div>
    <!-- 表单的状态改变不要在这里做。控制器内没有对是否为主菜单校验 -->
    <!--<div class="form-group"><label class="col-lg-2 control-label">状态</label>-->
        <!--<div class="col-lg-10">-->
            <!--<div class="radio radio-info radio-inline">-->
                <!--<input type="radio" value="1" name="status"-->
                <!--<?php if(($vo["status"]) != "0"): ?>checked=""<?php endif; ?>-->
                <!--&gt;-->
                <!--启用-->
            <!--</div>-->
            <!--<div class="radio radio-info radio-inline">-->
                <!--<input type="radio" value="0" name="status"-->
                <!--<?php if(($vo["status"]) == "0"): ?>checked=""<?php endif; ?>-->
                <!--&gt;-->
                <!--禁用-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
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
            var load_menu = function () {
                $.ajax({
                    type: 'GET',
                    url: "<?php echo U('load_menu');?>",
                    success: function (res) {
                        if (res.length !== 0) {
                            var options = "", selected = "", parent_menu = '<?php echo ($vo["parent_id"]); ?>';
                            res.forEach(function (item) {
                                if (parent_menu == item.id) {
                                    selected = "selected";
                                } else {
                                    selected = "";
                                }
                                console.log(item.spl);
                                options += "<option value='" + item.id + "' " + selected + ">" + item.spl + item.name + "</option>";
                            });
                            $("select[name='parent_id']").append(options);
                        }
                    }
                });
            }

            load_menu();

        });
    </script>

</div>