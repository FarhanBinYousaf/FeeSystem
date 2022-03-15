<?php
  include 'connection.php';
  require('functions.php');
  session_start();
  if(!isset($_SESSION['user']) || $_SESSION['user']!=true)
    {
      header('location: login_form.php');
      exit;
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

    <title>Admin Page </title>
    <style>
    body{
      /*background: rgb(123,140,226);*/
      background:  radial-gradient(circle, rgba(238,174,202,1) 34%, rgba(148,187,233,1) 64%);
    }
      .card-title a:hover
      {
        text-decoration: none;
      }
      .col-md-6 .card{
        background-color: navy;
      }
      .col-md-6 .card:hover
      {
        background-color:aqua;
        border-radius: 10px;
      }
      .col-md-6 a:
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
            <a class="nav-link text-white" href="admin.php">Admin</a>
          </li>
           <li class="nav-item ">
            <a class="nav-link text-white" href="student_profile.php">Students</a>
          </li>
           <li class="nav-item ">
            <a class="nav-link text-white" href="teachers_profile.php">Teachers</a>
          </li>
           <li class="nav-item ">
            <a class="nav-link text-white" href="manage_fee.php">Fee</a>
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
  <div class="container my-4">
    <div class="row ">
      <div class="col-md-6 my-4">
        <div class="card" style="width: 16rem;">
          <div class="card-body">
            <div class="card-title text-center">
              <a href="nine_class.php" class="text-white"><i class="fas fa-user-plus fa-6x"></i><br><br>
                <h3>9th Class</h3>
                <p>Total No of Students: <span style="color:red;"><?php echo get_student_count(); ?></span></p>
              </a>
             </div>
          </div>
        </div>
      </div>
         <div class="col-md-6 my-4">
        <div class="card" style="width: 16rem;">
          <div class="card-body">
            <div class="card-title text-center">
              <a href=""  class="text-white"><i class="fas fa-user-edit fa-7x"></i><br><br>
                <h3>10th Class</h3>
              </a>
             </div>
          </div>
        </div>
      </div>
       <!-- <div class="col-md-4 my-4">
        <div class="card" style="width: 16rem;">
          <div class="card-body">
            <div class="card-title text-center">
              <a href=""  class="text-white"><i class="fas fa-user-minus fa-7x"></i><br><br>
                <h3>Delete Desired</h3>
              </a>
             </div>
          </div>
        </div>
      </div> -->

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