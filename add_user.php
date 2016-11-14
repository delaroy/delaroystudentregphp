   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-plus-sign icon-large"></i> Add User</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post" id="add_user">
										<div class="control-group">
                                          <div class="controls">
										  <label>Status</label>
										  <select name="status" placeholder = "Category">
												<option></option>
												<option value ="administrator">Administrator</option>
												<option value ="normal">Normal</option>
											</select>
                                            
                                          </div>
                                        </div>
										 
										<div class="control-group">
                                          <div class="controls">
										  <label>First Name</label>
                                           <input class="input focused"  name="fname" id="focusedInput" type="text" placeholder = "First Name" required>
                                          </div>
                                        </div>
										
											<div class="control-group">
                                          <div class="controls">
										  <label>Last Name</label>
                                            <input class="input focused"  name="lname" id="focusedInput" type="text" placeholder = "Last Name" required>
                                          </div>
                                        </div>
										

											<div class="control-group">
                                          <div class="controls">
												<button  data-placement="right" title="Click to Save" id="save" name="save" class="btn btn-inverse"><i class="icon-save icon-large"></i> Save</button>
														<script type="text/javascript">
														$(document).ready(function(){
															$('#save').tooltip('show');
															$('#save').tooltip('hide');
														});
														</script>
                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
		<script>
			jQuery(document).ready(function($){
				$("#add_user").submit(function(e){
					e.preventDefault();
					var _this = $(e.target);
					var formData = $(this).serialize();
					$.ajax({
						type: "POST",
						url: "save_user.php",
						data: formData,
						success: function(html){
							$.jGrowl("Class Successfully  Added", { header: 'User Added' });
							window.location = 'users.php';  
						}
					});
				});
			});
			</script>
					