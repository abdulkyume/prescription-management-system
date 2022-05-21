<?php

include '../require/dbconnect.php';

$id = $_GET['id'];
$email = $_GET['email'];
$role = $_GET['role'];
if ($role == "delete") {

	$sql = "DELETE FROM `doctor` WHERE `doctor`.`id` = '$id' AND `doctor`.`email` = '$email'";

	$result = mysqli_query($conn, $sql);
	header("Location: ../admin/doctor_table.php");
} else if ($role == "delete_patient") {
	$sql2 = "DELETE FROM `patient` WHERE `patient`.`id` = '$id'";

	$result = mysqli_query($conn, $sql2);
	header("Location: ../doctor/patient_table.php");
	exit();
} else if ($role == "delete_meds") {
	$sql2 = "DELETE FROM `medicine` WHERE `medicine`.`id` = '$id'";

	$result = mysqli_query($conn, $sql2);
	header("Location: ../doctor/meds_table.php");
	exit();
}
