/**
 * Created with JetBrains PhpStorm.
 * User: lost
 * Date: 13-2-21
 * Time: 下午3:27
 * To change this template use File | Settings | File Templates.
 */
var links = [];
var tableLink;
var flag = 0;
var currenttableLink;
var errorlinks = [];
var errorinfo = '';

function getUrls(){
    tableLink = $("#links");
    var url = $("#url").val().replace(/\s+/g,'');
    if($.IsURL(url) == false){
        art.dialog({title:false,content:'请输入合法的URL',time:3000});
        return;
    }
    var charset = $("input:checked[name='charset']").val();
    $.post('/admin.php/crawler/analysis','op=analysis&url='+url+'&charset='+charset,function(data){
        links = eval(data);
        if(typeof links == 'object'){
            doCheck();
        }
    });
}

function doCheck(){
    if(flag < links.length ){
        $.ajax({
            url : "/admin.php/crawler/check",
            data: "link="+links[flag].link,
            dataType:"json",
            type:'POST',
            async:false,
            beforeSend:function(){
                var link = '<tr><td class="flag">'+(flag+1)+'.</td><td class="link_title">'+links[flag].text+'</td><td class="link_url"><a href="'+links[flag]+'" target="_blank"><i>'+links[flag].link+'</i></a></td><td class="res"></td></tr>';
                tableLink.append(link);
                currenttableLink = tableLink.find('tr').eq(flag);
            },
            success:function(data){
                var info = eval(data);
                if(info.error)errorlinks.push(info);
                var msg = '<td class="info_time">耗时:'+info.time+'</td><td class="info_status">'+showstatus(info.error,"状态:"+info.http_status+','+info.http_code)+'</td>';
                currenttableLink.find("td[class='res']").replaceWith(msg);
                setTimeout("doCheck()",1000);
                flag++;
            }
        });
    }else{
            $("#res_btn").fadeIn();
            showresult();
    }
}

function showstatus(error,content){
    var colorContent = '';
    if(!error){
        colorContent = '<b><font color="#057308">'+content+'</font></b>';
    }else{
        colorContent = '<b><font color="#eb1048">'+content+'</font></b>';
    }
    return colorContent;
}

function showresult(){
    errorinfo = '';
    for(var i=0; i<errorlinks.length;i++){
        errorinfo += '<a href="'+errorlinks[i].link+'" target="_blank">'+errorlinks[i].link+'</a>,'+'错误代码:'+errorlinks[i].http_code;
    }

    art.dialog({
        title:'检测到错误',
        id:'result',
        fixed:true,
        content:errorinfo
    })
}


function clearCheck(){
    $("#links").html('');
    links = [];
    tableLink = '';
    flag = 0;
    currenttableLink = '';
    errorlinks = [];
    errorinfo = '';
}