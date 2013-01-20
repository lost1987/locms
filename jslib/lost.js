/*
 *
 * author buhuan
 *
 * 示例
 * JAVASCRIPT：
 *
 * $("#wy_youxi_list").initSlideEffectLR(
 {
 btn_l:"slidel",
 btn_r:"slider",
 blockWidth:720,
 slide_pages:'slide_pages'
 }
 );

 ---------------------------------------


 HTML：


 * <div class="gameout" id="wy_youxi_list" >
 <ul  style="display:block; float:left">
 <li><a href="http://games.kkguo.com/lj/" target="_blank"><img src="<!@{$smarty.const.WEBROOT}@>images/games/1.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/lj/" target="_blank">将1</a></span></li>
 <li><a href="http://games.kkguo.com/lc/" target="_blank"><img src="<!@{$smarty.const.WEBROOT}@>images/games/2.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/lc/" target="_blank">龙城</a></span></li>
 <li><a href="http://games.kkguo.com/mhfx/" target="_blank"><img src="<!@{$smarty.const.WEBROOT}@>images/games/3.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/mhfx/" target="_blank">梦幻飞仙</a></span></li>
 <li><a href="http://games.kkguo.com/dpcq/" target="_blank"><img src="<!@{$smarty.const.WEBROOT}@>images/games/4.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/dpcq/" target="_blank">斗破苍穹2</a></span></li>
 <li><a href="http://games.kkguo.com/frxz/" target="_blank"><img src="<!@{$smarty.const.WEBROOT}@>images/games/5.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/frxz/" target="_blank">凡人修真2</a></span></li>
 <li><a href="http://games.kkguo.com/mjcs/" target="_blank"><img src="<!@{$smarty.const.WEBROOT}@>images/games/6.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/mjcs/" target="_blank">名将传说</a></span></li>
 <li><a href="http://games.kkguo.com/smxj/" target="_blank"><img src="<!@{$smarty.const.WEBROOT}@>images/games/7.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/smxj/" target="_blank">神魔仙界</a></span></li>
 <li><a href="http://games.kkguo.com/ajzt/" target="_blank"><img src="<!@{$smarty.const.WEBROOT}@>images/games/8.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/aszt/" target="_blank">傲世遮天</a></span></li>
 <li><a href="http://games.kkguo.com/xxhzw/" target="_blank"><img src="<!@{$smarty.const.WEBROOT}@>images/games/9.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/xxhzw/" target="_blank">小小海贼王</a></span></li>
 <li><a href="http://games.kkguo.com/xxhzw/" target="_blank"><img src="<!@{$smarty.const.WEBROOT}@>images/games/9.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/xxhzw/" target="_blank">小小海贼王</a></span></li>
 <li><a href="http://games.kkguo.com/xxhzw/" target="_blank"><img src="<!@{$smarty.const.WEBROOT}@>images/games/9.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/xxhzw/" target="_blank">小小海贼王</a></span></li>
 </ul>

 <ul  style="display:block;float: left">
 <li><a href="http://games.kkguo.com/lj/" target="_blank"><img src="images/games/1.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/lj/" target="_blank">将2</a></span></li>
 <li><a href="http://games.kkguo.com/lc/" target="_blank"><img src="images/games/2.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/lc/" target="_blank">龙城</a></span></li>
 <li><a href="http://games.kkguo.com/mhfx/" target="_blank"><img src="images/games/3.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/mhfx/" target="_blank">梦幻飞仙</a></span></li>
 <li><a href="http://games.kkguo.com/dpcq/" target="_blank"><img src="images/games/4.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/dpcq/" target="_blank">斗破苍穹2</a></span></li>
 <li><a href="http://games.kkguo.com/frxz/" target="_blank"><img src="images/games/5.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/frxz/" target="_blank">凡人修真2</a></span></li>
 <li><a href="http://games.kkguo.com/mjcs/" target="_blank"><img src="images/games/6.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/mjcs/" target="_blank">名将传说</a></span></li>
 <li><a href="http://games.kkguo.com/smxj/" target="_blank"><img src="images/games/7.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/smxj/" target="_blank">神魔仙界</a></span></li>
 <li><a href="http://games.kkguo.com/ajzt/" target="_blank"><img src="images/games/8.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/aszt/" target="_blank">傲世遮天</a></span></li>
 <li><a href="http://games.kkguo.com/ajzt/" target="_blank"><img src="images/games/8.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/aszt/" target="_blank">傲世遮天</a></span></li>

 </ul>

 <ul  style="display:block;float: left">
 <li><a href="http://games.kkguo.com/lj/" target="_blank"><img src="images/games/1.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/lj/" target="_blank">将3</a></span></li>
 <li><a href="http://games.kkguo.com/lc/" target="_blank"><img src="images/games/2.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/lc/" target="_blank">龙城</a></span></li>
 <li><a href="http://games.kkguo.com/mhfx/" target="_blank"><img src="images/games/3.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/mhfx/" target="_blank">梦幻飞仙</a></span></li>
 <li><a href="http://games.kkguo.com/dpcq/" target="_blank"><img src="images/games/4.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/dpcq/" target="_blank">斗破苍穹2</a></span></li>
 <li><a href="http://games.kkguo.com/frxz/" target="_blank"><img src="images/games/5.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/frxz/" target="_blank">凡人修真2</a></span></li>
 <li><a href="http://games.kkguo.com/mjcs/" target="_blank"><img src="images/games/6.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/mjcs/" target="_blank">名将传说</a></span></li>
 <li><a href="http://games.kkguo.com/smxj/" target="_blank"><img src="images/games/7.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/smxj/" target="_blank">神魔仙界</a></span></li>
 <li><a href="http://games.kkguo.com/ajzt/" target="_blank"><img src="images/games/8.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/aszt/" target="_blank">傲世遮天</a></span></li>
 <li><a href="http://games.kkguo.com/ajzt/" target="_blank"><img src="images/games/8.jpg" width="200" height="140" alt=""/></a><span><a href="http://games.kkguo.com/aszt/" target="_blank">傲世遮天</a></span></li>

 </ul>
 </div>
 <div class="gamepage" id="wy_youxi_page">
 <div class="gamepagel" id="slidel"></div>
 <div class="gamepagec fontbai" id="slide_pages"> <a href="javascript:;" class="navorg n1">1</a><a href="javascript:;" class="navorg n1">2</a><a href="javascript:;" class="navorg n1">3</a> </div>
 <div class="gamepager" id="slider"></div>
 </div>
 * */



