<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-5
 * Time: 下午10:50
 * To change this template use File | Settings | File Templates.
 * 存放供页面调用的smarty 函数
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

$tpl->registerPlugin('function','Smarty_site_url','smarty_site_url');
$tpl->registerPlugin('function','Smarty_cookie_decode','smarty_cookie_decode');
$tpl->registerPlugin('function','Smarty_field','smarty_field');//autoform edit.html里模板中需要使用的判断字段类型 决定input还是combox等.
$tpl->registerPlugin('function','Smarty_search_field','smarty_search_field');

function smarty_site_url($params){
    global $entrance;
    if(empty($params['action_method'])){
        echo WEBROOT;
    }else{
        echo WEBROOT.$entrance.'/'.$params['action_method'];
    }
}

function smarty_cookie_decode($params){
    global $f;
    $key = $params['key'];
    echo $f -> cookie -> userdata($key);
}

/**
 * 在auto/edit.html中调用
 * @param $params
 */
function smarty_field($params){
    global $f;
    $name = $params['name'];
    $type = $params['type'];
    $value = $params['value'];
    $refer = $params['refer'];
    $datasource = $params['datasource'];
    $condition = $params['condition'];
    //字段验证
    $validate = $params['validate'];
    $class = str_replace(',',' ',$validate);
    $form_field = '';

    switch($type){
        case 'textfield':
                            $form_field = '<input type="text" class="'.$class.'" name="'.$name.'" value="'.$value.'" style="width:350px" />';
                            break;

        case 'password':    $form_field = '<input type="password" class="'.$class.'" name="'.$name.'" value="" style="width:350px" />';
                            break;

        case 'datepicker':  $form_field = '<input type="text" datefmt="yyyy-MM-dd HH:mm:ss" readonly="true" class="date '.$class.'" name="'.$name.'" value="'.$value.'" style="width:200px" />';
                            break;

        case 'combox':
                            $form_field = '<select name="'.$name.'" class="'.$class.'" >';
                            $options = '';

                            if(!empty($refer)){//以表关联形式出现
                                    list($tableName,$columnKey,$columnValue) = explode('.',$refer);
                                    $tableName = Config::item('DB','PREFIX').$tableName;
                                    $sql = "select $columnKey,$columnValue from $tableName";
                                    if(!empty($condition))$sql.= " $condition";
                                    $dataCollection = $f -> db -> query($sql) -> result_array();
                                    foreach($dataCollection as $data){
                                        if($value == $data[$columnValue]){
                                            $options .= '<option value="'.$data[$columnValue].'" selected="selected">'.$data[$columnKey].'</option>';
                                        }else{
                                            $options .= '<option value="'.$data[$columnValue].'">'.$data[$columnKey].'</option>';
                                        }
                                    }
                            }else{//以固定值形式出现
                                    $dataCollection = explode(',',$datasource);
                                    foreach($dataCollection as $data){
                                        list($columnKey,$columnValue) = explode('.',$data);
                                        if($value == $columnValue){
                                            $options .= '<option value="'.$columnValue.'" selected="selected">'.$columnKey.'</option>';
                                        }else{
                                            $options .= '<option value="'.$columnValue.'">'.$columnKey.'</option>';
                                        }
                                    }
                            }

                            $form_field .= $options.'</select>';
                            break;
        case 'radio':
                            if(!empty($refer)){//以表关联形式出现
                                list($tableName,$columnKey,$columnValue) = explode('.',$refer);
                                $tableName = Config::item('DB','PREFIX').$tableName;
                                $sql = "select $columnKey,$columnValue from $tableName";
                                if(!empty($condition))$sql.= " $condition";
                                $dataCollection = $f -> db -> query($sql) -> result_array();
                                foreach($dataCollection as $data){
                                    if($value == $data[$columnValue]){
                                        $form_field .= '<input type="radio" class="'.$class.'" name="'.$name.'" value="'.$data[$columnValue].'" checked="checked">'.$data[$columnKey];
                                    }else{
                                        $form_field .= '<input type="radio" class="'.$class.'" name="'.$name.'" value="'.$data[$columnValue].'">'.$data[$columnKey];
                                    }
                                }
                            }else{//以固定值形式出现
                                $dataCollection = explode(',',$datasource);
                                foreach($dataCollection as $data){
                                    list($columnKey,$columnValue) = explode('.',$data);
                                    if($value == $columnValue){
                                        $form_field .= '<input type="radio" class="'.$class.'" name="'.$name.'" value="'.$columnValue.'" checked="checked">'.$columnKey;
                                    }else{
                                        $form_field .= '<input type="radio" class="'.$class.'" name="'.$name.'" value="'.$columnValue.'">'.$columnKey;
                                    }
                                }
                            }
                            break;
        case 'textarea':
                            $form_field = '<textarea rows="10" cols="70" class="'.$class.'" name="'.$name.'">'.$value.'</textarea>';
                            break;
        case 'checkbox':
                            //一般来说checkbox都是按逗号分割的 所以默认按这种形式拆分
                            $values = !empty($value) ? explode(',',$value) : array();
                            if(!empty($refer)){//以表关联形式出现
                                list($tableName,$columnKey,$columnValue) = explode('.',$refer);
                                $tableName = Config::item('DB','PREFIX').$tableName;
                                $sql = "select $columnKey,$columnValue from $tableName";
                                if(!empty($condition))$sql.= " $condition";
                                $dataCollection = $f -> db -> query($sql) -> result_array();
                                foreach($dataCollection as $data){
                                    if(in_array($data[$columnValue],$values)){
                                        $form_field .= '<input type="checkbox" class="'.$class.'" name="'.$name.'[]" value="'.$data[$columnValue].'" checked="checked">'.$data[$columnKey];
                                    }else{
                                        $form_field .= '<input type="checkbox" class="'.$class.'" name="'.$name.'[]" value="'.$data[$columnValue].'">'.$data[$columnKey];
                                    }
                                }
                            }else{//以固定值形式出现
                                $dataCollection = explode(',',$datasource);
                                foreach($dataCollection as $data){
                                    list($columnKey,$columnValue) = explode('.',$data);
                                    if(in_array($columnValue,$values)){
                                        $form_field .= '<input type="checkbox" class="'.$class.'" name="'.$name.'[]" value="'.$columnValue.'" checked="checked">'.$columnKey;
                                    }else{
                                        $form_field .= '<input type="checkbox" class="'.$class.'" name="'.$name.'[]" value="'.$columnValue.'">'.$columnKey;
                                    }
                                }
                            }
                            break;
        case 'textedit':
                            $form_field = '<textarea class="editor" rows="40" cols="100" name="'.$name.'">'.$value.'</textarea>';
                            break;

        case 'upload' :     $form_field = '<input type="text" value="'.$value.'" style="width:300px" name="'.$name.'" id="'.$name.'" readonly="true"/>&nbsp;&nbsp;<input type="button" class="btn_orange" value="浏览" onclick="showupwindow(\''.$name.'\')" />';
                            break;

        case 'multiupload' :$form_field = '<input type="hidden" class="multi_val" value="'.$value.'"   name="'.$name.'" id="'.$name.'" />&nbsp;&nbsp;<input type="button" class="btn_orange" value="浏览多个文件" onclick="show_multi_upload(\''.$name.'\')" /><div class="multi_contianer"></div>';
                            break;
        default:break;
    }
    echo $form_field;
}


