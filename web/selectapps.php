<?php
	session_start();
	include('connect.php');
?>
<html>
<head>
	<title>EVSU-OCC</title>
</head>
<body>
	<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto+Condensed">
  </head>
  <body background="body.png">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<form name="vote" method="post" action="selectapps.php"> 
<table border="0" cellpadding="20" align="center">
  <tr>
    <!--FIRST ROW -->
    <?php
    $query="select * from mobile_app_info LIMIT 0, 5";
    $result=mysql_query($query) or die("Error in query: $query ".mysql_error());
    $i=0;
    while($row=mysql_fetch_array($result)){
    	$i++;
    	echo '<td class="e">
    	<label>
    	<img src="'.$row['mob_pic'].'" alt="'.$row['mob_name'].'" title="'.$row['mob_name'].'" width="80" height="80">
    	<br>
    	<input type="checkbox" name="app[]" id="app" value="'.$row['mob_id'].'" title="'.$row['mob_id'].'"">
    	</label>
    	</td>';
    }
    ?>
</table>
	<input type="submit" name="vote" value="VOTE">
<?php
if(isset($_POST['vote'])){
	foreach($_POST['app'] as $key => $value){
		$gdg = mysql_query("select * from mobile_app_info where mob_id='$value'") or die (mysql_error());
		while($dat=mysql_fetch_array($gdg)){
			$mob_id = $dat['mob_id'];
			$userid = $_SESSION['user_id'];
			$fsdg = mysql_query("insert into vote(user_id,mob_id,vote_date) values('$userid','$mob_id',now())") or die (mysql_error());
		}
	}
}
?>
</form>
  </body>
</html>