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
<div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-lg-1">
          <a href="../doctor/doc_dash.php" class="btn btn-lg btn-danger">Home</a>
        </div>
      </div>
    </div>
  </div>

  <?php

  session_start();

  include '../require/dbconnect.php';
  if(isset($_POST["submit"]))
  {
    $doctor_name = $_SESSION["email"];

    $meds_f_name = $_POST["f_name"];
    $indication = $_POST["indication"];
    $usage = $_POST["usage"];
    $sideeffects = $_POST["sideeffects"];
    $medicine_type = $_POST["medicine_type"];
    $sql2 = "INSERT INTO `medicine` (`doc_name`, `meds_name`, `indication`, `usage`, `sideeffects`, `meds_type`, `date`) VALUES ('$doctor_name', '$meds_f_name', '$indication', '$usage', '$sideeffects', '$medicine_type', current_timestamp());";
    $result = mysqli_query($conn, $sql2);
    if(!$result)
    {
      echo mysqli_error($conn);
    }
    else
    {
      echo '<div class="alert alert-success" role="alert">Medicine data successfully Added!</div>';
    }
    
  }
  ?>

  <div class="container h-10 ">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-10 col-md-8 col-lg-6">
        <h1 class="text-center">Add Medicine Information</h1>
        <form action="add_meds_info.php" method="post">
          <div class="row">
            <div class="col">
              <input type="text" name="f_name" class="form-control" placeholder="Medicine name" aria-label="First name" required>
              <br>
            </div>
            <div class="input-group mb-3">
              <label class="input-group-text" for="inputGroupSelect01">Medicine Type</label>
              <select class="form-select" name="medicine_type" id="inputGroupSelect01" required>
                <option value="" selected>Choose...</option>
                <option value="Tablet">Tablet</option>
                <option value="Capsules">Capsules</option>
                <option value="Suppositories">Suppositories</option>
                <option value="Liquid">Liquid</option>
                <option value="Drops">Drops</option>
                <option value="Injections">Injections</option>
              </select>
            </div>
            <div class="form-floating">
              <textarea class="form-control" name="indication" placeholder="Indications" id="floatingTextarea" required></textarea>
              <label for="floatingTextarea">Indications</label>
            </div>
            <p>
            <div class="form-floating">
              <textarea class="form-control" name="usage" placeholder="Usage" id="floatingTextarea" required></textarea>
              <label for="floatingTextarea">Usage</label>
            </div>
            <p>
            <div class="form-floating">
              <textarea class="form-control" name="sideeffects" placeholder="Side Effects" id="floatingTextarea" required></textarea>
              <label for="floatingTextarea">Side Effects</label>
            </div>
            <p>
            <div class="d-grid gap-2">
              <button type="submit" name="submit" class="btn btn-outline-secondary">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>