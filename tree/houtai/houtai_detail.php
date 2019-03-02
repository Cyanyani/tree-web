<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>后台管理</title>
<link rel="stylesheet" href="css/chuShiHua.css" type="text/css" /><!--初始化css样式-->
<link rel="stylesheet" href="css/houtai.css" type="text/css" /><!--本网页的css样式-->
<?php include("php/functions_houtai_detail.php") ?><!--首页-函数库-->
<!--js样式star-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!--js样式end-->

</head>

<body>
<?php
	session_start();
	@$zhanghao=$_COOKIE["zhanghao"];
	if($zhanghao == "") {
		echo
		"<script language='javascript'>
		alert('请先登录!');
		</script>";
		echo
		"<script language='javascript'>
		location.href = ('../denglu.php');
		</script>";
	}
?>
<!--头背景star-->
		<div id="top-header">
			
			<!--框架样式-->

<!--top样式-->
	<iframe src="top.html" width="100%" height="94" scrolling="no"></iframe>
<!--contact样式-->
	
<!--bottom样式-->

</frameset>
		</div>
		<!--头背景end-->
	    
	    <!---------------------总内容star--------------------------------->
		<div id="all-content">
			<!--搜索出的内容star-->
			<div id="content">
				<!--标题导航star-->
				<div id="lanren">
					<ul class="nav1">
						<li class="li1 active">
							资讯信息
							<ul class="nav20">
								<a class='li2' href='houtai.php?module=information&form=information-gonggao'>
									通知公告
								</a>
								<a class='li2' href='houtai.php?module=information&form=information-new'>
									行业动态
								</a>
								<a class='li2' href='houtai.php?module=information&form=information-falv'>
									法律法规
								</a>
							</ul>
						</li>
						<li class="li1">
							服务动态
							<ul class="nav20">
								<a class='li2' href='houtai.php?module=service&form=service-anli'>
									服务案例
								</a>
							</ul>
						</li>
							
							<li class="li1">
							知识库
							<ul class="nav21">
								<a class='li2' href='houtai.php?module=knowledge&form=knowledge-baike'>
									百科知识
								</a>
								<a class='li2' href='houtai.php?module=knowledge&form=knowledge-yuzhong'>
									育种专题
								</a>
								<a class='li2' href='houtai.php?module=knowledge&form=knowledge-yinzhong'>
									引种驯化
								</a>
							</ul>
						</li>
						<li class="li1">
							资源概况
							<ul class="nav21">
								<a class='li2' href='houtai.php?module=general&form=general-introduce'>
									资源介绍
								</a>
								<a class='li2' href='houtai.php?module=general&form=general-jishu'>
									技术支持
								</a>
								<a class='li2' href='houtai.php?module=general&form=general-liangpin'>
									良种介绍
								</a>
							</ul>
						</li>
						<li class="li1">
							种质资源
							<ul class="nav21">
								<a class='li2' href='houtai.php?module=ziyuan&form=ziyuan'>
									种质资源推荐
								</a>
							</ul>
						</li>
						<li class="li1" id="last_one">
							资料共享
							<ul class="nav21">
								<a class='li2' href='houtai.php?module=xiazai&form=xiazai-gonggao'>
									相关公告
								</a>
								<a class='li2' href='houtai.php?module=xiazai&form=xiazai-ziliao'>
									相关资料
								</a>
								<a class='li2' href='houtai.php?module=xiazai&form=xiazai-qikan'>
									电子期刊
								</a>
							</ul>
						</li>
					</ul>
					<input type="hidden" id="input_module" value="<?php echo $module; ?>">
					<!--js代码部分star-->
					<script language="javascript">
						function setTab(){
						var li=document.getElementById("lanren").getElementsByTagName("li");
						li[0].className="li1 active";
						var module_name=document.getElementById("input_module");
						var module=0;
						switch(module_name.value){
							case "information":module=0;break;
							case "knowledge":module=1;break;
							case "picture":module=2;break;
							case "general":module=3;break;
							case "ziyuan":module=4;break;
							case "xiazai":module=5;break;
						default:module=0;break;
						}
						for(var i=0;i<=5;i++){
							if(i==module){
								li[i].className="li1 active";
							}
							else{
								li[i].className="li1";	
							}
						}
					}
					setTab();
					</script>
					<!--js代码部分end-->
				</div>
			<!--标题导航end-->
				<!--搜索出的内容_content star-->
					<div class="title">
							<div class="nav">
								<span>您当前的位置是:</span>
								
								<?php nei_nav($module,$form); ?>
							</div>
							<div class="background"></div>
							<a id='tianjia' href='houtai_detail?form=<?php echo $form ?>'>添加数据</a>
					</div>
					<div class="content">
							<!--表界面-->
							<?php all_enty($form,$id,$page,$module); ?>
						<script>
							$(function(){
								$("#back").click(function(){
									window.history.back();
								});
							});
						</script>
					</div>
			</div>
			<!--搜索出的内容end-->
		</div>
	    
	    
	    
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
				<a href="../index.php">首页</a>
			</div>
		</div>
	</div>
</body>
</html>