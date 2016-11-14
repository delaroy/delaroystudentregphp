<?php
include('dbcon.php');
include('session.php');
if (isset($_POST['delete_class'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$query = mysql_query("select * from class where class_id ='$id[$i]'")or die(mysql_error());
	$row = mysql_fetch_array($query);
	$class_name = $row['class_name'];

	mysql_query("insert into activity_log (username,date,action) values('$user_username',NOW(),'Deleted  Class $class_name')")or die (mysql_error());
	mysql_query("DELETE FROM class where class_id='$id[$i]'");
}
header("location: add_class.php");
}
?>