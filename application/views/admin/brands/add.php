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
          <a href="#">New</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          Adding <?php echo ucfirst($this->uri->segment(2));?>
        </h2>
      </div>
 
      <?php
      //flash messages
      if(isset($flash_message)){
        if($flash_message == TRUE)
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> new brand created with success.';
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
      /*$options_brands = array('' => "Select");
      foreach ($brands as $row)
      {
        $options_brands[$row['id']] = $row['brand_name'];
      }
	  */

      //form validation
      echo validation_errors();
      
      echo form_open('admin/brands/add', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">Brand Name</label>
            <div class="controls">
              <input type="text" id="" name="brand_name" value="<?php echo set_value('brand_name'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
         <!-- <div class="control-group">
            <label for="inputError" class="control-label">Stock</label>
            <div class="controls">
              <input type="text" id="" name="stock" value="<?php echo set_value('stock'); ?>">
              <!--<span class="help-inline">Cost Price</span>-->
          <!--  </div>
          </div>          
          <div class="control-group">
            <label for="inputError" class="control-label">Cost Price</label>
            <div class="controls">
              <input type="text" id="" name="cost_price" value="<?php echo set_value('cost_price'); ?>">
              <!--<span class="help-inline">Cost Price</span>-->
           <!-- </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Sell Price</label>
            <div class="controls">
              <input type="text" name="sell_price" value="<?php echo set_value('sell_price'); ?>">
              <!--<span class="help-inline">OOps</span>-->
           <!-- </div>
          </div>
          --><?php
           /* echo '<div class="control-group">';
            echo '<label for="users_id" class="control-label">Brands</label>';
            echo '<div class="controls">';
              //echo form_dropdown('manufacture_id', $options_manufacture, '', 'class="span2"');
              
              echo form_dropdown('users_id', $options_users, set_value('users_id'), 'class="span2"');

            echo '</div>';
          echo '</div">';
         */ ?>
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <input type="button" onclick="window.location='<?php echo base_url();?>index.php/admin/brands'" value="Cancle">
          </div>
        </fieldset>

      <?php echo form_close(); ?>

    </div>
     