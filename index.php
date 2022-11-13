<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	require "Config/Autoload.php";
	require "Config/Config.php";

	use Config\Autoload as Autoload;
	use Config\Router 	as Router;
	use Config\Request 	as Request;
		
	Autoload::start();

	session_start();

	require_once(VIEWS_PATH."header.php");

	Router::Route(new Request());

	require_once(VIEWS_PATH."footer.php");
	
?>

<<<<<<< HEAD
<!-- 

=======
>>>>>>> 66fdbbf9cfa9375778d30b72a69990e24ea97fca
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<form method="post" action="sumit.php">
		<label>
			<h5>Add first Date: </5>
		</label>
		<input type="date" name="start" required>
		<label>
			<h5>Add finish Date: </5>
		</label>
<<<<<<< HEAD
		
=======
>>>>>>> 66fdbbf9cfa9375778d30b72a69990e24ea97fca
		<input type="date" name="finish" required>
		<button type="submit" name="consultar" value="consultar">Consultar</button>
	</form>
</body>

<<<<<<< HEAD
</html> 

<!DOCTYPE html>
 <html lang="en">
	 <head>
		 <meta charset="UTF-8">
		 <meta http-equiv="X-UA-Compatible" content="IE=edge">
		 <meta name="viewport" content="width=device-width, initial-scale=1.0">
		 <title>Calendario web</title>
		</head>
		<body>
			
			</body>
			</html>
		-->
=======
</html>
>>>>>>> 66fdbbf9cfa9375778d30b72a69990e24ea97fca
