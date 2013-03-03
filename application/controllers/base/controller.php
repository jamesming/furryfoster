<?php
class Base_Controller extends CI_Controller 
{

	protected $_data;
	
	function __construct() {
		
		parent::__construct();
		
		$this->assets_model = new Models_Db_Assets_Model;
		
		$this->action = $this->uri->segment(3);

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
	
	public function index(){
		
		//$this->assets_model->clear_table_of_empty_records_flagged_with_update_field_equals_0000();
		if( $this->_data->loggedIn == true ){
			
			$this->main();			
			
		}else{
			$this->_data->body = 'login';
			$this->_data->right = "body/login/view";
			$this->load->view('index', $this->_data);				
		};

	}
	public function main(){
	
		$this->set();
		
		$this->_data->db = $this->db;		
	
		if( $this->_data->loggedIn == false){
			redirect('/main/index');
		};
		
		$this->_data->body = $this->class;
		$this->_data->left = 'body/'.$this->class.'/left/view';	
		$this->_data->left_menu_items = $this->left_menu_items;	
		$this->_data->right = 'body/'.$this->class.'/right/'.$this->left_menu_item.'/view';

		$this->_data->hidden = 'hidden/view';	
		
		
		$this->load->view('index', $this->_data);			
		
		
	}

	public function validate(){
		
		if($this->input->post('username') == 'furry'){
			$session_data = array('user_id' => 1 );						
			$this->session->set_userdata($session_data);	
			redirect('/'.$this->class.'/main');			
		}else{
			$this->session->sess_create();
			redirect('/'.$this->class.'/index');
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