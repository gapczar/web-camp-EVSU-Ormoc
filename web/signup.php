
<html>
<?php
	include('connect.php');
?>
<head>
	<title>EVSU-OCC</title>
</head>
<body>
<form method="post" action="signup.php">
	First name<input type="text" name="name" autocomplete="off" /><br/>
	Middle name<input type="text" name="middle" autocomplete="off" /><br/>
	Last name<input type="text" name="last" autocomplete="off" /><br/>
	Username<input type="text" name="username" autocomplete="off" /><br/>
	Password<input type="password" name="password" /><br/>
	Email Address<input type="text" name="email" autocomplete="off" /><br/>
	<input type="submit" name="signup" value="Sign up">
	<?php
	if(isset($_POST['signup'])){
		$fname=$_POST['name'];
		$mname=$_POST['middle'];
		$lname=$_POST['last'];
		$user=$_POST['username'];
		$pass=$_POST['password'];
		$email=$_POST['email']; 
		$query="select * from user_info where name='$fname' or (middle='$mname' and last='$lname' and user_name='$user' and pass='$pass') or email='$email'";
		$result=mysql_query($query) or die("Error in query: $query ".mysql_error());
	
		if(mysql_num_rows($result)>0){
			echo "Account already registered.";
		}else{
			$query="insert into user_info(name,middle,last,user_name,pass,email) values( '$fname' , '$mname' ,'$lname' , '$user' , '$pass' , '$email')";
			$result=mysql_query($query) or die("Error in query: $query ".mysql_error());
			echo "<meta http-equiv='refresh' content='0; url=main.php'>";
		}
	}
	?>
</form>
</body>
</html>