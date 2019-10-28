<?php
// initializing variables
$errors = array();
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test2');
$conn = new mysqli('localhost', 'root', '', 'test2');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phonenumber = mysqli_real_escape_string($db, $_POST['phonenumber']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  if (!empty($sex)) {
    $sex = mysqli_real_escape_string($db, $_POST['sex']);
  } else $sex = "";
  if (!empty($hobbies)) {
    $hobbies = mysqli_real_escape_string($db, implode(", ", $_POST['hobbies']));
  } else $hobbies = "";
  $bday = mysqli_real_escape_string($db, $_POST['bday']);
  $program = mysqli_real_escape_string($db, $_POST['program']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error into $errors array
  if (empty($firstname)) {
    array_push($errors, "Firstname is required");
  }
  if (empty($lastname)) {
    array_push($errors, "Lastname is required");
  }
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (strlen($password) < 6) {
    array_push($errors, "Password's length must be greater than or equal to 6");
  }
  if (!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $password)) {
    array_push($errors, "Password must contain both letter and number");
  }
  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }
  if (!empty($errors)) {
    print_r($errors);
  } else {
    // Finally, register user if there are no errors in the form
    $query = "INSERT INTO `user`(`firstname`, `lastname`,`email`,`phonenumber`,`password`,`sex`,`hobbies`,`bday`,`program`)
    VALUES ('$firstname', '$lastname','$email','$phonenumber','$password','$sex','$hobbies','$bday','$program')";
    $result = mysqli_query($db, $query);
    if (!$result) {
      printf("Error: %s\n", mysqli_error($db));
      exit();
    } else header('location: list.php');
  }
}
