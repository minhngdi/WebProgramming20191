<?php
// initializing variables
$errors = array();
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test2');
// UPDATE USER
if (isset($_POST['update_user'])) {
  $id =  mysqli_real_escape_string($db, $_POST['id']);
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phonenumber = mysqli_real_escape_string($db, $_POST['phonenumber']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $sex = mysqli_real_escape_string($db, $_POST['sex']);
  $hobbies = mysqli_real_escape_string($db, implode(", ", $_POST['hobbies']));
  $bday = mysqli_real_escape_string($db, $_POST['bday']);
  $program = mysqli_real_escape_string($db, $_POST['program']);
  if (empty($firstname)) {
    array_push($errors, "Firstname is required");
  }
  if (empty($lastname)) {
    array_push($errors, "Lastname is required");
  }
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if ($password != '') {
    if (strlen($password) < 6) {
      array_push($errors, "Password's length must be greater than or equal to 6");
    }
    if (!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $password)) {
      array_push($errors, "Password must contain both letter and number");
    }
  }
  if (!empty($errors)) {
    print_r($errors);
  } else {
    // Finally, register user if there are no errors in the form
    if ($password == '') {
      $query = "UPDATE `user` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`phonenumber`='$phonenumber',`sex`='$sex',`hobbies`='$hobbies',`bday`='$bday',`program`='$program' WHERE `id`=$id";
    } else {
      $query = "UPDATE `user` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`phonenumber`='$phonenumber',`password`='$password',`sex`='$sex',`hobbies`='$hobbies',`bday`='$bday',`program`='$program' WHERE `id`=$id";
    }
    $result = mysqli_query($db, $query);
    if (!$result) {
      printf("Error: %s\n", mysqli_error($db));
      exit();
    } else header('location: list.php');
  }
}
