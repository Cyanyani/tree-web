<?php 
	include("open.php");
//---------------------资讯star--------------------------------
//定义information-img标签-资讯
function information_img($form,$many){
	$dao=open_form_id_daoxu($form);
	$img="";
	while($row=mysql_fetch_array($dao)){
		if($many>0){
			if($many==3){
				$img.="<a href='information/information_detail.php?form=";
				$img.=$form."&id=".$row["id"]."' target='_blank' class='display_block' >";
				$img.="<img src='information/".$row["picture"]."'>";
				$img.="<p class='pp'>";
				//判断字符串长度
				$get_row=substr_cut($row["content"],36);
				$img.=$get_row;
				$img.="</p>";
				$img.="</a>";
		   	}
			else{
				$img.="<a href='information/information_detail.php?form=";
				$img.=$form."&id=".$row["id"]."'  target='_blank' >";
				$img.="<img src='information/".$row["picture"]."'>";
				$img.="<p class='pp'>";
				//判断字符串长度
				$get_row=substr_cut($row["content"],36);
				$img.=$get_row;
				$img.="</p>";
				$img.="</a>";
			}
			--$many;
		}
	}
	echo $img;
	
}

function  information_li($form,$many){
	$dao=open_form_id_daoxu($form);
	$li="";
	while($row=mysql_fetch_array($dao)){
		if($many>0){
			//判断content字符串长度
			$li.="<li><a href='information/information_detail.php?form=";
			$li.=$form."&id=".$row["id"]."' target='_blank' >";
			$get_row=substr_cut($row["content"],65);
			$li.=$get_row;
			$li.="</a></li>";
			--$many;
		}
	}
	echo $li;
}	

function  gonggao_li($form,$many){
	$dao=open_form_id_daoxu($form);
	$li="<ul>";
	while($row=mysql_fetch_array($dao)){
		if($many>0){
			//判断content字符串长度
			$li.="<li><a href='information/information_detail.php?form=";
			$li.=$form."&id=".$row["id"]."' target='_blank' >";
			$li.="<span class='span1'>";
			$get_row=substr_cut($row["content"],35);
			$li.=$get_row;
			$li.="</span>";
			$li.="</a></li>";
			--$many;
		}
	}
	$li.="</ul>";
	echo $li;
}	
//---------------------资讯end--------------------------------

//---------------------知识库star--------------------------------
function  knowledge_li($form,$many){
	$dao=open_form_id_daoxu($form);
	$li="<ul>";
	while($row=mysql_fetch_array($dao)){
		if($many>0){
			//判断content字符串长度
			$li.="<li><a href='information/information_detail.php?form=";
			$li.=$form."&id=".$row["id"]."' target='_blank' >";
			$get_title=substr_cut($row["content"],65);
			$li.=$get_title;
			$li.="</a></li>";
			--$many;
		}
	}
	$li.="</ul>";
	echo $li;
}	

function  service_li($form,$many){
	$dao=open_form_id_daoxu($form);
	$li="<ul>";
	while($row=mysql_fetch_array($dao)){
		if($many>0){
			//判断content字符串长度
			$li.="<li><a href='information/information_detail.php?form=";
			$li.=$form."&id=".$row["id"]."' target='_blank' >";
			$get_title=substr_cut($row["content"],65);
			$li.=$get_title;
			$li.="</a></li>";
			--$many;
		}
	}
	$li.="</ul>";
	echo $li;
}	
//---------------------知识库end--------------------------------





