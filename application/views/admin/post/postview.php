    <div class="container top">
      
      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li>
          <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>">
            <?php echo ucfirst($this->uri->segment(2));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <a href="#">View Post</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          View <?php echo ucfirst($this->uri->segment(2));?>
        </h2>
      </div>

 
      <?php
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> post updated with success.';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }
      }
      ?>
      
      <?php
      //form data
      $attributes = array('class' => 'form-horizontal', 'id' => '');
      $options_post = array('' => "Select");
      foreach ($users as $row)
      {
        $options_users[$row['id']] = $row['name'];
      }
	  
	   echo form_open('admin/post/update/'.$this->uri->segment(4).'', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">Post Title : </label>
            <label for="inputError" class="control-label" style="text-align:left;margin:0; width:300px;"><?php echo $post[0]['postTitle']; ?></label>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Brand Name : </label>
            <label for="inputError" class="control-label" style="text-align:left;margin:0;width:300px;"><?php echo $post[0]['brandName']; ?></label>
          </div>    
           <div class="control-group">
            <label for="inputError" class="control-label">Generic Name : </label>
            <label for="inputError" class="control-label" style="text-align:left;margin:0;width:300px;"><?php echo $post[0]['genericName']; ?></label>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Form Name : </label>
            <label for="inputError" class="control-label" style="text-align:left;margin:0;width:300px;"><?php echo $post[0]['formName']; ?></label>
          </div>    
           <div class="control-group">
            <label for="inputError" class="control-label">Post For : </label>
            <label for="inputError" class="control-label" style="text-align:left;margin:0;width:300px;"><?php echo $post[0]['postFor']; ?></label>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Quantity : </label>
            <label for="inputError" class="control-label" style="text-align:left;margin:0;width:300px;"><?php echo $post[0]['qty']; ?></label>
          </div>    
           <div class="control-group">
            <label for="inputError" class="control-label">Price : </label>
            <label for="inputError" class="control-label" style="text-align:left;margin:0;width:300px;"><?php echo $post[0]['price']; ?></label>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Dosage : </label>
            <label for="inputError" class="control-label" style="text-align:left;margin:0;width:300px;"><?php echo $post[0]['dosage']; ?></label>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Lot : </label>
            <label for="inputError" class="control-label" style="text-align:left;margin:0;width:300px;"><?php echo $post[0]['lot']; ?></label>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Picture : </label>
            <label for="inputError" class="control-label" style="text-align:left;margin:0;width:300px;"><?php echo $post[0]['picture']; ?></label>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Currency : </label>
            <label for="inputError" class="control-label" style="text-align:left;margin:0;width:300px;"><?php echo $post[0]['currency']; ?></label>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Available : </label>
            <label for="inputError" class="control-label" style="text-align:left;margin:0;width:300px;"><?php echo $post[0]['available']; ?></label>
          </div>          
          <div class="control-group">
            <label for="inputError" class="control-label">Country : </label>
            <label for="inputError" class="control-label" style="text-align:left;margin:0;width:300px;"><?php echo $post[0]['country']; ?></label>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Expiry Date : </label>
            <label for="inputError" class="control-label" style="text-align:left;margin:0;width:300px;"><?php echo $post[0]['expiryDate']; ?></label>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Post Date : </label>
            <label for="inputError" class="control-label" style="text-align:left;margin:0;width:300px;"><?php echo $post[0]['postDate']; ?></label>
          </div>
           <div class="control-group">
            <label for="inputError" class="control-label">Status : </label>
            <label for="inputError" class="control-label" style="text-align:left;margin:0;width:300px;"><?php echo $post[0]['status']; ?></label>
          </div>
         
          <div class="form-actions">
            <?php
				$pageno = $_GET['p'];
			 	echo '<a href="'.site_url("admin").'/post/'.$pageno.'" class="btn btn-info">Back</a></td>'; ?>
          </div>
        </fieldset>

    </div>