<?php
	/*Pasigauna id itemo kuri reikia deletint*/
	$deleteID = $_POST['id'];
	session_start();
	//pagauna kiek yra prekiu
	$kiek = $_SESSION['i'];
	for($i = 0; $i < $kiek; $i++)
	{
		//randa preke cart'e
		echo "pries  ";
		echo $deleteID;
		var_dump($_SESSION['cart']);
		if($deleteID == $_SESSION['cart'][$i])
		{
			for($j = $i; $j < $kiek; $j++)
			{
				$_SESSION['cart'][$j] = $_SESSION['cart'][$j + 1];
			}
			break;
		}
		echo "po:  ";
		var_dump($_SESSION['cart']);
	}
	$_SESSION['i']--;
	$price = $_POST['kaina'];
	echo "kaina pries: " .  $_SESSION['cartsum'] . "</br>";
	$_SESSION['cartsum'] = $_SESSION['cartsum'] - $price;
	echo "kaina po: " .  $_SESSION['cartsum']  . "</br>";
	header('Location: cartView.php');
?>