<?php if (!defined('THINK_PATH')) exit();?><div class="modal" data-keyboard='false' data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            
                <form method="POST" action="/base/Admin/Role/form" class="form-horizontal" data-ajax="true"
                      onSubmit="return false;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title"><?php echo ($title); ?></h3>
                    </div>
                    <div class="modal-body" style="">
                        

    <div class="form-group"><label class="col-lg-2 control-label">角色名</label>
        <div class="col-lg-10">
            <input type="text" name="role_name" class="form-control" value="<?php echo ($vo["role_name"]); ?>" placeholder="角色名"
                   autofocus="true" required="">
        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label">权限</label>
        <div class="col-lg-10">
            <input type="text" name="auth" class="form-control" value="<?php echo ($vo["auth"]); ?>" placeholder="权限"
                   autofocus="true" required="">
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
            load_menu();
        });
        //加载菜单
        function load_menu() {
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
                            options += "<option value='" + item.id + "' " + selected + ">" + item.name + "</option>";
                        });
                        $("select[name='parent_id']").append(options);
                    }
                }
            });
        }
    </script>

</div>