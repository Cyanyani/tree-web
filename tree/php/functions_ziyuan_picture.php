<?php
include("open.php");
//参数处理
//-----------------------------------------------------
//由界面传过来的form参数
	if(!isset($_GET["form"])){
		$form=$sql_ziyuan;
	}
	else if($_GET["form"]==""){
		$form=$sql_ziyuan;
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
function titile($form,$id){
	$result=open_form_id($form,$id);
	$row=mysql_fetch_array($result);
	$div="<div class='title'>";
	$div.="<div class='nav'>";
	$div.="<span>您当前的位置是:</span>";
	$div.="<a href='../index.php' target='_blank'>首页></a>";		
	$div.="<a href='ziyuan.php?form=ziyuan' >种质资源></a>";
	$div.="<a href='ziyuan_detail.php?id=".$row["id"]."'>".$row["title"]."></a>";
	$div.="<span>图片库</span></div>";
	$div.="<div class='background'></div></div>";
	echo $div;			
}


//-----------------------------------------------------
//定义information-div-p标签-资讯
function detail($form,$id,$page){
	$result=open_form_id($form,$id);
	$row=mysql_fetch_array($result);
	//图片数量
	$img_array=explode("|",$row["picture"]);
	$img_many=count($img_array);
	
	
	$div="<div class='con'><p class='tit'>";
	//标题
	$div.=$row["title"];
	$div.="</p>";
	$div.="<div class='tit_background'></div>";
	//-----------------------------------------------------
		$div.="<div class='main'>";
		//图片
			$div.="<div style='text-align: center; margin-top:20px;'>";
				$div.="<div id='content1'>";
				$div.="<div class='mygallery clearfix'>";
				$div.="<div class='tn3 album'>";
				$div.="<ol>";
				//图片
				for($x=0;$x<$img_many;$x++){
					$div.="<li>";
					$div.="<h4>".$row["title"]."</h4>";
					$div.="<div class='tn3 description'>图片".($x+1)."</div>";
					$div.="<a href='picture/".$row["number"]."/".$img_array[$x]."'>";
					$div.="<img src='picture/".$row["number"]."/".$img_array[$x]."' />";
					$div.="</a>";
					$div.="</li>";			
				}
				$div.="</ol>";
				$div.="</div>";
				$div.="</div>";
				$div.="</div>";
			$div.="</div>";
			$div.="<div style='clear:both;'></div>";


			//返回上层
			$div.="<a href='picture.php?form=".$form."&page=".$page."' class='fanhui'>";
			$div.="返回上层";
			$div.="</a>";
			//清除浮动
			$div.="<div style='clear:both;'></div>";
		$div.="</div>";
	$div.="</div>";
   	echo $div;	

}

?>