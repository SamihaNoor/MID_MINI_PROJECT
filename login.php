<?php
	session_start();
		if((isset($_SESSION['status'])) || (isset($_COOKIE['status'])))
		{
			header("location: home.php");
		}
		else
		{
?>
			<!DOCTYPE html>
			<html>
			<head>
				<title>Login</title>
			</head>
			<body>
				<form action="logcheck.php" method="post">
					<fieldset>
						<legend>Login</legend>
					
					<table>
						<tr>
							<td>User Id</td>
							<td><input type="number" name="id"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="password"></td>
						</tr>
						<tr><td colspan="2" align="left"><input type="checkbox" name="rememberme" value='1'>Remember Me</td></tr>
						<tr>
							<td><input type="submit" name="submit" value="Login"></td>
							<td><a href="reg.html">Registration</a></td>
						</tr>
					</table>
					</fieldset>
				</form>
			</body>
			</html>
<?php
		}
?>