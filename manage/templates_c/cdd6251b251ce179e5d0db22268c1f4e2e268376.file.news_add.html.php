<?php /* Smarty version Smarty-3.1.12, created on 2013-02-25 15:29:34
         compiled from "/Users/lost/www/locms/manage/templates/news_add.html" */ ?>
<?php /*%%SmartyHeaderCode:20022285945121b432b44333-82690088%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdd6251b251ce179e5d0db22268c1f4e2e268376' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/news_add.html',
      1 => 1361777146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20022285945121b432b44333-82690088',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5121b432c75a12_28955158',
  'variables' => 
  array (
    'article' => 0,
    'arctypes' => 0,
    'element' => 0,
    'flag' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5121b432c75a12_28955158')) {function content_5121b432c75a12_28955158($_smarty_tpl) {?>
<div class="pageContent">
	<form method="post" action="<?php echo smarty_site_url(array('action_method'=>'news/save'),$_smarty_tpl);?>
" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<input type="hidden" name="id" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['article']->value['id'])===null||$tmp==='' ? '' : $tmp);?>
" />
        <div class="pageFormContent" layoutH="56">
			<p>
				<label>标题：</label>
				<input name="title" class="textInput required" type="text" size="30" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['article']->value['title'])===null||$tmp==='' ? '' : $tmp);?>
" />
			</p>
            <p>
                <label>栏目：</label>
                <select class="combox" name='typeid'>
                    <?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arctypes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value){
$_smarty_tpl->tpl_vars['element']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['element']->value['id']==$_smarty_tpl->tpl_vars['article']->value['typeid']){?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['element']->value['typename'];?>
</option>
                        <?php }else{ ?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['element']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['element']->value['typename'];?>
</option>
                        <?php }?>
                    <?php } ?>
                </select>
            </p>
            <p>
                <label>短标题：</label>
                <input name="shorttitle" class="textInput" type="text" size="30" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['article']->value['shorttitle'])===null||$tmp==='' ? '' : $tmp);?>
" />
            </p>
            <p>
                <label>标记：</label>
                <input type="checkbox" name="fg" value="d" onclick="changef();"/>首页热点推荐&nbsp;
                <input type="checkbox" name="fg" value="h" onclick="changef();"/>头条&nbsp;
                <input type="checkbox" name="fg" value="c" onclick="changef();"/>推荐&nbsp;
                <input type="checkbox" name="fg" value="o" onclick="changef();"/>热点&nbsp;
                <input type="checkbox" name="fg" value="a" onclick="changef();"/>特荐&nbsp;
                <input type="checkbox" name="fg" value="p" onclick="changef();"/>图片&nbsp;
                <input type="checkbox" name="fg" value="v" onclick="changef();"/>视频&nbsp;
                <input type="checkbox" name="fg" value="b" onclick="changef();"/>栏目头条&nbsp;
                <input type="checkbox" name="fg" value="f" onclick="changef();"/>幻灯&nbsp;
                <input type="hidden" name="flag" id="<?php echo $_smarty_tpl->tpl_vars['flag']->value;?>
" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['article']->value['flag'])===null||$tmp==='' ? '' : $tmp);?>
" />
                <script>

                    var fgarr=$('#<?php echo $_smarty_tpl->tpl_vars['flag']->value;?>
').val().split(',');
                    for(var i=0;i<fgarr.length;i++){
                        var fgs = $("input[name='fg']");
                        for(var j=0 ; j< fgs.length; j++){
                            if(fgarr[i] == $(fgs[j]).val()){
                                $(fgs[j]).attr('checked',true);
                                break;
                            }
                        }
                    }
                    function changef(){
                        var cks = $("input:checked[name='fg']");
                        var flags = '';
                        $(cks).each(function(){
                            flags += $(this).val() + ',';
                        });
                        flags = flags.substr(0,flags.length - 1);
                        $("#<?php echo $_smarty_tpl->tpl_vars['flag']->value;?>
").val(flags);
                    }
                </script>
            </p>
            <p>
                <label>作者：</label>
                <input name="writer" type="text" size="30" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['article']->value['writer'])===null||$tmp==='' ? '' : $tmp);?>
" />
            </p>
            <p>
                <label>来源：</label>
                <input name="source" type="text" size="30" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['article']->value['source'])===null||$tmp==='' ? '' : $tmp);?>
" />
            </p>
            <p>
                <label>缩略图：</label>
                <input type="text" name="litpic"  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['article']->value['litpic'])===null||$tmp==='' ? '' : $tmp);?>
" style="width: 400px;" id="input_pic">&nbsp;<input
                    type="button" class="submit" value="上传" onclick="showupwindow('input_pic')" />
                <input type="hidden" id="callback" value="" />
            </p>
            <p style="height: 100px">
                <label>关键字：</label>
                <textarea class="textArea" name="keywords" rows="5" cols="70"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['article']->value['keywords'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
            </p>
            <p style="height: 100px">
                <label>描述：</label>
                <textarea class="textArea" name="description" rows="5" cols="70"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['article']->value['description'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
            </p>
            <p>
                <label>内容：</label>
                <textarea class="editor"  name="content" rows="20" cols="100"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['article']->value['body'])===null||$tmp==='' ? '' : $tmp);?>
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
<script>
function showupwindow(node)
{
$('#callback').val(node);
var t = Date.parse(new Date());
$('body').append('<div style="width: 349px; height: 220px; margin-left: -175px; margin-top: -110px; top: 355px;" class="xheModal" id="div_up"><div class="xheModalTitle"><span title="关闭 (Esc)" class="xheModalClose" onclick="close_up()"></span>上传文件</div><div class="xheModalContent" style="height: 191px;"><iframe frameborder="0" style="width: 100%; height: 100%;" src="<?php echo @WEBROOT;?>
xheditor/xheditor_plugins/multiupload/singleupload.html?watermark=0&t="'+t+'></iframe></div></div>');
$('#div_up').css('top',$(document).scrollTop()+(window.screen.availHeight/2-80));
}

function close_up()
{
$('#div_up').remove();
}

</script><?php }} ?>