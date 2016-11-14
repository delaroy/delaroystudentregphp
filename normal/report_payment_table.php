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
					<th>Status</th>
					<th>Fee To Pay</th>
					<th>Jan-Mar</th>
					<th>Apr-Jun</th>
					<th>Jul-Sep</th>
					<th>Oct-Dec</th>
				
		</tr>
		</thead>
		<tbody>
		<?php
		$query2 = mysql_query("select * from students,janmar,aprjun,julsep,octdec where students.status != 'exempted' AND students.student_id=janmar.student_id AND students.student_id=aprjun.student_id AND students.student_id=julsep.student_id AND students.student_id=octdec.student_id   ")or die(mysql_error());
		while($row2= mysql_fetch_array($query2)){
		$student_name = $row2['firstname'].' '.$row2['middlename'].' '.$row2['lastname'];
		$stud_id =$row2['student_id'];
		$status =$row2['status']; 
		$myclass =$row2['class'];
		
		
		$query4 = mysql_query("select * from janmar where student_id='$stud_id'")or die(mysql_error());
		$row4= mysql_fetch_array($query4);
		$myjanmar=$row4['fee'];
		
		
		$query5 = mysql_query("select * from aprjun where student_id='$stud_id'")or die(mysql_error());
		$row5= mysql_fetch_array($query5);
		$myaprjun=$row5['fee'];
		
		$query6 =mysql_query("select * from julsep where student_id='$stud_id'")or die(mysql_error());
		$row6= mysql_fetch_array($query6);
		$myjulsep=$row6['fee'];
		
		$query7 =mysql_query("select * from octdec where student_id='$stud_id'")or die(mysql_error());
		$row7= mysql_fetch_array($query7);
		$myoctdec=$row7['fee'];
		
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
		<td><?php echo $myclass; ?></td> 
		<td><?php echo $status; ?></td> 
		<td><?php echo $status_fee; ?></td> 
		<td><?php echo $myjanmar; ?></td> 
		<td><?php echo $myaprjun; ?></td> 
		<td><?php echo $myjulsep; ?></td> 
		<td><?php echo $myoctdec; ?></td> 
		</tr>
	  <?php }?>  
	
		</tbody>
	</table>
	</form>