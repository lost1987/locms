<?php /* Smarty version Smarty-3.1.12, created on 2013-02-18 16:16:39
         compiled from "/Users/lost/www/locms/manage/templates/auto/list.html" */ ?>
<?php /*%%SmartyHeaderCode:572970743511f21b9274b43-86389135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36e29f9077abd62b88be37792e45c04eb8f09582' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/auto/list.html',
      1 => 1361175357,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '572970743511f21b9274b43-86389135',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_511f21b92f47e3_25243500',
  'variables' => 
  array (
    'autoform' => 0,
    'page' => 0,
    'field' => 0,
    'list' => 0,
    'element' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_511f21b92f47e3_25243500')) {function content_511f21b92f47e3_25243500($_smarty_tpl) {?><form id="pagerForm" method="post" action="<?php echo smarty_site_url(array('action_method'=>$_smarty_tpl->tpl_vars['autoform']->value->action),$_smarty_tpl);?>
">
    <input type="hidden" name="pageNum" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['currentPage'];?>
" />
</form>
<div class="pageHeader">
    <form onsubmit="return navTabSearch(this);" rel="pagerForm" action="<?php echo smarty_site_url(array('action_method'=>$_smarty_tpl->tpl_vars['autoform']->value->action),$_smarty_tpl);?>
" method="post">
        <div class="searchBar">
            <table class="searchContent">
                <tr>
                    <?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['autoform']->value->fields; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value){
$_smarty_tpl->tpl_vars['field']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['iteration']++;
?>
                    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration']==1&&$_smarty_tpl->tpl_vars['field']->value['Key']=='PRI'){?>
                     <!--{如果第一个字段是主键则不显示}-->
                    <?php }else{ ?>
                        <?php echo smarty_search_field(array('comment'=>$_smarty_tpl->tpl_vars['field']->value['Comment'],'name'=>$_smarty_tpl->tpl_vars['field']->value['Field'],'type'=>$_smarty_tpl->tpl_vars['field']->value['form_field_type'],'value'=>(($tmp = @$_smarty_tpl->tpl_vars['field']->value['value'])===null||$tmp==='' ? '' : $tmp),'refer'=>$_smarty_tpl->tpl_vars['field']->value['refer'],'datasource'=>$_smarty_tpl->tpl_vars['field']->value['datasource'],'condition'=>$_smarty_tpl->tpl_vars['field']->value['cond'],'searchable'=>$_smarty_tpl->tpl_vars['field']->value['searchable']),$_smarty_tpl);?>

                    <?php }?>
                    <?php } ?>
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
            <li><a class="edit" href="<?php echo smarty_site_url(array('action_method'=>($_smarty_tpl->tpl_vars['autoform']->value->action).('/edit')),$_smarty_tpl);?>
?id={gid}" target="navTab"><span>编辑查看详情</span></a></li>
            <li><a class="delete" href="<?php echo smarty_site_url(array('action_method'=>($_smarty_tpl->tpl_vars['autoform']->value->action).('/del')),$_smarty_tpl);?>
" target="selectedTodo" rel="ids" postType="string" title="确定要删除吗?"><span>批量删除</span></a></li>
            <li class="line">line</li>
        </ul>
    </div>
    <table class="table" width="100%" layoutH="138">
        <thead>
        <tr>
            <th width="1"><input type="checkbox" group="ids" class="checkboxCtrl"></th>
            <?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['autoform']->value->fields; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value){
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['field']->value['form_field_type']!='textedit'&&$_smarty_tpl->tpl_vars['field']->value['form_field_type']!='textarea'){?>
                        <th><?php echo $_smarty_tpl->tpl_vars['field']->value['Comment'];?>
</th>
                <?php }?>
            <?php } ?>
        </tr>
        </thead>
        <tbody>
        <?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value){
$_smarty_tpl->tpl_vars['element']->_loop = true;
?>
        <tr target="gid" rel="<?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
" >
            <td><input name="ids" value="<?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
" type="checkbox"></td>
            <?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['autoform']->value->fields; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value){
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['field']->value['form_field_type']!='textedit'&&$_smarty_tpl->tpl_vars['field']->value['form_field_type']!='textarea'){?>
                <td><?php echo $_smarty_tpl->tpl_vars['element']->value[$_smarty_tpl->tpl_vars['field']->value['Field']];?>
</td>
            <?php }?>
            <?php } ?>
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
    td a{
        color:#006400;
        font-weight: bold;
    }
</style>
<?php }} ?>