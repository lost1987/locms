<?php /* Smarty version Smarty-3.1.12, created on 2013-01-20 16:43:15
         compiled from "/Users/lost/www/locms/manage/templates/static/list.html" */ ?>
<?php /*%%SmartyHeaderCode:205350041350fbae233d69f3-14515790%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'efe0714844ee83647c6a6adef97b2f6f49075e0d' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/static/list.html',
      1 => 1358666738,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '205350041350fbae233d69f3-14515790',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'element' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50fbae23409af7_23090253',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fbae23409af7_23090253')) {function content_50fbae23409af7_23090253($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<ul>

    <?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value){
$_smarty_tpl->tpl_vars['element']->_loop = true;
?>
     <?php echo $_smarty_tpl->tpl_vars['element']->value['title'];?>

    <?php } ?>

</ul>
</body>
</html><?php }} ?>