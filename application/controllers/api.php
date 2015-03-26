<?php
class Api extends CI_Controller {	
	function __construct(){
	 	parent::__construct();
		$this->load->model('api_model');
		
		global $format;
		$format = 'json';
		define("POST_IMAGE_PATH","upload/postimage/");
	}
	public function index(){}
	
	public function getcountries(){
		global $format;
		$countries_data=$this->api_model->get_countries();
		if($format == 'json') {
			@header('Content-type: application/json');
			echo json_encode(array('status'=>1, 'CountryList'=>$countries_data));
		}
		exit;		
	}
	
	public function getall(){
		global $format;
		$brands_data=$this->api_model->get_brands();
		$generics_data=$this->api_model->get_generics();
		$forms_data=$this->api_model->get_forms();
		if($format == 'json') {
			@header('Content-type: application/json');
			echo json_encode(array('status'=>1, 'BrandList'=>$brands_data,'GenericList'=>$generics_data,'FormList'=>$forms_data));
		}
		exit;		
	}
	
/*	public function getgenerics(){
		global $format;
		$generics_data=$this->api_model->get_generics();
		if($format == 'json') {
			header('Content-type: application/json');
			echo json_encode(array('status'=>1, 'GenericList'=>$generics_data));
		}
		exit;		
	}
	
	public function getforms(){
		global $format;
		$forms_data=$this->api_model->get_forms();
		if($format == 'json') {
			header('Content-type: application/json');
			echo json_encode(array('status'=>1, 'FormList'=>$forms_data));
		}
		exit;		
	}
	*/
	public function usersignin(){		
		global $format;		
		$this->db->where(array('emailId' => $this->input->post('emailId'), 'password' => md5($this->input->post('password'))));
		$query = $this->db->get('users');
        if($query->num_rows > 0){
			
			$isVerify = $query->first_row()->isVerify;
			if ( $isVerify == '0' )
			{
				$status = 0;
				$users_id = 0;
				$msg = "Please verify your account";
			}
			else{
				$status = 1;
				$msg = "You are logged in successfully.";
				$users_id = $query->first_row()->id;
			}
		}else{
			$status = 0;
			$users_id = 0;
			$msg = "Incorrect username or password.";
		}		
		if($format == 'json') 
		{
			@header('Content-type: application/json');
			echo json_encode(array('status'=>$status,'msg'=>$msg,'users_id'=>$users_id));
		}
		exit;
	}
	
