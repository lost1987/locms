/**
 * Created with JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-17
 * Time: 下午1:48
 * To change this template use File | Settings | File Templates.
 * $(".target_element").scrollFix( [ "top" | "bottom" | length(可以为负,表示相对bottom), [ "top" | "bottom" ] ]);

    第一个参数： 可选，默认为"top"，当目标元素到了屏幕相对的位置时开始触发固定，可以填一个数值，如100,-200 ,负值表示相对于屏幕下方

    第一个参数： 可选，默认为"top"，表示触发固定的滚动方向，"top"表示从上向下滚动时触发，"bottom"表示从下向上滚动时触发

     $("#a").scrollFix(-200);
     滚动到距离下面200px时开始固定，默认从上到下触发

     $("#b").scrollFix(200,"bottom");
     滚动到距离上面200px时开始固定，指定"bottom"从下到上触发

     $("#c").scrollFix("top","top");
     滚动到距离上面0时开始固定，指定"top"从上到下触发

     $("#d").scrollFix("bottom","top");
     滚动到距离下面0时开始固定，指定"bottom"从下到上触发
 */
;(function($) {
    jQuery.fn.scrollFix = function(height, dir) {
        height = height || 0;
        height = height == "top" ? 0 : height;
        return this.each(function() {
            if (height == "bottom") {
                height = document.documentElement.clientHeight - this.scrollHeight;
            } else if (height < 0) {
                height = document.documentElement.clientHeight - this.scrollHeight + height;
            }
            var that = $(this),
                oldHeight = false,
                p, r, l = that.offset().left;
            dir = dir == "bottom" ? dir : "top"; //默认滚动方向向下
            if (window.XMLHttpRequest) { //非ie6用fixed


                function getHeight() { //>=0表示上面的滚动高度大于等于目标高度
                    return (document.documentElement.scrollTop || document.body.scrollTop) + height - that.offset().top;
                }
                $(window).scroll(function() {
                    if (oldHeight === false) {
                        if ((getHeight() >= 0 && dir == "top") || (getHeight() <= 0 && dir == "bottom")) {
                            oldHeight = that.offset().top - height;
                            that.css({
                                position: "fixed",
                                top: height,
                                left: l
                            });
                        }
                    } else {
                        if (dir == "top" && (document.documentElement.scrollTop || document.body.scrollTop) < oldHeight) {
                            that.css({
                                position: "static"
                            });
                            oldHeight = false;
                        } else if (dir == "bottom" && (document.documentElement.scrollTop || document.body.scrollTop) > oldHeight) {
                            that.css({
                                position: "static"
                            });
                            oldHeight = false;
                        }
                    }
                });
            } else { //for ie6
                $(window).scroll(function() {
                    if (oldHeight === false) { //恢复前只执行一次，减少reflow
                        if ((getHeight() >= 0 && dir == "top") || (getHeight() <= 0 && dir == "bottom")) {
                            oldHeight = that.offset().top - height;
                            r = document.createElement("span");
                            p = that[0].parentNode;
                            p.replaceChild(r, that[0]);
                            document.body.appendChild(that[0]);
                            that[0].style.position = "absolute";
                        }
                    } else if ((dir == "top" && (document.documentElement.scrollTop || document.body.scrollTop) < oldHeight) || (dir == "bottom" && (document.documentElement.scrollTop || document.body.scrollTop) > oldHeight)) { //结束
                        that[0].style.position = "static";
                        p.replaceChild(that[0], r);
                        r = null;
                        oldHeight = false;
                    } else { //滚动
                        that.css({
                            left: l,
                            top: height + document.documentElement.scrollTop
                        })
                    }
                });
            }
        });
    };
})(jQuery);