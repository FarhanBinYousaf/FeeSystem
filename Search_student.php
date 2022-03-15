<?php
  include 'connection.php';
  session_start();
  if(!isset($_SESSION['user']) || $_SESSION['user']!=true)
    {
      header('location: login_form.php');
      exit;
    }
    // if(isset($_POST['search']))
    // {
    //     $RegNo = $_POST['RegistrationNo'];
    //     $SearchQuery = "SELECT * FROM `nineclass` WHERE `RegNo` = '$RegNo'";
    //     $SearchRun = mysqli_query($conn,$SearchQuery);
    //     while ($Row = mysqli_fetch_assoc($SearchRun)) 
    //     {
    //         $Name = $Row['SName']; 
    //         $FatherName  = $Row['FName'];
    //         $RegNo = $Row['RegNo'];
    //         $RollNo = $Row['RollNO'];
    //         $Class = $Row['Class'];
    //     }
    // }


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

    <title>Search Student </title>
    <style>
    body{
      /*background: rgb(123,140,226);*/
      background:  radial-gradient(circle, rgba(238,174,202,1) 34%, rgba(148,187,233,1) 64%);
    }
      .card-title a:hover
      {
        text-decoration: none;
      }
      .col-md-4 .card{
        background-color: navy;
      }
      .col-md-4 .card:hover
      {
        background-color:aqua;
        border-radius: 10px;
      }
      .col-md-4 a:
      {
        color: white;
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
                      <a class="dropdown-item" href="change_password.php">Change Password</a>
                      <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="logout.php">Log Out</a>
                    </div>
                </li> 
        </ul>
      </div>
</nav>
                <!-- Body of Bootstrap starts from here -->
  
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="alert alert-primary my-4">
        <p class="text-center">To Submit Fee of your desire student, Search Student by Registration No.The Searched Student will show below in table and you just have to Click on <strong><span style="color:blue">Submit Fee</span> </strong>Button to Submit Fee.</p>
      </div>
      <form method="POST" action="view_search.php">
        <div class="form-group">
          <label for="exampleInputEmail1">Registration No</label>
          <input type="text" name="RegistrationNo" class="form-control" aria-describedby="emailHelp">
        </div>
        <button class="btn btn-info" type="submit" name="search">Search</button>
      </form>
    </div>
    <div class="col-md-3"></div>
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