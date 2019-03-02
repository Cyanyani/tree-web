<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>国家林木种质资源库</title>
<link rel="stylesheet" href="css/chuShiHua.css" type="text/css" /><!--初始化css样式-->
<link rel="stylesheet" href="css/index.css" type="text/css" /><!--本网页的css样式-->
<?php include("php/functions_index.php") ?><!--首页-函数库-->
<!--js样式star-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!--js样式end-->
</head>
<body>
		<!--头背景star-->
		<div id="top-header"></div>
		<!--头背景end-->
		
		<!-------------------------------------------------------->
		<!--||导航栏-（首页）star-->
		<div id="bg">
			<div class="top-menu">
				<ul class="nav1">
					<li class="li1">
						<a href="index.php" class="active a1">首页</a>
					</li>
					
					<li class="li1">
						<a href="information/information.php?form=information-new&page=1" class="a1">资讯</a>
						<ul class="nav20">
							<li class="li2"><a href="information/information.php?form=information-new&page=1">行业动态</a></li>
							<li class="li2"><a href="information/information.php?form=information-gonggao&page=1">通知公告</a></li>
							<li class="li2"><a href="information/information.php?form=information-falv&page=1">法律法规</a></li>
						</ul>
					</li>
					
					<li class="li1">
						<a href="information/information.php?form=service-anli&page=1" class="a1" >服务</a>
						<ul class="nav20">
							<li class="li2"><a href="information/information.php?form=service-anli&page=1">服务案例</a></li>
							<li class="li2"><a href="information/information.php?form=service-apply&page=1">申请服务</a></li>
						</ul>
					</li>
					
					<li class="li1">
						<a href="information/information.php?form=knowledge-baike&page=1" class="width3 a1">知识库</a>
						<ul class="nav20">
							<li class="li2"><a href="information/information.php?form=knowledge-baike&page=1">百科知识</a></li>
							<li class="li2"><a href="information/information.php?form=knowledge-yuzhong&page=1">育种专题</a></li>
							<li class="li2"><a href="information/information.php?form=knowledge-yinzhong&page=1">引种驯化</a></li>
						</ul>
					</li>
					
					<li class="li1">
					<a href="picture/picture.php" class="width3 a1">图片库</a>
					</li>
					
					<li class="li1">
					<a href="ziyuan/ziyuan.php" class="width4 a1">种质资源</a>
						
					</li>
					
					<li class="li1">
					<a href="general/general.php?form=general-introduce" class="width4 a1">资源概括</a>
						<ul class="nav21">
							<li class="li2"><a href="general.php?form=general-introduce">资源介绍</a></li>
							<li class="li2"><a href="">自然资源</a></li>
							<li class="li2"><a href="#">生产概况</a></li>
							<li class="li2"><a href="#">技术支持</a></li>
							<li class="li2"><a href="#">良种介绍</a></li>
						</ul>
					</li>
					
					<li class="li1">
					<a href="xiazai/xiazai.php" class="width4 a1">资料共享</a>
						<ul class="nav21">
							<li class="li2"><a href="xiazai/xiazai.php?form=xiazai-gonggao">相关公告</a></li>
							<li class="li2"><a href="xiazai/xiazai.php?form=xiazai-ziliao">相关资料</a></li>
							<li class="li2"><a href="xiazai/xiazai.php?form=xiazai-qikan">电子期刊</a></li>
						</ul>
					</li>
					
				</ul>
			<!--搜索框star-->
				<div class="top-search">
					<a title="搜索" href="search.php"></a>
				</div>
			<!--搜索框end-->
			</div>
		</div>
		<!--||导航栏-（首页）end>-->
		
		
		
		
		<!-------------------------------------------------------->
		<div id="all-content">
			
			<!--||资讯star>-->
			<div id="information">
				<!--||资讯title-star>-->
				<div class="information-title">
					<ul>
						<li><a href="information/information.php?form=inforomation-new&page=1">行业动态</a></li>
						<li><a href="information/information.php?form=information-gonggao&page=1">通知公告</a></li>
						<li><a href="information/information.php?form=information-falv&page=1">法律法规</a></li>
					</ul>
				</div>
				<!--||资讯title-end>-->
				
				<!--||资讯-内容star>-->
				<div class="information-content">
					<!--动态-->
					<div class="part_big">
						<div class="title">
							<span>行业动态</span>
							<a href="information/information.php?form=information-new&page=1">更多></a>
						</div>
						<div class="content">
							<!--js样式展现新闻-共i条图片新闻-star-->
							<div class="new_js" id="new_hot_img">
								<?php information_img($sql_information_new,3); ?>
								<div class="xuanze" id="new_hot_dian">
									<span class="active"></span>
									<span></span>
									<span></span>
								</div>
							</div>
							<!--js样式展现新闻end-->
							<ul>
								<?php information_li($sql_information_new,4); ?>
							</ul>
						</div>
					</div>
					<!--动态end-->
					<script type="text/javascript">
						function qiehuan(name){
							var _i=$('#new_hot_dian .active').index();
							var _i_bian=1;	

							if(_i>=2){

								_i_bian=0;
							}
							else{

								_i_bian=_i+1;
							}
							$(name+'_dian span').removeClass('active');
							$(name+'_dian span').eq(_i_bian).addClass('active');
							$(name+'_img a').removeClass('display_block');
							$(name+'_img a').eq(_i_bian).addClass('display_block');	
						}
						//span的点击效果
						$(function(){
							$('#new_hot_dian span').click(function(){
								var _i=$(this).index();
								$('#new_hot_dian span').removeClass('active');
								$('#new_hot_dian span').eq(_i).addClass('active');
								$('#new_hot_img a').removeClass('display_block');
								$('#new_hot_img a').eq(_i).addClass('display_block');
							});

							$('#new_hot_dian span').mouseover(function(){
								clearInterval(iIntervalId0);
							});
							$('#new_hot_dian span').mouseout(function(){
								iIntervalId0 = setInterval("qiehuan('#new_hot');","2000");
							});
							$('#new_hot_img a').mouseover(function(){
								clearInterval(iIntervalId0);
							});
							$('#new_hot_img a').mouseout(function(){
								iIntervalId0 = setInterval("qiehuan('#new_hot');","2000");
							});
							iIntervalId0=setInterval("qiehuan('#new_hot');","2000");
							//-------------------------------------------------------------
							$('#new_new_dian span').click(function(){
								var _i=$(this).index();
								$('#new_new_dian span').removeClass('active');
								$('#new_new_dian span').eq(_i).addClass('active');
								$('#new_new_img a').removeClass('display_block');
								$('#new_new_img a').eq(_i).addClass('display_block');
							});

							$('#new_new_dian span').mouseover(function(){
								clearInterval(iIntervalId0_1);
							});
							$('#new_new_dian span').mouseout(function(){
								iIntervalId0_1 = setInterval("qiehuan('#new_new');","2000");
							});
							$('#new_new_img a').mouseover(function(){
								clearInterval(iIntervalId0_1);
							});
							$('#new_new_img a').mouseout(function(){
								iIntervalId0_1 = setInterval("qiehuan('#new_new');","2000");
							});
							iIntervalId0_1=setInterval("qiehuan('#new_new');","2000");

						});
					</script>
					
					<!--通知公告-->
					<div class="part">
						<div class="title">
							<span>通知公告</span>
							<a href="information/information.php?form=information-gonggao&page=1">更多></a>
						</div>
						<div class="content">
								<?php gonggao_li($sql_information_gonggao,6); ?>
						</div>
					</div>
					<!--通知公告end-->
					
					<!--法律法规star-->
					<div class="part part2">
						<div class="title">
							<span>法律法规</span>
							<a href="information/information.php?form=information-falv&page=1">更多></a>
						</div>
						<div class="content">
								<?php  gonggao_li($sql_information_falv,6); ?>
						</div>
					</div>
					<!--法律法规end-->
					
				</div>
				<!--||资讯-内容end>-->
			</div>
			<!--||资讯end>-->
			
			
			
			
			<!--||种质资源star>-->
			<div id="ziyuan">
				<!--title-->
				<div class="title">
					<a class="a2" href="#">更多></a>
				</div>
				<!--content-->
				<div class="content">
					<ul>
						<?php ziyuan_li($sql_ziyuan,0,4); ?>
					</ul>
				</div>
			</div>
			<!--||种质资源end>-->
		
		
		
	
			<!--||知识库star>-->
			<div id="knowledge">
				<!--||知识库title-star>-->
				<div class="knowledge-title">
					<ul>
						<li><a href="information/information.php?form=knowledge-baike&page=1">百科知识</a></li>
						<li><a href="information/information.php?form=knowledge-yuzhong&page=1">育种专题</a></li>
						<li><a href="information/information.php?form=knowledge-yinzhong&page=1">引种专题</a></li>
					</ul>
				</div>
				<!--||知识库title-end>-->
				
				<!--||知识库-内容star>-->
				<div class="knowledge-content">
					<!--百科star-->
					<div class="part">
						<div class="title">
							<span>百科知识</span>
							<a href="information/information.php?form=knowledge-baike&page=1">更多></a>
						</div>
						<div class="content">
							<?php knowledge_li($sql_knowledge_baike,4); ?>	
						</div>
					</div>
					<!--百科end-->
					
					<!--育种专题star-->
					<div class="part">
						<div class="title">
							<span>育种专题</span>
							<a href="information/information.php?form=knowledge-yuzhong&page=1">更多></a>
						</div>
						<div class="content">
							<?php knowledge_li($sql_knowledge_yuzhong,4); ?>	
						</div>
					</div>
					<!--育种专题end-->
					
					<!--引种star-->
					<div class="part part2">
						<div class="title">
							<span>引种驯化</span>
							<a href="information/information.php?form=knowledge-yinzhong&page=1">更多></a>
						</div>
						<div class="content">
							<?php knowledge_li($sql_knowledge_yinzhong,4); ?>	
						</div>
					</div>
					<!--引种专题end-->
					
				</div>
				<!--||知识库-内容end>-->
			</div>
			<!--||知识库end>-->
			
			
			
			<!--||服务star>-->
			<div id="service">
				<!--title-->
				<div class="title">
					<a class="a1" href="information/information.php?form=service-apply&page=1" >申请服务</a>
					<a class="a2" href="information/information.php?form=service-anli&page=1">更多></a>
				</div>
				<!--content-->
				<div class="content">
					<?php service_li($sql_service_anli,5); ?>
				</div>
			</div>
			<!--||服务end>-->
			
			
			
			<!--||资源概括star>-->
			<div id="general">
				<!--title——star-->
				<div class="general-title">
				</div>
				<!--title——end-->
				<!--content--star-->
				<div class="index-con">
				  <ul>

					<li class="in-kct"> 
						<a href="general/general.php?form=general-introduce" title="资源介绍">
							<div class="in-block"> 
								<i class="bigger"></i> 
								<span class="ch show" style="display: block;">资源介绍</span> 
								<span class="in-text" style="display: none;">
									<p><em>资源库</em>&nbsp;&nbsp;资源介绍 </p>
								</span>
							</div>
					  </a>
					</li>
					
					<li class="in-jbk in-plan"> 
				   		<a href="general/general.php?form=general-natural" title="自然资源">
						   <div class="in-block">
								<i style="display: block;"></i> 
								<span class="span1" style="display: inline;">自然资源</span>
								<i class="in-none toLeft1" style="display: none;"></i> 
								<span class="in-text" style="display: none;">
									<p>完备的规划是指引</p>
									<p>我们取得成功的前提</p>
								</span>
							</div>
				 		</a> 
					</li>
					
					
					<li class="in-jbk in-jishu"> 
							<a href="general/general.php?form=general-jishu" title="技术支持">
							   <div class="in-block">
									<i style="display: block;"></i> 
									<span class="span1" style="display: inline;">技术支持</span>
									<i class="in-none toLeft1" style="display: none;"></i> 
									<span class="in-text" style="display: none;">
										<p>完备的规划是指引</p>
										<p>我们取得成功的前提</p>
									</span>
								</div>
							</a> 
					</li>
					
					<li class="in-jbk in-shenchan"> 
							<a href="general/general.php?form=general-production" title="生产概况">
							   <div class="in-block">
									<i style="display: block;"></i> 
									<span class="span1" style="display: inline;">生产概况</span>
									<i class="in-none toLeft1" style="display: none;"></i> 
									<span class="in-text" style="display: none;">
										<p>完备的规划是指引</p>
										<p>我们取得成功的前提</p>
									</span>
								</div>
							</a> 
					</li>
				
					<li class="in-jbk in-liangpin"> 
							<a href="general/general.php?form=general-liangpin" title="良种介绍">
							   <div class="in-block">
									<i style="display: block;"></i> 
									<span class="span1" style="display: inline;">良种介绍</span>
									<i class="in-none toLeft1" style="display: none;"></i> 
									<span class="in-text" style="display: none;">
										<p>完备的规划是指引</p>
										<p>我们取得成功的前提</p>
									</span>
								</div>
							</a> 
					</li>
					<ul>
				</div>
				<!--content--end-->
				<script src="js/core.js"></script>
				<script src="js/jquery.min.js"></script>
				<script>
    			seajs.use('jquery',function($) {
					$(function () {
						 //
						$(".index-con .in-kct").hover(function() {
							$(this).find('i:first').addClass('smaller').removeClass('bigger')
							$(this).find('span:first').fadeOut('')
							$(this).find('.in-text').show('fast').addClass('show')
							$(this).find('.ch').removeClass('')
						}, function() {
							$(this).find('i:first').removeClass('smaller').addClass('bigger')
							$(this).find('span:first').fadeIn('')
							$(this).find('.in-text').hide('')
							$(this).find('.ch').addClass('show')
						})
						
						$(".index-con .in-plan").hover(function() {
							$(this).find('i:first').addClass('hide')
							$(this).find('span:first').hide('')
							$(this).find('.in-text').show('').addClass('show')
							$(this).find('.in-none').show('').addClass('toLeft1').removeClass('toRight1')
						}, function() {
							$(this).find('i:first').addClass('hide')
							$(this).find('span:first').fadeIn('')
							$(this).find('.in-text').hide('').removeClass('show')
							$(this).find('.in-none').show().addClass('toRight1').removeClass('toLeft1')
						})
						
						
						$(".index-con .in-jishu,.index-con .in-shenchan,.index-con .in-liangpin").hover(function() {
							$(this).find('i:first').addClass('hide')
							$(this).find('span:first').hide('')
							$(this).find('.in-text').show('').addClass('show')
							$(this).find('.in-none').show('').addClass('toLeft1').removeClass('toRight1')
						}, function() {
							$(this).find('i:first').addClass('hide')
							$(this).find('span:first').fadeIn('')
							$(this).find('.in-text').hide('').removeClass('show')
							$(this).find('.in-none').show().addClass('toRight1').removeClass('toLeft1')
						})
						
					});
				})
			</script>
			</div>
			<!--||资源概括end>-->
			
			
			

			
			<!--||下载star>-->
			<div id="xiazai">
				<!--||下载title-star>-->
				<div class="xiazai-title">
					<ul>
						<li><a href="xiazai/xiazai.php?form=xiazai-gonggao&page=1">相关公告</a></li>
						<li><a href="xiazai/xiazai.php?form=xiazai-ziliao&page=1">相关动态</a></li>
						<li><a href="xiazai/xiazai.php?form=xiazai-qikan&page=1">电子期刊</a></li>
					</ul>
				</div>
				<!--||下载title-end>-->
				
				<!--||下载-内容star>-->
				<div class="xiazai-content">
				
					<!--相关公告-->
					<div class="part">
						<div class="title">
							<span>相关公告</span>
							<a href="xiazai/xiazai.php?form=xiazai-gonggao">更多></a>
						</div>
						<div class="content1">
								<?php xiazai_ziliao($sql_xiazai_gonggao,6); ?>
						</div>
					</div>
					<!--相关公告end-->
					
					<!--相关资料-->
					<div class="part">
						<div class="title">
							<span>相关资料</span>
							<a href="xiazai/xiazai.php?form=xiazai-ziliao">更多></a>
						</div>
						<div class="content1">
								<?php xiazai_ziliao($sql_xiazai_ziliao,6); ?>
						</div>
					</div>
					<!--相关资料end-->
					
					<!--电子期刊star-->
					<div class="part part2">
						<div class="title">
							<span>电子期刊</span>
							<a href="xiazai/xiazai.php?form=xiazai-qikan">更多></a>
						</div>
						<div class="content1">
								<?php xiazai_ziliao($sql_xiazai_qikan,6); ?>
						</div>
					</div>
					<!--电子期刊end-->
					
				</div>
				<!--||下载-内容end>-->
			</div>
			<!--||下载end>-->
			
			
			
			<!--||图片库star>-->
			<div id="picture">
				<!--title-->
				<div class="title">
					<a class="a2" href="picture/picture.php">更多></a>
				</div>
				<!--content-->
				<div class="content">
					<?php picture_img($sql_picture,0,6); ?>
				</div>
			</div>
			<!--||图片库end>-->
			
			
			
			
			<!--||链接star>-->
			<div id="link">
				<div class="title">
					<ul>
						<li class="link_8">国家科技平台导航</li>
						<li class="link_9 link_hide">国家林木种质资源库</li>
						<li class="link_5 link_hide">平台会员单位</li>
						<li class="link_5 link_hide">下属子平台</li>
						<li class="link_6 link_hide">相关网站导航</li>
						<li class="link_6 link_hide">外来树种单位</li>
					</ul>
				</div>
				<div class="content">
					<div id="link_0" class="link_content">
						<ul>
							<li><a href="http://www.cfsdc.org/">林业科学数据平台</a></li>
							<li><a href="https://escience.org.cn/">中国科技资源网</a></li>
							<li><a href="http://www.nsii.org.cn/">中国科技资源网</a></li>
							<li><a href="http://www.nsii.org.cn/2017/home.php">标本资源共享平台</a></li>
							<li><a href="http://zzzy.fishinfo.cn/">水产种质资源平台</a></li>
							<li><a href="http://www.cdcm.net/">国家微生物资源平台</a></li>
						
							<li><a href="http://www.cdad-is.org.cn/">家养动物种质资源平台</a></li>
							<li><a href="http://www.cgris.net/">国家农作物种质资源平台</a></li>
							
							<li><a href="http://cellresource.cn/">国家实验细胞资源共享平台</a></li>
							<li><a href="http://www.ncrm.org.cn/">国家标准物质资源共享平台</a></li>
							<li><a href="http://www.agridata.cn/">农业科学数据共享中心</a></li>
							<li><a href="http://data.cma.cn/">气象科学数据共享中心</a></li>
							<li><a href="http://data.earthquake.cn/">地震科学数据共享中心</a></li>
							<li><a href="http://www.geodata.cn/">地球系统科学数据共享平台</a></li>
							<li><a href="http://www.ncmi.cn/">人口与健康科学数据共享平台</a></li>
							<li><a href="http://www.nstl.gov.cn/">国家科技图书文献中心</a></li>
							
							<li><a href="http://www.cssn.net.cn/">国家标准文献共享服务平台</a></li>
							<li><a href="https://www.cdstm.cn/">中国数字科技馆</a></li>
							<li><a href="https://www.cdstm.cn/">北京离子探针中心</a></li>
							<li><a href="http://www.bjshrimp.cn/">中国应急分析测试平台</a></li>
							<li><a href="http://www.ceas.org.cn/">国家大型科学仪器中心</a></li>
							<li><a href="http://www.npsic.cn/">国家生态系统观测研究网络</a></li>
							<li><a href="http://www.cnern.org/">国家计量基标准(物理部分)</a></li>
							<li><a href="http://www.nms.org.cn/">地国家材料环境腐蚀野外科学观测研究</a></li>
							
						</ul>
					</div>
					<div id="link_1" class="link_content" style="display: none">
						<ul>
							<li><a href="#">北京市海棠种质资源库</a></li>
							<li><a href="#">中国林科院华北林业实验中心</a></li>
							<li><a href="#">国际竹藤中心竹类与花卉</a></li>
							<li><a href="#">中国林科院林业研究所</a></li>
							
							<li><a href="#">喀左县山杏国家林木库</a></li>
							<li><a href="#">集安市刺楸国家林木库</a></li>
							<li><a href="#">上海市桃国家林木库</a></li>
							<li><a href="#">扬州市海棠国家林木库</a></li>
							
							<li><a href="#">浙江省金华市国际山茶</a></li>
							<li><a href="#">临安市天目山林场山核桃</a></li>
							<li><a href="#">福建省漳平市五一林场</a></li>
							<li><a href="#">齐云山食品有限公司</a></li>
							
			
						</ul>
					</div>
					<div id="link_2" class="link_content" style="display: none">
						<ul>
							<li><a href="http://www.genobank.org/">中国西南野生生物种质资源库</a></li>
							<li><a href="http://www.yunnan-flower.org.cn/">云南省花卉技术培训推广中心</a></li>
							<li><a href="http://www.hsu.edu.cn/">黄山学院</a></li>
							<li><a href="http://www.lgs.baafs.net.cn/">北京市农林科学院研究所</a></li>
							
							<li><a href="http://rif.caf.ac.cn/">中国林科院林业研究所</a></li>
							<li><a href="http://www.paulownia.ac.cn/">中国林科院经济林研究中心</a></li>
							<li><a href="http://www.qhnky.com/">青海省农林科学院</a></li>
							<li><a href="http://www.nxaas.com.cn/index.html">宁夏农林科学院</a></li>
							
							<li><a href="http://www.bua.edu.cn/">北京农学院</a></li>
							<li><a href="http://www.jxlky.cn/">江西省林业科学院</a></li>
							<li><a href="http://www.gsdcri.com/">甘肃省治沙研究所</a></li>
							<li><a href="http://www.pzhsnly.com/">攀枝花市农林科学研究院</a></li>
							<li><a href="http://www.zjjpark.com/">湖南张家界森林公园管理处</a></li>
							<li><a href="http://www.zjfc.edu.cn/">浙江农林大学</a></li>
						</ul>
					</div>
					<div id="link_3" class="link_content" style="display: none">
						<ul>
							<li><a href="http://www.garden.sh.cn/">上海市园林科学规划研究院</a></li>
							<li><a href="http://www.fgr.cn/">国际竹藤中心</a></li>
							<li><a href="#">浙江省林木种质资源子平台</a></li>
							<li><a href="#">原地保存子平台</a></li>
							<li><a href="#">植物园子平台</a></li>
							<li><a href="#">外来树种种质资源子平台</a></li>
						</ul>
					</div>
					<div id="link_4" class="link_content" style="display: none">
						<ul>
							<li><a href="http://rif.caf.ac.cn/">林业研究所</a></li>
							<li><a href="http://www.caf.ac.cn/">中国林业科学研究院</a></li>
							<li><a href="http://www.cnpvp.gov.cn/">林业植物新品种保护</a></li>
							<li><a href="http://www.forestry.gov.cn/">中国林业网</a></li>
						</ul>
						</ul>
					</div>
					<div id="link_5" class="link_content" style="display: none">
						<ul>
							<li><a href="#">江门狮山林场</a></li>
							<li><a href="#">江门大沙林场</a></li>
							<li><a href="#">湛江林木良种场</a></li>
							<li><a href="#">云南楚雄林科所</a></li>
							
							<li><a href="#">广东江门林科所</a></li>
							<li><a href="#">广东佛山林科所</a></li>
							<li><a href="#">福建省长泰岩溪国有林场</a></li>
							<li><a href="#">广西合浦林科所</a></li>
							
							<li><a href="#">广东湛江市林科所</a></li>
							<li><a href="#">福建龙海九龙岭林场</a></li>
							
						</ul>
					</div>
					
				</div>
				<!--js动态-->
				<script language="javascript">
					$(function(){
						//初始化
						    var link=$("#link");
							var content=$("#link .content #link_0");
							var content_height=content.height();
							if(content_height>200){
								link.height(content_height+10);
							}
							else if(content_height<200){
								link.height(244);
							}
						$("#link .title ul li").hover(function() {
							$(this).removeClass('link_hide');
							$(this).siblings().addClass('link_hide'); 
							var link_num=$(this).index();
							$("#link .content #link_"+link_num).show().addClass('show');
							$("#link .content #link_"+link_num).siblings().hide();
						    var link=$("#link");
							var content=$("#link .content #link_"+link_num);
							var content_height=content.height();
							if(content_height>200){
								link.height(content_height+10);
							}
							else if(content_height<200){
								link.height(244);
							}
						});
						
					});
				</script>
			</div>
			<!--||链接end>-->
			
			
			
			<!--固定三案按钮star-->
			<div id="float_3">
				<div class="weather">
					<div class="iframe2">
						<iframe src="//www.seniverse.com/weather/weather.aspx?uid=U9F23C6D97&cid=CHBJ000000&l=zh-CHS&p=SMART&a=1&u=C&s=11&m=2&x=1&d=3&fc=&bgc=&bc=&ti=0&in=0&li=" frameborder="0" scrolling="no" width="230" height="250" allowTransparency="true"></iframe>
					</div>
				</div>
				<div class="kefu">
					<div class="kefu1">
						<ul class="kefu2">
							<li>QQ:11312312</li>
							<li>QQ:11312312</li>
							<li>服务热线:1231561</li>
						</ul>
					</div>
				</div>
				<div class="hui_top" id="hui_top"></div>
			</div>
			
			<script type="text/javascript">
				$(function(){
					//设置位置
					var body_width=parseInt($('body, html').width());
					var float_right=((body_width-1004)/2)-(95+64);
					var scroll=parseInt($(window).scrollTop());
					
					//初始位置
					if(body_width<1088){
							$("#float_3").css({'display':'none'});
						}
						else if(body_width>=1180&&body_width<=1366){
							$("#float_3").css({'display':'block'});
						}
						else if(body_width>1366){
							$("#float_3").css({'display':'block'});
							$("#float_3").css({'right':float_right});
							
						}
					//浏览器窗口变化时
					$(window).resize(function(){
						body_width=parseInt($('body, html').width());
						float_right=((body_width-1004)/2)-(80+64);
						if(body_width<1088){
							$("#float_3").css({'display':'none'});
						}
						else if(body_width>=1180&&body_width<=1366){
							$("#float_3").css({'display':'block'});
						}
						else if(body_width>1366){
							$("#float_3").css({'display':'block'});
							$("#float_3").css({'right':float_right});
							
						}
					});
					//滚动条滚动时触发事件
					$(window).scroll(function(){
						body_width=parseInt($('body, html').width());
						float_right=((body_width-1004)/2)-(80+64);
						scroll=parseInt($(window).scrollTop());
						if(scroll>=510){
							if(float_right<0){
								$("#float_3").css({'position':'fixed','top':15,'right':20});
							}
							else{	
								$("#float_3").css({'position':'fixed','top':15,'right':float_right});
							}
						}
						else if(scroll<510){
							if(float_right<0){
								$("#float_3").css({'position':'absolute','top':510,'right':20});
							}
							else{
								$("#float_3").css({'position':'absolute','top':510,'right':float_right});
							}
						}
						
						
					});
					
					//点击返回头部时触发返回到头部的事件
					$('#hui_top').click(function(){
						$('body, html').animate({scrollTop:200},10);
					});
				});
			</script>
			<!--固定三案按钮end-->
			
			
			<div style="clear: both;"></div>
	</div>
			
			
  	<!-------------------------------------------------------->
  	<!--尾-->
	<div id="bottom">
		<div class="span">
			<div class="span1">
				项目支持：中华人名共和国科学科技部&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;主管部门与单位：国家林业局 中国林业科学研究院
			</div>
			<div class="span2">
				<p>建设单位：中国林业科学研究院林业研究所等 国家林木种质资源平台  版权所有</p>
				<p>联系地址：北京市海淀区青龙桥东小府1号中国林科院林业所  邮编:100091 </p>
				<p>电话：010-62889633  电子邮件：chinafgr@126.com </p>
			</div>
			<div class="span3">
				<a href="denglu.php">管理员登录</a>
			</div>
		</div>
	</div>
</body>
</html>
