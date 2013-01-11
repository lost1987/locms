<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permission_values {
	
	
	
	function Permission_values(){
		$this -> pv = array(
		  'ADMIN' =>	array('value' => 1, 'displayModuleId' => 'admin_display' , 'desp' => '管理员管理权限'),
		  'CONTENT' => 	array('value' => 2, 'displayModuleId' => 'content_display' , 'desp' => '内容管理权限'),
		  'SITE' =>      array('value' => 4, 'displayModuleId' => 'site_display' , 'desp' => '站点管理权限')
		);	
	}
	
	public function getPv(){
		return $this -> pv;
	}
	
}

?>