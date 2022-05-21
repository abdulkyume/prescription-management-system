<!doctype html>
        
    <html lang="en">

<?php

	$servername = "localhost";
	$username = "root";
	$password = "";


$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$sql = "CREATE DATABASE prescription";
if (mysqli_query($conn, $sql)) {
$sql="CREATE TABLE `prescription`.`admin` ( `id` INT NOT NULL AUTO_INCREMENT , `email` VARCHAR(30) NOT NULL , `password` VARCHAR(90) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

if ($conn->query($sql) === TRUE) {
  echo "Table admin created successfully";
  $sql2="CREATE TABLE `prescription`.`doctor` ( `id` INT NOT NULL AUTO_INCREMENT , `email` VARCHAR(30) NOT NULL , `first_name` TEXT NOT NULL , `last_name` TEXT NOT NULL , `currently_working` TEXT NOT NULL , `designation` TEXT NOT NULL , `degrees` TEXT NOT NULL , `bmdc_no` TEXT NOT NULL , `phone_no` TEXT NOT NULL , `password` VARCHAR(99) NOT NULL DEFAULT '123456789' , `creation_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`, `email`(30))) ENGINE = InnoDB;";
  if ($conn->query($sql2) === TRUE) {
	   echo " Doctor Table created successfully";
	   $sql3="CREATE TABLE `prescription`.`patient` ( `id` INT NOT NULL AUTO_INCREMENT , `first_name` TEXT NOT NULL , `last_name` TEXT NOT NULL , `email` VARCHAR(30) NOT NULL , `age` TEXT NOT NULL , `address` TEXT NOT NULL ,`gender` TEXT NOT NULL , `patient_data` TEXT NOT NULL , `phone` TEXT NOT NULL , `assign_doctor` TEXT NOT NULL , `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
  if ($conn->query($sql3) === TRUE) {
	  echo " Patient Table created successfully";
	  $sql4="CREATE TABLE `prescription`.`medicine` ( `id` INT NOT NULL AUTO_INCREMENT ,`doc_name` TEXT NOT NULL , `meds_first_name` TEXT NOT NULL , `meds_last_name` TEXT NOT NULL , `indication` TEXT NOT NULL , `usage` TEXT NOT NULL , `instruction` TEXT NOT NULL , `meds_type` TEXT NOT NULL , `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
	  
	  if ($conn->query($sql4) === TRUE) {
		  
		  echo " Medicine Table created successfully";
		  
	  }
  }
  }
} 
else {
  echo "Error creating table: " . $conn->error;
}
}
 else {
  echo "Error creating database: " . mysqli_error($conn);
  
}

mysqli_close($conn);


?>



      
  