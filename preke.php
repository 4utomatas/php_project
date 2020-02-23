<!DOCTYPE html>
<html>
<head>
	<title>
		Yoda.lt
	</title>
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
<body class="index" data-spy="scroll" data-target=".navbar" data-offset="60">
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
                        <a href="#page-top"></a>
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
					<li>
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
<?php
	if(isset($_GET['ID']))
	{
		$id1 = $_GET['ID'];
		$_SESSION['preke_id'] = $id1;
		include('connect.php');
		$sql = "SELECT * FROM yoda4 WHERE ID=$id1";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$conn->close();
	}
	else if(isset($_SESSION['preke_id']))
	{
		$id1 = $_SESSION['preke_id'];
		include('connect.php');
		$sql = "SELECT * FROM yoda4 WHERE ID=$id1";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$conn->close();
	}

?>
<section>
	<div class="container">
	<h1> 
	<?php
		echo $row['pavadinimas'];
	?>
	</h1>
		<div class="row">
			<div class="col-md-6">
				<h3 class="text-left">
					<?php
						echo $row['aprasymas'];
					?>
				</h3>
				<h3 class="text-center" style="margin-top:50px;"> €
				<?php
					echo $row['kaina'];
				?>
				</h3>
				<form action="cart.php" method="POST" class="text-center">
					<input type="hidden" value="
					<?php
						echo $row['ID'];
					?>
					" name="ID">
					
				
			</div>
			<div class="col-md-6 text-center">
				<img class="storeImage" src="
				<?php
					echo $row['image'];
				?>">
				<div class="container-fluid">
				<button class="btn btn-default" type="submit">
						Pridėti į krepšelį
				</button>
				</form>
				</div>
			</div>
		</div>
	</div>
</section>
</body>
</html>