//-----------------------资源------------------------------
//创建li标签-market
function ziyuan_li($form,$star,$many){
	$result=open_form($form,$star,$many);
	$li="";
	while($row=mysql_fetch_array($result)){
		$img_array=explode("|",$row["picture"]);
		$img_many=count($img_array);
		
		$base_array=explode("|",$row["base"]);
		$base_many=count($base_array);
		
			$li.="<li><a href='ziyuan/ziyuan_detail?form=ziyuan&id=";
			$li.=$row["id"]."' target='_blank' class='a1'>";
			$li.="<img src='ziyuan/picture/".$row["number"]."/".$img_array[0]."'>";
			$li.="</a>";
		
			$li.="<p class='p1'><a href='ziyuan/ziyuan_detail?form=ziyuan&id=";
			$li.=$row["id"]."' target='_blank'>";
			$get_row=substr_cut2($row["title"],20);
			$li.=$get_row;
			$li.="</a></p>";
		
			$li.="<p class='p2'>特征特性：";
			$get_row=substr_cut($base_array[5],100);
			$li.=$get_row;
			$li.="</p>";
		
			$li.="<a href='ziyuan/ziyuan_detail?form=ziyuan&id=";
			$li.=$row["id"]."' target='_blank'  class='a2'>";
			$li.="详情</a>";
			$li.="</li>";
	}
	echo $li;
}

/*资源概括*/
function  general_li($form,$many){
	$dao=open_form_id_daoxu($form);
	$li="<ul>";
	while($row=mysql_fetch_array($dao)){
		if($many>0){
			//判断content字符串长度
			$li.="<li><a href='general/general_detail.php?form=";
			$li.=$form."&id=".$row["id"]."' target='_blank' >";
			$get_title=substr_cut($row["content"],65);
			$li.=$get_title;
			$li.="</a></li>";
			--$many;
		}
	}
	$li.="</ul>";
	echo $li;
}	
function  xiazai_li($form,$many){
	$dao=open_form_id_daoxu($form);
	$li="<ul>";
	while($row=mysql_fetch_array($dao)){
		if($many>0){
			//判断content字符串长度
			$li.="<li><a href='xiazai/xiazai_detail.php?form=";
			$li.=$form."&id=".$row["id"]."' target='_blank' >";
			$li.="<span class='span1'>";
			$get_title=substr_cut($row["title"],32);
			$li.=$get_title;
			$li.="</span>";
			$li.="<span class='span2'>";
			$get_time=substr_cut($row["time"],20);
			$li.=$get_time;
			$li.="</span>";
			$li.="</a></li>";
			--$many;
		}
	}
	$li.="</ul>";
	echo $li;
}	

function  xiazai_ziliao($form,$many){
	$dao=open_form_id_daoxu($form);
	$li.="";
	while($row=mysql_fetch_array($dao)){
		if($many>3){
			if($many==6)$li.="<ul>";
			$li.="<li><a href='xiazai/xiazai_detail.php?form=";
			$li.=$form."&id=".$row["id"]."' target='_blank' >";
			$get_title=substr_cut($row["title"],40);
			$li.=$get_title;
			$li.="</a></li>";
			if($many==4)$li.="</ul>";
			--$many;
		}
		else if($many>0&&$many<=3){
			if($many==3)$li.="<ul>";
			$li.="<li><a href='xiazai/xiazai_detail.php?form=";
			$li.=$form."&id=".$row["id"]."' target='_blank' >";
			$get_title=substr_cut($row["title"],40);
			$li.=$get_title;
			$li.="</a></li>";
			if($many==1)$li.="</ul>";
			--$many;
		}
	}
	echo $li;
}	
//-----------------------------------------------------


//-----------------------------------------------------
//创建a-img标签-图片库
function picture_img($form,$star,$many){
	 $result=open_form($form,$star,$many);
	 $img="<ul>";
	 while($row=mysql_fetch_array($result)){
		$img_array=explode("|",$row["picture"]);
	
		$img.="<li><a href='picture/picture_detail.php?form=".$form."&id=".$row["id"];
		$img.="' target='_black'>";
		$img.="<img src='picture/picture/".$row["picture_title"]."/".$img_array[0];
		$img.="'/>";
		$img.="<p>";
		 //判断字符串长度
		$get_row=substr_cut($row["title"],36);
		$img.=$get_row;
		$img.="</p></a></li>";
	 }
	$img.="</ul>";
	echo $img;
}

?>
























