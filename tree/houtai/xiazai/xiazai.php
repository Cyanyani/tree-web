<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>资料下载</title>
<link rel="stylesheet" href="../css/chuShiHua.css" type="text/css" /><!--初始化css样式-->
<link rel="stylesheet" href="../css/xiazai/xiazai.css" type="text/css" /><!--本网页的css样式-->
<?php include("../php/functions_xiazai.php") ?><!--资讯-函数库-->
</head>

<body>
		<!--头背景star-->
		<div id="top-header"></div>
		<!--头背景end-->
		
		
		
		
		<div id="bg">
			<div class="top-menu">
				<ul id="all_title">
					<li><a href="../houtai.php" class="width4 active">数据管理</a></li>
					<li><a href="../information/information.php" class="width4">资讯信息</a></li>
					<li><a href="../information/information.php?form=3&page=1" class="width4">服务动态</a></li>
					<li><a href="../knowledge/knowledge.php" class="width5">知识库</a></li>
					<li><a href="../picture/picture.php" class="width5">图片库</a></li>    <!--市场行情information.php-->
					<li><a href="../general/general.php" class="width4">资源概况</a></li>              <!--种植教学 teach.php-->
					<li><a href="../ziyuan/ziyuan.php?form=1" class="width4">种质资源</a></li>     <!--农资信息 nongzi.php-->
					<li><a href="../xiazai/xiazai.php" class="width5">资料共享</a></li>
				</ul>
			<!--搜索框star-->
				<div class="top-search">
					<a id='tuichu' href='../tuichu.php'>管理员退出</a>
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
				<p class='p2'>资料共享</p>
				<p style="width:188px; border-bottom:2px solid #b9b9b9"></p>
				<div id="all1">
					<p class='p3' id="one1" onclick="setTab('one',1)">
						<a>相关公告<span>></span></a>
					</p>
					<p class='p3' id="one2" onclick="setTab('one',2)">
						<a>相关资料<span>></span></a>
					</p>
					<p class='p3' id="one3" onclick="setTab('one',3)">
						<a>电子期刊<span>></span></a>
					</p>
				</div>
			</div>
			<div id="right-content">
				<div id="con_one_1">
					<iframe src='xiazai_iframe.php?form=xiazai-gonggao&page=<?php echo $page;?>' width="814" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_2">
					<iframe src='xiazai_iframe.php?form=xiazai-ziliao&page=<?php echo $page;?>' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_3">
					<iframe src='xiazai_iframe.php?form=xiazai-qikan&page=<?php echo $page;?>' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
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
							case "xiazai-gonggao":setTab('one',1);break;
							case "xiazai-ziliao":setTab('one',2);break;
							case "xiazai-qikan":setTab('one',3);break;		
						default:setTab('one',1);break;
						}
					}
					setTabswitch();
				</script>
			<!--js代码end-->
		</div>
		<!---------------------总内容end--------------------------------->
		
		
		
		
 	<!-------------------------------------------------------->
  	<!--尾-->
	<div id="bottom">
		<div class="span">
			<div class="span1">
				<p>友情链接：</p>
				<div>
					<a href="http://www.xjxnw.gov.cn" target="_blank">兴农网</a>
					<a href="http://www.zgny.com.cn" target="_blank">中国农业网</a>
					<a href="http://www.chinapesticide.gov.cn" target="_blank">中国农药信息网</a>
					<a href="http://www.grain.gov.cn" target="_blank">中国粮食信息网</a>

				</div>
				<div>
					<a href="http://www.gofei.net" target="_blank">农批网</a>
					<a href="http://www.agri.cn" target="_blank">中国农业信网</a>
					<a href="http://www.nongyao001.com" target="_blank">中国农药第一网</a>
					<a href="http://www.zgncpw.com" target="_blank">中国农产品网</a>
				</div>
			</div>
			<div class="span2">
				<p>关于我们：</p>
				<div class="p">
					<p>联系地址：浙江省多媒体大赛</p>
					<p>联系电话：***********/**********</p>
				</div>
				<div class="p">
				 <p>官方邮箱：***********@qq.com</p>
				</div>
			</div>
			<div class="span3">
					<a href="../../index.php" target="_blank">新疆农业技术学习平台</a>
			</div>
		</div>
	</div>
</body>
</html>