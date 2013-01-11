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

function check_login()
{
    global $f;
    $cookie = $f->cookie;
    $admin = $cookie->userdata('admin');
    $admin_id = $cookie->userdata('admin_id');
    if (empty($admin) || empty($admin_id)) {
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
    if (empty($str)) {
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

function htmlmulti($page,$pagecount,$url)
{
    if($pagecount==1)
    {
        return "";
    }
    $html='<div class="pag"><a href="'.str_replace("page","1",$url).'">首页</a>';
    if($page==1)
    {
        $html.='<a href="javascript:void(0)">上一页</a>';
    }
    else
    {
        $html.='<a href="'.str_replace("page",($page-1),$url).'">上一页</a>';
    }
    $st=0;
    $e=0;
    if($page-5<1)
    {
        $st=1;
    }
    else
    {
        $st=$page-5;
    }
    if($page+5>$pagecount)
    {
        $e=$pagecount;
    }
    else
    {
        $e=$page+5;
    }
    for($plist=$st;$plist<=$e;$plist++)
    {
        if($plist!=$page)
        {
            $html.='<a href="'.str_replace("page",$plist,$url).'">'.$plist.'</a>';
        }
        else
        {
            $html.='<a class="p_hov">'.$plist.'</a>';
        }
    }
    if($page==$pagecount)
    {
        $html.='<a href="javascript:void(0)">下一页</a>';
    }
    else
    {
        $html.='<a href="'.str_replace("page",($page+1),$url).'">下一页</a>';
    }
    return $html.='<a href="'.str_replace("page",$pagecount,$url).'">末页</a></div>';
}


function getTrueArticleUrl($pubdate,$id)
{
    $typedir=strftime("%y%m",$pubdate);
    return '/'.$typedir.'/'.$id.'.html';
}

function makeArticle($id)
{
    global $tpl;
    global 	$_SGLOBAL;
    $id=intval($id);
    $tpl->assign('aid',$id);

    //读取头部-头部宏标记
    $sql = "select normbody from mytag where id=60";
    $result = getOneRecord($sql);
    $tpl->assign("265G_iphone",$result['normbody']);

    $sql = "select normbody from mytag where id=61";
    $result = getOneRecord($sql);
    $tpl->assign("yijianyueyu",$result['normbody']);

    $sql = "select normbody from mytag where id=62";
    $result = getOneRecord($sql);
    $tpl->assign("menutype",$result['normbody']);


    //判断是哪个模板
    $sql = "select b.id,b.reid from article a,arctype b where a.typeid = b.id and a.id = $id";
    $result = getonerecord($sql);
    $cid = $result['id'];
    if($result['reid'] == 7 || $result['reid'] == 21 || $result['reid']== 30 || $result['reid'] == 43){
        //采用游戏模板

        //读取下载必看宏标记
        $sql = "select normbody from mytag where id = 64";
        $query = getonerecord($sql);
        $tpl->assign("downbikan",$query['normbody']);

        //读取游戏
        $sql = "select a.id,a.title,a.pubdate,b.typedir from article a ,arctype b  where a.typeid = b.id and b.id = $cid and a.id <> $id order by a.pubdate desc limit 0,10";
        $query = $_SGLOBAL['db']->query($sql);
        $flag = 0 ;
        while ($value = $_SGLOBAL['db']->fetch_array($query))
        {
            $value["url"]=getCommonArcUrl($value['typedir'], $value['id'], $value['pubdate']);
            if($flag>-1 && $flag <5){
                $list1[] = $value;
            }else{
                $list2[] = $value;
            }
            $flag++;
        }
        $tpl->assign('pingcelist1',$list1);
        $tpl->assign('pingcelist2',$list2);
        unset($list1);
        unset($list2);

        $sql="select a.*,b.body,c.typename,c.typedir,c.temparticle,c.keywords as typekeywords from article a,articlebody b,arctype c where a.id=b.aid and a.id=$id and a.typeid=c.id";
        $articleinfo=getonerecord($sql);
        $tpl->assign("id",$id);
        $tpl->assign("litpic",$articleinfo['litpic']);
        $tpl->assign("durl",$articleinfo['durl']);
        $tpl->assign("ver",$articleinfo['ver']);
        $tpl->assign("size",$articleinfo['size']);
        $tpl->assign("xing",$articleinfo['xing']);
        $tpl->assign('site',$articleinfo['site']);
        $tpl->assign("title",$articleinfo["title"]);
        $tpl->assign("typename",$articleinfo["typename"]);
        $tpl->assign("keywords",$articleinfo["keywords"]);
        $tpl->assign("typedir",$articleinfo["typedir"]);
        $tpl->assign("writer",$articleinfo["writer"]);
        $tpl->assign("source",$articleinfo["source"]);
        $tpl->assign("sourcehref",$articleinfo["sourcehref"]);
        $tpl->assign("pubdate",strftime("%Y-%m-%d",$articleinfo["pubdate"]));
        $tpl->assign("postnum",$articleinfo["postnum"]);
        $tpl->assign("xq",getXq($id));
        $tpl->assign("column",$articleinfo['title'].$articleinfo['ver']);
        if($result['reid'] == 7){
            $tpl->assign("pagekeywords",$articleinfo['keywords'].',iphone游戏,手机游戏');
        }else if($result['reid'] == 21){
            $tpl->assign("pagekeywords",$articleinfo['keywords'].',iphone软件,iphone应用,手机软件');
        }else if($result['reid'] == 30){
            $tpl->assign("pagekeywords",$articleinfo['keywords'].',iphone电影,手机电影');
        }else {
            $tpl->assign("pagekeywords",$articleinfo['keywords']);
        }
        $tpl->assign("pagedescription",msubstr(str_replace('&nbsp;', '', strip_tags($articleinfo['body'])), 0, 240));
        $tpl->assign("position",'<a href="http://iphone.265g.com" target="_blank" title="265G苹果站">265G苹果站</a>  <a href="/'.$articleinfo['typedir'].'/index.html" title="'.$articleinfo['typename'].'" class="last">'.$articleinfo['typename'].'</a>');
        $tpl->assign("star","/images/iphone/start".$articleinfo['xing'].'.jpg');
        $typedir=$articleinfo["typedir"];
        createDir($typedir);
        $bodyarr=explode('#p#副标题#e#',$articleinfo["body"]);
        $bodycount=count($bodyarr);
        for($i=0;$i<$bodycount;$i++)
        {
            if($bodycount>1)
            {
                if($i==$bodycount-1)
                {
                    $tpl->assign("adminname",'<p align="right">【责任编辑：SORA】</p>');
                    $tpl->assign("txwb",'<div id="txWB_W1"></div><script type="text/javascript">var tencent_wb_name = "weibo265G";var tencent_wb_sign = "253c2183178156b504ee5026c60256eda05df47f";var tencent_wb_style = "3";</script><script type="text/javascript" src="http://v.t.qq.com/follow/widget.js" charset="utf-8"/></script>');
                    $tpl->assign("xlwb",'<iframe width="63" height="24" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0" scrolling="no" frameborder="No" border="0" src="http://widget.weibo.com/relationship/followbutton.php?width=63&height=24&uid=2455775062&style=1&btn=red&dpc=1"></iframe>');
                    $tpl->assign("nexturl",'<script>var nexturl="'.getArticleNextUrl($articleinfo["typeid"]).'";</script>');
                }
                else
                {
                    $tpl->assign("adminname",'');
                    $tpl->assign("txwb",'');
                    $tpl->assign("nexturl",'<script>var nexturl="";</script>');
                }
                $tpl->assign("multi",htmlmulti($i+1,$bodycount,'/'.$typedir.'/'.$id.'_page.html'));
            }
            else
            {
                $tpl->assign("nexturl",'<script>var nexturl="'.getArticleNextUrl($articleinfo["typeid"]).'";</script>');
                $tpl->assign("txwb",'<div id="txWB_W1"></div><script type="text/javascript">var tencent_wb_name = "weibo265G";var tencent_wb_sign = "253c2183178156b504ee5026c60256eda05df47f";var tencent_wb_style = "3";</script><script type="text/javascript" src="http://v.t.qq.com/follow/widget.js" charset="utf-8"/></script>');
                $tpl->assign("xlwb",'<iframe width="63" height="24" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0" scrolling="no" frameborder="No" border="0" src="http://widget.weibo.com/relationship/followbutton.php?width=63&height=24&uid=2455775062&style=1&btn=red&dpc=1"></iframe>');
                $tpl->assign("adminname",'<p align="right">【责任编辑：SORA】</p>');
            }
            $tpl->assign("body",$bodyarr[$i]);
            if($result['reid'] == 43 || $result['reid'] == 30){
                //小说,电影
                $tpl->assign("description",$articleinfo['description']);
                $temp = $tpl->fetch('iphone/filmtext.html');
            }else{
                //游戏,软件
                $tpl->assign("description",msubstr(str_replace('&nbsp;', '', strip_tags($articleinfo['body'])), 0,130)."......");
                $temp = $tpl->fetch('iphone/game.html');
            }

            if($bodycount>1)
            {
                creatFile(S_ROOT.'/'.$typedir.'/'.$id.'_'.($i+1).'.html',$temp);
            }
            else
            {
                creatFile(S_ROOT.'/'.$typedir.'/'.$id.'.html',$temp);
            }
        }
        if($bodycount>1)
        {
            copy(S_ROOT.'/'.$typedir.'/'.$id.'_1.html',S_ROOT.'/'.$typedir.'/'.$id.'.html');
        }
        return '/'.$typedir.'/'.$id.'.html';
    }else{
        //采用普通文章模板
        $sql="select a.*,b.body,c.typename,c.typedir,c.temparticle,c.keywords as typekeywords,c.description from article a,articlebody b,arctype c where a.id=b.aid and a.id=$id and a.typeid=c.id";
        $articleinfo=getonerecord($sql);
        if(empty($articleinfo['writer'])){
            $articleinfo['writer'] = '未知';
        }
        if(empty($articleinfo['source'])){
            $articleinfo['source'] = '网络';
        }
        $articleinfo['sourcehref']='http://www.265g.com';
        $tpl->assign("id",$id);
        $tpl->assign("title",$articleinfo["title"]);
        $tpl->assign("typename",$articleinfo["typename"]);
        $tpl->assign("description",$articleinfo["description"]);
        $tpl->assign("keywords",$articleinfo["keywords"]);
        $tpl->assign("typedir",$articleinfo["typedir"]);
        $tpl->assign("writer",$articleinfo["writer"]);
        $tpl->assign("source",$articleinfo["source"]);
        $tpl->assign("sourcehref",$articleinfo["sourcehref"]);
        $tpl->assign("pubdate",strftime("%Y-%m-%d",$articleinfo["pubdate"]));
        $tpl->assign("postnum",$articleinfo["postnum"]);
        $tpl->assign("xq",getXq($id));
        $tpl->assign("column",$articleinfo['title']);
        $tpl->assign("pagekeywords",$articleinfo['keywords']);
        $tpl->assign("pagedescription",msubstr(str_replace('&nbsp;', '', strip_tags($articleinfo['body'])), 0, 240));
        $tpl->assign('arctitle',$articleinfo['title']);
        $tpl->assign("star","/images/iphone/start".$articleinfo['xing'].'.jpg');
        //$typedir=$articleinfo["typedir"].'/'.strftime("%y%m",$articleinfo["pubdate"]);
        $typedir=$articleinfo["typedir"];
        $tpl->assign("position",'<a href="http://iphone.265g.com" target="_blank" title="265G苹果站">265G苹果站</a>  <a href="/'.$articleinfo['typedir'].'/index.html" title="'.$articleinfo['typename'].'" class="last">'.$articleinfo['typename'].'</a>');
        createDir($typedir);
        $bodyarr=explode('#p#副标题#e#',$articleinfo["body"]);
        $bodycount=count($bodyarr);
        for($i=0;$i<$bodycount;$i++)
        {
            if($bodycount>1)
            {
                if($i==$bodycount-1)
                {
                    $tpl->assign("adminname",'<p align="right">【责任编辑：SORA】</p>');
                    $tpl->assign("txwb",'<div id="txWB_W1"></div><script type="text/javascript">var tencent_wb_name = "weibo265G";var tencent_wb_sign = "253c2183178156b504ee5026c60256eda05df47f";var tencent_wb_style = "3";</script><script type="text/javascript" src="http://v.t.qq.com/follow/widget.js" charset="utf-8"/></script>');
                    $tpl->assign("xlwb",'<iframe width="63" height="24" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0" scrolling="no" frameborder="No" border="0" src="http://widget.weibo.com/relationship/followbutton.php?width=63&height=24&uid=2455775062&style=1&btn=red&dpc=1"></iframe>');
                    $tpl->assign("nexturl",'<script>var nexturl="'.getArticleNextUrl($articleinfo["typeid"]).'";</script>');
                }
                else
                {
                    $tpl->assign("adminname",'');
                    $tpl->assign("txwb",'');
                    $tpl->assign("nexturl",'<script>var nexturl="";</script>');
                }
                $tpl->assign("multi",htmlmulti($i+1,$bodycount,'/'.$typedir.'/'.$id.'_page.html'));
            }
            else
            {
                $tpl->assign("nexturl",'<script>var nexturl="'.getArticleNextUrl($articleinfo["typeid"]).'";</script>');
                $tpl->assign("txwb",'<div id="txWB_W1"></div><script type="text/javascript">var tencent_wb_name = "weibo265G";var tencent_wb_sign = "253c2183178156b504ee5026c60256eda05df47f";var tencent_wb_style = "3";</script><script type="text/javascript" src="http://v.t.qq.com/follow/widget.js" charset="utf-8"/></script>');
                $tpl->assign("xlwb",'<iframe width="63" height="24" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0" scrolling="no" frameborder="No" border="0" src="http://widget.weibo.com/relationship/followbutton.php?width=63&height=24&uid=2455775062&style=1&btn=red&dpc=1"></iframe>');
                $tpl->assign("adminname",'<p align="right">【责任编辑：SORA】</p>');
            }
            $tpl->assign("body",$bodyarr[$i]);
            $temp = $tpl->fetch('iphone/article.html');
            if($bodycount>1)
            {
                creatFile(S_ROOT.'/'.$typedir.'/'.$id.'_'.($i+1).'.html',$temp);
            }
            else
            {
                creatFile(S_ROOT.'/'.$typedir.'/'.$id.'.html',$temp);
            }
        }
        if($bodycount>1)
        {
            copy(S_ROOT.'/'.$typedir.'/'.$id.'_1.html',S_ROOT.'/'.$typedir.'/'.$id.'.html');
        }
        return '/'.$typedir.'/'.$id.'.html';
    }
}


function makeList($id)
{
    global $tpl,$_SGLOBAL;
    $id=intval($id);
    $sql="select * from arctype where id=$id";
    $row=getonerecord($sql);
    $typename=$row["typename"];
    $tpl->assign("typename",$typename);
    $tpl->assign("pagekeywords",$row['keywords']);
    $tpl->assign("pagedescription",$row['description']);
    $tpl->assign("column",$row['typename']);
    $typedir=$row["typedir"];
    createDir($typedir);

    $tpl->assign("position",'<a href="http://iphone.265g.com" target="_blank" title="265G苹果站">265G苹果站</a>  <a href="/'.$row['typedir'].'/index.html" title="'.$typename.'" class="last">'.$typename.'</a>');

    //读取头部-头部宏标记
    $sql = "select normbody from mytag where id=60";
    $result = getOneRecord($sql);
    $tpl->assign("265G_iphone",$result['normbody']);

    $sql = "select normbody from mytag where id=61";
    $result = getOneRecord($sql);
    $tpl->assign("yijianyueyu",$result['normbody']);

    $sql = "select normbody from mytag where id=62";
    $result = getOneRecord($sql);
    $tpl->assign("menutype",$result['normbody']);

    $perpage=10;
    $count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("select count(*) from article where typeid=$id"), 0);
    $start=1;
    if($count)
    {
        $pagecount=$count%$perpage==0?floor($count/$perpage):floor($count/$perpage)+1;
        $sql="select * from article where typeid=$id order by id desc";
        $query = $_SGLOBAL['db']->query($sql);
        while ($value = $_SGLOBAL['db']->fetch_array($query))
        {
            $value["url"]=getCommonArcUrl($typedir, $value['id'], $value['pubdate']);
            //$value["pubdate"]=strftime("%m-%d",$value["pubdate"]);
            if(empty($value['writer'])){
                $value['writer'] = '265G';
            }
            if(empty($value['source'])){
                $value['source'] = 'www.265g.com';
            }
            $value['sourcehref']='http://www.265g.com';
            if(empty($value['description'])){
                $sql = "select body  from articlebody where aid= ".$value['id'];
                $result = getonerecord($sql);
                $value['description'] = msubstr(strip_tags($result['body']), 0, 300)."......";
            }
            if(empty($value['litpic'])){
                $value['litpic'] = '/images/iphone/default.png';
            }
            $list[] = $value;
            if($start%$perpage==0&&$start!=0)
            {
                $tpl->assign("list",$list);
                $page=$start%$perpage==0?floor($start/$perpage):floor($start/$perpage)+1;
                $tpl->assign("multi",htmlmulti($page,$pagecount,"/".$typedir."/list_".$id."_page.html"));
                $temp = $tpl->fetch('iphone/list.html');
                creatFile($typedir."/list_".$id."_".$page.".html",$temp);
                unset($list);
            }
            $start++;
        }
        if(!empty($list))
        {
            $tpl->assign("list",$list);
            $tpl->assign("multi",htmlmulti($pagecount,$pagecount,"/".$typedir."/list_".$id."_page.html"));
            $temp = $tpl->fetch('iphone/list.html');
            creatFile($typedir."/list_".$id."_".$pagecount.".html",$temp);
        }
        copy(S_ROOT.'/'.$typedir."/list_".$id."_1.html",S_ROOT.'/'.$typedir."/index.html");
    }
    return '/'.$typedir.'/index.html';
}


/**
 * 生成专题
 */
function makeZt($id){
    set_time_limit(0);
    global $tpl,$_SGLOBAL;
    //读取专题内容
    $sql = "select * from zt where id = $id";
    $result = getOneRecord($sql);
    $ztname = $result['ztname'];
    $aids = explode(',',$result['aids']);
    $t = $result['pubdate'];
    $tpl->assign('ztdesp',$result['desp']);

    //读取头部-头部宏标记
    $sql = "select normbody from mytag where id=60";
    $result = getOneRecord($sql);
    $tpl->assign("265G_iphone",$result['normbody']);

    $sql = "select normbody from mytag where id=61";
    $result = getOneRecord($sql);
    $tpl->assign("yijianyueyu",$result['normbody']);

    $sql = "select normbody from mytag where id=62";
    $result = getOneRecord($sql);
    $tpl->assign("menutype",$result['normbody']);

    $num = 1;
    //计算导航
    foreach($aids as $aid){
        $sql = "select title from article where id=$aid";
        $result = getOneRecord($sql);
        $result['url'] = '/zt/'.$t;
        $result['squ'] = $num;
        if($num <= floor( (  count($aids)+1  ) / 2  ) ){
            $upperNavListLeft[] = $result;
        }else{
            $upperNavListRight[] = $result;
        }
        $num++;
    }


    //生成
    $flag = 1;
    foreach($aids as $aid){
        $sql = "select a.id,a.title,a.pubdate,a.description,b.body,c.typedir,c.id as cid from article a,articlebody b,arctype c where a.typeid = c.id and a.id = b.aid and a.id = $aid";
        $articleinfo = getOneRecord($sql);
        $cid = $articleinfo['cid'];
        //以专题模板来生成文章(问题是 文章页有2个模板 到底用哪个模板?)
        //采用游戏模板

        //读取下载必看宏标记
        $sql = "select normbody from mytag where id = 64";
        $query = getonerecord($sql);
        $tpl->assign("downbikan",$query['normbody']);

        //读取游戏
        $sql = "select a.id,a.title,a.pubdate,b.typedir from article a ,arctype b  where a.typeid = b.id and b.id = $cid and a.id <> $aid order by a.pubdate desc limit 0,10";
        $query = $_SGLOBAL['db']->query($sql);
        $_flag = 0 ;
        while ($value = $_SGLOBAL['db']->fetch_array($query))
        {
            $value["url"]=getCommonArcUrl($value['typedir'], $value['id'], $value['pubdate']);
            if($_flag>-1 && $_flag <5){
                $list1[] = $value;
            }else{
                $list2[] = $value;
            }
            $_flag++;
        }
        $tpl->assign('pingcelist1',$list1);
        $tpl->assign('pingcelist2',$list2);
        unset($list1);
        unset($list2);

        $sql="select a.*,b.body,c.typename,c.typedir,c.temparticle,c.keywords as typekeywords from article a,articlebody b,arctype c where a.id=b.aid and a.id=$aid and a.typeid=c.id";
        $articleinfo=getonerecord($sql);
        $tpl->assign("aid",$aid);
        $tpl->assign("litpic",$articleinfo['litpic']);
        $tpl->assign("durl",$articleinfo['durl']);
        $tpl->assign("ver",$articleinfo['ver']);
        $tpl->assign("size",$articleinfo['size']);
        $tpl->assign("xing",$articleinfo['xing']);
        $tpl->assign('site',$articleinfo['site']);
        $tpl->assign("title",$articleinfo["title"]);
        $tpl->assign("typename",$articleinfo["typename"]);
        $tpl->assign("keywords",$articleinfo["keywords"]);
        $tpl->assign("typedir",$articleinfo["typedir"]);
        $tpl->assign("writer",$articleinfo["writer"]);
        $tpl->assign("source",$articleinfo["source"]);
        $tpl->assign("sourcehref",$articleinfo["sourcehref"]);
        $tpl->assign("pubdate",strftime("%Y-%m-%d",$articleinfo["pubdate"]));
        $tpl->assign("postnum",$articleinfo["postnum"]);
        $tpl->assign("xq",getXq($aid));
        $tpl->assign("column",$ztname.' - '.$articleinfo['title'].$articleinfo['ver']);
        $tpl->assign("pagekeywords",$articleinfo['keywords']);
        $tpl->assign("pagedescription",msubstr(strip_tags($articleinfo['body']), 0, 40));
        $tpl->assign("position",'<a href="http://iphone.265g.com" target="_blank" title="265G苹果站">265G苹果站</a>  <a href="/zt/" target="_blank">专题</a>   <a href="javascript:void(0)" title="'.$ztname.'" class="last">'.$ztname.'</a>');
        $tpl->assign("star","/images/iphone/start".$articleinfo['xing'].'.jpg');
        $typedir="zt";
        createDir($typedir);
        $bodyarr=explode('#p#副标题#e#',$articleinfo["body"]);
        $bodycount=count($bodyarr);
        if($bodycount>1){
            echo '单篇文章内容有分页,请重新选择文章!';exit;
        }
        //$tpl->assign("nexturl",'<script>var nexturl="'.getArticleNextUrl($articleinfo["typeid"]).'";</script>');
        $tpl->assign("txwb",'<div id="txWB_W1"></div><script type="text/javascript">var tencent_wb_name = "weibo265G";var tencent_wb_sign = "253c2183178156b504ee5026c60256eda05df47f";var tencent_wb_style = "3";</script><script type="text/javascript" src="http://v.t.qq.com/follow/widget.js" charset="utf-8"/></script>');
        $tpl->assign("xlwb",'<iframe width="63" height="24" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0" scrolling="no" frameborder="No" border="0" src="http://widget.weibo.com/relationship/followbutton.php?width=63&height=24&uid=2455775062&style=1&btn=red&dpc=1"></iframe>');
        $tpl->assign("adminname",'<p align="right">【责任编辑：SORA】</p>');
        $tpl->assign("body",$articleinfo["body"]);
        //游戏,软件
        $tpl->assign("description",msubstr(strip_tags($articleinfo['body']), 0,130)."......");

        //计算分页
        $multi = '<div class="pag2"><a href="/'.$typedir.'/'.$t.'_1.html">首页</a>';
        if($flag == 1){
            $multi .= '<a href="javascript:void(0)">上一页</a>';
        }else{
            $multi .= '<a href="/'.$typedir.'/'.$t.'_'.($flag-1).'.html">上一页</a>';
        }
        for($i=0;$i<count($aids);$i++){
            if(($i+1) == $flag){
                $multi .= '<a href="/'.$typedir.'/'.$t.'_'.($i+1).'.html" class="p_hov">'.($i+1).'</a>';
            }else{
                $multi .= '<a href="/'.$typedir.'/'.$t.'_'.($i+1).'.html" >'.($i+1).'</a>';
            }
        }
        if($i == $flag){
            $multi .= '<a href="javascript:void(0)">下一页</a>';
        }else{
            $multi .= '<a href="/'.$typedir.'/'.$t.'_'.($flag+1).'.html">下一页</a>';
        }
        $multi .= '<a href="/'.$typedir.'/'.$t.'_'.count($aids).'.html">末页</a></div>';

        //设置导航
        $tpl->assign('upperNavListLf',$upperNavListLeft);
        $tpl->assign('upperNavListRt',$upperNavListRight);
        $tpl->assign('multi',$multi);

        $temp = $tpl->fetch('iphone/zt.html');

        creatFile(S_ROOT."/".$typedir."/".$t."_".$flag.".html",$temp);

        $flag++;
    }
    return "/".$typedir."/".$t."_1.html";
}

function makeztlist(){
    global $tpl,$_SGLOBAL;

    $typedir='zt';
    $templist = 'ztlist.html';
    createDir($typedir);

    $tpl->assign("position",'<a href="http://iphone.265g.com" target="_blank" title="265G苹果站">265G苹果站</a>  <a href="javascript:void(0)" title="专题" class="last">专题</a>');

    $tpl->assign("column","专题");
    $tpl->assign("pagekeywords",'iphone专题,iphone4专题,iphone4S专题,iphone游戏专题,iphone软件专题');
    $tpl->assign("pagedescription",'265G iPhone提供iphone各类专题,游戏专题,软件专题,iphone特色专题,精选游戏,精选软件');

    //读取头部-头部宏标记
    $sql = "select normbody from mytag where id=60";
    $result = getOneRecord($sql);
    $tpl->assign("265G_iphone",$result['normbody']);

    $sql = "select normbody from mytag where id=61";
    $result = getOneRecord($sql);
    $tpl->assign("yijianyueyu",$result['normbody']);

    $sql = "select normbody from mytag where id=62";
    $result = getOneRecord($sql);
    $tpl->assign("menutype",$result['normbody']);

    $perpage=10;
    $count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("select count(*) from zt"), 0);
    $start=1;
    if($count)
    {
        $pagecount=$count%$perpage==0?floor($count/$perpage):floor($count/$perpage)+1;
        $sql="select * from zt order by id desc";
        $query = $_SGLOBAL['db']->query($sql);
        while ($value = $_SGLOBAL['db']->fetch_array($query))
        {
            $value["url"]='/zt/'.$value['pubdate'].'_1.html';
            $value["pubdate"]=strftime("%m-%d",$value["pubdate"]);
            if(empty($value['litpic'])){
                $value['litpic'] = '/images/iphone/default.png';
            }
            $list[] = $value;
            if($start%$perpage==0&&$start!=0)
            {
                $tpl->assign("list",$list);
                $page=$start%$perpage==0?floor($start/$perpage):floor($start/$perpage)+1;
                $tpl->assign("multi",htmlmulti($page,$pagecount,"/".$typedir."/ztlist_page.html"));
                $temp = $tpl->fetch("iphone/$templist");
                creatFile($typedir."/list_".$page.".html",$temp);
                unset($list);
            }
            $start++;
        }
        if(!empty($list))
        {
            $tpl->assign("list",$list);
            $tpl->assign("multi",htmlmulti($pagecount,$pagecount,"/".$typedir."/ztlist_page.html"));
            $temp = $tpl->fetch("iphone/$templist");
            creatFile($typedir."/ztlist_".$pagecount.".html",$temp);
        }
        copy(S_ROOT.'/'.$typedir."/ztlist_1.html",S_ROOT.'/'.$typedir."/index.html");
    }
    return '/'.$typedir.'/index.html';
}

/**
 * $time : 添加专题的时间
 * $dir : 专题所在的上级目录名
 */
function getZtUrl($time,$dir){
    return '/'.$dir.'/'.$time.'_1.html';
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


?>