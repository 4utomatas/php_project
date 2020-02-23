<?php

	$name = $_POST['name1'];
	$password2 = $_POST['password1'];

	include('connect.php');
	
	$sql = "SELECT * FROM users WHERE emailas='$name' and passwordas='$password2'";
	$result = mysqli_query($conn, $sql);

	// Mysql_num_row is counting table row
	$count = mysqli_num_rows($result);
	
	$sql = "SELECT vardas FROM users WHERE emailas='$name' and passwordas='$password2'";

	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$vardas1 = $row["vardas"];
	}
	}

	// If result matched $username and $password, table row must be 1 row
	if($count == 1){
	    session_start();
	    $_SESSION['loggedin'] = true;
	    $_SESSION['username'] = $vardas1;
	    header("Location: index.php");
	}
	else {
		session_name('wronglogin');
		session_start();
		$_SESSION['wronglogin'] = true;
		header("Location: login.php");
	}
	$conn->close();
	/*
	session_start();
	if (match_found_in_database()) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username; // $username coming from the form, such as $_POST['username']
                                       // something like this is optional, of course
	}
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	    echo "Welcome to the member's area, " . $_SESSION['username'] . "!";
	} else {
	    echo "Please log in first to see this page.";
	}
	*/
	/*if( ($name == $row['name']) && ($password2 == $row['password'])) {
		header('index.php');
		echo "OPAAAAAAAAAAAAAAAAA";
	}
	else {
		echo "<script>alert('". $name . ", ". $password2 ."');</script>";
		header('login.php');
	}*/
?>
