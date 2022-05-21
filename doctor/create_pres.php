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

		<?php
		session_start();

		include '../require/dbconnect.php';
		$doctor_name = $_SESSION["email"];
		$patient_id = $_GET["id"];

		$sql = "SELECT * FROM `patient` WHERE `id`='$patient_id'";
		$result = mysqli_query($conn, $sql);

		$sql_1 = "SELECT * FROM `medicine`";
		$result_1 = mysqli_query($conn, $sql_1);

		if (isset($_POST['submit'])) {
			$meds_1 = $_POST["medicine_1"];
			$meds_2 = $_POST["medicine_2"];
			$meds_3 = $_POST["medicine_3"];



			$sql_2 = "SELECT * FROM `medicine` WHERE `doc_name`='$doctor_name' AND `meds_name` ='$meds_1'";
			$result_2 = mysqli_query($conn, $sql_2);

			if (!$result_2) {
				echo mysqli_error($conn);
			}
			while ($row = mysqli_fetch_assoc($result_2)) {

				$usage_1 = $row['usage'];
				$type_1 = $row['meds_type'];
			}
			$sql_3 = "SELECT * FROM `medicine` WHERE `doc_name`='$doctor_name' AND `meds_name` ='$meds_2'";
			$result_3 = mysqli_query($conn, $sql_3);

			while ($row = $result_3->fetch_assoc()) {

				$usage_2 = $row['usage'];
				$type_2 = $row['meds_type'];
			}
			$sql_4 = "SELECT * FROM `medicine` WHERE `doc_name`='$doctor_name' AND `meds_name` ='$meds_3'";
			$result_4 = mysqli_query($conn, $sql_4);
			while ($row = $result_4->fetch_assoc()) {

				$usage_3 = $row['usage'];
				$type_3 = $row['meds_type'];
			}

			$sql = "SELECT * FROM `patient` WHERE `id`='$patient_id'";
			$result = mysqli_query($conn, $sql);

			while ($row = $result->fetch_assoc()) {

				$first_name = $row['first_name'];
				$last_name = $row['last_name'];
				$age = $row['age'];
				$gender = $row['gender'];
				$address = $row['address'];
				$phone = $row['phone'];
				$full_name = $row['first_name'] . " " . $row['last_name'];
			}
			require('../assets/fpdf/fpdf.php');
			include_once('../require/print.php');

			$date = date('Y-m-d');

			$sqlp = "INSERT INTO `patient_history` (`patient_id`, `medi_name`, `date`) VALUES ('$patient_id', '$meds_1', '$date')";
			$sqlp1 = "INSERT INTO `patient_history` (`patient_id`, `medi_name`, `date`) VALUES ('$patient_id', '$meds_2', '$date')";
			$sqlp2 = "INSERT INTO `patient_history` (`patient_id`, `medi_name`, `date`) VALUES ('$patient_id', '$meds_3', '$date')";
			$sqlp3 = "DELETE FROM patient_history WHERE id NOT IN(SELECT MAX(id) FROM patient_history GROUP BY patient_id, medi_name, date);";
			$resultp = mysqli_query($conn, $sqlp);
			$resultp1 = mysqli_query($conn, $sqlp1);
			$resultp2 = mysqli_query($conn, $sqlp2);
			$resultp3 = mysqli_query($conn, $sqlp3);
		}
		?>


		<div class="container h-10 ">
			<div class="row h-100 justify-content-center align-items-center">
				<div class="col-10 col-md-8 col-lg-6">
					<h1 class="text-center">Prescription</h1>
					<form action="" method="post">
						<div class="input-group mb-3">
							<label class="input-group-text" for="inputGroupSelect01">medicine</label>
							<select class="form-select" name="medicine_1" id="inputGroupSelect01" required>
								<option value="">Choose...</option>

								<?php
								while ($row = $result_1->fetch_array()) {
								?>
									<option value="<?php echo $row['meds_name'] ?>"><?php echo $row['meds_name'] ?> </option>
								<?php
								}
								?>

							</select>
						</div>


						<?php
						include '../require/dbconnect.php';
						$sql_1 = "SELECT * FROM `medicine`";
						$result_1 = mysqli_query($conn, $sql_1);
						?>

						<div class="input-group mb-3">
							<label class="input-group-text" for="inputGroupSelect01">medicine</label>
							<select class="form-select" name="medicine_2" id="inputGroupSelect01">
								<option value="">Choose...</option>

								<?php
								while ($row = $result_1->fetch_array()) {
								?>
									<option value="<?php echo $row['meds_name'] ?>"><?php echo $row['meds_name'] ?> </option>
								<?php
								}
								?>

							</select>
						</div>

						<?php
						include '../require/dbconnect.php';
						$sql_1 = "SELECT * FROM `medicine`";
						$result_1 = mysqli_query($conn, $sql_1);
						?>

						<div class="input-group mb-3">
							<label class="input-group-text" for="inputGroupSelect01">medicine</label>
							<select class="form-select" name="medicine_3" id="inputGroupSelect01">
								<option value="">Choose...</option>

								<?php
								while ($row = $result_1->fetch_array()) {
								?>
									<option value="<?php echo $row['meds_name'] ?>"><?php echo $row['meds_name'] ?> </option>
								<?php
								}
								?>

							</select>
						</div>

						<button type="submit" name="submit" class="btn btn-secondary">Generate Prescription</button>
						<a class="btn btn-secondary" href="patient_table.php" role="button">Back To The Table</a>
					</form>
				</div>
			</div>
		</div>

		<div class="container-fluid mt-5">
			<div class="container">
				<div class="row justify-content-center">
					<center>
						<h3>
							Not Recommended
						</h3>
					</center>
				</div>
				<div class="row justify-content-center">
					<?php

					$prev_date = date("Y-m-d", strtotime("-6 Months"));
					$curr_date = date('Y-m-d');
					$sql_r = "SELECT * FROM `patient_history` WHERE  `patient_id`= '$patient_id' AND `date` BETWEEN '$prev_date' AND '$curr_date'";
					$result_r = mysqli_query($conn, $sql_r);

					echo '<div class="container-fluid mt-5"><div class="container"><div class="row justify-content-center">';
					echo '<table border="1" cellspacing="0" cellpadding="8" class="table text-center">';
					echo '<tr><td>Medicine Name</td><td>Prescribed Date</td></tr>';
					while ($row = mysqli_fetch_assoc($result_r)) {
						echo '<tr>';
						echo  '<td>' . $row['medi_name'] . '</td><td>' . $row['date'] . "</td>";
						echo '</tr>';
					}
					echo '</table>';
					echo '</div></div></div></div>';
					?>

				</div>
			</div>
		</div>


</body>

</html>