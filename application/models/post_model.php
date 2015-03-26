<?php
class Post_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

    /**
    * Get product by his is
    * @param int $product_id 
    * @return array
    */
    public function get_post_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('post');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
	

    /**
    * Fetch post data from the database
    * possibility to mix search, filter and order
    * @param int $manufacuture_id 
    * @param string $search_string 
    * @param strong $order
    * @param string $order_type 
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_post($users_id=null, $search_string=null, $order=null, $order_type='Asc', $limit_start, $limit_end)
    {
	    $this->db->select('*');
		//$this->db->select('users.name as users_id');
		$this->db->from('post');
		
		if($users_id != null && $users_id != 0){
			$this->db->where('users_id', $users_id);
		}
		if($search_string){
			$this->db->like('postTitle', $search_string);
		}
		
		//$this->db->join('users', 'post.users_id = users.id', 'left');

		//$this->db->group_by('post.id');

		if($order){
			$this->db->order_by($order, $order_type);
		}else{
		    $this->db->order_by('id', $order_type);
			//$this->db->order_by('users_id', $order_type);
		}


		$this->db->limit($limit_start, $limit_end);
		//$this->db->limit('4', '4');
		$query = $this->db->get();
		return $query->result_array(); 	
    }

    /**
    * Count the number of rows
    * @param int $manufacture_id
    * @param int $search_string
    * @param int $order
    * @return int
    */
    function count_post($users_id=null, $search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('post');
		if($users_id != null && $users_id != 0){
			$this->db->where('users_id', $users_id);
		}
		if($search_string){
			$this->db->like('postTitle', $search_string);
		}
		if($order){
			$this->db->order_by($order, 'Asc');
		}else{
		    $this->db->order_by('id', 'Asc');
		}
		$query = $this->db->get();
		return $query->num_rows();        
    }

    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    function store_product($data)
    {
		$insert = $this->db->insert('post', $data);
	    return $insert;
	}

    /**
    * Update product
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_product($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('post', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}

    /**
    * Delete product
    * @param int $id - product id
    * @return boolean
    */
	function delete_product($id){
		$this->db->where('id', $id);
		$this->db->delete('post'); 
	}
 
}?>