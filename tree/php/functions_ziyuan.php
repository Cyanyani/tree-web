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
function titile($form){
	$div="<div class='title'>";
	$div.="<div class='nav'>";
	$div.="<span>您当前的位置是:</span>";
	$div.="<a href='../index.php' target='_blank'>首页></a>";
	switch($form){
			case "xiazai-gonggao":$div.="<a href='xiazai.php?form=xiazai-gonggao'>相关公告</a></div>";break;
			case "xiazai-ziliao":$div.="<a href='xiazai.php?form=xiazai-ziliao'>相关资料</a></div>";break;
			case "xiazai-qikan":$div.="<a href='xiazai.php?form=xiazai-qikan'>电子期刊</a></div>";break;
			
			default:$div.="<a href='xiazai.php?form=xiazai-gonggao' >相关公告</a></div>";break;
		}
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
//-------------------------------------------------------------------
//陈列ziyuan 模块
function ziyuan($form,$page,$search){
	if(!$search){
			$count=count_form_all($form);
			$star=($page-1)*8;
			$hei="bgcolor='#ffffff'";
			$result=open_form($form,$star,8);
			$li="<table border='0' cellspacing='0'>";
				$li.="<tr class='tr1' bgcolor='#ffffff'>
					<td class='td_title'>种质名称</td>
					<td class='td_leixing'>种名或亚种名</td>
					<td class='td_english'>科拉丁名</td>
					<td class='td_usefor'>主要用途</td>
					<td class='td_danwei'>保存单位</td>
					<td class='td_chakan'>详情</td>
				</tr>";
				while($row=mysql_fetch_array($result)){
					//判断字符串长度
					$get_row_title=substr_cut($row["title"],15);
					$get_row_leixing=substr_cut($row["leixing"],15);
					$get_row_english=substr_cut($row["english"],15);
					$get_row_usefor=substr_cut($row["usefor"],15);
					$get_row_danwei=substr_cut($row["danwei"],15);
					$li.="<tr ".$hei.">
						<td>".$get_row_title."</td>
						<td>".$get_row_leixing."</td>
						<td>".$get_row_english."</td>
						<td>".$get_row_usefor."</td>
						<td>".$get_row_danwei."</td>
						<td><a href='ziyuan_detail.php?form=".$form."&id=".$row["id"]."&page=".$page."'>查看</a></td>";
					$li.="</tr>";
					if($hei=="bgcolor='#f5f5f5'"){
						$hei="";
					}
					else{
						$hei="bgcolor='#f5f5f5'";
					}
				}
			$li.="</table>";
			echo $li;
			banner($count,$page);
	}
	else if($search){
		$count=0;
		$i=0;
		$star=($page-1)*8;
		$end=($page)*8;
		//搜索数据
		$search_data=search_form_ziyuan($form,$search);

		$li="<table border='0' cellspacing='0'>";
		$li.="<tr class='tr1' bgcolor='#ffffff'>
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
					$li.="<tr ".$hei.">
						<td>".$get_row_title."</td>
						<td>".$get_row_leixing."</td>
						<td>".$get_row_english."</td>
						<td>".$get_row_usefor."</td>
						<td>".$get_row_danwei."</td>
						<td><a href='ziyuan_detail.php?form=".$form."&id=".$row["id"]."&page=".$page."'>查看</a></td>";
					$li.="</tr>";
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
		$li.="</table>";
		$li_copy="<table border='0' cellspacing='0'><tr class='tr1' bgcolor='#ffffff'>
					<td class='td_title'>种质名称</td>
					<td class='td_leixing'>种名或亚种名</td>
					<td class='td_english'>科拉丁名</td>
					<td class='td_usefor'>主要用途</td>
					<td class='td_danwei'>保存单位</td>
					<td class='td_chakan'>详情</td>
		</tr></table>";
		if($li==$li_copy){
			$li.="<div style='margin-top:20px;text-align:center;' ><a>对不起！在该<span style='position:static; font-size:16px;margin:0px 10px;background:#2ea760;border-radius:5px;color:#ffffff;'>种质资源</span>标签下没有找到相关信息。请修改搜索内容，重新搜索!</a></div>";
		}
		echo $li;
		banner($count,$page);
	}
	
}
?>