<?php
  include 'connection.php';
  session_start();
  if(!isset($_SESSION['user']) || $_SESSION['user']!=true)
    {
      header('location: login_form.php');
      exit;
    }
    $SelectQuery = "SELECT * FROM `nineclass`";
    $CheckQuery = mysqli_query($conn,$SelectQuery);
    while($Row = mysqli_fetch_assoc($CheckQuery))
    {
      $RegistrationNo = $Row['RegNo'];
      $RollNo = $Row['RollNO'];
    }
    if(isset($_POST['add_data']))
    {

      $StudentName = $_POST['Stud_Name'];
      $StudentFatherName = $_POST['FathName'];
      $StudentRegName = $_POST['RegistrationNo'];
      $StudentClass = $_POST['StudClass'];
      $StudentSubjCat = $_POST['SubjectCategory'];
      $StudentRollNo = $_POST['StudentRollNo'];
      $StudentBFormNo = $_POST['StuBFormNo'];
      $StudentFathCnicNo = $_POST['FathCnicNo'];
      $StudentContactNo = $_POST['ContactNo'];
      $StudentAddress = $_POST['StudentAddress'];
      $StudentAdmissionDate = $_POST['date'];
      $StudentImage = $_FILES["StudentProfileImage"]['name'];

      if($RegistrationNo == $StudentRegName)
      {
        echo "<script>alert('Oops! This Registration Number has been already used')</script>";
      }
      else
      {
          $insert = "INSERT INTO `nineclass` (`SName`,`FName`,`RegNo`,`Class`,`SubjCat`,`RollNO`,`BForm`,`FCNIC`, `ContactNo`, `Address`, `AdmissionDate`,`SImage`) VALUES ('$StudentName','$StudentFatherName','$StudentRegName','$StudentClass','$StudentSubjCat','$StudentRollNo','$StudentBFormNo','$StudentFathCnicNo','$StudentContactNo','$StudentAddress','$StudentAdmissionDate','$StudentImage')";
         $ResultQuery = mysqli_query($conn,$insert);
           if($ResultQuery)
           {
            move_uploaded_file($_FILES["StudentProfileImage"]["tmp_name"], "StudentProfileImages/".$_FILES["StudentProfileImage"]["name"]);
            ?>
           <script>
            alert('Congratulations! Student Data has been inserted successfully')
            window.location.href='nine_class.php';
          </script>
            <?php 
           }
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
    <!-- My Font awesome Kit Link -->

    <title>Admin Page </title>
    <style>
    *{
      margin: 0px;
      padding: 0px;
    }
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
      .container-fluid img{
        margin-left: -15px;
      }
      .container-fluid form
      {
        margin-right: 50px;
      }
      .center{
        position: relative;
        top: 30%;
        left: 50%;
        transform: translate(-50%,-50%);
        color: blue;
      }
      .col-md-6 .text{
        text-align: center;
       position: relative;
        top: 30%;
        left: 50%;
        transform: translate(-50%,-50%);
       
      }
      .form-group label{
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
            <a class="nav-link text-white" href="admin.php">Admin</a>
          </li>
           <li class="nav-item ">
            <a class="nav-link text-white" href="student_profile.php">Student's Section</a>
          </li>
           <li class="nav-item ">
            <a class="nav-link text-white" href="teachers_profile.php">Teacher's Profile</a>
          </li>
           <li class="nav-item ">
            <a class="nav-link text-white" href="Student_fee.php">Fee Section</a>
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
  <div class="container-fluid">
    <h4 class="my-4 text-center">Add Bio-data of 9th Class Students.</h4>
     <div class="row">
       <div class="col-md-6 icon">
         <i class="fas fa-school fa-10x center"></i>
         <p class="text">We are in the era of computer technology even in our daily life computer has become the most necessary part of our life.</p>
       </div>
        <div class="col-md-6">
          
          <form class="my-4" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputEmail1">Student Name</label>
                <input type="text" name="Stud_Name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Father Name</label>
                <input type="text" name="FathName" class="form-control" id="exampleInputPassword1">
              </div>             
              <div class="form-group">
                <label for="exampleInputEmail1">Registration No.</label>
                <input type="text" name="RegistrationNo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Class</label>
                <input type="text" name="StudClass" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Subject Category</label>
                <input type="text" name="SubjectCategory" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div><div class="form-group">
                <label for="exampleInputEmail1">Roll No</label>
                <input type="text" name="StudentRollNo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">B-Form No.</label>
                <input type="text" name="StuBFormNo" class="form-control" id="exampleInputPassword1">
              </div>  
                <div class="form-group">
                <label for="exampleInputPassword1">Father CNIC No.</label>
                <input type="text" name="FathCnicNo" class="form-control" id="exampleInputPassword1">
              </div> 
              <div class="form-group">
                <label for="exampleInputPassword1">Contact No.</label>
                <input type="tel" name="ContactNo"  class="form-control" id="exampleInputPassword1">
              </div>             
              <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" name="StudentAddress" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Admission Date</label>
                <input type="date" name="date" class="form-control" id="exampleInputPassword1">
              </div>     
              <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input type="file" name="StudentProfileImage" class="form-control" id="exampleInputPassword1">
              </div>       
              <button type="submit" name="add_data" class="btn btn-primary">Submit</button>
          </form>
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