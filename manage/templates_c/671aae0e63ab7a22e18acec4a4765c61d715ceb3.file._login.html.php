<?php /* Smarty version Smarty-3.1.12, created on 2013-01-18 10:24:02
         compiled from "/Users/lost/www/locms/manage/templates/_login.html" */ ?>
<?php /*%%SmartyHeaderCode:8604304450f7aac18bf343-08696996%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '671aae0e63ab7a22e18acec4a4765c61d715ceb3' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/_login.html',
      1 => 1358475838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8604304450f7aac18bf343-08696996',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f7aac1908a46_05099078',
  'variables' => 
  array (
    'error_msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f7aac1908a46_05099078')) {function content_50f7aac1908a46_05099078($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link href="<?php echo @WEBROOT;?>
css/login.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo @WEBROOT;?>
js/jquery-1.7.2.js"></script>
</head>
<body onkeydown="enterSubmit(event)">
<div id="login_tip">
    <?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>

</div>
<div id="container">
<div id="wrap">
<div id="login">
    <div id="login_title" ></div>
    <form action="<?php echo smarty_site_url(array('action_method'=>'login/dologin'),$_smarty_tpl);?>
" method="post" id="loginform">
        <p>
            <span><img src="<?php echo @WEBROOT;?>
images/login_07.gif" /></span>
            <input type="text" name="username" size="20" id="username" class="textinput" />
        </p>
        <p>
            <span><img src="<?php echo @WEBROOT;?>
images/login_10.gif" /></span>
            <input type="password" name="password" size="20" id="password" class="textinput" />
        </p>
        <div class="login_bar">
            <img src="<?php echo @WEBROOT;?>
images/login_13.png" id="btn" onclick = 'login()'/>
        </div>
    </form>
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