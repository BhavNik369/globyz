<?php
 $ci =&get_instance();
   $ci->load->model('Users_model');
 //	$this->load->model('Users_model');
  //  $this->db->reconnect();
?>
    <div class="container top">
      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <?php echo ucfirst($this->uri->segment(2));?>
        </li>
      </ul>
      <div class="page-header users-header">
        <h2>
          <?php echo ucfirst($this->uri->segment(2));?> 
         <!-- <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a> -->
        </h2>
      </div>
      
      <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
           $pageno =  $this->uri->segment(3) ;          
			
			$options_users = array(0 => "all");
            foreach ($users as $row)
            {
              $options_users[$row['id']] = $row['name'];
            }
			//var_dump($users);
			
            //save the columns names in a array that we will use as filter         
            $options_post = array();    
            foreach ($post as $array) {
              foreach ($array as $key => $value) {
                $options_post[$key] = $key;
              }
			  
			  
			 // var_dump($options_post);
              break;
            }

            echo form_open('admin/post', $attributes);
     
              echo form_label('Search:', 'search_string');
              echo form_input('search_string', $search_string_selected, 'style="width: 170px;
height: 26px;"');

              echo form_label('Filter by users:', 'users_id');
              echo form_dropdown('users_id', $options_users, $users_selected, 'class="span2"');

              echo form_label('Order by:', 'order');
              echo form_dropdown('order', $options_post, $order, 'class="span2"');
			
              $data_submit = array('name' => 'mysubmit', 'class' => 'btn btn-primary', 'value' => 'Go');

              $options_order_type = array('Asc' => 'Asc', 'Desc' => 'Desc');
              echo form_dropdown('order_type', $options_order_type, $order_type_selected, 'class="span1"');

              echo form_submit($data_submit);

            echo form_close();
			?>

          </div>

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">#</th>
                <th class="red header">Post Title</th>
                <th class="red header">User Name</th>
                <th class="yellow header headerSortDown">Generic</th>
                <th class="green header">Brand</th>
                <th class="red header">Form</th>
                <th class="green header">Dosage</th>
                <th class="red header">Qty</th>
                <!--<th class="red header">Price</th>
                <th class="red header">country</th>
                --><th class="red header">postFor</th>
                <th class="red header">postDate</th>
              </tr>
            </thead>
            <tbody>
              <?php
              
				  
			  foreach($post as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['postTitle'].'</td>';
				echo '<td>'.$ci->Users_model->getusersname($row['users_id'])->name.'</td>';
				echo '<td>'.$row['genericName'].'</td>';
                echo '<td>'.$row['brandName'].'</td>';
				echo '<td>'.$row['formName'].'</td>';
                echo '<td>'.$row['dosage'].'</td>';
                echo '<td>'.$row['qty'].'</td>';
                //echo '<td>'.$row['price'].'</td>';
				//echo '<td>'.$row['country'].'</td>';
                echo '<td>'.$row['postFor'].'</td>';
				echo '<td>'.$row['postDate'].'</td>';
				echo '<td>';
			    echo '<a href="'.site_url("admin").'/post/postview/'.$row['id'].'?p='.$pageno.'" class="btn btn-info">view</a></td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>
    </div>