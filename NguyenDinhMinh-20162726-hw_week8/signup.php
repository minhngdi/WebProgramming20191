<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/aja+++x/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <!-- Default form register -->
        <form class="border border-light p-2" method="post" action="./server/signup_server.php">
            <p class="h4 mb-4 text-center">Sign up
            </p>
            <p class="text-right">
                <a href="./list.php">
                    <button type="button" class="btn">View user list</button>
                </a>
            </p>
            <div class="form-row mb-4">
                <div class="col">
                    <!-- First name -->
                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="First name">
                </div>
                <div class="col">
                    <!-- Last name -->
                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last name">
                </div>
            </div>
            <!-- E-mail -->
            <input type="email" id="email" name="email" class="form-control mb-4" placeholder="E-mail">
            <!-- Phone number -->
            <input type="number" id="phonenumber" name="phonenumber" class="form-control mb-4" placeholder="Phone number">
            <!-- a password field to input the password -->
            <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password">
            <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                &nbsp &nbsp Password at least 6 characters include both digit and character
            </small>
            <!-- a radio button named "sex", values: male / female -->
            <div class="form-group row">
                <label class="col-2"><b>Sex</b></label>
                <div class="col-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="male" value="male">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="female" value="female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
            </div>

            <!-- a checkbox named "hobbies", values: Reading, Sport, Music, ... -->
            <div class="form-group row">
                <label class="col-2"><b>Hobbies</b></label>
                <div class="col-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="reading" id="reading" name="hobbies[]">
                        <label class="form-check-label" for="reading">
                            Reading
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="sport" id="sport" name="hobbies[]">
                        <label class="form-check-label" for="sport">
                            Sport
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="music" id="music" name="hobbies[]">
                        <label class="form-check-label" for="music">
                            Music
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="bday" class="col-2 col-form-label"><b>Birthday</b></label>
                <div class="col-10">
                    <input class="form-control" name="bday" type="date" id="bday">
                </div>
            </div>
            <!-- value="<?php if (isset($date)) echo ($date) ?>" -->

            <div class="form-group">
                <select id="program" name="program" class="form-control">
                    <option value="" selected>Study programs</option>
                    <option value="sie">SIE</option>
                    <option value="hedspi">HEDSPI</option>
                    <option value="ict">ICT</option>
                    <option value="dsai">DS-AI</option>
                </select>
            </div>

            <!-- Sign up button -->
            <button class="btn btn-info my-4 btn-block" type="submit" name="reg_user">Sign up</button>

        </form>
    </div>

</body>

</html>
