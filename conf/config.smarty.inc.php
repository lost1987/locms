<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-6-20
 * Time: 上午11:48
 * To change this template use File | Settings | File Templates.
 */

$tpl = new Tpl();
$tpl->template_dir = BASEPATH.PHP_DIRECTORY."/templates/";
$tpl->compile_dir = BASEPATH.PHP_DIRECTORY."/templates_c/";
$tpl->config_dir = BASEPATH.PHP_DIRECTORY."/configs/";
$tpl->cache_dir = BASEPATH.PHP_DIRECTORY."/cache/";
//$tpl->cache_lifetime = 60 * 60 * 24;      //设置缓存时间
$tpl->left_delimiter = '<!@{';
$tpl->caching        = false;             //这里是调试时设为false,发布时请使用true

$tpl->right_delimiter = '}@>';
$tpl->compile_check = true;
$tpl->debugging = false;