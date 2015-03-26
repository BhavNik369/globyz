<?php
class Api_model extends CI_Model {
    public function __construct(){
        $this->load->database();
    }
    public function get_countries(){
		return $this->db->get('countries')->result_array();
    }
	public function create_users($new_users_insert_data){
		return $this->db->insert('users', $new_users_insert_data);
    }
	
	public function put_post_data($new_post_insert_data){
				
					$this->db->select('*');
					$this->db->from('brand_master');
					$this->db->where('brand_name', $new_post_insert_data['brandName']); 
					$query1 = $this->db->get();
					
					if( $query1->num_rows > 0 ){
							$new_post_insert_data['brandName'] = $query1->first_row()->brand_name;
						}
						else{
							$this->db->insert('brand_master', array('brand_name' => $new_post_insert_data['brandName']));	
						}
		
					$this->db->select('*');
					$this->db->from('generic_master');
					$this->db->where('generic_name', $new_post_insert_data['genericName']); 
					$query2 = $this->db->get();
					
					if( $query2->num_rows > 0 ){
							$new_post_insert_data['genericName'] = $query2->first_row()->generic_name;
						}
						else{
							$this->db->insert('generic_master', array('generic_name' => $new_post_insert_data['genericName']));	
							//$new_product_insert_data['genericName'] = $this->db->insert_generic_name();
						}
		 
		 			$this->db->select('*');
					$this->db->from('form_master');
					$this->db->where('form_name', $new_post_insert_data['formName']); 
					$query3 = $this->db->get();
					if( $query3->num_rows > 0 ){
							$new_post_insert_data['formName'] = $query3->first_row()->form_name;
						}
						else{
							$this->db->insert('form_master', array('form_name'=>$new_post_insert_data['formName']));	
							//$new_product_insert_data['formName'] = $this->db->insert_form_name();
						}
				return $this->db->insert('post', $new_post_insert_data);
	}
	public function get_brands(){
		return $this->db->get('brand_master')->result_array();
    }
	public function get_all(){
		return array($brands_data, $generics_data, $forms_data);
	}
	public function get_generics(){
		return $this->db->get('generic_master')->result_array();
    }
	public function get_forms(){
		return $this->db->get('form_master')->result_array();
    }
	public function verify_users($verify_users_data){
		
		$this->db->select('*');
		$this->db->where($verify_users_data);
		$q = $this->db->get('users');
		 if($q->num_rows() > 0) { 
         	$update_data = array('isVerify' => 1);
			$this->db->where('id', $users_id);
			return $this->db->update('users', $update_data);   
		}	
		else{
			return false;
		}
    }
	public function search_post($search_text){
		$this->db->select('*');
		$this->db->from('post');
		$this->db->like('postTitle', $search_text['search']);
	//	$this->db->where('postTitle', $search_text['search']);
		$query = $this->db->get();
		return $query->result_array(); 
		
	}
	public function display_post($post_details){
		$this->db->select('*');
		$this->db->from('post');
		$this->db->where('id', $post_details);
		$query = $this->db->get();
		return $query->result_array(); 
	}
 }
?>	
	