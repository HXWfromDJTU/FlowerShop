<?php if (!defined('THINK_PATH')) exit();?><html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>芬芳花艺商城</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui">
		<link rel="shortcut icon" href="http://www.light7.cn/favicon.ico">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta content="yes" name="apple-touch-fullscreen">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<link rel="stylesheet" href="/ffhysc/View/Index/Public/css/light7.css">
		<link rel="stylesheet" href="/ffhysc/View/Index/Public/css/light7-swiper.css">
		<link rel="stylesheet" href="/ffhysc/View/Index/Public/css/light7-swipeout.css">
		<link rel="apple-touch-icon" href="/ffhysc/View/Index/Public/img/apple-touch-icon-114x114.png">

		<link rel="stylesheet" href="/ffhysc/View/Index/Public/css/font_1433748561_0232708.css">
		<link rel="stylesheet" href="/ffhysc/View/Index/Public/css/app.css">
		<style>
			.content {
				color: #999;
			}
			
			.button.button-fill.button-big {
				line-height: 2.0rem;
				height: 2.0rem;
			}
			
			.list-block {
				margin: .75rem;
			}
			
			.content-block {
				margin: .75rem 0;
			}
			
			.signup a {
				color: #999;
			}
		</style>
	</head>

	<body>

		<div class="page">
			<header class="bar bar-nav">
				<h1 class="title">登录页面</h1>
			</header>
			<div class="content">
				<div class="page-login">
					<div class="list-block inset text-center">
						<h3>芬芳花艺商城</h3>
						<ul>
							<!-- Text inputs -->
							<li>
								<div class="item-content">
									<div class="item-media"><i class="icon icon-form-name"></i></div>
									<div class="item-inner">
										<div class="item-input">
											<input id="log_username" type="text" placeholder="请输入用户名">
										</div>
									</div>
								</div>
							</li>
							<li>
								<div class="item-content">
									<div class="item-media"><i class="icon icon-form-email"></i></div>
									<div class="item-inner">
										<div class="item-input">
											<input id="log_password" type="password" placeholder="请输入密码">
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="content-block">
						<p>
							<a id="login_btn" class="button button-big button-fill external" data-transition='fade'>登录</a>
						</p>
						<p class='text-center signup'>
							<a id="page-register" class='pull-left'>没有账号?</a>
							<a id="page-forget"  class='pull-right'>忘记密码?</a>
						</p>
						<div class="leader">
							<!--多种方式登录-->
						</div>
						<div class="row others">
							<a class="col-33" href='<?php echo U("index/detail");?>'> <img src="/ffhysc/View/Index/Public/img/life.png" alt="" width='60'></a>
							<a class="col-33" href='<?php echo U("index/search");?>'> <img src="/ffhysc/View/Index/Public/img/art.png" alt="" width='61'></a>
							<a class="col-33"> <img src="/ffhysc/View/Index/Public/img/flower.png" alt="" width='64'></a>
						</div>
					</div>
				</div>

			</div>
		</div>

		<script type='text/javascript' src='/ffhysc/View/Index/Public/js/zepto.js' charset='utf-8'></script>
		<script type='text/javascript' src='/ffhysc/View/Index/Public/js/light7.js' charset='utf-8'></script>
		<script type='text/javascript' src='/ffhysc/View/Index/Public/js/light7-swiper.js' charset='utf-8'></script>
		<script type='text/javascript' src='/ffhysc/View/Index/Public/js/light7-swipeout.js' charset='utf-8'></script>

		<script src="/ffhysc/View/Index/Public/js/app.js"></script>
		<script src="/ffhysc/View/Index/Public/js/shop/index.js"></script>
		<script>
			$.login = function(log_username, log_password) {
				$.ajax({
					type: "post",
					url: "<?php echo U('user/login');?>",
					async: true,
					data: {
						log_username: log_username,
						log_psd: log_password
					},
					success: function(d) {
						var data = JSON.parse(d);
						/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
						if(data.code == "0000") {
							if(data.data["login-status"] == "succ") {
								sessionStorage.setItem("username", log_username);
								sessionStorage.setItem("userID", data.data["userID"]);
								$.toast("登陆成功");
								/*跳转到主界面*/
								window.location.href = "http://localhost/ffhysc/index.php/index/home.html";
							} else if(data.data["login-status"] == "not-match") {
								$.toast("用户名与密码不匹配");
							} else {
								$.toast("用户不存在");
							}
						} else {
							$.alert("通讯异常");
						}
					}
				});
			}

			$("#login_btn").on("click", function() {
				if($("#log_username").val().length == 0 || $("#log_password").val() == 0) {
					$.toast("账号和密码都不能为空");
					return;
				}
				$.login($("#log_username").val(), $("#log_password").val());
			})
			$("#page-register").on("click", function() {
				window.location.href='http://localhost/ffhysc/index.php/index/register.html';
			})
			$("#page-forget").on("click", function() {
				window.location.href='http://localhost/ffhysc/index.php/index/forget.html';
			})
		</script>

	</body>

</html>