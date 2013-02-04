<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-1-7
 * Time: 下午4:55
 * To change this template use File | Settings | File Templates.
 */
class Admin extends Core implements Action{
   
   
   function admin(){
	   $this -> permission -> checkPermssion($this->cookie->userdata('permission'),$this->permission->getPermissions('ADMIN'));
	   $this -> adminModel = new Admin_m();
   }
   
   public function index(){
   
   	 // TODO: Implement index() method.
        $pagecount = 20;
        $pageNum = $this -> input -> post('pageNum');
        if($pageNum == '')$pageNum = 1;
        $start = ($pageNum - 1) * $pagecount;


        $list = $this -> adminModel -> lists($start,$pagecount);
        $page['totalCount'] = $this -> adminModel -> num_rows();
        $page['numPerPage'] = $pagecount;
        $page['currentPage'] = $pageNum;

        $this -> tpl -> assign('list',$list);
        $this -> tpl -> assign('page',$page);
        $this -> tpl -> display("admin_list.html");
	   
   }
   
   
   
   public function save(){
       // TODO: Implement save() method.
       $id = $this -> input -> post('id');
       $post = $this -> input -> post();
       unset($post['id']);

       if(empty($post['passwd']) || empty($post['passwd_again']) || $post['passwd'] != $post['passwd_again']){
           dwz_failed('密码设置错误！');
       }

       unset($post['passwd_again']);
       $post['passwd'] = md5($post['passwd']);
       if(empty($id)){
           if($this -> adminModel -> insert($post)){
               dwz_success();
           }
       }else{
           if($this -> adminModel -> update($post,"id=$id")){
               dwz_success();
           }
       }
       dwz_failed();
   }
   
   
   public function edit(){
       // TODO: Implement edit() method.
       $id = $this -> input -> get('id');
       $title='添加管理员';

       if(!empty($id)){
           $title='编辑管理员';
           $admin = $this -> adminModel -> read($id);
           $this -> tpl -> assign('admin',$admin);
       }

       $this -> tpl -> assign('title',$title);
       $this -> tpl -> display('admin_add.html');
   }
   
   
   
   public function  del(){
       $id = $this -> input -> req('id');
       if($this -> adminModel -> del($id)){
           dwz_success('操作成功',site_url('admin'));
       }
       dwz_failed();
   }


   public function module_permission(){
        $admins = $this -> adminModel -> lists_no_limit();
        $permissions = $this -> permission -> getPermissions();
        $permission_ck ='';
        foreach($permissions as $k => $p){
            $permission_ck .= '<li><input type="checkbox" name="per" value="'.$p['value'].'">'.$p['desp'].'</li>';
        }
        $this -> tpl -> assign('admins',$admins);
        $this -> tpl -> assign('permissions',$permission_ck);
        $this -> tpl -> display('admin_permission_list.html');
   }


   public function check_permission_by_adminid(){
        $adminid = $this -> input -> post('id');
        $admin = $this -> adminModel -> read($adminid);
        $permissions = $this -> permission -> getPermissions();
        $permission_ck ='';
        foreach($permissions as $k => $p){
           if($this -> permission -> hasPermission( $admin['permission'] , $p['value'] )){
               $permission_ck .= '<li><input type="checkbox" name="per" value="'.$p['value'].'" checked>'.$p['desp'].'</li>';
               continue;
           }
           $permission_ck .= '<li><input type="checkbox" name="per" value="'.$p['value'].'">'.$p['desp'].'</li>';
        }
        echo $permission_ck;
   }

    public function save_module_permission(){
           $p = $this -> input -> post('permission');
           $id = $this -> input -> post('id');


           if(empty($id)){
            dwz_failed('请选择管理员');
           }

           $p = explode(',',$p);
           $permission = $this -> permission -> give($p);


           if($this -> adminModel -> update(array('permission'=>$permission),"id=$id")){
               dwz_success();
           }
           dwz_failed();
    }
}


?>