	<?php
include('dbcon.php');
include('session.php');
							
$st_id = $_POST['student_id'];
$st_fee = $_POST['status_fee'];
$st_period = $_POST['period'];
$st_receipt=$_POST['receipt'];


if($st_period=='janmar'){
	$my_period ='janmar';
}elseif($st_period=='aprjun'){
	$my_period ='aprjun';
}elseif($st_period=='julsep'){
	$my_period ='julsep';
}elseif($st_period=='octdec'){
	$my_period ='octdec';
}

mysql_query("update $my_period set fee='$st_fee' where student_id='$st_id'")or die(mysql_error()); 
mysql_query("insert into payment_made(student_id,period,amount,date_of_payment,receipt) values('$st_id','$st_period','$st_fee',NOW(),'$st_receipt')")or die(mysql_error());


?>

<script>
window.location = "fees.php";
</script>  					
