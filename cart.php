<?php
	session_start();
	include('connect.php');
	if(!isset($_SESSION['i']))
	{
		$_SESSION['i'] = 0;
	}
	$id = $_POST['ID'];
	
	//prisijungia ir paima duomenys apie item'a, kurio ID yra papostinamas
	$sql = "SELECT * FROM yoda4 WHERE ID=$id";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$conn->close();
	$i = $_SESSION['i'];
	
	//Y carto masyva pridedamas item'as
	$_SESSION['cart'][$i] = $row['ID'];
	$i++;
	$_SESSION['i'] = $i;
	//sudeda kiek viskas kainuos
	if(!isset($_SESSION['cartsum'])){
		$_SESSION['cartsum'] = $row['kaina'];
	} else {
		$_SESSION['cartsum'] = $_SESSION['cartsum'] + $row['kaina'];
	}
	/*echo "i = " . $i ."<BR>";
	for($j = 0; $j < $i; $j++)
	{
		echo $_SESSION['cart'][$j] . "<br>";
	}*/
	header('Location: preke.php');
	



/*foreach($_POST as $key => $value)
		{ 
			//add all post vars to new_product array
        	$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    	}
    	//remove unecessary vars
    	unset($new_product['type']);
   		unset($new_product['return_url']); 
   		//we need to get product name and price from database.
	    $statement = $mysqli->prepare("SELECT product_name, price FROM products WHERE product_code=? LIMIT 1");
	    $statement->bind_param('s', $new_product['product_code']);
	    $statement->execute();
	    $statement->bind_result($product_name, $price);
    
	    while($statement->fetch()){
	        
	        //fetch product name, price from db and add to new_product array
	        $new_product["product_name"] = $product_name; 
	        $new_product["product_price"] = $price;
	        
	        if(isset($_SESSION["cart_products"])){  //if session var already exist
	            if(isset($_SESSION["cart_products"][$new_product['product_code']])) //check item exist in products array
	            {
	                unset($_SESSION["cart_products"][$new_product['product_code']]); //unset old array item
	            }           
	        }
	        $_SESSION["cart_products"][$new_product['product_code']] = $new_product; //update or create product session with new item  
	    } 



//update or remove items 
if(isset($_POST["product_qty"]) || isset($_POST["remove_code"]))
{
    //update item quantity in product session
    if(isset($_POST["product_qty"]) && is_array($_POST["product_qty"])){
        foreach($_POST["product_qty"] as $key => $value){
            if(is_numeric($value)){
                $_SESSION["cart_products"][$key]["product_qty"] = $value;
            }
        }
    }
    //remove an item from product session
    if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){
        foreach($_POST["remove_code"] as $key){
            unset($_SESSION["cart_products"][$key]);
        }   
    }
}

//back to return url
$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url
header('Location:'.$return_url);

	}
*/	






	
?>