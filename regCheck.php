<?php
	session_start();

	if(isset($_POST['submit'])){

		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirmpassword = $_POST['confirmpassword'];
		$id = $_POST['id'];
		$type = $_POST['type'];

		if(empty($name) || empty($password) || empty($email) || empty($id) || empty($confirmpassword) || empty($type)){
			echo "null submission";
		}else
		{
			$con = mysqli_connect('localhost','root','','minimid');
			$sql = "INSERT INTO users (id,name,email, type) VALUES (".$id.",'".$name."','".$email."',".$type.")";
			$res = mysqli_query($con, $sql);
			if($res)
			{
				
				$q = "insert into credentials (userId, password, type) values ('".$id."','".$password."',".$type.")";
				$result = mysqli_query($con, $q);
				
				if($result)
				{
					$_SESSION['id']=$id;
					mysqli_close($con);
					header("location: login.php");
				}
				else
				{
					echo "cre";
				}
			}
			else
			{
				echo "ad";
			}
		}
	}else{
		header("location: reg.html");
	}
?>