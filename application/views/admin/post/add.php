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
            echo '<strong>Well done!</strong> new post created with success.';
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
      $options_manufacture = array('' => "Select");
      foreach ($users as $row)
      {
        $options_manufacture[$row['id']] = $row['name'];
      }

      //form validation
      echo validation_errors();
      
      echo form_open('admin/post/add', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">Post Title</label>
            <div class="controls">
              <input type="text" id="" name="postTitle" value="<?php echo set_value('postTitle'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">Generic Name</label>
            <div class="controls">
              <input type="text" id="" name="genericName" value="<?php echo set_value('genericName'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Brand Name</label>
            <div class="controls">
              <input type="text" id="" name="brandName" value="<?php echo set_value('brandName'); ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>          
          <div class="control-group">
            <label for="inputError" class="control-label">Form Name</label>
            <div class="controls">
              <input type="text" id="" name="formName" value="<?php echo set_value('formName'); ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Qty</label>
            <div class="controls">
              <input type="text" name="qty" value="<?php echo set_value('qty'); ?>">
              <!--<span class="help-inline">OOps</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Price</label>
            <div class="controls">
              <input type="text" name="price" value="<?php echo set_value('price'); ?>">
              <!--<span class="help-inline">OOps</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Country</label>
            <div class="controls">
              <input type="text" name="country" value="<?php echo set_value('country'); ?>">
              <!--<span class="help-inline">OOps</span>-->
            </div>
          </div> 	
          <div class="control-group">
            <label for="inputError" class="control-label">lot</label>
            <div class="controls">
              <input type="text" name="lot" value="<?php echo set_value('lot'); ?>">
              <!--<span class="help-inline">OOps</span>-->
            </div>
          </div>
          <?php
         /* echo '<div class="control-group">';
            echo '<label for="users_id" class="control-label">Users</label>';
            echo '<div class="controls">';
              //echo form_dropdown('manufacture_id', $options_manufacture, '', 'class="span2"');
              
              echo form_dropdown('users_id', $options_manufacture, set_value('users_id'), 'class="span2"');

            echo '</div>';
          echo '</div">';
          */?>
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <button class="btn" type="reset">Cancel</button>
          </div>
        </fieldset>

      <?php echo form_close(); ?>

    </div>
     