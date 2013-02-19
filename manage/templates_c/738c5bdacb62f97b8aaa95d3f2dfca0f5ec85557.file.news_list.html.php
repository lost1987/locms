<?php /* Smarty version Smarty-3.1.12, created on 2013-02-19 20:23:20
         compiled from "/Users/lost/www/locms/manage/templates/news_list.html" */ ?>
<?php /*%%SmartyHeaderCode:163308612851217dfe143177-50950865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '738c5bdacb62f97b8aaa95d3f2dfca0f5ec85557' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/news_list.html',
      1 => 1361276592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163308612851217dfe143177-50950865',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51217dfe233ca0_77391517',
  'variables' => 
  array (
    'page' => 0,
    'static_on' => 0,
    'list' => 0,
    'element' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51217dfe233ca0_77391517')) {function content_51217dfe233ca0_77391517($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/lost/www/locms/core/smarty/plugins/modifier.date_format.php';
?>
<form id="pagerForm" method="post" action="<?php echo smarty_site_url(array('action_method'=>'news'),$_smarty_tpl);?>
">
	<input type="hidden" name="pageNum" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['currentPage'];?>
" />
</form>
<div class="pageHeader">
	<form onsubmit="return navTabSearch(this);" rel="pagerForm" action="<?php echo smarty_site_url(array('action_method'=>'news'),$_smarty_tpl);?>
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
            <?php if ($_smarty_tpl->tpl_vars['static_on']->value==1){?>
            <li><a class="add" href="<?php echo smarty_site_url(array('action_method'=>'news/make'),$_smarty_tpl);?>
" target="selectedTodo" rel="ids" postType="string" title="确定要生成吗?"><span>批量生成</span></a></li>
			<?php }?>
            <li><a class="delete" href="<?php echo smarty_site_url(array('action_method'=>'news/del'),$_smarty_tpl);?>
" target="selectedTodo" rel="ids" postType="string" title="确定要删除吗?"><span>批量删除</span></a></li>
			<li class="line">line</li>
		</ul>
	</div>
		<table class="table" width="100%" layoutH="138">
		<thead>
			<tr>
				<th width="1"><input type="checkbox" group="ids" class="checkboxCtrl"></th>
				<th width="50">ID</th>
				<th width="150">标题</th>
                <th width="50">栏目</th>
				<th width="100">点击</th>
                <th width="100">发布时间</th>
                <th width="100">发布人</th>
                <th width="100">操作</th>
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
				<td><?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['element']->value['title'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['element']->value['typename'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['element']->value['click'];?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['element']->value['pubdate'],"%Y-%m-%d %H:%M:%S");?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['element']->value['publisher'];?>
</td>
                <td>
                    <a href="<?php echo smarty_site_url(array('action_method'=>'news/edit'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
" target="navTab">编辑</a>&nbsp;&nbsp;
                    <?php if ($_smarty_tpl->tpl_vars['static_on']->value==1){?>
                    <a href="javascript:makeArticle(<?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
)">生成</a>&nbsp;&nbsp;
                    <?php }?>
                    <a href="<?php echo smarty_site_url(array('action_method'=>'news/del'),$_smarty_tpl);?>
?id=<?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
" target="ajaxTodo" title="确定要删除吗?">删除</a>
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
    td a{
        color:#006400;
        font-weight: bold;
    }
</style>
<script>

    function makeArticle(id){
        $.post('<?php echo smarty_site_url(array('action_method'=>"news/make_article"),$_smarty_tpl);?>
','id='+id,function(data){

            if(data == 0){
                custom_mytip('操作成功',200);
            }else{
                custom_mytip('操作失败',200);
            }

        });
    }

</script><?php }} ?>