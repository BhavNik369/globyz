<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
					
                <h2>Sign Up</h2>
                <form method="post" action="<?php echo base_url();?>index.php/api/usersignup">
                <input type="text" name="name"  />name<br />
                <!--<input type="text" name="username"  />username<br /> -->
                <input type="text" name="emailId"  />email<br />
                <input type="text" name="password"  />password<br />
                <input type="text" name="deviceId"  />device<br />
                <input type="submit" name="submit" value="submit" />
                </form>
               
                <h2>Sign In</h2>
                <form method="post" action="<?php echo base_url();?>index.php/api/usersignin">
                <input type="text" name="emailId"  />email<br />
                <input type="text" name="password"  />password<br />
                <input type="submit" name="submit" value="submit" />
                </form>
                
                <h2>Add Post Info</h2>
                <form method="post" action="<?php echo base_url();?>index.php/api/putpostinfo" enctype="multipart/form-data">
                <input type="text" name="postTitle"  />postTitle<br />
                <input type="text" name="brandName"  />brandName<br />
				<input type="text" name="genericName"  />genericName<br />
                <input type="text" name="formName"  />formName<br />
                <input type="text" name="dosage"  />dosage<br />
				<input type="text" name="qty"  />qty<br />
                <input type="text" name="currency"  />currency<br />
                <input type="text" name="price"  />price<br />
				<input type="file" name="picture"  />picture<br />
                <input type="text" name="available"  />available<br />
                <input type="text" name="country"  />country<br />
				<input type="text" name="expiryDate"  />expiryDate<br />
                <input type="text" name="lot"  />lot<br />
                <input type="radio" name="postFor" value="sell" checked />Sell
                <input type="radio" name="postFor"  value="buy" />Buy<br />
                <input type="text" name="users_id" />users_id<br />
                <input type="hidden" name="status" value="1"/>
             	<input type="submit" name="submit" value="submit" />
                </form>
                
                <h2>Search Post</h2>
                <form method="post" action="<?php echo base_url();?>index.php/api/postsearch">
                <input type="text" name="search"  />Search<br />
                <input type="submit" name="submit" value="submit" />
                </form>
                
                <h2>Post Details</h2>
                <form method="post" action="<?php echo base_url();?>index.php/api/postdetails">
                <input type="text" name="postName"  />postId<br />
                <input type="submit" name="submit" value="submit" />
                </form>
</body>
</html><?php exit;?>