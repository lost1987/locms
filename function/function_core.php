<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-5
 * Time: 上午11:34
 * To change this template use File | Settings | File Templates.
 */

/**
 * 用于非url地址加密
 * @param string $string 原文或者密文
 * @param string $operation 操作(ENCODE | DECODE), 默认为 DECODE
 * @param string $key 密钥
 * @param int $expiry 密文有效期, 加密时候有效， 单位 秒，0 为永久有效
 * @return string 处理后的 原文或者 经过 base64_encode 处理后的密文
 * @example
 *   $a = authcode('abc', 'ENCODE', 'key');
 *   $b = authcode($a, 'DECODE', 'key');  // $b(abc)
 *
 *   $a = authcode('abc', 'ENCODE', 'key', 3600);
 *   $b = authcode('abc', 'DECODE', 'key'); // 在一个小时内，$b(abc)，否则 $b 为空
 */
function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0)
{

    $ckey_length = 4;

    $key = md5($key ? $key : "kalvin.cn");
    $keya = md5(substr($key, 0, 16));
    $keyb = md5(substr($key, 16, 16));
    $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length) : substr(md5(microtime()), -$ckey_length)) : '';

    $cryptkey = $keya . md5($keya . $keyc);
    $key_length = strlen($cryptkey);

    $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0) . substr(md5($string . $keyb), 0, 16) . $string;
    $string_length = strlen($string);

    $result = '';
    $box = range(0, 255);

    $rndkey = array();
    for ($i = 0; $i <= 255; $i++) {
        $rndkey[$i] = ord($cryptkey[$i % $key_length]);
    }

    for ($j = $i = 0; $i < 256; $i++) {
        $j = ($j + $box[$i] + $rndkey[$i]) % 256;
        $tmp = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }

    for ($a = $j = $i = 0; $i < $string_length; $i++) {
        $a = ($a + 1) % 256;
        $j = ($j + $box[$a]) % 256;
        $tmp = $box[$a];
        $box[$a] = $box[$j];
        $box[$j] = $tmp;
        $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
    }

    if ($operation == 'DECODE') {
        if ((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26) . $keyb), 0, 16)) {
            return substr($result, 26);
        } else {
            return '';
        }
    } else {
        return $keyc . str_replace('=', '', base64_encode($result));
    }
}


//单图片上传
/**
 * @author buhuan
 * @param string $file_form_name form表单的上传文件字段的名称 name属性
 * @param string $upload_path    上传的文件夹绝对路径
 * @param string $web_path       上传后文件相对于网站根目录的相对路径
 * @param bool $debug            是否显示上传失败的错误信息
 * @param array  $file_type       上传的文件类型
 * @param int $file_size_limit   上传的文件大小限制 默认512KB
 * @return  失败返回FLASE 或者 上传成功返回图片地址的URL
 */
function uploadImage($file_form_name = '', $upload_path = '', $web_path = '', $debug = FALSE, $file_size_limit = 524288, $file_type)
{

    if (empty($file_form_name) OR empty($upload_path) OR empty($web_path)) {
        if ($debug) {
            echo '错误：form表单的上传字段的名称 或 上传的文件夹绝对路径 或 上传后文件相对于网站根目录的相对路径 为空';
            exit;
        }
        return FALSE;
    }

    //检查后缀，如果不存在就取默认允许的后缀
    $file_type = is_array($file_type) && count($file_type) > 0 ? $file_type : array('image/jpg', 'image/jpeg', 'image/gif');

    //判断目录是否存在，不存在就创建
    if (!is_dir($upload_path)) mkdir($upload_path, 0777, TRUE);

    $file = $_FILES[$file_form_name];

    //检查文件大小
    $file_size = $file['size'];
    if ($file_size > $file_size_limit) {
        if ($debug) {
            echo '错误：上传的文件大小不能超过' . $file_size_limit;
            exit;
        }
        return FALSE;
    }

    //检查文件类型
    $type = $file['type'];
    if (!in_array($type, $file_type)) {
        if ($debug) {
            echo '错误：上传的文件类型应该是' . implode(',', $file_type) . '中的一种';
            exit;
        }
        return FAlSE;
    }

    //获得后缀
    $ext = explode('/', $type);

    //上传后的文件名
    $newfile = time() . '.' . $ext[1];

    if (move_uploaded_file($file['tmp_name'], $upload_path . $newfile)) {
        $filename = $web_path . $newfile;
        return $filename;
    }

    if ($debug) {
        echo '错误：上传文件失败：未知错误';
        exit;
    }

}

//判断是否是ajax请求
function is_ajax_req(){
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        //如果是ajax请求
       return TRUE;
    }
    return FALSE;
}

function check_login()
{
    global $f;
    $cookie = $f->cookie;
    $admin = $cookie->userdata('admin');
    $admin_id = $cookie->userdata('admin_id');

    if(is_ajax_req()){
        //如果是ajax请求
        if(empty($admin) || empty($admin_id))
        dwz_timeout();
    }


    if ((empty($admin) || empty($admin_id)) && $f->pathinfo->method != 'loginpage' && $f->pathinfo->method != 'dologin') {
        mappingforward('login/loginpage');
    }

}

/**
 * @param $action String 控制器/方法
 * @param $entrance String 入口文件名
 */
function mappingforward($action_method)
{
    global $entrance;
    $url = WEBROOT . $entrance . '/' . $action_method;
    header("location:".$url);
    exit;
}

function site_url($action_method)
{
    global $entrance;
    if (empty($action_method)) {
        return WEBROOT;
    } else {
        return WEBROOT . $entrance . '/' . $action_method;
    }
}


