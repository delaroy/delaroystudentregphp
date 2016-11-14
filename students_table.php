	<?php include('dbcon.php'); ?>
	<form action="delete_stud.php" method="post">
	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
		<div class="pull-right">
	 <a href="#" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print List</a> 
	<a href="add_student.php" class="btn btn-inverse"><i class="icon-plus-sign icon-large"></i> Add Student</a>
	</div>
	<a data-toggle="modal" href="#student_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i> Delete</a>
	<?php include('modal_delete.php'); ?>
		<thead>
		<tr>
					<th>Full Name</th>
					<th>Gender</th>
					<th>Class</th>
					<th>Status</th>
					<th>Transport Route</th>
					<th class="empty"></th>
					<th class="empty"></th>
		</tr>
		</thead>
		<tbody>
		<?php
		$query = mysql_query("select * from students ")or die(mysql_error());
		while($row = mysql_fetch_array($query)){
		$id = $row['student_id'];
		?>
		<tr>
		<td><?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];?></td> 
		<td><?php echo $row['gender']; ?></td> 
		<td><?php echo $row['class']; ?></td> 
		<td><?php echo $row['status']; ?></td>
		
		<td>
		<?php 
				$transport = $row['transport'];
				if($transport=='yes'){
					$route=$row['route'];
				}else
				if($transport=='no'){
					$route='no transport';
				}
		
		?>
		<?php echo $route; ?></td>
		<td class="empty" width="30"><input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>"></td>
		<td class="empty" width="160">
		<a data-placement="left" title="Click to Edit" id="edit<?php echo $id; ?>" href="edit_stud.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i> Edit</a>
			<script type="text/javascript">
			$(document).ready(function(){
				$('#edit<?php echo $id; ?>').tooltip('show');
				$('#edit<?php echo $id; ?>').tooltip('hide');
			});
			</script>
		<a data-placement="top" title="Click to View all Details" id="view<?php echo $id; ?>" href="view_stud.php<?php echo '?id='.$id; ?>" class="btn btn-warning"><i class="icon-search icon-large"></i> View</a>
			<script type="text/javascript">
			$(document).ready(function(){
				$('#view<?php echo $id; ?>').tooltip('show');
				$('#view<?php echo $id; ?>').tooltip('hide');
			});
			</script>
		</td>
		</tr>
	<?php } ?>    
	
		</tbody>
	</table>
	</form>