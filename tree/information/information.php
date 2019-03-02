<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>信息</title>
<link rel="stylesheet" href="../css/chuShiHua.css" type="text/css" /><!--初始化css样式-->
<link rel="stylesheet" href="../css/information/information.css" type="text/css" /><!--本网页的css样式-->
<?php include("../php/functions_information.php") ?><!--资讯-函数库-->
<!--js样式star-->
<script type="text/javascript" src="../js/jquery.min.js"></script>
<!--js样式end-->
</head>

<body>
		<!--头背景star-->
		<div id="top-header"></div>
		<!--头背景end-->
		
		
		
		
		
		<!-------------------------------------------------------->
		<!--||导航栏-（首页）star-->
		<div id="bg">
			<div class="top-menu">
				<ul class="nav1" id="all_title">
					<li class="li1">
						<a href="../index.php" class="active a1">首页</a>
					</li>
					
					<li class="li1">
						<a href="information.php?form=infromation-new&page=1" class="a1">资讯</a>
						<ul class="nav20">
							<li class="li2"><a href="information.php?form=information-new&page=1">行业动态</a></li>
							<li class="li2"><a href="information.php?form=information-gonggao&page=1">通知公告</a></li>
							<li class="li2"><a href="information.php?form=information-falv&page=1">法律法规</a></li>
						</ul>
					</li>
					
					<li class="li1">
						<a href="information.php?form=service-anli&page=1" class="a1" >服务</a>
						<ul class="nav20">
							<li class="li2"><a href="information.php?form=service-anli&page=1">服务案例</a></li>
							<li class="li2"><a href="information.php?form=service-apply&page=1#">申请服务</a></li>
						</ul>
					</li>
					
					<li class="li1">
						<a href="information.php?form=knowledge-baike&page=1" class="width3 a1">知识库</a>
						<ul class="nav20">
							<li class="li2"><a href="information.php?form=knowledge-baike&page=1">百科知识</a></li>
							<li class="li2"><a href="information.php?form=knowledge-yuzhong&page=1">育种专题</a></li>
							<li class="li2"><a href="information.php?form=knowledge-yinzhong&page=1">引种驯化</a></li>
						</ul>
					</li>
					
					<li class="li1">
					<a href="../picture/picture.php" class="width3 a1">图片库</a>
					</li>
					
					<li class="li1">
					<a href="../ziyuan/ziyuan.php" class="width4 a1">种质资源</a>
						
					</li>
					
					<li class="li1">
					<a href="../general/general.php?form=1" class="width4 a1">资源概括</a>
						<ul class="nav21">
							<li class="li2"><a href="#">资源介绍</a></li>
							<li class="li2"><a href="#">自然资源</a></li>
							<li class="li2"><a href="#">生产概况</a></li>
							<li class="li2"><a href="#">技术支持</a></li>
							<li class="li2"><a href="#">良种介绍</a></li>
						</ul>
					</li>
					
					<li class="li1">
					<a href="../xiazai/xiazai.php" class="width4 a1">资料共享</a>
						<ul class="nav21">
							<li class="li2"><a href="#">相关公告</a></li>
							<li class="li2"><a href="#">相关资料</a></li>
							<li class="li2"><a href="#">电子期刊</a></li>
						</ul>
					</li>
					
				</ul>
				<input type="hidden" id="form1" value="<?php echo $form; ?>">
				<!--js代码star-->
				<script>
					$(function(){
						var form=$('#form1').val();
						switch(form){
							case "information-new":
								$('#all_title .li1 .a1').removeClass('active');
								$('#all_title .li1').eq(1).find('.a1').addClass('active');
								break;
							case "information-gonggao":
								$('#all_title .li1 .a1').removeClass('active');
								$('#all_title .li1 ').eq(1).find('.a1').addClass('active');
								break;
							case "information-falv":
								$('#all_title .li1 .a1').removeClass('active');
								$('#all_title .li1').eq(1).find('.a1').addClass('active');
								break;
							case "knowledge-baike":
								$('#all_title .li1 .a1').removeClass('active');
								$('#all_title .li1').eq(3).find('.a1').addClass('active');
								break;
							case "knowledge-yuzhong":
								$('#all_title .li1 .a1').removeClass('active');
								$('#all_title .li1').eq(3).find('.a1').addClass('active');
								break;
							case "knowledge-yinzhong":
								$('#all_title .li1 .a1').removeClass('active');
								$('#all_title .li1').eq(3).find('.a1').addClass('active');
								break;
							case "service-anli":
								$('#all_title .li1 .a1').removeClass('active');
								$('#all_title .li1').eq(2).find('.a1').addClass('active');
								break;
							case "service-apply":
								$('#all_title .li1 .a1').removeClass('active');
								$('#all_title .li1').eq(2).find('.a1').addClass('active');
								break;
							default:
								$('#all_title .li1 .a1').removeClass('active');
								$('#all_title .li1').eq(1).find('.a1').addClass('active');
								break;
						}
					});
				</script>
			<!--搜索框star-->
				<div class="top-search">
					<a title="搜索" href="../search.php"></a>
				</div>
			<!--搜索框end-->
			</div>
		</div>
		<!--||导航栏-（首页）end>-->
		
		<!--去掉4个像素-->
    	<div style="width: 1004px; height: 4px; background: #ffffff;margin:0px auto;"></div>
		<!--||导航栏-（首页）end>-->
		
		
		
		
		
		<!---------------------总内容star--------------------------------->
		<div id="all-content">
			<div id="left-nav">
				<p class='p2'>资讯</p>
				<p style="width:188px; border-bottom:2px solid #b9b9b9"></p>
				<div id="all1">
					<p class='p3' id="one1">
						<a href="information.php?form=information-new">行业动态<span>></span></a>
					</p>
					<p class='p3' id="one2">
						<a href="information.php?form=information-gonggao">通知公告<span>></span></a>
					</p>
					<p class='p3' id="one3">
						<a href="information.php?form=information-falv">法律法规<span>></span></a>
					</p>
				</div>
				
				
				<p class='p2'>知识库</p>
				<p style="width:188px; border-bottom:2px solid #b9b9b9"></p>
				<div id="all2">
					<p class='p3' id="one4">
						<a href="information.php?form=knowledge-baike">百科知识<span>></span></a>
					</p>
					<p class='p3' id="one5">
						<a href="information.php?form=knowledge-yuzhong">育种专题<span>></span></a>
					</p>
					<p class='p3' id="one6">
						<a href="information.php?form=knowledge-yinzhong">引种驯化<span>></span></a>
					</p>
				</div>
				
				
				<p class='p2'>服务</p>
				<p style="width:188px; border-bottom:2px solid #b9b9b9"></p>
				<div id="all2">
					<p class='p3' id="one7">
						<a href="information.php?form=service-anli">服务案例<span>></span></a>
					</p>
					<p class='p3' id="one8">
						<a href="information.php?form=service-apply">申请服务<span>></span></a>
					</p>
				</div>
				
			</div>
			
			<div id="right-content">
				<div id="con_one_1">
					<iframe src='information_iframe.php?form=information-new' width="814" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_2">
					<iframe src='information_iframe.php?form=information-gonggao' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_3">
					<iframe src='information_iframe.php?form=information-falv' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<!------------------------------------------------------------------------------------>
				<div id="con_one_4">
					<iframe src='information_iframe.php?form=knowledge-baike' width="814" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_5">
					<iframe src='information_iframe.php?form=knowledge-yuzhong' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_6">
					<iframe src='information_iframe.php?form=knowledge-yinzhong' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<!------------------------------------------------------------------------------------>
				
				<div id="con_one_7">
					<iframe src='information_iframe.php?form=service-anli' width="814" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_8">
					<iframe src='information_iframe.php?form=service-apply' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				
			</div>
			<input type="hidden" id="form" value="<?php echo $form ?>">
			<!--js代码star-->
				<script>
					function setTab(name,cursel){
						for(var i=1;i<=8;i++){
							var menu = document.getElementById(name+i);
							var menudiv = document.getElementById("con_"+name+"_"+i);
							if(i==cursel){
								menu.className="p3 active";
								menudiv.style.display="block";
							}
							else{
								menu.className="p3";
								menudiv.style.display="none";
							}
						}
					}
					
					function setTabswitch(){
						var form=document.getElementById("form");
						switch(form.value){
							case "information-new":setTab('one',1);break;
							case "information-gonggao":setTab('one',2);break;
							case "information-falv":setTab('one',3);break;
								
							case "knowledge-baike":setTab('one',4);break;
							case "knowledge-yuzhong":setTab('one',5);break;
							case "knowledge-yinzhong":setTab('one',6);break;
								
							case "service-anli":setTab('one',7);break;
							case "service-apply":setTab('one',8);break;
						default:setTab('one',1);break;
								
						}
					}
					setTabswitch();
				</script>
			<!--js代码end-->
			
			<!--固定三案按钮star-->
			<div id="float_3">
				<div class="weather">
					<div class="iframe2">
						<iframe src="//www.seniverse.com/weather/weather.aspx?uid=U9F23C6D97&cid=CHBJ000000&l=zh-CHS&p=SMART&a=1&u=C&s=11&m=2&x=1&d=3&fc=&bgc=&bc=&ti=0&in=0&li=" frameborder="0" scrolling="no" width="230" height="250" allowTransparency="true"></iframe>
					</div>
				</div>
				<div class="kefu">
					<div class="kefu1">
						<ul class="kefu2">
							<li>QQ:11312312</li>
							<li>QQ:11312312</li>
							<li>服务热线:1231561</li>
						</ul>
					</div>
				</div>
				<div class="hui_top" id="hui_top"></div>
			</div>
				<script type="text/javascript">
				$(function(){
					//设置位置
					var body_width=parseInt($('body, html').width());
					var float_right=((body_width-1004)/2)-(95+64);
					var scroll=parseInt($(window).scrollTop());
					
					//初始位置
					if(body_width<1088){
							$("#float_3").css({'display':'none'});
						}
						else if(body_width>=1180&&body_width<=1366){
							$("#float_3").css({'display':'block'});
						}
						else if(body_width>1366){
							$("#float_3").css({'display':'block'});
							$("#float_3").css({'right':float_right});
							
						}
					//浏览器窗口变化时
					$(window).resize(function(){
						body_width=parseInt($('body, html').width());
						float_right=((body_width-1004)/2)-(80+64);
						if(body_width<1088){
							$("#float_3").css({'display':'none'});
						}
						else if(body_width>=1180&&body_width<=1366){
							$("#float_3").css({'display':'block'});
						}
						else if(body_width>1366){
							$("#float_3").css({'display':'block'});
							$("#float_3").css({'right':float_right});
							
						}
					});
					//滚动条滚动时触发事件
					$(window).scroll(function(){
						body_width=parseInt($('body, html').width());
						float_right=((body_width-1004)/2)-(80+64);
						scroll=parseInt($(window).scrollTop());
						if(scroll>=510){
							if(float_right<0){
								$("#float_3").css({'position':'fixed','top':15,'right':20});
							}
							else{	
								$("#float_3").css({'position':'fixed','top':15,'right':float_right});
							}
						}
						else if(scroll<510){
							if(float_right<0){
								$("#float_3").css({'position':'absolute','top':510,'right':20});
							}
							else{
								$("#float_3").css({'position':'absolute','top':510,'right':float_right});
							}
						}
						
						
					});
					
					//点击返回头部时触发返回到头部的事件
					$('#hui_top').click(function(){
						$('body, html').animate({scrollTop:200},10);
					});
				});
			</script>
			<!--固定三案按钮end-->
			
		</div>
		<!---------------------总内容end--------------------------------->
		
		
		
		
 	<!-------------------------------------------------------->
  	<!--尾-->
	<div id="bottom">
		<div class="span">
			<div class="span1">
				项目支持：中华人名共和国科学科技部&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;主管部门与单位：国家林业局 中国林业科学研究院
			</div>
			<div class="span2">
				<p>建设单位：中国林业科学研究院林业研究所等 国家林木种质资源平台  版权所有</p>
				<p>联系地址：北京市海淀区青龙桥东小府1号中国林科院林业所  邮编:100091 </p>
				<p>电话：010-62889633  电子邮件：chinafgr@126.com </p>
			</div>
			<div class="span3">
				<a href="denglu.php">管理员登录</a>
			</div>
		</div>
	</div>
</body>
</html>