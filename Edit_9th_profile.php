<?php
  include 'connection.php';
  session_start();
  if(!isset($_SESSION['user']) || $_SESSION['user']!=true)
    {
      header('location: login_form.php');
      exit;
    }
    $EID = $_REQUEST['eid'];
    $SelectedStudent = "SELECT * FROM `nineclass` WHERE `ID` = '$EID'";
    $SelectedStudentQuery = mysqli_query($conn,$SelectedStudent);
    while($StudentFetch = mysqli_fetch_assoc($SelectedStudentQuery))
    {
      $ID = $StudentFetch['ID'];
      $OldSName = $StudentFetch['SName'];
      $OldFName = $StudentFetch['FName'];
      $OldRegNo = $StudentFetch['RegNo'];
      $OldClass = $StudentFetch['Class'];
      $OldSubCat = $StudentFetch['SubjCat'];
      $OldRollNo = $StudentFetch['RollNO'];
      $OldBFormNo = $StudentFetch['BForm'];
      $OldFCnic = $StudentFetch['FCNIC'];
      $OldContactNo = $StudentFetch['ContactNo'];
      $OldAddress = $StudentFetch['Address'];
      $OldSImage = $StudentFetch['SImage'];
    }
    if(isset($_POST['update']))
    {
      $NewName = $_POST['NewName'];
      $NewFName = $_POST['NewFName'];
      $NewRegNo = $_POST['NewRegNo'];
      $NewClass = $_POST['NewClass'];
      $NewSubjCat = $_POST['NewSubjCat'];
      $NewRollNo = $_POST['NewRollNo'];
      $NewBFormNo = $_POST['NewBformNo'];
      $NewFCnic = $_POST['NewFCNIC'];
      $NewContact = $_POST['NewContact'];
      $NewAddress = $_POST['NewAddress'];
      $NewImage = $_FILES['NewImage']['name'];
      $SelectStUpdate = "UPDATE `nineclass` SET `SName`='$NewName',`FName`='$NewFName',`RegNo`='$NewRegNo',`Class`='$NewClass',`SubjCat`='$NewSubjCat',`RollNO`='$NewRollNo ',`BForm`='$NewBFormNo',`FCNIC`='$NewFCnic',`ContactNo`='$NewContact',`Address`='$NewAddress',`SImage`='$NewImage' WHERE `ID` = '$ID'";
      $QueryRun = mysqli_query($conn,$SelectStUpdate);
      if($QueryRun)
      {
        move_uploaded_file($_FILES["NewImage"]["tmp_name"],"StudentProfileImages/".$_FILES["NewImage"]["name"]);
        header("location:manage_9th_profile.php");
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
        margin-top: 25px;
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
            <a class="nav-link text-white" href="admin.php">Admin</a>
          </li>
           <li class="nav-item ">
            <a class="nav-link text-white" href="student_profile.php">Student Profile</a>
          </li>
           <li class="nav-item ">
            <a class="nav-link text-white" href="teachers_profile.php">Teacher Profile</a>
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
<div class="container">
  <div class="alert alert-primary my-4 text-center"> 
    <p>Add New data of selected Student and Click on <strong><span style="color:blue;">Update</span></strong> button to Update record.</p>
  </div>
  <div class="row">

   <div class="col-md-4">

    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleInputEmail1">Student Name</label>
        <input type="text" name="NewName" value="<?php echo $OldSName; ?>" class="form-control" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Father Name</label>
        <input type="text" name="NewFName" value="<?php echo $OldFName; ?>" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Registration No</label>
        <input type="text" name="NewRegNo" value="<?php echo $OldRegNo; ?>"  class="form-control" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Class </label>
        <input type="text" name="NewClass"  value="<?php echo $OldClass; ?>"  class="form-control" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Subject Category</label>
        <input type="text" name="NewSubjCat" value="<?php echo $OldSubCat; ?>"  class="form-control" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Roll No</label>
        <input type="text" name="NewRollNo" value="<?php echo $OldRollNo; ?>"  class="form-control" id="exampleInputPassword1">
      </div>
   </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="exampleInputEmail1">B-Form No</label>
            <input type="text" name="NewBformNo" value="<?php echo $OldBFormNo; ?>"  class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Father CNIC </label>
            <input type="text" name="NewFCNIC"  value="<?php echo $OldFCnic; ?>"  class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Contact No</label>
            <input type="text" name="NewContact"  value="<?php echo $OldContactNo; ?>"  class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Address</label>
            <input type="text" name="NewAddress" value="<?php echo $OldAddress; ?>"  class="form-control" id="exampleInputPassword1">
        </div>
        
        <div class="form-group">
            <label for="exampleInputPassword1">Upload New Image</label>
            <input type="file" name="NewImage" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group my-4">
             <button type="submit" name="update" class="btn btn-info my-4 form-control">Update</button>
        </div>
        
       </div>
       <div class="col-md-4">
         <div class="form-group">
          <label for="image" class="image"></label>
          <div class="card">
            <img class="card-img-top" src="StudentProfileImages/<?php echo $OldSImage; ?>" alt="Card image cap">            </div>
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