<?php /* Smarty version Smarty-3.1.12, created on 2013-01-15 14:38:43
         compiled from "/Users/lost/www/locms/manage/templates/admin_permission_list.html" */ ?>
<?php /*%%SmartyHeaderCode:100062962750efa9fb686740-61785810%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72127e00786615561a473586b766972468a20174' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/admin_permission_list.html',
      1 => 1358231254,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100062962750efa9fb686740-61785810',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50efa9fb6c11b7_75484464',
  'variables' => 
  array (
    'admins' => 0,
    'element' => 0,
    'permissions' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50efa9fb6c11b7_75484464')) {function content_50efa9fb6c11b7_75484464($_smarty_tpl) {?><div class="pageFormContent">
	<form id="perform" method="post" action="<?php echo smarty_site_url(array('action_method'=>'admin/save_module_permission'),$_smarty_tpl);?>
" onsubmit="return validateCallback(this, navTabAjaxDone)">
		<input type="hidden" name ="permission" id="permission_values" value="0" />

		<fieldset>
			<legend>权限分配</legend>
			<dl class="nowrap">
				<dt>管理员:</dt>
				<dd>
					<select name = "id" id="seeManager" class="combox" onchange="manager_permission()">
						<option value="">请选择</option>
						<?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['admins']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value){
$_smarty_tpl->tpl_vars['element']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['element']->value['admin'];?>
</option>
						<?php } ?>
					</select>
				</dd>
			</dl>
			<dl class="nowrap">
				<dt>权限:</dt>
				<dd>
					<ul id="ul_permission">
                        <?php echo $_smarty_tpl->tpl_vars['permissions']->value;?>

					</ul>
				</dd>
			</dl>
			
		</fieldset>
		
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="button" onclick="do_submit();">提交</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
    </form>
</div>
<script>

function manager_permission(){
	var id = $("#seeManager").val();
    if(id == '')return;
	var url = "<?php echo smarty_site_url(array('action_method'=>'admin/check_permission_by_adminid'),$_smarty_tpl);?>
";
	$.ajax({
		url : url,
		data: "id="+id,
		type: "post",
		dataType: "html",
		success:function(data){
			  $("#ul_permission").html(data);
		}
	});
}

function do_submit(){
	var cks = $("input:checked");
	var ck_permission = '';
	$(cks).each(function(){
		ck_permission += $(this).val()+',';
	});
	ck_permission = ck_permission.substr(0,ck_permission.length -1).replace(/\s+/g,'');
	if(ck_permission != ''){
		$("#permission_values").val(ck_permission);
	}
	$("#perform").submit();
}
</script>

<style>
    #ul_permission li{
        float:left;
        margin-right:10px;
    }
</style><?php }} ?>