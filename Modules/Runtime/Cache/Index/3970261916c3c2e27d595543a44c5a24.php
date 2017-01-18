<?php if (!defined('THINK_PATH')) exit();?><html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>芬芳花艺商城</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui">
		<link rel="shortcut icon" href="/ffhysc/View/Index/Public/img/icon.jpg">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta content="yes" name="apple-touch-fullscreen">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link rel="stylesheet" href="/ffhysc/View/Index/Public/css/light7.css">
		<link rel="stylesheet" href="/ffhysc/View/Index/Public/css/light7-swiper.css">
		<link rel="stylesheet" href="/ffhysc/View/Index/Public/css/light7-swipeout.css">
		<link rel="apple-touch-icon" href="../../../assets/img/apple-touch-icon-114x114.png">
		<link rel="stylesheet" href="/ffhysc/View/Index/Public/css/font_1433748561_0232708.css">
		<link rel="stylesheet" href="/ffhysc/View/Index/Public/css/app.css">
		<style>
			.item-title-row .item-after {
				color: orangered;
			}
			/*去除商品列表tab左右padding 顶部的margin*/
			
			.content-block {
				padding: 0.0rem;
			}
			
			.card {
				width: 45%;
				margin-right: 0;
				float: left;
				/*				height: 8.0rem;*/
			}
			/*推荐页面的价格颜色*/
			
			.card-footer.no-border .price {
				color: orange;
			}
			
			.card-header p {
				margin: 0;
				text-align: left;
			}
			/*搜索框位置调整*/
			
			.bar.bar-header-secondary {
				position: initial;
			}
			
			#page-me .item-title-row .item-title {
				font-size: 1.3rem;
			}
			
			#page-me .price {
				color: orangered;
				font-size: 0.8rem;
			}
			
			.activity {
				color: red;
				font-size: 0.8rem;
			}
			
			.page-main .swiper-container {
				height: 10.0rem;
				padding-bottom: 0;
				margin-bottom: 0.5rem;
			}
			
			.swiper-slide img {
				height: 100%;
				width: 100%;
				display: inline;
			}
			
			.swiper-pagination.swiper-pagination-bullets {
				position: relative;
				bottom: 1.0rem;
			}
			
			.swiper-container {
				padding-bottom: 0rem;
			}
			
			.icon.icon-cart {
				font-size: 1.5rem;
			}
			
			.recommend.price {
				font-size: 1.4rem;
			}
		</style>
	</head>

	<body>
		<nav class="bar bar-tab">
			<a class="tab-item active no-transition replace" href='#page-recommend'>
				<span class="icon icon-home"></span>
				<span class="tab-label">主页</span>
			</a>
			<a class="tab-item no-transition replace" href="#page-flower">
				<span class="icon icon-app"></span>
				<span class="tab-label">鲜花商城</span>
			</a>
			<a class="tab-item no-transition replace" href="#page-service">
				<span class="icon icon-emoji"></span>
				<span class="tab-label">花艺服务</span>
			</a>
			<a class="tab-item no-transition replace" href="#page-me">
				<span class="icon icon-me"></span>
				<span class="tab-label">我的</span>
			</a>
		</nav>
		<div id="page-recommend" class="page page-goods  page-current">
			<header class="bar bar-nav">
				<a class="icon icon-menu pull-left open-panel"></a>
				<h1 class="title">芬芳推荐</h1>
			</header>
			<div class="content">
				<div class="swiper-container swiper-container-horizontal" data-space-between="10">
					<!--首页广告位-->
					<div id="adContainer" class="swiper-wrapper">
						<div class="swiper-slide">
							<img class='card-cover' src="" alt="广告图1">
						</div>
						<div class="swiper-slide">
							<img class='card-cover' src="" alt="广告图2">
						</div>
						<div class="swiper-slide">
							<img class='card-cover' src="" alt="广告图3">
						</div>
					</div>
					<div class="swiper-pagination"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
				</div>
				<!--首页搜索栏-->
				<div class="bar bar-header-secondary">
					<div class="searchbar">
						<a class="searchbar-cancel">Cancel</a>
						<div class="search-input">
							<label class="icon icon-search" for="search"></label>
							<input type="search" id='search' placeholder='搜索花艺/服务' />
						</div>
					</div>
				</div>
				<div id="recommendGoodContainer" class="infinite-scroll-preloader">
					
				</div>

			</div>
		</div>
		<!--主页tab2商品页面-->
		<div class="page" id="page-flower">
			<header class="bar bar-nav">
				<a class="icon icon-menu pull-left open-panel"></a>
				<h1 class="title">鲜花商城</h1>
			</header>
			<div class="content">
				<div class="buttons-tab">
					<a href="#tab1" onclick="$.loadGoods('huazhi')" class="tab-link active button">花植</a>
					<a href="#tab2" onclick="$.loadGoods('ganhua')" class="tab-link button">干花</a>
					<a href="#tab3" onclick="$.loadGoods('huaqi')" class="tab-link button">花器</a>
					<a href="#tab4" onclick="$.loadGoods('gongju')" class="tab-link button">工具</a>
					<a href="#tab5" onclick="$.loadGoods('zhoubian')" class="tab-link button">周边</a>
					<a href="#tab6" onclick="$.loadGoods('shenmixiang')" class="tab-link button">神秘箱</a>
				</div>
				<div class="tabs">
					<div id="tab1" class="tab active">
						<div class="content-block">
							<div class="list-block media-list">
								<ul id="huazhiContainer">

								</ul>
							</div>
						</div>
					</div>
					<div id="tab2" class="tab">
						<div class="content-block">
							<!--<p>This is tab 干花 content</p>-->
							<div class="list-block media-list">
								<ul id="ganhuaContainer">

								</ul>
							</div>
						</div>
					</div>
					<div id="tab3" class="tab">
						<div class="content-block">
							<!--<p>This is tab 干花 content</p>-->
							<div class="list-block media-list">
								<ul id="huaqiContainer">

								</ul>
							</div>
						</div>
					</div>
					<div id="tab4" class="tab">
						<div class="content-block">
							<div class="list-block media-list">
								<ul id="gongjuContainer">

								</ul>
							</div>
						</div>
					</div>
					<div id="tab5" class="tab">
						<div class="content-block">
							<div class="list-block media-list">
								<ul id="zhoubianContainer">

								</ul>
							</div>
						</div>
					</div>
					<div id="tab6" class="tab">
						<div class="content-block">
							<div class="list-block media-list">
								<ul id="shenmixiangContainer">

								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--主页tab3服务页面-->
		<div id="page-service" class="page page-settings">
			<header class="bar bar-nav">
				<a class="icon icon-menu pull-left open-panel"></a>
				<h1 class="title">鲜花商城</h1>
			</header>
			<div class="content">
				<div class="buttons-tab">
					<a href="#tabhuayi" onclick="$.loadService('huayike')" class="tab-link active button">花艺课</a>
					<a href="#tabxunlianying" onclick="$.loadService('xunlianying')" class="tab-link  button">训练营</a>
					<a href="#tabdingzhifuwu" class="tab-link button">定制服务</a>
				</div>
				<div class="tabs">
					<div id="tabhuayi" class="tab active">
						<div class="content-block">
							<div class="list-block media-list">
								<ul id="huayikeContainer">

								</ul>
							</div>
						</div>
					</div>
					<div id="tabxunlianying" class="tab">
						<div class="content-block">
							<div class="list-block media-list">
								<ul id="xunlianyingContainer">

								</ul>
							</div>
						</div>
					</div>
					<div id="tabdingzhifuwu" class="tab">
						<div class="content-block">
							<div class="list-block media-list">
								<ul id="xunlianyingContainer">

								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="page-me" class="page page-settings">
			<header class="bar bar-nav">
				<a class="icon icon-menu pull-left open-panel"></a>
				<h1 class="title"><span id="nickname"></span>的空间</h1>
			</header>

			<div class="content">
				<div class="page-settings">
					<div class="list-block media-list person-card">
						<ul>
							<li>
								<div href="#" class="item-content">
									<div class="item-inner">
										<div class="item-title-row">
											<div class="item-title">余额</div>
										</div>
										<div class="item-subtitle"></div>
										<div class="item-text price">￥<strong id="balance" class="price">528.50</strong></div>
									</div>
									<div class="item-media"><img id="userAvatar" src='' width="80"></div>
									<div class="item-inner">
										<div class="item-title-row">
											<div class="item-title">活跃度</div>
										</div>
										<div class="item-subtitle"></div>
										<div class="item-text"><strong id="activeness" class="activity">128%</strong></div>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="row text-center">

						<div onclick="$.linkToList(0)" class="col-33">
							<h4 id="status0">0</h4>
							<div class="color-gray">待付款</div>
						</div>
						<div onclick="$.linkToList(1)" class="col-33">
							<h4 id="status1">0</h4>
							<div class="color-gray">待发货</div>
						</div>
						<div onclick="$.linkToList(2)" class="col-33">
							<h4 id="status2">0</h4>
							<div class="color-gray">待收货</div>
						</div>
						<!--<div onclick="$.linkToList(3)" class="col-25">
							<h4>85</h4>
							<div class="color-gray">待评价</div>
						</div>-->
					</div>
					<div class="list-block list">
						<ul>
							<li class="item-content item-link">
								<div class="item-media"><i class="icon icon-settings"></i></div>
								<a href='<?php echo U("index/my_message");?>'>
									<div class="item-inner">
										<div class="item-title">账户信息</div>
									</div>
								</a>
							</li>
							<li class="item-content item-link">
								<div class="item-media"><i class="icon icon-settings"></i></div>
								<a onclick="$.toShopcart()">
									<div class="item-inner">
										<div class="item-title">购物车</div>
									</div>
								</a>
							</li>
							<li class="item-content item-link">
								<div class="item-media"><i class="icon icon-me"></i></div>
								<a onclick="$.toAddressManage()">
									<div class="item-inner">
										<div class="item-title">常用收货地址</div>
									</div>
								</a>
							</li>
							<li class="item-content item-link">
								<div class="item-media"><i class="icon icon-star"></i></div>
								<a class="open-popup" data-popup=".popup-about">
									<div class="item-inner">
										<div class="item-title">关于芬芳花艺商城</div>
									</div>
								</a>
							</li>
						</ul>
					</div>
					<div class="content-block">
						<a onclick="$.logout()" class="button button-big button-fill button-danger external">退出登录</a>
					</div>
				</div>
			</div>
		</div>
		<!--左侧侧边栏模块-->
		<div class="panel-overlay"></div>
		<!-- Left Panel with Reveal effect -->
		<div class="panel panel-left panel-reveal theme-dark" id='panel-themes'>
			<div class="content-block">
				<p style="margin-left: 1.0rem;font-size: 1.5rem;">芬芳花艺商城</p>
				<div class="list-block">
					<ul>
						<li>
							<div class="item-content">
								<div class="item-inner">
									<div class="item-title label" style='width: 60%;'>Night Mode</div>
									<div class="item-input">
										<label class="label-switch">
                  							<input type="checkbox" id="dark-switch">
                  							<div class="checkbox"></div>
                						</label>
									</div>
								</div>
							</div>
						</li>
						<li>
							<a>
								<div onclick="$.toShopcart()" class="item-content">
									<div class="item-inner">
										<div class="item-title label" style='width: 60%;'>购物车</div>
										<div class="item-input">
										</div>
									</div>
								</div>
							</a>
						</li>
						<li class="close-panel">
							<a onclick="$.logout()">
								<div class="item-content">
									<div class="item-inner">
										<div class="item-title label" style='width: 60%;'>退出登录</div>
										<div class="item-input">
										</div>
									</div>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--底部弹出面板模块-->
		<div class="popup popup-about">
			<header class="bar bar-nav">
				<a class="button button-link button-nav pull-right close-popup">
					了解
				</a>
				<h1 class="title">芬芳花艺商城</h1>
			</header>
			<div class="content">
				<div class="content-inner">
					<div class="content-block">
						<p>芬芳花艺商城是国内首个在线花艺商城</p>
						<p>
							<a class="button close-popup">OK</a>
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
		<script src="/ffhysc/View/Index/Public/js/shop/public.js"></script>
		<script src="/ffhysc/View/Index/Public/js/home.js"></script>
		<script>
			var goods = "goods";
			var service = "service";
			//-----------------------home的tab1 主页的样式--------------------------------------
			//$.loadAD()方法加载顶部广告
			$.loadAD = function(position) {
				$.ajax({
					type: "post",
					url: "<?php echo U('ad/loadad');?>",
					async: true,
					data: {
						position: position
					},
					success: function(d) {
						var data = JSON.parse(d);
						/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
						if(data.code == "0000") {
							$("#adContainer img")[0].src = data.data[0].img1;
							$("#adContainer img")[1].src = data.data[0].img2;
							$("#adContainer img")[2].src = data.data[0].img3;
						} else {
							$.toast("通讯异常");
						}
					}
				});
			}
			$.loadAD("home");
			//$.loadRecommendGood()方法加载推荐商品
			$.loadRecommend = function(type) {
				$.ajax({
					type: "post",
					url: "<?php echo U('goods/loadRecommend');?>",
					async: true,
					data: {
						type: type
					},
					success: function(d) {
						var data = JSON.parse(d);
						/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
						if(data.code == "0000") {
							var tempStr = [];
							if(type == "goods") {
								data.data.forEach(function(arg, index) {
									tempStr.push('<div  class="card facebook-card">');
									tempStr.push('<div class="card-header no-border">');
									tempStr.push('<p class="name">' + arg.name + '</p>');
									tempStr.push('</div>');
									tempStr.push('<div onclick="$.toDetail(' + arg.id + ',goods)" class="card-content"><img src=' + arg.img1 + ' width="100%"></div>');
									tempStr.push('<div class="card-footer no-border">');
									tempStr.push('<a href="#" class="recommend price">￥' + arg.price + '</a>');
									tempStr.push('<a onclick="$.addToshopcart(' + arg.id + ')" class="icon icon-cart"></a>');
									tempStr.push('</div>');
									tempStr.push('</div>');
								});
							} else {
								data.data.forEach(function(arg, index) {
									tempStr.push('<div  class="card facebook-card">');
									tempStr.push('<div class="card-header no-border">');
									tempStr.push('<p>' + arg.name + '</p>');
									tempStr.push('</div>');
									tempStr.push('<div onclick="$.toDetail(' + arg.id + ',service)" class="card-content"><img src=' + arg.img1 + ' width="100%"></div>');
									tempStr.push('<div class="card-footer no-border">');
									tempStr.push('<a href="#" class="recommend price">￥' + arg.price + '</a>');
									tempStr.push('<a onclick="$.addToshopcart(' + arg.id + ')" class="icon icon-cart"></a>');
									tempStr.push('</div>');
									tempStr.push('</div>');
								});
							}

							/*$('#recommendGoodContainer').empty();*/
							$('#recommendGoodContainer').append(tempStr.join(''));
						} else {
							$.toast("通讯异常");
						}
					}
				});
			}
			$.loadRecommend("goods");
			$.loadRecommend("service");

			//加载用户信息
			$.loadUserMessage = function() {
				$.ajax({
					type: "post",
					url: "<?php echo U('user/loadUserMessage');?>",
					async: true,
					data: {
						userID: sessionStorage.getItem("userID")
					},
					success: function(d) {
						var data = JSON.parse(d);
						if(data.code == "0000") {
							$("#userAvatar")[0].src = data.data[0]["headimgsrc"];
							$("#balance").text(data.data[0]["balance"]);
							$("#activeness").text(data.data[0]["activeness"]);
							$("#nickname").text(data.data[0]["nickname"]);
						} else {
							$.toast("用户信息加载异常");
						}
					}
				});
			}
			$.loadUserMessage();
			/*加载商品的方法,点击不同的tab,调用这个方法,传入不同的商品类别作参数*/
			$.loadGoods = function(goodType) {
					$.ajax({
						type: "post",
						url: "<?php echo U('goods/loadGoods');?>",
						async: true,
						data: {
							goodType: goodType
						},
						success: function(d) {
							var data = JSON.parse(d);
							/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
							if(data.code == "0000") {
								var tempStr = [];

								data.data.forEach(function(arg, index) {
									tempStr.push('<li>');
									tempStr.push('<a onclick="$.toDetail(' + arg.id + ',goods)" class="item-link item-content">');
									tempStr.push('<div class="item-media"><img src=' + arg.img1 + ' width="80"></div>');
									tempStr.push('<div class="item-inner">');
									tempStr.push('<div class="item-title-row">');
									tempStr.push('<div class="item-title">' + arg.name + '</div>');
									tempStr.push('<div class="item-after">￥' + arg.price + '</div>');
									tempStr.push('</div>');
									tempStr.push('<div class="item-subtitle">月销量：' + arg.monthlysale + '</div>');
									tempStr.push('<div class="item-text">' + arg.description + '</div>');
									tempStr.push('</div>');
									tempStr.push('</a>');
									tempStr.push('</li>');
								});
								$('#' + goodType + 'Container').empty();
								$('#' + goodType + 'Container').append(tempStr.join(''));
							} else {
								$.toast("通讯异常");
							}
						}
					});
				}
				/*默认加载tab1的花植类商品*/
			$.loadGoods("huazhi");
			/*加载商品的方法,点击不同的tab,调用这个方法,传入不同的商品类别作参数*/
			$.loadService = function(serviceType) {
					$.ajax({
						type: "post",
						url: "<?php echo U('goods/loadService');?>",
						async: true,
						data: {
							serviceType: serviceType
						},
						success: function(d) {
							var data = JSON.parse(d);
							/*通过交易码来检查与后端的换流是否正常,0000表示正常*/

							if(data.code == "0000") {
								var tempStr = [];

								data.data.forEach(function(arg, index) {
									tempStr.push('<li>');
									tempStr.push('<a onclick="$.toDetail(' + arg.id + ',service)" class="item-link item-content">');
									tempStr.push('<div class="item-media"><img src=' + arg.img1 + ' width="80"></div>');
									tempStr.push('<div class="item-inner">');
									tempStr.push('<div class="item-title-row">');
									tempStr.push('<div class="item-title">' + arg.name + '</div>');
									tempStr.push('<div class="item-after">￥' + arg.price + '</div>');
									tempStr.push('</div>');
									tempStr.push('<div class="item-subtitle">已报名：' + arg.registernum + '</div>');
									tempStr.push('<div class="item-text">' + arg.description + '</div>');
									tempStr.push('</div>');
									tempStr.push('</a>');
									tempStr.push('</li>');
								});

								$('#' + serviceType + 'Container').empty();
								$('#' + serviceType + 'Container').append(tempStr.join(''));
							} else {
								$.toast("通讯异常");
							}
						}
					});
				}
				/*默认加载tab1的花植类商品*/
			$.loadService("huayike");

			/*搜索热门商品的方法,在这里不适用于后台数据库的交互，直接在推荐商品里面挑选*/
			$.searchGood = function(keyword) {
				$(".card.facebook-card").forEach(function(arg, index) {
					if(arg.firstChild.firstChild.innerHTML.indexOf(keyword) == -1) {
						arg.style.display = "none";
					}
				});
			}
			$("#search").on("input", function() {
					$(".card.facebook-card").forEach(function(arg, index) {
						arg.style.display = "block";
					});
					$.searchGood($("#search").val())
				})
				/*设定商品/服务的跳转与传参*/
			$.toDetail = function(goodID, type) {
					window.location.href = "http://localhost/ffhysc/index.php/index/detail.html?goodID=" + goodID + "&type=" + type
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
			//计算各个状态的订单的数目，并显示
			$.countOrderStatusNum = function(){
				$.ajax({
					type: "post",
					url: "<?php echo U('shopcart/countOrderStatusNum');?>",
					async: true,
					data: {
						userID: sessionStorage.getItem("userID")
					},
					success: function(d) {
						var data = JSON.parse(d);
						/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
						if(data.code == "0000") {
							data.data.forEach(function(arg,index){
								$("#status"+arg.orderstatus).text(arg.num);
							})
						} else {
							$.toast("通讯异常");
						}
					}
				});
			}
			$.countOrderStatusNum()
			
			$.linkToList = function(status) {
				window.location.href = "http://localhost/ffhysc/index.php/index/list.html?orderStatus=" + status;
			}
			$.toShopcart = function() {
				window.location.href = "http://localhost/ffhysc/index.php/index/shopcart.html";
			}
			$.logout = function() {
				sessionStorage.clear();
				window.location.href = "http://localhost/ffhysc/index.php/index";
			}
			$.toAddressManage = function() {
				window.location.href = "http://localhost/ffhysc/index.php/index/address.html";
			}
		</script>
	</body>

</html>