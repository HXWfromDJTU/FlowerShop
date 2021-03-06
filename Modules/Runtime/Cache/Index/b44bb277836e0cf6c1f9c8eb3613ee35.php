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
				<a class="icon icon-left pull-left back"></a>
				<h1 class="title">找回密码页面</h1>
			</header>
			<div class="content">
				<div class="page-login">
					<div class="list-block inset text-center">
						<h3>输入相关信息以找回密码</h3>
						<ul>
							<li>
								<div class="item-content">
									<div class="item-media"><i class="icon icon-form-name"></i></div>
									<div class="item-inner">
										<div class="item-input">
											<input id="find_username" type="text" placeholder="请输入用户名">
										</div>
									</div>
								</div>
							</li>
							<li>
								<div class="item-content">
									<div class="item-media"><i class="icon icon-form-email"></i></div>
									<div class="item-inner">
										<div class="item-input">
											<input id="find_mail" type="text" placeholder="注册时预留的邮箱">
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="content-block">
						<p>
							<a id="find_btn" class="button button-big button-fill external" data-transition='fade'>找回密码</a>
						</p>
					</div>
				</div>

			</div>
		</div>

		<script type='text/javascript' src='/ffhysc/View/Index/Public/js/zepto.js' charset='utf-8'></script>
		<script type='text/javascript' src='/ffhysc/View/Index/Public/js/light7.js' charset='utf-8'></script>
		<script type='text/javascript' src='/ffhysc/View/Index/Public/js/light7-swiper.js' charset='utf-8'></script>
		<script type='text/javascript' src='/ffhysc/View/Index/Public/js/light7-swipeout.js' charset='utf-8'></script>

		<script src="/ffhysc/View/Index/Public/js/app.js"></script>
		<!--<script src="/ffhysc/View/Index/Public/js/shop/register.js"></script>-->
		<script>
			/*为注册按钮绑定点击事件,调用注册方法,调用ajax*/
			$("#find_btn").on("click", function() {
				if($("#find_username").val().length == 0 || $("#find_mail").val().length == 0 ) {
					$.toast("未填写完整");
					return;
				}
				$.find($("#find_username").val(), $("#find_mail").val());
			})

			$.find = function(find_username, find_mail) {
				$.ajax({
					type: "post",
					url: "<?php echo U('user/findback');?>",
					async: true,
					data: {
						find_username: find_username,
						find_mail: find_mail
					},
					success: function(d) {
						var data = JSON.parse(d);
						/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
						if(data.code == "0000") {
							if(data.data["find-status"] == "succ") {
								$.alert("账号与密码已发送至你的绑定邮箱，请查收");
								/*window.location.href='http://localhost/ffhysc/index.php/index'*/
							} else if(data.data["find-status"] == "mail-fail"){
								$.toast("密码邮件发送失败，请确认你的邮箱服务器");
							}else{
								$.toast("用户名与邮箱不匹配");
							}
						} else {
							$.toast("通讯异常");
						}
					}
				});
			}
		</script>

	</body>

</html>