<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta name="Keywords" content="PHP,MYSQL,THINKPHP">
        <meta name="description" content="个人实验性网站">
        <meta name="author" content="gyt7574449@gmail.com">
        <meta http-equiv="Content-Language" content="zh-cn"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="http://localhost/base/Static/Resource/img/ico16x16.ico" />
        <title></title>

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
						<img alt="image" class="img-circle" src="http://localhost/base/Static/Resource/img/profile_small.jpg" />
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
			<li class="active">
				<a href="#">
					<i class="fa fa-th-large"></i> 
					<span class="nav-label">Dashboards</span> 
					<span class="fa arrow"></span>
				</a>
				<ul class="nav nav-second-level collapse">
					<li class="active"><a href="index.html">Dashboard v.1</a></li>
					<li><a href="dashboard_2.html">Dashboard v.2</a></li>
					<li><a href="dashboard_3.html">Dashboard v.3</a></li>
					<li><a href="dashboard_4_1.html">Dashboard v.4</a></li>
				</ul>
			</li>
			<li>
				<a href="layouts.html"><i class="fa fa-diamond"></i> <span class="nav-label">Layouts</span></a>
			</li>
			<li>
				<a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Graphs</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level collapse">
					<li><a href="graph_flot.html">Flot Charts</a></li>
					<li><a href="graph_morris.html">Morris.js Charts</a></li>
					<li><a href="graph_rickshaw.html">Rickshaw Charts</a></li>
					<li><a href="graph_chartjs.html">Chart.js</a></li>
					<li><a href="graph_chartist.html">Chartist</a></li>
					<li><a href="graph_peity.html">Peity Charts</a></li>
					<li><a href="graph_sparkline.html">Sparkline Charts</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">系统设置</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level collapse">
					<li><a href="<?php echo U('Admin/Menu/index');?>">菜单管理</a></li>
					<li><a href="<?php echo U('Admin/Menu/form');?>">角色管理</a></li>
					<li><a href="#">用户管理</a></li>
					<li><a href="#">系统管理</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>
                <div id="page-wrapper" class="gray-bg dashbard-1">
                    <div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
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
                                        
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    
                                        <div class="table-responsive">
                                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline">
                                                
	<div id="DataTables_Table_0_filter" class="dataTables_filter">
		<label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="DataTables_Table_0"></label>
		<label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="DataTables_Table_0"></label>
		<label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="DataTables_Table_0"></label>
		<label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="DataTables_Table_0"></label>
	</div>

                                                <table class="table table-striped table-bordered table-hover dataTables-example dataTable dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                    
	<thead>
		<tr role="row">
			<th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 189px;">Rendering engine</th>
			<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 261px;">Browser</th>
			<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 237px;">Platform(s)</th>
			<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 165px;">Engine version</th>
			<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 124px;">CSS grade</th></tr>
	</thead>
	<tbody>
		<tr class="gradeA odd" role="row">
			<td class="sorting_1">Gecko</td>
			<td>Firefox 1.0</td>
			<td>Win 98+ / OSX.2+</td>
			<td class="center">1.7</td>
			<td class="center">A</td>
		</tr>
		<tr class="gradeA even" role="row">
			<td class="sorting_1">Gecko</td>
			<td>Netscape Browser 8</td>
			<td>Win 98SE+</td>
			<td class="center">1.7</td>
			<td class="center">A</td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<th rowspan="1" colspan="1">Rendering engine</th>
			<th rowspan="1" colspan="1">Browser</th>
			<th rowspan="1" colspan="1">Platform(s)</th>
			<th rowspan="1" colspan="1">Engine version</th>
			<th rowspan="1" colspan="1">CSS grade</th>
		</tr>
	</tfoot>

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
    
    <script>
		window._APP_ = '/base/index.php';
		window._RES_ = 'http://localhost/base/Static/Resource';
		window._SELF_ = '/base/index.php/Admin/Index/index.shtml';
    </script>

    <!-- Mainly scripts -->
    <script src="http://localhost/base/Static/Resource/js/jquery-2.1.1.js"></script>

    <script src="http://localhost/base/Static/Resource/js/bootstrap.min.js"></script>
    <script src="http://localhost/base/Static/Resource/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="http://localhost/base/Static/Resource/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- jQuery UI -->
    <!--<script src="http://localhost/base/Static/Resource/js/plugins/jquery-ui/jquery-ui.min.js"></script>-->

    <!-- Custom and plugin javascript -->
    <script src="http://localhost/base/Static/Resource/js/inspinia.js"></script>
    <script src="http://localhost/base/Static/Resource/js/plugins/pace/pace.min.js"></script>

    <script src="http://localhost/base/Static/Resource/js/common.js"></script>
    
	<!-- Data Tables -->
	<link href="http://localhost/base/Static/Resource/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
	<link href="http://localhost/base/Static/Resource/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
	<link href="http://localhost/base/Static/Resource/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
	<style>
		body.DTTT_Print {
			background: #fff;

		}
		.DTTT_Print #page-wrapper {
			margin: 0;
			background:#fff;
		}

		button.DTTT_button, div.DTTT_button, a.DTTT_button {
			border: 1px solid #e7eaec;
			background: #fff;
			color: #676a6c;
			box-shadow: none;
			padding: 6px 8px;
		}
		button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
			border: 1px solid #d2d2d2;
			background: #fff;
			color: #676a6c;
			box-shadow: none;
			padding: 6px 8px;
		}

		.dataTables_filter label {
			margin-right: 5px;

		}
	</style>

    

	<!-- Data Tables -->
	<script src="http://localhost/base/Static/Resource/js/plugins/dataTables/jquery.dataTables.js"></script>
	<script src="http://localhost/base/Static/Resource/js/plugins/dataTables/dataTables.bootstrap.js"></script>
	<script src="http://localhost/base/Static/Resource/js/plugins/dataTables/dataTables.responsive.js"></script>
	<script src="http://localhost/base/Static/Resource/js/plugins/dataTables/dataTables.tableTools.min.js"></script>


</html>