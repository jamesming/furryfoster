<?php

class Models_Db_Categories_Model extends Database {
	
	
	function __construct() {
		
		parent::__construct();
		
		
	}
	
	public function getCategoriesBy( $group_id ){
		

		$join_array = array(
			 'groups_categories' => 'categories.id = groups_categories.category_id'
		);	
											
		
		return $categories_raw =  $this->select_from_table_left_join( 
					 $table = 'categories'
					,$select_what = '
						  categories.user_id as user_id
						, categories.id as category_id
						, categories.name as category_name'   
					,$where_array = array(
						'groups_categories.group_id' => $group_id
					)
					,$use_order = TRUE
					,$order_field = 'categories.order asc'
					,$order_direction = ''
					,$limit = -1
					,$use_join = TRUE
					,$join_array
					);
		
		
	}
		
	public function editCategory($category_id, $post_array){
		
		return $this->update_table(
			$table = 'categories',
			$primary_key = $category_id, 
			$set_what_array = array(
				  'name' => $post_array['category_name']
			)
		);
		
	}
	
	public function insertCategory($post_array){
		return $this->insert_table(
			$table = 'categories', 
			$insert_what = array(
				  'name' => $post_array['category_name']
				 ,'user_id' => (  $this->session->userdata['user_id'] == 1 ? 1 : 2 ) 
				 ,'order' => $post_array['order']
			)
		);
		
	}
	
	public function reorderOneCategory($category_id,  $post_array){
		

		echo $this->update_table(
			$table = 'categories',
			$primary_key = $category_id, 
			$set_what_array = array(
				'order' => $post_array['order']
			)
		);
		
		
		
		$this->reorderCategories($post_array['direction']);
			
	}
	
	public function reorderCategories($direction = 'asc'){
		
		$categories = $this->object_to_array(
			$this->select_from_table( 
			$table = 'categories', 
			$select_what = "id, name, order, updated", 
			$where_array = array(), 
			$use_order = TRUE, 
			$order_field = 'order asc, updated '. $direction, 
			$order_direction = '', 
			$limit = -1
			));
			
		
		$order = 0;	
			
		foreach( $categories  as  $key => $category){
			
			$this->update_table( 
				$table = 'categories', 
				$primary_key = $category['id'], 
				$set_what_array =
					array(
						'order' => $order 
					)
				);
				
			$order++;
			
		}
		
		
		

	}	

}

