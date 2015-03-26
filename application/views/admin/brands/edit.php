 <script>
 	function back(){
	return windows.location="<?php echo base_url();?>index.php/admin/brands";	
	}
 </script>
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
          <a href="#">Update</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          Updating <?php echo ucfirst($this->uri->segment(2));?>
        </h2>
      </div>

 
      <?php
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> product updated with success.';
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
      $options_brands = array('' => "Select");
      foreach ($brands as $row)
      {
        $options_brands[$row['id']] = $row['brand_name'];
      }

      //form validation
      echo validation_errors();

      echo form_open('admin/brands/update/'.$this->uri->segment(4).'', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">Brand Name</label>
            <div class="controls">
              <input type="text" id="" name="brand_name" value="<?php echo $brands[0]['brand_name']; ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
         <!-- <div class="control-group">
            <label for="inputError" class="control-label">Stock</label>
            <div class="controls">
              <input type="text" id="" name="stock" value="<?php echo $brands[0]['stock']; ?>">
              <!--<span class="help-inline">Cost Price</span>-->
          <!--  </div>
          </div>          
          -->
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <input type="button" onclick="window.location='<?php echo base_url();?>index.php/admin/brands'" value="Back">
          </div>
        </fieldset>
	<?php echo form_close(); ?>
   </div>
     