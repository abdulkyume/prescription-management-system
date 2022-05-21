<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/bootstrap.css" />
  <link rel="stylesheet" href="./assets/css/style.css" />
  <title>Login</title>
</head>

<body>
  <?php
  session_start();
  include './require/dbconnect.php';

  if (isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = $_POST["pass"];
    $sql1 = "Select * from admin where email='$email'";
    $sql2 = "Select * from doctor where email='$email'";

    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);

    $num1 = mysqli_num_rows($result1);
    $num2 = mysqli_num_rows($result2);

    if ($num1 < 1 && $num2 < 1) {
      echo "email or password incorrect";
    } else {
      if ($num1 > 0) {
        $sql3 = "Select email,password from admin where email='$email'";
        $result = mysqli_query($conn, $sql3);
        while ($row = $result->fetch_assoc()) {
          $_SESSION['email']=$row['email'];
          if (password_verify($password, $row['password'])) {
            header("Location: ./admin/admin_dash.php");
            exit();
          } else {
            echo "not matched";
          }
        }
      } elseif ($num2 > 0) {
        $sql4 = "Select email,password from doctor where email='$email'";
        $result = mysqli_query($conn, $sql4);
        while ($row = $result->fetch_assoc()) {
          $_SESSION['email']=$row['email'];
          if (password_verify($password, $row['password'])) {
            header("Location: ./doctor/doc_dash.php");
            exit();
          } else {
            echo "not matched";
          }
        }
      }
    }
  }

  ?>

  <div class="container-fluid w-75 ms-auto me-auto">
    <div class="container">
      <div class="row justify-content-center text-center text-white bg-danger">
        <h1>Login</h1>
      </div>
    </div>
  </div>

  <div class="container-fluid w-75 ms-auto me-auto mt-17">
    <div class="container">
      <div class="row justify-content-center">
        <form method="POST" action="">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <p><?php $er ?></p>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>

</body>

</html>