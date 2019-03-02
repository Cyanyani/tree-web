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

//由界面传过来的search参数
	if(!isset($_GET["search"])){
		$search="";
	}
	else if($_GET["search"]==""){
		$search="";
	}
	else{
		$search=$_GET["search"];
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
	$div.="<span>".$row["title"]."</span></div>";
	$div.="<div class='background'></div></div>";
	echo $div;			
}
//------------分页--------------
function banner($count,$page){
		//获取总数据
		$total=$count;
		$showPage=8;

		//计算共有多少页
	
		$total_pages=ceil($total/$showPage);
		//计算偏移量
		$pageOffset=($showPage-1)/2;
		//初始数据定义
		$page_banner="<div class='banner'>";
		$kaishi=1;
		$end=$total_pages;
		//显示banner
		if($page>1){
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$form}&page=1'>首页</a>";
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$form}&page=".($page-1)."'>上一页</a>";
		}
		else{
			$page_banner.="<span class='disable'>首页</span>";
			$page_banner.="<span class='disable'>上一页</span>";
		}
		if($total_pages>$showPage){
			if($page>$pageOffset+1){
				$page_banner.="...";	
			}
			//-------------------------------------------
			if($page>$pageOffset){
				$kaishi=$page-$pageOffset;
				$end=$total_pages>($page+$pageOffset)?($page+$pageOffset):$total_pages;
			}
			else{
				$kaishi=1;
				$end=$total_pages>$showPage?$showPage:$total_pages;
			}
			if($page+$pageOffset>$total_pages){
				$kaishi=$kaishi-($page+$pageOffset-$end);
			}
		}
		//-------显示分页条
		for($i=$kaishi;$i<=$end;$i++){
			if($page==$i){
				$page_banner.="<span class='current'>{$i}</span>";
			}
			else{
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$form}&page=".$i."'>{$i}</a>";
			}
		}
		//-------------------------------------------
		if($total_pages>$showPage&&$total_pages>($page+$pageOffset)){
			$page_banner.="...";	
		}
		if($page<$total_pages){
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$form}&page=".($page+1)."'>下一页</a>";
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$form}&page=".$total_pages."'>尾页</a>";
		}
		else{
			$page_banner.="<span class='disable'>下一页</span>";
			$page_banner.="<span class='disable'>尾页</span>";
		}
		//-------------------------------------------

		//-------------------------------------------
		$page_banner.="<form action='".$_SERVER['PHP_SELF']."' method='get'>";
		$page_banner.="共".$total_pages."页/".$total."个，";
		$page_banner.="<input type='hidden' name='form' value='{$form}'>";
		$page_banner.="跳到第<input class='in1' type='text' size='2' name='page'>页";
		$page_banner.="<input class='in2' type='submit' value='确定' />";
		$page_banner.="</form>";
		$page_banner.="</div>";
		echo $page_banner; 
}


