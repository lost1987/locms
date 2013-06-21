<?php /* Smarty version Smarty-3.1.12, created on 2013-02-21 16:38:46
         compiled from "/Users/lost/www/locms/manage/templates/login.html" */ ?>
<?php /*%%SmartyHeaderCode:6245540005122f19816f585-06629117%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9928a4d5261e49ed94bbe52d8a33685d3b48377f' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/login.html',
      1 => 1361435328,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6245540005122f19816f585-06629117',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5122f1981b8575_30548363',
  'variables' => 
  array (
    'error_msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5122f1981b8575_30548363')) {function content_5122f1981b8575_30548363($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link href="<?php echo @WEBROOT;?>
css/admin/login.css" rel="stylesheet" type="text/css" />
    <link media="all" rel="stylesheet" type="text/css" href="<?php echo @WEBROOT;?>
js/dialog/default.css" />
    <script type="text/javascript" src="<?php echo @WEBROOT;?>
js/jquery-1.7.2.js"></script>
    <script src="<?php echo @WEBROOT;?>
js/dialog/artDialog.min.js"></script>


<body onkeydown="enterSubmit(event)">

<div id="container">
<div id="form_el">
	<form action="<?php echo smarty_site_url(array('action_method'=>'login/dologin'),$_smarty_tpl);?>
" method="post" id="loginform">
		<span class="login_span"><input type="text" name="username" id="username" class="login_input" /></span>
		<span class="login_span"><input type="password" name="password" id="password" class="login_input" /></span>
		<span class="login_btn_span"><input type="button" value= "登  录" class="login_btn" onclick="login()" /></span>
        <br/>
        <p id="tips"><?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
</p>
	</form>
</div>
</div>
<script type="text/javascript" >
    function login(){
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        art.dialog({title:false,padding:0,showborder:false,showclose:false});
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


</html>

<?php }} ?>