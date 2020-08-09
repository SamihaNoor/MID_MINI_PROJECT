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
					$user = [
						'id'=>$id,
						'name'=>$name,
						'email'=>$email,
						'password'=>$password,
						'type'=>$type,
					];

					$_SESSION['user']=$user;
					
					//setcookie('user', $user, time()+3600,'/');
					
					/*$_COOKIE['id'] = $id;
					$_COOKIE['password']= $password;
					
					/*setcookie('username', $uname, time()+3600, '/');
					setcookie('password', $password, time()+3600, '/');*/
						
					mysqli_close($con);
					
					header("location: login.html");
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
		header("location: login.html");
	}
?>