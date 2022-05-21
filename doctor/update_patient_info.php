<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Patient Information</title>
</head>

<body>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-lg-1">
          <a href="./doc_dash.php" class="btn btn-lg btn-danger">Home</a>
        </div>
        <div class="col-lg-2">
          <a href="./patient_table.php" class="btn btn-lg btn-danger">Pateinet List</a>
        </div>
      </div>
    </div>
  </div>
  <?php
  session_start();
  include '../require/dbconnect.php';

  $patient_id = $_SESSION["patient_id"];

  $patient_role = $_SESSION["role"];

  if (isset($_POST['submit'])) {
    $patient_f_name = $_POST["f_name"];
    $patient_l_name = $_POST["l_name"];

    $patient_age = $_POST["age"];
    $patient_address = $_POST["address"];
    $patient_data = $_POST["patient_data"];
    $patient_phone = $_POST["phone"];
    $gender = $_POST['gender'];

    $sql2 = "UPDATE `patient` SET `first_name` = '$patient_f_name', `last_name` = '$patient_l_name', `age` = '$patient_age', `address` = '$patient_address', `gender` = '$gender', `patient_data` = '$patient_data', `phone` = '$patient_phone' WHERE `patient`.`id` =$patient_id";
    $result = mysqli_query($conn, $sql2);
    echo '<div class="alert alert-success" role="alert">Patient data successfully updated!</div>';
  }
  $sql1 = "SELECT * FROM `patient` WHERE `id` =$patient_id";
  $result1 = $conn->query($sql1);
  while ($row = $result1->fetch_assoc()) {
    echo '<div class="container h-10 ">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-10 col-md-8 col-lg-6">
        <h1 class="text-center">Update Patient Information</h1>
        <form action="update_patient_info.php" method="post">
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" name="f_name" placeholder="Patient First name" aria-label="First name" required value="'.$row['first_name'].'">
            </div>
            <div class="col">
              <input type="text" class="form-control" name="l_name" placeholder="Patient Last name" aria-label="Last name" required value="'.$row['last_name'].'">
              <br>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="age" id="floatingInput" placeholder="@Age" required value="'.$row['age'].'">
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
              <textarea class="form-control" name="address" id="floatingTextarea" required >'.$row['address'].'</textarea>
              <label for="floatingTextarea">Address</label>
            </div>
            <p>
            <div class="form-floating">
              <textarea class="form-control" name="patient_data" placeholder="complication" id="floatingTextarea" required>'.$row['patient_data'].'</textarea>
              <label for="floatingTextarea">What Complication Patient facing?</label>
            </div>
            <p>
            <div class="form-floating mb-3">
              <input type="tel" class="form-control" name="phone" id="floatingInput" placeholder="01234567890" pattern="[0-9]{11}" required value="'.$row['phone'].'">
              <label for="floatingInput">Phone No</label>
            </div>
            <div class="d-grid gap-2">
              <button type="submit" name="submit" class="btn btn-outline-secondary">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>';
  }
  ?>
</body>

</html>