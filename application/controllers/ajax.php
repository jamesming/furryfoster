<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
	
	public function __construct() {
		
		parent::__construct();
		
		$this->assets_model = new Models_Db_Assets_Model;
		
		$this->categories_model = new Models_Db_Categories_Model;
		
		$this->groups_model = new Models_Db_Groups_Model;
	}
	
	public function getAll(){
		echo "<script>core.categories =".json_encode($this->assets_model->getAll($this->input->get('group_id'))).";</script>";
	 
	}
	
	
	public function getGroups(){
		
		echo "<script>core.categories =".json_encode($this->groups_model->getAllGroups()).";</script>";
			
	}
	
	public function getCategoriesBy(){
		
		echo "<script>core.categories =".json_encode($this->categories_model->getCategoriesBy($this->input->get('group_id'))).";</script>";
		
	}
	
	public function getAssetsBy(){
		
		echo "<script>core.categories[".$this->input->get('category_idx')."].assets =".json_encode($this->assets_model->getAssetsBy( $this->input->get('category_id'))).";</script>";
		
	}	

 	
 	public function insertAsset(){
 		
 		echo $this->assets_model->insertAsset( $this->input->post() );
 		
 	}
 	
 	public function editCategory(){
 		
 		$post_array = $this->input->post();
 		
 		$category_id = $post_array['category_id'];
 		unset( $post_array['category_id'] );
 		
 		echo $this->categories_model->editCategory($category_id,  $post_array);
 	}
 	
 	public function insertCategory(){
 		
 		$post_array = $this->input->post(); 
 		
 		echo $this->categories_model->insertCategory($post_array);		
 		
 	}
 	
 	public function editAsset(){
 		
 		$post_array = $this->input->post();
 		
 		$asset_id = $post_array['asset_id'];
 		unset( $post_array['asset_id'] );
 		
 		echo $this->assets_model->editAsset($asset_id,  $post_array);
 		
 	}
 	
 	public function deleteAsset(){
 		
 		$this->assets_model->deleteAsset( $this->input->post() );
 	}
 	
 	public function upload(){
 		
 		$post_array = $this->input->post();

 		$this->upload = new Models_Up_Assets_Model;
 		$this->upload->save( $post_array );
 		
 	} 
 	
 	public function moveAsset(){
 		
 		$post_array = $this->input->post();
 		
 		$asset_id = $post_array['asset_id'];
 		unset( $post_array['asset_id'] ); 		
 		echo $this->assets_model->moveAssetToCategory($asset_id,  $post_array );
 		
 	}
 	
 	public function reorderOneCategory(){
 		
 		$post_array = $this->input->post();
 		
 		$category_id = $post_array['category_id'];
 		unset( $post_array['category_id'] ); 		

 		echo $this->categories_model->reorderOneCategory($category_id, $post_array);
 	}
 	
 	public function reorderCategories(){
 		
 		echo '<pre>';print_r(  $this->categories_model->reorderCategories() );echo '</pre>';  exit;
 		
 	} 	
 	
 	public function reorderOneAsset(){
 		
 		$post_array = $this->input->post();
 		
 		$asset_id = $post_array['asset_id'];
 		unset( $post_array['asset_id'] ); 		
 		
 		$category_id = $post_array['category_id'];
 		unset( $post_array['category_id'] );
 		
 		echo $this->assets_model->reorderOneAsset($asset_id, $category_id, $post_array);
 	}
 	
 	public function reorderAssets(){
 		
 		$post_array = $this->input->post();
 		
 		echo '<pre>';print_r(  $this->assets_model->reorderAssets( $post_array['category_id']) );echo '</pre>';  exit;
 		
 	}
 	
 	public function testPostToIframe(){
 		echo "testing this thing";
 	}
 	
 	
 	public function removeCategoryFromGroup(){
 		
 		echo $this->groups_model->removeCategoryFromGroup( $this->input->post());
 		
 	}
 	
 	public function insertCategoryIntoGroup(){
 		
 		echo $this->groups_model->insertCategoryIntoGroup($this->input->post());		
 		
 	}
}
