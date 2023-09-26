<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nia | Register</title> 
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../views/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../views/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../views/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../views/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../views/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../views/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../views/assets/js/config.js"></script>
  </head>
<body>
<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","nia");
if(isset($_POST['register_btn']))
{
    error_reporting(0);
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $phone=mysqli_real_escape_string($db,$_POST['phone']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $password2=mysqli_real_escape_string($db,$_POST['password2']);  
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result=mysqli_query($db,$query);
      if($result)
      {
     
        if( mysqli_num_rows($result) > 0)
        {
                
                echo '<script language="javascript">';
                echo 'alert("Account already exists Please Login")';
                echo '</script>';
        }
        
          else
          {
            
            if($password==$password2)
            {           //Create User
                $password=md5($password); //hash password before storing for security purposes
                $sql="INSERT INTO users(username, email, password,phone) VALUES('$username','$email','$password','$phone')"; 
                mysqli_query($db,$sql);  
                $_SESSION['message']="You are now logged in"; 
                $_SESSION['username']=$username;
                $_SESSION['email']   =$email;
                $_SESSION['phone']   =$phone;
                header("location:../views/index.php");  //redirect home page
            }
            else
            {
                $_SESSION['message']="The two password do not match";   
            }
          }
      }
}
?>

<div class="container" style="height:500px;padding-top:50px;">
<?php
    if(isset($_SESSION['message']))
    {
         echo  "<center><div
         class='bs-toast toast fade show bg-danger'
         role='alert'
         aria-live='assertive'
         aria-atomic='true'
       >
         <div class='toast-header'>
           <i class='bx bx-bell me-2'></i>
           <div class='me-auto fw-semibold'>Error</div>
           <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
         </div>
         <div class='toast-body'>Your Passwords do not work , Please try again.</div>
       </div></center>";
         unset($_SESSION['message']);
    }
?>

<center>
              <div class="row" style="width:500px;">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Create a Nia Account</h5>
                      <small class="text-muted float-end"></small>
                    </div>
                    <div class="card-body">
                      <form method="POST" action="#">
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Username</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                            ></span>
                            <input
                              type="text"
                              class="form-control"
                              id="basic-icon-default-fullname"
                              aria-label="Your  Username"
                              aria-describedby="basic-icon-default-fullname2"
                              placeholder="Username" 
                              name="username"
                            />
                          </div>
                        </div>
                        
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-email">Email</label>
                          <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input
                              type="text"
                              id="basic-icon-default-email"
                              class="form-control"
                              placeholder="your@email.com"
                              aria-label="your email"
                              aria-describedby="basic-icon-default-email2"
                              name="email"
                            />
                            <span id="basic-icon-default-email2" class="input-group-text"></span>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-phone">Phone</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"
                              ><i class="bx bx-phone"></i
                            ></span>
                            <input
                              type="tel"
                              id="basic-icon-default-phone"
                              class="form-control phone-mask"
                              placeholder="Phone Number"
                              aria-label="Your Phone Number"
                              name="phone"
                            />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-phone">Password</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"
                              ><i class="bx bx-key"></i
                            ></span>
                            <input
                              type="password"
                              id="basic-icon-default-phone"
                              class="form-control phone-mask"
                              placeholder="Password"
                              aria-label="Your Password"
                              name="password"
                            />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-phone">Confirm Password</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"
                              ><i class="bx bx-key"></i
                            ></span>
                            <input
                              type="password"
                              id="basic-icon-default-phone"
                              class="form-control phone-mask"
                              placeholder="Confirm Password"
                              aria-label="Your Password"
                              name="password2"
                            />
                          </div>
                        </div>
                        <center>
                           <button type="submit" name="register_btn" class="btn btn-primary">Create</button> 
                           <br>
                           <br>
                           <a href="./login.php">Login</a>
                        </center>
                        
                      </form>
                    </div>
                  </div>
</div>

</center>
</body>
</html>