<?php
  include 'connection.php';
  session_start();
  if(!isset($_SESSION['user']) || $_SESSION['user']!=true)
    {
      header('location: login_form.php');
      exit;
    }
    $OID = $_REQUEST['jid'];
    // echo $OID;
    $FeeSelect = "SELECT * FROM `fees` WHERE `RegistrationNo` = '$OID'";
    $Query = mysqli_query($conn,$FeeSelect);
    while($Row = mysqli_fetch_assoc($Query))
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
      // echo $December;
    }
    if(isset($_POST['update']))
    {

      $NewJanuary = $_POST['NewJan'];
      $NewFeburary = $_POST['NewFeb'];
      $NewMarch = $_POST['NewMarch'];
      $NewApril = $_POST['NewApril'];
      $NewMay = $_POST['NewMay'];
      $NewJune = $_POST['NewJune'];
      $NewJuly = $_POST['NewJuly'];
      $NewAugust = $_POST['NewAugust'];
      $NewSeptember = $_POST['NewSep'];
      $NewOctober = $_POST['NewOct'];
      $NewNovember = $_POST['NewNov'];
      $NewDecember = $_POST['NewDec'];
      $UpdateFeeQuery = "UPDATE `fees` SET `January`='$NewJanuary',`Feburary`='$NewFeburary',`March`='$NewMarch',`April`='$NewApril',`May`='$NewMay',`June`='$NewJune',`July`='$NewJuly',`August`='$NewAugust',`September`='$NewSeptember',`October`='$NewOctober ',`November`='$NewNovember',`December`='$NewDecember' WHERE `RegistrationNo`='$RegNo'";
      $UpdatQueryRun = mysqli_query($conn,$UpdateFeeQuery);
      if($UpdatQueryRun)
      {
        echo "<script>
          alert('Congratulations! Your Fee has been Submitted Successfully')
          window.location.href='view_Fee_search.php'
        </script>";
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
      .card img{
        border-radius: 8%;
        width: 250px; 
      }
      .card{
        width: 250px;
        border-radius: 8%;
        margin-left:100px ;
        margin-top: -44px;
      }
      .btn-primary {
        /*margin-top: 25px;*/
      }
      label{
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
  <div class="alert alert-primary my-4 text-center"> 
    <p>Add New data of selected Student and Click on <strong><span style="color:blue;">Update</span></strong> button to Update record.</p>
  </div>
  <div class="row">

   <div class="col-md-4">

    <form method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">January </label>
        <input type="text" name="NewJan" value="<?php echo $January; ?>"  class="form-control" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Feburary</label>
        <input type="text" name="NewFeb" value="<?php echo $Feburary;?>"  class="form-control" id="exampleInputPassword1">
      </div>
      <div class="form-group">
      <label for="exampleInputPassword1">March</label>
        <input type="text" name="NewMarch" value="<?php echo $March; ?>"  class="form-control" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">April</label>
        <input type="text" name="NewApril"  value="<?php echo $April; ?>"  class="form-control" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">May</label>
        <input type="text" name="NewMay"  value="<?php echo $May; ?>"    class="form-control" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">June</label>
        <input type="text" name="NewJune"  value="<?php echo $June; ?>"    class="form-control" id="exampleInputPassword1">
      </div>
   </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="exampleInputEmail1">July</label>
            <input type="text" name="NewJuly"  value="<?php echo $July;?>"   class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">August</label>
            <input type="text" name="NewAugust"  value="<?php echo $August; ?>"    class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">September</label>
            <input type="text" name="NewSep"  value="<?php echo $September; ?>"    class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">October</label>
            <input type="text" name="NewOct"  value="<?php echo $October; ?>"   class="form-control" id="exampleInputPassword1">
        </div>    
        <div class="form-group">
            <label for="exampleInputPassword1">November</label>
            <input type="text" name="NewNov"  value="<?php echo $November;?>"   class="form-control" id="exampleInputPassword1">
        </div>   
        <div class="form-group">
            <label for="exampleInputPassword1">December</label>
            <input type="text" name="NewDec"  value="<?php echo $December;?>"   class="form-control" id="exampleInputPassword1">
        </div>             
        <div class="form-group my-4">
             <button type="submit" name="update" class="btn btn-info my-4 form-control">Update</button>
        </div>       
    </div>
     
        
       </div>
    </form>
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