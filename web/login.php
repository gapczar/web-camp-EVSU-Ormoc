<?php
	session_start();
	include('connect.php');
?>
<html>
<head>
	<title>EVSU-OCC</title>
</head>
<body>
<form type="input" method="post" action="login.php">
	<input type="text" name="username" autocomplete="off" />
	<input type="password" name="password"/>
	<input type="submit" name="login" value="Login">
	<a href="signup.php">Sign up</a>
	<?php
	if(isset($_POST['login'])){
		$user=$_POST['username'];
		$pass=$_POST['password'];
		$query="select * from user_info where user_name='$user' && pass='$pass'";
		//$query1="select * from admin where user='$username' and pass='$pass";
		$result=mysql_query($query) or die("Error in query: $query ".mysql_error());
		//$result1=mysql_query($query1) or die("Error in query: $query ".mysql_error());
		if(mysql_num_rows($result)>0){
			$row=mysql_fetch_array($result);
			$un=$row['user_name'];
			$pw=$row['pass'];
			$_SESSION['user_id'] = $row['user_id'];
			if($user==$un && $pass==$pw){
				$_SESSION['user_id'] = $row['user_id'];
				echo '<script>window.location="main.php"</script>';
			}
		}else{
			echo '<br/>Invalid username and password';
		}
	}
	?>
</form>
</body>
</html>