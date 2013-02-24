<?php /* Smarty version Smarty-3.1.12, created on 2013-02-24 19:03:54
         compiled from "/Users/lost/www/locms/manage/templates/table_add.html" */ ?>
<?php /*%%SmartyHeaderCode:20940948215113b09f8fbdf9-30905374%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f40ff406202083c6a7e35f2b1fe68adc5774cb47' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/table_add.html',
      1 => 1361703829,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20940948215113b09f8fbdf9-30905374',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5113b09faee964_91530677',
  'variables' => 
  array (
    'op' => 0,
    'title' => 0,
    'tableinfo' => 0,
    'disabled' => 0,
    'table_engine' => 0,
    'element' => 0,
    'table_charset' => 0,
    'primary_field' => 0,
    'is_primary' => 0,
    'tableconfig' => 0,
    'controller_disabled' => 0,
    'fields' => 0,
    'primary_disabled' => 0,
    'field_types' => 0,
    'field_type' => 0,
    'form_field_types' => 0,
    'field_types_str' => 0,
    'form_field_str' => 0,
    'field_nums' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5113b09faee964_91530677')) {function content_5113b09faee964_91530677($_smarty_tpl) {?><div style="position:fixed;left:900px;z-index:10"><input type="button" name="" class="btn_orange btn_big" value="新增字段" onclick="addColumn()" />&nbsp;<input type="button" name="" class="btn_orange btn_big" value="说明" onclick="readme()" /></div>
<div class="pageContent">
	<form method="post" action="<?php echo smarty_site_url(array('action_method'=>'table/save'),$_smarty_tpl);?>
" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone,'确认提交吗?');">
		<input type="hidden" name="op" value="<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" />
        <div class="pageFormContent" layoutH="56">
            <fieldset>
                <legend>
                    <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

                    <?php if ($_smarty_tpl->tpl_vars['op']->value=='edit'){?><input type="button" class="btn_orange" value="修改" onclick="alterTable(this)" /><?php }?>
                </legend>
                <dl class="nowrap">
                    <dt>表名称:</dt>
                    <dd><input name="tableName" class="textInput required" type="text" size="15" value="<?php echo $_smarty_tpl->tpl_vars['tableinfo']->value['Name'];?>
" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
/></dd>
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
" >&nbsp;<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
&nbsp;
                        <?php }else{ ?>
                              <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration']==1){?>
                                 <input name="table_engine" type="radio" class="radio required" checked value="<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
" >&nbsp;<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
&nbsp;
                               <?php }else{ ?>
                                 <input name="table_engine" type="radio" class="radio required" value="<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
" >&nbsp;<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
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
" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>&nbsp;<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
&nbsp;
                        <?php }else{ ?>
                            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration']==1){?>
                            <input name="table_charset" type="radio" class="radio required" checked value="<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>&nbsp;<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
&nbsp;
                            <?php }else{ ?>
                            <input name="table_charset" type="radio" class="radio required" value="<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>&nbsp;<?php echo $_smarty_tpl->tpl_vars['element']->value;?>
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
                        <input type="radio" name="autocrement" checked value="auto_increment" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>自增
                        <input type="radio" name="autocrement"  value="" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>不自增
                        <?php }elseif($_smarty_tpl->tpl_vars['primary_field']->value[0]['Extra']==''){?>
                        <input type="radio" name="autocrement"  checked value="auto_increment" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>自增
                        <input type="radio" name="autocrement"  value="" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>不自增
                        <?php }else{ ?>
                        <input type="radio" name="autocrement"   value="auto_increment" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>自增
                        <input type="radio" name="autocrement"  checked value="" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>不自增
                        <?php }?>
                    </dd>
                </dl>
                <dl>
                    <dt>需要主键:</dt>
                    <dd>
                        <?php if ($_smarty_tpl->tpl_vars['is_primary']->value){?>
                        <input type="radio" name="isprimarykey" checked  value="1" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>是
                        <input type="radio" name="isprimarykey"  value="0" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>否
                        <?php }elseif($_smarty_tpl->tpl_vars['is_primary']->value==''){?>
                        <input type="radio" name="isprimarykey" checked  value="1" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>是
                        <input type="radio" name="isprimarykey"   value="0" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>否
                        <?php }else{ ?>
                        <input type="radio" name="isprimarykey"   value="1" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>是
                        <input type="radio" name="isprimarykey"  checked value="0" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>否
                        <?php }?>
                    </dd>
                </dl>
            </fieldset>
            <fieldset>
                <legend>附加选项<?php if ($_smarty_tpl->tpl_vars['op']->value=='edit'){?>&nbsp;<input type="button" class="btn_orange" value="修改" onclick="alterTableConfig(this)" /><?php }?></legend>
                <dl class="nowrap">
                    <dt>描述表名(中文):</dt>
                    <dd><input name="desp" class="textInput required" type="text" size="15" value="<?php echo $_smarty_tpl->tpl_vars['tableconfig']->value['desp'];?>
" /></dd>
                </dl>
                <dl class="nowrap">
                    <dt>自动生成后台表单:</dt>
                    <dd>
                        <?php if ($_smarty_tpl->tpl_vars['tableconfig']->value['auto_form_fields']!=1){?>
                        <input type="radio" name="auto_form"   value="1" onclick="controllerEnabled(this)">是
                        <input type="radio" name="auto_form"  checked onclick="controllerDisabled(this)" value="0" >否
                        <?php }else{ ?>
                        <input type="radio" name="auto_form"  onclick="controllerEnabled(this)" checked value="1" >是
                        <input type="radio" name="auto_form" onclick="controllerDisabled(this)" value="0" >否
                        <?php }?>
                    </dd>
                </dl>
                <dl class="nowrap" >
                    <dt>控制器类名:</dt>
                    <dd><input id="controller" name="controller" class="textInput" type="text" size="15" value="<?php echo $_smarty_tpl->tpl_vars['tableconfig']->value['controller'];?>
" <?php echo $_smarty_tpl->tpl_vars['controller_disabled']->value;?>
 /></dd>
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
            <fieldset class="column">
                <legend>字段&nbsp;
                    <?php if ($_smarty_tpl->tpl_vars['op']->value=='edit'&&$_smarty_tpl->tpl_vars['is_primary']->value==false){?>
                    &nbsp;<input type="button" value="修改" class="btn_orange" onclick="updateColumn(this)" />&nbsp;<input type="button" value="删除" class="btn_grey" onclick="delColumn(this)" />
                    <?php }?>
                    [如果需要主键,该字段为主键名称]
                </legend>
                <dl class="nowrap">
                    <dt>名称:</dt>
                    <dd><input name="column1" class="textInput required" type="text" size="15" value="<?php echo $_smarty_tpl->tpl_vars['element']->value['Field'];?>
" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['primary_disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
/> <input type="hidden" class="sourceColumn" value="<?php echo $_smarty_tpl->tpl_vars['element']->value['Field'];?>
"></dd>
                </dl>
                <dl class="nowrap">
                    <dt>类型:</dt>
                    <dd><select class="typecombox" name="type1" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['primary_disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>
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
" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['primary_disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
/></dd>
                </dl>
                <dl class="nowrap">
                    <dt>描述:</dt>
                    <dd><input  name="comment1" class="textInput" type="text" size="30" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['element']->value['Comment'])===null||$tmp==='' ? '' : $tmp);?>
" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['primary_disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
/></dd>
                </dl>
                <dl class="nowrap">
                    <dt>允许为空:</dt>
                    <dd>
                        <?php if ($_smarty_tpl->tpl_vars['element']->value['Null']=='YES'){?>
                        &nbsp;&nbsp;<input type="radio" name="isnull1" checked value="" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['primary_disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>&nbsp;null
                        &nbsp;&nbsp;<input type="radio" name="isnull1" value="NOT NULL" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['primary_disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>&nbsp;not null
                        <?php }else{ ?>
                        &nbsp;&nbsp;<input type="radio" name="isnull1"  value="" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['primary_disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>&nbsp;null
                        &nbsp;&nbsp;<input type="radio" name="isnull1" checked value="NOT NULL" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['primary_disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>&nbsp;not null
                        <?php }?>
                    </dd>
                </dl>
                <dl class="nowrap">
                    <dt>默认值:</dt>
                    <dd><input  name="default1" class="textInput" type="text" size="30" value="<?php echo $_smarty_tpl->tpl_vars['element']->value['Default'];?>
" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['primary_disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
 /></dd>
                </dl>
               <dl class="nowrap">
                <dt>表单类型:</dt>
                <dd><select class="formtypecombox" name="formfieldtype1" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['primary_disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>
                    <?php  $_smarty_tpl->tpl_vars['field_type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['form_field_types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field_type']->key => $_smarty_tpl->tpl_vars['field_type']->value){
$_smarty_tpl->tpl_vars['field_type']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['field_type']->value==$_smarty_tpl->tpl_vars['element']->value['form_field_type']){?>
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
                <dt>关联:</dt>
                <dd><input class="textInput" name="refer1" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['element']->value['refer'])===null||$tmp==='' ? '' : $tmp);?>
" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['primary_disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
/>例如 : admin.username.uid  ;表admin的username字段将作为select,radio,checkbox的key,uid字段将作为value</dd>
                </dl>
                <dl class="nowrap">
                <dt>数据源:</dt>
                <dd><input class="textInput" name="datasource1" style="width:450px" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['element']->value['datasource'])===null||$tmp==='' ? '' : $tmp);?>
" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['primary_disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
/>例如 : 名字1.1,名字2.2,名字3.3,名字4.4,名字5.5   ; 名字1将作为select,radio,checkbox的key,1将作为value</dd>
                </dl>
                </dl>
                <dl class="nowrap">
                <dt>关联条件:</dt>
                <dd><input class="textInput" name="cond1" style="width:450px" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['element']->value['cond'])===null||$tmp==='' ? '' : $tmp);?>
" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['primary_disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
/>例如 : status=1</dd>
                </dl>
                <dl class="nowrap">
                <dt>字段验证:</dt>
                <dd><input class="textInput" name="formValidate1" style="width:450px" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['element']->value['formValidate'])===null||$tmp==='' ? '' : $tmp);?>
" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['primary_disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
/>必填required 邮件email 整数digits 浮点数number 字母lettersonly 网址url 电话phone 多个以","分割</dd>
                </dl>
                <dl class="nowrap">
                <dt>查询可用:</dt>
                <?php if ((($tmp = @$_smarty_tpl->tpl_vars['element']->value['searchable'])===null||$tmp==='' ? 0 : $tmp)==1){?>
                <dd><input name="searchable1" type="radio" value="1" checked <?php echo (($tmp = @$_smarty_tpl->tpl_vars['primary_disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>是&nbsp;<input name="searchable1" type="radio" value="0" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['primary_disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>否</dd>
                <?php }else{ ?>
                <dd><input name="searchable1" type="radio" value="1" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['primary_disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>是&nbsp;<input name="searchable1" type="radio" value="0" checked <?php echo (($tmp = @$_smarty_tpl->tpl_vars['primary_disabled']->value)===null||$tmp==='' ? '' : $tmp);?>
>否</dd>
                <?php }?>
                </dl>
            </fieldset>
            <?php }else{ ?>
            <fieldset class="column">
                <legend>字段&nbsp;&nbsp;<input type="button" value="修改" class="btn_orange" onclick="updateColumn(this)" />&nbsp;<input type="button" value="删除" class="btn_grey" onclick="delColumn(this)" /></legend>
                <dl class="nowrap">
                    <dt>名称:</dt>
                    <dd><input name="column<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
" class="textInput required" type="text" size="15" value="<?php echo $_smarty_tpl->tpl_vars['element']->value['Field'];?>
" /> <input type="hidden" class="sourceColumn" value="<?php echo $_smarty_tpl->tpl_vars['element']->value['Field'];?>
"></dd>
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
" value="NOT NULL">&nbsp;not null
                        <?php }else{ ?>
                        &nbsp;&nbsp;<input type="radio" name="isnull<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
"  value="">&nbsp;null
                        &nbsp;&nbsp;<input type="radio" name="isnull<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
" checked value="NOT NULL">&nbsp;not null
                        <?php }?>
                    </dd>
                </dl>
                <dl class="nowrap">
                    <dt>默认值:</dt>
                    <dd><input  name="default<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
" class="textInput" type="text" size="30" value="<?php echo $_smarty_tpl->tpl_vars['element']->value['Default'];?>
" /></dd>
                </dl>
                <dl class="nowrap">
                    <dt>表单类型:</dt>
                    <dd><select class="formtypecombox" name="formfieldtype<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
">
                        <?php  $_smarty_tpl->tpl_vars['field_type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['form_field_types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field_type']->key => $_smarty_tpl->tpl_vars['field_type']->value){
$_smarty_tpl->tpl_vars['field_type']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['field_type']->value==$_smarty_tpl->tpl_vars['element']->value['form_field_type']){?>
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
                    <dt>关联:</dt>
                    <dd><input class="textInput" name="refer<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['element']->value['refer'])===null||$tmp==='' ? '' : $tmp);?>
"/></dd>
                </dl>
                <dl class="nowrap">
                    <dt>数据源:</dt>
                    <dd><input class="textInput" name="datasource<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
" style="width:450px" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['element']->value['datasource'])===null||$tmp==='' ? '' : $tmp);?>
"/></dd>
                </dl>
                <dl class="nowrap">
                    <dt>关联条件:</dt>
                    <dd><input class="textInput" name="cond<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
" style="width:450px" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['element']->value['cond'])===null||$tmp==='' ? '' : $tmp);?>
"/></dd>
                </dl>
                <dl class="nowrap">
                    <dt>字段验证:</dt>
                    <dd><input class="textInput" name="formValidate1" style="width:450px" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['element']->value['formValidate'])===null||$tmp==='' ? '' : $tmp);?>
" /></dd>
                </dl>
                <dl class="nowrap">
                    <dt>查询可用:</dt>
                    <?php if ((($tmp = @$_smarty_tpl->tpl_vars['element']->value['searchable'])===null||$tmp==='' ? 0 : $tmp)==1){?>
                    <dd><input name="searchable<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
" type="radio" value="1" checked>是&nbsp;<input name="searchable<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
" type="radio" value="0" >否</dd>
                    <?php }else{ ?>
                    <dd><input name="searchable<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
" type="radio" value="1" >是&nbsp;<input name="searchable<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
" type="radio" value="0" checked>否</dd>
                    <?php }?>
                </dl>
            </fieldset>
            <?php }?>
            <?php } ?>

		</div>
		<div class="formBar">
			<ul>
                <?php if ($_smarty_tpl->tpl_vars['op']->value!='edit'){?>
				<!--<li><a class="buttonActive" href="javascript:;"><span>保存</span></a></li>-->
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit" >保存</button></div></div></li>
				<li>
					<div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
				</li>
                <?php }?>
			</ul>
		</div>
        <input type="hidden" name="flag" id="flag" value="1" /><!--告诉后台这个表有多少个字段-->
	</form>
</div>


<script>
var fieldtypes = '<?php echo $_smarty_tpl->tpl_vars['field_types_str']->value;?>
';
var form_field_types = "<?php echo $_smarty_tpl->tpl_vars['form_field_str']->value;?>
";
var fieldoptions = makeOptions();
var fieldtypeoptions = makeFormFieldTypes();

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

function makeFormFieldTypes(){
    if(form_field_types!=''){
        form_field_types = form_field_types.split(',');
        var fieldtypeoptions = '';
        for(var i =0 ; i< form_field_types.length; i++){
            fieldtypeoptions += '<option value="'+form_field_types[i]+'">'+form_field_types[i]+'</option>';
        }
        return fieldtypeoptions;
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
    column_template +=      '<fieldset class="column">';
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
    column_template +=      '<dd>&nbsp;&nbsp;<input type="radio" name="isnull'+flag+'" checked value="">&nbsp;null&nbsp;&nbsp;<input type="radio" name="isnull'+flag+'" value="NOT NULL">&nbsp;not null</dd>';
    column_template +=      '</dl>';
    column_template +=      '<dl class="nowrap">';
    column_template +=      '<dt>默认值:</dt>';
    column_template +=      '<dd><input  name="default'+flag+'" class="textInput" type="text" size="30" value="" /></dd>';
    column_template +=      '</dl>';
    column_template +=      '<dl class="nowrap">';
    column_template +=      '<dt>表单类型:</dt>';
    column_template +=      '<dd><select class="formtypecombox" name="formfieldtype'+flag+'">'+fieldtypeoptions+'</select></dd>';
    column_template +=      '</dl>';
    column_template +=      '<dl class="nowrap">';
    column_template +=      '<dt>关联:</dt>';
    column_template +=      '<dd><input class="textInput" name="refer'+flag+'" /></dd>';
    column_template +=      '</dl>';
    column_template +=      '<dl class="nowrap">';
    column_template +=      '<dt>数据源:</dt>';
    column_template +=      '<dd><input class="textInput" name="datasource'+flag+'" style="width:450px" /></dd>';
    column_template +=      '</dl>';
    column_template +=      '</dl>';
    column_template +=      '<dl class="nowrap">';
    column_template +=      '<dt>关联条件:</dt>';
    column_template +=      '<dd><input class="textInput" name="cond'+flag+'" style="width:450px" /></dd>';
    column_template +=      '</dl>';
    column_template +=      '<dl class="nowrap">';
    column_template +=      '<dt>字段验证:</dt>';
    column_template +=      '<dd><input class="textInput" name="formValidate'+flag+'" style="width:450px" /></dd>';
    column_template +=      '</dl>';
    column_template +=      '<dl class="nowrap">';
    column_template +=      '<dt>查询可用:</dt>';
    column_template +=      '<dd><input name="searchable'+flag+'" type="radio" value="1">是&nbsp;<input name="searchable'+flag+'" type="radio" value="0" checked>否</dd>';
    column_template +=      '</dl>';
    column_template +=      '</fieldset>';
    return column_template;
}

function delColumn(node){
    $(node).parent().parent().remove();
    flag--;
    $("#flag").val(flag);
}

function controllerEnabled(node){
    _node = $(node);
    _node.parent().parent().next().find("input").eq(0).attr('disabled',false);
}

function controllerDisabled(node){
    _node = $(node);
    _node.parent().parent().next().find("input").eq(0).val('').attr('disabled',true);
}

function readme(){
    var content = $("fieldset[class='column']").eq(0).html();
    art.dialog({title:"字段说明",content:content});
}


<!--编辑表时 保存那些字段是修改的,那些字段是删除的,那些字段是新增的-->
<?php if ($_smarty_tpl->tpl_vars['op']->value=='edit'){?>

var tableName = '<?php echo $_smarty_tpl->tpl_vars['tableinfo']->value['Name'];?>
';


function createColumn(){
    var column_template =   '';
    column_template +=      '<fieldset class="column">';
    column_template +=      '<legend>字段&nbsp;<input type="button" name="" class="btn_orange" value="保存" onclick="saveColumn(this)"/>&nbsp;<input type="button" name="" class="btn_grey" value="删除" onclick="delColumn(this)"/></legend>';
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
    column_template +=      '<dl class="nowrap">';
    column_template +=      '<dt>表单类型:</dt>';
    column_template +=      '<dd><select class="formtypecombox" name="formfieldtype'+flag+'">'+fieldtypeoptions+'</select></dd>';
    column_template +=      '</dl>';
    column_template +=      '<dl class="nowrap">';
    column_template +=      '<dt>关联:</dt>';
    column_template +=      '<dd><input class="textInput" name="refer'+flag+'" /></dd>';
    column_template +=      '</dl>';
    column_template +=      '<dl class="nowrap">';
    column_template +=      '<dt>数据源:</dt>';
    column_template +=      '<dd><input class="textInput" name="datasource'+flag+'" style="width:450px" /></dd>';
    column_template +=      '</dl>';
    column_template +=      '</dl>';
    column_template +=      '<dl class="nowrap">';
    column_template +=      '<dt>关联条件:</dt>';
    column_template +=      '<dd><input class="textInput" name="cond'+flag+'" style="width:450px" /></dd>';
    column_template +=      '</dl>';
    column_template +=      '<dl class="nowrap">';
    column_template +=      '<dt>字段验证:</dt>';
    column_template +=      '<dd><input class="textInput" name="formValidate'+flag+'" style="width:450px" /></dd>';
    column_template +=      '</dl>';
    column_template +=      '<dl class="nowrap">';
    column_template +=      '<dt>查询可用:</dt>';
    column_template +=      '<dd><input name="searchable'+flag+'" type="radio" value="1">是&nbsp;<input name="searchable'+flag+'" type="radio" value="0" checked>否</dd>';
    column_template +=      '</dl>';
    column_template +=      '</fieldset>';
    return column_template;
}

function delColumn(node){
    _node = $(node);
    if(!_node.parent().next().find("input[class='sourceColumn']").val()){
        _node.parent().parent().remove();
    }else{
        art.confirm('删除将不可还原!请确认删除?', function () {
            var columnName  =  _node.parent().next().find("input[class='sourceColumn']").val();
            $.post('<?php echo smarty_site_url(array('action_method'=>"table/delColumnByAjax"),$_smarty_tpl);?>
','tableName='+tableName+'&columnName='+columnName,function(data){
                if(data.replace(/\s+/g,'') == 1){
                    _node.parent().parent().remove();
                    return;
                }
                art.alert('修改出错,请联系开发人员');
            })
        }, function () {});
    }
}

function updateColumn(node){
    _node = $(node);
    var sourceColumn = _node.parent().next().find('input').eq(1).val();
    var columnName = _node.parent().next().find('input').eq(0).val();
    if(columnName.replace(/\s+/g,'')!=''){
        art.confirm('确认要修改吗?', function () {
            var columnType = _node.parent().parent().children().eq(2).find('select').val();
            var columnLength = _node.parent().parent().children().eq(3).find('input').val();
            var comment = _node.parent().parent().children().eq(4).find('input').val();
            var isnull = _node.parent().parent().children().eq(5).find('input:checked').val();
            var columndefault = _node.parent().parent().children().eq(6).find('input').val();
            var formfieldtype = _node.parent().parent().children().eq(7).find('select').val();
            var refer = _node.parent().parent().children().eq(8).find('input').val();
            var datasource = _node.parent().parent().children().eq(9).find('input').val();
            var condition = _node.parent().parent().children().eq(10).find('input').val();
            var formValidate = _node.parent().parent().children().eq(11).find('input').val();
            var searchable = _node.parent().parent().children().eq(12).find('input:checked').val();

            var data = "tableName="+tableName+"&columnName="+columnName+"&columnType="+columnType+"&columnLength="+columnLength;
            data += "&comment="+comment+"&isnull="+isnull+"&columndefault="+columndefault+"&sourceColumn="+sourceColumn+"&formfieldtype="+formfieldtype+"&refer="+refer+"&datasource="+datasource+"&cond="+condition+"&formValidate="+formValidate+"&searchable="+searchable;

            $.post('<?php echo smarty_site_url(array('action_method'=>"table/updateColumnByAjax"),$_smarty_tpl);?>
',data,function(data){
                if(data.replace(/\s+/g,'')==1){
                    _node.parent().next().find('input').eq(1).val(columnName);
                    return;
                }
                art.alert('修改出错,请联系开发人员');
            })
        }, function () {});
    }
}


function saveColumn(node){
    _node = $(node);
    var columnName = _node.parent().next().find('input').eq(0).val();
    if(columnName.replace(/\s+/g,'')!=''){
        art.confirm('确认要修改吗?', function () {
            var columnType = _node.parent().parent().children().eq(2).find('select').val();
            var columnLength = _node.parent().parent().children().eq(3).find('input').val();
            var comment = _node.parent().parent().children().eq(4).find('input').val();
            var isnull = _node.parent().parent().children().eq(5).find('input:checked').val();
            var columndefault = _node.parent().parent().children().eq(6).find('input').val();
            var formfieldtype = _node.parent().parent().children().eq(7).find('select').val();
            var refer = _node.parent().parent().children().eq(8).find('input').val();
            var datasource = _node.parent().parent().children().eq(9).find('input').val();
            var condition = _node.parent().parent().children().eq(10).find('input').val();
            var formValidate = _node.parent().parent().children().eq(11).find('input').val();
            var searchable = _node.parent().parent().children().eq(12).find('input:checked').val();

            var data = "tableName="+tableName+"&columnName="+columnName+"&columnType="+columnType+"&columnLength="+columnLength;
            data += "&comment="+comment+"&isnull="+isnull+"&columndefault="+columndefault+"&formfieldtype="+formfieldtype+"&refer="+refer+"&datasource="+datasource+"&cond="+condition+"&formValidate="+formValidate+"&searchable="+searchable;;

            $.post('<?php echo smarty_site_url(array('action_method'=>"table/saveColumnByAjax"),$_smarty_tpl);?>
',data,function(data){
                if(data.replace(/\s+/g,'')==1){
                    _node.parent().next().find('input').after('<input type="hidden" class="sourceColumn" value="'+columnName+'">');
                    _node.replaceWith('<input type="button" class="btn_orange" onclick="updateColumn(this)" value="修改" />')
                    return;
                }
                art.alert('修改出错,请联系开发人员');
            })
            },function(){});
    }
}

function alterTable(node){
    art.confirm('确认要修改吗?', function () {
        _node = $(node);
        var engine = _node.parent().parent().find('dl').eq(1).find('input:checked').val();
        $.post('<?php echo smarty_site_url(array('action_method'=>"table/alterTableByAjax"),$_smarty_tpl);?>
','engine='+engine+'&tableName='+tableName,function(data){
            if(data.replace(/\s+/g,'')!=1){
                art.alert('修改出错,请联系开发人员');
            }
        })
    }, function () {});
}

function alterTableConfig(node){
    art.confirm('确认要修改吗?', function () {
        _node = $(node);
        var desp = _node.parent().parent().find('dl').eq(0).find('input').val();
        var autoform = _node.parent().parent().find('dl').eq(1).find('input:checked').val();
        var controller = _node.parent().parent().find('dl').eq(2).find('input').val();
        $.post('<?php echo smarty_site_url(array('action_method'=>"table/alterTableConfigByAjax"),$_smarty_tpl);?>
','desp='+desp+'&tableName='+tableName+'&autoform='+autoform+'&controller='+controller,function(data){
            if(data.replace(/\s+/g,'')!=1){
                art.alert('修改出错,请联系开发人员');
            }
        })
    }, function () {});
}

<?php }?>
</script>





<?php }} ?>