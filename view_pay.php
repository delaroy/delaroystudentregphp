<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar_fees.php'); ?>
                <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div  id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-right">
										<a href="fees.php"><i class="icon-arrow-left icon-large"></i> Back</a>
								</div>
                            </div>
                            <div class="block-content collapse in">
												<?php
						$query = mysql_query("select * from students where student_id = '$get_id'")or die(mysql_error());
						$row = mysql_fetch_array($query);
						$cl = $row['class'];
						$status = $row['status'];
						?>
						<div class="alert alert-success">PAYMENT DETAILS</div>
						<div class="span6">
						FULL NAME: <strong><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></strong><hr>
						CLASS NAME: <strong><?php echo $cl; ?></strong><hr>
						
						<?php 
						$query3 = mysql_query("select * from class where class_name = '$cl'")or die(mysql_error());
						while ($row3=mysql_fetch_array($query3)){
						$fee = $row3['fee'];
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
						
						
						}?>
												
						CLASS FEE: <strong><?php echo $fee; ?></strong><hr>
						STUDENT STATUS: <strong><?php echo $status; ?></strong><hr>
						FEE TO PAY: <strong><?php echo $status_fee; ?></strong><hr>
						</div>
						
						
						
						
						<div class="span5">
						<?php 
						$query2 = mysql_query("select * from janmar where student_id = '$get_id'")or die(mysql_error());
						while ($row1=mysql_fetch_array($query2)){
						$myfee1 = $row1['fee'];
						}?>
						Jan - March: <strong><?php echo $myfee1; ?></strong><hr>
						
						<?php 
						$query4 = mysql_query("select * from aprjun where student_id = '$get_id'")or die(mysql_error());
						while ($row4=mysql_fetch_array($query4)){
						$myfee2 = $row4['fee'];
						}?>
						
						Apr - Jun: <strong><?php echo $myfee2; ?></strong><hr>
						
						
						<?php 
						$query5 = mysql_query("select * from julsep where student_id = '$get_id'")or die(mysql_error());
						while ($row5=mysql_fetch_array($query5)){
						$myfee5 = $row5['fee'];
						}?>
						
						Jul - Sep: <strong><?php echo $myfee5; ?></strong><hr>
						
						<?php 
						$query6 = mysql_query("select * from octdec where student_id = '$get_id'")or die(mysql_error());
						while ($row6=mysql_fetch_array($query6)){
						$myfee6 = $row6['fee'];
						}?>
						
						Oct - Dec: <strong><?php echo $myfee6; ?></strong><hr>
						
					
						</div>
<div class="span12">
	
						<div ></div>
	

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