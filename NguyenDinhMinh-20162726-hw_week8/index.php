<?php
	include('./server/login_server.php'); // Includes Login Script
	if(isset($_SESSION['login_user'])){
		header("location: list.php"); // Redirecting To Profile Page
	}
?>
<!DOCTYPE html>
<html lang="en-us">
	<head>
		<title>Welcome</title>
	</head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	    <script src="https://ajax.googleapis.com/aja+++x/libs/jquery/3.4.1/jquery.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="login-form" style="width: 60%; text-align: center; margin-left: 20%">
			<h2 class="text-center">Log in</h2> 
			<form action="./server/login_server.php" method="post">
				<div class="form-group">
					<input type="email" class="form-control" name="email" placeholder="E-mail" required="required">
			    </div>
				<div class="form-group">
			        <input type="password" class="form-control" name="password" placeholder="Password" required="required">
			    </div>
				<button type="submit" name="submit" class="btn btn-primary my-4 btn-block">Log in</button>
				<div class="clearfix">
				    <label class="pull-left checkbox-inline"><input type="checkbox" name="remember" value="1"> Remember me</label>
				</div>
				<span><?php echo $error; ?></span>
			</form>
			<p class="text-center">
				<a href="signup.php">Create an Account</a>
			</p>
		</div>
	</body>
</html>