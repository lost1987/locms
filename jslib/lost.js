/**
 * Created with JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-28
 * Time: 下午2:18
 * To change this template use File | Settings | File Templates.
 */


(function($){

    $.fn.extend({

        /** 图片左右滑动
         $("#wy_youxi_list").initSlideEffectLR(
         {
         btn_l:"slidel",
         btn_r:"slider",
         blockWidth:720,
         slide_pages:'slide_pages'
         }
         );
         */

        initSlideEffectLR:function(options){

            var _this = $(this);

            var _default = {btn_r:'',btn_l:'',blockWidth:0,slide_pages:''};//左移按钮id，右移按钮id，移动元素的父元素ID，分页按钮的父元素ID
            var _options = $.extend({},_default,options);

            //创建并设置父容器 隐藏超出边界的页面
            var mask = $("<div>").attr('id','slide_mask').css('width',_options.blockWidth+"px").css('overflow','hidden');
            _this.wrap(mask);

            var blocks = _this.children();
            var index = 0;//目前显示的元素索引
            var currentPage = 0;//当前页面为第一页

            var current_block = blocks[index];
            var movesteps = 0;//位移量

            function moveRight(step){
                nextindex = index + step;
                movesteps = _options.blockWidth * nextindex * -1;
                if(nextindex<3){
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
            var pages = $("#slide_pages").find("a");
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

        ,


        /**
         **图片等比缩放
         */
        image_uniform_scale:function(options){
            var _default = {percent:50,limit_width:200,limit_height:300};
            var _options = $.extend({},_default,options);

            return $(this).each(function(){

                var _this = $(this) ;

                if(parseInt(_options.percent) < 100){
                    _options.percent = _options.percent/100;
                }

                var images = _this.find("img");

                images.each(function(i){
                    //获取图片的宽和高
                    var _width = this.width;
                    var _height = this.height;
                    var limit_width = _options.limit_width;
                    var limit_height = _options.limit_height;
                    var new_width = 0;
                    var new_height = 0;
                    if( _width/_height >= limit_width/limit_height ){//以宽度为基准缩放

                        if( _width > limit_width){//开始缩放
                            new_width = limit_width;
                            new_height = (_height * limit_height)/_height;
                        }else{//当宽度小于限定宽度，直接返回原始数值。
                            new_width = _width;
                            new_height = _height;
                        }

                    }
                    else{//以高度为基准缩放
                        if( _height > limit_height ){//开始缩放
                            new_width = ( _width * limit_width )/_width;
                            new_height = limit_height;
                        }else{//当高度小于限定高度，直接返回原始数值。
                            new_width = _width;
                            new_height = _height;
                        }
                    }

                    this.width = new_width;
                    this.height = new_height;

                });
            });

        },

        /**
         *
         * 瀑布流方式
         */
        waterfall:function(options){
            /**
             **column:每行的元素个数
             width:图片的宽度
             space:每行元素之间的间隔
             borderStyle:边框样式  json格式
             loadParam 请求lazyload方法参数
             resizelimit 最小列数
             divheight 结构里图片下方的div标签的高度需要给定
             clickEvent 想实现单个图片的click事件

             <span><img src="images/1.jpg" /><div>this is a test</div></span>
             */
            _default = {width:200,space:20,borderStyle:{},loadParam:{},resizelimit:3,divheight:30,clickEvent:null};
            _options = $.extend({},_default,options);

            var _this = $(this);

            var contain_top = _this.offset().top;//获取装载img的容器的left,top作为基准点
            var contain_left = _this.offset().left;

            //计算当前窗口能放入多少个格子
            _options.column = Math.floor(($(window).width()-contain_left-200)/_options.width);

            //计算所有照片有多少行
            //var _row = Math.ceil(nodes.length/4);

            _options.contain_top = contain_top;
            _options.contain_left = contain_left;
            _options.container = _this;
            _options.nodes = [];//总数组
            _options.currentlastindex = 0;
            _options.isResize = 0;
            _options.limit = _options.loadParam.limit;

            //初始化jquery对象的option供全局调用
            $._waterfall_options = _options;
            $.lazyload(_options.loadParam);

            //注册resize事件
            $(window).resize(function(){
                clearTimeout($._waterfall_options.isResize);
                $._waterfall_options.isResize = setTimeout("$._waterfall_resize("+")",100);
            });

        }
    });


    $.extend({

        _waterfall_options : {},

        _waterfall_event_bind:function(type,nodes){
            switch(type){
                case 'click' :
                    if(typeof eval($._waterfall_options.clickEvent) != 'function')return;
                    $(nodes).click($._waterfall_options.clickEvent);
                    break;
            }
        }
        ,
        _waterfall_resize:function(){
            this._waterfall_options.currentlastindex = 0;//要重排所有已经存在的元素 所以 最后load的索引清零 从数组下标0开始加载元素
            var oldColumn = this._waterfall_options.column;
            this._waterfall_options.column = Math.floor(($(window).width()- this._waterfall_options.contain_left-100)/ this._waterfall_options.width);
            if(oldColumn != this._waterfall_options.column && this._waterfall_options.column >= this._waterfall_options.resizelimit){//如果列发生变化 则重新排列
                $._waterfall_options.container.empty();
                $._create_wait_tip();
                var nodes = this._waterfall_options.nodes;
                var newNodes = [];
                //将图片放置到可视距离之外
                $(nodes).each(function(i){
                    $(nodes[i]).css('position','absolute').css('top',-2000).css('left',-1000);
                });
                $._waterfall_options.container.append(nodes);

                var _heights = [];
                $(nodes).find('img').each(function(i){
                    //设置所有图片的宽度
                    $(this).css('width',$._waterfall_options.width);
                    //获取所有图片的高度
                    _heights.push($(this).css('height'));
                    $(nodes[i]).css('display','none');
                });

                $(nodes).each(function(i){
                    this.childNodes[0].style.cssText = '';
                    $(this).find('img').css('width',$._waterfall_options.width);
                    $(this).find('div').css('position','relative').css('height', $._waterfall_options.divheight+'px').css('overflow','hidden').css('width',$._waterfall_options.width);
                    //设置边框样式
                    $(this).css($._waterfall_options.borderStyle);
                    //此时所有已经渲染的图片在_waterfall_load方法中都已经load完成 所以不会触发load事件 所以不需要判断load事件
                    var _top = $._setTop(nodes,this,i,$._waterfall_options.contain_top,_heights);
                    var _left = $._setLeft(nodes,this,i,$._waterfall_options.contain_left);
                    //设置定位
                    $(this).css({'position':'absolute','left':_left,'top':_top,'width':$(this).find('img').css('width')});
                    $(this).fadeIn();
                    //设置node的高度和图片等高
                    $(this).css('height',$(this).find('img').height() + $._waterfall_options.divheight);
                    newNodes.push(nodes[i]);//每个node的图片参数left,top都会变化 所以要记录返回新的nodes给全局参数
                });
                this._waterfall_options.nodes = newNodes;
                $._waterfall_event_bind('click',newNodes);
                this._waterfall_options.currentlastindex = nodes.length;//把总数组的长度增加
            }
        },

        _waterfall_load:function(){
            var nodes = this._waterfall_options.nodes;
            var currentlastindex = this._waterfall_options.currentlastindex;
            //将图片放置到可视距离之外
            $(nodes).each(function(i){
                if(i >= currentlastindex){
                    $(nodes[i]).css('position','absolute').css('top',-2000).css('left',-1000);
                }
            });
            this._waterfall_options.container.append(nodes);

            //一次请求加载的图片个数
            var quatityOfReq = this._waterfall_options.limit;
            var quatityOfloadComplete = 0;
            //判断所有图片是否加载完成
            this._waterfall_options.container.find('img').load(function(){
                quatityOfloadComplete++;
                if(quatityOfloadComplete == quatityOfReq){//当加载完成最后一张图片时 触发排序
                    var _heights = [];
                    $(nodes).find('img').each(function(i){
                        //设置所有图片的宽度
                        $(this).css('width',$._waterfall_options.width);
                        //获取所有图片的高度
                        _heights.push($(this).css('height'));
                        if(i >= currentlastindex){
                            $(nodes[i]).css('display','none');
                        }
                    });

                    //开始计算单独照片的定位
                    $(nodes).each(function(i){
                        if(i >= currentlastindex){
                            this.childNodes[0].style.cssText = '';
                            $(this).find('img').css('width',$._waterfall_options.width);
                            $(this).find('div').css('position','relative').css('height', $._waterfall_options.divheight+'px').css('overflow','hidden').css('width',$._waterfall_options.width);
                            //设置边框样式
                            $(this).css($._waterfall_options.borderStyle);
                            var _top = $._setTop(nodes,this,i,$._waterfall_options.contain_top,_heights);
                            var _left = $._setLeft(nodes,this,i,$._waterfall_options.contain_left);

                            //设置定位
                            $(this).css({'left':_left,'top':_top,'width':$(this).find('img').css('width')});
                            $(this).fadeIn();

                            //设置node的高度和图片等高
                            $(this).css('height',$(this).find('img').height() + $._waterfall_options.divheight);
                        }
                    });
                }
            });

            this._waterfall_options.currentlastindex = nodes.length;//把总数组的长度增加
        }
        ,
        _setTop : function (nodes,node,index,contain_top,_heights){
            var new_top = contain_top;
            switch(index){
                case 0:;break;
                default:
                    var row = this._getRow(this._waterfall_options.column,index);//得到该元素在第几行
                    if(row > 1){
                        //计算上一行处于相同列索引的图片序号
                        //var offset = Math.abs(index - this._waterfall_options.column);
                        //上一行图片的top+上一行图片的高度
                        //new_top += $(nodes).eq(offset).find('img').offset().top + parseInt(_heights[offset]);
                        new_top += $._get_prev_top(index,_heights);
                    }
            }
            return new_top;
        }
        ,
        _setLeft : function (nodes,node,index,contain_left){
            var new_left = contain_left;
            switch(index){
                case 0:;break;
                default:
                    var column_index = this._columnIndexInRow(index);//得到该行的列索引

                    if(this._isRowFirst(index)){
                        new_left +=  (column_index-1) * this._waterfall_options.width;
                    }else{
                        new_left +=  (column_index-1) * (this._waterfall_options.width + this._waterfall_options.space);
                    }
            }
            return new_left;
        }
        ,
        _getRow : function (column,index){
            var row = 	Math.ceil((index+1)/column);
            return row;
        }
        ,
        _columnIndexInRow : function (index){
            var _options = this._waterfall_options;
            var index = (index+1)%_options.column;
            if(index == 0) return _options.column;
            return index;
        }
        ,
        _isRowFirst : function (index){//判断是不是该行的第一个元素
            var index = this._columnIndexInRow(index);
            if(index == 1)return true;
            return false;
        }
        ,

        _waterfall_callback:function(data){
            $("#wait_tip").remove();

            if($._lazyloadParam.waterfall && data!=''){
                //将html字符串转换为jquery对象
                var nodes = $._stringToObject(data);
                for(var i = 0;i<nodes.length;i++){
                    $._waterfall_options.nodes.push(nodes[i]);
                }
                $._waterfall_event_bind('click',nodes);
                $._waterfall_load();
                $._lazyloadParam.start += $._lazyloadParam.limit;//下次请求的起始图片索引
            }
            $._lazyloadParam.start = $._lazyloadParam.start+$._lazyloadParam.limit;
            $._lazy_register();
        },

        _all_pre_index_in_row:function(index){//获取该行之前所有该列的索引
            var row = this._getRow(this._waterfall_options.column,index);
            var indexes = [];
            index += 1;
            var flag = 1;
            while(flag < row){
                var currentIndex = index - flag * this._waterfall_options.column;
                indexes.push(currentIndex);
                flag++;
            }
            return indexes;
        },

        _get_prev_top:function(index,_heights){//得到该行的top
            var indexes = this._all_pre_index_in_row(index);
            var space = indexes.length * this._waterfall_options.space
            var div = indexes.length * this._waterfall_options.divheight;
            var top = 0;
            for(var i=0 ;i < indexes.length;i++){
                top += parseInt(_heights[ indexes[i]-1 ]);
            }
            //当元素为第一行时 是不需要加上space间隔的
            if((index+1)>this._waterfall_options.column){
                top += space + div;
            }
            return top;
        },

        /**
         *     下啦刷新
         *     $(function(){
                    $.lazyload({
                        element:'#main',//需要吧等待提示添加到的父容器节点
                        url:'test.php',
                        type:'POST',
                        dataType:'html',
                        data:'op=next',
                        waterfall:false,
                        start:6,
                        limit:6,
                        callback:null//如果不是瀑布流 请实现回调函数
                });
                })
         使用瀑布流img标签外必须包裹span或者li
         */
        _lazyloadParam:{},

        lazyload:function(options){
            var _default = {element:'',url:'',type:'POST',dataType:'html',data:'',wait_img:'images/loading.gif',start:0,limit:15,waterfall:false,callback:null};
            var _options = $.extend({},_default,options);
            this._lazyloadParam = _options;
            this._lazy_register();
            this._lazy_load();
        },


        _lazy_load: function (){
            this._lazy_destroy();//注销滚动条事件
            var tip = this._create_wait_tip();//创建wait提示
            $(this._lazyloadParam.element).after(tip);//放入wait提示
            var data = this._lazyloadParam.data + '&start='+this._lazyloadParam.start+'&limit='+this._lazyloadParam.limit;

            //开始执行ajax请求
            $.ajax({
                url:$._lazyloadParam.url,
                type:$._lazyloadParam.type,
                dataType:$._lazyloadParam.dataType,
                data:data,
                success:function(data){
                    if(typeof eval($._lazyloadParam.callback) == 'function'){
                        eval($._lazyloadParam.callback+'()');
                    }else{
                        if($._lazyloadParam.waterfall)
                        $._waterfall_callback(data);
                        else
                        alert('error!');
                    }
                }
            });
        }


        ,


        _lazy_register: function (){//初始化 给浏览器绑定滚动事件
            if(window.attachEvent){//IE
                window.attachEvent("onscroll",this._lazy_scroll,false);
            }else{//FF
                window.addEventListener("scroll",this._lazy_scroll,false);
            }
        }

        ,


        _lazy_scroll: function (){//滚动条 开始滚动 并计算是否到达底部
            //判断滚动条滚到了网页最底部
            var a = document.documentElement.scrollTop==0? document.body.clientHeight : document.documentElement.clientHeight;
            var b = document.documentElement.scrollTop==0? document.body.scrollTop : document.documentElement.scrollTop;
            var c = document.documentElement.scrollTop==0? document.body.scrollHeight : document.documentElement.scrollHeight;


            if(a+b == c && a!=0){
                $._lazy_load();//开始加载
            }
        }

        ,


        _lazy_destroy:function (){//注销onscroll事件 防止加载数据的时候继续加载
            if(window.attachEvent){//ff
                window.detachEvent("onscroll",this._lazy_scroll,false);
            }else{//ie
                window.removeEventListener("scroll",this._lazy_scroll,false);
            }
        }

        ,

        _create_wait_tip:function (){
            var top = $(window).height() - 35;//浏览器窗口的高度(可视区域)
            return '<div id="wait_tip" style="border:1px #f5f5f5 solid;background-color:white;width:300px;left:50%;margin-left:-150px;line-height:35px;height:35px;position:fixed;z-index:10;text-align:center;vertical-align:middle;top:'+top+'px;font-size:12px"><b style="vertical-align: middle">正在加载...</b><img style="vertical-align: middle" src="'+this._lazyloadParam.wait_img+'" /></div>';
        }


        ,

        //将字符串html代码转换为jquery对象
        _stringToObject:function(string){
            var div = $("<div>").append(string);
            return $(div).children();
        }
        ,

        //comet
        comet:function(options){
            var _default = {url:"",type:"POST",dataType:"html",data:"",timeout:"60000",success:null};
            var _options = $.extend({},_default,options);
            _options.timeout = _options.timeout * 1000;//吧秒换算成毫秒

            if(_options.url == '')return;

            sendComet();

            function sendComet(){
                $.ajax({
                    url: _options.url,
                    type: _options.type,
                    dataType:_options.dataType,
                    data:_options.data+'&timeout='+_options.timeout,
                    timeout:_options.timeout,
                    success:function(data,status,xhr){
                            if(data != ''){
                                _options.success(data);
                            }
                    },
                    complete:function(xhr,status){
                            sendComet();
                    }
                });
            }
        }

    });


//tools
    $.extend({

        util:{
            /**
             * 表单验证类,使用示例:
             $.util.validate({
                         formid:"staff_form", //表单的ID
                         submit_btn_id:"main-submit",//表单提交按钮的ID
                         fields:[
                             fid:input字段的ID tip:提示 callback 自定义验证
                             {
                                 fid:"age",
                                 is_required:true,
                                 max_length:2,
                                 min_length:1,
                                 is_numberic:true,
                                 tip:"",
                                 max_value:80,
                                 min_value:20,
                                 is_idcard:false,
                                 is_phone:false,
                                 is_email:false,
                                 callback:function(field_obj){//field_obj 表示当前的表单字段对象
                                        alert(field_obj.value);
                                        return false;
                                 }
                             }
                         ],
                         success:function(){
                             alert('success');//如果不设置回调,验证成功后会自动提交
                         },
                         failed:function(){
                             alert('failed');
                         }
                     });
             */
            validate:function(options){
                _this = this;
                var _default = {
                    formid:"",
                    submit_btn_id:"",
                    fields:[
                        {fid:'',is_required:null,max_length:null,min_length:null,is_numberic:null,tip:null,max_value:null,min_value:null,is_idcard:null,is_phone:null,is_email:null,callback:null}
                    ],
                    success:null,
                    failed:null
                };
                var _options = $.extend({},_default,options);
                var _form,_submit_btn,_fields,_fields_num,_correct_fields_num;

                if(_options.formid == null || _options.formid == '' || _options.submit_btn_id == null || _options.submit_btn_id == '')return;
                if($.isEmptyObject($("#"+_options.formid))){
                    alert('请确认表单ID是否存在,本插件仅支持ID节点');
                    return;
                }
                if($.isEmptyObject($("#"+_options.submit_btn_id))){
                    alert('请确认提交按钮ID是否存在,本插件仅支持ID节点');
                }

                _form = $("#"+_options.formid);//表单对象

                _fields = _options.fields;
                _fields_num = _fields.length;

                //绑定事件
                _form.find('input').bind('blur keyup',function(){
                    _correct_fields_num = 0;
                    $(_fields).each(function(){
                        _field = $("#"+this.fid);
                        _field_value = _field.val();
                        _field_color = _field.css('border-color');
                        _field_tip = document.getElementById($(_field).attr("id")+"_tip");
                        _field_tip_remove = true;

                        if(!_this.is_empty(this.is_required) && _this.is_empty(_field_value) == this.is_required){
                            _field.css('border-color','red');
                            if($.isEmptyObject(_field_tip))
                                _this.error_tip(this.tip,_field);
                            _field_tip_remove = false;
                            return true;
                        }

                        if(!_this.is_empty(_field_value) && !_this.is_empty(this.max_length) && !_this.max_length(_field_value,this.max_length)){
                            _field.css('border-color','red');
                            if($.isEmptyObject(_field_tip))
                                _this.error_tip(this.tip,_field);
                            _field_tip_remove = false;
                            return true;
                        }

                        if(!_this.is_empty(_field_value) && !_this.is_empty(this.min_length) && !_this.min_length(_field_value,this.min_length) ){
                            _field.css('border-color','red');
                            if($.isEmptyObject(_field_tip))
                                _this.error_tip(this.tip,_field);
                            _field_tip_remove = false;
                            return true;
                        }

                        if(!_this.is_empty(_field_value) && !_this.is_empty(this.is_numberic) && _this.is_numberic(_field_value) != this.is_numberic){
                            _field.css('border-color','red');
                            if($.isEmptyObject(_field_tip))
                                _this.error_tip(this.tip,_field);
                            _field_tip_remove = false;
                            return true;
                        }

                        if(!_this.is_empty(_field_value) && !_this.is_empty(this.max_value) && !_this.max_value(_field_value,this.max_value)){
                            _field.css('border-color','red');
                            if($.isEmptyObject(_field_tip))
                                _this.error_tip(this.tip,_field);
                            _field_tip_remove = false;
                            return true;
                        }

                        if(!_this.is_empty(_field_value) && !_this.is_empty(this.min_value) && !_this.min_value(_field_value,this.min_value)){
                            _field.css('border-color','red');
                            if($.isEmptyObject(_field_tip))
                                _this.error_tip(this.tip,_field);
                            _field_tip_remove = false;
                            return true;
                        }

                        if(!_this.is_empty(_field_value) && !_this.is_empty(this.is_phone) && _this.is_phone(_field_value) != this.is_phone){
                            _field.css('border-color','red');
                            if($.isEmptyObject(_field_tip))
                                _this.error_tip(this.tip,_field);
                            _field_tip_remove = false;
                            return true;
                        }

                        if(!_this.is_empty(_field_value) && !_this.is_empty(this.is_email) && _this.is_email(_field_value) != this.is_email){
                            _field.css('border-color','red');
                            if($.isEmptyObject(_field_tip))
                                _this.error_tip(this.tip,_field);
                            _field_tip_remove = false;
                            return true;
                        }

                        if(!_this.is_empty(_field_value) && !_this.is_empty(this.is_idcard) && _this.is_idcard(_field_value) != this.is_idcard){
                            _field.css('border-color','red');
                            if($.isEmptyObject(_field_tip))
                                _this.error_tip(this.tip,_field);
                            _field_tip_remove = false;
                            return true;
                        }

                        if(!_this.is_empty(_field_value) && !_this.is_empty(this.callback) && !this.callback.apply(null,_field)){
                            _field.css('border-color','red');
                            if($.isEmptyObject(_field_tip))
                                _this.error_tip(this.tip,_field);
                            _field_tip_remove = false;
                            return true;
                        }

                        if(_field_tip_remove){
                            if(!$.isEmptyObject(_field_tip))
                                $(_field_tip).remove();
                        }

                        _correct_fields_num++;
                        _field.css('border-color',_field_color);
                    });
                });

                var _submit_btn = $("#"+_options.submit_btn_id);//提交按钮对象
                _submit_btn.attr('type','button');
                _submit_btn.on('click',function(){
                    if(_correct_fields_num == _fields_num){
                        if(_options.success != null){
                            _options.success.apply(null);
                        }else{
                            _form.submit();
                        }
                    }else{
                        if(_options.failed != null){
                            _options.failed.apply(null);
                        }
                    }
                });
            },

            is_numberic:function(param){
                if(/\d+/g.test(param))
                    return true;
                return false;
            },

            max_length:function(param,length){
                if(param.length <= length)
                    return true;
                return false;
            },

            min_length:function(param,length){
                if(param.length >= length)
                    return true;
                return false;
            },

            max_value:function(param,maxvalue){
                if(parseInt(param) <= parseInt(maxvalue))
                    return true;
                return false;
            },

            min_value:function(param,minvalue){
                if(parseInt(param) >= parseInt(minvalue))
                    return true;
                return false;
            },


            is_email:function(param){
                var emailReg = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
                if ( emailReg.test(param) )
                    return true;
                return false;
            },

            is_phone:function(param){
                var pattern=/(^[0-9]{3,4}\-[0-9]{3,8}$)|(^[0-9]{3,8}$)|(^\([0-9]{3,4}\)[0-9]{3,8}$)|(^0{0,1}13[0-9]{9}$)/;
                if(pattern.test(param))
                    return true;
                return false;
            },

            is_idcard:function(param){
                if( !(/^\d{15}$/.test(param)|| /^\d{18}$/.test(param)|| /^\d{17}[xX]$/.test(param)) )
                    return false;
                return true;
            },

            is_empty:function(param){
                if(param == null || param == '')
                    return true;
                return false;
            },

            IsURL : function(str_url){
                var strRegex = "^((https|http|ftp|rtsp|mms)?://)"
                    + "?(([0-9a-z_!~*'().&=+$%-]+: )?[0-9a-z_!~*'().&=+$%-]+@)?" //ftp的user@
                    + "(([0-9]{1,3}\.){3}[0-9]{1,3}" // IP形式的URL- 199.194.52.184
                    + "|" // 允许IP和DOMAIN（域名）
                    + "([0-9a-z_!~*'()-]+\.)*" // 域名- www.
                    + "([0-9a-z][0-9a-z-]{0,61})?[0-9a-z]\." // 二级域名
                    + "[a-z]{2,6})" // first level domain- .com or .museum
                    + "(:[0-9]{1,4})?" // 端口- :80
                    + "((/?)|" // a slash isn't required if there is no file name
                    + "(/[0-9a-z_!~*'().;?:@&=+$,%#-]+)+/?)$";
                var re=new RegExp(strRegex);
                //re.test()
                if (re.test(str_url)){
                    return (true);
                }else{
                    return (false);
                }
            },

            error_tip:function(message,node){
                if(this.is_empty(message))return;
                if(document.getElementById($(node).attr("id")+"_tip") != null)return;

                var window_main = $("<div>").attr('id',$(node).attr('id')+"_tip");
                window_main.css("position","absolute").css("z-index",0.9).css('background-color','white').css("display","none");

                var window_content = $("<div>");
                window_content.css("width","auto").css("height","auto").css('background-color','#CD3278')
                    .css("text-align","center").css("color","white").css("border","1px solid black").css("padding-left",5).css("padding-right",5)
                    .css("border-color","transparent");
                window_content.html(message);

                $("body").append(window_main);
                window_main.append(window_content);

                var left = $(node).offset().left;
                var top = $(node).offset().top + $(node).height() + 4;

                window_main.css("left",left).css("top",top);
                window_main.fadeIn(200);
            },

            date:{
                /**
                 * @param date String : 格式必须是 YYYY-MM-DD HH:NN:SS
                 * @return int
                 * **/
                dateToTime:function(date){
                    var time_array = [],date_array = [];
                    var _date = date.split(' ');
                    var date_prefix = _date[0];
                    if(_date.length > 1){
                        var date_ext = _date[1];
                        date_array = date_prefix.split('-');
                        time_array = date_ext.split(':');
                        return new Date(date_array[0],date_array[1]-1,date_array[2],time_array[0],time_array[1],time_array[2]).getTime();
                    }else{
                        date_array = date_prefix.split('-');
                        return new Date(date_array[0],date_array[1]-1,date_array[2]).getTime();
                    }
                },

                /**
                 * 得到2个时间戳之间的年限差
                 * @param time_small 起始时间
                 * @param time_big 结束时间
                 * @return int
                 */
                timediff_year:function(time_small,time_big){
                    var timediff = time_big - time_small;
                    var yearTime = 60 * 60 * 24 * 365 * 1000;
                    return Math.floor(timediff/yearTime);
                }
            },

            effect:{
                //当滚动条滚动时div到达浏览器顶部的时候 漂浮起来
                floatTop:function(options){
                    var _default = {element:""};
                    var _options = $.extend({},_default,options);
                    var _this = $(_options.element);
                    var _origin_width = _this.width();
                    var _origin_height = _this.height();
                    var _origin_position = _this.css('position');
                    var _origin_top = _this.offset().top;
                    var _origin_left = _this.offset().left;

                    var scrollChange=false;
                    var blank_div=$("<div>").attr('id','floatTop_blank');
                    $(window).bind("scroll",function(){
                        if($(window).scrollTop() > _origin_top){
                            //插入空div
                            blank_div.css('position',_origin_position)
                                .css('width',_origin_width)
                                .css('height',_origin_height);

                            if(scrollChange == false){
                                _this.before(blank_div);
                                scrollChange = true;
                            }

                            //脱离文档流
                            _this.css('position','fixed')
                                .css('top',0)
                                .css('left',_origin_left)
                                .css('width',_origin_width)
                                .css('height',_origin_height)
                                .css('z-index',1000);

                        }else{
                            if(scrollChange == true){
                                $(blank_div).remove();
                                _this.css('position',_origin_position)
                                    .css('width',_origin_width)
                                    .css('height',_origin_height)
                                    .css('z-index',0);
                                scrollChange = false;
                            }
                        }
                    });
                }
            }
        }
    });

})(jQuery);