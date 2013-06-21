<?php /* Smarty version Smarty-3.1.12, created on 2013-02-22 09:24:49
         compiled from "/Users/lost/www/locms/manage/templates/crawler.html" */ ?>
<?php /*%%SmartyHeaderCode:7853895705125dd1f1e8c29-71694104%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c261d5d88a2ccaee36699b0642bf67e45f47cea5' => 
    array (
      0 => '/Users/lost/www/locms/manage/templates/crawler.html',
      1 => 1361496225,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7853895705125dd1f1e8c29-71694104',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5125dd1f21c0d1_60894935',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5125dd1f21c0d1_60894935')) {function content_5125dd1f21c0d1_60894935($_smarty_tpl) {?><div style="margin-top:10px;margin-left:15px;">
地址&nbsp;:&nbsp;<input type="text" name="url" id="url" value="http://" style="width:300px"/>
目标网页编码&nbsp;:&nbsp;<input type="radio" name="charset" value="UTF-8" checked="checked">UTF-8 &nbsp;  <input type="radio" name="charset" value="GBK" >GBK
<button type="button" id="ck_btn"  onclick="getUrls()" >开始检测</button>
<button type="button" id="res_btn"  onclick="showresult()" >查看结果</button>
<button type="button"  onclick="clearCheck()" >清空结果</button>

<link rel="stylesheet" type="text/css" href="<?php echo @WEBROOT;?>
css/admin/crawler.css" />
<script src="<?php echo @WEBROOT;?>
jslib/lost.js" ></script>
<script src="<?php echo @WEBROOT;?>
jslib/crawler.js" ></script>

<div id="error_info">
    <a href=></a>
</div>
<table id="links">

</table>
</div><?php }} ?>