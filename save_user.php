<?php
include('dbcon.php');
include('session.php');
$status= $_POST['status'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $fname.'.'.$lname;

mysql_query("insert into users (username,password,firstname,lastname,status) values('$uname','12345','$fname','$lname','$status')")or die(mysql_error());
mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Add User $uname')")or die(mysql_error());
?>