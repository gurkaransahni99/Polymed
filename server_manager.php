<?php 
	session_start();

	// variable declaration
	$username = "";
	$errors = array(); 
	$_SESSION['success'] = "";
                  
	// connect to database
	$db = mysqli_connect('localhost', 'lol', 'karan1122', 'polymed');

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM login_manager WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index_polymed_manager.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['username']);
		header('location: login_manager.php');
	}

?>