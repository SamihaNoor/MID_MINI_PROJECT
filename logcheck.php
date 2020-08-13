<?php
	session_start();

	if(isset($_POST['submit']))
	{
		$userId = $_POST['id'];
		$password 	= $_POST['password'];

		if(empty($userId) || empty($password))
		{
			echo "null submission";
		}
		else
		{
			$con = mysqli_connect('localhost','root','','minimid');
			$sql= "select * from credentials where userId=".$userId." and password='".$password."'";
			$data= mysqli_query($con,$sql);
			$u = mysqli_fetch_assoc($data);
			
			if(isset($_SESSION['user']) || (isset($_COOKIE['id']) && isset($_COOKIE['password'])) || (count($u)>0))
			{
				if(($userId == $_SESSION['user']['id'] && $password == $_SESSION['user']['password']) ||
					($userId == $_COOKIE['id'] && $password == $_COOKIE['password']) ||
					(count($u)>0))
				{
					$sql= "select * from users where id=".$userId."";
					$data= mysqli_query($con,$sql);
					$ad = mysqli_fetch_assoc($data);
			
					$user = [
						'id'=>$ad['id'],
						'name'=>$ad['name'],
						'email'=>$ad['email'],
						'password'=>$_POST['password'],
						'type'=>$ad['type'],
					];

					$_SESSION['user']=$user;
					
					$_SESSION['status']  = "Ok";
					
					if(isset($_POST['rememberme']))
					{
						setcookie('id', $userId, time()+3600, '/');
						setcookie('password', $password, time()+3600, '/');
						setcookie('type', $ad['type'], time()+3600, '/');
						setcookie('status', "OK", time()+3600, '/');
					}
					header('location: home.php');
				}
				else
				{
					echo "Please check your User Id or Password again";
				}
			}
			else
			{
				header("location: login.php");
			}
		}
	}
	else
	{
		header("location: login.php");
	}
?>