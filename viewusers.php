<?php
	session_start();
	if((isset($_SESSION['status'])) || (isset($_COOKIE['status'])))
	{
		$type = $_COOKIE['type'];
	if(($type == 1) || ($_SESSION['user']['type'] == 1))
		{
			$con = mysqli_connect('localhost','root','','minimid');
			$sql= "select * from users";
			$data= mysqli_query($con,$sql);
			
?>
<html>
<head>
	<title>View Profile</title>
</head>
	<body>
		<table border="1">
			<tr><td colspan="4" align="center">Users</td></tr>
				<td>Id</td>
				<td>Name</td>
				<td>Email</td>
				<td>User Type</td>
			<tr>
			<?php 
			while($u = mysqli_fetch_assoc($data))
			{ ?>
			<tr>
				<td><?php echo $u['id']; ?></td>
				<td><?php echo $u['name']; ?></td>
				<td><?php echo $u['email']; ?></td>
				<td><?php if($u['type'] == 1){echo "Admin";}
											 else { echo "User";}
					?>
				</td>
			</tr>
			<?php 
			} ?>
			<tr><td colspan="4" align="right"><a href="home.php">Go Home</a></td></tr>
		</table>
	</body>
</html>
<?php
		}
		else
		{
			header('location: home.php');
		}
	}
	else
	{
		header('location: login.php');
	}
?>