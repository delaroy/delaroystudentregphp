
					<!-- student payment modal -->
					<div id="<?php echo $stud_id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<form method="post" action="save_fee.php">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					
					<h3 id="myModalLabel">Make Payment for <?php echo $student_name;?> ?</h3>
					</div>
					<div class="modal-body">
					<div class="">
					
					<p>FULL NAME: <strong><?php echo $student_name; ?></strong></p>
					<p>CLASS NAME: <strong><?php echo $myclass; ?></strong></p>
					<input type="hidden" name="student_id" value="<?php echo $stud_id;?>"/>
					<p>CLASS FEE: <strong><?php echo $fee; ?></strong></p>
					<p>STUDENT STATUS: <strong><?php echo $status; ?></strong></p>
					<p>FEE TO PAY: <strong><?php echo $status_fee; ?></strong></p>
					<input type="hidden" name="status_fee" value="<?php echo $status_fee;?>"/>
					<p>Period: <strong>
						<select name ="period" required>
						<option ></option>
						<option  value="janmar">Jan-Mar</option>
						<option value="aprjun">Apr-Jun</option>
						<option value="julsep">Jul-Sep</option>
						<option value="octdec">Oct-Dec</option>
						</select>
					</strong><hr></p>
					<p>RECEIPT NO: <input type="text" name="receipt" required/></p>
					</div>
					</div>
					<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
					<button name="make_payment" class="btn btn-danger"><i class="icon-check icon-large"></i> Yes</button>
					</div>
					</form>
					</div>
					
				
					