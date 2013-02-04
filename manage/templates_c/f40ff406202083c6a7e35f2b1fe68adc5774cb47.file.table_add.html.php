<?php /* Smarty version Smarty-3.1.12, created on 2013-02-04 15:41:55
         compiled from "/Users/lost/www/locms/manage/templates/table_add.html" */ ?>
<?php /*%%SmartyHeaderCode:2086756178510b50c6dbc028-17988187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f40ff406202083c6a7e35f2b1fe68adc5774cb47' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/table_add.html',
      1 => 1359963676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2086756178510b50c6dbc028-17988187',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_510b50c6de5c43_00056251',
  'variables' => 
  array (
    'op' => 0,
    'title' => 0,
    'tableinfo' => 0,
    'table_engine' => 0,
    'element' => 0,
    'table_charset' => 0,
    'primary_field' => 0,
    'is_primary' => 0,
    'tableconfig' => 0,
    'fields' => 0,
    'field_types' => 0,
    'field_type' => 0,
    'field_types_str' => 0,
    'field_nums' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_510b50c6de5c43_00056251')) {function content_510b50c6de5c43_00056251($_smarty_tpl) {?><div class="pageContent">
	<form method="post" action="<?php echo smarty_site_url(array('action_method'=>'table/save'),$_smarty_tpl);?>
" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<input type="hidden" name="op" value="<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" />
        <div class="pageFormContent" layoutH="56">
            <fieldset>
                <legend><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</legend>
                <dl class="nowrap">
                    <dt>表名称:</dt>
                    <dd><input name="tableName" class="textInput required" type="text" size="15" value="<?php echo $_smarty_tpl->tpl_vars['tableinfo']->value['Name'];?>
" /></dd>
                </dl>
                <dl class="nowrap">
                    <dt>表引擎:</dt>
                    <dd>
                        <?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['table_engine']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value){
$_smarty_tpl->tpl_vars['element']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['iteration']++;
?>
                        <?php if ($_smarty_tpl->tpl_vars['element']->value==$_smarty_tpl->tpl_vars['tableinfo']->value['Engine']){?>
                            <input name="table_engine" type="radio" class="radio required" checked value="<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
">&nbsp;<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
&nbsp;
                        <?php }else{ ?>
                              <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration']==1){?>
                                 <input name="table_engine" type="radio" class="radio required" checked value="<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
">&nbsp;<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
&nbsp;
                               <?php }else{ ?>
                                 <input name="table_engine" type="radio" class="radio required" value="<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
">&nbsp;<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
&nbsp;
                              <?php }?>
                        <?php }?>
                        <?php } ?>
                    </dd>
                </dl>
                <dl class="nowrap">
                    <dt>表字符集:</dt>
                    <dd>
                        <?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['table_charset']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value){
$_smarty_tpl->tpl_vars['element']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['iteration']++;
?>
                        <?php if ($_smarty_tpl->tpl_vars['element']->value==$_smarty_tpl->tpl_vars['tableinfo']->value['Collation']){?>
                        <input name="table_charset" type="radio" class="radio required" checked value="<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
">&nbsp;<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
&nbsp;
                        <?php }else{ ?>
                            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration']==1){?>
                            <input name="table_charset" type="radio" class="radio required" checked value="<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
">&nbsp;<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
&nbsp;
                            <?php }else{ ?>
                            <input name="table_charset" type="radio" class="radio required" value="<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
">&nbsp;<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
&nbsp;
                            <?php }?>
                        <?php }?>
                        <?php } ?>
                    </dd>
                </dl>
                <dl>
                    <dt>ID自增:</dt>
                    <dd>
                        <?php if ($_smarty_tpl->tpl_vars['primary_field']->value[0]['Extra']=='auto_increment'){?>
                        <input type="radio" name="autocrement" checked value="auto_increment" >自增
                        <input type="radio" name="autocrement"  value="" >不自增
                        <?php }elseif($_smarty_tpl->tpl_vars['primary_field']->value[0]['Extra']==''){?>
                        <input type="radio" name="autocrement"  checked value="auto_increment" >自增
                        <input type="radio" name="autocrement"  value="" >不自增
                        <?php }else{ ?>
                        <input type="radio" name="autocrement"   value="auto_increment" >自增
                        <input type="radio" name="autocrement"  checked value="" >不自增
                        <?php }?>
                    </dd>
                </dl>
                <dl>
                    <dt>需要主键:</dt>
                    <dd>
                        <?php if ($_smarty_tpl->tpl_vars['is_primary']->value){?>
                        <input type="radio" name="isprimarykey" checked  value="1" >是
                        <input type="radio" name="isprimarykey"  value="0" >否
                        <?php }elseif($_smarty_tpl->tpl_vars['is_primary']->value==''){?>
                        <input type="radio" name="isprimarykey" checked  value="1" >是
                        <input type="radio" name="isprimarykey"   value="0" >否
                        <?php }else{ ?>
                        <input type="radio" name="isprimarykey"   value="1" >是
                        <input type="radio" name="isprimarykey"  checked value="0" >否
                        <?php }?>
                    </dd>
                </dl>
            </fieldset>
            <fieldset>
                <legend>附加选项</legend>
                <dl class="nowrap">
                    <dt>描述表名(中文):</dt>
                    <dd><input name="desp" class="textInput required" type="text" size="15" value="<?php echo $_smarty_tpl->tpl_vars['tableconfig']->value['desp'];?>
" /></dd>
                </dl>
                <dl class="nowrap">
                    <dt>自动生成后台表单:</dt>
                    <dd>
                        <?php if ($_smarty_tpl->tpl_vars['tableconfig']->value['auto_form_fields']!=1){?>
                        <input type="radio" name="auto_form"  value="1" >是
                        <input type="radio" name="auto_form" checked value="0" >否
                        <?php }else{ ?>
                        <input type="radio" name="auto_form" checked value="1" >是
                        <input type="radio" name="auto_form"  value="0" >否
                        <?php }?>
                    </dd>
                </dl>
            </fieldset>
            <?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value){
$_smarty_tpl->tpl_vars['element']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['iteration']++;
?>
            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration']==1){?>
            <fieldset>
                <legend>字段&nbsp;<input type="button" name="" class="btn_orange" value="新增字段" onclick="addColumn()"/>[如果需要主键,该字段为主键名称]</legend>
                <dl class="nowrap">
                    <dt>名称:</dt>
                    <dd><input name="column1" class="textInput required" type="text" size="15" value="<?php echo $_smarty_tpl->tpl_vars['element']->value['Field'];?>
" /> </dd>
                </dl>
                <dl class="nowrap">
                    <dt>类型:</dt>
                    <dd><select class="typecombox" name="type1">
                        <?php  $_smarty_tpl->tpl_vars['field_type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['field_types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field_type']->key => $_smarty_tpl->tpl_vars['field_type']->value){
$_smarty_tpl->tpl_vars['field_type']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['field_type']->value==$_smarty_tpl->tpl_vars['element']->value['Type']){?>
                                 <option value="<?php echo $_smarty_tpl->tpl_vars['field_type']->value;?>
" selected><?php echo $_smarty_tpl->tpl_vars['field_type']->value;?>
</option>
                            <?php }else{ ?>
                                 <option value="<?php echo $_smarty_tpl->tpl_vars['field_type']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['field_type']->value;?>
</option>
                            <?php }?>
                        <?php } ?>
                    </select></dd>
                </dl>
                <dl class="nowrap">
                    <dt>长度:</dt>
                    <dd><input name="length1" class="textInput digits" type="text" size="5" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['element']->value['Length'])===null||$tmp==='' ? '' : $tmp);?>
" /></dd>
                </dl>
                <dl class="nowrap">
                    <dt>描述:</dt>
                    <dd><input  name="comment1" class="textInput" type="text" size="30" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['element']->value['Comment'])===null||$tmp==='' ? '' : $tmp);?>
" /></dd>
                </dl>
                <dl class="nowrap">
                    <dt>允许为空:</dt>
                    <dd>
                        <?php if ($_smarty_tpl->tpl_vars['element']->value['Null']=='YES'){?>
                        &nbsp;&nbsp;<input type="radio" name="isnull1" checked value="">&nbsp;null
                        &nbsp;&nbsp;<input type="radio" name="isnull1" value="not null">&nbsp;not null
                        <?php }else{ ?>
                        &nbsp;&nbsp;<input type="radio" name="isnull1"  value="">&nbsp;null
                        &nbsp;&nbsp;<input type="radio" name="isnull1" checked value="not null">&nbsp;not null
                        <?php }?>
                    </dd>
                </dl>
                <dl class="nowrap">
                    <dt>默认值:</dt>
                    <dd><input  name="default1" class="textInput" type="text" size="30" value="<?php echo $_smarty_tpl->tpl_vars['element']->value['Default'];?>
" /></dd>
                </dl>
            </fieldset>
            <?php }else{ ?>
            <fieldset>
                <legend>字段&nbsp;<input type="button" name="" class="btn_grey" value="删除字段" onclick="delColumn(this)"/></legend>
                <dl class="nowrap">
                    <dt>名称:</dt>
                    <dd><input name="column<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
" class="textInput required" type="text" size="15" value="<?php echo $_smarty_tpl->tpl_vars['element']->value['Field'];?>
" /> </dd>
                </dl>
                <dl class="nowrap">
                    <dt>类型:</dt>
                    <dd><select class="typecombox" name="type<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
">
                        <?php  $_smarty_tpl->tpl_vars['field_type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['field_types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field_type']->key => $_smarty_tpl->tpl_vars['field_type']->value){
$_smarty_tpl->tpl_vars['field_type']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['field_type']->value==$_smarty_tpl->tpl_vars['element']->value['Type']){?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['field_type']->value;?>
" selected><?php echo $_smarty_tpl->tpl_vars['field_type']->value;?>
</option>
                        <?php }else{ ?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['field_type']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['field_type']->value;?>
</option>
                        <?php }?>
                        <?php } ?>
                    </select></dd>
                </dl>
                <dl class="nowrap">
                    <dt>长度:</dt>
                    <dd><input name="length<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
" class="textInput digits" type="text" size="5" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['element']->value['Length'])===null||$tmp==='' ? '' : $tmp);?>
" /></dd>
                </dl>
                <dl class="nowrap">
                    <dt>描述:</dt>
                    <dd><input  name="comment<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
" class="textInput" type="text" size="30" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['element']->value['Comment'])===null||$tmp==='' ? '' : $tmp);?>
" /></dd>
                </dl>
                <dl class="nowrap">
                    <dt>允许为空:</dt>
                    <dd>
                        <?php if ($_smarty_tpl->tpl_vars['element']->value['Null']=='YES'){?>
                        &nbsp;&nbsp;<input type="radio" name="isnull<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
" checked value="">&nbsp;null
                        &nbsp;&nbsp;<input type="radio" name="isnull<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
" value="not null">&nbsp;not null
                        <?php }else{ ?>
                        &nbsp;&nbsp;<input type="radio" name="isnull<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
"  value="">&nbsp;null
                        &nbsp;&nbsp;<input type="radio" name="isnull<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
" checked value="not null">&nbsp;not null
                        <?php }?>
                    </dd>
                </dl>
                <dl class="nowrap">
                    <dt>默认值:</dt>
                    <dd><input  name="default<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
" class="textInput" type="text" size="30" value="<?php echo $_smarty_tpl->tpl_vars['element']->value['Default'];?>
" /></dd>
                </dl>
            </fieldset>
            <?php }?>
            <?php } ?>

		</div>
		<div class="formBar">
			<ul>
				<!--<li><a class="buttonActive" href="javascript:;"><span>保存</span></a></li>-->
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit" >保存</button></div></div></li>
				<li>
					<div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
				</li>
			</ul>
		</div>
        <input type="hidden" name="flag" id="flag" value="1" /><!--告诉后台这个表有多少个字段-->
	</form>
</div>
<script>
var fieldtypes = '<?php echo $_smarty_tpl->tpl_vars['field_types_str']->value;?>
';
var fieldoptions = makeOptions();

var flag = <?php echo $_smarty_tpl->tpl_vars['field_nums']->value;?>
;


function makeOptions(){
    if(fieldtypes!=''){
        fieldtypes = fieldtypes.split(',');
        var fieldoptions = '';
        for(var i =0 ; i< fieldtypes.length; i++){
            fieldoptions += '<option value="'+fieldtypes[i]+'">'+fieldtypes[i]+'</option>';
        }
        return fieldoptions;
    }
}

function addColumn(){
   flag++;
   $("#flag").val(flag);
   var column_template = createColumn();
   $(".pageFormContent").append(column_template);
}


function createColumn(){
    var column_template =   '';
    column_template +=      '<fieldset>';
    column_template +=      '<legend>字段&nbsp;<input type="button" name="" class="btn_grey" value="删除字段" onclick="delColumn(this)"/></legend>';
    column_template +=      '<dl class="nowrap">';
    column_template +=      '<dt>名称:</dt>';
    column_template +=      '<dd><input name="column'+flag+'" class="textInput required" type="text" size="15" value="" /> </dd>';
    column_template +=      '</dl>';
    column_template +=      '<dl class="nowrap">';
    column_template +=      '<dt>类型:</dt>';
    column_template +=      '<dd><select class="typecombox" name="type'+flag+'">'+fieldoptions+'</select></dd>';
    column_template +=      '</dl>';
    column_template +=      '<dl class="nowrap">';
    column_template +=      '<dt>长度:</dt>';
    column_template +=      '<dd><input name="length'+flag+'" class="textInput digits" type="text" size="5" value="" /></dd>';
    column_template +=      '</dl>';
    column_template +=      '<dl class="nowrap">';
    column_template +=      '<dt>描述:</dt>';
    column_template +=      '<dd><input  name="comment'+flag+'" class="textInput" type="text" size="30" value="" /></dd>';
    column_template +=      '</dl>';
    column_template +=      '<dl class="nowrap">';
    column_template +=      '<dt>允许为空:</dt>';
    column_template +=      '<dd>&nbsp;&nbsp;<input type="radio" name="isnull'+flag+'" checked value="">&nbsp;null&nbsp;&nbsp;<input type="radio" name="isnull'+flag+'" value="not null">&nbsp;not null</dd>';
    column_template +=      '</dl>';
    column_template +=      '<dl class="nowrap">';
    column_template +=      '<dt>默认值:</dt>';
    column_template +=      '<dd><input  name="default'+flag+'" class="textInput" type="text" size="30" value="" /></dd>';
    column_template +=      '</dl>';
    column_template +=      '</fieldset>';
    return column_template;
}

function delColumn(node){
    $(node).parent().parent().remove();
    flag--;
}
</script>



<?php }} ?>