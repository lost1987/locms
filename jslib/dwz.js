/**
 * dwz提示信息
 * use：  <script src="<!@{$smarty.const.WEBROOT}@>jslib/dwz.js" ></script>
 *        <script>
 *        custom_mytip('this is a test!');
 *        </script>
 * @param message
 */
function custom_mytip(message,time){
    var msg = '<div id="ctip"><div id="splitBar"></div><div id="splitBarProxy"></div><div class="resizable"></div><div class="shadow" style="width:508px; top:148px; left:296px;"><div class="shadow_h"><div class="shadow_h_l"></div><div class="shadow_h_r"></div><div class="shadow_h_c"></div></div><div class="shadow_c"><div class="shadow_c_l" style="height:296px;"></div><div class="shadow_c_r" style="height:296px;"></div><div class="shadow_c_c" style="height:296px;"></div></div><div class="shadow_f"><div class="shadow_f_l"></div><div class="shadow_f_r"></div><div class="shadow_f_c"></div></div></div><div id="alertBackground" class="alertBackground"></div><div id="dialogBackground" class="dialogBackground"></div><div id="background" class="background"></div><div id="progressBar" style="width:auto" class="progressBar">'+message+'</div></div>';
    $('body').append(msg);
    if(time > 0){
        setTimeout('custom_mytip_close()',time);
    }
}

function custom_mytip_close(){
    $("#ctip").remove();
}
