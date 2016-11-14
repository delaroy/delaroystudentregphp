<?php
		include('dbcon.php');
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		/* student */
		$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$result = mysql_query($query)or die(mysql_error());
		$row = mysql_fetch_array($result);
		$num_row = mysql_num_rows($result);
		$pass=$row['password'];
		$status =$row['status'];
		
		if( $num_row > 0 ) { 
		session_start();
		$_SESSION['id']=$row['user_id'];
		
		
		if($status=='administrator'){
			echo 'true_admin';	
			mysql_query("insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['user_id'].")")or die(mysql_error());
		}else
		if($status=='normal'){
			echo 'true_user';	
			mysql_query("insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['user_id'].")")or die(mysql_error());
		}
		else{ 
				echo 'false';
		}}	
		?>