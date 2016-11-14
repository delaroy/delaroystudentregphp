	<?php include('dbcon.php'); ?>
	<form action="" method="post">
	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
		<div class="pull-right">
	 <a href="#" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print List</a> 
	 
	</div>
<br><br>
		<thead>
		<tr>
					<th>Student Name</th>
					<th>Class</th>
					<th>Fee</th>
					<th>Status</th>
					<th>Fee To Pay</th>
				
					<th class="empty"></th>
		</tr>
		</thead>
		<tbody>
		<?php
		$query2 = mysql_query("select * from students where status != 'exempted' ")or die(mysql_error());
		while($row2= mysql_fetch_array($query2)){
		$student_name = $row2['firstname'].' '.$row2['middlename'].' '.$row2['lastname'];
		$stud_id =$row2['student_id'];
		$status =$row2['status']; 
		$myclass =$row2['class'];
		
		$query3 = mysql_query("select * from class where class_name='$myclass' ")or die(mysql_error());
		while($row3= mysql_fetch_array($query3)){
		$fee = $row3['fee'];
		}		
		if($status=='paying'){
			$status_fee =$fee;
		}else
		if($status=='exempted'){
			$status_fee =0;
		}else
		if($status=='half'){
			$status_fee =$fee/2;
		}else
		if($status=='quarter'){
			$status_fee =$fee/4;
		}
		
		?>
		<tr>
		<td><?php echo $student_name; ?></td> 
		<td><?php echo $myclass ; ?></td> 
		<td><?php echo $fee; ?></td> 
		<td><?php echo $status; ?></td> 
		<td><?php echo $status_fee; ?></td> 
	
		<td class="empty" width="250">
		<a data-toggle="modal" href="#<?php echo $stud_id; ?>" id="#<?php echo $stud_id; ?>"class="btn btn-inverse" name=""><i class="icon-money icon-large"></i> Pay</a>
		<?php include('modal_pay.php'); ?>
		<a data-placement="top" title="Click to View all Details" id="view<?php echo $stud_id; ?>" href="view_pay.php<?php echo '?id='.$stud_id; ?>" class="btn btn-warning"><i class="icon-search icon-large"></i> View Payment</a>
			
		</td>
		</tr>
	  <?php }?>  
	
		</tbody>
	</table>
	</form>