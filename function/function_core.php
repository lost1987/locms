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
    $f = $GLOBALS['f'];
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
 * 取数组下标从start 到 end条
 *
 */
function array_fetch($start , $limit ,$array){
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
 * @param $element  要插入的元素
 * @param $index    要插入的索引位置
 * @param $array    原始数组
 * @return array
 * 将元素插入到$index的数组位置
 */
function array_insert_element($element,$index,$array){
    if($index < 0)
        throw new OutOfRangeException('index must be > 0');
    $next_array = array_slice($array,$index-1);
    $pre_array = array_slice($array,0,$index-1);
    $pre_array[] = $element;
    return array_merge($pre_array,$next_array);
}

/**
 * @param $index
 * @param $array
 * @return mixed
 * @throws OutOfRangeException
 * 删除下标为index的数组元素
 */
function array_delete_element($index,$array){
    if($index < 0)
        throw new OutOfRangeException('index must be > 0');
    unset($array[$index-1]);
    return $array;
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

/**
 * @param $str
 * @param $start
 * @param $len
 * @return string
 * 截取中文的UTF8字符串
 */
function utf8_substr($str,$start,$len){
        $default = mb_internal_encoding();
        if( strtolower(mb_internal_encoding()) != 'utf-8' ){
            mb_internal_encoding('UTF-8');
        }
        $result = mb_substr($str,$start,$len);
        mb_internal_encoding($default);
        return $result;
}

/**
 * @param $parttern
 * @param $replacement
 * @param $str
 * @return string
 * 替换中文的UTF8字符串
 */
function utf8_parttern_replace($parttern,$replacement,$str){
        $default = mb_regex_encoding();
        if( strtolower(mb_regex_encoding()) != 'utf-8'){
            mb_regex_encoding('UTF-8');
        }
        $result = mb_ereg_replace($parttern,$replacement,$str);
        mb_regex_encoding($default);
        return $result;
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

function make_rand_str( $length = 18 )
{
    // 密码字符集，可任意添加你需要的字符
    $chars = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',
        'i', 'j', 'k', 'l','m', 'n', 'o', 'p', 'q', 'r', 's',
        't', 'u', 'v', 'w', 'x', 'y','z', 'A', 'B', 'C', 'D',
        'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L','M', 'N', 'O',
        'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y','Z',
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

    // 在 $chars 中随机取 $length 个数组元素键名
    $keys = array_rand($chars, $length);
    $password = '';
    for($i = 0; $i < $length; $i++)
    {
        // 将 $length 个数组元素连接成字符串
        $password .= $chars[$keys[$i]];
    }
    return $password;
}

/**
 * 读取CSV
 * @param $filename
 * @return array
 */
function getCSVdata($filename)
{
    $row = 1;//第一行开始
    if(($handle = fopen($filename, "r")) !== false)
    {
        while(($dataSrc = fgetcsv($handle)) !== false)
        {
            $num = count($dataSrc);
            for ($c=0; $c < $num; $c++)//列 column
            {
                if($row === 1)//第一行作为字段
                {
                    $dataName[] = $dataSrc[$c];//字段名称
                }
                else
                {
                    foreach ($dataName as $k=>$v)
                    {
                        if($k == $c)//对应的字段
                        {
                            $data[$v] = $dataSrc[$c];
                        }
                    }
                }
            }
            if(!empty($data))
            {
                $dataRtn[] = $data;
                unset($data);
            }
            $row++;
        }
        fclose($handle);
        return $dataRtn;
    }
}

/**
 * 将类似 \x30\x31\x32\x33\ 这类字符转换成 10进制的字符串
 * 过程: 以上为例 30,31,32,33 都是16进制
 * 将他们先转为10进制然后再用ascii码来换成字符
 * 再连接起来就是结果
 * @param $x16
 * @return null|string
 */
function ascii16toStr($x16){
    if(!is_string($x16))return null;
    $charlist = explode('\x',$x16);
    $str = array();
    foreach($charlist as $char){
        if(empty($char))continue;
        $str[] = chr(hexdec($char));
    }
    return implode($str);
}

/**
 * 将str 的每个字母 转换成ascii 再转成16进制
 * 只支持英文 结果类似如下
 * \x30\x31\x32\x33\
 */
function strtoAscii16($str){
    if(!is_string($str)) return null;
    $asciis = array();
    for($i = 0 ; $i < strlen($str) ; $i++){
        $asciis[] = '\x'.dechex(ord($str[$i]));
    }
    return implode($asciis);
}

?>