<?php /* Smarty version Smarty-3.1.12, created on 2013-02-21 16:38:49
         compiled from "/Users/lost/www/locms/manage/templates/menu.html" */ ?>
<?php /*%%SmartyHeaderCode:4688592835113b09ccfa541-22265194%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71429fc098c7f6cb306499c4efb85a5a466b41b8' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/menu.html',
      1 => 1361435441,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4688592835113b09ccfa541-22265194',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5113b09cd35404_92350643',
  'variables' => 
  array (
    'admin_display' => 0,
    'site_display' => 0,
    'content_display' => 0,
    'table_display' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5113b09cd35404_92350643')) {function content_5113b09cd35404_92350643($_smarty_tpl) {?><div id="leftside">
    <div id="sidebar_s">
        <div class="collapse">
            <div class="toggleCollapse"><div></div></div>
        </div>
    </div>
    <div id="sidebar">
        <div class="toggleCollapse"><h2>主菜单</h2><div>收缩</div></div>

        <div class="accordion" fillSpace="sidebar">



<div class="accordionHeader" <?php echo $_smarty_tpl->tpl_vars['admin_display']->value;?>
 >
            <h2><span>Folder</span>管理员管理</h2>
</div>
<div class="accordionContent" <?php echo $_smarty_tpl->tpl_vars['admin_display']->value;?>
 >
        <ul class="tree treeFolder">
            <li><a href="javascript:;">管理员</a>
                <ul>
                    <li><a href="<?php echo smarty_site_url(array('action_method'=>'admin'),$_smarty_tpl);?>
" target="navTab" rel="admin_list">列表</a></li>
                    <li><a href="<?php echo smarty_site_url(array('action_method'=>'admin/edit'),$_smarty_tpl);?>
" target="navTab" rel="admin_edit">添加</a></li>
                </ul>
            </li>
            <li><a href="javascript:;">权限分配</a>
                <ul>
                    <li><a href="<?php echo smarty_site_url(array('action_method'=>'admin/module_permission'),$_smarty_tpl);?>
" target="navTab" rel="adminp_list">模块权限</a></li>
                </ul>
            </li>
        </ul>
</div>


<div class="accordionHeader" <?php echo $_smarty_tpl->tpl_vars['site_display']->value;?>
 >
    <h2><span>Folder</span>全局设置</h2>
</div>
<div class="accordionContent" <?php echo $_smarty_tpl->tpl_vars['site_display']->value;?>
>
<ul class="tree treeFolder">
    <li><a href="javascript:;">运行环境</a>
        <ul>
            <li><a href="<?php echo smarty_site_url(array('action_method'=>'info'),$_smarty_tpl);?>
" target="navTab" rel="main">phpinfo</a></li>
            <li><a href="<?php echo @WEBROOT;?>
dwz.frag.xml" target="navTab" external="true">dwz.frag.xml</a></li>
        </ul>
    </li>

    <li><a>站点设置</a>
        <ul>
            <li><a href="<?php echo smarty_site_url(array('action_method'=>'site'),$_smarty_tpl);?>
" target="navTab" rel="site">设置</a></li>
        </ul>
    </li>
</ul>
</div>



<div class="accordionHeader" <?php echo $_smarty_tpl->tpl_vars['content_display']->value;?>
 >
<h2><span>Folder</span>内容管理</h2>
</div>
<div class="accordionContent" <?php echo $_smarty_tpl->tpl_vars['content_display']->value;?>
 >
<ul class="tree treeFolder">
    <li><a href="javascript:;">栏目</a>
        <ul>
            <li><a href="<?php echo smarty_site_url(array('action_method'=>'arctype'),$_smarty_tpl);?>
" target="navTab" rel="arctype_list">列表</a></li>
            <li><a href="<?php echo smarty_site_url(array('action_method'=>'arctype/edit'),$_smarty_tpl);?>
" target="navTab" rel="arctype_edit">添加</a></li>
        </ul>
    </li>
    <li><a href="javascript:;">新闻</a>
        <ul>
            <li><a href="<?php echo smarty_site_url(array('action_method'=>'news'),$_smarty_tpl);?>
" target="navTab" rel="news_list">列表</a></li>
            <li><a href="<?php echo smarty_site_url(array('action_method'=>'news/edit'),$_smarty_tpl);?>
" target="navTab" rel="news_edit">添加</a></li>
        </ul>
    </li>
</ul>
</div>



<div class="accordionHeader" <?php echo $_smarty_tpl->tpl_vars['table_display']->value;?>
>
<h2><span>Folder</span>数据字典</h2>
</div>
<div class="accordionContent" <?php echo $_smarty_tpl->tpl_vars['table_display']->value;?>
>
<ul class="tree">
    <li><a href="<?php echo smarty_site_url(array('action_method'=>'table'),$_smarty_tpl);?>
" target="navTab" rel="table_list">列表</a></li>
    <li><a href="<?php echo smarty_site_url(array('action_method'=>'table/edit'),$_smarty_tpl);?>
" target="navTab" rel="table_add">新建数据表</a></li>
    <li><a href="<?php echo smarty_site_url(array('action_method'=>'test'),$_smarty_tpl);?>
" target="navTab" rel="table_add">测试list</a></li>
    <li><a href="<?php echo smarty_site_url(array('action_method'=>'test/edit'),$_smarty_tpl);?>
" target="navTab" rel="table_add">测试add</a></li>
</ul>
</div>

<div class="accordionHeader">
<h2><span>Folder</span>工具</h2>
</div>
<div class="accordionContent" >
<ul class="tree">
    <li><a href="<?php echo smarty_site_url(array('action_method'=>'crawler'),$_smarty_tpl);?>
" target="navTab" rel="table_list">坏链检测</a></li>
</ul>
</div>




</div>
</div>
</div><?php }} ?>