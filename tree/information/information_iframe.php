<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>资讯iframe</title>
<link rel="stylesheet" href="../css/chuShiHua.css" type="text/css" /><!--初始化css样式-->
<link rel="stylesheet" href="../css/information/information_iframe.css" type="text/css" /><!--本网页的css样式-->
<script src="../js/jquery.min.js"></script>
<script src="../js/information/emailAutoComplete.js"></script>
<?php include("../php/functions_information.php") ?><!--资讯-函数库-->
</head>

<script language="javascript">
function check(){
	if(apply_form.name.value == ""){
		alert("姓名不能为空！"); 
		apply_form.name.focus();
		return false;
	}
	if(apply_form.youxiang.value == ""){
		alert("邮箱不能为空！");
		apply_form.youxiang.focus();
		return false;
	}
	if(apply_form.dianhua.value == ""){
		alert("电话不能为空！");
		apply_form.dianhua.focus();
		return false;
	}
	if(apply_form.danwei.value == ""){
		alert("所在单位不能为空！");
		apply_form.danwei.focus();
		return false;
	}
	if(apply_form.dizhi.value == ""){
		alert("您的地址不能为空！");
		apply_form.dizhi.focus();
		return false;
	}
	if(apply_form.content.value == ""){
		alert("申请详述不能为空！");
		apply_form.content.focus();
		return false;
	}
}
</script>


<body>
	<div id="content">
		<?php titile($form); ?>
		<?php fengye($form,$page); ?>
	</div>
</body>
</html>