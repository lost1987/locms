<?php /* Smarty version Smarty-3.1.12, created on 2013-02-04 12:44:10
         compiled from "/Users/lost/www/locms/manage/templates/table_list.html" */ ?>
<?php /*%%SmartyHeaderCode:448210295510a76d84f67e5-60993396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18421b3ee7e3182f81007899a20f0f593ab69c22' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/table_list.html',
      1 => 1359952976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '448210295510a76d84f67e5-60993396',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_510a76d857eb57_72060473',
  'variables' => 
  array (
    'page' => 0,
    'list' => 0,
    'element' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_510a76d857eb57_72060473')) {function content_510a76d857eb57_72060473($_smarty_tpl) {?>
<form id="pagerForm" method="post" action="<?php echo smarty_site_url(array('action_method'=>'table'),$_smarty_tpl);?>
">
    <input type="hidden" name="pageNum" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['currentPage'];?>
" />
</form>
<div class="pageHeader">
    <form onsubmit="return navTabSearch(this);" rel="pagerForm" action="<?php echo smarty_site_url(array('action_method'=>'table'),$_smarty_tpl);?>
" method="post">
        <div class="searchBar">
            <table class="searchContent">
                <tr>
                    <td>

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
            <li><a class="add" href="<?php echo smarty_site_url(array('action_method'=>'table/edit'),$_smarty_tpl);?>
?op=edit&tableName={tableName}" target="navTab" ><span>编辑</span></a></li>
            <li><a class="delete" href="<?php echo smarty_site_url(array('action_method'=>'table/del'),$_smarty_tpl);?>
" target="selectedTodo" rel="ids" postType="string" title="确定要删除吗?"><span>删除</span></a></li>
            <li class="line">line</li>
        </ul>
    </div>
    <table class="table" width="100%" layoutH="138">
        <thead>
        <tr>
            <th width="1"><input type="checkbox" group="ids" class="checkboxCtrl"></th>
            <th width="300">数据表</th>
            <th width="300">表名</th>
            <th width="300">自动表单</th>
        </tr>
        </thead>
        <tbody>
        <?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value){
$_smarty_tpl->tpl_vars['element']->_loop = true;
?>
        <tr target="tableName" rel="<?php echo $_smarty_tpl->tpl_vars['element']->value['tableName'];?>
" >
            <td><input name="ids" value="<?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
" type="checkbox"></td>
            <td><?php echo $_smarty_tpl->tpl_vars['element']->value['tableName'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['element']->value['desp'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['element']->value['auto_form_fields'];?>
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
<?php }} ?>