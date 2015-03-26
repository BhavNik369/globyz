<!DOCTYPE html> 
<html lang="en-US">
<head>
  <title>CodeIgniter Admin Sample Project</title>
  <meta charset="utf-8">
  <link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container">
	      <a class="brand">globyz</a>
	      <ul class="nav">
	        <li <?php if($this->uri->segment(2) == 'post'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>index.php/admin/post">Post</a>
	        </li>
	        <li <?php if($this->uri->segment(2) == 'users'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>index.php/admin/users">Users</a>
	        </li>
            <li <?php if($this->uri->segment(2) == 'brands'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>index.php/admin/brands">Brands</a>
	        </li>
           <li <?php if($this->uri->segment(2) == 'generics'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>index.php/admin/generics">Generics</a>
	        </li>
           <li <?php if($this->uri->segment(2) == 'forms'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>index.php/admin/forms">Forms</a>
	       </li> 
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">System <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li>
	              <a href="<?php echo base_url(); ?>index.php/admin/logout">Logout</a>
	            </li>
	          </ul>
	        </li>
	      </ul>
	    </div>
	  </div>
	</div>	
