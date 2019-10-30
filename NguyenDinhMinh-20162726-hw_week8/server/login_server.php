<?php
	session_start(); // Starting Session
	$error = ''; // Variable To Store Error Message
	if (isset($_POST['submit'])) {
		// Define $username and $password
		$username = $_POST['email'];
		$password = $_POST['password'];
		// mysqli_connect() function opens a new connection to the MySQL server.
		$db = mysqli_connect('localhost', 'root', '', 'test2');
		// SQL query to fetch information of registerd users and finds user match.
		$query = "SELECT email, password from user where email='$username' AND password='$password' LIMIT 1";
		$result = mysqli_query($db, $query);
	    $user = mysqli_fetch_assoc($result);
	    
	    if (!$user) { // if user exists
		  $error = 'Username is not exist';
		  echo "<div class='form'>
			<h3 style=\"text-align: center\">Username/password is incorrect.</h3>
			<h3 style=\"text-align: center\"><a href=\"../index.php\">Login again</a></h3>";

		//   header("location: ../index.php");
 		}
	    else {
		// To protect MySQL injection for Security purpose
		$stmt = $db->prepare($query);
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();
		$stmt->bind_result($username, $password);
		$stmt->store_result();
		if($stmt->fetch()) //fetching the contents of the row {
		$_SESSION['login_user'] = $username; // Initializing Session
		header("location: ../list.php"); // Redirecting To Profile Page
		mysqli_close($db); // Closing Connection
		}
	}
?>