<?php /* Smarty version Smarty-3.1.12, created on 2013-02-01 10:42:40
         compiled from "/Users/lost/www/locms/application/templates/comet.html" */ ?>
<?php /*%%SmartyHeaderCode:683571364510b19d04378e0-08191891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '156fe171d828705cf542f05aee0a563330917a0c' => 
    array (
      0 => '/Users/lost/www/locms/application/templates/comet.html',
      1 => 1359686556,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '683571364510b19d04378e0-08191891',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_510b19d046a009_16430426',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_510b19d046a009_16430426')) {function content_510b19d046a009_16430426($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <title>comet</title>
</head>
<script type="text/javascript" src="<?php echo @WEBROOT;?>
js/jquery-1.7.2.min.js" ></script>
<script type="text/javascript" src="<?php echo @WEBROOT;?>
jslib/lost.js" ></script>
<script>
    $(function(){
        $.comet({
            url:"<?php echo smarty_site_url(array('action_method'=>'comet'),$_smarty_tpl);?>
",
            success:function(data){
                    $('body').append(data);
            }
        })
    })
</script>
<body>

</body>
</html><?php }} ?>