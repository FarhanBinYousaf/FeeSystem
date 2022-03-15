<?php
  include 'connection.php';
  session_start();
  if(!isset($_SESSION['user']) || $_SESSION['user']!=true)
    {
      header('location: login_form.php');
      exit;
    }
    $PrintRegNo = $_REQUEST['regno'];
    // echo $PrintRegNo;
    $SelectName = "SELECT * FROM `nineclass` WHERE `RegNo`='$PrintRegNo'";
    $QueryRun = mysqli_query($conn,$SelectName);
    while($Row = mysqli_fetch_assoc($QueryRun))
    {
      $Name = $Row['SName'];
      $FName = $Row['FName'];
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
     
      @media print
      {
        #print 
        {
          display:none;
        }
      }
    @media print 
    {
      #PrintButton
      {
        display: none;
      }
    }
   /* @page 
    {
      size: 7in 9.25in;
      margin: 27mm 16mm 27mm 16mm;
    }*/
    .table
    {
      /*border: 1px solid black;*/
      border: 1px solid #dddddd;
    }
    .col-md-8{
      background-color: white;
    }
  
    th{
      border-right: solid 1px #dddddd; 
      border-left: solid 1px #dddddd;
    }
   /* tr 
    { 
      border: none; 
    }*/
    td 
    {
      border-right: solid 1px #dddddd; 
      border-left: solid 1px #dddddd;
    }
    .printbutton{
      margin-left: 52%;
    }
    .fathname{
      margin-top: -22px;
    }
    .date{
      margin-top: -22px;
    }
    .line{
      /*border: 1px  black;*/
    }
    .contact{
      margin-top: -25px;
    }
    .email{
      margin-top: -25px;
    }
    .bline{
     margin-top: -20px;
    color: black;
    }
    .vertical {
            border-left: 1px solid #dddddd;
            height: 150px;
            margin-top: -166px;
            float: right;       
        }
        .horizental {
            border-left: 1px solid #dddddd;
            height: 150px;
            margin-top: -166px;
            float: left;       
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
<div class="container">
    <div class="alert alert-primary" id="PrintButton">
       <p class="text-center">To Print detail about your fee just Click on <strong><span style="color:blue">Print</span></strong> button to print Fee Receipt.</p>
    </div>  
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="header">
        <h4 class="text-center my-4">Receipt</h4>
        <h5 class="text-center my-4">Govt. High School Miani</h5>
        <h5 class="float-left">Name: <u><i><strong><span style="color:blue"><?php echo $Name; ?></span></strong></i></u> </h5><br>
        <h5 class="float-right fathname">Father Name: <u><i><strong><span style="color:blue"><?php echo $FName; ?></span></strong></i></u></h5>
        <br>
         <h5 class="float-left">Reg. No: <u><i><strong><span style="color:blue"><?php echo $PrintRegNo; ?></span></strong></i></u></h5><br>
          <h5 class="float-right date">Date: <u><i><strong><span style="color:blue"> <?php echo  date('Y-m-d H:i:s A'); ?></span></strong></i></u></h5>
      </div>
      <div class="my-4">   
        <p>This is the detail of your fee process of whole year.<br>
          <strong>Note: Keep this card with you, bring it with you the next time when you will come to pay fee, otherwise you would not be able to pay fee. </strong>
        </p>
          <table class="table table-hover">
            <thead>
              <tr>             
                <th>#</th>
                <th >Months</th>
                <th>Fee</th>  
              </tr>
            </thead>
            <?php 
            $FeeSelect = "SELECT * FROM `fees` WHERE `RegistrationNo`='$PrintRegNo'";
            $SelectQuery = mysqli_query($conn,$FeeSelect);
            while($FeeFetch = mysqli_fetch_assoc($SelectQuery))
            {
              // $RegNo = $Row['RegistrationNo'];
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
            <tbody>
              <tr>
                <th>1</th>
                <td>January</td>
                <td><?php echo $January; ?></td>
              </tr>
               <tr>
                <th>2</th>
                <td>Feburary</td>
                <td><?php echo $Feburary; ?></td>
              </tr>
              <tr>
                <th>3</th>
                <td>March</td>
                <td><?php echo $March; ?></td>
              </tr>
               <tr>
                <th>4</th>
                <td>April</td>
                <td><?php echo $April; ?></td>
              </tr>
              <tr>
                <th>5</th>
                <td>May</td>
                <td><?php echo $May; ?></td>
              </tr>
               <tr>
                <th>6</th>
                <td>June</td>
                <td><?php echo $June; ?></td>
              </tr>
              <tr>
                <th>7</th>
                <td>July</td>
                <td><?php echo $July; ?></td>
              </tr>
               <tr>
                <th>8</th>
                <td>August</td>
                <td><?php echo $August; ?></td>
              </tr>
              <tr>
                <th>9</th>
                <td>September</td>
                <td><?php echo $September; ?></td>
              </tr>
               <tr>
                <th>10</th>
                <td>October</td>
                <td><?php echo $October; ?></td>
              </tr>
              <tr>
                <th>11</th>
                <td>November</td>
                <td><?php echo $November; ?></td>
              </tr>
               <tr>
                <th>12</th>
                <td>December</td>
                <td><?php echo $December; ?></td>
              </tr>
            </tbody>
          </table>
          <div class="footer my-4">
            <p class="float-left ml-2">Signature of Principle: _________</p> 
            <p class="float-right mr-2">Signature of Accoutant: _________</p>
          </div><br><hr class="line">
          <p class="text-center">Design and Developed by: <strong>Farhan Bin Yousaf</strong></p><br>
          <p class="float-left contact ml-2">Contact No: <strong>+923042383146</strong></p>
          <p class="float-right email mr-2">Email: <strong>mfarhanyousaf68@gmail.com</strong></p><br><hr class="bline">
          <div class="vertical"></div>
           <div class="horizental"></div>
      </div>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>      
<center class="my-4 printbutton"><button id="PrintButton" onclick="PrintPage()" target="_blank" class="btn btn-primary">Print</button></center>




































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
  <script type="text/javascript">
  function PrintPage() {
    window.print();
  }

</script>
</html>
