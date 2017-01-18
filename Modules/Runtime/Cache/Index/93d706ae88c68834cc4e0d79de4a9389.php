<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>购物车</title>
		<meta name="description" content="light7: Build mobile apps with simple HTML, CSS, and JS components.">
		<meta name="author" content="任行">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<link rel="shortcut icon" href="/ffhysc/View/Index/Public/img/icon.jpg">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link rel="stylesheet" href="/ffhysc/View/Index/Public/css/light7e0da.css?r=201603281">
		<link rel="stylesheet" href="/ffhysc/View/Index/Public/css/light7-swiper.css">
		<link rel="stylesheet" href="/ffhysc/View/Index/Public/css/light7-swipeout.css">
		<link rel="stylesheet" href="/ffhysc/View/Index/Public/css/demos.css">

		<link rel="apple-touch-icon-precomposed" href="/ffhysc/View/Index/Public/img/apple-touch-icon-114x114.png">
		<script src="/ffhysc/View/Index/Public/js/jquery-2.1.4.js"></script>
		<style>
			/* 购物车条目样式*/	
			.label-checkbox .item-inner {
				border-bottom: none;
			}
			
			.price {
				color: orangered;
			}
			
			.item-after.price {
				color: green;
			}
			
			.label-checkbox.item-content {
				border-bottom: 1px solid #dccbcb;
			}
			
			.label-switch {
				margin-left: 70%;
			}
			
			.list-block {
				margin: 0;
			}
			
			.bar.bar-footer {
				padding: 0;
				margin: 0;
			}
			
			.bar.bar-footer button {
				width: 30%;
				height: 100%;
				float: right;
				background: orangered;
				margin: 0;
				top: 0;
				color: #000000;
				font-weight: bolder;
			}
			
			.bar.bar-footer .text {
				font-size: 1.3rem;
				float: left;
				width: 50%;
				margin-left: 1.0rem;
			}
			
			.receive-msg .item-title,
			.receive-msg .item-subtitle {
				font-size: 1.0rem;
			}
			
			.receive-msg-box {
				margin-bottom: 2.0rem;
			}
			
			#transFeeTis {
				background-color: #41A83E;
				color: #000000;
				display: none;
				margin-left: 0.5rem;
			}
		</style>
	</head>

	<body>
		<div id="page-check-list" class="page">
			<header class="bar bar-nav">
				<a class="button button-link button-nav pull-left" onclick="$.linkToHome()">
					<span class="icon icon-left"></span>暂不付款
				</a>
				<h1 class="title">订单信息</h1>
			</header>
			<div class="content">
				<div class="list-block media-list receive-msg-box">
					<ul>
						<li onclick="$.linkToAddr()">
							<a href="#" class="item-link item-content">
								<div class="item-media"><i class="icon icon-caret"></i></div>
								<div class="item-inner receive-msg">
									<div class="item-title-row">
										<div class="item-title">收货人</div>
										<div id="receiverName" class="item-after"><!--张三--></div>
									</div>
									<div class="item-subtitle">收货地址</div>
									<div id="address" class="item-text"><!--辽宁省大连市旅顺口经济开发区兴发路216号大连交通大学二期--></div>
									<div class="item-title-row">
										<div class="item-title">收货人号码</div>
										<div id="phone" class="item-after"><!--张三--></div>
									</div>
								</div>
							</a>
						</li>
					</ul>
				</div>
				<div class="list-block media-list">
					<ul id="confirmItemContainer">

						<!--<li>
							<label class="label-checkbox item-content">
            					<div class="item-media"><img src="/ffhysc/View/Index/Public/img/good_icon.png" width="80"></div>
            					<div class="item-inner">
										<div class="item-title-row">
												<div class="item-title">浓情花意</div>
												<div class="item-title price">￥120.50</div>
											</div>
											<div class="item-text">SoundAsleep Dream Series Air Mattress with ComfortCoil Technology</div>
											<div class="item-title-row">
														<div class="item-title"></div>
													<div class="item-after">x3</div>
											</div>
            				</div>
          				</label>

						</li>-->
					</ul>
				</div>
				<div class="list-block">
					<ul>
						<li class="item-content">
							<div class="item-media"><i class="icon icon-card"></i></div>
							<div class="item-inner">
								<div class="item-title">芳芳随机减</div>
								<div class="item-after price">-￥<span id="discout">4.3</span></div>
							</div>
						</li>
						<li class="item-content">
							<div class="item-media"><i class="icon icon-gift"></i></div>
							<div class="item-inner">
								<div class="item-title">配送方式</div>
								<div class="item-after">顺丰速递</div>
							</div>
						</li>
						<li>
							<div class="item-content">
								<div class="item-media"><i class="icon icon-edit"></i></div>
								<div class="item-inner">
									<div class="item-title label">运费险</div>
									<div onclick="$.transFeeCount()" class="item-input pull-right">
										<label class="label-switch">
                 						 	<input id="transFeeBox" type="checkbox">
                 					 		<div class="checkbox"></div>
                						</label>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="bar bar-footer">

				<div class="text">合计:￥<span id="totalMoney" class="price">0</span><span id="transFeeTis" class="badge">含运费险</span></div>

				<a onclick="$.pay()"><button class="button">立即付款</button></a>

			</div>
		</div>

		<script src="/ffhysc/View/Index/Public/js/light7.js"></script>
		<script src="/ffhysc/View/Index/Public/js/light7-swiper.js"></script>
		<script src="/ffhysc/View/Index/Public/js/light7-city-picker.js"></script>
		<script src="/ffhysc/View/Index/Public/js/light7-swipeout.js"></script>
		<script src="/ffhysc/View/Index/Public/js/demose0da.js?r=201603281"></script>
		<script src="/ffhysc/View/Index/Public/js/shop/confirmed.js"></script>
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

			$.loadConfirmList = function(orderID, type) {
				$.ajax({
					type: "post",
					url: "<?php echo U('shopcart/loadConfirmList');?>",
					async: true,
					data: {
						orderID: orderID,
						userID: sessionStorage.getItem("userID"),
						type: type
					},
					success: function(d) {
						var data = JSON.parse(d);
						/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
						if(data.code == "0000") {
							//此处可能为遗留问题，区分返回的数据是否为空，若为空则不进行dom的渲染
							if(data.data.length != 0) {
								var tempStr = [];
								data.data.forEach(function(arg, index) {
									tempStr.push('<li>');
									tempStr.push('<label class="label-checkbox item-content">');
									tempStr.push('<div class="item-media"><img src=' + arg.img1 + ' width="80"></div>');
									tempStr.push('<div class="item-inner">');
									tempStr.push('<div class="item-title-row">');
									tempStr.push('<div class="item-title">' + arg.name + '</div>');
									tempStr.push('<div class="item-title price">￥<span class="realPrice">' + arg.price + '</span></div>');
									tempStr.push('</div>');
									tempStr.push('<div class="item-text">' + arg.description + '</div>');
									tempStr.push('<div class="item-title-row">');
									tempStr.push('<div class="item-title"></div>');
									tempStr.push('<div class="item-after">x3</div>');
									tempStr.push('</div>');
									tempStr.push('</div>');
									tempStr.push('</label>');
									tempStr.push('</li>');
								});
								$('#confirmItemContainer').append(tempStr.join(''));
								//加载list成功之后，显示总价格
								for(var i = 0; i < $(".realPrice").length; i++) {
									total = $("#totalMoney")[0].innerHTML = parseInt($("#totalMoney").text()) + parseInt($(".realPrice")[i].innerHTML);
								}
								var discount = Math.floor(10 * Math.random());
								$("#discout").text(discount);
								/*console.log(total);
								console.log(discount);
								console.log(total - parseInt(discount));*/
								$("#totalMoney").text(total - parseInt(discount));
							}

						} else {
							$.toast("通讯异常");
						}
					}
				});
			}
			$.loadConfirmList($.getQueryString("orderID"), "goods");
			$.loadConfirmList($.getQueryString("orderID"), "service");
			/*是否购买运费险的方法*/
			$.transFeeCount = function() {
				if($("#transFeeBox")[0].checked) {
					$("#totalMoney").text(parseInt($("#totalMoney").text()) + 5);
					$("#transFeeTis").css("display", "inline-block");
				} else {
					$("#totalMoney").text(parseInt($("#totalMoney").text()) - 5);
					$("#transFeeTis").css("display", "none");
				}
			}
			//执行支付的方法
			$.pay = function() {
				$.prompt("请输入支付密码", function(payPassword) {
					$.ajax({
						type: "post",
						url: "<?php echo U('shopcart/checkPayPassword');?>",
						async: true,
						data: {
							userID: sessionStorage.getItem("userID"),
							payPassword: payPassword,
							orderID:$.getQueryString("orderID"),
							total:parseInt($("#totalMoney").text())
						},
						success: function(d) {
							var data = JSON.parse(d);
							/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
							if(data.code == "0000") {
								if(data.data["pay-status"]=="succ"){
									$.alert("支付成功,三秒后回到首页");
									var t=setTimeout("$.linkToHome()",3000);
								}else if(data.data["pay-status"]=="notEnough"){
									$.alert("您的账户余额不足");
								}else{
									$.alert("密码错误");
								}
							} else {
								$.alert("通讯异常");
							}
						}
					});
				})
			}
			//加载默认地址
			$.loadDefaultAdd = function() {
				$.ajax({
					type: "post",
					url: "<?php echo U('user/loadAddressMSG');?>",
					async: true,
					data: {
						userID: sessionStorage.getItem("userID")
					},
					success: function(d) {
						var data = JSON.parse(d);
						/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
						if(data.code == "0000") {
							data.data.forEach(function(arg, index) {
								if(arg.default==1){
									$("#receiverName").text(arg.receivername);
									$("#address").text(arg.address);
									$("#phone").text(arg.phone);
								}
							})
						} else {
							$.toast("通讯异常");
						}

					}
				});

			}
			$.loadDefaultAdd();
			//跳转到收货人管理的页面
			$.linkToAddr=function(){
				window.location.href="http://localhost/ffhysc/index.php/index/address.html"
			}
			$.linkToHome=function(){
				window.location.href="http://localhost/ffhysc/index.php/index/home.html"
			}
		</script>
	</body>

</html>