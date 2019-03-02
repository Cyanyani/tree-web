<?php 
	include("open.php");
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
		$form=$sql_information_gonggao;
	}
	else if($_GET["form"]==""){
		$form=$sql_information_gonggao;
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


//-----------------------------------------------------
//内容导航
function nei_nav($module,$form){
	switch($module){
		case "information":$nav="<span>资讯信息></span>";break;
		case "service":$nav="<span>服务动态></span>";break;
		case "knowledge":$nav="<span>知识库></span>";break;
		case "picture":$nav="<span>图片库></span>";break;
		case "general":$nav="<span>资源概况></span>";break;
		case "ziyuan":$nav="<span>种质资源></span>";break;
		case "xiazai":$nav="<span>资料共享></span>";break;
		default:$nav="";break;
	}
		switch($form){
			case "information-gonggao":$nav.="<span>通知公告</span>";break;
			case "information-new":$nav.="<span>行业动态</span>";break;
			case "information-falv":$nav.="<span>法律法规</span>";break;
			//-------------------------------------------------------------------
			case "service-anli":$nav.="<span>服务案例</span>";break;
			//-------------------------------------------------------------------
			case "knowledge-baike":$nav.="<span>百科知识</span>";break;
			case "knowledge-yinzhong":$nav.="<span>育种专题</span>";break;
			case "knowledge-yuzhong":$nav.="<span>引种驯化</span>";break;
				//-------------------------------------------------------------------	
			case "general-introduce":$nav.="<span>资源介绍</span>";break;
			case "general-jishu":$nav.="<span>技术支持</span>";break;
			case "general-laingpin":$nav.="<span>良种介绍</span>";break;
	//------------------------------------------------------------------
			case "ziyuan":$nav.="<span>种质资源推荐</span>";break;
	//------------------------------------------------------------------								
 			case "xiazai-gonggao":$nav.="<span>相关公告</span>";break;
			case "xiazai-ziliao":$nav.="<span>相关资料</span>";break;
			case "xiazai-qikan":$nav.="<span>电子期刊</span>";break;
			default:$nav.="";break;
		}
	echo $nav;		
}
//-------------------------------------------------------------------
//--分页条------------------------------------------------------------
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
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=1&module={$_GET["module"]}'>首页</a>";
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=".($page-1)."
			&module={$_GET["module"]}'>上一页</a>";
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
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=".$i."&module={$_GET["module"]}'>{$i}</a>";
			}
		}
		//-------------------------------------------
		if($total_pages>$showPage&&$total_pages>($page+$pageOffset)){
			$page_banner.="...";	
		}
		if($page<$total_pages){
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=".($page+1)."
			&module={$_GET["module"]}'>下一页</a>";
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=".$total_pages."
			&module={$_GET["module"]}'>尾页</a>";
		}
		else{
			$page_banner.="<span class='disable'>下一页</span>";
			$page_banner.="<span class='disable'>尾页</span>";
		}
		//-------------------------------------------

		//-------------------------------------------
		$page_banner.="<form action='".$_SERVER['PHP_SELF']."' method='get'>";
		$page_banner.="共".$total_pages."页/".$total."个，";
		$page_banner.="<input type='hidden' name='form' value='{$_GET["form"]}'>";
		$page_banner.="跳到第<input class='in1' type='text' size='2' name='page'>页";
		$page_banner.="<input class='in2' type='submit' value='确定' />";
		$page_banner.="<input class='in2' type='hidden' name='module' value='{$_GET["module"]}' />";
		$page_banner.="</form>";
		$page_banner.="</div>";
		echo $page_banner; 
}



