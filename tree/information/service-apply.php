<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>服务申请处理界面</title>
<link rel="stylesheet" href="../css/chuShiHua.css" type="text/css" /><!--初始化css样式-->
<link rel="stylesheet" href="../css/information/service_apply.css" type="text/css" /><!--本网页的css样式-->
<?php include("../php/open.php") ?><!--资讯-函数库-->
</head>

<body>
<?php 
	$insert="INSERT INTO `service-apply` (`id`, `name`, `youxiang`, `dianhua`, `xiangmu`, `danwei`, `dizhi`, `content`, `jieguo`) VALUES (NULL, '$_POST[name]', '$_POST[youxiang]', '$_POST[dianhua]', '$_POST[xiangmu]', '$_POST[danwei]', '$_POST[dizhi]', '$_POST[content]', '0')";
	$result=mysql_query($insert);
	if($result){
		echo "<div id='content'>
		<div class='title'>
			<div class='nav'>
				<span>您当前的位置是:</span>
				<a href='../index.php' target='_blank'>首页></a>
				<span>申请服务成功</span>
				</div>
			<div class='background'></div>
		</div>
		
		<div class='service-apply'>
			<p class='p1'>申请服务</p>
			<p class='p2'>您将有机会通过申请服务来获得我们网站提供的一些帮助</p>
			<div class='bird'></div>
			<p class='p3'>申请成功</p>
			<p class='p4'>请耐心的等待我们的邮箱回复</p>
			<p class='p5'><a href='information_iframe.php?form=service-apply'>点击返回</a></p>
		</div>
	</div>	";
	}
	else{
		echo"<script language='javascript'>
		alert('添加失败!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
 }
?>
	

</body>
</html>