<?php include('server_manager.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="login_style.css">
</head>   
<body>

	<div class="header">
		<h2>Admin Login</h2>
	</div>
	
	<form method="post" action="login_manager.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<div>
		<br>
		<br>
		<a href = "login.php" style="text-decoration: none;">Agent login</a>
		</div>
	</form>
</body>
</html>