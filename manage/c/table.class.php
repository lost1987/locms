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
        //获取表单数据
        $sourceTableName = $this -> input -> post('tableName');
        $tableName = Config::item('DB','PREFIX').$sourceTableName;
        //检测表名称是否存在
        if($this->tableModel ->check_table_config_exists($sourceTableName))dwz_failed('表名称已经存在,请更换!');

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
            $column_isnull[] = $_POST['isnull'.$i];//过滤字符会吧null加混淆 所以这里不用input方法
            $form_field_types[] = $this -> input -> post('formfieldtype'.$i);
            $refer[] = $this -> input -> post('refer'.$i);
            $datasource[] = $this -> input -> post('datasource'.$i);
            $condition[] = $_POST['cond'.$i];
            $formValidate[] =  $this -> input -> post('formValidate'.$i);
            $searchable[] = $this -> input -> post('searchable'.$i);
        }

        //附加表 table_config表
        $desp = $this->input->post('desp');
        $auto_form = $this->input->post('auto_form');
        $controller = $this -> input -> post('controller');
        $config = array('tableName'=>$sourceTableName,'desp'=>$desp,'auto_form_fields'=>$auto_form,'controller'=>$controller);

        $op = $this -> input -> post('op');

        if($this->frm->create_table($tableName,$table_engine,$table_charset,$autocrement,$columns,$column_types,$column_length,$column_comments,$column_default,$column_isnull,$isprimarykey)){
            try{
                if(!$this -> tableModel -> save_config($config))throw new Exception('table_config write data error!');
                try{
                    if(!$this -> tableModel -> save_fields($columns,$form_field_types,$refer,$datasource,$condition,$formValidate,$searchable,$sourceTableName))throw new Exception('table_field write data error!');
                    dwz_success();
                }catch (Exception $e){
                    $this -> tableModel -> del_config($tableName);
                }
            }catch (Exception $e){
                $this -> frm -> drop_table($tableName);
                dwz_failed($e -> getMessage());
            }
        }
        dwz_failed();
    }

    function edit()
    {
        // TODO: Implement edit() method.
        $op = $this -> input -> get('op');


        //取得字段的表单类型集合
        $form_field_types = Config::item('form_field_types');
        $form_field_str = implode(',',Config::item('form_field_types'));
        //取数据库的字段类型集合
        $field_types = $this -> frm -> field_types();
        $table_engine = $this -> frm -> table_engine();
        $table_charset = $this -> frm -> table_charset();
        $field_nums = 1;
        $fields = array(array('Field'=>'','Type'=>'','Null'=>'','Key'=>'','Default'=>'','Extra'=>''));//给予默认值
        $tableinfo = null;
        $primary_field = null;
        $is_primary = FALSE;
        $tableconfig = null;
        $controller_disabled = 'disabled=disabled';

        if(!empty($op) && $op == 'edit'){
            $tableName = Config::item('DB','PREFIX').$this -> input -> get('tableName');
            $tableconfig = $this -> tableModel -> get_config($this -> input -> get('tableName'));
            $table_field = $this -> tableModel -> get_field($this -> input -> get('tableName'));
            $fields = $this -> frm -> fields($tableName);
            $field_nums = count($fields);
            $tableinfo = $this -> frm -> table_info($tableName);
            $tableinfo['Name'] = str_replace(Config::item('DB','PREFIX'),"",$tableinfo['Name']);//去除表前缀
            $tableinfo['Collation'] = preg_replace('/(.*?)_(.*)/i','$1',$tableinfo['Collation']);

            $primary_field = array();
            $this->tpl->assign('primary_disabled','');

            if($tableconfig['auto_form_fields'] == 1){
                $controller_disabled = '';
            }

            $flag = 0;
            foreach($fields as &$field){
                $type = $field['Type'];
                $field['Type'] = preg_replace('/(.*)\((.*)\)/i','$1',$type);//将字段类型分别取出类型和长度
                $field['Length'] = preg_replace('/(.*)\((.*)\)/i','$2',$type);
                //字段的附加信息如 关联或数据源
                if(!empty($table_field)){//如果table_field表里有记录 则读取 否则就非自动表单
                    $field['form_field_type'] = $table_field[$field['Field']]['fieldType'];
                    $field['refer'] = $table_field[$field['Field']]['refer'];
                    $field['datasource'] = $table_field[$field['Field']]['datasource'];
                    $field['cond'] = $table_field[$field['Field']]['cond'];
                    $field['formValidate'] = $table_field[$field['Field']]['formValidate'];
                    $field['searchable'] = $table_field[$field['Field']]['searchable'];
                }
                if(!is_numeric($field['Length']))$field['Length']='';
                if($field['Key'] == 'PRI'){
                    $primary_field = array_slice($fields,$flag,1);
                    $is_primary = TRUE ; //该数据表是有主键的
                    $this->tpl->assign('primary_disabled','disabled=disabled');
                }
                $flag++;
            }
            $this->tpl->assign('disabled','disabled="disabled"');
        }

        $this -> tpl -> assign('form_field_types',$form_field_types);
        $this -> tpl -> assign('form_field_str',$form_field_str);
        $this -> tpl -> assign('controller_disabled',$controller_disabled);
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
        $tableName = $this -> input -> get('tableName');
        if($this -> frm -> drop_table(Config::item('DB','PREFIX').$tableName)){
            if($this -> tableModel -> del_config($tableName)){
                if($this -> tableModel -> del_all_field($tableName))
                dwz_success('操作成功','table');
            }
        }
        dwz_failed('操作失败','table');
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

  /********************************AJAX METHOD*************************************************************/

   public function delColumnByAjax(){
       $tableName = Config::item('DB','PREFIX').$this -> input -> post('tableName');
       $columnName = $this -> input -> post('columnName');

       if($this-> frm -> delColumns($tableName,array($columnName))){
           if($this->tableModel->del_field($this -> input -> post('tableName'),$columnName))
           die('1');
       }
       die('0');
   }

    public function updateColumnByAjax(){
        $tableName = Config::item('DB','PREFIX').$this -> input -> post('tableName');
        $tableSourceName = $this -> input -> post('tableName');
        $columnName = $this -> input -> post('columnName');
        $columnType = $this -> input -> post('columnType');
        $columnLength = $this -> input -> post('columnLength');
        $comment = $this -> input -> post('comment');
        $columndefault = $this -> input -> post('columndefault');
        $isnull = $_POST['isnull'];
        $from = $this -> input -> post('sourceColumn');
        $form_field_type = $this -> input -> post('formfieldtype');
        $refer = $this -> input -> post('refer');
        $datasource = $this -> input -> post('datasource');
        $condition = $_POST['cond'];
        $formValidate = $this -> input -> post('formValidate');
        $searchable = $this -> input -> post('searchable');

        $formfieldtype = array(
            'tableName' => $tableSourceName,
            'fieldName' => $columnName,
            'fieldType' => $form_field_type,
            'refer' => $refer,
            'datasource' => $datasource,
            'cond' => $condition,
            'formValidate' => $formValidate,
            'searchable' => $searchable
        );

        if(!empty($columnLength) && $columnLength != 0){
            $columnType .= "($columnLength)";
        }
        $columninfo =array( array($from,$columnName,$columnType,$comment,$columndefault,$isnull) );
        if($this -> frm -> alterColumns($tableName,$columninfo)){
            if($this -> tableModel -> update_field($formfieldtype,"tableName='$tableSourceName' and fieldName='$from'"))
            die('1');
        }
        die('0');
    }

    public function saveColumnByAjax(){
        $tableName = Config::item('DB','PREFIX').$this -> input -> post('tableName');
        $columnName = $this -> input -> post('columnName');
        $columnType = $this -> input -> post('columnType');
        $columnLength = $this -> input -> post('columnLength');
        $comment = $this -> input -> post('comment');
        $columndefault = $this -> input -> post('columndefault');
        $isnull = $_POST['isnull'];
        $form_field_type = $this -> input -> post('formfieldtype');
        $refer = $this -> input -> post('refer');
        $datasource = $this -> input -> post('datasource');
        $condition = $_POST['cond'];
        $formValidate = $this -> input -> post('formValidate');
        $searchable = $this -> input -> post('searchable');

        $formfieldtype = array(
            'tableName' => $this -> input -> post('tableName'),
            'fieldName' => $columnName,
            'fieldType' => $form_field_type,
            'refer' => $refer,
            'datasource' => $datasource,
            'cond' => $condition,
            'formValidate' => $formValidate,
            'searchable' => $searchable
        );

        if(!empty($columnLength) && $columnLength != 0){
            $columnType .= "($columnLength)";
        }
        $columninfo =array( array($columnName,$columnType,$comment,$columndefault,$isnull) );
        if($this -> frm -> addColumns($tableName,$columninfo)){
            if($this -> tableModel -> save_field($formfieldtype))
            die('1');
        }
        die('0');
    }

    public function alterTableByAjax(){
        $engine = $this -> input -> post('engine');
        $tableName = Config::item('DB','PREFIX').$this -> input -> post('tableName');
        if($this -> frm -> alter_table($tableName,"engine=".$engine)){
            die('1');
        }
        die('0');
    }

    public function alterTableConfigByAjax(){
        $desp = $this -> input -> post('desp');
        $autoform = $this -> input -> post('autoform');
        $tableName = $this -> input -> post('tableName');
        $controller = $this -> input -> post('controller');

        $array =  array('desp' => $desp,'auto_form_fields' => intval($autoform) ,'controller' => $controller);
        if($this -> tableModel -> update($array," tableName = '$tableName'")){
            die('1');
        }
        die('0');
    }
}
