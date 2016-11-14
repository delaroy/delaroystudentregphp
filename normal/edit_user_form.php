   <div class="row-fluid">
       <a href="class.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Edit User</a>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Edit User </div>
                            </div>
							<?php
							$query = mysql_query("select * from users where user_id = '$get_id'")or die(mysql_error());
							$row = mysql_fetch_array($query);
							?>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
										  <label>Status</label>
										  <select name="status" placeholder = "Category">
												<option><?php echo $row['status'];?></option>
												<option value ="administrator">Administrator</option>
												<option value ="normal">Normal</option>
											</select>
                                            
                                          </div>
                                        </div>
								
								
										<div class="control-group">
                                          <div class="controls">
                                            <input name="fname" value="<?php echo $row['firstname']; ?>" class="input focused" id="focusedInput" type="text" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input name="lname" value="<?php echo $row['lastname']; ?>" class="input focused" id="focusedInput" type="text" required>
                                          </div>
                                        </div>
										
									
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div><?php
if (isset($_POST['update'])){
$status= $_POST['status'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $fname.'.'.$lname;

mysql_query("update users set username = '$uname',firstname ='$fname', lastname='$lname',status='$status' where user_id = '$get_id' ")or die(mysql_error());
?>

<script>
window.location = "users.php";
</script>
<?php

}
?>