//-------------------------------------------------------------------
//陈列information 模块
function information($form,$page,$module){
	$count=count_form_all($form);
	$star=($page-1)*8;
	$hei="bgcolor='#dfdfdf'";
	$result=open_form($form,$star,8);
	$li="<table border='0' cellspacing='0'>";
		$li.="<tr class='tr1' bgcolor='#594b48'>
			<td class='td_id'>id</td>
			<td class='td_title'>title</td>
			<td class='td_content'>content</td>
			<td class='td_author'>author</td>
			<td class='td_laiyuan'>laiyuan</td>
			<td class='td_time'>time</td>
			<td class='td_picture'>picture</td>
			<td class='td_caozuo'>操作</td>
			<td class='td_view'>审核</td>
		</tr>";
		while($row=mysql_fetch_array($result)){
			//判断字符串长度
			$get_row_content=substr_cut($row["content"],35);
			$get_row_title=substr_cut($row["title"],15);
			$li.="<tr ".$hei.">
				<td>".$row["id"]."</td>
				<td>".$get_row_title."</td>
				<td>".$get_row_content."</td>
				<td>".$row["author"]."</td>
				<td>".$row["laiyuan"]."</td>
				<td>".$row["time"]."</td>
				<td>".$row["picture"]."</td>
				<td><a class='shanchu' href='shanchu.php?form=".$form."&id=".$row["id"]."' >删除</a><a href='houtai_detail?form=".$form."&id=".$row["id"]."&module=".$module."&page=".$page."'>修改</a></td>";
				if($row["view"]==1){
					$li.="<td class='view_1'>通过</td>";
				}
				else{
					$li.="<td class='view_2'>未审核</td>";
				}
			$li.="</tr>";
			if($hei=="bgcolor='#dfdfdf'"){
				$hei="";
			}
			else{
				$hei="bgcolor='#dfdfdf'";
			}
		}
	$li.="</table>";
	echo $li;
	banner($count,$page);
}


//-------------------------------------------------------------------
//陈列zhengce 模块
function zhengce($form,$page,$module){
	$count=count_form_all($form);
	$star=($page-1)*8;
	$hei="bgcolor='#dfdfdf'";
	$result=open_form($form,$star,8);
	$li="<table border='0' cellspacing='0'>";
		$li.="<tr class='tr1' bgcolor='#594b48'>
			<td class='td_id'>id</td>
			<td class='td_title'>title</td>
			<td class='td_content'>content</td>
			<td class='td_time'>time</td>
			<td class='td_picture'>picture</td>
			<td class='td_caozuo'>操作</td>
			<td class='td_view'>审核</td>
		</tr>";
		while($row=mysql_fetch_array($result)){
			//判断字符串长度
			$get_row_content=substr_cut($row["content"],35);
			$get_row_title=substr_cut($row["title"],15);
			$li.="<tr ".$hei.">
				<td>".$row["id"]."</td>
				<td>".$get_row_title."</td>
				<td>".$get_row_content."</td>
				<td>".$row["time"]."</td>
				<td>".$row["picture"]."</td>
				<td><a class='shanchu' href='shanchu.php?form=".$form."&id=".$row["id"]."'>删除</a><a href='houtai_detail?form=".$form."&id=".$row["id"]."&module=".$module."&page=".$page."'>修改</a></td>";
				if($row["view"]==1){
					$li.="<td class='view_1'>通过</td>";
				}
				else{
					$li.="<td class='view_2'>未审核</td>";
				}
			$li.="</tr>";
			if($hei=="bgcolor='#dfdfdf'"){
				$hei="";
			}
			else{
				$hei="bgcolor='#dfdfdf'";
			}
		}
	$li.="</table>";
	echo $li;
	banner($count,$page);
}

