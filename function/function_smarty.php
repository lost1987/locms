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
$tpl->registerPlugin('function','Smarty_field','smarty_field');//autoform里模板中需要使用的判断字段类型 决定input还是combox等.

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

function smarty_field($params){
    global $f;
    $name = $params['name'];
    $type = $params['type'];
    $value = $params['value'];
    $refer = $params['refer'];
    $datasource = $params['datasource'];
    $condition = $params['condition'];
    $form_field = '';

    switch($type){
        case 'textfield':
                            $form_field = '<input type="text" name="'.$name.'" value="'.$value.'" style="width:350px" />';
                            break;

        case 'password':    $form_field = '<input type="password" name="'.$name.'" value="" style="width:350px" />';
                            break;

        case 'combox':
                            $form_field = '<select name="'.$name.'" >';
                            $options = '';

                            if(!empty($refer)){//以表关联形式出现
                                    list($tableName,$columnKey,$columnValue) = explode('.',$refer);
                                    $tableName = Config::item('DB','PREFIX').$tableName;
                                    $sql = "select $columnKey,$columnValue from $tableName";
                                    if(!empty($condition))$sql.= " $condition";
                                    $dataCollection = $f -> db -> query($sql) -> result_array();
                                    foreach($dataCollection as $data){
                                        if($value == $columnValue){
                                            $options .= '<option value="'.$columnValue.'" selected="selected">'.$columnKey.'</option>';
                                        }else{
                                            $options .= '<option value="'.$columnValue.'">'.$columnKey.'</option>';
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
                                    if($value == $columnValue){
                                        $form_field .= '<input type="radio" name="'.$name.'" value="'.$columnValue.'" checked="checked">'.$columnKey;
                                    }else{
                                        $form_field .= '<input type="radio" name="'.$name.'" value="'.$columnValue.'">'.$columnKey;
                                    }
                                }
                            }else{//以固定值形式出现
                                $dataCollection = explode(',',$datasource);
                                foreach($dataCollection as $data){
                                    list($columnKey,$columnValue) = explode('.',$data);
                                    if($value == $columnValue){
                                        $form_field .= '<input type="radio" name="'.$name.'" value="'.$columnValue.'" checked="checked">'.$columnKey;
                                    }else{
                                        $form_field .= '<input type="radio" name="'.$name.'" value="'.$columnValue.'">'.$columnKey;
                                    }
                                }
                            }
                            break;
        case 'textarea':
                            $form_field = '<textarea rows="10" cols="70" name="'.$name.'">'.$value.'</textarea>';
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
                                    if(in_array($columnValue,$values)){
                                        $form_field .= '<input type="checkbox" name="'.$name.'[]" value="'.$columnValue.'" checked="checked">'.$columnKey;
                                    }else{
                                        $form_field .= '<input type="checkbox" name="'.$name.'[]" value="'.$columnValue.'">'.$columnKey;
                                    }
                                }
                            }else{//以固定值形式出现
                                $dataCollection = explode(',',$datasource);
                                foreach($dataCollection as $data){
                                    list($columnKey,$columnValue) = explode('.',$data);
                                    if(in_array($columnValue,$values)){
                                        $form_field .= '<input type="checkbox" name="'.$name.'[]" value="'.$columnValue.'" checked="checked">'.$columnKey;
                                    }else{
                                        $form_field .= '<input type="checkbox" name="'.$name.'[]" value="'.$columnValue.'">'.$columnKey;
                                    }
                                }
                            }
                            break;
        case 'textedit':
                            $form_field = '<textarea class="editor" rows="40" cols="100" name="'.$name.'">'.$value.'</textarea>';
                            break;
        default:break;
    }
    echo $form_field;
}

?>

