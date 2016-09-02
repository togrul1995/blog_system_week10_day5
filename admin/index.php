<?php
	if(isset($_POST) && isset($_POST['username']) && isset($_POST['password'])) {
		if($_POST['username'] == "admin" && $_POST['password'] == "admin") {
			session_start();
			$_SESSION['admin'] = "logged";
			header("Location: admin.php");
		} else {
			echo "<center>Invalid username or password</center><br>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<center>
		<form action="" method="POST">
			<input type="text" name="username" required="" placeholder="Username">
			<input type="password" name="password" required="" placeholder="Password">
			<input type="submit" name="submit" value="Login">
		</form>
		<br><a href="../index.php">Back</a>
	</center>
</body>
</html>
