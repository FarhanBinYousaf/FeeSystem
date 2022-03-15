<?php
  include 'connection.php';
  $SelectQuery = "SELECT * FROM `student`";
  $QueryRun = mysqli_query($conn,$SelectQuery);
  while ($row = mysqli_fetch_assoc($QueryRun)) 
  {
    $StuRegNo = $row['Regno'];
  }
  if(isset($_POST['submit']))
  {
    $Name = $_POST['name'];
    $RegNo = $_POST['RegisNo'];
    $password = $_POST['password'];
    $CPassword = $_POST['cpassword'];
    if($RegNo==$StuRegNo)
    {
      echo "<script>alert('Oops! This Registration No is already registered')</script>";
    }
    else
    {
      if($password == $CPassword)
      {
        $InsertData = "INSERT INTO `student`(`Name`, `Regno`, `password`) VALUES ('$Name','$RegNo','$password')";
        $Query = mysqli_query($conn,$InsertData);
        if($Query)
        {
          echo "<script>alert('Your Account has been created successfully')</script>";
          header("location:student_login_form.php");
        }
        else
        {
          echo "Sorry! something went wrong";
        }
      }
      else
      {
        echo "<script>alert('Oops! Password do no mattched')</script>";
      }
    }
  }

?>




<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="signup_style.css">
<!------ Include the above in your HEAD tag ---------->

<div class="container-fluid register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>Sign Up Here as a Admin and Keep Your Password Private.</p>
                        <h6>Have an account? <a href="student_login_form.php">Login</a> Here</h6>
                    </div>
                    <div class="col-md-9 register-right">
                       
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Student Sign Up</h3>
                                <form method="POST">
                                  <div class="row register-form">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <input type="text" name="name" class="form-control" placeholder= "Name" value="" />
                                          </div>
                                          <div class="form-group">
                                              <input type="password" class="form-control" name="password" placeholder="Password" />
                                          </div>                                        
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <input type="text" class="form-control" name="RegisNo" placeholder="Registration No"  />
                                          </div>
                                          <div class="form-group">
                                              <input type="password"  class="form-control" name="cpassword" placeholder="Confirm Password" value="" />
                                          </div>
                                          <input type="submit" name="submit" class="btnRegister"  value="Register"/>
                                      </div>

                                  </div>
                            </form>
                            </div>
                          
                        </div>
                    </div>
                </div>

            </div>