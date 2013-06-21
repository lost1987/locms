<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	Class Permission extends Permission_values{
	
		/**
		 * 赋予权限
		 * @param array popes 权限
		 * @return int 权值
		 */
		public function give($permissions){
			
			if(!is_array($permissions)){
				exit("params must be array");
			}
			$value = 0;
			foreach($permissions as $k => $v){
				$value |= $v;
			}
			return $value;
		}
		
		
		/**
		 * 判断是否有权限
		 * @param int user_pope
		 * @param int module_pope
		 * return boolean
		 */
		public function hasPermission($user_permission,$module_permission){
			if(!empty($user_permission)
			   && !empty($module_permission)
			   && $user_permission != 0 
			   && $module_permission != 0
			  )
			{
			  	if($user_permission & $module_permission){
			  		return TRUE;
			  	}
			}
			  
			  return FALSE;
		}
		
		/**
		 * 检查权限
		 */
		public function checkPermssion($user_permission,$module_permission){
			  	if(!($user_permission & $module_permission) || $user_permission == 0 || $module_permission == 0){
			  		dwz_failed('没有权限');
			  	}
		}
		
		/**
		 * 得到权限
		 * @return INT / ARRAY
		 */
		public function getPermissions($key=''){
			$p = $this -> getPv();
			if($key == '')return $p;
			return $p[$key]['value'];
		}
		
 		
	}

?>