<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Patient History</title>
</head>

<body>
    <div class="container-fluid mt-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <a class="btn btn-danger" href="../doctor/patient_table.php" role="button">Patient List</a>
                </div>
                <h1 class="text-center">Patient's History</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <table class="table text-center">
                    <tr>
                        <td>History</td>
                        <td>Prescribed Medicine</td>
                        <td>Prescribed Date</td>
                    </tr>
                    <?php
                    session_start();

                    include '../require/dbconnect.php';

                    $sql = "SELECT patient.first_name, patient.last_name, patient.patient_data, patient_history.medi_name, patient_history.date FROM patient_history, patient WHERE patient_history.patient_id=patient.id;";
                   
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '
                            <tr>
                            <td>' . $row['patient_data'] . '</td>
                            <td>' . $row['medi_name'] . '</td>
                            <td>' . $row['date'] . '</td>
                            </tr>';
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>