///-------------------------------------------------------------------
//陈列ziyuan模块
function ziyuan($form,$page,$module){
	$count=count_form_all($form);
	$star=($page-1)*8;
	$hei="bgcolor='#dfdfdf'";
	$result=open_form($form,$star,8);
	
	switch($form){
		case "ziyuan":$nav=1;break;
		default:$nav=0;break;
	}
	if($nav==1){
			$li="<table border='0' cellspacing='0'>";
				$li.="<tr class='tr1' bgcolor='#594b48'>
					<td class='td_id'>id</td>
					<td class='td_title'>name</td>
					<td class='td_content'>canshu</td>
					<td class='td_content1'>chanping</td>
					<td class='td_content'>zhuyi</td>
					<td class='td_time'>time</td>
					<td class='td_picture'>picture</td>
					<td class='td_caozuo'>操作</td>
					<td class='td_view'>审核</td>
				</tr>";
				while($row=mysql_fetch_array($result)){
					//判断字符串长度
					$get_row_canshu=substr_cut($row["canshu"],30);
					$get_row_chanping=substr_cut($row["chanping"],70);
					$get_row_zhuyi=substr_cut($row["zhuyi"],30);
					$li.="<tr ".$hei.">
						<td>".$row["id"]."</td>
						<td>".$row["name"]."</td>
						<td>".$get_row_canshu."</td>
						<td>".$get_row_chanping."</td>
						<td>".$get_row_zhuyi."</td>
						<td>".$row["time"]."</td>
						<td>".$row["picture"]."</td>
						<td><a class='shanchu' href='shanchu.php?form=".$form."&id=".$row["id"]."' >删除</a><a href='houtai_detail?form=".$form."&id=".$row["id"]."&module=".$module."&page=".$page."'>修改</a></td>";
						if($row["view"]==1){
							$li.="<td class='view_1'>通过</td>";
						}
						else{
							$li.="<td class='view_2'>未审核</td>";
						}
					$li.="</tr>";
					if($hei=="bgcolor='#dfdfdf'"){
						$hei="";
					}
					else{
						$hei="bgcolor='#dfdfdf'";
					}
				}
			$li.="</table>";
			echo $li;
			banner($count,$page);
	}
	else{
			$li="<table border='0' cellspacing='0'>";
				$li.="<tr class='tr1' bgcolor='#594b48'>
					<td class='td_id'>id</td>
					<td class='td_title'>name</td>
					<td class='td_content'>canshu</td>
					<td class='td_content1'>chanping</td>
					<td class='td_picture'>picture</td>
					<td class='td_caozuo'>操作</td>
					<td class='td_view'>审核</td>
				</tr>";
				while($row=mysql_fetch_array($result)){
					//判断字符串长度
					$get_row_canshu=substr_cut($row["canshu"],30);
					$get_row_chanping=substr_cut($row["chanping"],70);
					$li.="<tr ".$hei.">
						<td>".$row["id"]."</td>
						<td>".$row["name"]."</td>
						<td>".$get_row_canshu."</td>
						<td>".$get_row_chanping."</td>
						<td>".$row["picture"]."</td>
						<td><a class='shanchu' href='shanchu.php?form=".$form."&id=".$row["id"]."' >删除</a><a href='houtai_detail?form=".$form."&id=".$row["id"]."&module=".$module."&page=".$page."'>修改</a></td>";
						if($row["view"]==1){
							$li.="<td class='view_1'>通过</td>";
						}
						else{
							$li.="<td class='view_2'>未审核</td>";
						}
					$li.="</tr>";
					if($hei=="bgcolor='#dfdfdf'"){
						$hei="";
					}
					else{
						$hei="bgcolor='#dfdfdf'";
					}
				}
			$li.="</table>";
			echo $li;
			banner($count,$page);
	}
}