function count_form_all($form){
	$total_sql="SELECT COUNT(*) FROM `$form`";
	$result=mysql_query($total_sql,$GLOBALS['conn'] )or die("error connecting"); //查询
	$result1=mysql_fetch_array($result);
	$count=$result1[0];
	return $count;
}
//-----------------------------------------------------
//定义information-div-p标签-资讯
function detail($form,$id,$page){
	$result=open_form_id($form,$id);
	$row=mysql_fetch_array($result);
	//点击量
	$hit=$row["hit"]+1;
	$update="UPDATE `$form` SET `hit` = '$hit' WHERE `$form`.`id` = $id";
	mysql_query($update);
	
	//安装/打断
	//文字段落
	$huzhao_array=explode("|",$row["huzhao"]);
	$huzhao_many=count($huzhao_array);
	
	$base_array=explode("|",$row["base"]);
	$base_many=count($base_array);
	
	$share_array=explode("|",$row["share"]);
	$share_many=count($share_array);
	
	$other_array=explode("|",$row["other"]);
	$other_many=count($other_array);
	//图片数量
	$img_array=explode("|",$row["picture"]);
	$img_many=count($img_array);
	
	$div.="<p class='content_title'>".$row["title"]."</p>";
	//huzho
	$div.="<div class='huzhao'>";
	$div.="<div class='tit_background'></div>";
		$div.="<div class='row'>";
			$div.="<div class='line'><span class='span1'>平台资源号</span><span class='span2'>".$row["number"]."</span></div>";
			$div.="<div class='line'><span class='span1'>资源编号</span><span class='span2'>".$row["bianhao"]."</span></div>";
			$div.="<div class='line'><span class='span1'>种质名称</span><span class='span2'>".$row["title"]."</span></div>";
		$div.="</div>";
		$div.="<div class='row'>";
			$div.="<div class='line'><span class='span1'>科名</span><span class='span2'>".$huzhao_array[0]."</span></div>";
			$div.="<div class='line'><span class='span1'>科拉丁名</span><span class='span2'>".$huzhao_array[1]."</span></div>";
			$div.="<div class='line'><span class='span1'>属拉丁名</span><span class='span2'>".$huzhao_array[2]."</span></div>";
		$div.="</div>";
		$div.="<div class='row'>";
			$div.="<div class='line'><span class='span1'>属名</span><span class='span2'>".$huzhao_array[3]."</span></div>";
			$div.="<div class='line'><span class='span1'>种名或亚种名</span><span class='span2'>".$huzhao_array[4]."</span></div>";
			$div.="<div class='line'><span class='span1'>种拉丁名</span><span class='span2'>".$huzhao_array[5]."</span></div>";
		$div.="</div>";
	$div.="<div class='row'>";
			$div.="<div class='line'><span class='span1'>原产地</span><span class='span2'>".$huzhao_array[6]."</span></div>";
			$div.="<div class='line'><span class='span1'>省</span><span class='span2'>".$huzhao_array[7]."</span></div>";
			$div.="<div class='line'><span class='span1'>来源地</span><span class='span2'>".$huzhao_array[8]."</span></div>";
		$div.="</div>";
	$div.="<div class='row'>";
			$div.="<div class='line'><span class='span1'>国家</span><span class='span2'>".$huzhao_array[9]."</span></div>";
			$div.="<div class='line'><span class='span1'>归类编码</span><span class='span2'>".$huzhao_array[10]."</span></div>";
			$div.="<div class='line'><span class='span1'>资源类型</span><span class='span2'>".$huzhao_array[11]."</span></div>";
		$div.="</div>";
	$div.="<div style='clear:both;'></div>";
	$div.="</div>";
	
	//img
	$div.="<div class='img'>";
	$div.="<div class='tit_background'><div class='img_more'><a href='ziyuan_picture.php?id=".$id."&page=".$page."'>更多图片</a></div></div>";
	for($img_i=0;$img_i<4;$img_i++){
		$div.="<img src='picture/".$row["number"]."/".$img_array[$img_i]."' />";
	}
	$div.="</div>";
	
	
	//base
	$div.="<div class='base'>";
	$div.="<div class='tit_background'></div>";
		$div.="<div class='row'>";
			$div.="<div class='line'><span class='span1'>主要特性</span><span class='span2'>".$base_array[0]."</span></div>";
			$div.="<div class='line'><span class='span1'>主要用途</span><span class='span2'>".$base_array[1]."</span></div>";
			$div.="<div class='line'><span class='span1'>气候带</span><span class='span2'>".$base_array[2]."</span></div>";
		$div.="</div>";
		$div.="<div class='row'>";
			$div.="<div class='line_1'><span class='span1'>生长习性</span><span class='span2'>".$base_array[3]."</span></div>";
		$div.="</div>";
		$div.="<div class='row'>";
			$div.="<div class='line_1'><span class='span1'>开花节实特性</span><span class='span2'>".$base_array[4]."</span></div>";
		$div.="</div>";
	$div.="<div class='row'>";
			$div.="<div class='line_1'><span class='span1'>特性特征</span><span class='span2'>".$base_array[5]."</span></div>";
		$div.="</div>";
	$div.="<div class='row'>";
			$div.="<div class='line'><span class='span1'>具体用途</span><span class='span2'>".$base_array[6]."</span></div>";
			$div.="<div class='line'><span class='span1'>观测地点</span><span class='span2'>".$base_array[7]."</span></div>";
			$div.="<div class='line'><span class='span1'>繁殖方式</span><span class='span2'>".$base_array[8]."</span></div>";
		$div.="</div>";
	$div.="<div class='row'>";
			$div.="<div class='line'><span class='span1'>保存单位</span><span class='span2'>".$base_array[9]."</span></div>";
			$div.="<div class='line'><span class='span1'>单位编号</span><span class='span2'>".$base_array[10]."</span></div>";
			$div.="<div class='line'><span class='span1'>保存材料类型</span><span class='span2'>".$base_array[11]."</span></div>";
		$div.="</div>";
	$div.="<div class='row'>";
			$div.="<div class='line'><span class='span1'>保存方式</span><span class='span2'>".$base_array[12]."</span></div>";
			$div.="<div class='line'><span class='span1'>保存时间</span><span class='span2'>".$base_array[13]."</span></div>";
			$div.="<div class='line'><span class='span1'>实物状态</span><span class='span2'>".$base_array[14]."</span></div>";
		$div.="</div>";
	$div.="<div style='clear:both;'></div>";
	$div.="</div>";
	
	
	//share
	$div.="<div class='share'>";
	$div.="<div class='tit_background'></div>";
		$div.="<div class='row'>";
			$div.="<div class='line'><span class='span1'>共享方式</span><span class='span2'>".$share_array[0]."</span></div>";
			$div.="<div class='line'><span class='span1'>获取途径</span><span class='span2'>".$share_array[1]."</span></div>";
		$div.="</div>";
		$div.="<div class='row'>";
			$div.="<div class='line_1'><span class='span1'>联系方式</span><span class='span2'>".$share_array[2]."</span></div>";
		$div.="</div>";
	$div.="<div style='clear:both;'></div>";
	$div.="</div>";
	
	//other
	$div.="<div class='other'>";
	$div.="<div class='tit_background'></div>";
		$div.="<div class='row'>";
			$div.="<div class='line_1'><span class='span1'>联项目及编号</span><span class='span2'>".$other_array[0]."</span></div>";
		$div.="</div>";
	$div.="<div style='clear:both;'></div>";
	$div.="</div>";
	
	
echo $div;
	
	
	

}

