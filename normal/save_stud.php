
		<?php
		include('dbcon.php');
		include('session.php');
		
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$address = $_POST['address'];
		$student_class = $_POST['student_class'];
		$gfname = $_POST['gfname'];
		$gmname = $_POST['gmname'];
		$glname = $_POST['glname'];
		$tel = $_POST['tel'];
		$rship = $_POST['rship'];
		$status = $_POST['status'];
		$transport = $_POST['transport'];
		$route = $_POST['route'];

		
		mysql_query("insert into students(firstname,middlename,lastname,gender,dob,address,class,gfirstname,gmiddlename,glastname,rship,tel,status,transport,route)values ('$fname','$mname','$lname','$gender','$dob','$address','$student_class','$gfname','$gmname','$glname','$rship','$tel','$status','$transport','$route')")or die(mysql_error());
		
		mysql_query("insert into activity_log (username,date,action) values('$user_username',NOW(),'Add Student $fname $mname')")or die (mysql_error());
		
		$result = mysql_query("select * from students where firstname='$fname' AND middlename='$mname' AND lastname='$lname' AND tel='$tel' ")or die(mysql_error());
		while($row = mysql_fetch_array($result)){
				$student_id = $row['student_id'];
		}
		$result1 = mysql_query("select * from class where class_name='$student_class'  ")or die(mysql_error());
		while($row1 = mysql_fetch_array($result1)){
				$myfee = $row1['fee'];
		}
		
		if($status=='paying'){
			$status_fee =$myfee;
		}else
		if($status=='exempted'){
			$status_fee =0;
		}else
		if($status=='half'){
			$status_fee =$myfee/2;
		}else
		if($status=='quarter'){
			$status_fee =$myfee/4;
		}
		
		mysql_query("insert into janmar (student_id,class,class_fee,status,status_fee,fee) values('$student_id','$student_class','$myfee','$status','$status_fee','0')")or die (mysql_error());
		mysql_query("insert into aprjun (student_id,class,class_fee,status,status_fee,fee) values('$student_id','$student_class','$myfee','$status','$status_fee','0')")or die (mysql_error());
		mysql_query("insert into julsep (student_id,class,class_fee,status,status_fee,fee) values('$student_id', '$student_class','$myfee','$status','$status_fee','0')")or die (mysql_error());
		mysql_query("insert into octdec (student_id,class,class_fee,status,status_fee,fee) values('$student_id','$student_class','$myfee','$status','$status_fee','0')")or die (mysql_error());
		?>