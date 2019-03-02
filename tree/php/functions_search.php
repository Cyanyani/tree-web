<?php 
	include("open.php");
//参数处理
//-----------------------------------------------------
//由界面传过来的module参数
	if(!isset($_GET["module"])){
		$module="";
	}
	else if($_GET["module"]==""){
		$module="";
	}
	else{
		$module=$_GET["module"];
	}
//由界面传过来的form参数
	if(!isset($_GET["form"])){
		$form='';
	}
	else if($_GET["form"]==""){
		$form='';
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
//由界面传过来的name参数
	if(!isset($_GET["name"])){
		$name="";
	}
	else if($_GET["name"]==""){
		$name="";
	}
	else{
		$name=$_GET["name"];
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
//内容导航
function nei_nav($module,$form,$name){
	switch($module){
		case "information":$nav="<span>资讯></span>";break;
		case "zhengce":$nav="<span>服务></span>";break;
		case "video":$nav="<span>知识库></span>";break;
		case "teach":$nav="<span>图片库></span>";break;
		case "nongzi":$nav="<span>种质资源></span>";break;
		case "bing_chong":$nav="<span>资料共享></span>";break;
		default:$nav="";break;
	}
	
	switch($form){
			case "information-new":$nav.="<span>行业动态</span>";break;
			case "information-gonggao":$nav.="<span>通知公告</span>";break;
			case "information-falv":$nav.="<span>法律法规</span>";break;
			
			case "service-anli":$nav.="<span>服务案例</span>";break;
			
			case "knowledge-baike":$nav.="<span>百科知识</span>";break;
			case "knowledge-yuzhong":$nav.="<span>育种专题</span>";break;
			case "knowledge-yinzhong":$nav.="<span>引种驯化</span>";break;
			
			//-------------------------------------------------------------------
			case "picture":$nav.="<span>图片资源库</span>";break;
			
			case "ziyuan":$nav.="<span>种质资源库</span>";break;
			
			case "xiazai-gonggaoi":$nav.="<span>相关公告</span>";break;
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
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=1&module={$_GET["module"]}&search={$_GET["search"]}&name={$_GET["name"]}'>首页</a>";
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=".($page-1)."
			&module={$_GET["module"]}&search={$_GET["search"]}&name={$_GET["name"]}'>上一页</a>";
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
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=".$i."&module={$_GET["module"]}&search={$_GET["search"]}&name={$_GET["name"]}'>{$i}</a>";
			}
		}
		//-------------------------------------------
		if($total_pages>$showPage&&$total_pages>($page+$pageOffset)){
			$page_banner.="...";	
		}
		if($page<$total_pages){
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=".($page+1)."
			&module={$_GET["module"]}&search={$_GET["search"]}&name={$_GET["name"]}'>下一页</a>";
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=".$total_pages."
			&module={$_GET["module"]}&search={$_GET["search"]}&name={$_GET["name"]}'>尾页</a>";
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
		$page_banner.="<input class='in2' type='hidden' name='search' value='{$_GET["search"]}' />";
		$page_banner.="<input class='in2' type='hidden' name='name' value='{$_GET["name"]}' />";
		$page_banner.="</form>";
		$page_banner.="</div>";
		echo $page_banner; 
}



//-------------------------------------------------------------------
//陈列information -zhengce-video-teach模块
function information($form,$page,$module,$search){
	
	
	switch($module){
		case "information":$picture="information";break;
		case "zhengce":$picture="information";break;
		case "video":$picture="information";break;
		case "teach":$picture="picture";break;
		case "nongzi":$picture="ziyuan";break;
		case "bing_chong":$picture="xiazai";break;
		default:$picture="";break;
	}
	
	switch($form){
			case "information-new":$tip.="行业动态";break;
			case "information-gonggao":$tip.="通知公告";break;
			case "information-falv":$tip.="法律法规";break;
			
			case "service-anli":$tip.="服务案例";break;
			
			case "knowledge-baike":$tip.="百科知识";break;
			case "knowledge-yuzhong":$tip.="育种专题";break;
			case "knowledge-yinzhong":$tip.="引种驯化";break;
			
			//-------------------------------------------------------------------
			case "picture":$tip.="图片资源库";break;
			
			case "ziyuan":$tip.="种质资源库";break;
			
			case "xiazai-gonggaoi":$tip.="相关公告";break;
			case "xiazai-ziliao":$tip.="相关资料";break;
			case "xiazai-qikan":$tip.="电子期刊";break;
			
	
			default:$tip.="";break;
		}
	
	
	$count=0;
	$i=0;
	$star=($page-1)*8;
	$end=($page)*8;
	//搜索数据
	if($form=="ziyuan"){
		$search_data=search_form_ziyuan($form,$search);
	}
	else{
		$search_data=search_form_information($form,$search);
	}
	
	
	$li="<ul class='ul'>";
	if($search!=""){
		while($row=mysql_fetch_array($search_data)){
			++$count;
			if($star<=$i&&$i<$end){
				if($star<$end){
					++$star;

					$li.="<li><a href='".$picture."/".$picture."_detail.php?form=".$form."&id=";
					$li.=$row["id"];
					$li.="' target='_blank'>";
					//只有当有图片时才输出
					if($form=="ziyuan"){
						if($row["picture"]){
							$li.="<img src='./".$picture."/picture/".$row["number"]."/";
							$img_array=explode("|",$row["picture"]);
							$li.=$img_array[0];
							$li.="'/>";
						}
					}
					else if($form=="picture"){
						if($row["picture"]){
							$li.="<img src='./".$picture."/picture/".$row["picture_title"]."/";
							$img_array=explode("|",$row["picture"]);
							$li.=$img_array[0];
							$li.="'/>";
						}
						
					}
					else{
						if($row["picture"]){
							$li.="<img src='./".$picture."/";
							$li.=$row["picture"];
							$li.="'/>";
						}
					}
					
					$li.="</a>";
					//-----------------------------------------------------
					$li.="<a class='tit' href='".$picture."/".$picture."_detail.php?form=".$form."&id=".$row["id"];
					$li.="&page=".$_GET["page"];
					$li.="' target='_blank'>";
					//判断tite字符串长度
					$get_row=substr_cut($row["title"],60);
					$li.=$get_row;
					$li.="</a>";
					//-----------------------------------------------------
					$li.="<a class='cont' href='".$picture."/".$picture."_detail.php?form=".$form."&id=".$row["id"];
					$li.="&page=".$_GET["page"];
					$li.="' target='_blank'>";
					//判断content字符串长度
					$get_row=substr_cut($row["content"],100);
					$li.=$get_row;
					$li.="</a>";
					//-----------------------------------------------------
					$li.="<p class=\"time\">";
					$li.=$row["time"];
					$li.="</p>";
					
					$li.="<span>";
					$li.=$tip;
					$li.="</span>";
					
					//-----------------------------------------------------
					$li.="<p class=\"xian\">-----------------------------------------------------------------------------------------------------------------------------</p></li>";		
				}
			}
			++$i;
		
		}
	}
	if($li=="<ul class='ul'>")
		{
			$li.="<li style='margin-top:20px;text-align:center;' ><a>对不起！在该<span style='position:static; font-size:16px;margin:0px 10px'>".$tip."</span>标签下没有找到相关信息。请尝试在其他标签搜索，或者修改搜索内容</a></li>";
		}
	$li.="</ul>";
	echo $li;
	banner($count,$page);
}

//-------------------------------------------------------------------
//陈列nongzi模块
function nongzi($form,$page,$module,$search,$name){
	switch($name){
			case "nongyao":$tip="农药";break;
			case "huafei":$tip="化肥";break;
			case "zhongzi":$tip="种子";break;
			case "nongji":$tip="农机";break;
			//-------------------------------------------------------------------
			case "bing":$tip="病害";break;
			case "chong":$tip="虫害";break;
			//-------------------------------------------------------------------	
			default:$tip="农药";;break;
		}
	
	$count=0;
	$i=0;
	$star=($page-1)*8;
	$end=($page)*8;
	//搜索数据
	$li="<ul class='ul'>";
	if($search!=""){
		for($form_many=0;$form_many<4;++$form_many){
			switch($name){
				case "nongyao":switch($form_many){
						case 0:$form_name="nongzi-nongyao-shachongji";break;
						case 1:$form_name="nongzi-nongyao-shajunji";break;
						case 2:$form_name="nongzi-nongyao-chucaoji";break;
						case 3:$form_name="nongzi-nongyao-tiaojieji";break;
					default:$form_name="nongzi-nongyao-shachongji";break;};break;
					//------------------------------------------------------------------
					
				case "zhongzi":switch($form_many){
						case 0:$form_name="nongzi-zhongzi-datian";break;
						case 1:$form_name="nongzi-zhongzi-guaguo";break;
						case 2:$form_name="nongzi-zhongzi-shucai";break;
						case 3:$form_name="";break;
					default:$form_name="nongzi-zhongzi-datian";break;};break;
					//------------------------------------------------------------------
					
				case "huafei":switch($form_many){
						case 0:$form_name="nongzi-huafei-fuhe";break;
						case 1:$form_name="nongzi-huafei-shenwu";break;
						case 2:$form_name="nongzi-huafei-jia";break;
						case 3:$form_name="nongzi-huafei-youji";break;
					default:$form_name="nongzi-huafei-fuhe";break;};break;
					//------------------------------------------------------------------
					
				case "nongji":switch($form_many){
						case 0:$form_name="nongzi-jixie-yunshu";break;
						case 1:$form_name="nongzi-jixie-jiagong";break;
						case 2:$form_name="nongzi-jixie-caishou";break;
						case 3:$form_name="";break;
					default:$form_name="nongzi-jixie-yunshu";break;};break;
					//------------------------------------------------------------------
					
				case "bing":switch($form_many){
						case 0:$form_name="illness-guaguo";break;
						case 1:$form_name="illness-shucai";break;
						case 2:$form_name="illness-tree";break;
						case 3:$form_name="illness-datian";break;
					default:$form_name="illness-guaguo";break;};break;
					//------------------------------------------------------------------
					
				case "chong":switch($form_many){
						case 0:$form_name="wrom-guaguo";break;
						case 1:$form_name="wrom-shucai";break;
						case 2:$form_name="wrom-tree";break;
						case 3:$form_name="wrom-datian";break;
					default:$form_name="wrom-guaguo";break;};break;
					//------------------------------------------------------------------
					
				default:switch($form_many){
						case 0:$form_name="nongzi-nongyao-shachongji";break;
						case 1:$form_name="nongzi-nongyao-shajunji";break;
						case 2:$form_name="nongzi-nongyao-chucaoji";break;
						case 3:$form_name="nongzi-nongyao-tiaojieji";break;
					default:$form_name="nongzi-nongyao-shachongji";break;};break;	
			}
			if($module=="bing_chong"){
				$search_data=search_form_information($form_name,$search);
			}
			else{
				$search_data=search_form_nongzi($form_name,$search);
			}
			while($row=mysql_fetch_array($search_data)){
				++$count;
				if($star<=$i&&$i<$end){
					if($star<$end){
						++$star;
						$li.="<li><a href='".$module."/".$module."_detail.php?form=".$_GET["form"]."&id=";
						$li.=$row["id"];
						$li.="' target='_blank'>";
						//只有当有图片时才输出
						if($row["picture"]){
							$li.="<img src='./".$module."/";
							$li.=$row["picture"];
							$li.="'/>";
						}
						$li.="</a>";
						//-----------------------------------------------------
						$li.="<a class='tit' href='".$module."/".$module."_detail.php?form=".$_GET["form"]."&id=".$row["id"];
						$li.="&page=".$_GET["page"];
						$li.="' target='_blank'>";
						//判断tite字符串长度
						if($row["title"]){
							$get_row=substr_cut($row["title"],60);
							$li.=$get_row;
						} 
						else if($row["name"]){
							$get_row=substr_cut($row["name"],60);
							$li.=$get_row;
						}
						$li.="</a>";
						//-----------------------------------------------------
						$li.="<a class='cont' href='".$module."/".$module."_detail.php?form=".$_GET["form"]."&id=".$row["id"];
						$li.="&page=".$_GET["page"];
						$li.="' target='_blank'>";
						//判断content字符串长度
						if($row["content"]){
							$get_row=substr_cut($row["content"],100);
							$li.=$get_row;
						}
						else if($row["chanping"]){
							$p_array=explode("|",$row["chanping"]);
							$get_row=substr_cut($p_array[0],100);
							$li.=$get_row;
						}
						$li.="</a>";
						//-----------------------------------------------------
						$li.="<p class=\"time\">";
						$li.=$row["time"];
						$li.="</p>";

						$li.="<span>";
						$li.=$tip;
						$li.="</span>";

						//-----------------------------------------------------
						$li.="<p class=\"xian\">-----------------------------------------------------------------------------------------------------------------------------</p></li>";		
					}
				}
				++$i;
			}
		}
	}
	if($li=="<ul class='ul'>")
		{
			$li.="<li style='margin-top:20px;text-align:center;' ><a>对不起！在该<span style='position:static; font-size:16px;margin:0px 10px'>".$tip."</span>标签下没有找到相关信息。请尝试在其他标签搜索，或者修改搜索内容</a></li>";
		}
	$li.="</ul>";
	echo $li;
	banner($count,$page);
}
//-------------------------------------------------------------------
//搜索全部数据
function all_data($page,$search){
	//定义打开的表格：
	//------------------------------------------------------------------
	$sql_information_gonggao ="information-gonggao";
	$sql_information_new ="information-new";
	$sql_information_falv ="information-falv";

//------------------------------------------------------------------
	$sql_service_anli="service-anli"; //SQL语句"SELECT * FROM video"
	



//------------------------------------------------------------------
	$sql_knowledge_baike="knowledge-baike"; //SQL语句"SELECT * FROM quesions"
	$sql_knowledge_baike="knowledge-yuzhong";
	$sql_knowledge_baike="knowledge-yinzhong";


//------------------------------------------------------------------
	$sql_picture="picture";


//------------------------------------------------------------------
	$sql_picture="ziyuan";


//------------------------------------------------------------------
 	
	

//------------------------------------------------------------------
	$sql_xiazai_gonggao="xiazai-onggao";
	$sql_xiazai_ziliao="xiazai-ziliao";
	$sql_xiazai_qikan="xiazai-qikan";
	
	$count=0;
	$j=0;
	$star=($page-1)*8;
	$end=($page)*8;	
	
	$li="<ul class='ul'>";
	for($i=1;$i<13;++$i){
		switch($i){
			//资讯-------------------------------------------------------------------
			case 1:$form="information-gonggao";$module="information";$tip="通知公告";$search_data=search_form_information($form,$search);break;
				
			case 2:$form="information-new";$module="information";$tip="行业动态";$search_data=search_form_information($form,$search);break;
				
			case 3:$form="information-falv";$module="information";$tip="法律法规";$search_data=search_form_information($form,$search);break;
				
				
				
			//服务-------------------------------------------------------------------	
			case 4:$form="service-anli";$module="zhengce";$tip="服务案例";$search_data=search_form_information($form,$search);break;
			
				//知识库-------------------------------------------------------------------	
			case 5:$form="knowledge-baike";$module="video";$tip="百科知识";$search_data=search_form_information($form,$search);break;
				
			case 6:$form="knowledge-yuzhong";$module="video";$tip="育种专题";$search_data=search_form_information($form,$search);break;
				
			case 7:$form="knowledge-yinzhong";$module="video";$tip="引种驯化";$search_data=search_form_information($form,$search);break;
				
				
			//图片库-------------------------------------------------------------------
			case 8:$form="picture";$module="teach";$tip="图片库";$search_data=search_form_information($form,$search);break;

				
				
			//种质资源-------------------------------------------------------------------
			case 9:$form="ziyuan";$module="nongzi";$tip="种质资源";$search_data=search_form_ziyuan($form,$search);break;

				
			
				
			
				
			//下载-------------------------------------------------------------------	
			case 10:$form="xiazai-gonggao";$module="bing_chong";$tip="相关公告";$search_data=search_form_information($form,$search);break;
				
			case 11:$form="xiazai-ziliao";$module="bing_chong";$tip="相关资料";$search_data=search_form_information($form,$search);break;
				
			case 12:$form="xiazai-qikan";$module="bing_chong";$tip="电子期刊";$search_data=search_form_information($form,$search);break;
				
			
		}
		//搜索数据
		switch($module){
		case "information":$picture="information";break;
		case "zhengce":$picture="information";break;
		case "video":$picture="information";break;
		case "teach":$picture="picture";break;
		case "nongzi":$picture="ziyuan";break;
		case "bing_chong":$picture="xiazai";break;
		default:$picture="";break;
	}
		
		if($search!=""){
			while($row=mysql_fetch_array($search_data)){
				++$count;
			if($star<=$j&&$j<$end){
				if($star<$end){
					++$star;

					$li.="<li><a href='".$picture."/".$picture."_detail.php?form=".$form."&id=";
					$li.=$row["id"];
					$li.="' target='_blank'>";
					//只有当有图片时才输出
					if($form=="ziyuan"){
						if($row["picture"]){
							$li.="<img src='./".$picture."/picture/".$row["number"]."/";
							$img_array=explode("|",$row["picture"]);
							$li.=$img_array[0];
							$li.="'/>";
						}
					}
					else if($form=="picture"){
						if($row["picture"]){
							$li.="<img src='./".$picture."/picture/".$row["picture_title"]."/";
							$img_array=explode("|",$row["picture"]);
							$li.=$img_array[0];
							$li.="'/>";
						}
						
					}
					else{
						if($row["picture"]){
							$li.="<img src='./".$picture."/";
							$li.=$row["picture"];
							$li.="'/>";
						}
					}
					$li.="</a>";
					//-----------------------------------------------------
					$li.="<a class='tit' href='".$picture."/".$picture."_detail.php?form=".$form."&id=".$row["id"];
					$li.="&page=".$_GET["page"];
					$li.="' target='_blank'>";
					//判断tite字符串长度
					$get_row=substr_cut($row["title"],60);
					$li.=$get_row;
					$li.="</a>";
					//-----------------------------------------------------
					$li.="<a class='cont' href='".$picture."/".$picture."_detail.php?form=".$form."&id=".$row["id"];
					$li.="&page=".$_GET["page"];
					$li.="' target='_blank'>";
					//判断content字符串长度
					$get_row=substr_cut($row["content"],100);
					$li.=$get_row;
					$li.="</a>";
					//-----------------------------------------------------
					$li.="<p class=\"time\">";
					$li.=$row["time"];
					$li.="</p>";
					
					$li.="<span>";
					$li.=$tip;
					$li.="</span>";
					
					//-----------------------------------------------------
					$li.="<p class=\"xian\">-----------------------------------------------------------------------------------------------------------------------------</p></li>";		
				}
				}
				++$j;
			}
				
		}	
	}
	if($li=="<ul class='ul'>"){
		$li.="<li style='margin-top:20px;text-align:center;' ><a>对不起！在该<span style='position:static; font-size:16px;margin:0px 10px'>所有</span>标签下没有找到相关信息。请尝试在其他标签搜索，或者修改搜索内容</a></li>";
	}
	$li.="</ul>";
	echo $li;
	banner($count,$page);
	
	
}
//-------------------------------------------------------------------
//总调用函数
function all_entry($form,$page,$module,$search,$name){
	switch($module){
		case "information":information($form,$page,$module,$search);break;
		case "zhengce":information($form,$page,$module,$search);break;
		case "video":information($form,$page,$module,$search);break;
		case "teach":information($form,$page,$module,$search);break;
		case "nongzi":information($form,$page,$module,$search);break;
		case "bing_chong":information($form,$page,$module,$search);break;
		default:all_data($page,$search);break;
	}
}
?>