(function($){

    $.fn.extend({

        initSlideEffectLR:function(options){

            var _this = $(this);

            var _default = {btn_r:'',btn_l:'',blockWidth:0,slide_pages:''};//左移按钮id，右移按钮id，移动元素的父元素ID，分页按钮的父元素ID
            var _options = $.extend({},_default,options);

            //创建并设置父容器 隐藏超出边界的页面
            var mask = $("<div>").attr('id','slide_mask').css('position','relative').css('width',_options.blockWidth+"px").css('overflow','hidden');
            _this.wrap(mask);

            var blocks = _this.children();
            var index = 0;//目前显示的元素索引
            var currentPage = 0;//当前页面为第一页
            var total = blocks.length;

            var current_block = blocks[index];
            var movesteps = 0;//位移量

            function moveRight(step){
                nextindex = index + step;
                movesteps = _options.blockWidth * nextindex * -1;
                if(nextindex<total){
                    _this.animate({left:movesteps+"px"},"slow");
                    setPage(nextindex);
                    index += step;
                    currentPage = index;
                }
            }
            
            function moveLeft(step){
                nextindex = index - step;
                movesteps = _options.blockWidth * nextindex * -1;
                if(nextindex >= 0){
                    _this.animate({left:movesteps+"px"},"slow");
                    setPage(nextindex);
                    index -= step;
                    currentPage = index;
                }
            }

            //处理按钮事件
            $("#"+_options.btn_r).click(function(){
                moveRight(1);
            });

            $("#"+_options.btn_l).click(function(){
                moveLeft(1);
            });

            //处理分页事件
            var pages = $("#"+_options.slide_pages).find("a");
            $(pages).each(function(i){
                $(this).click(function(){
                    if(i != currentPage){
                        step = i-currentPage;
                        if(step > 0)
                            moveRight(step);
                        else
                            moveLeft(Math.abs(step));
                    }
                })
            });
            setPage(0);//初始化分页

            function setPage(p){
                $(pages).each(function(i){
                    if(i == p){
                        $(this).css('color','#FFCC00');
                    }else{
                        $(this).css('color','white');
                    }
                });
            }
        }


    });


    $.extend({


        /**
         *     下啦刷新
         *     $(function(){
                    $.lazyload({
                        element:'main',
                        url:'test.php',
                        type:'POST',
                        dataType:'html',
                        data:'op=next'
                });
                })
         */

        lazyload:function(options){
            var _default = {element:'',url:'',type:'POST',dataType:'html',data:'',wait_img:'images/loading.gif'};
            var _options = $.extend({},_default,options);

            register();

            function load(){
                    destroy();//注销滚动条事件
                    var tip = create_wait_tip();//创建wait提示
                    $("#"+_options.element).after(tip);//放入wait提示
                    //开始执行ajax请求
                    $.ajax({
                       url:_options.url,
                       type:_options.type,
                       dataType:_options.dataType,
                       data:_options.data,
                       success:function(data){
                            $("#wait_tip").remove();
                            //获取指定div的最后一个子元素
                            var _lastPoint = $("#"+_options.element).children().last();
                            $(_lastPoint).after(data);
                            register();
                       }
                    });
                    return;
            }

            function register(){//初始化 给浏览器绑定滚动事件
                if(window.attachEvent){//IE
                    window.attachEvent("onscroll",scroll,false);
                }else{//FF
                    window.addEventListener("scroll",scroll,false);
                }
            }

            function scroll(){//滚动条 开始滚动 并计算是否到达底部
                //判断滚动条滚到了网页最底部
                var a = document.documentElement.scrollTop==0? document.body.clientHeight : document.documentElement.clientHeight;
                var b = document.documentElement.scrollTop==0? document.body.scrollTop : document.documentElement.scrollTop;
                var c = document.documentElement.scrollTop==0? document.body.scrollHeight : document.documentElement.scrollHeight;

                if(a+b == c){
                    load();//开始加载
                }
            }

            function destroy(){//注销onscroll事件 防止加载数据的时候继续加载
                if(window.attachEvent){//ff
                    window.detachEvent("onscroll",scroll,false);
                }else{//ie
                    window.removeEventListener("scroll",scroll,false);
                }
            }

            function create_wait_tip(){
                return '<div id="wait_tip" style="width:100%"><center><img src="'+_options.wait_img+'" /></center></div>';
            }

        }
    });

})(jQuery);