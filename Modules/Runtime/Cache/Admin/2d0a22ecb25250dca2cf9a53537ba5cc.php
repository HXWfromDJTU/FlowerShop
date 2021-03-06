<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>婚纱影楼管理端</title>
		<meta name="description" content="light7: Build mobile apps with simple HTML, CSS, and JS components.">
		<meta name="author" content="任行">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<link rel="shortcut icon" href="/ffhysc/View/Admin/Public/img/icon.jpg">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link rel="stylesheet" href="/ffhysc/View/Admin/Public/css/light7e0da.css?r=201603281">
		<link rel="stylesheet" href="/ffhysc/View/Admin/Public/css/light7-swiper.css">
		<link rel="stylesheet" href="/ffhysc/View/Admin/Public/css/light7-swipeout.css">
		<link rel="stylesheet" href="/ffhysc/View/Admin/Public/css/demos.css">

		<link rel="apple-touch-icon-precomposed" href="/ffhysc/View/Admin/Public/img/apple-touch-icon-114x114.png">
		<script src="/ffhysc/View/Admin/Public/js/jquery-2.1.4.js"></script>
		<style>
			/*header背景色调*/
			
			.bar {
				background-color: skyblue;
			}
			#change_head{
				width: 5.0rem;
			}
		</style>
	</head>

	<body>
		<div id="page-check-list" class="page">
			<header class="bar bar-nav">
				<a class="button button-link button-nav pull-left back">
					<span class="icon icon-left"></span> Back
				</a>
				<h1 class="title">修改用户信息</h1>
			</header>
			<div class="content" style="top: 0.2rem;">
				<div class="list-block">
					<ul>
						<li>
							<div class="item-content">
								<div class="item-inner">
									<div class="item-title label">头像</div>
									<img id="change_head" src="">
									<input type="file" onchange="$.upload(this)" id="input-img" style="display: none;" />
								</div>
							</div>
						</li>
						<li>
							<div class="item-content">

								<div class="item-inner">
									<div class="item-title label">用户名</div>
									<div class="item-input">
										<input id="username" type="text" placeholder="">
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="item-content">
								<div class="item-inner">
									<div class="item-title label">密码</div>
									<div class="item-input">
										<input id="password" type="password">
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="item-content">

								<div class="item-inner">
									<div class="item-title label">支付密码</div>
									<div class="item-input">
										<input id="payPassword" type="password">
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="item-content">

								<div class="item-inner">
									<div class="item-title label">余额</div>
									<div class="item-input">
										<input id="balance" type="text">
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="item-content">

								<div class="item-inner">
									<div class="item-title label">昵称</div>
									<div class="item-input">
										<input id="nickname" type="text">
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="item-content">

								<div class="item-inner">
									<div class="item-title label">安全邮箱</div>
									<div class="item-input">
										<input id="email" type="tel">
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="item-content">

								<div class="item-inner">
									<div class="item-title label">生日</div>
									<div class="item-input">
										<input id="birthday" type="text" data-toggle="date">
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="item-content">

								<div class="item-inner">
									<div class="item-title label">活跃度</div>
									<div class="item-input">
										<input id="activeness" type="text" data-toggle="date">
									</div>
								</div>
							</div>
						</li>
						<li class="align-top">
							<div class="item-content">

								<div class="item-inner">
									<div class="item-title label">个性签名</div>
									<div class="item-input">
										<textarea id="introduction"></textarea>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="content-block">
					<div class="row">
						<div class="col-100">
							<a id="submitChange" class="button button-big button-fill">提交修改</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="/ffhysc/View/Admin/Public/js/light7.js"></script>
		<script src="/ffhysc/View/Admin/Public/js/light7-swiper.js"></script>
		<script src="/ffhysc/View/Admin/Public/js/light7-city-picker.js"></script>
		<script src="/ffhysc/View/Admin/Public/js/light7-swipeout.js"></script>
		<script src="/ffhysc/View/Admin/Public/js/demose0da.js?r=201603281"></script>
		<script src="/ffhysc/View/Admin/Public/js/shop/my_message.js"></script>
		<script>
			/*截取URL中的参数值,为公共函数*/
			$.getQueryString = function(name) {
				var reg = new RegExp("(^|&|\|)" + name + "=([^&]*)(&|$)");
				var r = window.location.search.substr(1).match(reg);
				if(r != null) {
					return decodeURIComponent(r[2]);
				} else {
					return "";
				}
			};
			$("#birthday").calendar();
			$.loadUserMessage = function() {
				$.ajax({
					type: "post",
					url: "<?php echo U('admin/loadUserMessageList');?>",
					async: true,
					data: {
						userID: $.getQueryString("userID")
					},
					success: function(d) {
						var data = JSON.parse(d);
						if(data.code == "0000") {
							$("#change_head")[0].src=data.data[0]["headimgsrc"];
							$("#username").val(data.data[0]["username"]);
							$("#password").val(data.data[0]["password"]);
							$("#payPassword").val(data.data[0]["paypassword"]);
							$("#balance").val(data.data[0]["balance"]);
							$("#role").val(data.data[0]["role"]);
							$("#nickname").val(data.data[0]["nickname"]);
							$("#introduction").val(data.data[0]["introduction"]);
							$("#email").val(data.data[0]["email"]);
							$("#birthday").val(data.data[0]["birthday"]);
							$("#activeness").val(data.data[0]["activeness"]);
						} else {
							$.toast("用户信息加载异常");
						}
					}
				});
			}
			if($.getQueryString("userID") == "add") {
				$("#submitChange").text("新增用户");
				$(".title").text("新增用户")
			} else {
				$.loadUserMessage();
			}
			$("#submitChange").on("click", function() {
				$.ajax({
					type: "post",
					url: "<?php echo U('admin/changeUserInfo');?>",
					async: true,
					data: {
						userID: $.getQueryString("userID"),
						username: $("#username").val(),
						password: $("#password").val(),
						payPassword: $("#payPassword").val(),
						balance: $("#balance").val(),
						role: $("#role").val(),
						nickname: $("#nickname").val(),
						introduction: $("#introduction").val(),
						email: $("#email").val(),
						birthday: $("#birthday").val(),
						headImgSrc:$("#change_head")[0].src,
						activeness: $("#activeness").val()
					},
					success: function(d) {
						var data = JSON.parse(d);
						/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
						if(data.code == "0000") {
							$.toast("更改用户信息成功");
						} else {
							$.toast("通讯异常");
						}
					}
				});
			})
			
			$.upload = function(that) {
				//支持chrome IE10
				if(window.FileReader) {
					var file = that.files[0];
					//console.log(file)
					filename = file.name;
					var reader = new FileReader();
					reader.readAsDataURL(file);
					reader.onload = function() {
						$("#change_head")[0].src = reader.result;
					}
				}
				//支持IE 7 8 9 10
				else if(typeof window.ActiveXObject != 'undefined') {
					var xmlDoc;
					xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
					xmlDoc.async = false;
					xmlDoc.load(input.value);
					alert(xmlDoc.xml);
				}
				//支持FF
				else if(document.implementation && document.implementation.createDocument) {
					var xmlDoc;
					xmlDoc = document.implementation.createDocument("", "", null);
					xmlDoc.async = false;
					xmlDoc.load(input.value);
					alert(xmlDoc.xml);
				} else {
					alert('error');
				}
			}
			/*更改头像的添加事件*/
			$("#change_head").on('click', function() {
				return $("#input-img").click();
			});
		</script>
	</body>

</html>