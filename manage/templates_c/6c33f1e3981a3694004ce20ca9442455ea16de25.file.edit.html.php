<?php /* Smarty version Smarty-3.1.12, created on 2013-02-25 17:50:39
         compiled from "/Users/lost/www/locms/manage/templates/auto/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:1843426866511a1e6c94bd01-74873018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c33f1e3981a3694004ce20ca9442455ea16de25' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/auto/edit.html',
      1 => 1361785715,
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
        <input type="hidden" id="callback" />
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
                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration']==1&&$_smarty_tpl->tpl_vars['field']->value['Key']=='PRI'){?>
                    <!--{如果第一个字段是主键则不显示}-->
                <?php }else{ ?>
                    <<?php ?>?php $timestamp = time(); ?<?php ?>>
                    <dl class="nowrap">
                        <dt><?php echo $_smarty_tpl->tpl_vars['field']->value['Comment'];?>
:</dt>
                        <dd>
                            <?php echo smarty_field(array('name'=>$_smarty_tpl->tpl_vars['field']->value['Field'],'type'=>$_smarty_tpl->tpl_vars['field']->value['form_field_type'],'value'=>(($tmp = @$_smarty_tpl->tpl_vars['field']->value['value'])===null||$tmp==='' ? '' : $tmp),'refer'=>$_smarty_tpl->tpl_vars['field']->value['refer'],'datasource'=>$_smarty_tpl->tpl_vars['field']->value['datasource'],'condition'=>$_smarty_tpl->tpl_vars['field']->value['cond'],'validate'=>$_smarty_tpl->tpl_vars['field']->value['formValidate']),$_smarty_tpl);?>

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
<link href="<?php echo @WEBROOT;?>
xheditor/xheditor_skin/default/ui.css" rel="stylesheet" type="text/css"/>
<script>
    //针对上传写的脚本
    function showupwindow(node)
    {
        $('#callback').val(node);
        var t = Date.parse(new Date());
        $('body').append('<div style="width: 349px; height: 220px; margin-left: -175px; margin-top: -110px; top: 355px;" class="xheModal" id="div_auto_upload"><div class="xheModalTitle"><span title="关闭 (Esc)" class="xheModalClose" onclick="close_up()"></span>上传文件</div><div class="xheModalContent" style="height: 191px;"><iframe frameborder="0" style="width: 100%; height: 100%;" src="<?php echo @WEBROOT;?>
xheditor/xheditor_plugins/multiupload/singleupload.php?watermark=0&t="'+t+'></iframe></div></div>');
        $('#div_auto_upload').css('top',$(document).scrollTop()+(window.screen.availHeight/2-80));
    }

    function close_up()
    {
        $('#div_auto_upload').remove();
    }


    var multiNode ;

    function show_multi_upload(node){
        multiNode = node;
        $('#callback').val('multi_upload_callback');
        var t = Date.parse(new Date());
        $('body').append('<div style="width: 349px; height: 220px; margin-left: -175px; margin-top: -110px; top: 355px;" class="xheModal" id="div_auto_upload"><div class="xheModalTitle"><span title="关闭 (Esc)" class="xheModalClose" onclick="close_up()"></span>上传文件</div><div class="xheModalContent" style="height: 191px;"><iframe frameborder="0" style="width: 100%; height: 100%;" src="<?php echo @WEBROOT;?>
xheditor/xheditor_plugins/multiupload/multiupload.php?watermark=0&t="'+t+'></iframe></div></div>');
        $('#div_auto_upload').css('top',$(document).scrollTop()+(window.screen.availHeight/2-80));
    }

    function multi_upload_callback(urls){
        $("#"+multiNode).next().next().empty();
        $("#"+multiNode).val(urls);
        var urls = urls.split(',');
        for(var i in urls){
            $("#"+multiNode).next().next().append('<div class="ms_container"><span>'+urls[i]+'</span>&nbsp;&nbsp;&nbsp;&nbsp;<i onclick="multi_del(this)">X</i></div>');
        }
    }

    function multi_del(node){
        var container = $(node).parent().parent();
        $(node).parent().remove();
        var new_url = [];
        var new_url_span = $(container).find('span').each(function(){
                new_url.push($(this).text());
        })
        $(container).prev().prev().val(new_url.join(','));
    }

    $(function(){//修改时读取多上传字段的值 并写入到div中
        $("input[class='multi_val']").each(function(){
            if($(this).val() != ''){
                var urls = $(this).val().split(',');
                for(var i in urls){
                    $(this).next().next().append('<div class="ms_container"><span>'+urls[i]+'</span>&nbsp;&nbsp;&nbsp;&nbsp;<i onclick="multi_del(this)">X</i></div>');

                }
            }
        });

    })

</script>

<style>
    .ms_container{
        height:25px;
        margin-top:10px;
    }

    .ms_container i{
        cursor:pointer;
        color:red;
    }
</style><?php }} ?>