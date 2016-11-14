<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
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
                                <div class="muted pull-right">
										<a href="students.php"><i class="icon-arrow-left icon-large"></i> Back</a>
								</div>
                            </div>
                            <div class="block-content collapse in">
												<?php
						$query = mysql_query("select * from students where student_id = '$get_id'")or die(mysql_error());
						$row = mysql_fetch_array($query);
						$cl = $row['class'];
						?>
						<div class="alert alert-success">STUDENT DETAILS</div>
						<div class="span6">
						Name: <strong><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></strong><hr>
						Gender: <strong><?php echo $row['gender']; ?></strong><hr>
						Date Of Birth: <strong><?php echo $row['dob']; ?></strong><hr>
						Address: <strong><?php echo $row['address']; ?></strong><hr>
						Payment Status: <strong><?php echo $row['status']; ?></strong><hr>
						</div>
						<div class="span5">
						Class: <strong><?php echo $row['class']; ?></strong><hr>
						<?php 
						$query2 = mysql_query("select * from class where class_name = '$cl'")or die(mysql_error());
						while ($row1=mysql_fetch_array($query2)){
						$category = $row1['category'];
						$fee = $row1['fee'];
						}?>
						Class Category: <strong><?php echo $category; ?></strong><hr>
						Class Fee: <strong><?php echo $fee; ?></strong><hr>
						Transport: <strong><?php echo $row['transport']; ?></strong><hr>
						Route: <strong><?php echo $row['route']; ?></strong><hr>
						
					
						</div>
<div class="span12">
	<hr>
						<div class="alert alert-success">GUARDIAN DETAILS</div>
	<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
		<thead>
		<tr>
					<th>First Name</th>
					<th>Middle Name</th>
					<th>Last Name</th>
					<th>Relationship to Member</th>
					<th>Telephone No</th>
					<th class="empty"></th>
		</tr>
		</thead>
		<tbody>

		<tr>
		<td><?php echo $row['gfirstname']; ?></td> 
		<td><?php echo $row['gmiddlename']; ?></td> 
		<td><?php echo $row['glastname']; ?></td> 
		<td><?php echo $row['rship']; ?></td> 
		<td><?php echo $row['tel']; ?></td> 
		</tr>
   
	
		</tbody>
	</table>

</div>
							

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