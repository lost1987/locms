<?php /* Smarty version Smarty-3.1.12, created on 2013-01-09 16:55:45
         compiled from "/Users/lost/www/locms/manage/templates/index.html" */ ?>
<?php /*%%SmartyHeaderCode:212725438550ed3091e2a263-09701469%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f3a24adfc1057dddf4270d041d0c1fc3d5ef4a5' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/index.html',
      1 => 1357718227,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212725438550ed3091e2a263-09701469',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50ed309206ffa1_09155649',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ed309206ffa1_09155649')) {function content_50ed309206ffa1_09155649($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>简单实用国产jQuery UI框架 - DWZ富客户端框架(J-UI.com)</title>

<link href="<?php echo @WEBROOT;?>
themes/default/style.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="<?php echo @WEBROOT;?>
themes/css/core.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="<?php echo @WEBROOT;?>
themes/css/print.css" rel="stylesheet" type="text/css" media="print"/>
<!--[if IE]>
<link href="<?php echo @WEBROOT;?>
themes/css/ieHack.css" rel="stylesheet" type="text/css" media="screen"/>
<![endif]-->

<script src="<?php echo @WEBROOT;?>
js/speedup.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/jquery-1.7.2.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/jquery.cookie.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/jquery.bgiframe.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
xheditor/xheditor-1.1.14-zh-cn.min.js" type="text/javascript"></script>


<!-- svg图表  supports Firefox 3.0+, Safari 3.0+, Chrome 5.0+, Opera 9.5+ and Internet Explorer 6.0+ -->
<script type="text/javascript" src="<?php echo @WEBROOT;?>
chart/raphael.js"></script>
<script type="text/javascript" src="<?php echo @WEBROOT;?>
chart/g.raphael.js"></script>
<script type="text/javascript" src="<?php echo @WEBROOT;?>
chart/g.bar.js"></script>
<script type="text/javascript" src="<?php echo @WEBROOT;?>
chart/g.line.js"></script>
<script type="text/javascript" src="<?php echo @WEBROOT;?>
chart/g.pie.js"></script>
<script type="text/javascript" src="<?php echo @WEBROOT;?>
chart/g.dot.js"></script>

<script src="<?php echo @WEBROOT;?>
js/dwz.core.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.util.date.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.validate.method.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.regional.zh.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.barDrag.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.drag.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.tree.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.accordion.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.ui.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.theme.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.switchEnv.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.alertMsg.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.contextmenu.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.navTab.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.tab.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.resize.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.dialog.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.dialogDrag.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.sortDrag.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.cssTable.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.stable.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.taskBar.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.ajax.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.pagination.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.database.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.datepicker.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.effects.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.panel.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.checkbox.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.history.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.combox.js" type="text/javascript"></script>
<script src="<?php echo @WEBROOT;?>
js/dwz.print.js" type="text/javascript"></script>
<!--
<script src="bin/dwz.min.js" type="text/javascript"></script>
-->
<script src="<?php echo @WEBROOT;?>
js/dwz.regional.zh.js" type="text/javascript"></script>

<script type="text/javascript">
$(function(){
	DWZ.init("<?php echo @WEBROOT;?>
dwz.frag.xml", {
		loginUrl:"login_dialog.html", loginTitle:"登录",	// 弹出登录对话框
//		loginUrl:"login.html",	// 跳到登录页面
		statusCode:{ok:200, error:300, timeout:301}, //【可选】
		pageInfo:{pageNum:"pageNum", numPerPage:"numPerPage", orderField:"orderField", orderDirection:"orderDirection"}, //【可选】
		debug:false,	// 调试模式 【true|false】
		callback:function(){
			initEnv();
			$("#themeList").theme({themeBase:"<?php echo @WEBROOT;?>
themes"}); // themeBase 相对于index页面的主题base路径
		}
	});
});

</script>
</head>

<body scroll="no">
	<div id="layout">
		<div id="header">
			<div class="headerNav">
				<a class="logo" href="http://j-ui.com">标志</a>
				<ul class="nav">
					<li id="switchEnvBox"><a href="javascript:">（<span>北京</span>）切换城市</a>
						<ul>
							<li><a href="sidebar_1.html">北京</a></li>
							<li><a href="sidebar_2.html">上海</a></li>
							<li><a href="sidebar_2.html">南京</a></li>
							<li><a href="sidebar_2.html">深圳</a></li>
							<li><a href="sidebar_2.html">广州</a></li>
							<li><a href="sidebar_2.html">天津</a></li>
							<li><a href="sidebar_2.html">杭州</a></li>
						</ul>
					</li>
					<li><a href="https://me.alipay.com/dwzteam" target="_blank">捐赠</a></li>
					<li><a href="changepwd.html" target="dialog" width="600">设置</a></li>
					<li><a href="http://www.cnblogs.com/dwzjs" target="_blank">博客</a></li>
					<li><a href="http://weibo.com/dwzui" target="_blank">微博</a></li>
					<li><a href="http://bbs.dwzjs.com" target="_blank">论坛</a></li>
					<li><a href="login.html">退出</a></li>
				</ul>
				<ul class="themeList" id="themeList">
					<li theme="default"><div class="selected">蓝色</div></li>
					<li theme="green"><div>绿色</div></li>
					<!--<li theme="red"><div>红色</div></li>-->
					<li theme="purple"><div>紫色</div></li>
					<li theme="silver"><div>银色</div></li>
					<li theme="azure"><div>天蓝</div></li>
				</ul>
			</div>

			<!-- navMenu -->
			
		</div>

		<div id="leftside">
			<div id="sidebar_s">
				<div class="collapse">
					<div class="toggleCollapse"><div></div></div>
				</div>
			</div>
			<div id="sidebar">
				<div class="toggleCollapse"><h2>主菜单</h2><div>收缩</div></div>

				<div class="accordion" fillSpace="sidebar">
					<div class="accordionHeader">
						<h2><span>Folder</span>全局设置</h2>
					</div>
					<div class="accordionContent">
						<ul class="tree treeFolder">
							<li><a href="javascript:;" target="navTab">运行环境</a>
								<ul>
									<li><a href="<?php echo smarty_site_url(array('action_method'=>'info'),$_smarty_tpl);?>
" target="navTab" rel="main">phpinfo</a></li>
                                    <li><a href="<?php echo @WEBROOT;?>
dwz.frag.xml" target="navTab" external="true">dwz.frag.xml</a></li>
								</ul>
							</li>
							
							<li><a>SEO设置</a>
								<ul>
									<li><a href="javascript:;" target="navTab" rel="w_panel">首页</a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="accordionHeader">
						<h2><span>Folder</span>内容管理</h2>
					</div>
					<div class="accordionContent">
						<ul class="tree treeFolder">
                            <li><a href="javascript:;">栏目</a>
                                <ul>
                                    <li><a href="<?php echo smarty_site_url(array('action_method'=>'arctype'),$_smarty_tpl);?>
" target="navTab" rel="arctype_list">列表</a></li>
                                    <li><a href="<?php echo smarty_site_url(array('action_method'=>'arctype/edit'),$_smarty_tpl);?>
" target="navTab" rel="arctype_edit">添加</a></li>
                                </ul>
                            </li>
							<li><a href="javascript:;">新闻</a>
                                <ul>
                                    <li><a href="<?php echo smarty_site_url(array('action_method'=>'news'),$_smarty_tpl);?>
" target="navTab" rel="news_list">列表</a></li>
                                    <li><a href="<?php echo smarty_site_url(array('action_method'=>'news/edit'),$_smarty_tpl);?>
" target="navTab" rel="news_edit">添加</a></li>
                                </ul>
                            </li>
							<li><a href="demo_page1.html" target="navTab" rel="demo_page2">表单查询页面</a></li>
							<li><a href="news_add.html" target="navTab" rel="demo_page4">表单录入页面</a></li>
							<li><a href="demo_page5.html" target="navTab" rel="demo_page5">有文本输入的表单</a></li>
							<li><a href="javascript:;">有提示的表单输入页面</a>
								<ul>
									<li><a href="javascript:;">页面一</a></li>
									<li><a href="javascript:;">页面二</a></li>
								</ul>
							</li>
							<li><a href="javascript:;">选项卡和图形的页面</a>
								<ul>
									<li><a href="javascript:;">页面一</a></li>
									<li><a href="javascript:;">页面二</a></li>
								</ul>
							</li>
							<li><a href="javascript:;">选项卡和图形切换的页面</a></li>
							<li><a href="javascript:;">左右两个互动的页面</a></li>
							<li><a href="javascript:;">列表输入的页面</a></li>
							<li><a href="javascript:;">双层栏目列表的页面</a></li>
						</ul>
					</div>
					<div class="accordionHeader">
						<h2><span>Folder</span>其他</h2>
					</div>
					<div class="accordionContent">
						<ul class="tree">
							<li><a href="newPage1.html" target="dialog" rel="dlg_page">列表</a></li>
							<li><a href="newPage1.html" target="dialog" rel="dlg_page2">列表</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="container">
			<div id="navTab" class="tabsPage">
				<div class="tabsPageHeader">
					<div class="tabsPageHeaderContent"><!-- 显示左右控制时添加 class="tabsPageHeaderMargin" -->
						<ul class="navTab-tab">
							<li tabid="main" class="main"><a href="javascript:;"><span><span class="home_icon">我的主页</span></span></a></li>
						</ul>
					</div>
					<div class="tabsLeft">left</div><!-- 禁用只需要添加一个样式 class="tabsLeft tabsLeftDisabled" -->
					<div class="tabsRight">right</div><!-- 禁用只需要添加一个样式 class="tabsRight tabsRightDisabled" -->
					<div class="tabsMore">more</div>
				</div>
				<ul class="tabsMoreList">
					<li><a href="javascript:;">我的主页</a></li>
				</ul>
				<div class="navTab-panel tabsPageContent layoutBox">
					<div class="page unitBox">
						<div class="accountInfo">
							<div class="alertInfo">
								<h2><a href="doc/dwz-user-guide.pdf" target="_blank">DWZ框架使用手册(PDF)</a></h2>
								<a href="doc/dwz-user-guide.swf" target="_blank">DWZ框架演示视频</a>
							</div>
							<div class="right">
								<p><a href="doc/dwz-user-guide.zip" target="_blank" style="line-height:19px">DWZ框架使用手册(CHM)</a></p>
								<p><a href="doc/dwz-ajax-develop.swf" target="_blank" style="line-height:19px">DWZ框架Ajax开发视频教材</a></p>
							</div>
							<p><span>DWZ富客户端框架</span></p>
							<p>DWZ官方微博:<a href="http://weibo.com/dwzui" target="_blank">http://weibo.com/dwzui</a></p>
						</div>
						<div class="pageFormContent" layoutH="80" style="margin-right:230px">
							
							<p style="color:red">DWZ官方微博 <a href="http://weibo.com/dwzui" target="_blank">http://weibo.com/dwzui</a></p>
							<p style="color:red">DWZ官方微群 <a href="http://q.weibo.com/587328/invitation=11TGXSt-148c2" target="_blank">http://q.weibo.com/587328/invitation=11TGXSt-148c2</a></p>

<div class="divider"></div>
<h2>dwz v1.2视频教程:</h2>
<p><a href="http://www.u-training.com/thread-57-1-1.html" target="_blank">http://www.u-training.com/thread-57-1-1.html</a></p>

<div class="divider"></div>
<h2>DWZ系列开源项目:</h2>
<div class="unit"><a href="http://code.google.com/p/dwz/" target="_blank">dwz富客户端框架 - jUI</a></div>
<div class="unit"><a href="http://code.google.com/p/dwz4j" target="_blank">dwz4j(Java Web)快速开发框架 + jUI整合应用</a></div>
<div class="unit"><a href="http://code.google.com/p/j-hi" target="_blank">J-HI(Java Web)快速开发平台 + jUI整合应用（Eclipse插件生成项目代码）</a></div>
<div class="unit"><a href="http://code.google.com/p/dwz4php" target="_blank">ThinkPHP + jUI整合应用</a></div>
<div class="unit"><a href="http://code.google.com/p/dwz4php" target="_blank">Zend Framework + jUI整合应用</a></div>
<div class="unit"><a href="http://www.yiiframework.com/extension/dwzinterface/" target="_blank">YII + jUI整合应用</a></div>

<div class="divider"></div>
<h2>常见问题及解决:</h2>
<pre style="margin:5px;line-height:1.4em">
Error loading XML document: dwz.frag.xml
直接用IE打开index.html弹出一个对话框：Error loading XML document: dwz.frag.xml
原因：没有加载成功dwz.frag.xml。IE ajax laod本地文件有限制, 是ie安全级别的问题, 不是框架的问题。
解决方法：用firefox打开或部署到apache下。
</pre>

<div class="divider"></div>
<h2>有偿服务请联系:</h2>
<pre style="margin:5px;line-height:1.4em;">
定制化开发，公司培训，技术支持
合作电话：010-52897073
邮箱：support@dwzjs.com
</pre>
						</div>
						
						<div style="width:230px;position: absolute;top:60px;right:0" layoutH="80">
							<iframe width="100%" height="430" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?width=0&height=430&fansRow=2&ptype=1&skin=1&isTitle=0&noborder=1&isWeibo=1&isFans=0&uid=1739071261&verifier=c683dfe7"></iframe>
						</div>
					</div>
					
				</div>
			</div>
		</div>

	</div>

	<div id="footer">Copyright &copy; 2010 <a href="demo_page2.html" target="dialog">DWZ团队</a> Tel：010-52897073</div>

<!-- 注意此处js代码用于google站点统计，非DWZ代码，请删除 -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-16716654-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? ' https://ssl' : ' http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<script> $(function(){ $(".tabsPageContent").css('overflow-y','scroll'); })</script>

</body>
</html><?php }} ?>