<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="Keywords" content="PHP,MYSQL,THINKPHP">
    <meta name="description" content="个人实验性网站">
    <meta name="author" content="gyt7574449@gmail.com">
    <meta http-equiv="Content-Language" content="zh-cn"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="http://localhost/base/Static/Resource/img/ico16x16.ico"/>
    <title><?php echo ($title); ?></title>

    <link href="http://localhost/base/Static/Resource/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/base/Static/Resource/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="http://localhost/base/Static/Resource/css/animate.css" rel="stylesheet">
    <link href="http://localhost/base/Static/Resource/css/style.css" rel="stylesheet">
    <link href="http://localhost/base/Static/Resource/plugins/layer/skin/layer.css" rel="stylesheet">

</head>

    <body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
					<span>
						<img alt="image" class="img-circle" src="http://localhost/base/Static/Resource/img/profile_small.jpg"/>
					</span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<span class="clear"> 
							<span class="block m-t-xs"> 
								<strong class="font-bold">David Williams</strong>
							</span>
						</span>
                    </a>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>

        </ul>
    </div>
</nav>
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a href="javascript:void(0);" data-logout>
                    <i class="fa fa-sign-out"></i> Logout
                </a>
            </li>
            <li>
                <a class="right-sidebar-toggle">
                    <i class="fa fa-tasks"></i>
                </a>
            </li>
        </ul>
    </nav>
</div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h4 class='pull-left'><?php echo ($title); ?></h4>
                            <div class="ibox-tools">
                                
    <button type="button" class="btn btn-sm btn-primary" data-modal="<?php echo U('Shop/Specifications/form');?>">添加规格</button>

                            </div>
                        </div>
                        <div class="ibox-content">
                            
                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline">
                                        
                                        <table class="table table-striped table-bordered table-hover dataTables-example dataTable dtr-inline"
                                               id="DataTables_Table_0" role="grid"
                                               aria-describedby="DataTables_Table_0_info">
                                            
    <thead>
    <tr>
        <th>排序</th>
        <th>分类</th>
        <th>规格名称</th>
        <th>状态</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
            <td><?php echo ($k); ?></td>
            <td><?php echo ($vo["category_id"]); ?></td>
            <td><?php echo ($vo["name"]); ?></td>
            <td><?php echo show_button_status($vo['status']);?></td>
            <td><?php echo show_toggle_button($vo['status'],$vo); echo show_edit_button($vo['id']);?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>

                                        </table>
                                        <!--												<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                                                                                                                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                                                                                                                <ul class="pagination">
                                                                                                                                                        <li class="paginate_button previous disabled" aria-controls="DataTables_Table_0" tabindex="0" id="DataTables_Table_0_previous"><a href="#">Previous</a></li>
                                                                                                                                                        <li class="paginate_button active" aria-controls="DataTables_Table_0" tabindex="0"><a href="#">1</a></li>
                                                                                                                                                        <li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a href="#">2</a></li>
                                                                                                                                                        <li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a href="#">3</a></li>
                                                                                                                                                        <li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a href="#">4</a></li>
                                                                                                                                                        <li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a href="#">5</a></li>
                                                                                                                                                        <li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a href="#">6</a></li>
                                                                                                                                                        <li class="paginate_button next" aria-controls="DataTables_Table_0" tabindex="0" id="DataTables_Table_0_next"><a href="#">Next</a></li>
                                                                                                                                                </ul>
                                                                                                                                        </div>-->
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>

<script src="http://localhost/base/Static/Resource/js/jquery-1.11.3.min.js"></script>
<script>
    window._APP_ = '/base';
    window._RES_ = 'http://localhost/base/Static/Resource';
    window._SELF_ = '/base/Shop/Specifications/index.shtml';
    load_menu();
    function load_menu() {
        $.ajax({
            type: 'GET',
            url: "<?php echo U('Admin/Index/get_tree_menu');?>",
            async: false,
            success: function (res) {
                if (typeof res === 'string') {
                    $("#side-menu").append(res);
                }
            }
        });
    }
</script>

<!-- Mainly scripts -->
<script src="http://localhost/base/Static/Resource/plugins/layer/layer.js"></script>
<script src="http://localhost/base/Static/Resource/plugins/validate/jquery.validate.js"></script>
<script src="http://localhost/base/Static/Resource/plugins/validate/dist/messages_zh.min.js"></script>
<script src="http://localhost/base/Static/Resource/plugins/validate/validate.extend.js"></script>
<script src="http://localhost/base/Static/Resource/js/common.js"></script>
<script src="http://localhost/base/Static/Resource/js/bootstrap.min.js"></script>
<script src="http://localhost/base/Static/Resource/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="http://localhost/base/Static/Resource/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- jQuery UI -->
<!--<script src="http://localhost/base/Static/Resource/js/plugins/jquery-ui/jquery-ui.min.js"></script>-->

<!-- Custom and plugin javascript -->
<script src="http://localhost/base/Static/Resource/js/inspinia.js"></script>
<script src="http://localhost/base/Static/Resource/js/plugins/pace/pace.min.js"></script>



</html>