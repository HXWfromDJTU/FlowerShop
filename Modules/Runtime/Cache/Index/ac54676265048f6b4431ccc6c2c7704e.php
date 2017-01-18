<?php if (!defined('THINK_PATH')) exit();?><html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Light7商城</title>
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
			.price {
				color: orangered;
				font-size: 2.0rem;
			}
			
			.content-block.goods-card h3 {
				font-size: 1.0rem;
			}
			
			.list-block {
				margin: 0.5rem;
			}
			
			.item-link.list-button.bg-success {
				font-size: 1.0rem;
				color: black;
			}
			
			.tabs .tab {
				background-color: white;
			}
			#makeBill{
				background-color: deeppink;
			}
		</style>
	</head>
	<body>
		<div id="detail-page" class="page no-tabbar">
			<header class="bar bar-nav">
				<a class="button button-link button-nav pull-left back">
					<span class="icon icon-left"></span> Back
				</a>
				<h1 class="title">商品详情</h1>
			</header>
			<div class="content" id='detail-page'>
				<div class="page-detail">
					<div class="swiper-container swiper-container-horizontal" data-space-between="10">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<img class='card-cover' src="/ffhysc/View/Index/Public/img/swiper_ad(1).png" alt="">
							</div>
							<div class="swiper-slide">
								<img class='card-cover' src="/ffhysc/View/Index/Public/img/swiper_ad(2).png" alt="">
							</div>
							<div class="swiper-slide">
								<img class='card-cover' src="/ffhysc/View/Index/Public/img/swiper_ad(3).png" alt="">
							</div>
						</div>
						<div class="swiper-pagination"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
					</div>
					<div class='content-block goods-card'>
						<h3 id="name"></h3>
						<p><strong class="price">￥<span id="price"></span></strong>
							<button onclick="$.addToshopcart($.getQueryString('goodID'))" class="button button-big button-fill pull-right">加入购物车</button>
							<button id="makeBill" class="button button-big button-fill pull-right">立即下单</button>
						</p>
					</div>
					<div class='content-block'>
						<div class="buttons-row">
							<a href="#tab-detail" class="tab-link active button">详情</a>
							<a href="#tab-format" class="tab-link button">规格</a>
							<a href="#tab-comments" onclick="$.loadComment($.getQueryString('goodID'))" class="tab-link button">评论</a>
						</div>
						<div class="tabs">
							<div class="tab active" id='tab-detail'>
								<h3>产品详情</h3>
								<p class="text-container"></p>
								<p class="img-container">
									<!--<img src="/ffhysc/View/Index/Public/img/swiper_ad(1).png" alt="" style='width:100%'>--></p>
							</div>
							<div class="tab goodFormat" id='tab-format'>
								<h3>产品规格</h3>
								<div class="row text-center color-gray">
									<div class="col-25">品牌</div>
									<div class="col-25">用途</div>
									<div class="col-25">产地</div>
									<div class="col-25">配送方式</div>
								</div>
								<div class="row text-center color-gray">
									<div id="brand" class="col-25"></div>
									<div id="use" class="col-25"></div>
									<div id="origin" class="col-25"></div>
									<div id="deliver" class="col-25"></div>
								</div>
							</div>
							<div class="tab serviceFormat" id='tab-format'>
								<h3>服务标准</h3>
								<div class="row text-center color-gray">
									<div class="col-33">授课人员</div>
									<div class="col-33">授课时间</div>
									<div class="col-33">开课人数</div>
								</div>
								<div class="row text-center color-gray">
									<div id="teacher" class="col-33"></div>
									<div id="serviceTime" class="col-33"></div>
									<div id="studentNum" class="col-33"></div>
								</div>
							</div>
							<div class="tab" id='tab-comments'>
								<div class="list-block">
									<ul>
										<li class="align-top">
											<div class="item-content">
												<div class="item-inner">
													<div class="item-input">
														<textarea id="comment" placeholder="请谨慎发言，对自己负责........"></textarea>
													</div>
												</div>
											</div>
										</li>
										<li>
											<a id="comment_btn" class="item-link list-button bg-success">发表评论</a>
										</li>
									</ul>
								</div>
								<div class="list-block media-list">
									<ul id="comment-container">

									</ul>
								</div>
							</div>
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
		<script src="/ffhysc/View/Index/Public/js/shop/detail.js"></script>
		<script>
			/*截取URL中的参数值*/
			$.getQueryString = function(name) {
				var reg = new RegExp("(^|&|\|)" + name + "=([^&]*)(&|$)");
				var r = window.location.search.substr(1).match(reg);
				if(r != null) {
					return decodeURIComponent(r[2]);
				} else {
					return "";
				}
			};
			/*加载商品详情,渲染页面*/
			$.loadGoodDetail = function(goodID, type) {
				$.ajax({
					type: "post",
					url: "<?php echo U('goods/loadGoodDetail');?>",
					async: true,
					data: {
						goodID: goodID,
						type: type
					},
					success: function(d) {
						var data = JSON.parse(d);
						/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
						if(data.code == "0000") {
							/*console.log(data.data[0].name)*/
							$(".swiper-slide img")[0].src = data.data[0].img1;
							$(".swiper-slide img")[1].src = data.data[0].img2;
							$(".swiper-slide img")[2].src = data.data[0].img3;
							$("#name").text(data.data[0].name);
							$("#price").text(data.data[0].price);
							/*渲染介绍详情内容*/
							$(".text-container").text(data.data[0]["description"])
								/*渲染图片内容*/
							var tempStr = [];
							tempStr.push('<img src=' + data.data[0].detailimg1 + ' width="100%">')
							tempStr.push('<img src=' + data.data[0].detailimg2 + ' width="100%">')
							tempStr.push('<img src=' + data.data[0].detailimg3 + ' width="100%">')
							$('.img-container').empty();
							$('.img-container').append(tempStr.join(''));
							$('.img-container img').forEach(function(arg, index) {
								if(arg.src.length < 200) {
									arg.remove()
								}
							});
							/*规格页面渲染*/
							if(type == "goods") {
								$(".tab.serviceFormat").remove();
								$("#brand").text(data.data[0].brand);
								$("#use").text(data.data[0].use);
								$("#origin").text(data.data[0].origin);
								$("#deliver").text(data.data[0].delivertype);
							} else {
								$("#name").text(data.data[0].name);
								$(".tab.goodFormat").remove();
								$("#teacher").text(data.data[0].provider);
								$("#serviceTime").text(data.data[0].servicetime);
								$("#studentNum").text(data.data[0].registernum);
							}

						} else {
							$.toast("通讯异常");
						}
					}
				});
			}
			$.loadGoodDetail($.getQueryString("goodID"), $.getQueryString("type"));

			/*加载评论信息的ajax*/
			$.loadComment = function(goodID, type) {
				$.ajax({
					type: "post",
					url: "<?php echo U('comment/loadComment');?>",
					async: true,
					data: {
						goodID: goodID,
						type: type
					},
					success: function(d) {
						var data = JSON.parse(d);
						/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
						if(data.code == "0000") {
							var tempStr = [];
							data.data.forEach(function(arg, index) {
								tempStr.push('<li>')
								tempStr.push('<div class="item-content">')
								tempStr.push('<div class="item-media"><img src=' + arg.headimgsrc + ' width="44"></div>')
								tempStr.push('<div class="item-inner">')
								tempStr.push('<div class="item-title-row">')
								tempStr.push('<div class="item-title">' + arg.nickname + '</div>')
								tempStr.push('<div class="item-after">' + arg.commenttime + '</div>')
								tempStr.push('</div>')
								tempStr.push('<div class="item-text">' + arg.content + '</div>')
								tempStr.push('</div>')
								tempStr.push('</div>')
								tempStr.push('</li>')
							});
							$('#comment-container').empty();
							$('#comment-container').append(tempStr.join(''));
						} else {
							$.toast("通讯异常");
						}
					}
				});
			}

			/*添加新评论*/
			$.pushComment = function(goodID, userID, content, type) {
					$.ajax({
						type: "post",
						url: "<?php echo U('comment/pushComment');?>",
						async: true,
						data: {
							goodID: goodID,
							userID: userID,
							content: content,
							type: type
						},
						success: function(d) {
							var data = JSON.parse(d);
							/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
							if(data.code == "0000") {
								var tempStr = [];
								tempStr.push('<li>')
								tempStr.push('<div class="item-content">')
								tempStr.push('<div class="item-media"><img src=' + data.data[0].headimgsrc + ' width="44"></div>')
								tempStr.push('<div class="item-inner">')
								tempStr.push('<div class="item-title-row">')
								tempStr.push('<div class="item-title">' + data.data[0].nickname + '</div>')
								tempStr.push('<div class="item-after">不久之前</div>')
								tempStr.push('</div>')
								tempStr.push('<div class="item-text">' + content + '</div>')
								tempStr.push('</div>')
								tempStr.push('</div>')
								tempStr.push('</li>')
								$('#comment-container').prepend(tempStr.join(''));
								$("#comment").val("")
							} else {
								$.toast("通讯异常");
							}
						}
					});
				}
				/*加入购物车方法*/
			$.addToshopcart = function(goodID) {
					$.ajax({
						type: "post",
						url: "<?php echo U('shopcart/addToshopcart');?>",
						async: true,
						data: {
							goodID: goodID,
							userID: sessionStorage.getItem("userID")
						},
						success: function(d) {
							var data = JSON.parse(d);
							/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
							if(data.code == "0000") {
								if(data.data == "repeat") {
									$.toast("您已收藏过这个商品/服务！");
								} else {
									$.toast("加入购物车成功！");
								}
							} else {
								$.toast("通讯异常");
							}
						}
					});
				}
				//商品详情直接下单方法
				//生成新订单的方法
			$("#makeBill").on("click", function() {		
					var goodsIDArr = [];
					goodsIDArr.push($.getQueryString("goodID"));
					//请求接口生成订单
					$.ajax({
						type: "post",
						url: "<?php echo U('shopcart/makeNewList');?>",
						async: true,
						data: {
							goodsIDArr: goodsIDArr,
							total: parseFloat($("#price").text()),
							userID: sessionStorage.getItem("userID")
						},
						success: function(d) {
							var data = JSON.parse(d);
							/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
							if(data.code == "0000") {
								window.location.href = "http://localhost/ffhysc/index.php/index/confirmed.html?orderID=" + data.data["orderID"] + '&orderTime=' + data.data["orderTime"];
							} else {
								$.toast("通讯异常");
							}
						}
					});
				})
				//添加评论按钮绑定事件
			$("#comment_btn").on("click", function() {
				$.pushComment($.getQueryString("goodID"), sessionStorage.getItem("userID"), $("#comment").val());
			})
		</script>
	</body>

</html>