<?php
class Test extends CI_Controller {

    
    public function index()
    {
		//$data['main_content'] = 'admin/generics/list';
        $this->load->view('admin/test/data');  
		
		
    }
}
?>