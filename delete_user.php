<?php
include('dbcon.php');
include('session.php');
if (isset($_POST['delete_user'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$query = mysql_query("select * from users where user_id ='$id[$i]'")or die(mysql_error());
	$row = mysql_fetch_array($query);
	$uname = $row['username'];

	mysql_query("insert into activity_log (username,date,action) values('$user_username',NOW(),'Deleted  user $uname')")or die (mysql_error());
	mysql_query("DELETE FROM users where user_id='$id[$i]'");
}
header("location: users.php");
}
?>