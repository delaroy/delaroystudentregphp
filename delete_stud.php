<?php
include('dbcon.php');
include('session.php');
if (isset($_POST['delete_student'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$query = mysql_query("select * from students where student_id ='$id[$i]'")or die(mysql_error());
	$row = mysql_fetch_array($query);
	$fname = $row['firstname'];
	$mname = $row['middlename'];
	mysql_query("insert into activity_log (username,date,action) values('$user_username',NOW(),'Deleted Student $fname $mname')")or die (mysql_error());
	mysql_query("DELETE FROM students where student_id ='$id[$i]'");
	mysql_query("DELETE FROM payment_check where student_id ='$id[$i]'");
}
header("location: students.php");
}
?>