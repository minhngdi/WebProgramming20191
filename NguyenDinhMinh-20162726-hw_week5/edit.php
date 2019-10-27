<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $db = mysqli_connect('localhost', 'root', '', 'test2');
        $query = "SELECT * FROM user WHERE id=$id";
        $q = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($q);
        $data = $row;
        $hobbies = explode(", ", $data['hobbies']);
        // var_dump($data);
        // die();
    }
    ?>
    <!-- Default form register -->
    <div class="container">
        <form class="text-center border border-light p-2" method="post" action="./edit_server.php" style="text-align: left !important;">
            <p class="h4 mb-4 text-center">Edit User
            </p>
            <p class="text-right">
                <a href="./index.php">
                    <button type="button" class="btn">View user list</button>
                </a>
            </p>
            <input hidden type="text" id="id" name="id" value="<?php echo ($data['id']) ?>">
            <div class="form-row mb-4">
                <div class="col">
                    <!-- First name -->
                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="First name" value="<?php echo ($data['firstname']) ?>">
                </div>
                <div class="col">
                    <!-- Last name -->
                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last name" value="<?php echo ($data['lastname']) ?>">
                </div>
            </div>
            <!-- E-mail -->
            <input type="email" id="email" name="email" class="form-control mb-4" placeholder="E-mail" value="<?php echo ($data['email']) ?>">

            <!-- Phone number -->
            <input type="text" id="phonenumber" name="phonenumber" class="form-control" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock" value="<?php echo ($data['phonenumber']) ?>">
            <!-- Password -->
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
            <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                At least 6 characters include both digit and character
            </small>

            <!-- a radio button named "sex", values: male / female -->
            <div class="form-group row">
                <label class="col-sm-1"><b>Sex</b></label>
                <div class="col-sm-11">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="male" value="male" <?php if ($data['sex'] == 'male') echo 'checked="checked"'; ?>">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="female" value="female" <?php if ($data['sex'] == 'female') echo 'checked="checked"'; ?>>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
            </div>
            <!-- a checkbox named "hobbies", values: Reading, Sport, Music, ... -->
            <div class="form-group row">
                <label class="col-sm-1"><b>Hobbies</b></label>
                <div class="col-sm-11">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="reading" id="reading" name="hobbies[]" <?php if (in_array("reading", $hobbies)) echo 'checked="checked"'; ?>>
                        <label class="form-check-label" for="reading">
                            Reading
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="sport" id="sport" name="hobbies[]" <?php if (in_array("sport", $hobbies)) echo 'checked="checked"'; ?>>
                        <label class="form-check-label" for="sport">
                            Sport
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="music" id="music" name="hobbies[]" <?php if (in_array("music", $hobbies)) echo 'checked="checked"'; ?>>
                        <label class="form-check-label" for="music">
                            Music
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="bday" class="col-2 col-form-label"><b>Birthday</b></label>
                <div class="col-10">
                    <input class="form-control" name="bday" type="date" id="bday" value="<?php echo ($data['bday']) ?>">
                </div>
            </div>
            <div class="form-group">
                <select id="program" name="program" class="form-control">
                    <option value="sie" <?php if ($data['program'] == "sie") echo "selected" ?>>SIE</option>
                    <option value="hedspi" <?php if ($data['program'] == "hedspi") echo "selected" ?>>HEDSPI</option>
                    <option value="ict" <?php if ($data['program'] == "ict") echo "selected" ?>>ICT</option>
                    <option value="dsai" <?php if ($data['program'] == "dsai") echo "selected" ?>>DS-AI</option>
                </select>
            </div>
            <!-- Edit button -->
            <button class="btn btn-info my-4 btn-block" type="submit" name="update_user">Update</button>
        </form>
    </div>
</body>

</html>