function inputFilter($str)
{
    if (empty($str) && intval($str)!=0) {
        return;
    }

    if ($str == "") {
        return $str;
    }
    $str = trim($str);
    $str = str_replace("&", "&amp;", $str);
    $str = str_replace(">", "&gt;", $str);
    $str = str_replace("<", "&lt;", $str);
    $str = str_replace(chr(32), "&nbsp;", $str);
    $str = str_replace(chr(9), "&nbsp;", $str);
    $str = str_replace(chr(34), "&", $str);
    $str = str_replace(chr(39), "&#39;", $str);
    $str = str_replace(chr(13), "<br />", $str);
    $str = str_replace("'", "''", $str);
    $str = str_replace("select", "sel&#101;ct", $str);
    $str = str_replace("join", "jo&#105;n", $str);
    $str = str_replace("union", "un&#105;on", $str);
    $str = str_replace("where", "wh&#101;re", $str);
    $str = str_replace("insert", "ins&#101;rt", $str);
    $str = str_replace("delete", "del&#101;te", $str);
    $str = str_replace("update", "up&#100;ate", $str);
    $str = str_replace("like", "lik&#101;", $str);
    $str = str_replace("drop", "dro&#112;", $str);
    $str = str_replace("create", "cr&#101;ate", $str);
    $str = str_replace("modify", "mod&#105;fy", $str);
    $str = str_replace("rename", "ren&#097;me", $str);
    $str = str_replace("alter", "alt&#101;r", $str);
    $str = str_replace("cast", "ca&#115;", $str);
    return $str;
}

function daddslashes($string, $force = 1)
{
    if (is_array($string)) {
        foreach ($string as $key => $val) {
            unset($string[$key]);
            $string[addslashes($key)] = daddslashes($val, $force);
        }
    } else {
        $string = addslashes($string);
    }
    return $string;
}


function getip() {
    if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
        $cip = $_SERVER["HTTP_CLIENT_IP"];
    } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    } elseif (!empty($_SERVER["REMOTE_ADDR"])) {
        $cip = $_SERVER["REMOTE_ADDR"];
    } else {
        $cip = "无法获取！";
    }
    return $cip;
}


function multi($num, $perpage, $curpage, $mpurl)
{
    $page = 5;
    $multipage = '';
    $mpurl .= strpos($mpurl, '?') ? '&' : '?';
    $realpages = 1;
    if($num > $perpage) {
        $offset = 2;
        $realpages = @ceil($num / $perpage);
        $pages = $realpages;
        if($page > $pages) {
            $from = 1;
            $to = $pages;
        } else {
            $from = $curpage - $offset;
            $to = $from + $page - 1;
            if($from < 1) {
                $to = $curpage + 1 - $from;
                $from = 1;
                if($to - $from < $page) {
                    $to = $page;
                }
            } elseif($to > $pages) {
                $from = $pages - $page + 1;
                $to = $pages;
            }
        }
        $multipage = '';
        $urlplus = $todiv?"#$todiv":'';
        if($curpage - $offset > 1 && $pages > $page) {
            $multipage .= "<a ";
            $multipage .= "href=\"{$mpurl}page=1{$urlplus}\"";
            $multipage .= " class=\"first\">1 ...</a>";
        }
        if($curpage > 1) {
            $multipage .= "<a ";
            $multipage .= "href=\"{$mpurl}page=".($curpage-1)."$urlplus\"";
            $multipage .= " class=\"prev\">&lsaquo;&lsaquo;</a>";
        }
        for($i = $from; $i <= $to; $i++) {
            if($i == $curpage) {
                $multipage .= '<strong>'.$i.'</strong>';
            } else {
                $multipage .= "<a ";
                $multipage .= "href=\"{$mpurl}page=$i{$urlplus}\"";
                $multipage .= ">$i</a>";
            }
        }
        if($curpage < $pages) {
            $multipage .= "<a ";
            $multipage .= "href=\"{$mpurl}page=".($curpage+1)."{$urlplus}\"";
            $multipage .= " class=\"next\">&rsaquo;&rsaquo;</a>";
        }
        if($to < $pages) {
            $multipage .= "<a ";
            $multipage .= "href=\"{$mpurl}page=$pages{$urlplus}\"";
            $multipage .= " class=\"last\">... $realpages</a>";
        }
        if($multipage) {
            $multipage = '<em>&nbsp;'.$num.'&nbsp;</em>'.$multipage;
        }
    }
    return $multipage;
}


function createfile($file_name,$str)
{
    $file_pointer=fopen($file_name,"w");
    fwrite($file_pointer,$str);
    fclose($file_pointer);
}

function createDir($dir)
{
    if(!is_dir($dir))
    {
        mkdir($dir,0777,true);
    }
}

/**
 * 取数组下标从start 到 end条
 *
 */
function fetch_array($start , $limit ,$array){
    if(!is_int($start) || !is_int($limit)){
        return;
    }

    $newarray = array();

    for($i =0 ; $i < count($array) ; $i++){
        if($i >= $start && $i < $limit){
            $newarray[] = $array[$i];
        }
    }

    return $newarray;
}


/**
 * @param $dir String  目录的路径最后需要加'/'
 * 取得指定目录下的所有子目录
 */
function fetch_children_dir($dir){

      if(!preg_match('/.*\/$/i',$dir)){
          $dir = $dir.DIRECTORY_SEPARATOR;
      }

      $files_dirs = scandir($dir);
      $dirnames = array();
      foreach($files_dirs as $dirname){
          if(is_dir($dir.$dirname) && strpos($dirname,'.') === false){
                $dirnames[] = $dirname;
          }
      }
      return $dirnames;
}

/**
 * @param $extension_name  扩展的名称
 */
function check_extension_is_on($extension_name){
      $extensions = get_loaded_extensions();
      if(in_array($extension_name,$extensions))
      return TRUE;
      return FALSE;
}

?>