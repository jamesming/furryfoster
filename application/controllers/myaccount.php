<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myaccount extends Base_Controller {// test
	
	function set() {
		
		$this->class = 'myaccount';
		
		$this->action = ( $this->action != '' ? $this->action : 'rescue_profile' );
		
		switch ($this->action) {
		    case 'rescue_profile':
			    	$model = new Models_Db_Rescues_Model( $pk = 1, 'rescues');
			    	$this->db = array('rescues' => $model->to_array());	
		    break;
		    case 'manage_pets':
		    break;
		    case 'account_settings':
		    break;
		}
		
		$this->left_menu_item =	$this->action;

		$this->left_menu_items = array();
		
		$this->pushMenuItem('manage_pets', 'Manage Pets');
		$this->pushMenuItem('rescue_profile', 'Edit Rescue Profile');
		$this->pushMenuItem('account_settings', 'Account Settings');
	}
	
	function pushMenuItem($name, $label){
		
		array_push($this->left_menu_items, array(
				'name' => $name,
				'label' => $label,
				'active' => ( $this->left_menu_item == $name ? true : false )	
			));		
		
	}
	

}
