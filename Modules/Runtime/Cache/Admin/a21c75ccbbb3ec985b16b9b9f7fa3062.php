<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>花艺商城管理端</title>
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
			.bar {
				background-color: skyblue;
			}
			#change_cover{
				width: 3.5rem;
			}
			#change_detail{
				width: 1.5rem;
			}
			.item-inner img{
				width: 3.5rem;
			}
		</style>
	</head>

	<body>
		<div id="page-check-list" class="page">
			<header class="bar bar-nav">
				<a class="button button-link button-nav pull-left back">
					<span class="icon icon-left"></span> Back
				</a>
				<h1 class="title">修改商品信息</h1>
			</header>
			<div class="content" style="top: 0.2rem;">
				<div class="list-block">
					<ul>
						<li>
							<div class="item-content">

								<div class="item-inner">
									<div class="item-title label">商品名</div>
									<div class="item-input">
										<input id="name" maxlength="10" type="text" placeholder="">
									</div>
								</div>
							</div>
						</li>
						
						<li>
							<div class="item-content">
								<div class="item-inner">
									<div class="item-title label">图1</div>
									<img id="img1" src="/ffhysc/View/Admin/Public/img/nopic.jpg">
									<input type="file" onchange="$.upload(this,'img1')" id="input-img1" style="display: none;" />
								</div>
							</div>
						</li>
						<li>
							<div class="item-content">
								<div class="item-inner">
									<div class="item-title label">图2</div>
									<img id="img2" src="/ffhysc/View/Admin/Public/img/nopic.jpg">
									<input type="file" onchange="$.upload(this,'img2')" id="input-img2" style="display: none;" />
								</div>
							</div>
						</li>
						<li>
							<div class="item-content">
								<div class="item-inner">
									<div class="item-title label">图3</div>
									<img id="img3" src="/ffhysc/View/Admin/Public/img/nopic.jpg">
									<input type="file" onchange="$.upload(this,'img3')" id="input-img3" style="display: none;" />
								</div>
							</div>
						</li>
						<li>
							<div class="item-content">
								<div class="item-inner">
									<div class="item-title label">详情图1</div>
									<img id="detailImg1" src="/ffhysc/View/Admin/Public/img/nopic.jpg">
									<input type="file" onchange="$.upload(this,'detailImg1')" id="input-img4" style="display: none;" />
								</div>
							</div>
						</li>
						<li>
							<div class="item-content">
								<div class="item-inner">
									<div class="item-title label">详情图2</div>
									<img id="detailImg2" src="/ffhysc/View/Admin/Public/img/nopic.jpg">
									<input type="file" onchange="$.upload(this,'detailImg2')" id="input-img5" style="display: none;" />
								</div>
							</div>
						</li>
						<li>
							<div class="item-content">
								<div class="item-inner">
									<div class="item-title label">详情图3</div>
									<img id="detailImg3" src="/ffhysc/View/Admin/Public/img/nopic.jpg">
									<input type="file" onchange="$.upload(this,'detailImg3')" id="input-img6" style="display: none;" />
								</div>
							</div>
						</li>
						<li>
							<div class="item-content">

								<div class="item-inner">
									<div class="item-title label">商品价格</div>
									<div class="item-input">
										<input id="price" type="text" >
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="item-content">

								<div class="item-inner">
									<div class="item-title label">月销量</div>
									<div class="item-input">
										<input id="monthlySale" type="text" placeholder="">
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="item-content">

								<div class="item-inner">
									<div class="item-title label">库存</div>
									<div class="item-input">
										<input id="storage" type="text" placeholder="">
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="item-content">

								<div class="item-inner">
									<div class="item-title label">品牌</div>
									<div class="item-input">
										<input id="brand" type="text" placeholder="">
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="item-content">

								<div class="item-inner">
									<div class="item-title label">商品类型</div>
									<div class="item-input">
										<input id="goodType" type="text" placeholder="">
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="item-content">

								<div class="item-inner">
									<div class="item-title label">产地</div>
									<div class="item-input">
										<textarea id="origin"  placeholder=""></textarea>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="item-content">

								<div class="item-inner">
									<div class="item-title label">配送方式</div>
									<div class="item-input">
										<textarea id="deliverType" placeholder=""></textarea>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="item-content">

								<div class="item-inner">
									<div class="item-title label">用途</div>
									<div class="item-input">
										<textarea id="use" placeholder=""></textarea>
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
			$.loadGoodMessage = function() {
				$.ajax({
					type: "post",
					url: "<?php echo U('admin/loadGoodMessageList');?>",
					async: true,
					data: {
						goodID: $.getQueryString("goodID")
					},
					success: function(d) {
						var data = JSON.parse(d);
						if(data.code == "0000") {
							$("#img1")[0].src=data.data[0]["img1"];
							$("#img2")[0].src=data.data[0]["img2"];
							$("#img3")[0].src=data.data[0]["img3"];
							$("#detailImg1")[0].src=data.data[0]["detailImg1"];
							$("#detailImg2")[0].src=data.data[0]["detailImg2"];
							$("#detailImg3")[0].src=data.data[0]["detailImg3"];
							$("#name").val(data.data[0]["name"]);
							$("#price").val(data.data[0]["price"]);
							$("#goodType").val(data.data[0]["goodtype"]);
							$("#monthlySale").val(data.data[0]["monthlysale"]);
							$("#description").val(data.data[0]["description"]);
							$("#storage").val(data.data[0]["storage"]);
							$("#brand").val(data.data[0]["brand"]);
							$("#deliverType").val(data.data[0]["delivertype"]);
							$("#use").val(data.data[0]["use"]);
							$("#origin").val(data.data[0]["origin"]);
						} else {
							$.toast("用户信息加载异常");
						}
					}
				});
			}
			if($.getQueryString("goodID") == "add") {
				$("#submitChange").text("新增商品");
				$(".title").text("新增商品")
			} else {
				$.loadGoodMessage();
			}
			$("#submitChange").on("click", function() {
				$.ajax({
					type: "post",
					url: "<?php echo U('admin/changeGoodInfo');?>",
					async: true,
					data: {
						goodID: $.getQueryString("goodID"),
						name: $("#name").val(),
						price: $("#price").val(),
						monthlySale: $("#monthlySale").val(),
						storage: $("#storage").val(),
						brand: $("#brand").val(),
						deliverType: $("#deliverType").val(),
						use: $("#use").val(),
						origin: $("#origin").val(),
						img1:$("#img1")[0].src,
						img2:$("#img2")[0].src,
						img3:$("#img3")[0].src,
						detailImg1:$("#detailImg1")[0].src,
						detailImg2:$("#detailImg2")[0].src,
						detailImg3:$("#detailImg3")[0].src,
						goodType:$("#goodType").val()
					},
					success: function(d) {
						var data = JSON.parse(d);
						/*通过交易码来检查与后端的换流是否正常,0000表示正常*/
						if(data.code == "0000") {
							$.toast("更改商品信息成功");
						} else {
							$.toast("通讯异常");
						}
					}
				});
			})
			
			$.upload = function(that,id) {
				//支持chrome IE10
				if(window.FileReader) {
					var file = that.files[0];
					//console.log(file)
					filename = file.name;
					var reader = new FileReader();
					reader.readAsDataURL(file);
					reader.onload = function() {
						$("#"+id)[0].src = reader.result;
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
			$("#img1").on('click', function() {
				return $("#input-img1").click();
			});
			/*更改头像的添加事件*/
			$("#img2").on('click', function() {
				return $("#input-img2").click();
			});
			/*更改头像的添加事件*/
			$("#img3").on('click', function() {
				return $("#input-img3").click();
			});
			/*更改头像的添加事件*/
			$("#detailImg1").on('click', function() {
				return $("#input-img4").click();
			});
			/*更改头像的添加事件*/
			$("#detailImg2").on('click', function() {
				return $("#input-img5").click();
			});
			/*更改头像的添加事件*/
			$("#detailImg3").on('click', function() {
				return $("#input-img6").click();
			});
			
			var goodTypeArr=["huazhi","ganhua","huaqi","gongju","zhoubian","shenmixiang"];
			$("#goodType").picker({
				toolbarTemplate: '<header class="bar bar-nav">\
  				<button class="button button-link pull-left">按钮</button>\
  				<button class="button button-link pull-right close-picker">确定</button>\
  				<h1 class="title">选择商品类型</h1>\
  				</header>',
				cols: [{
					textAlign: 'center',
					values: goodTypeArr
				}]
			});
		</script>
	</body>

</html>