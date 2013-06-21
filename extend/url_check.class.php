<?php
	
	class Url_check{
		
		protected $url;
		protected $ch;
		protected $native_charset;
        protected $link;
        protected $text;
        protected $charset;
        protected $url_filter = array(//url中要过滤的内容
            '/[^#]*?#.*/i','/.*javascript.*/i'
        );
        protected $httpcodes = array(
            '0'   => '未知错误',
            '200' => '正常',
            '301' => '跳转',
            '403' => '禁止',
            '404' => '页面未找到',
            '405' => '禁止访问资源',
            '500' => '服务器内部错误',
            '503' => '无法找到服务器'
        );

        /**
         * 分析url 并为抓取url网页上的链接初始化变量
         * @param $url
         */
        function init_anailysis($url='',$charset=''){
			$this -> native_charset = 'UTF-8';
            $this -> charset = $charset;
            $url = $this -> url_anailysis($url);
            $this -> set_url($url);
		}

        function url_anailysis($url){
            if(preg_match('/http:\/\/[^\/]*?\//i',$url))
            $url = substr($url,0,strlen($url));
            return $url;
        }

        /**
         * @param $url 目标网页地址
         *
         */
        function anailysis_links_in_page(){
            $content = file_get_contents($this->url);
            $regexp = '/<a[^>]*?href=\"([^\"]*?)\"[^>]*?>(.*?)<\/a>/i';

            $match_count = preg_match_all($regexp, $content,$out);

            $link = $out[1];//array
            $text = $out[2];//array

            foreach($link as &$url){
                  $url = $this->url_correct($url);
            }

            $this -> link = $link;
            $this -> text = $text;

            $json = array();
            for($i=0;$i<count($link);$i++){
                $_text = !empty($this->charset)&&$this->native_charset!=$this->charset ? iconv($this->charset,$this->native_charset,$text[$i]) : $text[$i];
                if(empty($_text))$_text = '无内容';
                else if(preg_match('/<img[^>]*?>(.*?)/i',$_text))$_text = '图片';
                $json[] = array('link'=>$link[$i],'text'=>$_text);
            }
            return json_encode($json);
        }
		
		
		function set_url($url){
			$this -> url = $url;
		}
		
		

        /**
         * @param $link   测试单个链接的状态
         * @return string json
         */
        function check_http_status($link){
            $this -> ch = curl_init();

            curl_setopt($this->ch, CURLOPT_URL, $link);
            curl_setopt($this->ch, CURLOPT_NOBODY, 1);
            curl_exec($this->ch);
            $info = curl_getinfo($this->ch);
            curl_close($this->ch);

            $time = $info['total_time'];
            $http_code = $info['http_code'];
            $error = FALSE;

            $http_status = '正常';
            if($info['http_code'] != 200 && $info['http_code'] != 301) {
                    $error = TRUE;
                    if(isset($this->httpcodes[$info['http_code']]))
                    $http_status = $this->httpcodes[$info['http_code']];
                    else
                    $http_status = '未知错误';
            }


            return    json_encode(
                            array(
                                'link' => $link,
                                'time' => $time,
                                'http_code' => $http_code,
                                'http_status' => $http_status,
                                'error' => $error
                            )
                        );

        }

		/**
		**修正href属性 如果不是http开头的话
		*/
		function url_correct($link){
            $link = $this -> url_filters($link);
			if(!preg_match('/^http:\/\//i',$link)){
                 if(strpos($link,'/') === 0)
                 return $this->url.$link;
                 else
                 return $this->url.'/'.$link;
            }
            return $link;
		}

        function url_filters($link){

            return preg_replace($this->url_filter,'',$link);
        }

        function get_links(){
            return $this->link;
        }

        function get_text(){
            return $this->text;
        }
	}
	
?>