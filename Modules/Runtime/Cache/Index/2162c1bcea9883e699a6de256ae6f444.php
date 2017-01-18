<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<!-- Mirrored from light7.cn/demos/list/check-list/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 Nov 2016 09:18:11 GMT -->

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>购物车</title>
		<meta name="description" content="light7: Build mobile apps with simple HTML, CSS, and JS components.">
		<meta name="author" content="任行">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<link rel="shortcut icon" href="http://light7.cn/favicon.ico">
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
			.content-block {
				margin: 0;
				padding: 0;
			}
		</style>
	</head>

	<body>
		<div class="page" id="search">
			<header class="bar bar-nav">
				<a class="icon icon-menu pull-left open-panel"></a>
				<h1 class="title">搜索结果</h1>
			</header>
			<div class="bar bar-header-secondary">
				<div class="searchbar">
					<a class="searchbar-cancel">Cancel</a>
					<div class="search-input">
						<label class="icon icon-search" for="search"></label>
						<input type="search" id='search' placeholder='搜索花艺/服务' />
					</div>
				</div>
			</div>
			<div class="content">

				<div class="buttons-tab">
					<a href="#tab1" class="tab-link active button">综合</a>
					<a href="#tab2" class="tab-link button">销量</a>
					<a href="#tab3" class="tab-link button">价格</a>
					<a href="#tab4" class="tab-link button">店长推荐</a>
				</div>
				<div class="tabs">
					<div id="tab1" class="tab active">
						<div class="content-block">
							<p>This is tab 花植 content</p>
						</div>
					</div>
					<div id="tab2" class="tab">
						<div class="content-block">
							<!--<p>This is tab 干花 content</p>-->
							<div class="list-block media-list">
								<ul>
									<li>
										<a href="../detail/index.html" class="item-link item-content">
											<div class="item-media"><img src="/ffhysc/View/Index/Public/img/good_icon.png" width="80"></div>
											<div class="item-inner">
												<div class="item-title-row">
													<div class="item-title">浓情花意</div>
													<div class="item-after">￥120.50</div>
												</div>
												<div class="item-subtitle">203 Like</div>
												<div class="item-text">SoundAsleep Dream Series Air Mattress with ComfortCoil Technology</div>
											</div>
										</a>
									</li>
									<li>
										<a href="../detail/index.html" class="item-link item-content">
											<div class="item-media"><img src="/ffhysc/View/Index/Public/img/good_icon.png" width="80"></div>
											<div class="item-inner">
												<div class="item-title-row">
													<div class="item-title">缤纷华彩</div>
													<div class="item-after">￥66.5</div>
												</div>
												<div class="item-subtitle">145 Like</div>
												<div class="item-text">J Pillow - Travel Pillow - Winner of British Invention of the Year 2013 - Consistently #1 BEST SELLING TRAVE</div>
											</div>
										</a>
									</li>
									<li>
										<a href="../detail/index.html" class="item-link item-content">
											<div class="item-media"><img src="/ffhysc/View/Index/Public/img/good_icon.png" width="80"></div>
											<div class="item-inner">
												<div class="item-title-row">
													<div class="item-title">缤纷华彩</div>
													<div class="item-after">￥66.5</div>
												</div>
												<div class="item-subtitle">145 Like</div>
												<div class="item-text">J Pillow - Travel Pillow - Winner of British Invention of the Year 2013 - Consistently #1 BEST SELLING TRAVE</div>
											</div>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div id="tab3" class="tab">
						<div class="content-block">
							<p>This is tab 花器 content</p>
						</div>
					</div>
					<div id="tab4" class="tab">
						<div class="content-block">
							<p>This is tab 工具 content</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="/ffhysc/View/Index/Public/js/light7.js"></script>
		<script src="/ffhysc/View/Index/Public/js/light7-swiper.js"></script>
		<script src="/ffhysc/View/Index/Public/js/light7-city-picker.js"></script>
		<script src="/ffhysc/View/Index/Public/js/light7-swipeout.js"></script>
		<script src="/ffhysc/View/Index/Public/js/demose0da.js?r=201603281"></script>
		<script src="/ffhysc/View/Index/Public/js/shop/search.js"></script>
	</body>

	<!-- Mirrored from light7.cn/demos/list/check-list/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 Nov 2016 09:18:11 GMT -->

</html>