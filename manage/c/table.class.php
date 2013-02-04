<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-31
 * Time: 下午8:42
 * To change this template use File | Settings | File Templates.
 */
class Table extends Core implements Action
{
   function Table(){
        $this -> permission -> checkPermssion($this->cookie->userdata('permission'),$this->permission->getPermissions('TABLE'));
        $this->frm = new Frm($this ->db);
        $this->tableModel = new Table_m();
   }

    function save()
    {
        // TODO: Implement save() method.
        $op = $this -> input -> post('op');
        if($op == 'edit'){

        }

        else{
            $tableName = Config::item('DB','PREFIX').$this -> input -> post('tableName');
            $table_engine = $this -> input -> post('table_engine');
            $table_charset = $this -> input -> post('table_charset');
            $autocrement = $this -> input -> post('autocrement');
            $isprimarykey = $this -> input -> post('isprimarykey');
            $flag = $this -> input -> post('flag');//字段的数量
            $columns = array();
            $column_types = array();
            $column_length = array();
            $column_comments = array();
            $column_default = array();
            $column_isnull = array();
            for($i =1 ; $i <= $flag; $i++){
                    $columns[] = $this -> input -> post('column'.$i);
                    $column_types[] = $this -> input -> post('type'.$i);
                    $column_length[] = $this -> input -> post('length'.$i);
                    $column_comments[] = $this -> input -> post('comment'.$i);
                    $column_default[] = $this -> input -> post('default'.$i);
                    $column_isnull[] = $this -> input -> post('isnull'.$i);
            }

            //附加表 table_config表
            $desp = $this->input->post('desp');
            $auto_form = $this->input->post('auto_form');
            $config = array('tableName'=>$this ->input->post('tableName'),'desp'=>$desp,'auto_form_fields'=>$auto_form);
            /*//test
            $res = $this->frm->create_table($tableName,$table_engine,$table_charset,$autocrement,$columns,$column_types,$column_length,$column_comments,$column_default,$column_isnull,$isprimarykey);
            echo $res;*/

            if($this->frm->create_table($tableName,$table_engine,$table_charset,$autocrement,$columns,$column_types,$column_length,$column_comments,$column_default,$column_isnull,$isprimarykey)){
                if($this -> tableModel -> save_config($config)){
                    dwz_success();
                }
                $this -> frm -> drop_table($tableName);
                dwz_failed();
            }
            dwz_failed();
        }
    }

    function edit()
    {
        // TODO: Implement edit() method.
        $op = $this -> input -> get('op');


        //取数据库的字段类型集合
        $field_types = $this -> frm -> field_types();
        $table_engine = $this -> frm -> table_engine();
        $table_charset = $this -> frm -> table_charset();
        $field_nums = 1;
        $fields = array(array('Field'=>'','Type'=>'','Null'=>'','Key'=>'','Default'=>'','Extra'=>''));//给予默认值
        $tableinfo = null;
        $primary_field = null;
        $is_primary = '';
        $tableconfig = null;

        if(!empty($op) && $op == 'edit'){
            $tableName = Config::item('DB','PREFIX').$this -> input -> get('tableName');
            $tableconfig = $this -> tableModel -> get_config($this -> input -> get('tableName'));
            $fields = $this -> frm -> fields($tableName);
            $field_nums = count($fields);
            $tableinfo = $this -> frm -> table_info($tableName);
            $tableinfo['Name'] = str_replace(Config::item('DB','PREFIX'),"",$tableinfo['Name']);//去除表前缀
            $tableinfo['Collation'] = preg_replace('/(.*?)_(.*)/i','$1',$tableinfo['Collation']);

            $primary_field = array();

            $flag = 0;
            foreach($fields as &$field){
                $type = $field['Type'];
                $field['Type'] = preg_replace('/(.*)\((.*)\)/i','$1',$type);//将字段类型分别取出类型和长度
                $field['Length'] = preg_replace('/(.*)\((.*)\)/i','$2',$type);
                if(!is_numeric($field['Length']))$field['Length']='';
                if($field['Key'] == 'PRI'){
                    $primary_field = array_slice($fields,$flag,1);
                    $is_primary = TRUE ; //该数据表是有主键的
                }
                $flag++;
            }

        }

        $this -> tpl -> assign('tableconfig',$tableconfig);
        $this -> tpl -> assign('primary_field',$primary_field);
        $this -> tpl -> assign('is_primary',$is_primary);
        $this -> tpl -> assign('fields',$fields);
        $this -> tpl -> assign('field_nums',$field_nums);
        $this -> tpl -> assign('tableinfo',$tableinfo);
        $this->tpl->assign('field_types_str',implode(',',$field_types));
        $this->tpl->assign('field_types',$field_types);
        $this->tpl->assign('table_engine',$table_engine);
        $this->tpl->assign('table_charset',$table_charset);
        $this->tpl->assign('title','新建数据表');
        $this->tpl->assign('op',$op);
        $this->tpl->display('table_add.html');
    }

    function del()
    {
        // TODO: Implement del() method.
    }

    public function index(){
        // TODO: Implement index() method.
        $pagecount = 20;
        $pageNum = $this -> input -> post('pageNum');
        if($pageNum == '')$pageNum = 1;
        $start = ($pageNum - 1) * $pagecount;

        $list = $this -> tableModel -> lists($start,$pagecount);
        foreach($list as &$table){
            $table['auto_form_fields'] = $table['auto_form_fields']==1 ? '是' : '否';
        }

        $page['totalCount'] = $this -> tableModel -> num_rows();
        $page['numPerPage'] = $pagecount;
        $page['currentPage'] = $pageNum;
        $this ->  tpl -> assign('page',$page);
        $this ->  tpl -> assign('list',$list);
        $this ->  tpl -> display('table_list.html');
   }
}
