<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/bootstrap.css" />
	<link rel="stylesheet" href="../assets/css/style.css" />
	<title>Admin Dashboard</title>
</head>

<body>
	<?php
	session_start();
	if (strlen($_SESSION['email']) > 0) {
		echo '<div class="container-fluid w-75 ms-auto me-auto bg-danger ">
		<div class="container">
			<div class="row justify-content-center text-center text-white">
				<h1>Admin Dashboard</h1>
			</div>
		</div>
	</div>
	<div class="container-fluid w-75 ms-auto me-auto mt-5">
		<div class="container">
			<div class="row justify-content-center text-center">
				<a href="create_doc.php" class="btn btn-secondary mb-2" role="button" data-bs-toggle="button">
					Create Doctor Account
				</a>
				<a href="doctor_table.php" class="btn btn-secondary mb-2" role="button" data-bs-toggle="button">
					Doctor List
				</a>
				<a href="../logout.php" class="btn btn-danger" aria-current="page">Logout</a>
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