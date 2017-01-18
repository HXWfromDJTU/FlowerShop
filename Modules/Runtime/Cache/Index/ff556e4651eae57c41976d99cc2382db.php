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
		</style>
	</head>

	<body>
		<div id="page-check-list" class="page">
			<header class="bar bar-nav">
				<a class="button button-link button-nav pull-left back">
					<span class="icon icon-left"></span>
				</a>
				<h1 class="title">购物车</h1>
			</header>
			<div class="content">
				<div class="list-block">
					<ul>
						<li>
							<div class="item-content">
								<div class="item-media"><i class="icon icon-form-toggle"></i></div>
								<div class="item-inner">
									<div class="item-title label">全选</div>
									<div class="item-input pull-right">
										<label class="label-switch">
                  <input class="selectAll" type="checkbox">
                  <div class="checkbox"></div>
                </label>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="list-block media-list">
					<ul id="shopcartItemContainer">
						<!--<li class="swipeout">
							<div class="swipeout-content">
								<label class="label-checkbox item-content">
           			<input type="checkbox" name="checkbox">
            			<div class="item-media"><i class="icon icon-form-checkbox"></i></div>
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
							</div>
							<div class="swipeout-actions-right">
								<a class="bg-danger swipeout-delete" href="#" data-confirm="Are you sure want to delete me?" data-confirm-title="Confirm Delete">移除</a>
							</div>
						</li>-->
					</ul>
				</div>
			</div>
			<div class="bar bar-footer">

				<div class="text">合计:<span class="price">￥<span id="totalMoney">0</span></span>
				</div>
				<a><button id="submitBill" class="button">提交订单</button></a>

			</div>
		</div>

		<script src="/ffhysc/View/Index/Public/js/light7.js"></script>
		<script src="/ffhysc/View/Index/Public/js/light7-swiper.js"></script>
		<script src="/ffhysc/View/Index/Public/js/light7-city-picker.js"></script>
		<script src="/ffhysc/View/Index/Public/js/light7-swipeout.js"></script>
		<script src="/ffhysc/View/Index/Public/js/demose0da.js?r=201603281"></script>
		<script src="/ffhysc/View/Index/Public/js/shop/shopcart.js"></script>
		<script>
			$.loadShopcart = function(type) {
				$.ajax({
					type: "post",
					url: "<?php echo U('goods/loadShopcart');?>",
					async: true,
					data: {
						type: type,
						userID: sessionStorage.getItem("userID")
					},
					success: function(d) {
						var data = JSON.parse(d);
						/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
						if(data.code == "0000") {
							var tempStr = [];
							data.data.forEach(function(arg, index) {
								tempStr.push('<li  id="shopcartItem' + arg.id + '" class="swipeout">');
								tempStr.push('<div class="swipeout-content">');
								tempStr.push('<label class="label-checkbox item-content">');
								tempStr.push('<input onclick="$.count(this,' + arg.price + ')" data-id="' + arg.id + '" type="checkbox" name="checkbox" class="shopcartCheckbox">');
								tempStr.push('<div class="item-media"><i class="icon icon-form-checkbox"></i></div>');
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
								tempStr.push('</div>');
								tempStr.push('<div class="swipeout-actions-right">');
								tempStr.push('<a onclick="$.removeShopcartItem(' + arg.id + ')" class="bg-danger swipeout" href="#" >移除</a>');
								tempStr.push('</div>');
								tempStr.push('</li>');
							});

							$('#shopcartItemContainer').append(tempStr.join(''));
						} else {
							$.toast("通讯异常");
						}
					}
				});
			}
			$.loadShopcart("goods");
			$.loadShopcart("service");
			/*移除购物车商品的方法*/
			$.removeShopcartItem = function(goodID) {
					$.confirm("是否要移除这个商品/服务?", function() {
						$("#shopcartItem" + goodID).remove();
						$.ajax({
							type: "post",
							url: "<?php echo U('shopcart/removeShopcartItem');?>",
							async: true,
							data: {
								goodID: goodID,
								userID: sessionStorage.getItem("userID")
							},
							success: function(d) {
								var data = JSON.parse(d);
								/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
								if(data.code == "0000") {

								} else {
									$.toast("通讯异常");
								}
							}
						});
					})
				}
			/*实现全选的功能*/
			$(".selectAll").on("change", function() {
				var totalMoney=0;
				if($(".selectAll")[0].checked == true) {
					for(var i = 0; i < $(".shopcartCheckbox").length; i++) {
						$(".shopcartCheckbox")[i].checked = true;
						totalMoney += parseInt($(".realPrice")[i].innerText);
						$("#totalMoney")[0].innerHTML=totalMoney;
					}
				} else {
					for(var i = 0; i < $(".shopcartCheckbox").length; i++) {
						$(".shopcartCheckbox")[i].checked = false;
						$("#totalMoney")[0].innerHTML=0;
					}
				}
			})
			//生成新订单的方法
			$("#submitBill").on("click", function() {
					//检查是否选中过至少一件商品
					var flag = 1;
					var goodsIDArr = [];
					for(var i = 0; i < $(".shopcartCheckbox").length; i++) {
						if($(".shopcartCheckbox")[i].checked == true) {
							flag = 0;
							goodsIDArr.push($(".shopcartCheckbox")[i].getAttribute('data-id'))
						}
					}
					if(flag) {
						$.toast("您还未选择任何商品");
					}
					//请求接口生成订单
					$.ajax({
						type: "post",
						url: "<?php echo U('shopcart/makeNewList');?>",
						async: true,
						data: {
							goodsIDArr: goodsIDArr,
							total: parseFloat($("#totalMoney").text()),
							userID: sessionStorage.getItem("userID")
						},
						success: function(d) {
							var data = JSON.parse(d);
							/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
							if(data.code == "0000") {
								$.confirm("订单已生成，是否马上去付款？", function() {
									//跳转到订单确认页面，使用url传参，将orderID传送过去
									/*console.log(data.data["orderTime"].replace("%",""))*/
									window.location.href = "http://localhost/ffhysc/index.php/index/confirmed.html?orderID=" + data.data["orderID"]+'&orderTime='+data.data["orderTime"];
								}, function() {
									window.location.href = "http://localhost/ffhysc/index.php/index/list.html?orderStatus=0";
								})
							} else {
								$.toast("通讯异常");
							}
						}
					});
				})
				/*动态显示总价格*/
			$.count = function(that, price) {
				if(that.checked == true) {
					$("#totalMoney")[0].innerHTML = parseFloat($("#totalMoney").text()) + parseFloat(price);
				} else {
					$("#totalMoney")[0].innerHTML = parseFloat($("#totalMoney").text()) - parseFloat(price);
				}
			}
		</script>
	</body>

</html>