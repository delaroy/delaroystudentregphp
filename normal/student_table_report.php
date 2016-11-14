	<?php include('dbcon.php'); ?>
	<form action="delete_stud.php" method="post">
	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
		<div class="pull-right">
	 <a href="#" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print List</a> 
	
	</div>
	<br><br>
		<thead>
		<tr>
					<th>Full Name</th>
					<th>Gender</th>
					<th>Class</th>
					<th>Class Fee</th>
					<th>Status</th>
					<th>Transport Route</th>
					<th>Phone Number</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$query = mysql_query("select * from students ")or die(mysql_error());
		while($row = mysql_fetch_array($query)){
			
		$myclass=$row['class'];	
		$id = $row['student_id'];
		
		
		$query2=mysql_query("select * from class where class_name='$myclass' ")or die(mysql_error());
		while($row2 = mysql_fetch_array($query2)){
		$class_fee =$row2['fee'];
		}	
		?>
		<tr>
		<td><?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];?></td> 
		<td><?php echo $row['gender']; ?></td> 
		<td><?php echo $row['class']; ?></td> 
		<td><?php echo $class_fee; ?></td> 
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
		</td>
		<td><?php echo $row['tel']; ?></td>
		</tr>
	<?php } ?>    
	
		</tbody>
	</table>
	</form>