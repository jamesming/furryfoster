<?php

class Models_Db_Groups_Model extends Database {
	
	
	function __construct() {
		
		parent::__construct();
		
		
	}
	
	public function getAllGroups(){
		
		return $this->object_to_array( $this->select_from_table( 
			$table = 'groups', 
			$select_what = '*', 
			$where_array = array(), 
			$use_order = FALSE, 
			$order_field = '', 
			$order_direction = '', 
			$limit = -1
			)
		);
		
		
		
		
	}
		
	public function editGroup($Group_id, $post_array){
		
		return $this->update_table(
			$table = 'Groups',
			$primary_key = $Group_id, 
			$set_what_array = array(
				  'name' => $post_array['Group_name']
			)
		);
		
	}
	
	
	public function checkGroupCategoryJoin($post_array){
		return $this->check_if_exist( 
			 $table = 'groups_categories	'
			,$where_array = array(
				 'category_id' => $post_array['category_id']
				,'group_id' =>  $post_array['group_id']
			)
		);
		
	}	
	
	
	public function insertCategoryIntoGroup($post_array){
		if( !$this->checkGroupCategoryJoin($post_array)){
			return $this->insert_table(
				$table = 'groups_categories	', 
				$insert_what = array(
					   'category_id' => $post_array['category_id']
					  ,'group_id' =>  $post_array['group_id']
				)
			);			
		}else{
			return 0;	
		};
	}
	
	
	
	public function removeCategoryFromGroup($post_array){
		 return $this->delete_from_table(
		 	  $table = 'groups_categories	'
		 	, $where_array = array(
				 'category_id' => $post_array['category_id']
				,'group_id' =>  $post_array['group_id']
			)
		 	
		 );
	}
	



}

