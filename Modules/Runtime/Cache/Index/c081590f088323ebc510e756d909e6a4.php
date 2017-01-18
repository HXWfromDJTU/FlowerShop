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

		<!-- Google Web Fonts -->

		<link rel="stylesheet" href="/ffhysc/View/Index/Public/css/light7e0da.css?r=201603281">
		<link rel="stylesheet" href="/ffhysc/View/Index/Public/css/light7-swiper.css">
		<link rel="stylesheet" href="/ffhysc/View/Index/Public/css/light7-swipeout.css">
		<link rel="stylesheet" href="/ffhysc/View/Index/Public/css/demos.css">

		<link rel="apple-touch-icon-precomposed" href="/ffhysc/View/Index/Public/img/apple-touch-icon-114x114.png">
		<script src="/ffhysc/View/Index/Public/js/jquery-2.1.4.js"></script>
		<script>
			//ga
		</script>
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
			
			.content-block {
				padding: 0;
				margin-top: 0.5rem;
			}
		</style>
	</head>

	<body>
		<div id="page-service" class="page page-settings">
			<header class="bar bar-nav">
				<a class="icon icon-left pull-left back"></a>
				<h1 class="title">我的订单</h1>
			</header>
			<div class="content">
				<div class="buttons-tab">
					<a href="#tab0" onclick="$.loadOrderBizList(0,'goods');$.loadOrderBizList(0,'service');" class="tab-link active button">待付款</a>
					<a href="#tab1" onclick="$.loadOrderBizList(1,'goods');$.loadOrderBizList(0,'service');" class="tab-link button">待发货</a>
					<a href="#tab2" onclick="$.loadOrderBizList(2,'goods');$.loadOrderBizList(0,'service');" class="tab-link button">待收货</a>
					<!--<a href="#tab4" class="tab-link button">待评价</a>-->
				</div>
				<div class="tabs">
					<div id="tab0" class="tab active">
						<div class="content-block">
							<div class="list-block media-list">
								<ul id="OrderListContainer0">

								</ul>
							</div>
						</div>
					</div>
					<div id="tab1" class="tab">
						<div class="content-block">
							<div class="list-block media-list">
								<ul id="OrderListContainer1">

								</ul>
							</div>
						</div>
					</div>
					<div id="tab2" class="tab">
						<div class="content-block">
							<div class="list-block media-list">
								<ul id="OrderListContainer2">

								</ul>
							</div>
						</div>
					</div>
					<!--<div id="tab4" class="tab">
						<div class="content-block">
							<div class="list-block media-list">
								<ul>
									<li class="swipeout">
										<div class="swipeout-content">
											<label class="label-checkbox item-content">
            									<div class="item-media">
            										<img src="/ffhysc/View/Index/Public/img/good_icon.png" width="80">
            									</div>
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
										</div>
										<div class="swipeout-actions-right">
											<a class="bg-danger swipeout-delete" href="#" data-confirm="Are you sure want to delete me?" data-confirm-title="Confirm Delete">移除</a>
											<a class="bg-success">付款</a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>-->
				</div>
			</div>
		</div>

		<script src="/ffhysc/View/Index/Public/js/light7.js"></script>
		<script src="/ffhysc/View/Index/Public/js/light7-swiper.js"></script>
		<script src="/ffhysc/View/Index/Public/js/light7-city-picker.js"></script>
		<script src="/ffhysc/View/Index/Public/js/light7-swipeout.js"></script>
		<script src="/ffhysc/View/Index/Public/js/demose0da.js?r=201603281"></script>
		<script src="/ffhysc/View/Index/Public/js/shop/list.js"></script>
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
			}

			$.loadOrderBizList = function(orderStatus, goodType) {
					$.ajax({
						type: "post",
						url: "<?php echo U('shopcart/loadOrderBizList');?>",
						async: true,
						data: {
							orderStatus: orderStatus,
							goodType: goodType
						},
						success: function(d) {
							var data = JSON.parse(d);
							/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
							if(data.code == "0000") {
								var tempStr = [];
								data.data.forEach(function(arg, index) {

									tempStr.push('<li id="orderListItem' + arg.orderid + '" class="swipeout">');
									tempStr.push('<div class="swipeout-content">');
									tempStr.push('<label class="label-checkbox item-content">');
									tempStr.push('<div class="item-media">');
									tempStr.push('<img src=' + arg.img1 + ' width="80">');
									tempStr.push('</div>');
									tempStr.push('<div class="item-inner">');
									tempStr.push('<div class="item-title-row">');
									tempStr.push('<div class="item-title">"' + arg.name + '"等商品</div>');
									tempStr.push('<div class="item-title price">合计￥' + arg.totalmoney + '</div>');
									tempStr.push('</div>');
									tempStr.push('<div class="item-text">SoundAsleep Dream Series Air Mattress with ComfortCoil Technology</div>');
									tempStr.push('<div class="item-title-row">');
									tempStr.push('<div class="item-title"></div>');
									tempStr.push('<div class="item-after">x3</div>');
									tempStr.push('</div>');
									tempStr.push('</div>');
									tempStr.push('</label>');
									tempStr.push('</div>');
									tempStr.push('<div class="swipeout-actions-right">');
									tempStr.push('<a onclick="$.removeOrderListItem(\'' + arg.orderid + '\','+orderStatus+');" class="bg-danger swipeout" href="#">移除</a>');
									if(orderStatus == 0) {
										tempStr.push('<a onclick="$.toOrderDetail(\'' + arg.orderid + '\');" class="bg-success">付款</a>');
									}
									tempStr.push('</div>');
									tempStr.push('</li>');
								});
								if(goodType == "goods") {
									$('#OrderListContainer' + orderStatus).empty();
								}
								$('#OrderListContainer' + orderStatus).append(tempStr.join(''));
							} else {
								$.toast("通讯异常");
							}

						}
					});

				}
				//初始化加载
			$.onload = function() {
				$.loadOrderBizList($.getQueryString("orderStatus"), "goods");
				$.loadOrderBizList($.getQueryString("orderStatus"), "service");
				//默认选中某一个选项卡
				return $(".buttons-tab a")[$.getQueryString("orderStatus")].click();
			}
			$.onload();

			/*移除订单列表中的列表商品的方法*/
			$.removeOrderListItem = function(orderID,orderStatus) {
				$.confirm("是否要删除这个订单?", function() {
					$("#orderListItem" + orderID).remove();
					$.ajax({
						type: "post",
						url: "<?php echo U('shopcart/removeOrderListItem');?>",
						async: true,
						data: {
							orderID: orderID
						},
						success: function(d) {
							var data = JSON.parse(d);
							/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
							if(data.code == "0000") {
								if(orderStatus!=0){
									$.alert("订单信息已删除，但目前我们不支持退款哦！")
								}else{
									$.toast("该清单已移除..")
								}
								
							} else {
								$.toast("通讯异常");
							}
						}
					})
				})
			}
			$.toOrderDetail = function(orderID) {
				window.location.href = "http://localhost/ffhysc/index.php/index/confirmed.html?orderID=" + orderID;
			}
			
		</script>
	</body>

</html>