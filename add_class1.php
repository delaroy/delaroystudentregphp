   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-plus-sign icon-large"></i> Add Class</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post" id="add_class1">
										<div class="control-group">
                                          <div class="controls">
										  <label>Class Category</label>
										  <select name="category" placeholder = "Category">
												<option></option>
												<option value ="Nursery">Nursery </option>
												<option value ="Primary">Primary </option>
												<option value ="Secondary">Secondary </option>
												
											</select>
                                            
                                          </div>
                                        </div>
										 
										<div class="control-group">
                                          <div class="controls">
										  <label>Class Name</label>
                                           <input class="input focused"  name="class_name" id="focusedInput" type="text" placeholder = "Class Name" required>
                                          </div>
                                        </div>
										
											<div class="control-group">
                                          <div class="controls">
										  <label>Fees Per 3 Months</label>
                                            <input class="input focused"  name="fee" id="focusedInput" type="text" placeholder = "Fees" required>
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
				$("#add_class1").submit(function(e){
					e.preventDefault();
					var _this = $(e.target);
					var formData = $(this).serialize();
					$.ajax({
						type: "POST",
						url: "save_class.php",
						data: formData,
						success: function(html){
							$.jGrowl("Class Successfully  Added", { header: 'Class Added' });
							window.location = 'add_class.php';  
						}
					});
				});
			});
			</script>
					