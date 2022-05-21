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

  include '../require/dbconnect.php';

  if (strlen($_SESSION["email"]) > 0) {
    $email_doctor = $_SESSION["email"];

    if (isset($_POST['submit'])) {
      $patient_f_name = $_POST["f_name"];
      $patient_l_name = $_POST["l_name"];
      $patient_email = $_POST["email"];
      $patient_age = $_POST["age"];
      $patient_address = $_POST["address"];
      $patient_data = $_POST["patient_data"];
      $patient_phone = $_POST["phone"];
      $gender = $_POST['gender'];
      $email_doctor = $_SESSION["email"];


      $sql2 = "INSERT INTO `patient` ( `first_name`, `last_name`, `email`, `age`, `address`, `gender`, `patient_data`,  `phone`, `assign_doctor`, `date`) VALUES ('$patient_f_name', '$patient_l_name', '$patient_email', '$patient_age', '$patient_address','$gender','$patient_data', '$patient_phone', '$email_doctor', current_timestamp())";

      $result = mysqli_query($conn, $sql2);
      if (!$result) {
        echo mysqli_error($conn);
      } else {
        echo 'Data Added';
      }
    }
    echo '<div class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="col-lg-1">
            <a href="./doc_dash.php" class="btn btn-lg btn-danger">Home</a>
          </div>
        </div>
      </div>
    </div>
  
    <div class="container h-10 ">
      <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
          <h1 class="text-center">Add Patient Information</h1>
          <form action="" method="post">
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" name="f_name" placeholder="Patient First name" aria-label="First name" required>
              </div>
              <div class="col">
                <input type="text" class="form-control" name="l_name" placeholder="Patient Last name" aria-label="Last name" required>
                <br>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="age" id="floatingInput" placeholder="Age" required>
                <label for="floatingInput">Age</label>
              </div>
              <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Gender</label>
                <select class="form-select" name="gender" id="inputGroupSelect01" required>
                  <option value="" selected>Choose...</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
              <div class="form-floating">
                <textarea class="form-control" name="address" placeholder="Address" id="floatingTextarea" required></textarea>
                <label for="floatingTextarea">Address</label>
              </div>
              <p>
              <div class="form-floating">
                <textarea class="form-control" name="patient_data" placeholder="complication" id="floatingTextarea" required></textarea>
                <label for="floatingTextarea">What Complication Patient facing?</label>
              </div>
              <p>
              <div class="form-floating mb-3">
                <input type="tel" class="form-control" name="phone" id="floatingInput" placeholder="01234567890" pattern="[0-9]{11}" required>
                <label for="floatingInput">Phone No</label>
              </div>
              <div class="d-grid gap-2">
                <input type="submit" name="submit" class="btn btn-outline-secondary" value="submit">
              </div>
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