//陈列video模块
function video($form,$page,$module){
	$count=count_form_all($form);
	$star=($page-1)*8;
	$hei="bgcolor='#dfdfdf'";
	$result=open_form($form,$star,8);
	$li="<table border='0' cellspacing='0'>";
		$li.="<tr class='tr1' bgcolor='#594b48'>
			<td class='td_id'>id</td>
			<td class='td_title'>title</td>
			<td class='td_content1'>content</td>
			<td class='td_picture'>picture</td>
			<td class='td_laiyuan'>video</td>
			<td class='td_caozuo'>操作</td>
			<td class='td_view'>审核</td>
		</tr>";
		while($row=mysql_fetch_array($result)){
			//判断字符串长度
			$get_row_content=substr_cut($row["content"],70);
			$get_row_title=substr_cut($row["title"],15);
			$li.="<tr ".$hei.">
				<td>".$row["id"]."</td>
				<td>".$get_row_title."</td>
				<td>".$get_row_content."</td>
				<td>".$row["picture"]."</td>
				<td>".$row["video"]."</td>
				<td><a class='shanchu' href='shanchu.php?form=".$form."&id=".$row["id"]."' >删除</a><a href='houtai_detail?form=".$form."&id=".$row["id"]."&module=".$module."&page=".$page."'>修改</a></td>";
				if($row["view"]==1){
					$li.="<td class='view_1'>通过</td>";
				}
				else{
					$li.="<td class='view_2'>未审核</td>";
				}
			$li.="</tr>";
			if($hei=="bgcolor='#dfdfdf'"){
				$hei="";
			}
			else{
				$hei="bgcolor='#dfdfdf'";
			}
		}
	$li.="</table>";
	echo $li;
	banner($count,$page);
}
//-------------------------------------------------------------------
//陈列teach模块
function teach($form,$page,$module){
	$count=count_form_all($form);
	$star=($page-1)*8;
	$hei="bgcolor='#dfdfdf'";
	$result=open_form($form,$star,8);
	$li="<table border='0' cellspacing='0'>";
		$li.="<tr class='tr1' bgcolor='#594b48'>
			<td class='td_id'>id</td>
			<td class='td_title'>name</td>
			<td class='td_content'>chapter</td>
			<td class='td_content1'>content</td>
			<td class='td_picture'>picture</td>
			<td class='td_laiyuan'>video</td>
			<td class='td_caozuo'>操作</td>
			<td class='td_view'>审核</td>
		</tr>";
		while($row=mysql_fetch_array($result)){
			//判断字符串长度
			$get_row_content=substr_cut($row["content"],70);
			$get_row_chapter=substr_cut($row["chapter"],30);
			$get_row_title=substr_cut($row["title"],15);
			$li.="<tr ".$hei.">
				<td>".$row["id"]."</td>
				<td>".$get_row_title."</td>
				<td>".$get_row_chapter."</td>
				<td>".$get_row_content."</td>
				<td>".$row["picture"]."</td>
				<td>".$row["video"]."</td>
				<td><a class='shanchu' href='shanchu.php?form=".$form."&id=".$row["id"]."' >删除</a><a href='houtai_detail?form=".$form."&id=".$row["id"]."&module=".$module."&page=".$page."'>修改</a></td>";
				if($row["view"]==1){
					$li.="<td class='view_1'>通过</td>";
				}
				else{
					$li.="<td class='view_2'>未审核</td>";
				}
			$li.="</tr>";
			if($hei=="bgcolor='#dfdfdf'"){
				$hei="";
			}
			else{
				$hei="bgcolor='#dfdfdf'";
			}
		}
	$li.="</table>";
	echo $li;
	banner($count,$page);
}
//陈列xiazai模块
function xiazai($form,$page,$module){
	$count=count_form_all($form);
	$star=($page-1)*8;
	$hei="bgcolor='#dfdfdf'";
	$result=open_form($form,$star,8);
	$li="<table border='0' cellspacing='0'>";
		$li.="<tr class='tr1' bgcolor='#594b48'>
			<td class='td_id'>id</td>
			<td class='td_title'>title</td>
			<td class='td_content1'>fujian</td>
			<td class='td_author'>author</td>
			<td class='td_time'>time</td>
			<td class='td_picture'>picture</td>
			<td class='td_caozuo'>操作</td>
			<td class='td_view'>审核</td>
		</tr>";
		while($row=mysql_fetch_array($result)){
			//判断字符串长度
			$get_row_fujian=substr_cut($row["fujian"],70);
			$get_row_title=substr_cut($row["title"],15);
			$li.="<tr ".$hei.">
				<td>".$row["id"]."</td>
				<td>".$get_row_title."</td>
				<td>".$get_row_fujian."</td>
				<td>".$row["author"]."</td>
				<td>".$row["time"]."</td>
				<td>".$row["picture"]."</td>
				<td><a class='shanchu' href='shanchu.php?form=".$form."&id=".$row["id"]."' >删除</a><a href='houtai_detail?form=".$form."&id=".$row["id"]."&module=".$module."&page=".$page."'>修改</a></td>";
				if($row["view"]==1){
					$li.="<td class='view_1'>通过</td>";
				}
				else{
					$li.="<td class='view_2'>未审核</td>";
				}
			$li.="</tr>";
			if($hei=="bgcolor='#dfdfdf'"){
				$hei="";
			}
			else{
				$hei="bgcolor='#dfdfdf'";
			}
		}
	$li.="</table>";
	echo $li;
	banner($count,$page);
}
//-------------------------------------------------------------------
//总调用函数
function all_enty($form,$page,$module){
	switch($module){
		case "information":information($form,$page,$module);break;
		case "zhengce":zhengce($form,$page,$module);break;
		case "video":video($form,$page,$module);break;
		case "teach":teach($form,$page,$module);break;
		case "nongzi":nongzi($form,$page,$module);break;
		case "xiazai":xiazai($form,$page,$module);break;
		default:information($form,$page,$module);break;
	}
}
?>