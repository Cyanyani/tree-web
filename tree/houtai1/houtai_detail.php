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
	
		
		
		
		
		
		
	
	    
	    <!---------------------总内容star--------------------------------->
		<div id="all-content">
			<!--搜索出的内容star-->
			<div id="content">
				
				
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
	    
	    
	    
	
</body>
</html>