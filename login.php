<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
 $username = $_POST['username'];
 $password = $_POST['password'];
 $errorUsername = "";
 $errorPassword = "";

 $loginSuccsess = true;

 if (empty($username)) {
  $errorUsername = "Username is required";
  $loginSuccsess = false;
 }
 if (empty($password)) {
  $errorPassword = "Password is required";
  $loginSuccsess = false;
 }
 if ($loginSuccsess) {
  $_SESSION['username'] = $username;
  $_SESSION['password'] = $password;
  $_SESSION['dept'] = "Administration";

  header("location: index.php");
 }
}

?>
<!DOCTYPE html>
<html>

<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>Log in</title>

 <style>
  .error {
   color: red;
  }
 </style>
 <!-- Tell the browser to be responsive to screen width -->
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
 <!-- Ionicons -->
 <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 <!-- icheck bootstrap -->
 <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
 <!-- Theme style -->
 <link rel="stylesheet" href="dist/css/adminlte.min.css">
 <!-- Google Font: Source Sans Pro -->
 <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
 <div class="login-box">
  <div class="login-logo">
   <a href="#"><b>Hospital</b> portal</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
   <div class="card-body login-card-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
     <div class="input-group mb-3">
      <input type="username" name="username" class="form-control" placeholder="Username">

      <div class="input-group-append">
       <div class="input-group-text">
        <span class="fas fa-envelope"></span>
       </div>
      </div>
     </div>
     <p class="error">
       <?php if (isset($errorUsername)) echo $errorUsername; ?>
      </p>
     <div class="input-group mb-3">
      <input type="password" name="password" class="form-control" placeholder="Password">
      <div class="input-group-append">
       <div class="input-group-text">
        <span class="fas fa-lock"></span>
       </div>
      </div>
     </div>
     <p class="error">
       <?php if (isset($errorPassword)) echo $errorPassword; ?>
      </p>
     <div class="row">
      <div class="col-8"></div>
      <!-- /.col -->
      <div class="col-4">
       <input type="submit" value="Sign In" class="btn btn-primary btn-block btn-flat" name="signIn">
      </div>
      <!-- /.col -->
     </div>
    </form>
   </div>
   <!-- /.login-card-body -->
  </div>
 </div>
 <!-- /.login-box -->

 <!-- jQuery -->
 <script src="plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>