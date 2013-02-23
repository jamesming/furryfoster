<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myaccount extends Base_Controller {// test
	
	function __construct() {
		
		parent::__construct();
		
		$this->class = 'myaccount';
		
		$this->left_menu_item = ( $this->uri->segment(3) != '' ? $this->uri->segment(3) : 'rescue_profile' );
		
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
