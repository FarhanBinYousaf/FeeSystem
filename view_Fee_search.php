<?php
  include 'connection.php';
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

    <title>Manage Fees</title>
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
       /*a:hover, a:visited, a:link, a:active
        {
          text-decoration: none;
          color: blue;
        }*/
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
            <a class="nav-link text-white" href="student_profile.php">Student Profile</a>
          </li>
           <li class="nav-item ">
            <a class="nav-link text-white" href="teachers_profile">Teacher Profile</a>
          </li>
           <li class="nav-item ">
            <a class="nav-link text-white" href="Student_fee">Fee Section</a>
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
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
     <!-- <a href="#" class="previous">&laquo; Previous</a> -->
     <div class="alert alert-primary">
       <p class="text-center">Here are the Fee of that months you have submitte. To Submit another fee than just Click on <strong><span style="color:blue">Submit Another</span></strong> button</p>
     </div>
      <table class="table table-dark">
          <thead style="color:red">
            <tr>
              <th>Reg. No</th>
              <th>January</th>
              <th>Febraury</th>        
              <th>March</th>
              <th>April</th>
              <th>May</th>
              <th>June</th>
              <th>July</th>        
              <th>August</th>
              <th>September</th>
              <th>October</th>
              <th>November</th>
              <th>December</th>
              <th>Action</th>
            </tr>
          </thead>
          <?php 
              // $RegNO = $_POST['RegistrNo'];
              $FeeSelect = "SELECT * FROM `fees`";
              $FeeQuery = mysqli_query($conn,$FeeSelect);
              while($Row = mysqli_fetch_assoc($FeeQuery))
              {
                $RegNo = $Row['RegistrationNo'];
                $January = $Row['January'];
                $Feburary = $Row['Feburary'];
                $March = $Row['March'];
                $April = $Row['April'];
                $May = $Row['May'];
                $June = $Row['June'];
                $July = $Row['July'];
                $August = $Row['August'];
                $September = $Row['September'];
                $October = $Row['October'];
                $November = $Row['November'];
                $December = $Row['December'];
                echo "<tbody>
                          <tr>
                            <th style='color:aqua'> $RegNo</th>
                            <td> $January</td>
                            <td> $Feburary</td>
                            <td> $March</td>
                            <td> $April</td>
                            <td> $May</td>
                            <td> $June</td>
                            <td> $July</td>
                            <td> $August</td>
                            <td> $September</td>
                            <td> $October</td>
                            <td> $November</td>
                            <td> $December</td>
                            <td><a href='manage_fee.php' class='btn btn-primary'>Submit Another</a></td>
                            <td><a href='print_page.php?regno=$RegNo' class='btn btn-info'>View Detail</a></td>
                          </tr>
                    </tbody>";
              }
    ?>
          
      </table>
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
<!-- <script>
  window.print();
</script> -->