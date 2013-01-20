<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-15
 * Time: 下午3:42
 * To change this template use File | Settings | File Templates.
 */
class Cstatics extends Statics
{

       protected  $listlimit = 20;

       function Cstatics($tpl,$db){
           $this -> limit = 20;
           $this -> tpl = $tpl;
           $this -> db = $db;
       }

       public function makeArticle($id){
            $sql = "select a.id,a.title,a.keywords,a.description,a.pubdate,b.body,c.typedir,c.typename from lo_article a , lo_articlebody b,lo_arctype c where a.id = b.aid and a.id = $id and a.typeid = c.id";
            $article = $this -> db -> query($sql) -> row_array();
            $this -> tpl ->assign('a',$article);
            $content = $this -> tpl -> fetch('static/test.html');
            $articledir = self::getArticleDir($article['pubdate']);
            if(!is_dir($articledir))createDir($articledir);
            createfile($articledir.'/'.$id.'.html',$content);
       }

       public function makelist($tid){

           if(empty($tid))return  1;

           //获取栏目的信息
           $sql = "select * from lo_arctype where id = $tid";
           $arctype = $this -> db -> query($sql) ->row_array();
           $typedir = self::getTypeDir($arctype['typedir']);
           if(!is_dir($typedir))createDir($typedir);

           //获取该栏目下所有文章ID 标题
           $sql = "select a.title,a.pubdate,a.id from lo_article a where a.typeid = $tid";
           $articles = $this -> db -> query($sql) -> result_array();

           //获取所有文章的条数
           $article_num = $this -> db -> num_rows();

           //得到列表所需要的参数
           $page_num = floor($article_num/$this->listlimit)+1;
           $current_page = 1;

           //生成1-page_num条
           while($current_page <= $page_num){
                $limit  = $current_page * $this -> listlimit;
                $start  = ($current_page-1)* $this -> listlimit;
                $list = fetch_array($start,$limit,$articles);
                $this -> tpl -> assign('list',$list);
                //或许这里还要加入计算分页的代码 此处demo省略
                $content = $this -> tpl -> fetch('static/list.html');
                createfile($typedir.'/list'.$current_page.'.html',$content);

                if($current_page == 1){
                    createfile($typedir.'/index.html',$content);
                }
                $current_page++;
           }
           return 0;
       }

       public function makeArticlesByTid($tid,$start,$limit){
            $start = $start -1;
            if($limit == 0)return;

           //得到aticle的总条数
           $total = $this -> db -> query("select id from lo_article where typeid = $tid") -> num_rows();
           //从索引开始生成$start-$limit条
           if($start < $total-$limit || $start == 0){
               $ids = $this -> db -> query("select id from lo_article where typeid = $tid limit $start,$limit") -> result_array();
               foreach($ids as $id){
                   $this -> makeArticle($id['id']);
               }
               $start++;
               return intval($start)+intval($limit);
           }else{//如果$start 大于总文章数 那么返回0
               return 0;
           }

           /*   //test
                sleep(2);
                if($start < 80){
                    $start++;
                    return intval($start)+intval($limit);
                }else{
                    return 0;
                }*/
       }
}
