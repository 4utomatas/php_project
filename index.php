<!DOCTYPE html>
<html>
<head>
	<title>
		Baigiamasis
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
                <a class="navbar-brand page-scroll" href="#page-top">Baigiamasis</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar_collapse">
                <ul class="nav navbar-nav navbar-right navbar_custom">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
					<li class="page-scroll">
						<a href="#store">Parduotuvė</a>
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
    <section id="welcome"> 
	    <div class="container-fluid padding300 text-center welcome asd123">
	   		<h1>
	    		Sveiki atvykę į Baigiamajį
	   		</h1>
	    </div>
    </section>
    <section id="store">
    	<div class="container text-center sarasas">
    		<h1 class="paddingbottom50">
    			Parduotuvė
    		</h1>
    		<?php
    			include('connect.php');
    			$sql = "SELECT ID, pavadinimas, aprasymas, image, kaina FROM yoda4";
				$result = $conn->query($sql);
				$rowItems = 1;
				$uzdarytiRow = false;
				$my_form = 0;
				if ($result->num_rows > 0) 
				{
				 // output data of each row
			 	while($row = $result->fetch_assoc()) 
			 	{
			 		if($rowItems == 1 || $rowItems > 3)
			 		{
			 			echo '<div class="container text-center paddingbottom50">';
			 			echo "<div class='row'>";
			 		}

			 		echo '	
			 		<div class="col-md-4 preke">
			 			<form id="my_form'. $my_form .'" method="GET" action="preke.php">
				 			<a href="javascript:;" onclick="'."$('#submitBtn". $my_form ."').click();".'">
					 			<img class="storeImage" alt="Šiuo metu nuotrauka nepasiekiama" src="'. $row['image'] .
					 			'">
					 			<p>'. $row['pavadinimas'] . '</p>
					 			<p>€'. $row['kaina'] . '</p>
				 			</a>
			 				<input type="hidden" name="ID" value="'. $row['ID'] .'">
			 				<button type="submit" id="submitBtn'. $my_form .'" style="display:none;">Hidden Button</button>
			 			</form>
			 		</div>';
			 		$my_form++;
			 		$rowItems++;

			 		if($rowItems > 3)
			 		{
			 			$uzdarytiRow = true;
			 		}

			 		if($uzdarytiRow == true)
			 		{
			 			echo "</div></div>";
			 			$rowItems = 1;
			 			$uzdarytiRow = false;
			 		}
			 	}

				} 
				else 
				{
					echo " <h1> Atsiprašome, šiuo metu nėra prekių </h1>";
				}
				$conn->close();
    		?>
    	</div>
    </section>
    
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span>Copyright &copy; Yoda.lt 2017</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons text-center">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Smooth Scrolling -->
<script>
	$(document).ready(function(){
	  // Add smooth scrolling to all links in navbar + footer link
	  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

	   // Make sure this.hash has a value before overriding default behavior
	  if (this.hash !== "") {

	    // Prevent default anchor click behavior
	    event.preventDefault();

	    // Store hash
	    var hash = this.hash;

	    // Using jQuery's animate() method to add smooth page scroll
	    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
	    $('html, body').animate({
	      scrollTop: $(hash).offset().top
	    }, 900, function(){

	      // Add hash (#) to URL when done scrolling (default click behavior)
	      window.location.hash = hash;
	      });
	    } // End if
	  });
	})
</script>
</body>
</html>