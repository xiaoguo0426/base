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
                                
                            </div>
                        </div>
                        <div class="ibox-content">
                            
    <form class="form-horizontal" method="POST" action="/base/Shop/Config/index" data-ajax="true" onSubmit="return false;">
        <div class="form-group"><label class="col-sm-2 control-label">商城名称</label>
            <div class="col-sm-10">
                <input type="text" name="mall_name" class="form-control" value="<?php echo ($vo["mall_name"]); ?>" placeholder="商城名称"
                       autofocus="true" required="">
            </div>
        </div>
        <div class="hr-line-dashed"></div>

        <div class="form-group"><label class="col-sm-2 control-label">公司名称</label>
            <div class="col-sm-10">
                <input type="text" name="company" class="form-control" value="<?php echo ($vo["company"]); ?>" placeholder="公司名称"
                       autofocus="true" required="">
            </div>
        </div>
        <div class="hr-line-dashed"></div>

        <div class="form-group"><label class="col-sm-2 control-label">公司地址</label>
            <div class="col-sm-10">
                <input type="text" name="company_address" class="form-control" value="<?php echo ($vo["company_address"]); ?>"
                       placeholder="公司地址"
                       autofocus="true" required="">
            </div>
        </div>
        <div class="hr-line-dashed"></div>

        <div class="form-group"><label class="col-sm-2 control-label">联系方式</label>
            <div class="col-sm-10">
                <input type="text" name="phone" class="form-control" value="<?php echo ($vo["phone"]); ?>" placeholder="联系方式"
                       autofocus="true" required="">
            </div>
        </div>
        <div class="hr-line-dashed"></div>

        <div class="form-group"><label class="col-sm-2 control-label">联系地址</label>
            <div class="col-sm-10">
                <input type="text" name="address" class="form-control" value="<?php echo ($vo["address"]); ?>" placeholder="联系地址"
                       autofocus="true" required="">
            </div>
        </div>
        <div class="hr-line-dashed"></div>

        <div class="form-group"><label class="col-sm-2 control-label">微信支付配置</label>
            <div class="col-sm-10">
                <input type="text" name="wechat_pay" class="form-control" value="<?php echo ($vo["wechat_pay"]); ?>" placeholder="微信支付配置"
                       autofocus="true" required="">
            </div>
        </div>
        <div class="hr-line-dashed"></div>

        <div class="form-group"><label class="col-sm-2 control-label">支付宝支付配置</label>
            <div class="col-sm-10">
                <input type="text" name="ali_pay" class="form-control" value="<?php echo ($vo["ali_pay"]); ?>" placeholder="支付宝支付配置"
                       autofocus="true" required="">
            </div>
        </div>
        <div class="hr-line-dashed"></div>

        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-6">
                <button class="btn btn-primary" type="submit">保&nbsp;存</button>
            </div>
        </div>
    </form>

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
    window._SELF_ = '/base/Shop/Config/index.shtml';
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