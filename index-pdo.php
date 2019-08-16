<?php
	include_once 'includes/dbh-pdo.inc.php';
	include_once 'includes/user-pdo.inc.php';
//spl_autoload_register('myAutoLoader'); 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
	<?php
	//if in test print_r(PDO::getAvailableDrivers());
	$object = new User;
	//$object-> getAllUsers();
	$object-> getUsersWithCountCheck();
	
	?>
		
	</body>
</html>