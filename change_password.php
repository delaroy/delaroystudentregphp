<?php include('header.php'); ?>
<?php include('session.php'); ?>

  <body id="login">
    <div class="container">
		
	<?php
			$query = mysql_query("select * from users where user_id = '$session_id'")or die(mysql_error());
			$row = mysql_fetch_array($query);
								?>		
	
      <form id="change_password" class="form-signin" method="post">
        <h3 class="form-signin-heading"><i class="icon-lock"></i> Change Password</h3>
		<input type="hidden" id="password" name="password" value="<?php echo $row['password']; ?>"  placeholder="Current Password">
		<input type="password" id="current_password" name="current_password"  placeholder="Current Password" required>
        <input type="password" id="new_password" name="new_password" placeholder="New Password" required>
		<input type="password" id="retype_password" name="retype_password" placeholder="Re-type Password" required>
		<br>
		<a href="dashboard.php" title="Click to Edit" "  class="btn btn-inverse">Back</a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;				
        <button  type="submit" data-placement="right" id="save" name="save" class="btn btn-success"><i class="icon-save icon-large"></i> Save</button>
		

			<script>
			jQuery(document).ready(function(){
			jQuery("#change_password").submit(function(e){
					e.preventDefault();
						
						var password = jQuery('#password').val();
						var current_password = jQuery('#current_password').val();
						var new_password = jQuery('#new_password').val();
						var retype_password = jQuery('#retype_password').val();
						if (password != current_password)
						{
						$.jGrowl("Password does not match with your current password  ", { header: 'Change Password Failed' });
						}else if  (new_password != retype_password){
						$.jGrowl("Password does not match with your new password  ", { header: 'Change Password Failed' });
						}else if ((password == current_password) && (new_password == retype_password)){
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "update_password.php",
						data: formData,
						success: function(html){
					
						$.jGrowl("Your password has been changed successfully change", { header: 'Change Password Success' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'dashboard.php'  }, delay);  
						}
					});
					}
				});
			});
			</script>
			</form>
			
			
    </div> <!-- /container -->
<?php include('footer.php'); ?>
<?php include('script.php'); ?>
  </body>
</html>