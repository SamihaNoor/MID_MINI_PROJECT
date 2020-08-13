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
		$name = $u['name'];
		$type = $u['type'];
		
		if($type == 1)
		{
?>
			<html>
			<head>
				<title>Home</title>
			</head>
			<body>
				
				<h3>Welcome home <?php echo $name;?></h3><br>
				<a href="profile.php"> Profile</a><br>
				<a href="changepassword.php"> Change Password</a><br>
				<a href="viewusers.php"> View Users</a><br>
				<a href="logout.php"> Logout</a>
			</body>
			</html>


<?php
		}
		else
		{
?>
<html>
			<head>
				<title>Home</title>
			</head>
			<body>
				<h3>Welcome home <?php echo $name;?></h3><br>
				<a href="profile.php"> Profile</a><br>
				<a href="changepassword.php"> Change Password</a><br>
				<a href="logout.php"> Logout</a>
			</body>
			</html>
<?php
		}
		mysqli_close($con);
	}
	else
	{
		header("location: login.php");
	}
?>