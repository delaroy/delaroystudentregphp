<?php		
include('dbcon.php');
include('session.php');
$class_id = $_POST['class_id'];
$class_name = $_POST['class_name'];
$category = $_POST['category'];
$fee = $_POST['fee'];

mysql_query("update class set class_name = '$class_name'  , category = '$category' , fee = '$fee'  where class_id = '$class_id' ")or die(mysql_error());
mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Edit Class $class_name')")or die(mysql_error());
?>

