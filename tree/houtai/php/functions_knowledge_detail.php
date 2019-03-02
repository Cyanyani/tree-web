<?php
	include("open.php");

//参数处理
//-----------------------------------------------------
//由界面传过来的form参数
	if(!isset($_GET["form"])){
		$form=$sql_knowledge_baike;
	}
	else if($_GET["form"]==""){
		$form=$sql_knowledge_baike;
	}
	switch($_GET["form"]){
		case 1:$form=$sql_knowledge_baike;break;
		case 2:$form=$sql_knowledge_yuzhong;break;
		case 3:$form=$sql_knowledge_yinzhong;break;
			
		default:$form=$sql_knowledge_baike;break;
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


//-----------------------------------------------------
//------------title--------------
function titile($form,$id,$page){
	$row=open_form_id($form,$id);
	//判断content字符串长度
	$get_row=substr_cut($row["fujian"],30);
	$div="<div class='title'>";
	$div.="<div class='nav'>";
	$div.="<span>您当前的位置是:</span>";
	$div.="<a href='../../houtai.php'>后台管理></a><a href='knowledge.php?form=1'>知识库></a>";
	switch($form){
			case "knowledge-baike":$div.="<a href='knowledge.php?form=1&page=".$page."'>百科知识></a><span>".$get_row."</span></div>";break;
			case "knowledge-yuzhong":$div.="<a href='knowledge.php?form=2&page=".$page."'>育种专题></a><span>".$get_row."</span></div>";break;
			case "knowledge-yinzhong":$div.="<a href='knowledge.php?form=2&page=".$page."'>引种驯化></a><span>".$get_row."</span></div>";break;
			case "knowledge-baike":$div.="<span>百科知识</span></div>";break;
			case "knowledge-yuzhong":$div.="<span>育种专题</span></div>";break;					
			case "knowledge-yinzhong":$div.="<span>引种驯化</span></div>";break;
								
			default:$div.="<span>百科知识</span></div>";break;
	
						}
	
	$div.="<div class='background'></div></div>";
	echo $div;			
}
//-----------------------------------------------------
//定义information-div-p标签-资讯
function detail($form,$id,$page){
	$row=open_form_id($form,$id);
	//计算多少条id
	$total_sql="SELECT COUNT(*) FROM `$form`";
	$total_result=mysql_fetch_array(mysql_query($total_sql));
	$total=$total_result[0];
	//安装/打断
	$p_array=explode("|",$row["fujian"]);
	$many=count($p_array);
	$div="<div class='con'><p class='tit'>";
	//标题
	$div.=$row["title"];
	//细节
	$div.="</p><div class='xijie'>";
	$div.="<span>来源：<a href='http://www.nongyao001.com' class='xijie_a' target='_blank'>中国农药第一网</a>";
	$div.="&nbsp;&nbsp;&nbsp;&nbsp;</span><span>发表时间：";
	$div.=$row["time"]."</span>";
	//-----------------------------------------------------
	$div.="</div><div class='main'>";
	//文字
	$div.="<p>";
	$div.=$p_array[0];
	$div.="</p>";
	//图片
	$div.="<div style='text-align: center; margin-top:20px;'><img alt='图片' width='710' height='411' src='../../xiazai/";
	$div.=$row["picture"];
	$div.="'></div><div style='text-align: center;margin-bottom: 20px'>图片来源网络</div>";
	//文字
	for($i=1;$i<$many;$i++){
		$div.="<p>";
		$div.=$p_array[$i];
		$div.="</p>";
	}
	//上一下一
	$div.="<div class='a'>";
	if($id>=2){
		$id_up=$id-1;
		$result_up=open_form_id($form,$id_up);
		$row_up=mysql_fetch_array($result_up);
		$div.="<a href='xiazai_detail.php?form=".$_GET["form"]."&id=".$id_up."&page=".$page."'>";
		$div.="上一篇：";
		$div.=$row_up["title"];
		$div.="</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		$div.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
   } 				
		
	if($id<$total){
		$id_down=$id+1;
		$result_down=open_form_id($form,$id_down);
		$row_down=mysql_fetch_array($result_down);
		$div.="<a href='xiazai_detail.php?form=".$_GET["form"]."&id=".$id_down."&page=".$page."'>";
		$div.="下一篇：";
		$div.=$row_down["title"];
		$div.="</a>";
	}
	$div.="</div></div>";
	$div.="</div>";
   	echo $div;	
}


?>
