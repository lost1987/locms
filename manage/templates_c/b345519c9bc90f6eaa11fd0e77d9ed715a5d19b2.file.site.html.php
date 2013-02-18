<?php /* Smarty version Smarty-3.1.12, created on 2013-02-18 19:31:11
         compiled from "/Users/lost/www/locms/manage/templates/site.html" */ ?>
<?php /*%%SmartyHeaderCode:559065029512210ff156161-87946566%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b345519c9bc90f6eaa11fd0e77d9ed715a5d19b2' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/site.html',
      1 => 1357890549,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '559065029512210ff156161-87946566',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'article' => 0,
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_512210ff1cc348_02412824',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512210ff1cc348_02412824')) {function content_512210ff1cc348_02412824($_smarty_tpl) {?>
<div class="pageContent">
	<form method="post" action="<?php echo smarty_site_url(array('action_method'=>'site/save'),$_smarty_tpl);?>
" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<input type="hidden" name="id" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['article']->value['id'])===null||$tmp==='' ? '' : $tmp);?>
" />
        <div class="pageFormContent" layoutH="56">
			<p>
				<label>首页title：</label>
				<input name="title" class="textInput" type="text" size="30" value="<?php echo $_smarty_tpl->tpl_vars['settings']->value['title'];?>
" />
			</p>
            <p>
                <label>首页keywords：</label>
                <input name="keywords" class="textInput" type="text" size="30" value="<?php echo $_smarty_tpl->tpl_vars['settings']->value['keywords'];?>
" />
            </p>
            <p>
                <label>首页description：</label>
                <input name="description" class="textInput" type="text" size="30" value="<?php echo $_smarty_tpl->tpl_vars['settings']->value['description'];?>
" />
            </p>
            <p>
                <label>是否开启静态化：</label>
                <?php if ($_smarty_tpl->tpl_vars['settings']->value['static']==1){?>
                <input name="static" class="required" type="radio" value="1" checked/>是
                <input name="static" class="required" type="radio" value="0" />否
                <?php }else{ ?>
                <input name="static" class="required" type="radio" value="1" />是
                <input name="static" class="required" type="radio" value="0" checked />否
                <?php }?>
            </p>
		</div>
		<div class="formBar">
			<ul>
				<!--<li><a class="buttonActive" href="javascript:;"><span>保存</span></a></li>-->
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li>
					<div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
				</li>
			</ul>
		</div>
	</form>
</div>
<?php }} ?>