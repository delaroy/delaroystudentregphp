<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar_dashboard.php'); ?>
                <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div  id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-plus-sign icon-large"></i> Add Student</div>
                                <div class="muted pull-right"><a id="return" data-placement="left" title="Click to Return" href="students.php"><i class="icon-arrow-left icon-large"></i> Back</a></div>
																<script type="text/javascript">
																$(document).ready(function(){
																	$('#return').tooltip('show');
																	$('#return').tooltip('hide');
																});
																</script>                          
						    </div>
                            <div class="block-content collapse in">						
						<form id="add_student" class="form-signin" method="post">
						<!-- span 4 -->
										<div class="span4">
										
											<label>PAYMENT STATUS:</label>
											<select name="status" class="span5" required>
													<option></option>
													<option value="paying">Paying</option>
													<option value ="exempted">Exempted</option>
													<option value="half">Half</option>
													<option value="quarter">Quarter</option>
												</select>
											<label>FIRST NAME:</label>
											<input type="text" class="input-block-level"  name="fname" placeholder="First Name" required>
											<label>MIDDLE NAME:</label>
											<input type="text" class="input-block-level"  name="mname"     placeholder="Middle Name"     required>
											<label>LAST NAME:</label>
											<input type="text" class="input-block-level"  name="lname"  placeholder="Last Name"  required>
											<label>GENDER:</label>
												<select name="gender" class="span5" required>
													<option></option>
													<option>Male</option>
													<option>Female</option>
												</select>								
										</div>
						<!-- span 4 -->				
						<!-- span 4 -->				
						<div class="span4">
											
											<label>DATE OF BIRTH:</label>
											<input type="date" class="input-block-level"  name="dob" placeholder="Date of Birth">
											<label>ADDRESS:</label>
											<input type="text" Placeholder="Permanent Address" name="address" class="my_message" required>
											<label>CLASS:</label>		
											<select name="student_class" class="span5" required>
											<option></option>
											<?php 
											$result = mysql_query("select * from class ")or die(mysql_error());
											while($row = mysql_fetch_array($result)){
											$myclass = $row['class_name'];			
									?>
								<option value="<?php echo $myclass;?>"> <?php echo $myclass;?> </option>
									<?php }?>
							</select>
							
									<dt><label>TRANSPORT:</label></dt>
											<dd><label class="radio-inline"><input type="radio" name="transport" value="yes" checked='true'> Yes </label></dd>
											<dd><label class="radio-inline"><input type="radio" name="transport" value="no"> No</label></dd>
										
									<label>ROUTE:</label>
											<input type="text" Placeholder="Route Name" name="route" class="my_message">
									<br>
									<br>
									<button class="btn btn-success" name="save"><i class="icon-save icon-large"></i> Save </button>	
											
						</div>
						<!--end span 4 -->	
						<!-- span 4 -->	
						<div class="span4">
									
							<label>GUARDIAN FIRSTNAME:</label>
							<input type="text" class="input-block-level"  name="gfname" placeholder="First Name" required>
							<label>GUARDIAN MIDDLENAME:</label>
							<input type="text" class="input-block-level"  name="gmname" placeholder="Middle Name" required>
							<label>GUARDIAN LASTNAME:</label>
							<input type="text" class="input-block-level"  name="glname" placeholder="Last Name" required>
							<label>RELATIONSHIP TO STUDENT:</label>
							<input type="text" class="input-block-level"  name="rship" placeholder="Relationship To Student" required>
							<label>PHONE NUMBER:</label>
							<input type="text" class="input-block-level"  name="tel" placeholder="Telephone No" onkeydown='return(event.which >= 48 && event.which <= 57)
											|| event.which ==8 || event.which == 46' maxlength ="10" required>
						</div>
						<!--end span 4 -->
						</form>						
			<script>
			jQuery(document).ready(function($){
				$("#add_student").submit(function(e){
					e.preventDefault();
					var _this = $(e.target);
					var formData = $(this).serialize();
					$.ajax({
						type: "POST",
						url: "save_stud.php",
						data: formData,
						success: function(html){
							$.jGrowl("Student Successfully  Added", { header: 'Student Added' });
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