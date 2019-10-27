<?php

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test2');
$conn = new mysqli('localhost', 'root', '', 'test2');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
  // REGISTER USER
  if (isset($_POST['reg_user'])) {
    // var_dump($_POST);
    // die();
    // receive all input values from the form
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phonenumber = mysqli_real_escape_string($db, $_POST['phonenumber']);

    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM user2 WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
      if ($user['email'] === $email) {
        array_push($errors, "email already exists");
      }
    }

    // Finally, register user if there are no errors in the form
  	$query = "INSERT INTO `user` (`firstname`, `lastname`, `email`, `phonenumber`)
    VALUES ('$firstname', '$lastname', '$email', '$phonenumber')";
    // var_dump($query);
    // die();
  	mysqli_query($db, $query);
  	header('location: list.php'); // redirect to list.php after performing action
  }
}
?>
