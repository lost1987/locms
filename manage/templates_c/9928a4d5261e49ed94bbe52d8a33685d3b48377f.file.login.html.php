<?php /* Smarty version Smarty-3.1.12, created on 2013-01-10 14:57:39
         compiled from "/Users/lost/www/locms/manage/templates/login.html" */ ?>
<?php /*%%SmartyHeaderCode:148960328950ee66631cc313-52825017%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9928a4d5261e49ed94bbe52d8a33685d3b48377f' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/login.html',
      1 => 1357718302,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148960328950ee66631cc313-52825017',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error_msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50ee66633302f9_91559350',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ee66633302f9_91559350')) {function content_50ee66633302f9_91559350($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>风险管理平台</title>
<link href="<?php echo @WEBROOT;?>
themes/css/login.css" rel="stylesheet" type="text/css" />
</head>

<body onkeydown="enterSubmit(event)">
	<div id="login">
		<div id="login_header">
			<h1 class="login_logo">
				<a href="http://demo.dwzjs.com"><img src="<?php echo @WEBROOT;?>
themes/default/images/login_logo.gif" /></a>
			</h1>
			<div class="login_headerContent">
				<div class="navList">
					<ul>
						<li><a href="#">设为首页</a></li>
						<li><a href="http://bbs.dwzjs.com">反馈</a></li>
						<li><a href="doc/dwz-user-guide.pdf" target="_blank">帮助</a></li>
					</ul>
				</div>
				<h2 class="login_title"><img src="<?php echo @WEBROOT;?>
themes/default/images/login_title.png" /></h2>
			</div>
		</div>
		<div id="login_content">
			<div class="loginForm">
				<form action="<?php echo smarty_site_url(array('action_method'=>'login/dologin'),$_smarty_tpl);?>
" method="post" id="loginform">
					<p>
						<label>用户名：</label>
						<input type="text" name="username" size="20" id="username" class="login_input" />
					</p>
					<p>
						<label>密码：</label>
						<input type="password" name="password" size="20" id="password" class="login_input" />
					</p>
					<div class="login_bar">
						<input class="sub" type="button" value=" " onclick = 'login()'/><?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>

					</div>
				</form>
			</div>
			<div class="login_banner"><img src="<?php echo @WEBROOT;?>
themes/default/images/login_banner.jpg" /></div>
			<div class="login_main">
				<ul class="helpList">
					<li><a href="#">下载驱动程序</a></li>
					<li><a href="#">如何安装密钥驱动程序？</a></li>
					<li><a href="#">忘记密码怎么办？</a></li>
					<li><a href="#">为什么登录失败？</a></li>
				</ul>
				<div class="login_inner">
					<p>您可以使用 网易网盘 ，随时存，随地取</p>
					<p>您还可以使用 闪电邮 在桌面随时提醒邮件到达，快速收发邮件。</p>
					<p>在 百宝箱 里您可以查星座，订机票，看小说，学做菜…</p>
				</div>
			</div>
		</div>
		<div id="login_footer">
			Copyright &copy; 2009 www.dwzjs.com Inc. All Rights Reserved.
		</div>
	</div>

<script type="text/javascript" >
    function login(){
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        if(username != '' && password != ''){
            document.getElementById('loginform').submit();
        }
    }

    function enterSubmit(event){
        var e = event || window.event;
        if(e.keyCode == 13){
            login();
        }
    }
</script>
</body>
</html><?php }} ?>