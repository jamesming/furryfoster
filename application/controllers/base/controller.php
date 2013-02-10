<?php
class Base_Controller extends CI_Controller 
{

	protected $_data;
	
	function __construct() {
		
		parent::__construct();
		
		$this->assets_model = new Models_Db_Assets_Model;

		$this->_data = new stdClass;
		
		$this->_data->title = "Furryfoster";
		$this->_data->company_name = "furryfoster LLC";
		$this->_data->GA_account = "UA-XXXXX-X";

		$this->_data->header = "header/header";
		$this->_data->nav = "nav/nav";
		$this->_data->company = "footer/company";			
		$this->_data->footer = "footer/footer";
		
		if( isset($this->session->userdata['user_id']) ){
			$this->_data->loggedIn = true; 
		}else{
			$this->_data->loggedIn = false; 
		};
		
	}
	
	function create_table(){
		
		/* 
		*
		*  		/create_table?table=categories
		*
		*/
		
		$table = $this->input->get('table');
		
		$this->model = new Models_Db_Categories_Model;
		
		$this->model->create_generic_table($table); 
		
		
		$fields_array = array(
		                      'type_id' => array(
		                                               'type' => 'int(11)'
		                                    )
		              ); 
		              
		echo '<pre>';print_r(  $fields_array   );echo '</pre>';   
		$this->model->add_column_to_table_if_not_exist(
			$table, 
			$fields_array
		);
	   
	
	}
}