/**
 * 在auto/list.html中调用()
 * @param $params
 */
function smarty_search_field($params){

    $searchable = $params['searchable'];
    if(!$searchable)
    {
        echo '';//如果不可查询直接输出空字符
        return;
    }
    global $f;
    $name = $params['name'];
    $type = $params['type'];
    $value = $params['value'];
    $refer = $params['refer'];
    $datasource = $params['datasource'];
    $condition = $params['condition'];
    $comment = $params['comment'];

    $search_field = '<td>'.$comment.': ';

    switch($type){
        case 'textfield':
            $search_field .= '<input type="text" name="'.$name.'" value="'.$value.'" style="width:100px" />';
            $search_field .= '</td>';
            break;

        case 'password':    $search_field = '';
            break;

        case 'datepicker':  $search_field .= '<input type="text" datefmt="yyyy-MM-dd HH:mm:ss" readonly="true" class="date" name="'.$name.'" value="'.$value.'" />';
                            $search_field .= '</td>';
                            break;

        case 'combox':
            $search_field .= '<select name="'.$name.'"  >';
            $options = '<option value="" >请选择</option>';

            if(!empty($refer)){//以表关联形式出现
                list($tableName,$columnKey,$columnValue) = explode('.',$refer);
                $tableName = Config::item('DB','PREFIX').$tableName;
                $sql = "select $columnKey,$columnValue from $tableName";
                if(!empty($condition))$sql.= " $condition";
                $dataCollection = $f -> db -> query($sql) -> result_array();
                foreach($dataCollection as $data){
                    if($value == $data[$columnValue]){
                        $options .= '<option value="'.$data[$columnValue].'" selected="selected">'.$data[$columnKey].'</option>';
                    }else{
                        $options .= '<option value="'.$data[$columnValue].'">'.$data[$columnKey].'</option>';
                    }
                }
            }else{//以固定值形式出现
                $dataCollection = explode(',',$datasource);
                foreach($dataCollection as $data){
                    list($columnKey,$columnValue) = explode('.',$data);
                    if($value == $columnValue){
                        $options .= '<option value="'.$columnValue.'" selected="selected">'.$columnKey.'</option>';
                    }else{
                        $options .= '<option value="'.$columnValue.'">'.$columnKey.'</option>';
                    }
                }
            }

            $search_field .= $options.'</select>';
            $search_field .= '</td>';
            break;
        case 'radio':
            if(!empty($refer)){//以表关联形式出现
                list($tableName,$columnKey,$columnValue) = explode('.',$refer);
                $tableName = Config::item('DB','PREFIX').$tableName;
                $sql = "select $columnKey,$columnValue from $tableName";
                if(!empty($condition))$sql.= " $condition";
                $dataCollection = $f -> db -> query($sql) -> result_array();
                foreach($dataCollection as $data){
                    if($value == $data[$columnValue]){
                        $search_field .= '<input type="radio"  name="'.$name.'" value="'.$data[$columnValue].'" checked="checked">'.$data[$columnKey];
                    }else{
                        $search_field .= '<input type="radio"  name="'.$name.'" value="'.$data[$columnValue].'">'.$data[$columnKey];
                    }
                }
            }else{//以固定值形式出现
                $dataCollection = explode(',',$datasource);
                foreach($dataCollection as $data){
                    list($columnKey,$columnValue) = explode('.',$data);
                    if($value == $columnValue){
                        $search_field .= '<input type="radio"  name="'.$name.'" value="'.$columnValue.'" checked="checked">'.$columnKey;
                    }else{
                        $search_field .= '<input type="radio"  name="'.$name.'" value="'.$columnValue.'">'.$columnKey;
                    }
                }
            }
            $search_field .= '</td>';
            break;
        case 'textarea':
            $search_field = '';
            break;
        case 'checkbox':
            //一般来说checkbox都是按逗号分割的 所以默认按这种形式拆分
            $values = !empty($value) ? explode(',',$value) : array();
            if(!empty($refer)){//以表关联形式出现
                list($tableName,$columnKey,$columnValue) = explode('.',$refer);
                $tableName = Config::item('DB','PREFIX').$tableName;
                $sql = "select $columnKey,$columnValue from $tableName";
                if(!empty($condition))$sql.= " $condition";
                $dataCollection = $f -> db -> query($sql) -> result_array();
                foreach($dataCollection as $data){
                    if(in_array($data[$columnValue],$values)){
                        $search_field .= '<input type="checkbox"  name="'.$name.'[]" value="'.$data[$columnValue].'" checked="checked">'.$data[$columnKey];
                    }else{
                        $search_field .= '<input type="checkbox"  name="'.$name.'[]" value="'.$data[$columnValue].'">'.$data[$columnKey];
                    }
                }
            }else{//以固定值形式出现
                $dataCollection = explode(',',$datasource);
                foreach($dataCollection as $data){
                    list($columnKey,$columnValue) = explode('.',$data);
                    if(in_array($columnValue,$values)){
                        $search_field .= '<input type="checkbox" name="'.$name.'[]" value="'.$columnValue.'" checked="checked">'.$columnKey;
                    }else{
                        $search_field .= '<input type="checkbox" name="'.$name.'[]" value="'.$columnValue.'">'.$columnKey;
                    }
                }
            }
            $search_field .= '</td>';
            break;
        case 'textedit':
            $search_field = '';
            break;
        default:break;
    }
    echo $search_field;
}

?>

