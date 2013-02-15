<?php /* Smarty version Smarty-3.1.12, created on 2013-02-15 16:52:32
         compiled from "/Users/lost/www/locms/manage/templates/auto/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:1843426866511a1e6c94bd01-74873018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c33f1e3981a3694004ce20ca9442455ea16de25' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/auto/edit.html',
      1 => 1360918300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1843426866511a1e6c94bd01-74873018',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_511a1e6c981d29_24095518',
  'variables' => 
  array (
    'autoform' => 0,
    'id' => 0,
    'field' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_511a1e6c981d29_24095518')) {function content_511a1e6c981d29_24095518($_smarty_tpl) {?><div class="pageContent">
    <form method="post" action="<?php echo smarty_site_url(array('action_method'=>($_smarty_tpl->tpl_vars['autoform']->value->action).('/save')),$_smarty_tpl);?>
" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
        <input type="hidden" name="id" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['id']->value)===null||$tmp==='' ? '' : $tmp);?>
" />
        <div class="pageFormContent" layoutH="56">
            <fieldset>
                <legend><?php echo $_smarty_tpl->tpl_vars['autoform']->value->desp;?>
</legend>
                <?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['autoform']->value->fields; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value){
$_smarty_tpl->tpl_vars['field']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['iteration']++;
?>
                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration']!=1){?>
                <dl class="nowrap">
                    <dt><?php echo $_smarty_tpl->tpl_vars['field']->value['Comment'];?>
:</dt>
                    <dd>
                        <?php echo smarty_field(array('name'=>$_smarty_tpl->tpl_vars['field']->value['Field'],'type'=>$_smarty_tpl->tpl_vars['field']->value['form_field_type'],'value'=>(($tmp = @$_smarty_tpl->tpl_vars['field']->value['value'])===null||$tmp==='' ? '' : $tmp),'refer'=>$_smarty_tpl->tpl_vars['field']->value['refer'],'datasource'=>$_smarty_tpl->tpl_vars['field']->value['datasource'],'condition'=>$_smarty_tpl->tpl_vars['field']->value['cond']),$_smarty_tpl);?>

                    </dd>
                </dl>
                <?php }?>
                <?php } ?>
            </fieldset>
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