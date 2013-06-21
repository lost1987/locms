<?php /* Smarty version Smarty-3.1.12, created on 2013-02-25 15:12:44
         compiled from "/Users/lost/www/locms/manage/templates/index.html" */ ?>
<?php /*%%SmartyHeaderCode:16127850715113b09cbbff03-02160463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f3a24adfc1057dddf4270d041d0c1fc3d5ef4a5' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/index.html',
      1 => 1361776361,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16127850715113b09cbbff03-02160463',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5113b09ccf2761_30363734',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5113b09ccf2761_30363734')) {function content_5113b09ccf2761_30363734($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>LOCMS</title>

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
<link media="all" rel="stylesheet" type="text/css" href="<?php echo @WEBROOT;?>
js/dialog/default.css" />

<script src="<?php echo @WEBROOT;?>
js/dialog/artDialog.min.js"></script>
<script src="<?php echo @WEBROOT;?>
js/dialog/artDialog.plugins.min.js"></script>
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
		loginUrl:"<?php echo smarty_site_url(array('action_method'=>'login/loginpage'),$_smarty_tpl);?>
", loginTitle:"登录",	// 弹出登录对话框
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
					<li><a href="javascript:;" ><?php echo smarty_cookie_decode(array('key'=>'admin'),$_smarty_tpl);?>
</a></li>
					<li><a href="<?php echo smarty_site_url(array('action_method'=>'login/logout'),$_smarty_tpl);?>
">退出</a></li>
				</ul>
				<ul class="themeList" id="themeList">
					<li theme="default"><div class="selected">蓝色</div></li>
				</ul>
			</div>

			<!-- navMenu -->
			
		</div>

        <?php echo $_smarty_tpl->getSubTemplate ('menu.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



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


<script> $(function(){ $(".tabsPageContent").css('overflow-y','scroll'); })</script>

</body>
</html><?php }} ?>