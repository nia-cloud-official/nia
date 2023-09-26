
<?php
session_start();

if(  isset($_SESSION['username']) )
{
  header("location:../views/index.php");
  die();
}
//connect to database
$db=mysqli_connect("localhost","root","","nia");
if($db)
{
  if(isset($_POST['login_btn']))
  {
      $username=mysqli_real_escape_string($db,$_POST['username']);
      $password=mysqli_real_escape_string($db,$_POST['password']);
      $password=md5($password); //Remember we hashed password before storing last time
      $sql="SELECT * FROM users WHERE  username='$username' AND password='$password'";
      $result=mysqli_query($db,$sql);
      
      if($result)
      {
     
        if( mysqli_num_rows($result)>=1)
        {
            $_SESSION['message']="You are now Loggged In";
            $_SESSION['username']=$username;
            $_SESSION['email']=$email;
            header("location:../views/index.php");
        }
       else
       {
              $_SESSION['message']="Login Error , Wrong username or Password";
       }
      }
  }
}
?>

<head> 
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

<div class="container" style="height:500px;padding-top:50px;">
    <?php
    if(isset($_SESSION['message']))
    {
    echo "<center><div
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
    <div class='toast-body'>Wrong username or Password , Please try again.</div>
  </div></center>";
  unset($_SESSION['message']);
    }

   
?>
<br>
<center>
              <div class="row" style="width:500px;">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Login to Nia</h5>
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
                        <!--<div class="mb-3">
                          <label class="form-label" for="basic-icon-default-company">Company</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"
                              ><i class="bx bx-buildings"></i
                            ></span>
                            <input
                              type="text"
                              id="basic-icon-default-company"
                              class="form-control"
                              placeholder="ACME Inc."
                              aria-label="ACME Inc."
                              aria-describedby="basic-icon-default-company2"
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
                              placeholder="john.doe"
                              aria-label="john.doe"
                              aria-describedby="basic-icon-default-email2"
                            />
                            <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                          </div>
                          <div class="form-text">You can use letters, numbers & periods</div>
                        </div>-->
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
                        <center>
                           <button type="submit" name="login_btn" class="btn btn-primary">Login</button> 
                           <br>
                           <br>
                           <a href="./register.php">Create Account</a>
                        </center>
                        
                      </form>
                    </div>
                  </div>
</div>

</center>
<br>
       

    </div>

      <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../views/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../views/assets/vendor/libs/popper/popper.js"></script>
    <script src="../views/assets/vendor/js/bootstrap.js"></script>
    <script src="../views/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../views/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../views/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../views/assets/js/ui-toasts.js"></script>