<?php if (!defined('THINK_PATH')) exit();?><div class="modal" data-keyboard='false' data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            
                <form method="POST" action="/base/Shop/Delivery/form" class="form-horizontal" data-ajax="true"
                      onSubmit="return false;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title"><?php echo ($title); ?></h3>
                    </div>
                    <div class="modal-body" style="">
                        

    <div class="form-group"><label class="col-lg-2 control-label">快递</label>
        <div class="col-lg-10">
            <input type="text" name="name" value="<?php echo ($vo["name"]); ?>" placeholder="快递" class="form-control" autofocus="true" required="" />
        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label">价格</label>
        <div class="col-lg-10">
            <input type="text" name="price" value="<?php echo ($vo["price"]); ?>" placeholder="价格 格式【7.00】" class="form-control" pattern="/^[0-9]+(.[0-9]{2})?$/" title="请输入正确的价格" autofocus="true"
                   required="" />
        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label">备注</label>
        <div class="col-lg-10">
            <input type="text" name="back_up" value="<?php echo ($vo["back_up"]); ?>" placeholder="备注" class="form-control" autofocus="true" />
        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label">状态</label>
        <div class="col-lg-10">
            <div class="radio radio-info radio-inline">
                <input type="radio" value="1" name="status" <?php if(($vo["status"]) != "0"): ?>checked=""<?php endif; ?> />
                启用
            </div>
            <div class="radio radio-info radio-inline">
                <input type="radio" value="0" name="status" <?php if(($vo["status"]) == "0"): ?>checked=""<?php endif; ?> />
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
    
    
</div>