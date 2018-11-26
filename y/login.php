<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Y+Eadmin后台登录</title>   
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="author" content="Youngxj">

	<!-- Base Css Files -->
	<link href="./y/assets/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />
	<link href="./y/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="./y/assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="./y/assets/libs/fontello/css/fontello.css" rel="stylesheet" />
	<link href="./y/assets/libs/animate-css/animate.min.css" rel="stylesheet" />
	<link href="./y/assets/libs/nifty-modal/css/component.css" rel="stylesheet" />
	<link href="./y/assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" /> 
	<link href="./y/assets/libs/ios7-switch/ios7-switch.css" rel="stylesheet" /> 
	<link href="./y/assets/libs/pace/pace.css" rel="stylesheet" />
	<link href="./y/assets/libs/sortable/sortable-theme-bootstrap.css" rel="stylesheet" />
	<link href="./y/assets/libs/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
	<link href="./y/assets/libs/jquery-icheck/skins/all.css" rel="stylesheet" />
	<!-- Code Highlighter for Demo -->
	<link href="./y/assets/libs/prettify/github.css" rel="stylesheet" />

	<!-- Extra CSS Libraries Start -->
	<link href="./y/assets/css/style.css" rel="stylesheet" type="text/css" />
	<!-- Extra CSS Libraries End -->
	<link href="./y/assets/css/style-responsive.css" rel="stylesheet" />

	<link href="./y/assets/css/main.css" rel="stylesheet" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="./y/assets/img/favicon.ico">
    <link rel="apple-touch-icon" href="./y/assets/img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="./y/assets/img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="./y/assets/img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="./y/assets/img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="./y/assets/img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="./y/assets/img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="./y/assets/img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="./y/assets/img/apple-touch-icon-152x152.png" />
</head>
<body class="fixed-left login-page">
	<!-- Modal Start -->
	<!-- Modal Task Progress -->	
	<div class="md-modal md-3d-flip-vertical" id="task-progress">
		<div class="md-content">
			<h3><strong>忘记密码</strong></h3>
			<div>
				<p>如果忘记了密码可以使用官方的小工具进行重置密码</p>
				<p>直达链接：<a href="https://www.emlog.net/plugin/176" target="_black">点击下载</a></p>
				<p class="text-center">
					<button class="btn btn-danger btn-sm md-close">Close</button>
				</p>
			</div>
		</div>
	</div>

	<!-- Modal Logout -->
	<div class="md-modal md-just-me" id="logout-modal">
		<div class="md-content">
			<h3><strong>Logout</strong> Confirmation</h3>
			<div>
				<p class="text-center">Are you sure want to logout from this awesome system?</p>
				<p class="text-center">
					<button class="btn btn-danger md-close">Nope!</button>
					<a href="login.html" class="btn btn-success md-close">Yeah, I'm sure</a>
				</p>
			</div>
		</div>
	</div>        <!-- Modal End -->		
	<!-- Begin page -->
	<div class="container">
		<div class="full-content-center">
			
			<div class="login-wrap animated flipInX">
				<div class="login-block">
					<img src="./y/images/y159.png" class="not-logged-avatar">
					<form role="form" name="f" method="post" action="./index.php?action=login">
						<div class="form-group login-input">
							<i class="fa fa-user overlay"></i>
							<input type="text" class="form-control text-input" placeholder="账号" name="user" id="user">
						</div>
						<div class="form-group login-input">
							<i class="fa fa-key overlay"></i>
							<input type="password" class="form-control text-input" placeholder="密码" name="pw" id="pw">
						</div>
						<div class="createCode">
							<?php echo $ckcode; ?>
						</div>
						<div class="row" style="clear: both;">
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success btn-block" id="login">登录</button>
							</div>
							<div class="col-sm-6">
								<a data-modal="task-progress" href="javascript:;" class="btn btn-default btn-block md-trigger">忘记密码</a>
							</div>
						</div>
						<div class="login-error" id="login-error">
							<?php if ($error_msg): ?>
								<?php echo $error_msg; ?>
							<?php endif;?>
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>
	<!-- the overlay modal element -->
	<div class="md-overlay"></div>
	<!-- End of eoverlay modal -->
	<script>
		var resizefunc = [];
	</script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="./y/assets/libs/jquery/jquery-2.2.1.min.js"></script>
	<script src="./y/assets/libs/bootstrap/js/bootstrap.min.js"></script>

	<script src="./y/assets/libs/nifty-modal/js/classie.js"></script>

	<script src="./y/assets/libs/nifty-modal/js/modalEffects.js"></script>

	<script type="text/javascript">
		$('#login').click(function(){
			if($('#user').val()==''){
				$('#login-error').html('账号不能为空');
				return false;
			}else if($('#pw').val()==''){
				$('#login-error').html('密码不能为空');
				return false;
			}else if($('.val').length>0&&$('#imgcode').val()==''){
				$('#login-error').html('验证码不能为空');
				return false;
			}
		});
	</script>
</body>
</html>