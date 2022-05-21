<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/bootstrap.css" />
  <link rel="stylesheet" href="../assets/css/style.css" />
  <title>Doctor Dashboard</title>
</head>

<body>

  <?php
  session_start();

  include '../require/dbconnect.php';


  if (strlen($_SESSION["email"]) > 0) {
    $email = $_SESSION["email"];
    $sql_1 = "SELECT  * FROM `doctor` WHERE `email`='$email'";
    $result_1 = mysqli_query($conn, $sql_1);
    while ($row = $result_1->fetch_assoc()) {
      $doctor_name = $row['first_name'] . " " . $row['last_name'];
      echo '  
<div class="container-fluid w-75 ms-auto me-auto">
  <div class="container">
    <div class="row justify-content-center">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand">Doctor Dashboard</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"> 
                <a class="nav-link active" aria-current="page" href="../common/update_doc_info.php?role=update&email=' . $row['email'] . '&id=' . $row['id'] . '.">Update Profile</a>
              </li>
              <li class="nav-item"> 
                <a class="nav-link" href="change_password.php?role=update&email=' . $row['email'] . '&id=' . $row['id'] . '.">Change Password</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-danger" href="../logout.php" role="button">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div class="row justify-content-center">
      <center><h2>Welcome <br>' . $doctor_name . ' </h2></center>
    </div>
  </div>
</div>
';
    }
  }
  else
  {
    header("Location : ../index.html");
  }
  ?>
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-6">
      <div class="col text-center">
        <br>
        <a href="add_patient_info.php" class="btn btn-secondary mb-2" role="button" data-bs-toggle="button">Add patient Information</a>
        <a href="patient_table.php" class="btn btn-secondary mb-2" role="button" data-bs-toggle="button">Patient List</a>
        <a href="../medicine/add_meds_info.php" class="btn btn-secondary mb-2" role="button" data-bs-toggle="button">Add Medicine Info</a>
        <a href="../medicine/meds_table.php" class="btn btn-secondary mb-2" role="button" data-bs-toggle="button">Medicine List</a>
      </div>
    </div>
  </div>
</body>

</html>