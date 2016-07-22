<?php if (!defined('THINK_PATH')) exit();?><div class="modal" data-keyboard='false' data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            
                <form method="POST" action="/base/Admin/User/form" class="form-horizontal" data-ajax="true"
                      onSubmit="return false;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title"><?php echo ($title); ?></h3>
                    </div>
                    <div class="modal-body" style="">
                        

    <div class="form-group"><label class="col-lg-2 control-label">昵称</label>
        <div class="col-lg-10">
            <input type="text" name="nick_name" class="form-control" value="<?php echo ($vo["nick_name"]); ?>" placeholder="昵称"
                   autofocus="true" autocomplete="off"/>
        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label">头像</label>
        <div class="col-lg-10">
            <input type="text" name="logo" class="form-control" data-callback value="<?php echo ($vo["logo"]); ?>" placeholder="头像"
                   autofocus="true" autocomplete="off" readonly/>
            <img src="<?php echo ((isset($vo["logo"]) && ($vo["logo"] !== ""))?($vo["logo"]):'http://localhost/base/Static/Resource/img/add.png'); ?>" class="thumbnail" style="width: 128px;height: 128px;"
                 data-files="one"
                 data-modal="<?php echo U('Plugins/Uploader/form');?>"/>
        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label">账号</label>
        <div class="col-lg-10">
            <input type="text" name="name" class="form-control" value="<?php echo ($vo["name"]); ?>" placeholder="账号"
                   autofocus="true" autocomplete="off" required=""/>
        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label">密码</label>
        <div class="col-lg-10">
            <input type="password" name="password" class="form-control" value="<?php echo ($vo["password"]); ?>" placeholder="密码"
                   autofocus="true" autocomplete="off" required=""/>
        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label">角色</label>
        <div class="col-lg-10">
            <!--<input type="password" name="password" class="form-control" value="<?php echo ($vo["password"]); ?>" placeholder="权限"-->
            <!--autofocus="true" required="">-->
        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label">状态</label>
        <div class="col-lg-10">
            <div class="radio radio-info radio-inline">
                <input type="radio" value="1" name="status"
                <?php if(($vo["status"]) != "0"): ?>checked=""<?php endif; ?>
                >
                启用
            </div>
            <div class="radio radio-info radio-inline">
                <input type="radio" value="0" name="status"
                <?php if(($vo["status"]) == "0"): ?>checked=""<?php endif; ?>
                >
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
        $("img").error(function () {
            $(this).attr('src', _RES_ + '/img/add.png');
        });
    </script>

</div>