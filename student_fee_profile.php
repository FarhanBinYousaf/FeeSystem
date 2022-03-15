<?php
  include 'connection.php';
  session_start();  
  if(!isset($_SESSION['user']) || $_SESSION['user']!=true)
    {
      header('location: student_login_form.php');
      exit;
    }
    $Select = "SELECT * FROM `student` WHERE `Name`='$_SESSION[Name]'";
    $Query = mysqli_query($conn,$Select);
    while($Row = mysqli_fetch_assoc($Query))
    {
    	$Name = $Row['Name'];
    	$RegNo = $Row['Regno'];
    }
    $StudentDataSelect = "SELECT * FROM `nineclass` WHERE `RegNo`='$RegNo'";
    $DataQueryRun = mysqli_query($conn,$StudentDataSelect);
    while($StudentRow = mysqli_fetch_assoc($DataQueryRun))
    {
    	$Image = $StudentRow['SImage'];
      $RollNo = $StudentRow['RollNO'];
    }
    $FeeSelect = "SELECT * FROM `fees` WHERE `RegistrationNo` = '$RegNo'";
    $FeeQueryRun = mysqli_query($conn,$FeeSelect);
    while ($FeeFetch = mysqli_fetch_assoc($FeeQueryRun)) 
    {
      $January = $FeeFetch['January'];
      $Feburary = $FeeFetch['Feburary'];
      $March = $FeeFetch['March'];
      $April = $FeeFetch['April'];
      $May = $FeeFetch['May'];
      $June = $FeeFetch['June'];
      $July = $FeeFetch['July'];
      $August = $FeeFetch['August'];
      $September = $FeeFetch['September'];
      $October = $FeeFetch['October'];
      $November = $FeeFetch['November'];
      $December = $FeeFetch['December'];  
    }
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/250d647682.js" crossorigin="anonymous"></script>

    <title>Student Page </title>
    <style>
    body{
    	background-color: lightslategray;
    }
    .card
    {
      width: 222px;
  	  height: 222px;
  	  border-radius: 50%;
      margin-left: 180px;
    }
    .circular_image 
    {
  	  width: 220px;
  	  height: 220px;
  	  border-radius: 50%;
	  }
    .heading
    {
      font-family: "Lucida Console", "Courier New", monospace;
      margin-right: 35%;
    }
    label{
      color: white;
      font-weight: 600;
    }
    </style>
  </head>
  <body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Fee System</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php">Home</a>
          </li>
           <li class="nav-item ">
            <a class="nav-link text-white" href="student_fee_profile.php">Student</a>
          </li>
           <li class="nav-item ">
            <a class="nav-link text-white" href="#">Contact Us </a>
          </li>
           <li class="nav-item ">
            <a class="nav-link text-white" href="#">Gallery</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto mr-4 ">
                <li class="nav-item dropdown mr-4">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                     <span style="color:aqua;"> Hi, <?php echo $_SESSION['Name']; ?></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="">View Profile</a>
                      <a class="dropdown-item" href="">Change Password</a>
                      <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="student_logout.php">Log Out</a>
                    </div>
                </li> 
        </ul>
      </div>
</nav>
               
<div class="container">
  <h4 class="text-center text-white heading my-2">Detail of your fee process of whole year</h4>
	<div class="row">

		<div class="col-md-4 my-4">
      <form>
        <div class="form-group">
          <label for="exampleInputEmail1">January</label>
          <input type="text" class="form-control" value="<?php echo $January;  ?>" disabled="">          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Feburary</label>
          <input type="text" class="form-control" value="<?php echo $Feburary; ?>" disabled="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">March</label>
          <input type="email" class="form-control" value="<?php echo $March;  ?>" disabled="">          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">April</label>
          <input type="text" class="form-control" value="<?php echo $April; ?>" disabled="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">May</label>
          <input type="text" class="form-control" value="<?php echo $May; ?>" disabled="">          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">June</label>
          <input type="text" class="form-control" value="<?php echo $June;  ?>" disabled="">
        </div>
      </form>  
    </div>
		<div class="col-md-4 my-4">
			<form>
        <div class="form-group">
          <label for="exampleInputEmail1">July</label>
          <input type="text" class="form-control" value="<?php echo $July;  ?>" disabled="">          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">August</label>
          <input type="text" class="form-control" value="<?php echo $August; ?>" disabled="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">September</label>
          <input type="text" class="form-control" value="<?php echo $September; ?>" disabled="">          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">October</label>
          <input type="text" class="form-control" value="<?php echo $October; ?>" disabled="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">November</label>
          <input type="text" class="form-control" value="<?php echo $November;  ?>" disabled="">          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">December</label>
          <input type="text" class="form-control" value="<?php echo $December; ?>" disabled="">
        </div>
      </form>
		</div>
		<div class="col-md-4 my-4">
      <div class="card">
        <img src="StudentProfileImages/<?php echo $Image; ?>" class="card-img-top circular_image" >
        <h6 class="text-white my-2">Welcome: <span style="color:aqua"><?php echo $_SESSION['Name']; ?></span></h6>
       <h6 class="text-white my-2">Registration No: <span style="color:aqua"><?php echo $RegNo; ?></span></h6> 
       <h6 class="text-white my-2">Roll No: <span style="color:aqua"><?php echo $RollNo; ?></span></h6>
      </div>  
    </div>
	</div>
	


</div>



































    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>