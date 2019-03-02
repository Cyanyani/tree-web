<?php
include("php/open.php");
//参数处理
//由界面传过来的module参数
	if(!isset($_GET["module"])){
		$module="information";
	}
	else if($_GET["module"]==""){
		$module="information";
	}
	else{
		$module=$_GET["module"];
	}
//---------------------------
//由界面传过来的form参数
	if(!isset($_GET["form"])){
		$form=$information-gonggao;
	}
	else if($_GET["form"]==""){
		$form=$information-gonggao;
	}
	else{
		$form=$_GET["form"];
	}
//陈列information 模块
function information($form,$module){
	$insert="INSERT INTO `$form` (`id`, `view`, `title`, `content`, `author`, `laiyuan`, `time`, `picture`) VALUES ('$_POST[id]', '$_POST[view]', '$_POST[title]', '$_POST[content]', '$_POST[author]', '$_POST[laiyuan]', '$_POST[time]', '$_POST[picture]')";
	$result=mysql_query($insert);
	if($result){
		echo"<script language='javascript'>
		alert('添加成功!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
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

}


//-------------------------------------------------------------------
//陈列zhengce 模块
function zhengce($form,$module){
	$insert="INSERT INTO `$form` (`id`, `view`, `title`, `content`,`time`, `picture`) VALUES ('$_POST[id]', '$_POST[view]', '$_POST[title]', '$_POST[content]', '$_POST[time]', '$_POST[picture]')";
	$result=mysql_query($insert);
	if($result){
		echo"<script language='javascript'>
		alert('添加成功!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
	}
	else{
		echo $form;
	}
}

///-------------------------------------------------------------------
//陈列ziyuan模块
function ziyuan($form,$module){
	switch($form){
		case "ziyuan":$nav=1;break;
		default:$nav=0;break;
	}
	if($nav==1){
		$insert="INSERT INTO `$form` (`id`, `view`, `hit`, `number`, `bianhao`, `title`, `leixing`, `english`, `shuming`,`usefor`,`xiangmu`,`danwei`,`huzhao`,`base`,`share`,`other`,`picture`) VALUES ('$_POST[id]', '$_POST[view]', '$_POST[hit]', '$_POST[number]', '$_POST[bianhao]', '$_POST[title]', '$_POST[leixing]', '$_POST[english]', '$_POST[shuming]','$_POST[usefor]','$_POST[xiangmu]','$_POST[danwei]','$_POST[huzhao]','$_POST[base]','$_POST[share]','$_POST[other]', '$_POST[picture]') ";
		$result=mysql_query($insert);
		if($result){
		echo"<script language='javascript'>
		alert('添加成功!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
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
	}
	else{
		$insert="INSERT INTO `$form` (`id`, `view`, `name`, `canshu`, `chanping`, `picture`) VALUES ('$_POST[id]', '$_POST[view]', '$_POST[name]', '$_POST[canshu]', '$_POST[chanping]', '$_POST[picture]') ";
		$result=mysql_query($insert);
		if($result){
			echo"<script language='javascript'>
			alert('添加成功!');
			</script>";
			echo
			"<script language='javascript'>
			window.history.back();
			</script>";
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
	}
}

//陈列information 模块
function video($form,$module){
	$insert="INSERT INTO `$form` (`id`, `view`, `title`, `content`,`picture`,`video`) VALUES ('$_POST[id]', '$_POST[view]', '$_POST[title]', '$_POST[content]', '$_POST[picture]','$_POST[video]')";
	$result=mysql_query($insert);
	if($result){
		echo"<script language='javascript'>
		alert('添加成功!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
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
}
//-------------------------------------------------------------------
//陈列information 模块
function teach($form,$module){
	$insert="INSERT INTO `$form` (`id`, `view`, `name`, `title`, `chapter`, `content`, `picture`, `video`) VALUES ('$_POST[id]', '$_POST[view]', '$_POST[name]', '$_POST[title]', '$_POST[chapter]', '$_POST[content]', '$_POST[picture]', '$_POST[video]') ";
	$result=mysql_query($insert);
		if($result){
			echo"<script language='javascript'>
			alert('添加成功!');
			</script>";
			echo
			"<script language='javascript'>
			window.history.back();
			</script>";
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
}
//陈列xiazai 模块
function xiazai($form,$module){
	$insert="INSERT INTO `$form` (`id`, `view`, `title`, `fujian`,`time`, `picture`) VALUES ('$_POST[id]', '$_POST[view]', '$_POST[title]', '$_POST[fujian]', '$_POST[time]', '$_POST[picture]')";
	$result=mysql_query($insert);
	if($result){
		echo"<script language='javascript'>
		alert('添加成功!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
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
}
//-------------------------------------------------------------------
//总调用函数
function all_enty($form,$module){
	switch($module){
		case "information":information($form,$id,$page,$module);break;
		case "knowledge":knowledge($form,$id,$page,$module);break;
		case "picture":picture($form,$id,$page,$module);break;
		case "general":general($form,$id,$page,$module);break;
		case "ziyuan":ziyuan($form,$id,$page,$module);break;
		case "xiazai":xiazai($form,$id,$page,$module);break;
		default:information($form,$id,$page,$module);break;
	}
}
all_enty($form,$module);
?>