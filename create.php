<?php
include ('connect.php');

$vardas = $_POST['namer'];
$epastas = $_POST['emailr'];
$slaptazodis = $_POST['passwordr'];
/*Tikrina ar nera tokiu paciu*/
$sql = "SELECT * FROM users WHERE emailas='$epastas'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
if($count == 0){
/*Jei nera padaro nauja irasa*/
$sql = "INSERT INTO users(vardas, passwordas, emailas) VALUES ('$vardas','$slaptazodis','$epastas');"; 
	if ($conn->multi_query($sql) === TRUE) { 
	    header('Location: index.php');
	} else { 
	    echo "Error: " . $sql . "<br>" . $conn->error; 
	} 	
}
else {
	session_name('wrongRegister');
	session_start();
	$_SESSION['wrongRegister'] = true;
	header("Location: register.php");
}
/*
$sql = "CREATE TABLE yoda4
(
ID int NOT NULL AUTO_INCREMENT,
aprasymas varchar(255) NOT NULL,
pavadinimas varchar(255),
image varchar(255),
kaina float,
PRIMARY KEY (ID)
);";
*/
$conn->close();

?>