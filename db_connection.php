<?php 
function setConnection()
{
	$servername="localhost";
	$username="root";
	$password="";
	$database="hobbyaqua";

	//Create connection
	$conn = new mysqli($servername,$username,$password,$database);

	//Check Connection
	if ($conn->connect_error) {
	die("Connection failed: ".$conn->connect_error);
	}

	return $conn;
}	


function runQuary($myCommand="",$msg="")
{
	$ConnectionN = setConnection();

	try
	{
		if (mysqli_query($ConnectionN, $myCommand)) 
		{
			echo "<script type='text/javascript'>alert('{$msg}')</script>";
		}
		else {
			echo "Error ". mysqli_error($ConnectionN);

		}
	}
	catch (exception $ex)
	{
		echo 'Caught exception: ', $ex -> getMessage(), "\n";
	}
	finally
	{
		mysqli_close($ConnectionN);
	}

}

function runNewQuary($myCommand="")
{
	$ConnectionN = setConnection();

	try
	{
		mysqli_query($ConnectionN, $myCommand);
	}
	catch (exception $ex)
	{
		echo 'Caught exception: ', $ex -> getMessage(), "\n";
	}
	finally
	{
		mysqli_close($ConnectionN);
	}

}

function runCartQuary($myCommand="")
{
	$ConnectionN = setConnection();

	try
	{
		mysqli_query($ConnectionN, $myCommand);
		echo "<script type='text/javascript'>alert('Adding to Cart Success !! Please view cart for place order.')</script>";
	}
	catch (exception $ex)
	{
		echo 'Caught exception: ', $ex -> getMessage(), "\n";
	}
	finally
	{
		mysqli_close($ConnectionN);
	}

}

function runUpdateCartQuary($myCommand="")
{
	$ConnectionN = setConnection();

	try
	{
		mysqli_query($ConnectionN, $myCommand);
		echo "<script type='text/javascript'>alert('Product Cart Updated !! Please view cart for place order.')</script>";
	}
	catch (exception $ex)
	{
		echo 'Caught exception: ', $ex -> getMessage(), "\n";
	}
	finally
	{
		mysqli_close($ConnectionN);
	}

}

function runOrderQuary($myCommand="")
{
	$ConnectionN = setConnection();

	try
	{
		mysqli_query($ConnectionN, $myCommand);
		echo "<script type='text/javascript'>alert('Order Placed Successfully !! Please view orders for cancelling...')</script>";
	}
	catch (exception $ex)
	{
		echo 'Caught exception: ', $ex -> getMessage(), "\n";
	}
	finally
	{
		mysqli_close($ConnectionN);
	}

}


function runSearchQuary($myCommand="")
{
	$ConnectionR = setConnection();

	try
	{

		if (mysqli_query($ConnectionR, $myCommand)) {
			$record = mysqli_fetch_assoc(mysqli_query($ConnectionR, $myCommand));
			
		}
		else {
			echo "Error ". mysqli_error($ConnectionR);

		}
	}
	catch (exception $ex)
	{
		echo 'Caught exception: ', $ex -> getMessage(), "\n";
	}
	finally
	{
		mysqli_close($ConnectionR);
	}

	return print_r($record);
}

?>