	public function usersignup(){		
		global $format;
		
		$this->db->where('emailId', $this->input->post('emailId'));
		$query = $this->db->get('users');
        if($query->num_rows > 0){
			$status = 0;
			$msg = "Email Address already in use.";	
		}else{
			
			$vCode = str_rand(15);
			
			$new_users_data = array(
				'name' => $this->input->post('name'),
				'emailId' => $this->input->post('emailId'),			
				//'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'verifyCode' => $vCode,
				'deviceId' => $this->input->post('deviceId'),
				//'isVerify' => '0',
				'isVerify' => '1',					
			);
			
			if($this->api_model->create_users($new_users_data)){
		   		$status = 1;
				$msg = "You have successfully registered.";
				$users_id=$this->db->insert_id();
				
				$emailId = $this->input->post('emailId');
				
				$vUrl = base_url()."index.php/api/verify/".$users_id."/".$vCode;
				
				$this->load->library('email');
				
				$this->email->to($emailId);
    			$this->email->from('support@globyz.com');
    			$this->email->subject('Globyz verification');
    			$this->email->message('<p>Thanks for registration..</p><p>From<br/>Globyz Team</p>');
   	 			$this->email->send();
				
				
			}else{
				$status = 0;
				$msg = "Something wrong. Please try again.";	
			}
		}		
		if($format == 'json') 
		{
			@header('Content-type: application/json');
			echo json_encode(array('status'=>$status,'msg'=>$msg,'users_id'=>$users_id));
		}
		exit;
	}
	public function verify($users_id,$vCode){	
		
		global $format;
		$select_data = array('id'=>$users_id , 'verifyCode'=>$vCode , 'isVerify'=>0);
		
			if($this->api_model->verify_users($select_data)){
				$status = 1;
				$msg = "Your account successfully verify";
			}else{
				$status = 0;
				$msg = "Something wrong. Please try again.";	
			}
		if($format == 'json') 
		{
			@header('Content-type: application/json');
			echo json_encode(array('status'=>$status,'msg'=>$msg,'users_id'=>$users_id));
		}
		exit;
	}
	public function putpostinfo(){		
		global $format;
		$upload_image= "";
		if($_FILES['picture']['name']!=''){
			//$uploaded_image = update_pic();
			$target_path = POST_IMAGE_PATH;
			
			$upload_image = rand(2,time()).$_FILES['picture']['name'];
			
			$target_path = $target_path.$upload_image;
			
			if(!move_uploaded_file($_FILES['picture']['tmp_name'], $target_path)) { 
				@header('Content-type: application/json');
				echo json_encode(array('status'=>0,'msg'=>"Image could not uploaded. Please try again."));exit;
			}
		}
			
			$put_post_info = array(
				'postTitle' => $this->input->post('postTitle'),
				'brandName' => $this->input->post('brandName'),
				'genericName' => $this->input->post('genericName'),
				'formName' => $this->input->post('formName'),
				'dosage' => $this->input->post('dosage'),
				'qty' => $this->input->post('qty'),
				'currency' => $this->input->post('currency'),
				'price' => $this->input->post('price'),
				'picture' => $upload_image,
				'available' => $this->input->post('available'),
				'country' => $this->input->post('country'),
				'expiryDate' => $this->input->post('expiryDate'),
				'lot' => $this->input->post('lot'),
				'postFor' => $this->input->post('postFor'),
				'users_id' => $this->input->post('users_id'),
				'status' => $this->input->post('status'),
				
			);
			$check_new=array('brandName' => $this->input->post('brandName'),
				'genericName' => $this->input->post('genericName'),
				'formName' => $this->input->post('formName'),);
				
			if($this->api_model->put_post_data($put_post_info)){
		   		$status = 1;
				$msg = "Information is successfully stored in database.";
			}else{
				$status = 0;
				$msg = "Something wrong. Please try again.";	
			}
				
		if($format == 'json') 
		{
			@header('Content-type: application/json');
			echo json_encode(array('status'=>$status,'msg'=>$msg));
		}
		exit;
	}	
	
	public function postsearch(){
		global $format;
		$search_text = array('search' => $this->input->post('search') );
		//$searched_products = $this->api_model->search_products($search_text);
		
		if($this->api_model->search_post($search_text)){
			$status = 1;
			$searched_post = $this->api_model->search_post($search_text);
			
		}else{
			$status = 0;
			$searched_post = null ;	
		}
		
		if($format == 'json') {
			@header('Content-type: application/json');
			echo json_encode(array('status'=>$status, 'searchedData'=>$searched_post));
		}
		exit;		
	}
	public function postdetails($id){
		global $format;
		if($this->api_model->display_post($id)){
			$status = 1;
			$post_display = $this->api_model->display_post($id);
			
		}else{
			$status = 0;
			$post_display= null ;	
		}
			
		if($format == 'json') {
			@header('Content-type: application/json');
			echo json_encode(array('status'=>$status, 'postDetails'=>$post_display));
		}
		exit;		
	}
}
function str_rand($length = 15, $seeds = 'alphanum')
 {
  // Possible seeds
  $seedings['alpha'] = 'abcdefghijklmnopqrstuvwqyz';
  $seedings['numeric'] = '0123456789';
  $seedings['alphanum'] = 'abcdefghijklmnopqrstuvwqyz0123456789';
  $seedings['hexidec'] = '0123456789abcdef';
  
  // Choose seed
  if (isset($seedings[$seeds]))
  {
   $seeds = $seedings[$seeds];
  }
  
  // Seed generator
  list($usec, $sec) = explode(' ', microtime());
  $seed = (float) $sec + ((float) $usec * 100000);
  mt_srand($seed);
  
  // Generate
  $str = '';
  $seeds_count = strlen($seeds);
  
  for ($i = 0; $length > $i; $i++)
  {
   $str .= $seeds{mt_rand(0, $seeds_count - 1)};
  }
  
  return $str;
 }