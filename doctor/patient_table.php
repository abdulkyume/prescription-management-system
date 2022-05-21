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
  <div class="container h-10 ">
    <div class="row">
      <div class="col-lg-1">
        <a class="btn btn-danger" href="doc_dash.php" role="button">Home</a>
      </div>
    </div>
    <div class="row h-100 justify-content-center align-items-center">

      <?php
      session_start();
      if (strlen($_SESSION["email"]) > 0) {
        $email = $_SESSION["email"];
        echo "<table class='table table-hover table-dark'>";
        echo "<thead>";
        echo " <tr>";
        echo " <th scope='col'>#</th>
        <th scope='col'>First Name</th>
        <th scope='col'>Last Name</th>
        <th scope='col'>Age</th>
        <th scope='col'>Gender</th>
        <th scope='col'>Patient Complexity(Briefly)</th>
        <th scope='col'>Patient Address No</th>
        <th scope='col'>Phone No</th>
        <th scope='col'>Assign Doctor</th>
        <th scope='col'>Action</th>";
        echo "</tr>";
        echo "</thead>";


        include '../require/dbconnect.php';
        $sql = "SELECT * FROM `patient` where `assign_doctor`='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['patient_data'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['assign_doctor'] . "</td>";
            echo "<td>
          <a href='update_patient_info.php?role=update&ch=$row[email]' class='btn btn-success' >Edit</a>
          <a onClick=\"javascript: return confirm('Please confirm deletion');\" href='../common/delete_doc.php?role=delete_patient&id=$row[id]'  class='btn btn-danger'>Delete</a>
          <a href='../patient/history.php?role=create&ch=$row[email]&id=$row[id]'  ' class='btn btn-info' >History</a>
          <a href='create_pres.php?role=create&ch=$row[email]&id=$row[id]'  ' class='btn btn-info' >Prescribe</a>
          </td>";

            $_SESSION["email_patient"] = $row['email'];
            $_SESSION["role"] = "update";
            $_SESSION["patient_id"] = $row['id'];
          }
        }
      } else {
        header("Location : ../index.html");
      }

      ?>
    </div>

</html>