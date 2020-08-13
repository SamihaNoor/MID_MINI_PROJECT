<?php
	session_start();
	if((isset($_SESSION['status'])) || (isset($_COOKIE['status'])))
	{
		if($_POST['done'])
		{
			$currPass=$_POST['currPass'];
			$newPass=$_POST['newPass'];
			$rePass=$_POST['rePass'];
			
			$con = mysqli_connect('localhost','root','','minimid');
			if(empty($currPass) || empty($newPass) || empty($rePass))
			{
				echo "null submission";
			}
			else
			{
				$sql = "select password from credentials where userId=".$_SESSION['user']['id']."";
				$data= mysqli_query($con,$sql);
				$p = mysqli_fetch_assoc($data);
				$password = $p['password'];
				if(!strcmp($password,$currPass))
				{
					$sql ="update credentials set password='".$_POST['newPass']."' where userId=".$_SESSION['user']['id']."";
					$re = mysqli_query($con, $sql);
					if($re>0)
					{
						header('location: home.php');
					}
				}
				else
				{
					echo "Passwords didn't match";
				}
			}
		}
		else
		{
			header('location: changepassword.php');
		}
	}
	else
	{
		header('location: login.php');
	}