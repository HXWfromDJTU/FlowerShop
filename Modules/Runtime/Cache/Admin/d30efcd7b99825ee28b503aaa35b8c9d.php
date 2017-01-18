<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>婚纱影楼管理端</title>
		<meta name="description" content="light7: Build mobile apps with simple HTML, CSS, and JS components.">
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
		<script>
			//ga
		</script>
		<style>
			/*header背景色调*/
			
			.bar {
				background-color: skyblue;
			}
			/* 订单条目样式*/
			
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
			.item-text button{
				/*width: 30%;*/
			}
		</style>
	</head>

	<body>
		<div id="page-service" class="page page-settings">
			<header class="bar bar-nav">
				<a class="icon icon-left pull-left back "></a>
				<h1 class="title">我的订单</h1>
			</header>
			<div class="content">
				<div class="buttons-tab">
					<a href="#tab1" onclick="$.loadOrderBizList(0)" class="tab-link active button">待付款</a>
					<a href="#tab2" onclick="$.loadOrderBizList(1)"  class="tab-link button">待选片</a>
					<a href="#tab3" onclick="$.loadOrderBizList(2)"  class="tab-link button">已完成</a>
				</div>
				<div class="tabs">
					<div id="tab1" class="tab active">
						<div class="content-block">
							<div class="list-block media-list">
								<ul id="OrderListContainer0">
									
								</ul>
							</div>
						</div>
					</div>
					<div id="tab2" class="tab">
						<div class="content-block">
							<div class="list-block media-list">
								<ul id="OrderListContainer1">
									
								</ul>
							</div>
						</div>
					</div>
					<div id="tab3" class="tab">
						<div class="content-block">
							<div class="list-block media-list">
								<ul id="OrderListContainer2">

								</ul>
							</div>
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
		<script src="/ffhysc/View/Admin/Public/js/shop/list.js"></script>
		<script>
			$.loadOrderBizList = function(orderStatus) {
					$.ajax({
						type: "post",
						url: "<?php echo U('admin/loadOrderBizList');?>",
						async: true,
						data: {
							orderStatus: orderStatus
						},
						success: function(d) {
							var data = JSON.parse(d);
							if(data.code == "0000") {
								var tempStr = [];
								data.data.forEach(function(arg, index) {
									tempStr.push('<li id="orderListItem'+arg.orderid+'" >');
									tempStr.push('<div onclick="$.toOrderDetail(\''+arg.orderid+'\')" data-no-cache="true"  class="item-content">');
									tempStr.push('<div class="item-media"><img src='+arg.coverimg+' width="80"></div>');
									tempStr.push('<div class="item-inner">');
									tempStr.push('<div class="item-title-row">');
									tempStr.push('<div class="item-title">'+arg.title+'</div>');
									tempStr.push('<div class="item-title"></div>');
									tempStr.push('</div>');
									tempStr.push('<div class="item-subtitle price">￥<span id="price">'+arg.totalmoney+'</span></div>');							
									tempStr.push('</div>');
									tempStr.push('</div>');
									/*if(orderStatus==0){
										tempStr.push('<div class="item-text"><button onclick="$.removeOrderItem(\''+arg.orderid+'\')" class="button button-fill">取消订单</button></div>');
									}else{
										tempStr.push('<div class="item-text"></div>');
									}*/
									tempStr.push('</li>');	
								});
								$('#OrderListContainer' + orderStatus).empty();
								$('#OrderListContainer' + orderStatus).append(tempStr.join(''));
							} else {
								$.toast("通讯异常");
							}
						}
					});
				}
			//初始化加载
			$.loadOrderBizList(0);
			
			$.toOrderDetail = function(orderID) {
				window.location.href = "http://localhost/hsylglxt/admin.php/index/orderDetail.html?orderID=" + orderID;
			}


		</script>
	</body>

</html>