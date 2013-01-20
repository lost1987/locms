<?php /* Smarty version Smarty-3.1.12, created on 2013-01-20 15:39:39
         compiled from "/Users/lost/www/locms/manage/templates/arctype_list.html" */ ?>
<?php /*%%SmartyHeaderCode:200394235650ee66715cd8f3-02663257%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9428d4e91324af93297f739f0163a32899f5fcfd' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/arctype_list.html',
      1 => 1358667002,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200394235650ee66715cd8f3-02663257',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50ee66716ccad3_54953632',
  'variables' => 
  array (
    'currentPage' => 0,
    'list' => 0,
    'element' => 0,
    'child' => 0,
    'static_on' => 0,
    'totalCount' => 0,
    'numPerPage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ee66716ccad3_54953632')) {function content_50ee66716ccad3_54953632($_smarty_tpl) {?><form id="pagerForm" method="post" action="<?php echo smarty_site_url(array('action_method'=>'arctype'),$_smarty_tpl);?>
">
	<input type="hidden" name="pageNum" value="<?php echo $_smarty_tpl->tpl_vars['currentPage']->value;?>
" />
</form>
<div class="pageHeader">
	<form onsubmit="return navTabSearch(this);" rel="pagerForm" action="<?php echo smarty_site_url(array('action_method'=>'arctype'),$_smarty_tpl);?>
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
			<li><a class="edit" href="<?php echo smarty_site_url(array('action_method'=>'arctype/edit'),$_smarty_tpl);?>
?id={gid}" target="navTab"><span>编辑查看详情</span></a></li>
			<li><a class="delete" href="<?php echo smarty_site_url(array('action_method'=>'arctype/del'),$_smarty_tpl);?>
?id={gid}" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<li class="line">line</li>
		</ul>
	</div>
		<table class="table" width="100%" layoutH="138">
		<thead>
			<tr>
				<th width="50">ID</th>
                <th width="50">根栏目</th>
				<th width="50">栏目名</th>
				<th width="100">栏目文件夹</th>
                <th width="50">操作</th>
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
                <td><?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['element']->value['typename'];?>
</td>
				<td>/</td>
				<td><?php echo $_smarty_tpl->tpl_vars['element']->value['typedir'];?>
</td>
                <td>/</td>
			</tr>
                <?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['element']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value){
$_smarty_tpl->tpl_vars['child']->_loop = true;
?>
                    <tr target="gid" rel="<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
" >
                        <td><?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['element']->value['typename'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['child']->value['typename'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['child']->value['typedir'];?>
</td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['static_on']->value==1){?>
                            <a href="javascript:makelist(<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
)">生成列表</a>&nbsp;&nbsp;
                            <a href="javascript:maketype(<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
)">生成文章</a>
                            <?php }?>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
		</tbody>
	</table>
	<div class="panelBar">
		<div class="pages">
			<span>共: <font color="red"><?php echo $_smarty_tpl->tpl_vars['totalCount']->value;?>
</font> 条记录</span>
		</div>
		<div class="pagination" targetType="navTab" totalCount="<?php echo $_smarty_tpl->tpl_vars['totalCount']->value;?>
" numPerPage="<?php echo $_smarty_tpl->tpl_vars['numPerPage']->value;?>
" pageNumShown="10" currentPage="<?php echo $_smarty_tpl->tpl_vars['currentPage']->value;?>
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
<script src = "<?php echo @WEBROOT;?>
jslib/dwz.js" ></script>
<script>

    var start = 1;
    var limit = 20;

    function maketype(tid){
        $.ajax({
           beforeSend:function(){
                end = parseInt(start-1) + parseInt(limit);
                custom_mytip('正在生成 '+start+' - '+end+'条，请不要做其他操作！');
           } ,
           url: "<?php echo smarty_site_url(array('action_method'=>'arctype/make_type_articles'),$_smarty_tpl);?>
",
           data:'tid='+tid+'&start='+start+'&limit='+limit+'&t='+new Date().getTime(),
           type:"POST",
           dataType:"html",
           success:function(data){
                custom_mytip_close();
                start = data;
           },
           complete:function(){
                if(start == 0 || start == ''){
                    custom_mytip('操作成功!',200);
                    start = 1;
                }else{
                    maketype(tid);
                }
           }
        });
    }

    function makelist(tid){
        $.post('<?php echo smarty_site_url(array('action_method'=>"arctype/makelist"),$_smarty_tpl);?>
','tid='+tid,function(data){
             if(data == 0){
                 custom_mytip('操作成功!',200);
             }else{
                 custom_mytip('操作失败!',200);
             }
        });
    }


</script><?php }} ?>