<?php /* Smarty version Smarty-3.1.12, created on 2013-02-18 09:13:34
         compiled from "/Users/lost/www/locms/manage/templates/admin_list.html" */ ?>
<?php /*%%SmartyHeaderCode:1551558584511cb9756af4c5-69781141%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad3fb953614f5cf04911e1f7fd798d4e0fbe1d4c' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/admin_list.html',
      1 => 1361149465,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1551558584511cb9756af4c5-69781141',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_511cb97579acf1_17658335',
  'variables' => 
  array (
    'page' => 0,
    'list' => 0,
    'element' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_511cb97579acf1_17658335')) {function content_511cb97579acf1_17658335($_smarty_tpl) {?><form id="pagerForm" method="post" action="<?php echo smarty_site_url(array('action_method'=>'admin'),$_smarty_tpl);?>
">
	<input type="hidden" name="pageNum" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['currentPage'];?>
" />
</form>
<div class="pageHeader">
	<form onsubmit="return navTabSearch(this);" rel="pagerForm" action="<?php echo smarty_site_url(array('action_method'=>'admin'),$_smarty_tpl);?>
" method="post">
	<div class="searchBar">
		<table class="searchContent">
			<tr>
				<td>
				<!--	用户名：<input type="text" name="username" value="<<?php ?>?= !empty($username) ? $username : '' ?<?php ?>>"/>-->
				</td>
			</tr>
		</table>
		<div class="subBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">搜索</button></div></div></li>
			</ul>
		</div>
	</div>
	</form>
</div>
<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="edit" href="<?php echo smarty_site_url(array('action_method'=>'admin/edit'),$_smarty_tpl);?>
?id={gid}" target="navTab"><span>编辑查看详情</span></a></li>
			<li><a class="delete" href="<?php echo smarty_site_url(array('action_method'=>'admin/del'),$_smarty_tpl);?>
?id={gid}" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<li><a class="delete" href="<?php echo smarty_site_url(array('action_method'=>'admin/del'),$_smarty_tpl);?>
" target="selectedTodo" rel="id" postType="string" title="确定要删除吗?"><span>批量删除</span></a></li>
			<li class="line">line</li>
		</ul>
	</div>
		<table class="table" width="100%" layoutH="138">
		<thead>
			<tr>
				<th width="1"><input type="checkbox" group="ids" class="checkboxCtrl"></th>
				<th width="50">ID</th>
				<th width="50">用户名</th>
				<th width="100">姓名</th>
				<th width="250">最后登录IP</th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value){
$_smarty_tpl->tpl_vars['element']->_loop = true;
?>
			<tr target="gid" rel="<?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
">
				<td><input name="ids" value="<?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
" type="checkbox"></td>
				<td><?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['element']->value['admin'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['element']->value['truename'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['element']->value['last_login_ip'];?>
</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<div class="panelBar">
		<div class="pages">
			<span>共: <font color="red"><?php echo $_smarty_tpl->tpl_vars['page']->value['totalCount'];?>
</font> 条记录</span>
		</div>
		<div class="pagination" targetType="navTab" totalCount="<?php echo $_smarty_tpl->tpl_vars['page']->value['totalCount'];?>
" numPerPage="<?php echo $_smarty_tpl->tpl_vars['page']->value['numPerPage'];?>
" pageNumShown="10" currentPage="<?php echo $_smarty_tpl->tpl_vars['page']->value['currentPage'];?>
"></div>
	</div>
</div>
<style type="text/css" media="screen">
	.imgs{text-align:center;}
	.imgs div{height:100px!important;}
</style><?php }} ?>