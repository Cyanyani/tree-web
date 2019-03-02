<?php
	include("open.php");

//参数处理
//-----------------------------------------------------
//由界面传过来的form参数
	if(!isset($_GET["form"])){
		$form=$sql_general_introduce;
	}
	else if($_GET["form"]==""){
		$form=$sql_general_introduce;
	}
	else{
		$form=$_GET["form"];
	}
//由界面传过来的page参数
	if(!isset($_GET["page"])){
		$page=1;
	}
	else if($_GET["page"]==""){
		$page=1;
	}
	else{
		$page=$_GET["page"];
	}
//由界面传过来的id参数
	if(!isset($_GET["id"])){
		$id=1;
	}
	else if($_GET["id"]==""){
		$id=1;
	}
	else{
		$id=$_GET["id"];
	}

//-----------------------------------------------------
//------------title--------------
function titile($form){
	$div="<div class='title'>";
	$div.="<div class='nav'>";
	$div.="<span>您当前的位置是:</span>";
	$div.="<a href='../index.php' target='_blank'>首页></a>";
	switch($form){
			case "general-introduce":$div.="<a href='general.php?form=".$form."'>资源介绍</a></div>";break;
			case "general-natural":$div.="<a href='general.php?form=".$form."'>自然资源</a></div>";break;
			case "general-production":$div.="<a href='general.php?form=".$form."'>生产概况</a></div>";break;
			
			case "general-jishu":$div.="<a href='general.php?form=".$form."'>技术支持</a></div>";break;
			case "general-liangpin":$div.="<a href='general.php?form=".$form."'>良种介绍</a></div>";break;
			
			default:$div.="<a href='general.php?form=".$form."'>资源介绍</a></div>";break;
		}
	$div.="<div class='background'></div></div>";
	echo $div;			
}

//-----------------------------------------------------
//定义general-div-p标签-资讯
function detail($form,$id,$page){
	$result=open_form_id($form,$id);
	$row=mysql_fetch_array($result);
	//点击量
	$hit=$row["hit"]+1;
	$update="UPDATE `$form` SET `hit` = '$hit' WHERE `$form`.`id` = $id";
	mysql_query($update);
	//计算多少条id
	$total_sql="SELECT COUNT(*) FROM `$form`";
	$total_result=mysql_fetch_array(mysql_query($total_sql));
	$total=$total_result[0];
	//安装/打断
	$p_array=explode("|",$row["content"]);
	$many=count($p_array);
	$div="<div class='con'><p class='tit'>";
	//标题
	$div.=$row["title"];
	//细节s
	$div.="</p><div class='xijie'>";
	$div.="<span>作者：".$row["author"]."</span>";
	$div.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>来源：".$row["laiyuan"];
	$div.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span>发表时间：";
	$div.=$row["time"]."</span>";
	$div.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>阅读量：".$row["hit"]."</span>";

	//-----------------------------------------------------
	$div.="</div><div class='main'>";
	//文字
	$div.="<p>";
	$div.=$p_array[0];
	$div.="</p>";
	//图片
	if($row["picture"]){
		$div.="<div style='text-align: center; margin-top:20px;'><img alt='图片' width='710' height='411' src='";
		$div.=$row["picture"];
		$div.="'></div><div style='text-align: center;margin-bottom: 20px'>图片来源网络</div>";
	}
	
	//文字
	for($i=1;$i<$many;$i++){
		$div.="<p>";
		$div.=$p_array[$i];
		$div.="</p>";
	}
	//下载附件
	if($row["fujian"]){
		$div.="<div class='xiazai'><h4>下载附件:</h4><a  href='doDownload.php?filename=".$row["fujian"]."'>";
		$div.="附件：".$row["fujian"];
		$div.="</a></div>";	
	}
	//打印本页
	$div.="<a id='btnPrint'  href='#' class='dayin'>";
	$div.="打印文章";
	$div.="</a>";
	//返回上层
	$div.="<a href='general.php?form=".$form."&page=".$page."' class='fanhui'>";
	$div.="返回上层";
	$div.="</a>";
	//清除浮动
	$div.="<div style='clear:both;'></div>";
	//上一下一
	$div.="<div class='a'>";
	if($id<$total){
		$id_up=$id+1;
		$result_up=open_form_id($form,$id_up);
		$row_up=mysql_fetch_array($result_up);
		$div.="<a href='general_detail.php?form=".$_GET["form"]."&id=".$id_up."&page=".$page."'>";
		$div.="上一篇：";
		//判断tite字符串长度
		$get_row=substr_cut($row_up["title"],60);
		$div.=$get_row;
		$div.="</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		$div.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
   } 				
		
	if($id>=2){
		$id_down=$id-1;
		$result_down=open_form_id($form,$id_down);
		$row_down=mysql_fetch_array($result_down);
		$div.="<a href='general_detail.php?form=".$_GET["form"]."&id=".$id_down."&page=".$page."'>";
		$div.="下一篇：";
		//判断tite字符串长度
		$get_row=substr_cut($row_down["title"],60);
		$div.=$get_row;
		$div.="</a>";
	}
	$div.="</div></div>";
	$div.="</div>";
   	echo $div;	
}


?>
