<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Add Doctor Information</title>
</head>

<body>
  <?php

  session_start();


  $id = $_GET["id"];
  $email = $_GET["email"];

  include '../require/dbconnect.php';

  if (isset($_POST["submit"])) {
    if ($_POST["password"] == $_POST["cpassword"]) {
      $password = $_POST["password"];

      $hash = password_hash(
        $password,
        PASSWORD_DEFAULT
      );
      $sql2 = "UPDATE `doctor` SET `password` = '$hash' WHERE `doctor`.`id` = '$id' AND `doctor`.`email` = '$email'";

      $result = mysqli_query($conn, $sql2);
      echo '<div class="alert alert-secondary" role="alert"> Password is Updated!</div>';
    }
  }

  if(strlen($_SESSION['email'])>0)
  {
    echo '<div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-lg-1">
        <a href="./doc_dash.php" class="btn btn-lg btn-primary">Home</a>
        </div>
      </div>
    </div>
  </div>
  <div class="container ">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 col-md-12 col-lg-12">
        <h1 class="text-center">Update Password</h1>
        <form class="row justify-content-center align-items-center mt-5" method="post">
          <div class="col-auto">
            <input type="password" name="password" class="form-control" placeholder="New Password">
          </div>
          <div class="col-auto">
            <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password">
          </div>
          <div class="col-auto">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>';
  }

  else
  {
    header("Location: ../index.html");
  }
  ?>
  

</body>