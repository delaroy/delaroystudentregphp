<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar_students.php'); ?>
                <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div  id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-pencil icon-large"></i> Edit Student</div>
                                <div class="muted pull-right"><a href="students.php"><i class="icon-arrow-left icon-large"></i> Back</a></div>
                            </div>
                            <div class="block-content collapse in">
						<?php
						$query = mysql_query("select * from students where student_id = '$get_id'")or die(mysql_error());
						$row = mysql_fetch_array($query);
						?>
						<form id="update_student" class="form-signin" method="post">
						<!-- span 4 -->
										<div class="span4">
										<input type="hidden" value="<?php echo $row['student_id']; ?>" class="input-block-level"  name="student_id" required>
										<label>PAYMENT STATUS:</label>
											<select name="status" class="span5" required>
													<option><?php echo $row['status']; ?></option>
													<option value="paying">Paying</option>
													<option value ="exempted">Exempted</option>
													<option value="half">Half</option>
													<option value="quarter">Quarter</option>
												</select>
										<label>FIRST NAME:</label>
											<input type="text" class="input-block-level"  name="fname" value="<?php echo $row['firstname']; ?>" required>
											<label>MIDDLE NAME:</label>
											<input type="text" class="input-block-level"  name="mname"     value="<?php echo $row['middlename']; ?>"     required>
											<label>LAST NAME:</label>
											<input type="text" class="input-block-level"  name="lname"  value="<?php echo $row['lastname']; ?>"  required>
											<label>GENDER:</label>
												<select name="gender" class="span5" required>
													<option><?php echo $row['gender']; ?></option>
													<option>Male</option>
													<option>Female</option>
												</select>
										</div>		
						<div class="span4">
							<label>DATE OF BIRTH:</label>
									<input type="date" class="input-block-level"  name="dob" value="<?php echo $row['dob']; ?>">
							<label>ADDRESS:</label>
									<input type="text" value="<?php echo $row['address']; ?>" name="address" class="my_message" required>
							<label>CLASS:</label>		
									<select name="student_class" class="span5" required>
									<option> <?php echo $row['class'];?></option>
										<?php 
											$result = mysql_query("select * from class ")or die(mysql_error());
											while($row1 = mysql_fetch_array($result)){
											$myclass = $row1['class_name'];			
									     ?>
								<option value="<?php echo $myclass;?>"> <?php echo $myclass;?> </option>
									<?php }?>
							</select>
							<dt><label>TRANSPORT:</label></dt>
											<dd><label class="radio-inline"><input type="radio" name="transport" value="yes" checked='true'> Yes </label></dd>
											<dd><label class="radio-inline"><input type="radio" name="transport" value="no"> No</label></dd>
										
									<label>ROUTE:</label>
											<input type="text" value="<?php echo $row['route']; ?>"" name="route" class="my_message">
									
									<br>
									<br>
							<button class="btn btn-success" name="update"><i class="icon-save icon-large"></i> Update</button>
						</div>
						<!--end span 4 -->	
						<!-- span 4 -->	
						<div class="span4">
							<label>GUARDIAN FIRSTNAME:</label>
							<input type="text" class="input-block-level"  name="gfname" value="<?php echo $row['gfirstname']; ?>" required>
							<label>GUARDIAN MIDDLENAME:</label>
							<input type="text" class="input-block-level"  name="gmname" value="<?php echo $row['gmiddlename']; ?>" required>
							<label>GUARDIAN LASTNAME:</label>
							<input type="text" class="input-block-level"  name="glname" value="<?php echo $row['glastname']; ?>" required>
							<label>RELATIONSHIP TO STUDENT:</label>
							<input type="text" class="input-block-level"  name="rship" value="<?php echo $row['rship']; ?>" required>
							<label>PHONE NUMBER:</label>
							<input type="text" class="input-block-level"  name="tel" value="<?php echo $row['tel']; ?>" onkeydown='return(event.which >= 48 && event.which <= 57)
											|| event.which ==8 || event.which == 46' maxlength ="10" required>
						</div>
						<!--end span 4 -->
						<div class="span12"><hr></div>		
							</form>			
								<script>
									jQuery(document).ready(function($){
										$("#update_student").submit(function(e){
											e.preventDefault();
											var _this = $(e.target);
											var formData = $(this).serialize();
											$.ajax({
												type: "POST",
												url: "update_student.php",
												data: formData,
												success: function(html){
													$.jGrowl("Member Successfully  Updated", { header: 'Student Updated' });
													window.location = 'students.php';
												}
											});
										});
									});
								</script>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>	
</html>