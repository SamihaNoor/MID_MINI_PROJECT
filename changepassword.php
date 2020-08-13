<?php
	session_start();
	if((isset($_SESSION['status'])) || (isset($_COOKIE['status'])))
	{
		$con = mysqli_connect('localhost','root','','minimid');
		if(isset($_SESSION['status']))
		{
			$sql= "select * from users where id='".$_SESSION['user']['id']."'";
			$data= mysqli_query($con,$sql);
			
		}
		else if(isset($_COOKIE['status']))
		{
			$sql= "select * from users where id='".$_COOKIE['id']."'";
			$data= mysqli_query($con,$sql);
		}
		$u = mysqli_fetch_assoc($data);
?>
<html>
<head>
	<title>Change Password</title>
</head>
	<body>
		<form action="chnp.php" method="post">
			<table border="1">
				<tr><td colspan="2" align="center">Change Password</a></td></tr>
				<tr>
					<td>Current Password</td>
					<td><input type="password" name="currPass"></td>
				</tr>
				<tr>
					<td>New Password</td>
					<td><input type="password" name="newPass"></td>
				</tr>
				<tr>
					<td>Re-type Password</td>
					<td><input type="password" name="rePass"></td>
				</tr>			
				<tr>
					<td align="right"><input type="submit" name="done" value="Done"></td> 
					<td align="right"><a href="home.php">Go Home</a></td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php
	}
	else
	{
		header('location: login.php');
	}
?>