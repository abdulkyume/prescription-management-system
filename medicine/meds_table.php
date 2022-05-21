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
  <div class="container h-10 ">
    <div class="row">
      <div class="col-lg-1">
      <a class="btn btn-danger" href="../doctor/doc_dash.php" role="button">Home</a>
      </div>
    </div>
    <div class="row h-100 justify-content-center align-items-center">
      <?php
      session_start();
      $doctor_name = $_SESSION["email"];
      include '../require/dbconnect.php';
      echo "<table class='table table-hover table-dark'>";
      echo "<thead>";
      echo " <tr>";
      echo " <th scope='col'>#</th>
      <th scope='col'>Assigned by</th>
      <th scope='col'>Medicine First Name</th>
      <th scope='col'>Indication</th>
      <th scope='col'>Usage</th>
      <th scope='col'>Side Efects</th>
      <th scope='col'>Medicine Type</th>
      <th scope='col'>Action</th>";
      echo "</tr>";
      echo "</thead>";

      $sql = "SELECT * FROM `medicine` where `doc_name`='$doctor_name'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['doc_name'] . "</td>";
          echo "<td>" . $row['meds_name'] . "</td>";
          echo "<td>" . $row['indication'] . "</td>";
          echo "<td>" . $row['usage'] . "</td>";
          echo "<td>" . $row['sideeffects'] . "</td>";
          echo "<td>" . $row['meds_type'] . "</td>";
          echo "<td><a onClick=\"javascript: return confirm('Please confirm deletion');\" href='../common/delete_doc.php?role=delete_meds&id=$row[id]' style='background: #FF0000 ' class='btn btn-info' <button class='btn btn-info' >Delete</button> </td>";
        }
      }

      ?>
    </div>
  </div>
</body>

</html>