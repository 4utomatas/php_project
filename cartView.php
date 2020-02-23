<!DOCTYPE html>
<html>
<head>
	<title>Krepšelis Yoda.lt</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="img/logo.png" rel="icon" type="image">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
    <!--Main stylesheet-->
    <link href="css/style.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <script src="https://use.fontawesome.com/9725526243.js"></script>
</head>
<body>
	<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar_collapse">
                	Menu
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Yoda.lt</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar_collapse">
                <ul class="nav navbar-nav navbar-right navbar_custom">
                    <li class="hidden">
                        <a href="index.php#page-top"></a>
                    </li>
					<li class="page-scroll">
						<a href="index.php#store">Parduotuvė</a>
					</li>
					
					<?php
					session_start();
					if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
					{
						echo '  <li class="page-scroll"> <a>'. $_SESSION['username'] .'</a> </li>
								<li class="page-scroll"> <a href="logout.php"> Atsijungti </a></li>';
					} else {
						echo '				
						<li class="page-scroll">
						<a href="login.php">Prisijungti</a>
						</li>
						<li class="page-scroll">
						<a href="register.php">Registruotis</a>
						</li>';
					}
					?>
					<li class="active">
						<a href="cartView.php">
							<i class="fa fa-shopping-cart"></i>
							Krepšelis
						</a>
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="container col-md-8" style="padding-top: 200px;">
	    <table class="table table-hover">
	   		<h1>Krepšelis </h1>
	   		<?php
	   			if(isset($_SESSION['i'])){
					$kiek = $_SESSION['i'];
					echo '<thead>
	   						<tr>
	   							<th>
	   								Pavadinimas
	   							</th>
	   							<th>
	   								Kaina
	   							</th>
	   							<th>
	   								Ištrinti
	   							</th>
	   						</tr>
	   					</thead>';
				}
				else {
					$kiek = 0;
					echo "<h1>Krepšelis tuščias</h1>";
				}

				$krepselis = array();
				$krepselis = array_fill(0, 100, null);
				//echo "kiek = $kiek";
				for($i = 0; $i < $kiek; $i++)
				{
					//echo "Session = " . $_SESSION['cart'][$i] . "<BR/>";
					if(isset($_SESSION['cart'][$i])){
						$sk = $_SESSION['cart'][$i];
					}
					//echo "sk = $sk <br/>";
					if(isset($sk)){
						$krepselis[$sk]++;
					}	
				}

				//var_dump($_SESSION['cart']);
				//var_dump($krepselis);
				include('connect.php');
		   		$sql = "SELECT pavadinimas, kaina, ID FROM yoda4";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					
				while($row = $result->fetch_assoc())
				{
						//echo " krepselis = " . $krepselis[$row['ID']]  . "<BR/>";
						//echo " row[id]  " . $row['ID'] . "<BR/>";
						$preke_i = 0;
						if(isset($krepselis[$row['ID']])) {
							for($i = $krepselis[$row['ID']]; $i > 0; $i--) 
							{
								echo "<tr> <th>" . $row['pavadinimas'] . "</th><th>" . $row['kaina'] . "</th> <th> 
									<form action='deleteItem.php' method='POST'>
									<input type='hidden' value='". $row['ID'] ."' name='id'>
									<input type='hidden' value='" . $row['kaina'] . "' name='kaina'>
									<button class='btn btn-default' type='submit'>
										<i class='fa fa-times-circle'></i>
									</button>
									</form></th></tr>";
								$preke_i++;
							}
						}
				}
						
				} else {
					echo "<H1>Prekių nėra</H1>";
				}
				$conn->close();
	   		?>
	    </table>
	    <h1 class="col-md-offset-8">
	    	Suma :
	    <?php
	    if(isset($_SESSION['cartsum'])){
	    echo $_SESSION['cartsum'];
		}
		else {
			echo 0;
		}

	    ?>
	    Eurų
	    </h1>
	    <div class="col-md-2 col-md-offset-6">
		    <button class="btn btn-default 
		    <?php
		    	if((isset($_SESSION['cartsum']) && $_SESSION['cartsum'] == 0) || (!isset($_SESSION['cartsum'])))
		    	{
		    		echo ' disabled';
		    	}
		    ?>
		    "> Atsiskaityti </button>
	    </div>
    </div>
</body>
</html>
	
