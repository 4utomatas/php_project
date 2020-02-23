<!DOCTYPE html>
<html>
<head>
	<title>Admin Tool Yoda.lt</title>
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
	<div class="container padding300">
		<form class="form-group col-md-6 col-md-offset-3 loginFormText" method="POST" action="adminToolCreate.php">
			<input type="text" placeholder="Pavadinimas" class="form-control" name="name" required>
			<input type="textarea" placeholder="Aprasymas" class="form-control" name="aprasymas" required>
			<input type="text" placeholder="Image url" class="form-control" name="image" required>
			<input type="text" placeholder="Kaina" class="form-control" name="kaina" required>
			<input type="submit" value="prideti preke" class="form-control btn btn-default">
		</form>
	</div>
</body>
</html>
