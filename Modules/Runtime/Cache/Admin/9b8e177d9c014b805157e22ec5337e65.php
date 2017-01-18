<?php if (!defined('THINK_PATH')) exit();?><html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>花艺商城管理端</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui">
		<link rel="shortcut icon" href="/ffhysc/View/Admin/Public/css/icon">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta content="yes" name="apple-touch-fullscreen">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link rel="stylesheet" href="/ffhysc/View/Admin/Public/css/light7.css">
		<link rel="stylesheet" href="/ffhysc/View/Admin/Public/css/light7-swiper.css">
		<link rel="stylesheet" href="/ffhysc/View/Admin/Public/css/light7-swipeout.css">
		<link rel="apple-touch-icon" href="/ffhysc/View/Admin/Public/img/apple-touch-icon-114x114.png">

		<link rel="stylesheet" href="/ffhysc/View/Admin/Public/css/font_1433748561_0232708.css">
		<link rel="stylesheet" href="/ffhysc/View/Admin/Public/css/app.css">
		<style>
			/*设置背景图片*/
			
			.content {
				background-image: url(/ffhysc/View/Admin/Public/img/bg-adminLogin.jpg);
				background-size: cover;
			}
			/*头像大小设置*/
			
			.user-head-box img {
				width: 5.0rem;
				border-radius: 2.5rem;
				position: relative;
				left: -1.0rem;
			}
			/*输入框背景透明化*/
			
			.list-block ul {
				background-color: rgba(0, 0, 0, 0);
			}
			
			#page-login {
				color: #000000;
			}
			
			.page-login h3 {
				font-weight: 2.0rem;
				margin: 0 0 1.0rem 0;
			}
			
			.item-content.user-head-box {
				text-align: center;
				margin-top: 2.5rem;
			}
			
			.item-content.user-head-box .item-media {
				width: 4.0rem;
				margin: 0 auto;
			}
			
			#input-box {
				border-radius: 0.5rem;
				border: 1px solid #8B008B;
				background-color: rgba(255, 255, 255, 0.6);
			}
			/*header背景色调*/
			.bar {
				background-color: skyblue;
			}
			/*操作按钮的位置*/
			
			.content-block {
				margin: 4.75rem 0;
			}
			
			.content.register-content {
				background-image: url(/ffhysc/View/Admin/Public/img/bg-register.png);
				background-size: cover;
			}
			
			.register-content .content-block {
				margin-top: 3.0rem;
			}
			
			.sex-box .img-box {
				width: 4.0rem;
				margin: 0.5rem 0;
			}
			
			.sex-box .img-box.active img {
				border: 5px solid #8B008B;
			}
			
			.sex-box .img-box img {
				width: 100%;
				border-radius: 2.0rem;
			}
			/*整体图标的颜色*/
			
			.icon {
				color: #8B008B;
			}
			
			#login-btn {
				background-color: #FF69B4;
				width: 70%;
				margin: 0 auto;
			}
			
			#register-btn {
				background-color: #FF69B4;
			}
			#login_btn{
				background-color: skyblue;
			}
		</style>
	</head>

	<body>
		<div class="page">
			<header class="bar bar-nav">
				<h1 class="title">花艺商城管理端</h1>
			</header>
			<div class="content">
				<div class="page-login" id="page-login">
					<div class="list-block inset text-center">
						<ul>
							<li>
								<div href="#" class="item-content user-head-box">
									<div class="item-media">
										<img src="/ffhysc/View/Admin/Public/img/adminIcon.jpg">
									</div>
								</div>
							</li>
						</ul>
						<ul id="input-box">
							<!-- Text inputs -->
							<li>
								<div class="item-content">
									<div class="item-media"><i class="icon icon-me"></i></div>
									<div class="item-inner">
										<div class="item-input">
											<input id="log_username" type="text" placeholder="请输入管理员账号">
										</div>
									</div>
								</div>
							</li>
							<li>
								<div class="item-content">
									<div class="item-media"><i class="icon icon-edit"></i></div>
									<div class="item-inner">
										<div class="item-input">
											<input id="log_psd" type="password" placeholder="请输入管理员密码">
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="content-block">
						<div class="row">
							<div class="col-100">
								<a id="login_btn" class="button button-big button-fill button-success">管理员登录</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type='text/javascript' src='/ffhysc/View/Admin/Public/js/zepto.js' charset='utf-8'></script>
		<script type='text/javascript' src='/ffhysc/View/Admin/Public/js/light7.js' charset='utf-8'></script>
		<script type='text/javascript' src='/ffhysc/View/Admin/Public/js/light7-swiper.js' charset='utf-8'></script>
		<script type='text/javascript' src='/ffhysc/View/Admin/Public/js/light7-swipeout.js' charset='utf-8'></script>
		<script src="/ffhysc/View/Admin/Public/js/app.js"></script>
		<script src="/ffhysc/View/Admin/Public/js/public.js"></script>
		<script src="/ffhysc/View/Admin/Public/js/index.js"></script>
		<script>
			$.login = function(log_username, log_psd) {
				$.ajax({
					type: "post",
					url: "<?php echo U('admin/login');?>",
					async: true,
					data: {
						log_username: log_username,
						log_psd: log_psd
					},
					success: function(d) {
						var data = JSON.parse(d);
						/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
						if(data.code == "0000") {
							if(data.data["login-status"] == "succ") {
								sessionStorage.setItem("adminName", log_username);
								sessionStorage.setItem("adminID", data.data["userID"]);
								$.toast("登陆成功");
								/*跳转到主界面*/
								window.location.href = "http://localhost/ffhysc/admin.php/index/mainPanel.html";
							} else if(data.data["login-status"] == "not-match") {
								$.toast("账号与密码不匹配");
							} else {
								$.toast("账号不存在");
							}
						} else {
							$.alert("通讯异常");
						}
					}
				});
			}	
			/*为登录按钮绑定点击事件,调用注册方法,调用ajax*/
			$("#login_btn").on("click", function() {
				if($("#log_username").val().length == 0 || $("#log_psd").val() == 0) {
					$.toast("账号和密码都不能为空");
					return;
				}
				$.login($("#log_username").val(), $("#log_psd").val());
			})
		</script>
	</body>

</html>