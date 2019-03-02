<?php 
	include("open.php");
//参数处理
//-----------------------------------------------------
//由界面传过来的form参数
	if(!isset($_GET["form"])){
		$form=$sql_information_new;
	}
	else if($_GET["form"]==""){
		$form=$sql_information_new;
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
			case "information-new":$div.="<span>行业动态</span></div>";break;
			case "information-gonggao":$div.="<span>通知公告</span></div>";break;
			case "information-falv":$div.="<span>法律法规</span></div>";break;
			
			case "knowledge-baike":$div.="<span>百科知识</span></div>";break;
			case "knowledge-yuzhong":$div.="<span>育种专题</span></div>";break;
			case "knowledge-yinzhong":$div.="<span>引种驯化</span></div>";break;
			
			case "service-anli":$div.="<span>服务案例</span></div>";break;
			case "service-apply":$div.="<span>申请服务</span></div>";break;
			
			default:$div.="<span>行业动态</span></div>";break;
		}
	$div.="<div class='background'></div></div>";
	echo $div;			
}

//------------分页--------------
function banner($form,$page){
		//获取总数据
		$total_sql="SELECT COUNT(*) FROM `$form` WHERE `view`='1'";
			$total_result=mysql_fetch_array(mysql_query($total_sql));
			$total=$total_result[0];
		$showPage=5;

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
//-----------------------------------------------------
//------------content--------------
function  fengye($form,$page){
	if($form!="service-apply"){
		$star=($page-1)*5;
		$end=($page)*5;
		$dao=open_form_id_daoxu($form);
		$i=0;
		$li="<ul class='ul1'>";
		while($row=mysql_fetch_array($dao)){
			if($star<=$i&&$i<$end){
				if($star<$end){
					++$star;
						$li.="<li>";
						//只有当有图片时才输出
						if($row["picture"]){
							$li.="<a href='information_detail.php?form=".$form."&id=";
							$li.=$row["id"];
							$li.="' target='_blank'>";
							$li.="<img src='";
							$li.=$row["picture"];
							$li.="'/>";
							$li.="</a>";
						}
						//-----------------------------------------------------
						$li.="<a class='tit' href='information_detail.php?form=".$form."&id=".$row["id"];
						$li.="&page=".$page;
						$li.="' target='_blank'>";
						//判断tite字符串长度
						$get_row=substr_cut($row["title"],50);
						$li.=$get_row;
						$li.="</a>";
						//-----------------------------------------------------
						$li.="<a class='cont' href='information_detail.php?form=".$form."&id=".$row["id"];
						$li.="&page=".$page;
						$li.="' target='_blank'>";
						//判断content字符串长度
						if($row["picture"]){
							$get_row=substr_cut($row["content"],50);
						}
						else{
							$get_row=substr_cut($row["content"],70);
						}

						$li.=$get_row;
						$li.="</a>";
						//-----------------------------------------------------
						$li.="<p class=\"time\">";
						$li.=$row["time"];
						$li.="</p>";
						//-----------------------------------------------------
						$li.="<p class=\"xian\">----------------------------------------------------------------------------------------------------</p></li>";		
				}
			}
			++$i;

		}
		$li.="</ul>";
		echo $li;
		banner($form,$page);
	}
	else if($form=="service-apply"){
		$div="<div class='service-apply'>";
			$div.="<p class='p1'>申请服务</p>";
			$div.="<p class='p2'>您将有机会通过申请服务来获得我们网站提供的一些帮助</p>";
			$div.="<form class='apply-form'  method='post'  action='service-apply.php' onSubmit='return check()' name='apply_form'>";
		
				$div.="<div class='form-div1'>";
					$div.="<div class='div1-in1'>";
						$div.="<span style='color:red;'>*</span><span>您的姓名：</span><input type='text' name='name' />";
					$div.="</div>";
					$div.="<div class='div1-in2 parentCls'>";
						$div.="<span style='color:red;'>*</span><span>您的邮箱：</span><input type='text' name='youxiang' class='inputElem' />";	
					$div.="</div>";
				$div.="</div>";
					
				$div.="<div class='form-div1'>";
					$div.="<div class='div1-in1'>";
						$div.="<span style='color:red;'>*</span><span>您的电话：</span><input type='text' name='dianhua' />";
					$div.="</div>";
					$div.="<div class='div1-in2'>";
						$div.="<span style='display:block;float:left;'><span style='color:red;'>*</span><span >申请项目：</span></span>";
						$div.="<div class='select'><select  name='xiangmu' >";
						
							$div.="
							<option value='良种基地与种苗繁育基地规划设计'>良种基地与种苗繁育基地规划设计</option> 
							
							<option value='种质资源收集与服务'>种质资源收集与服务</option>
							
							<option value='无性繁育技术培训与生产应用'>无性繁育技术培训与生产应用</option> 
							
							<option value='无公害丰产栽培技术体系的培训'>无公害丰产栽培技术体系的培训</option>
							
							<option value='提供国家植物新品'>提供国家植物新品</option> 
							
							<option value='提供林木种植的技术指导、管理等技术'>提供林木种植的技术指导、管理等技术</option>
							
							<option value='提供新品种植物种子'>提供新品种植物种子</option>

							";
		
						$div.="</select></div>";	
					$div.="</div>";
				$div.="</div>";
		
		        $div.="<div class='form-div1'>";
					$div.="<div class='div1-in1'>";
						$div.="<span style='color:red;'>*</span><span>所在单位：</span><input type='text' name='danwei' />";
					$div.="</div>";
					$div.="<div class='div1-in2'>";
						$div.="<span style='color:red;'>*</span><span>您的地址：</span><input type='text' name='dizhi' />";	
					$div.="</div>";
				$div.="</div>";
		
				$div.="<div class='form-div2'>";
						$div.="<span style='color:red;'>*</span><span>申请详述：</span><textarea  name='content' rows='15' cols='57'></textarea>";	
				$div.="</div>";
					
				$div.="<div class='form-div3'>";
					$div.="<p>1、以上<span style='color:red;'>*</span>为必填项</p>";
					$div.="<p>2、提交申请后将会通过<span style='color:red;'>邮箱</span>来通知您的申请进度</p>";
				$div.="</div>";
		
				$div.="<div class='form-div4'>";
						$div.="<input type='submit' name='submit' value='立即申请' class='tijiao'>";
				$div.="</div>";
		
			$div.="</form>";
		$div.="</div>";
		echo $div;
	
		
	}
}
?>