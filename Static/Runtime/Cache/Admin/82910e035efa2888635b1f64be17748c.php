<?php if (!defined('THINK_PATH')) exit();?>
<div class="modal inmodal in" id="myModal4" tabindex="-1" role="dialog"  aria-hidden="true" style="display: block;">
	<div class="modal-dialog">
		<div class="modal-content animated fadeIn">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			</div>
			<div class="modal-body">
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
							</div><div class="info"></div>
							<div class="btns">
								<div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<div class="modal-backdrop  in"></div>
<link rel="stylesheet" href="http://localhost/base/Static/Resource/plugins/uploader/css/webuploader.css" />
<link rel="stylesheet" href="http://localhost/base/Static/Resource/plugins/uploader/css/style.css" />
<script type="text/javascript" src="http://localhost/base/Static/Resource/plugins/uploader/js/webuploader.js"></script>
<script type="text/javascript" src="http://localhost/base/Static/Resource/plugins/uploader/js/upload.js"></script>