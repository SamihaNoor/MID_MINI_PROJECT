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
	<title>View Profile</title>
</head>
	<body>
		<table border="1">
			<tr><td colspan="2" align="center">Profile</td></tr>
			<tr>
				<td>ID</td>
				<td><?php echo $u['id']; ?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><?php echo $u['name']; ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $u['email']; ?></td>
			</tr>		
			<tr>
				<td>User Type</td>
				<td><?php if($u['type'] == 1){echo "Admin";}
											 else { echo "User";}
					?>
				</td>
			</tr>
			<tr><td colspan="2" align="right"><a href="home.php">Go Home</a></td></tr>
		</table>
	</body>
</html>
<?php
	mysqli_close($con);
	}
	else
	{
		header('location: login.php');
	}
?>