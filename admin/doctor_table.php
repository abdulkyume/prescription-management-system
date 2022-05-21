<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/bootstrap.css" />
  <link rel="stylesheet" href="../assets/css/style.css" />
  <title>Doctor List</title>
</head>

<body>
  <div class="container-fluid w75 ms-auto me-auto mt-5">
    <div class="container">
      <div class="row ">
        <div class="col-lg-1">
          <a href="admin_dash.php" class="btn btn-lg btn-danger">Home</a>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid w75 ms-auto me-auto mt-5">
    <div class="container">
      <div class="row justify-content-center">
        <center>
          <h1>
            Doctors List
          </h1>
        </center>
      </div>
    </div>
  </div>
  <div class="container-fluid w75 ms-auto me-auto mt-5">
    <div class="container">
      <div class="row">
        <table class="table table-hover">
          <?php
          session_start();
          include '../require/dbconnect.php';
          if (strlen($_SESSION['email']) > 0) {
            echo "<thead>";
            echo " <tr>";
            echo " <th scope='col'>#</th>
            <th scope='col'>First Name</th>
            <th scope='col'>Last Name</th>
            <th scope='col'>Currently Working</th>
            <th scope='col'>Designation</th>
            <th scope='col'>Degrees</th>
            <th scope='col'>Phone No</th>
            <th scope='col'>Action</th>";
            echo "</tr>";
            echo "</thead>";
            $sql = "SELECT * FROM `doctor`";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['currently_working'] . "</td>";
                echo "<td>" . $row['designation'] . "</td>";
                echo "<td>" . $row['degrees'] . "</td>";
                echo "<td>" . $row['phone_no'] . "</td>";
                echo "<td>
                <a href='../common/update_doc_info.php?role=update&email=$row[email]&id=$row[id]' class='btn btn-secondary' >Edit Info</a>
                <a onClick=\"javascript: return confirm('Please confirm deletion');\" href='../common/delete_doc.php?role=delete&email=$row[email]&id=$row[id]' class='btn btn-danger'> 
                Delete
                </a>
                </td>";
              }
            }
          } else {
            header("Location: ../index.html");
          }
          ?>
        </table>
      </div>
    </div>
  </div>
</body>

</html>