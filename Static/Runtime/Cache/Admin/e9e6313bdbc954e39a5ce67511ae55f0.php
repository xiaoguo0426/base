<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="Keywords" content="PHP,MYSQL,THINKPHP">
		<meta name="description" content="个人实验性网站">
		<meta name="author" content="gyt7574449@gmail.com">
		<meta name="COPYRIGHT" content="EggyDoy知识产权所有">
		<meta http-equiv="Content-Language"content="zh-cn"/> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title></title>

		<link href="http://localhost/base/Static/Resource/css/bootstrap.min.css" rel="stylesheet">
		<link href="http://localhost/base/Static/Resource/font-awesome/css/font-awesome.css" rel="stylesheet">

		<link href="http://localhost/base/Static/Resource/css/animate.css" rel="stylesheet">
		<link href="http://localhost/base/Static/Resource/css/style.css" rel="stylesheet">

	</head>
	
	<body class="gray-bg">
		<div class="middle-box text-center loginscreen animated fadeInDown">
			<div>
				<div>
					<h1 class="logo-name">IN+</h1>
				</div>
				<h3>Welcome to IN+</h3>
				<p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
					<!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
				</p>
				<p>Login in. To see it in action.</p>
				<form id="login" class="m-t" role="form" action="<?php echo U('login');?>" method='post' data-ajax="true" data-tips="正在登录..." onSubmit="return false;" autocomplete="off">
					<div class="form-group">
						<input type="text" class="form-control" name='name' placeholder="Username" maxlength="20" autocomplete="off" required="">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name='password' placeholder="Password" maxlength="20" required="">
					</div>
					<button type="submit" class="btn btn-primary block full-width m-b">Login</button>
					<a href="#"><small>Forgot password?</small></a>
				</form>
				<p class="m-t"> <small>&copy;广东轻工职业技术学院计算机工程系</small> </p>
				<p class="m-t"> <small>Power by EggyDog</small> </p>
			</div>
		</div>
	</body>

	<script>
		window._APP_ = '/base/index.php';
		window._RES_ = 'http://localhost/base/Static/Resource';
		window._SELF_ = '/base/index.php/Admin/Index/login.shtml';
	</script>

	<!-- Mainly scripts -->
	<script src="http://localhost/base/Static/Resource/js/jquery-2.1.1.js"></script>
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