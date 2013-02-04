<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-15
 * Time: 下午3:16
 * To change this template use File | Settings | File Templates.
 * 静态生成类
 */
if( ! defined('BASEPATH')) exit('No direct script access allowed');

abstract class Statics
{

        protected  $tpl;
        protected  $limit;
        protected  $listlimit = 20;//生成列表时 一页20条文章

        abstract function makeArticle($id);
            //for override

        abstract  function makelist($tid);
            //for override

        abstract function makeArticlesByTid($tid,$start,$limit);
            //for override

        static function getTrueArticleUrl($pubdate,$id)
        {
            $arcdir=date('Y-m-d',$pubdate);
            return WEBROOT.'data/'.$arcdir.'/'.$id.'.html';
        }

        static function getTrueTypeUrl($tid,$typedir)
        {
            return WEBROOT.'data/'.$typedir.'/index.html';
        }

        static function getArticleDir($pubdate){
            $dir = BASEPATH.'data/'.date('Ymd',$pubdate);
            return $dir;
        }

        static function getTypeDir($typename){
            $dir = BASEPATH.'data/'.$typename;
            return $dir;
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
}
