<?php /* Smarty version Smarty-3.1.12, created on 2013-02-25 17:29:11
         compiled from "/Users/lost/www/locms/application/templates/index.html" */ ?>
<?php /*%%SmartyHeaderCode:1587144547510a1f34cf3414-60220636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bad7876abc80f41033f6afcc33a8b565d1f6542f' => 
    array (
      0 => '/Users/lost/www/locms/application/templates/index.html',
      1 => 1361435347,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1587144547510a1f34cf3414-60220636',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_510a1f34d33794_24391826',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_510a1f34d33794_24391826')) {function content_510a1f34d33794_24391826($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN""http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-hans" version="XHTML+RDFa 1.0" dir="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?php echo @WEBROOT;?>
css/style.css" />
    <title></title>
    <script type="text/javascript" src="<?php echo @WEBROOT;?>
js/jquery-1.7.2.min.js" ></script>
    <script type="text/javascript" src="<?php echo @WEBROOT;?>
jslib/lost.js" ></script>
    <script>
        $(function(){
            $("#container").waterfall({
                     width:175,
                     space:25,
                     borderStyle:{border:'5px white solid'},
                     loadParam:{
                         element:'#container',
                         url:'<?php echo smarty_site_url(array('action_method'=>"waterfall/fall"),$_smarty_tpl);?>
',
                         type:'POST',
                         dataType:'html',
                         data:'op=next',
                         waterfall:true,
                         start:0,
                         limit:20,
                         wait_img:'<?php echo @WEBROOT;?>
imagelib/loading.gif'
                     },
                     resizelimit:3,
                     divheight:35,
                     clickEvent:null
            });
        });
    </script>
</head>
<body>

<div class="top">
     <span class="logo"><a href=""><img src="<?php echo @WEBROOT;?>
imagelib/logo.png"  /></a></span>
     <span class="user_icos"><a href=""><img src="<?php echo @WEBROOT;?>
imagelib/user_ico.png" /></a><a href=""><img src="<?php echo @WEBROOT;?>
imagelib/msg_ico.png" /></a><a href=""><img src="<?php echo @WEBROOT;?>
imagelib/earth_ico.png" /></a></span>
     <span class="main_search"><input type="text" name="keywords" /><img src="<?php echo @WEBROOT;?>
imagelib/search_btn.png" onclick="alert('123')"/></span>
     <span class="userinfo">
         <!--<a href="" class="avatar"><img src="images/avatar.jpg" width="30" height="30"/></a>
         <a href="">____lOst___</a>-->

        账号 <input type="text" class='formtext' name="username" id="username" />
        密码 <input type="password" class='formtext' name="password" id="password" />
        <input type="button" class="norm_btn" value="登录" />
        <input type="button" class="norm_btn" value="注册" />
     </span>
</div>

<div id="container">


</div>

</body>
</html><?php }} ?>