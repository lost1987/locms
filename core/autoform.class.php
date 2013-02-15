<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-2-10
 * Time: 下午7:17
 * To change this template use File | Settings | File Templates.
 * 智能表单初始化
 */
class Autoform extends Core
{
    function Autoform(){
        $this -> tableName = Config::item('DB','PREFIX').'table_config';
        $this -> tableNameField = Config::item('DB','PREFIX').'table_field';
        $this -> frm = new Frm($this->db);
    }

    public function init_auto_form(){
        $f = $this -> getFactory();
        $controllerClass = strtolower($this ->  pathinfo -> controller);
        $tableconfig = $this -> db -> query("select auto_form_fields,tableName,desp from $this->tableName where controller = '$controllerClass'") -> row_array();
        if(!empty($tableconfig) && is_array($tableconfig) && $tableconfig['auto_form_fields'] == 1){
            $autoform = new stdClass();
            $autoform -> tableName = Config::item('DB','PREFIX').$tableconfig['tableName'];
            $autoform -> desp = $tableconfig['desp'];
            $autoform -> fields = $this -> init_fields($autoform -> tableName);
            $autoform -> action = $controllerClass;
            $f -> autoform = $autoform;
        }
        else{
            return;
        }
    }

    /**
     * 假如存在id就读取该表fields的值并返回frm的fields方法得到的数组,并增加key为value的值 , 如果不存在就返回fields的方法得到的数组
     * @param $tableName
     * @return mixed
     */
    public function init_fields($tableName){
        $tableSourceName = str_replace(Config::item('DB','PREFIX'),'',$tableName);
        $fields = $this -> frm -> fields($tableName);
        $id = $this -> input -> post('id');
        if(!empty($id) && strpos($id,',') === FALSE){
            $object = $this -> db -> query("select * from $tableName where id = $id") -> row_array();
        }

        $form_field_types = $this->db->query("select * from $this->tableNameField where tableName = '$tableSourceName'")->result_array();
        $field_types = array();
        foreach($form_field_types as $field_type){
            $field_types[$field_type['fieldName']] = $field_type;
        }

        foreach($fields as &$field){
              //取得该字段对应的表单类型
              $field['form_field_type'] = $field_types[$field['Field']]['fieldType'];
              $field['refer'] = $field_types[$field['Field']]['refer'];
              $field['datasource'] = $field_types[$field['Field']]['datasource'];
              $field['cond'] = $field_types[$field['Field']]['cond'];
              $field['Type'] = preg_replace('/(.*)\(.*\)/','$1',$field['Type']);//去除长度显示的字段类型如varchar(32) 则为 varchar
              if(isset($object)){
                  $field['value'] = $object[$field['Field']];
              }else{
                  $field['value'] = '';
              }
        }

        return $fields;
    }
}
