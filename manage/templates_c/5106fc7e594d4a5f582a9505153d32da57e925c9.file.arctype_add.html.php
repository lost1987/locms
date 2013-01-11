<?php /* Smarty version Smarty-3.1.12, created on 2013-01-10 14:57:54
         compiled from "/Users/lost/www/locms/manage/templates/arctype_add.html" */ ?>
<?php /*%%SmartyHeaderCode:213385071950ee6672ec2372-94982855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5106fc7e594d4a5f582a9505153d32da57e925c9' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/arctype_add.html',
      1 => 1357718253,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213385071950ee6672ec2372-94982855',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arctype' => 0,
    'typelist' => 0,
    'element' => 0,
    'dest' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50ee6673036870_36093843',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ee6673036870_36093843')) {function content_50ee6673036870_36093843($_smarty_tpl) {?>
<div class="pageContent">
	<form method="post" action="<?php echo smarty_site_url(array('action_method'=>'arctype/save'),$_smarty_tpl);?>
" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['arctype']->value['id'];?>
" />
        <div class="pageFormContent" layoutH="56">
			<p>
				<label>栏目名称：</label>
				<input name="typename" class="textInput required" type="text" size="30" value="<?php echo $_smarty_tpl->tpl_vars['arctype']->value['typename'];?>
" />
			</p>
            <p>
                <label>栏目文件夹(<font color="#696969" style="vertical-align: middle">相对于项目的根目录</font>)：</label>
                <input name="typedir" class="textInput" type="text" size="30" value="<?php echo $_smarty_tpl->tpl_vars['arctype']->value['typedir'];?>
" />
            </p>
            <p>
                <label>父栏目</label>
                <select name="reid" class="combox">
                    <?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['typelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value){
$_smarty_tpl->tpl_vars['element']->_loop = true;
?>
                      <?php if ($_smarty_tpl->tpl_vars['arctype']->value['reid']==$_smarty_tpl->tpl_vars['element']->value['id']){?>
                      <option value="<?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
" selected> <?php echo $_smarty_tpl->tpl_vars['element']->value['typename'];?>
 </option>
                      <?php }elseif($_smarty_tpl->tpl_vars['arctype']->value['reid']!=$_smarty_tpl->tpl_vars['element']->value['id']&&$_smarty_tpl->tpl_vars['dest']->value=='add'){?>
                      <option value="<?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['element']->value['typename'];?>
 </option>
                      <?php }?>
                    <?php } ?>
                </select>
            </p>
            <p style="height: 100px">
                <label>关键字：</label>
                <textarea class="textArea" name="keywords" rows="5" cols="70"> <?php echo $_smarty_tpl->tpl_vars['arctype']->value['keywords'];?>
</textarea>
            </p>
            <p style="height: 100px">
                <label>描述：</label>
                <textarea class="textArea" name="description" rows="5" cols="70"> <?php echo $_smarty_tpl->tpl_vars['arctype']->value['description'];?>
</textarea>
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