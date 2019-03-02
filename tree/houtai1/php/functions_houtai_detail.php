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
//由界面传过来的id参数
if(!isset($_GET["id"])){
		$id='';
	}
	else if($_GET["id"]==""){
		$id='';
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
//陈列information 模块
function information($form,$id,$page,$module){
	$res=open_form_id($form,$id);
	$div="<div id='all'>";
	$div.="<div class='d_top'><p>字段</p><div>内容</div></div>";
	if($id==""){
		$div.="<form action='insert.php?form=".$form."&module=".$module."' method='post' name='dl'>";
	}
	else{
		$div.="<form action='update.php?form=".$form."&id=".$id."&page=".$page."&module=".$module."' method='post' name='dl'>";
	}
	if($res){
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'>".$res['id']."</textarea></div>";
		$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'>".$res['title']."</textarea></div>";
		$div.="<div class='d1'><p>content</p><textarea name='content' rows='10' cols='35'>".$res['content']."</textarea></div>";
		$div.="<div class='d1'><p>author</p><textarea name='author' rows='2' cols='35'>".$res['author']."</textarea></div>";
		$div.="<div class='d1'><p>laiyuan</p><textarea name='laiyuan' rows='2' cols='35'>".$res['laiyuan']."</textarea></div>";
		$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'>".$res['time']."</textarea></div>";
		$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'>".$res['picture']."</textarea></div>";
		$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1'";
		if($res["view"]==1){
			$div.="checked = 'checked'";
		}
		$div.=">通过<input class='view' type='radio' name='view' value='0'";
		if($res["view"]==0){
			$div.="checked = 'checked'";
		}
		$div.=">未审核</div>";		
		
	}
	else{
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>content</p><textarea name='content' rows='10' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>author</p><textarea name='author' rows='2' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>laiyuan</p><textarea name='laiyuan' rows='2' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'></textarea></div>";
		
		$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1' checked = 'checked'>通过<input class='view' type='radio' name='view' value='0'>未审核</div>";
	}
	
	$div.="<a id='back'>返回</a>";
	$div.="<input type='submit' name='submit' value='保存' class='tijiao'>";
	$div.="<div style='clear:both;float:none;border:none;'><div></div>";
	echo $div;
}


//-------------------------------------------------------------------
//陈列zhengce 模块
function zhengce($form,$id,$page,$module){
	$res=open_form_id($form,$id);
	$div="<div id='all'>";
	$div.="<div class='d_top'><p>字段</p><div>内容</div></div>";
	if($id==""){
		$div.="<form action='insert.php?form=".$form."&module=".$module."' method='post' name='dl'>";
	}
	else{
		$div.="<form action='update.php?form=".$form."&id=".$id."&page=".$page."&module=".$module."' method='post' name='dl'>";
	}
	if($res){
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'>".$res['id']."</textarea></div>";
		$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'>".$res['title']."</textarea></div>";
		$div.="<div class='d1'><p>content</p><textarea name='content' rows='10' cols='35'>".$res['content']."</textarea></div>";
		$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'>".$res['time']."</textarea></div>";
		$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'>".$res['picture']."</textarea></div>";
		$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1'";
		if($res["view"]==1){
			$div.="checked = 'checked'";
		}
		$div.=">通过<input class='view' type='radio' name='view' value='0'";
		if($res["view"]==0){
			$div.="checked = 'checked'";
		}
		$div.=">未审核</div>";		
		
	}
	else{
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>content</p><textarea name='content' rows='10' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'></textarea></div>";
		
		$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1' checked = 'checked'>通过<input class='view' type='radio' name='view' value='0'>未审核</div>";
	}
	$div.="<a id='back'>返回</a>";
	$div.="<input type='submit' name='submit' value='保存' class='tijiao'>";
	$div.="<div style='clear:both;float:none;border:none;'><div></div>";
	echo $div;
}

///-------------------------------------------------------------------
//陈列ziyuan模块
function ziyuan($form,$id,$page,$module){
	switch($form){
		case "ziyuan":$nav=1;break;
		default:$nav=0;break;
	}
	if($nav==1){
			$res=open_form_id($form,$id);
		$div="<div id='all'>";
		$div.="<div class='d_top'><p>字段</p><div>内容</div></div>";
		if($id==""){
		$div.="<form action='insert.php?form=".$form."&module=".$module."' method='post' name='dl'>";
	}
		else{
			$div.="<form action='update.php?form=".$form."&id=".$id."&page=".$page."&module=".$module."' method='post' name='dl'>";
		}
		if($res){
			$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'>".$res['id']."</textarea></div>";
			$div.="<div class='d1'><p>name</p><textarea name='name' rows='2' cols='35'>".$res['name']."</textarea></div>";
			$div.="<div class='d1'><p>canshu</p><textarea name='canshu' rows='10' cols='35'>".$res['canshu']."</textarea></div>";
			$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'>".$res['time']."</textarea></div>";
			$div.="<div class='d1'><p>chanping</p><textarea name='chanping' rows='10' cols='35'>".$res['chanping']."</textarea></div>";
			$div.="<div class='d1'><p>zhuyi</p><textarea name='zhuyi' rows='10' cols='35'>".$res['zhuyi']."</textarea></div>";
			
			$div.="<div class='d1'><p>shiyong</p><textarea name='shiyong' rows='4' cols='35'>".$res['shiyong']."</textarea></div>";
			
			$div.="<div class='d1'><p>fangzhi</p><textarea name='fangzhi' rows='4' cols='35'>".$res['fangzhi']."</textarea></div>";
			
			$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'>".$res['picture']."</textarea></div>";
			
			$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1'";
			if($res["view"]==1){
				$div.="checked = 'checked'";
			}
			$div.=">通过<input class='view' type='radio' name='view' value='0'";
			if($res["view"]==0){
				$div.="checked = 'checked'";
			}
			$div.=">未审核</div>";		

		}
		else{
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'></textarea></div>";
			$div.="<div class='d1'><p>name</p><textarea name='name' rows='2' cols='35'></textarea></div>";
			$div.="<div class='d1'><p>canshu</p><textarea name='canshu' rows='10' cols='35'></textarea></div>";
			$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'></textarea></div>";
			$div.="<div class='d1'><p>chanping</p><textarea name='chanping' rows='10' cols='35'></textarea></div>";
			$div.="<div class='d1'><p>zhuyi</p><textarea name='zhuyi' rows='10' cols='35'></textarea></div>";
			
			$div.="<div class='d1'><p>shiyong</p><textarea name='shiyong' rows='4' cols='35'></textarea></div>";
			
			$div.="<div class='d1'><p>fangzhi</p><textarea name='fangzhi' rows='4' cols='35'></textarea></div>";
			
			$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'></textarea></div";
			$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1' checked = 'checked'>通过<input class='view' type='radio' name='view' value='0'>未审核</div>";
			
	}
		$div.="<a id='back'>返回</a>";
		$div.="<input type='submit' name='submit' value='保存' class='tijiao'>";
		$div.="<div style='clear:both;float:none;border:none;'><div></div>";
		echo $div;
	}
	else{
			$res=open_form_id($form,$id);
		$div="<div id='all'>";
		$div.="<div class='d_top'><p>字段</p><div>内容</div></div>";
		if($id==""){
		$div.="<form action='insert.php?form=".$form."&module=".$module."' method='post' name='dl'>";     //插入新内容
	}
		else{
			$div.="<form action='update.php?form=".$form."&id=".$id."&page=".$page."&module=".$module."' method='post' name='dl'>";//更新内容
		}
		if($res){
			$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'>".$res['id']."</textarea></div>";
			$div.="<div class='d1'><p>name</p><textarea name='name' rows='2' cols='35'>".$res['name']."</textarea></div>";
			$div.="<div class='d1'><p>canshu</p><textarea name='canshu' rows='10' cols='35'>".$res['canshu']."</textarea></div>";
			$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'>".$res['time']."</textarea></div>";
			$div.="<div class='d1'><p>chanping</p><textarea name='chanping' rows='10' cols='35'>".$res['chanping']."</textarea></div>";
			
			$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'>".$res['picture']."</textarea></div>";
			
			$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1'";
			if($res["view"]==1){
				$div.="checked = 'checked'";
			}
			$div.=">通过<input class='view' type='radio' name='view' value='0'";
			if($res["view"]==0){
				$div.="checked = 'checked'";
			}
			$div.=">未审核</div>";		

		}
		else{
			$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'></textarea></div>";
			$div.="<div class='d1'><p>name</p><textarea name='name' rows='2' cols='35'></textarea></div>";
			$div.="<div class='d1'><p>canshu</p><textarea name='canshu' rows='10' cols='35'>".$res['canshu']."</textarea></div>";
			$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'></textarea></div>";
			$div.="<div class='d1'><p>chanping</p><textarea name='chanping' rows='10' cols='35'></textarea></div>";
			$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'></textarea></div>";
			
			$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1' checked = 'checked'>通过<input class='view' type='radio' name='view' value='0'>未审核</div>";
			
	}
		$div.="<a id='back'>返回</a>";
		$div.="<input type='submit' name='submit' value='保存' class='tijiao'>";
		$div.="<div style='clear:both;float:none;border:none;'><div></div>";
		echo $div;
	}
}

//陈列video模块
function video($form,$id,$page,$module){
	$res=open_form_id($form,$id);
	$div="<div id='all'>";
	$div.="<div class='d_top'><p>字段</p><div>内容</div></div>";
	if($id==""){
		$div.="<form action='insert.php?form=".$form."&module=".$module."' method='post' name='dl'>";
	}
	else{
		$div.="<form action='update.php?form=".$form."&id=".$id."&page=".$page."&module=".$module."' method='post' name='dl'>";
	}
	if($res){
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'>".$res['id']."</textarea></div>";
		$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'>".$res['title']."</textarea></div>";
		$div.="<div class='d1'><p>content</p><textarea name='content' rows='10' cols='35'>".$res['content']."</textarea></div>";

		$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'>".$res['picture']."</textarea></div>";
		
		$div.="<div class='d1'><p>video</p><textarea name='video' rows='2' cols='35'>".$res['video']."</textarea></div>";
		
		$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1'";
		if($res["view"]==1){
			$div.="checked = 'checked'";
		}
		$div.=">通过<input class='view' type='radio' name='view' value='0'";
		if($res["view"]==0){
			$div.="checked = 'checked'";
		}
		$div.=">未审核</div>";		
		
	}
	else{
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>content</p><textarea name='content' rows='10' cols='35'></textarea></div>";

		$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'></textarea></div>";
		
		$div.="<div class='d1'><p>video</p><textarea name='video' rows='2' cols='35'></textarea></div>";
			
		$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1' checked = 'checked'>通过<input class='view' type='radio' name='view' value='0'>未审核</div>";
	}
	$div.="<a id='back'>返回</a>";
	$div.="<input type='submit' name='submit' value='保存' class='tijiao'>";
	$div.="<div style='clear:both;float:none;border:none;'><div></div>";
	echo $div;
}
//-------------------------------------------------------------------
//陈列teach 模块
function teach($form,$id,$page,$module){
	$res=open_form_id($form,$id);
		$div="<div id='all'>";
		$div.="<div class='d_top'><p>字段</p><div>内容</div></div>";
		if($id==""){
		$div.="<form action='insert.php?form=".$form."&module=".$module."' method='post' name='dl'>";
	}
		else{
			$div.="<form action='update.php?form=".$form."&id=".$id."&page=".$page."&module=".$module."' method='post' name='dl'>";
		}
		if($res){
			$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'>".$res['id']."</textarea></div>";
			$div.="<div class='d1'><p>name</p><textarea name='name' rows='2' cols='35'>".$res['name']."</textarea></div>";
			
			$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'>".$res['title']."</textarea></div>";
			
			$div.="<div class='d1'><p>chapter</p><textarea name='chapter' rows='10' cols='35'>".$res['chapter']."</textarea></div>";
			
			$div.="<div class='d1'><p>content</p><textarea name='content' rows='10' cols='35'>".$res['content']."</textarea></div>";
			
			

			$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'>".$res['picture']."</textarea></div>";
			
			$div.="<div class='d1'><p>video</p><textarea name='video' rows='2' cols='35'>".$res['video']."</textarea></div>";
			
			$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1'";
			if($res["view"]==1){
				$div.="checked = 'checked'";
			}
			$div.=">通过<input class='view' type='radio' name='view' value='0'";
			if($res["view"]==0){
				$div.="checked = 'checked'";
			}
			$div.=">未审核</div>";		

		}
	else{
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'></textarea></div>";
			$div.="<div class='d1'><p>name</p><textarea name='name' rows='2' cols='35'></textarea></div>";
			
			$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'></textarea></div>";
			
			$div.="<div class='d1'><p>chapter</p><textarea name='chapter' rows='10' cols='35'></textarea></div>";
			
			$div.="<div class='d1'><p>content</p><textarea name='content' rows='10' cols='35'></textarea></div>";

			$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'></textarea></div>";
			
			$div.="<div class='d1'><p>video</p><textarea name='video' rows='2' cols='35'></textarea></div>";
		
		$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1' checked = 'checked'>通过<input class='view' type='radio' name='view' value='0'>未审核</div>";
	}
		$div.="<a id='back'>返回</a>";
		$div.="<input type='submit' name='submit' value='保存' class='tijiao'>";
		$div.="<div style='clear:both;float:none;border:none;'><div></div>";
		echo $div;
}
//陈列xiazai模块
function xiazai($form,$id,$page,$module){
	$res=open_form_id($form,$id);
	$div="<div id='all'>";
	$div.="<div class='d_top'><p>字段</p><div>内容</div></div>";
	if($id==""){
		$div.="<form action='insert.php?form=".$form."&module=".$module."' method='post' name='dl'>";
	}
	else{
		$div.="<form action='update.php?form=".$form."&id=".$id."&page=".$page."&module=".$module."' method='post' name='dl'>";
	}
	if($res){
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'>".$res['id']."</textarea></div>";
		$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'>".$res['title']."</textarea></div>";
		$div.="<div class='d1'><p>fujian</p><textarea name='content' rows='10' cols='35'>".$res['fujian']."</textarea></div>";
        $div.="<div class='d1'><p>author</p><textarea name='author' rows='2' cols='35'>".$res['author']."</textarea></div>";
		$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'>".$res['time']."</textarea></div>";
		
		$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'>".$res['picture']."</textarea></div>";
		
		
		$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1'";
		if($res["view"]==1){
			$div.="checked = 'checked'";
		}
		$div.=">通过<input class='view' type='radio' name='view' value='0'";
		if($res["view"]==0){
			$div.="checked = 'checked'";
		}
		$div.=">未审核</div>";		
		
	}
	else{
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>fujian</p><textarea name='content' rows='10' cols='35'></textarea></div>";
        $div.="<div class='d1'><p>author</p><textarea name='author' rows='2' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'></textarea></div>";
		
		$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'></textarea></div>";
		
		$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1' checked = 'checked'>通过<input class='view' type='radio' name='view' value='0'>未审核</div>";
	}
	$div.="<a id='back'>返回</a>";
	$div.="<input type='submit' name='submit' value='保存' class='tijiao'>";
	$div.="<div style='clear:both;float:none;border:none;'><div></div>";
	echo $div;
}

///-------------------------------------------------------------------
//陈列ziyuan模块
//陈列xiazai模块
function syt($form,$id,$page,$module){
	$res=open_form_id($form,$id);
	$div="<div id='all'>";
	$div.="<div class='d_top'><p>字段</p><div>内容</div></div>";
	if($id==""){
		$div.="<form action='insert.php?form=".$form."&module=".$module."' method='post' name='dl'>";
	}
	else{
		$div.="<form action='update.php?form=".$form."&id=".$id."&page=".$page."&module=".$module."' method='post' name='dl'>";
	}
	if($res){
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'>".$res['id']."</textarea></div>";
		$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'>".$res['title']."</textarea></div>";
		$div.="<div class='d1'><p>fujian</p><textarea name='content' rows='10' cols='35'>".$res['fujian']."</textarea></div>";
        $div.="<div class='d1'><p>author</p><textarea name='author' rows='2' cols='35'>".$res['author']."</textarea></div>";
		$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'>".$res['time']."</textarea></div>";
		
		$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'>".$res['picture']."</textarea></div>";
		
		
		$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1'";
		if($res["view"]==1){
			$div.="checked = 'checked'";
		}
		$div.=">通过<input class='view' type='radio' name='view' value='0'";
		if($res["view"]==0){
			$div.="checked = 'checked'";
		}
		$div.=">未审核</div>";		
		
	}
	else{
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>fujian</p><textarea name='content' rows='10' cols='35'></textarea></div>";
        $div.="<div class='d1'><p>author</p><textarea name='author' rows='2' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'></textarea></div>";
		
		$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'></textarea></div>";
		
		$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1' checked = 'checked'>通过<input class='view' type='radio' name='view' value='0'>未审核</div>";
	}
	$div.="<a id='back'>返回</a>";
	$div.="<input type='submit' name='submit' value='保存' class='tijiao'>";
	$div.="<div style='clear:both;float:none;border:none;'><div></div>";
	echo $div;
}
//-------------------------------------------------------------------
//总调用函数
function all_enty($form,$id,$page,$module){
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
?>