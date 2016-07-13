<?php if (!defined('THINK_PATH')) exit();?><div class="modal" data-keyboard='false' data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                
                    <form method="POST" action="/base/index.php/Plugins/Uploader/form" class="form-horizontal" data-ajax="true" onsubmit="false">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title"><?php echo ($title); ?></h3>
                        </div>
                        <div class="modal-body" style="padding: 15px;">
                            
    <div id="container">
        <!--头部，相册选择和格式选择-->
        <div id="uploader">
            <div class="queueList">
                <div id="dndArea" class="placeholder">
                    <div id="filePicker"></div>
                    <p>或将照片拖到这里，单次最多可选300张</p>
                </div>
            </div>
            <div class="statusBar" style="display:none;">
                <div class="progress">
                    <span class="text">0%</span>
                    <span class="percentage"></span>
                </div>
                <div class="info"></div>
                <div class="btns">
                    <div id="filePicker2"></div>
                    <div class="uploadBtn">开始上传</div>
                </div>
            </div>
        </div>
    </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">关&nbsp;闭</button>
                            <button type="button" class="btn btn-primary">保&nbsp;存</button>
                        </div>
                    </form>
                
            </div>
    </div>
    <!-- 这两个block一定要放到这里，不然模态框显示的时候，背景会有多重重影 -->
    
    <link rel="stylesheet" href="http://localhost/base/Static/Resource/plugins/uploader/css/webuploader.css"/>
    <link rel="stylesheet" href="http://localhost/base/Static/Resource/plugins/uploader/css/style.css"/>

    
    <script type="text/javascript" src="http://localhost/base/Static/Resource/plugins/uploader/js/webuploader.js"></script>
    <script type="text/javascript" src="http://localhost/base/Static/Resource/plugins/uploader/js/upload.js"></script>

</div>