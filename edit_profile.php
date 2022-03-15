<?php
  session_start();
  include 'connection.php';
  $ID =  $_REQUEST['id'];
  // echo $ID;
  $ProfileQuery = "SELECT * FROM `admintable` WHERE `id`= '$ID'";
  $QueryRun = mysqli_query($conn,$ProfileQuery);
  while($Row = mysqli_fetch_assoc($QueryRun))
  {
    $id = $Row['id'];
    $Name =$Row['name']; 
    $Email =$Row['email'];
    $Mobile =$Row['mobile'];
  }
  if(isset($_POST['update']))
  {
    $NewName = $_POST['newname'];
    $NewEmail = $_POST['newemail'];
    $NewMobile = $_POST['newmobile'];
    $UpdateQuery = "UPDATE `admintable` SET `id` ='$ID',`name`='$NewName',`email`='$NewEmail',`mobile`='$NewMobile' WHERE `id`= '$ID'";
    $QueryRunner = mysqli_query($conn,$UpdateQuery);
    if($QueryRunner)
    {
      echo "<script>alert('Congratulations! Your account has been updated successfully')</script>";
      header('location:view_profile.php?iid='.$id);
    }
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

    <title>Admin Page </title>
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
            <a class="nav-link text-white" href="#">About Us </a>
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
                     <span style="color:aqua;"> Hi, <?php echo $_SESSION['name']; ?></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="view_profile.php">View Profile</a>
                      <a class="dropdown-item" href="#">Edit Profile</a>
                      
                      <a class="dropdown-item" href="#">Manage Account</a>
                      <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="logout.php">Log Out</a>
                    </div>
                </li> 
        </ul>
      </div>
</nav>

          <!-- Forms Start From Here  -->
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="alert alert-primary my-4 text-center" role="alert">
          <strong >View and Edit your profile.</strong>
      </div>
      <form class="my-4" method="POST">
        <div class="form-group">
          <label for="exampleInputEmail1">Name </label>
          <input type="text" class="form-control" name="newname" value="<?php echo $Name; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Email </label>
          <input type="email" class="form-control" name="newemail" value="<?php echo $Email; ?>" id="exampleInputPassword1">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Mobile No.</label>
          <input type="text" class="form-control" name="newmobile" value="<?php echo $Mobile; ?>" id="exampleInputPassword1">
        </div>
        <div class="form-group">
          <button class="btn btn-warning" name="update" type="submit">Update</button>
        </div>
      </form>
    </div>
    <div class="col-md-4"></div>
  </div>


          <!-- Forms End Here  -->
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