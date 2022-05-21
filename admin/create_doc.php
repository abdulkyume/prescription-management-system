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
  include "../require/dbconnect.php";
  if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $first_name = $_POST['f_name'];
    $last_name = $_POST['l_name'];
    $working = $_POST['working'];
    $degree = $_POST["degree"];
    $designation = $_POST["designation"];
    $working = $_POST['working'];
    $phone_no = $_POST['phone'];

    $sql = "SELECT email FROM `doctor` WHERE `email`='$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 0) {

      $password = "123456789";
      $hash = password_hash(
        $password,
        PASSWORD_DEFAULT
      );
      $sql2 = "INSERT INTO `doctor` (`email`, `first_name`, `last_name`, `currently_working`, `designation`, `degrees`, `phone_no`,`password`, `creation_date`) 
      VALUES ('$email', '$first_name', '$last_name', '$working', '$designation', '$degree', '$phone_no','$hash' ,current_timestamp())";

      $result = mysqli_query($conn, $sql2);
      
    } else {
      echo '<div class="alert alert-danger" role="alert">Email Address is already in Database!</div>';
    }
  }

  if (strlen($_SESSION['email']) > 0) {
    echo '<div class="container-fluid w-75 ms-auto me-auto">
    <div class="container">
    <div class="row">
    <div class="col-lg-12 text-center">
    <a href="admin_dash.php" class="btn btn-lg btn-danger">Home</a>
    </div>
      <div class="row justify-content-center">
        <center>
          <h1>
            Add Doctor Information
          </h1>
        </center>
        <form class="row g-3" method="POST" action="">
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">First Name</label>
            <input type="text" name="f_name" class="form-control" id="inputEmail4" required>
          </div>
          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Last Name</label>
            <input type="text" name="l_name" class="form-control" id="inputPassword4" required>
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="inputAddress" required> 
          </div>
          <div class="col-12">
            <label for="inputAddress2" class="form-label">Currently Working</label>
            <input type="text" name="working" class="form-control" id="inputAddress2" required>
          </div>
          <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Designation</label>
            <select class="form-select" name="designation" id="inputGroupSelect01" required>
              <option value="" selected>Choose...</option>
              <option value="Assistant professor">Assistant professor</option>
              <option value="Associate professor">Associate professor</option>
              <option value="Professor">Professor</option>
              <option value="Head of dept">Head of dept</option>
            </select>
          </div>
          <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
            <label class="input-group-text" for="inputGroupSelect01" required>Degrees</label>
            <input type="radio" class="btn-check" id="btnradio1" name="degree" value="MS " autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio1">MS</label>

            <input type="radio" class="btn-check" id="btnradio2" name="degree" value="FCPS " autocomplete="off" required>
            <label class="btn btn-outline-primary" for="btnradio2">FCPS</label>

            <input type="radio" class="btn-check" id="btnradio3" name="degree" value="FRCS " autocomplete="off" required>
            <label class="btn btn-outline-primary" for="btnradio3">FRCS</label>

            <input type="radio" class="btn-check" id="btnradio4" name="degree" value="MRCS-surgery " autocomplete="off" required>
            <label class="btn btn-outline-primary" for="btnradio4">MRCS-surgery</label>

            <input type="radio" class="btn-check" id="btnradio5" name="degree" value="FRCP " autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio5">FRCP</label>
          </div>
          <div class="col-md-12">
            <label for="inputCity" class="form-label">Phone Number</label>
            <input type="tel" name="phone" class="form-control" id="phn" placeholder="01234567890" pattern="[0-9]{11}" required>
          </div>
          <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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

</html>