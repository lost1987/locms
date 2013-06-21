<?php /* Smarty version Smarty-3.1.12, created on 2013-02-18 11:57:46
         compiled from "/Users/lost/www/locms/manage/templates/admin_add.html" */ ?>
<?php /*%%SmartyHeaderCode:1775297539511cb975118d70-09086891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b4ad8073e44dd8aa0bbfc354e4880ca89b50028' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/admin_add.html',
      1 => 1361159859,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1775297539511cb975118d70-09086891',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_511cb975186c39_11490670',
  'variables' => 
  array (
    'admin' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_511cb975186c39_11490670')) {function content_511cb975186c39_11490670($_smarty_tpl) {?><div class="pageFormContent">
	<form method="post" action="<?php echo smarty_site_url(array('action_method'=>'admin/save'),$_smarty_tpl);?>
" onsubmit="return validateCallback(this, navTabAjaxDone)">
		<input type="hidden" name ="id" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['admin']->value['id'])===null||$tmp==='' ? '' : $tmp);?>
">
		<fieldset>
			<legend><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</legend>
			<dl class="nowrap">
				<dt>用户名:</dt>
				<dd><input type="text" minlength = "4" class="textInput required lettersonly" name="admin" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['admin']->value['admin'])===null||$tmp==='' ? '' : $tmp);?>
" /></dd>
			</dl>
			<dl class="nowrap">
				<dt>姓名:</dt>
				<dd>
					<input type="text" class="textInput required" name="truename" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['admin']->value['truename'])===null||$tmp==='' ? '' : $tmp);?>
" />
				</dd>
			</dl>
			<dl class="nowrap">
				<dt>密码:</dt>
				<dd><input type="password" id="password" class="textInput" minlength="6" name="passwd" value="" /></dd>
			</dl>
			<dl class="nowrap">
				<dt>重复密码:</dt>
				<dd><input type="password" class="textInput"  minlength="6" name="passwd_again" value="" /></dd>
			</dl>
		</fieldset>
		
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">提交</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
</div><?php }} ?>