function ziyuan_6($form,$id,$page){
	$result=open_form_id($form,$id);
	$row=mysql_fetch_array($result);
	//ziyuan
	$div.="<div class='ziyuan'>";
	$div.="<div class='tit_background'></div>";
	if($row["leixing"]||$row["shuming"]||$row["title"]){
		$count=0;
		$i=0;
		$star=($page-1)*8;
		$end=($page)*8;
		//搜索数据
		if($row["leixing"]){
			$search=$row["leixing"];
		}
		else if($row["shuming"]){
			$search=$row["shuming"];
		}
		else if($row["title"]){
			$search=$row["title"];
		}
		$search_data=search_form_ziyuan($form,$search);
		$div.="<table border='0' cellspacing='0'>";
		$div.="<tr class='tr1' bgcolor='#ffffff'>
					<td class='td_title'>种质名称</td>
					<td class='td_leixing'>种名或亚种名</td>
					<td class='td_english'>科拉丁名</td>
					<td class='td_usefor'>主要用途</td>
					<td class='td_danwei'>保存单位</td>
					<td class='td_chakan'>详情</td>
		</tr>";
		while($row=mysql_fetch_array($search_data)){
			++$count;
			if($star<=$i&&$i<$end){
				if($star<$end){
					++$star;
					//判断字符串长度
					$get_row_title=substr_cut($row["title"],15);
					$get_row_leixing=substr_cut($row["leixing"],15);
					$get_row_english=substr_cut($row["english"],15);
					$get_row_usefor=substr_cut($row["usefor"],15);
					$get_row_danwei=substr_cut($row["danwei"],15);
					$div.="<tr ".$hei.">
						<td>".$get_row_title."</td>
						<td>".$get_row_leixing."</td>
						<td>".$get_row_english."</td>
						<td>".$get_row_usefor."</td>
						<td>".$get_row_danwei."</td>
						<td><a href='ziyuan_detail.php?form=".$form."&id=".$row["id"]."&page=".$page."' target='_black'>查看</a></td>";
					$div.="</tr>";
					if($hei=="bgcolor='#f5f5f5'"){
						$hei="";
					}
					else{
						$hei="bgcolor='#f5f5f5'";
					}	
				}
			}
			++$i;
		
		}
		$div.="</table>";
		$div.="</div>";
		echo $div;	
		banner($count,$page);
	}
}
?>