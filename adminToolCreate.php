<?php

	$kaina = $_POST['kaina'];
	$pavadinimas = $_POST['name'];
	$aprasymas = $_POST['aprasymas'];
	$imageUrl = $_POST['image']; 
		include('connect.php');
		$sql = "INSERT INTO yoda4(pavadinimas, aprasymas, kaina, image) VALUES ('$pavadinimas','$aprasymas','$kaina', '$imageUrl');";
		if ($conn->multi_query($sql) === TRUE) { 
		    echo "<script>alert('Sukurta nauja preke');</script>";
		    header('Location: adminTool.php');
		} else { 
		    echo "Error: " . $sql . "<br>" . $conn->error; 
		} 	 
		$conn->close();

?>