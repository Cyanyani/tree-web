<?php
   	require(dirname(__FILE__)."/.././config.php");
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
	//连接数据库
	$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting");
	mysql_query("set names 'utf8'"); 
	mysql_select_db($mysql_database); //打开数据库


//定义打开的表格：
//------------------------------------------------------------------
	$sql_information_gonggao ="information-gonggao";
	$sql_information_new ="information-new";
	$sql_information_falv ="information-falv";

//------------------------------------------------------------------
	$sql_service_anli="service-anli"; //SQL语句"SELECT * FROM video"
	$sql_service_apply="service-apply";



//------------------------------------------------------------------
	$sql_knowledge_baike="knowledge-baike"; //SQL语句"SELECT * FROM quesions"
	$sql_knowledge_yuzhong="knowledge-yuzhong";
	$sql_knowledge_yinzhong="knowledge-yinzhong";


//------------------------------------------------------------------
	$sql_picture="picture";


//------------------------------------------------------------------
	$sql_ziyuan="ziyuan";


//------------------------------------------------------------------
 	$sql_general_introduce="general-introduce";
	$sql_general_natural="general-natural";
	$sql_general_production="general-production";
	$sql_general_jishu="general-jishu";
	$sql_general_liangpin="general-liangpin";
	

//------------------------------------------------------------------
	$sql_xiazai_gonggao="xiazai-gonggao";
	$sql_xiazai_ziliao="xiazai-ziliao";
	$sql_xiazai_qikan="xiazai-qikan";



//------------------------------------------------------------------
//打开指定表的指定内容
function open_form($form,$star,$many){
	$sql_form="SELECT * FROM `$form` WHERE `view`='1' LIMIT $star,$many "; 
	$result=mysql_query($sql_form,$GLOBALS['conn'] )or die("error connecting"); //查询
	return $result;
}

function open_form_all($form){
	$sql_form="SELECT * FROM `$form` WHERE `view`='1'"; 
	$result=mysql_query($sql_form,$GLOBALS['conn'] )or die("error connecting"); //查询
	return $result;
}
//------------------------------------------------------------------
//打开随着id的内容
function open_form_id($form,$id){
	$sql_form="SELECT * FROM `$form` WHERE id=$id"; 
	$result=mysql_query($sql_form,$GLOBALS['conn'] )or die("error connecting"); //查询
	return $result;
}
//打开随着id的倒叙
function open_form_id_daoxu($form){
	$sql="select * from `$form` WHERE `view`='1' order by id desc ";
	$result= mysql_query($sql); //查询
	return $result;
}

//------------------------------------------------------------------
//除去乱码的字符串分割
function substr_cut($str_cut,$length)
{
    if (strlen($str_cut) > $length)
    {
        for($i=0; $i < $length; $i++)
        if (ord($str_cut[$i]) > 128)    $i=$i+2;
        $str_cut = substr($str_cut,0,$i)."...";
			
    }
    return $str_cut;
}
//除去乱码的字符串分割_不加省六号
function substr_cut2($str_cut,$length)
{
    if (strlen($str_cut) > $length)
    {
        for($i=0; $i < $length; $i++)
        if (ord($str_cut[$i]) > 128)    $i=$i+2;
        $str_cut = substr($str_cut,0,$i);
			
    }
    return $str_cut;
}
//检测网络是否连接  
function varify_url($url){   
	$check = @fopen($url,"r");   
	if($check){   
		$status = true;   
	}
	else{   
		$status = false;   
	}   
		return $status;   
} 
//information——搜索 
function search_form_information($form,$search){
	if($form==""){
		$search_data="";
		return $search_data;
	}
	else{
		$sql ="SELECT * FROM `$form`  where (title LIKE  '%$search%' OR content LIKE  '%$search%' )and( `view`='1') ORDER BY id DESC";
		$search_data=mysql_query($sql);
		return $search_data; 
	}
}
//nongzi——搜索 
function search_form_ziyuan($form,$search){
	if($form==""){
		$search_data="";
		return $search_data;
	}
	else{
	$sql ="SELECT * FROM `$form`  where (title LIKE  '%$search%' OR leixing LIKE  '%$search%' OR english LIKE  '%$search%')and( `view`='1') ORDER BY id DESC";
		$search_data=mysql_query($sql);
		return $search_data; 
	}
}
function alert_form_view($form){
	$sql_form="ALTER TABLE `$form` ADD `view` INT NOT NULL AFTER `id`";
	$result=mysql_query($sql_form,$GLOBALS['conn'] )or die("error connecting"); //查询
	return $result;
}
function update_form_view($form){
	$sql_form="UPDATE `$form` SET `view` = '1'";
	$result=mysql_query($sql_form,$GLOBALS['conn'] )or die("error connecting"); //查询
	return $result;
}
?>