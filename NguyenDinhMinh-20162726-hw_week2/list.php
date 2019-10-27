<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/aja+++x/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


  <style>
    table {
      width: 100%
    }

    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>
</head>

<body>
  <h1 style="text-align:center;">Registed Users</h1>
  <a href="./index.php">
    <button type="button" class="btn">&gt &nbsp Sign Up new</button>
  </a>
  <?php
  $db = mysqli_connect('localhost', 'root', '', 'test2');
  // print all database here
  $query = "SELECT * FROM user";
  $result = mysqli_query($db, $query);

  if ($result->num_rows > 0) {
    echo "<table class=\"table table-striped\">
    <tr>
      <th>Full name</th>
      <th>Password</th>
      <th>Phonenumber</th>
      <th>E-mail</th>
      <th>Sex</th>
      <th>Hobbies</th>
    </tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo
      "<tr>
        <td>" . $row["firstname"] . " " . $row["lastname"] . "</td>
        <td>" . $row["password"] . "</td> <td>" . $row["phonenumber"] . "</td>
        <td>" . $row["email"] . "</td>
        <td>" . $row["sex"] . "</td>
        <td>" . $row["hobbies"] . "</td>
      </tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }
  ?>

</body>

</html>
