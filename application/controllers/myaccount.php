<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myaccount extends Base_Controller {
	
	protected static $_default_left_menu_selection = 'rescue_profile';
	
	protected static $_left_menu_items = array(
		0=>array(
			'name'=>'manage_pets',
			'label'=>'Manage Pets'
		),
		1=>array(
			'name'=>'rescue_profile',
			'label'=>'Edit Rescue Profile'
		),
		2=>array(
			'name'=>'account_settings',
			'label'=>'Account Settings'
		)			
	);
	
	public function set() {
		
		$this->class = 'myaccount';
		
		$this->action = ( $this->action != '' ? $this->action : self::$_default_left_menu_selection );
		
		$this->left_menu_items = $this->designate_left_menu_selection(
			self::$_left_menu_items,
			$this->action
		);
		
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

	}
	
}
