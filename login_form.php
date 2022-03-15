<?php
	session_start();
	include 'connection.php';
	$SelectQuery = "SELECT * FROM `admintable`";
	$QueryRun = mysqli_query($conn,$SelectQuery);
	while($row = mysqli_fetch_assoc($QueryRun))
	{
		$FName = $row['name'];
		$FEmail = $row['email'];
		$Fpasswod = $row['password'];
	}
	if(isset($_POST['login']))
	{
		$UserEmail = $_POST['uemail'];
		$UserPassword = $_POST['upassword'];
		$LoginQuery = "SELECT * FROM `admintable` WHERE `email`='$UserEmail' && `password`='$UserPassword'";
		$QueryRunner = mysqli_query($conn,$LoginQuery);
		if($FEmail==$UserEmail && $Fpasswod==$UserPassword)
		{
			$_SESSION['name'] = $FName;
			$_SESSION['email'] = $FEmail;
			$_SESSION['password'] = $Pass;
			$_SESSION['user']	= true;
			header("location:admin.php");
		}
	}

?>





<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
		
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<div class="text text-center my-4">
					<h3 style="color:white;">Admin Login</h3>
				</div>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="email" name="uemail" class="form-control" placeholder="Email">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="upassword" class="form-control" placeholder="password">
					</div>
					<div class="form-group">
						<button class="btn btn-warning float-right" name="login" type="submit">Login </button>
					</div>

				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="signup_form.php">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>