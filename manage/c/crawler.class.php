<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-2-21
 * Time: 下午4:25
 * To change this template use File | Settings | File Templates.
 */
class Crawler extends Core
{

    function Crawler(){
        $this -> uc = new Url_check();
    }

    function index(){
        $this -> tpl -> display('crawler.html');
    }


    function analysis(){
        $url = $this -> input -> post('url');
        $charset = $this -> input -> post('charset');
        $this -> uc -> init_anailysis($url,$charset);
        $json = $this -> uc -> anailysis_links_in_page();
        die($json);

    }

    function check(){
        $link = $this -> input -> post('link');
        $json = $this -> uc -> check_http_status($link);
        die($json);

    }


}
