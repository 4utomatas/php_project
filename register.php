<!DOCTYPE html>
<html>
<head>
	<title>Yoda.lt</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rengarmacia</title>
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
</head>
<body>
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar_collapse">
                    Menu
                </button>
                <a class="navbar-brand page-scroll" href="index.php">Yoda.lt</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar_collapse">
                <ul class="nav navbar-nav navbar-right navbar_custom">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="index.php">Parduotuvė</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container-fluid">
	<div class="loginForm col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
        <h1 class="text-center" style="padding-bottom: 20px;">Registruotis</h1>
		<form class="form-group col-md-6 col-md-offset-3 loginFormText" action="create.php" method="POST">
			<input type="text" placeholder="Vardas" class="form-control" name="namer" required>
			<input type="email" placeholder="e-paštas" class="form-control" name="emailr" required>
			<input type="password" placeholder="Slaptažodis" class="form-control" name="passwordr" required> 
			<input type="submit" value="Registruotis" class="form-control btn btn-default">
		</form>
	</div>
</div>
<?php
    session_name('wrongRegister');
    session_start();

    if(isset($_SESSION['wrongRegister']))
    {
        echo "<script> alert('Toks Vartotojas jau yra');</script>";
    }
    session_destroy();
?>
</body>
</html>

