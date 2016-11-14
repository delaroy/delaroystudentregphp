   <div class="row-fluid">
   <a href="add_class.php" class="btn btn-inverse"><i class="icon-plus-sign icon-large"></i> Add Class</a>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-pencil icon-large"></i> Edit Class</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php
								$query = mysql_query("select * from class where class_id = '$get_id'")or die(mysql_error());
								$row = mysql_fetch_array($query);
								?>
								<form method="post" id="update_class1_form">
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['class_id']; ?>" name="class_id" id="focusedInput" type="hidden"  required>
                                            <input class="input focused" value="<?php echo $row['class_name']; ?>" name="class_name" id="focusedInput" type="text" placeholder = "Class Name" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <select name="category">
												<option><?php echo $row['category'];?></option>
												<option value ="Nursery">Nursery </option>
												<option value ="Primary">Primary </option>
												<option value ="Secondary">Secondary </option>
												
											</select>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['fee']; ?>"  name="fee" id="focusedInput" type="text" placeholder = "Fees" required>
                                          </div>
                                        </div>
									
										
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i> Update</button>

                                          </div>
                                        </div>
                                </form>
								
													<script>
			jQuery(document).ready(function($){
				$("#update_class1_form").submit(function(e){
					e.preventDefault();
					var _this = $(e.target);
					var formData = $(this).serialize();
					$.ajax({
						type: "POST",
						url: "update_class.php",
						data: formData,
						success: function(html){
							$.jGrowl("Class Successfully  Updated", { header: 'Class Updated' });
							window.location = 'add_class.php';  
						}
					});
				});
			});
			</script>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
		
					
		